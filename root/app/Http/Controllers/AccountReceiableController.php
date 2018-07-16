<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Model\TableAccountType;
use App\Model\TableAccountChart;
use App\Model\TableAccountGroup;
use App\Model\TableJournal;
use App\Model\TableAccountReceiveable;
use App\Model\TablePayAr;
use App\Model\TablePayArDetail;
use App\Model\TableTax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class AccountReceiableController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
	}
	public function getIndex(){
		return view('accounting.accReceiable.index');
	}
	public function getAdd(){
		return view('accounting.accReceiable.add');
	}
	public function insertData(Request $data){
		$this->Validate($data,[
			'referent_no' => 'required |unique:table_journals,jn_code',
            'account_receivable_date' => 'required',
        ]);
		DB::beginTransaction();		
		try {
			$acc_code = TableAccountChart::find($data->chart_account);
			$get_id = TableJournal::insertGetId([
				'jn_pid' => 0,
				'jn_code'=>$data->referent_no,
				'jn_ac_type'=>$data->chart_account,
				'jn_ac_code'=>$acc_code->ac_code,
				'jn_des'=>$acc_code->ac_name,
				'jn_crb'=>0,
				'jn_drb'=>$data->grand_total,
				'jn_date_transaction'=>date('Y-m-d',strtotime($data->account_receivable_date)),
				'jn_date_pay'=>date('Y-m-d',strtotime($data->account_receivable_date)),
				'jn_referent'=>4,
				'user_id'=>$data->user_id,
				'jn_class'=>$data->class,
				'jn_status'=>1,
				'jn_trash'=>0,
				'referent_tpye'=>'account_receivable',
				'created_at'=>date('Y-m-d'),
	            'updated_at'=>date('Y-m-d'),
	            'tax_id'=>0,
			]);
			if(count($data->arr_chart_account)>0){
				for($i=0; $i < count($data->arr_chart_account); $i++){				
					$char_acc = TableAccountChart::where('id',$data->arr_chart_account[$i])->first();
					TableJournal::insert([
						'jn_pid' => $get_id,
						'jn_code'=> $data->referent_no,
						'jn_ac_type'=>$char_acc->id,
						'jn_ac_code'=>$char_acc->ac_code,
						'jn_des'=>$data->arr_des[$i],
						'jn_crb'=>$data->amount[$i],
						'jn_drb'=>0,
						'jn_date_transaction'=>date('Y-m-d',strtotime($data->account_receivable_date)),
						'jn_date_pay'=>date('Y-m-d',strtotime($data->account_receivable_date)),
						'jn_referent'=>4,
						'user_id'=>$data->user_id,
						'jn_class'=>$data->class_data[$i],
						'jn_status'=>1,
						'jn_trash'=>0,
						'referent_tpye'=>'account_receivable',
						'created_at'=>date('Y-m-d'),
			            'updated_at'=>date('Y-m-d'),
			            'tax_id'=>$data->tax[$i],
					]);
				}
			}
			$acc_tax = TableAccountChart::find(55);
			if($data->total_tax>0){
				TableJournal::insert([
					'jn_pid' => $get_id,
					'jn_code'=>$data->referent_no,
					'jn_ac_type'=>$acc_tax->id,
					'jn_ac_code'=>$acc_tax->ac_code,
					'jn_des'=>$acc_tax->ac_name,
					'jn_crb'=>$data->total_tax,
					'jn_drb'=>0,
					'jn_date_transaction'=>date('Y-m-d',strtotime($data->account_receivable_date)),
					'jn_date_pay'=>date('Y-m-d',strtotime($data->account_receivable_date)),
					'jn_referent'=>4,
					'user_id'=>$data->user_id,
					'jn_class'=>$data->class,
					'jn_status'=>1,
					'jn_trash'=>0,
					'referent_tpye'=>'account_receivable',
					'created_at'=>date('Y-m-d'),
		            'updated_at'=>date('Y-m-d'),
		            'tax_id'=>-1,
				]);
			}
			TableAccountReceiveable::insert([
				'code'=> $data->referent_no,
				'acc_id'=>$acc_code->id,
				'acc_code'=>$acc_code->ac_code,
				'amount'=>$data->grand_total,
				'income_date'=>date('Y-m-d',strtotime($data->account_receivable_date)),
				'class'=>$data->class,					
				'user_id'=>$data->user_id,
				'jn_id'=>$get_id,
				'status'=>1,
				'trash'=>0,
				'created_at'=>date('Y-m-d'),
			    'updated_at'=>date('Y-m-d')
			]);
			
			print_r($data->all());exit;
			$get_id = TableJournalEntry::insertGetId([
				'code'=> $data->referent_no,
				'amount'=>$data->totalDebit,
				'entry_date'=>date('Y-m-d',strtotime($data->journal_entry_date)),
				'jn_id'=>0,					
				'user_id'=>Auth::user()->id,
				'des'=>$data->des,
				'status'=>1,
				'trash'=>0,
				'created_at'=>date('Y-m-d'),
			    'updated_at'=>date('Y-m-d')
			]);
			if(count($data->arr_chart_account)>0){
				for($i=0; $i < count($data->arr_chart_account); $i++){				
					$char_acc = TableAccountChart::where('id',$data->arr_chart_account[$i])->first();
					TableJournal::insert([
						'jn_pid' => 0,
						'jn_code'=> $data->referent_no,
						'jn_ac_type'=>$char_acc->id,
						'jn_ac_code'=>$char_acc->ac_code,
						'jn_des'=>$data->des,
						'jn_crb'=>$data->debit[$i],
						'jn_drb'=>$data->credit[$i],
						'jn_date_transaction'=>date('Y-m-d',strtotime($data->journal_entry_date)),
						'jn_date_pay'=>date('Y-m-d',strtotime($data->journal_entry_date)),
						'jn_referent'=>$get_id,
						'user_id'=>$data->user_id,
						'jn_class'=>$data->class_data[$i],
						'jn_status'=>1,
						'jn_trash'=>0,
						'referent_tpye'=>'journalentry',
						'created_at'=>date('Y-m-d'),
			            'updated_at'=>date('Y-m-d'),
			            'tax_id'=>0,
					]);
				}
			}
			DB::commit();
		return Redirect::to('accounting/journal_entry/index')->with('message',' Insert Data Successfully !');
		} catch (Exception $e) {
			DB::rollback();
			return Redirect::to('accounting/journal_entry/index')->with('message','Insert Data Unsuccessfully !');
		}
	}
}
