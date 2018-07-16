<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Model\TableAccountType;
use App\Model\TableAccountChart;
use App\Model\TableAccountGroup;
use App\Model\TableJournal;
use App\Model\TableJournalEntry;
use App\Model\TableExpense;
use App\Model\TableTax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class JournalEntryController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
	}
	public function getIndex(){
		return view('accounting.journalentry.index');
	}
	public function getAdd(){
		return view('accounting.journalentry.add');
	}
	public function getCalulate($id){
		$amount = TableJournal::where('jn_ac_type',$id)->where('jn_status',1)->where('jn_trash',0)
		->select(DB::raw('SUM(jn_drb - jn_crb) as total_amount'))->first();
		return response()->json($amount);
	}
	public function insertData(Request $data){
		$this->Validate($data,[
			'referent_no' => 'required |unique:table_journals,jn_code',
            'journal_entry_date' => 'required',
        ]);
		DB::beginTransaction();		
		try {
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
	public function getJsonList(){
		$row = TableJournalEntry::LeftJoin('users','users.id','=','table_journal_entries.user_id')
			->select('table_journal_entries.*','users.name')->where('table_journal_entries.status',1)->where('table_journal_entries.trash',0);
		return Datatables::of($row)
		->addColumn('entry_date',function($val){
			return date('d-m-Y',strtoTime($val->created_at));
		})
		->addColumn('amount',function($val){
			return '$ '.number_format($val->amount,2);
		})
		->addColumn('action', function ($val) {
            return '
			<div class="btn-group">
				<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> '.trans("template.action").'
					<i class="fa fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu pull-right" role="menu">
					<li>
						<a class="font-yellow" href="'.url("accounting/journal_entry/edit").'/'.$val->id.'">
							<i class="font-yellow fa fa-edit"></i> '.trans("template.edit").' </a>
					</li>
					<i class="divider"></i>
					<li>
						<a class="font-red" onclick="onDelete('.$val->id.')">
							<i class="font-red fa fa-trash"></i> '.trans("template.delete").' </a>
					</li>
				</ul>
			</div>';
       })->make(true);
	}
	public function getJsonListDetail(Request $data,$id){
		$jne_id = TableJournalEntry::find($id);
		DB::statement(DB::raw('set @rownum=0'));
		$row = TableJournal::LeftJoin('table_account_charts','table_account_charts.id','=','table_journals.jn_ac_type')
		->LeftJoin('users','users.id','=','table_journals.user_id')
		->where('table_journals.jn_code',$jne_id->code)->where('table_journals.referent_tpye','journalentry')->where('table_journals.jn_status',1)->where('table_journals.jn_trash',0)
		->select( DB::raw('@rownum  := @rownum  + 1 AS rownum'),'table_journals.*',
			'users.name','table_account_charts.ac_code',
			'table_account_charts.ac_name');
		$datatables = Datatables::of($row->get());
        if($keyword = $data->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }
		return $datatables->addColumn('jn_drb',function($value){
			return '$ '.number_format($value->jn_drb,2);
		})->addColumn('jn_crb',function($value){
			return '$ '.number_format($value->jn_crb,2);
		})
		->make(true);
	}
	public function getEdit($id){
		$journal_entry = TableJournalEntry::find($id);
		$journal = TableJournal::where('jn_code',$journal_entry->code)->where('referent_tpye','journalentry')->where('jn_status',1)->where('jn_trash',0)->get();
		$arr_view=[
			'journal_entry'=>$journal_entry,
			'journal'=>$journal
		];
		return view('accounting.journalentry.edit',$arr_view);
	}
	public function updateData(Request $data){
		$this->Validate($data, [
			'referent_no' => 'required',
            'journal_entry_date' => 'required',
        ]);
		DB::beginTransaction();		
		try {
			$entry = TableJournalEntry::find($data->update_id);
			TableJournal::where('jn_code',$entry->code)->where('referent_tpye','journalentry')->update(['jn_status'=>0,'jn_trash'=>1]);
			TableJournalEntry::where('id',$data->update_id)->update([
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
						'jn_referent'=>$data->update_id,
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
		return Redirect::to('accounting/journal_entry/index')->with('message',' Update Data Successfully !');
		} catch (Exception $e) {
			DB::rollback();
			return Redirect::to('accounting/journal_entry/index')->with('message','Update Data Unsuccessfully !');
		}
	}
	public function getDelete(Request $data){		
		if($data->ajax() && TableJournalEntry::find($data['id'])){
			$entry = TableJournalEntry::find($data['id']);
			TableJournalEntry::where('id',$data->id)->update(['status'=>0,'trash'=>1]);
			TableJournal::where('jn_code',$entry->code)->where('referent_tpye','journalentry')->update(['jn_status'=>0,'jn_trash'=>1]);
		}
			
	}
}
