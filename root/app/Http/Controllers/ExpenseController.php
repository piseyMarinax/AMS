<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Model\TableAccountType;
use App\Model\TableAccountChart;
use App\Model\TableAccountGroup;
use App\Model\TableJournal;
use App\Model\TableIncome;
use App\Model\TableExpense;
use App\Model\TableTax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class ExpenseController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
	}
	public function getIndex(){
		return view('accounting.expense.index');
	}
	public function getAdd(){
		return view('accounting.expense.add');
	}
	public function getCalulate($id){
		$amount = TableJournal::where('jn_ac_type',$id)->where('jn_status',1)->where('jn_trash',0)
		->select(DB::raw('SUM(jn_drb - jn_crb) as total_amount'))->first();
		return response()->json($amount);
	}
	public function insertData(Request $data){
		$this->Validate($data, [
			'referent_no' => 'required |unique:table_journals,jn_code',
            'expense_date' => 'required',
			'user_id'=>'required',
			'chart_account'=>'required',
        ]);
		DB::beginTransaction();		
		try {
			//print_r($data->all());exit;				
			$acc_code = TableAccountChart::find($data->chart_account);
			$get_id = TableJournal::insertGetId([
				'jn_pid' => 0,
				'jn_code'=>$data->referent_no,
				'jn_ac_type'=>$data->chart_account,
				'jn_ac_code'=>$acc_code->ac_code,
				'jn_des'=>$acc_code->ac_name,
				'jn_crb'=>$data->grand_total,
				'jn_drb'=>0,
				'jn_date_transaction'=>date('Y-m-d',strtotime($data->expense_date)),
				'jn_date_pay'=>date('Y-m-d',strtotime($data->expense_date)),
				'jn_referent'=>4,
				'user_id'=>$data->user_id,
				'jn_class'=>$data->class,
				'jn_status'=>1,
				'jn_trash'=>0,
				'referent_tpye'=>'income',
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
						'jn_crb'=>0,
						'jn_drb'=>$data->amount[$i],
						'jn_date_transaction'=>date('Y-m-d',strtotime($data->expense_date)),
						'jn_date_pay'=>date('Y-m-d',strtotime($data->expense_date)),
						'jn_referent'=>4,
						'user_id'=>$data->user_id,
						'jn_class'=>$data->class_data[$i],
						'jn_status'=>1,
						'jn_trash'=>0,
						'referent_tpye'=>'income',
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
					'jn_crb'=>0,
					'jn_drb'=>$data->total_tax,
					'jn_date_transaction'=>date('Y-m-d',strtotime($data->expense_date)),
					'jn_date_pay'=>date('Y-m-d',strtotime($data->expense_date)),
					'jn_referent'=>4,
					'user_id'=>$data->user_id,
					'jn_class'=>$data->class,
					'jn_status'=>1,
					'jn_trash'=>0,
					'referent_tpye'=>'income',
					'created_at'=>date('Y-m-d'),
		            'updated_at'=>date('Y-m-d'),
		            'tax_id'=>-1,
				]);
			}
			TableExpense::insert([
				'code'=> $data->referent_no,
				'acc_id'=>$acc_code->id,
				'acc_code'=>$acc_code->ac_code,
				'amount'=>$data->grand_total,
				'expense_date'=>date('Y-m-d',strtotime($data->expense_date)),
				'class'=>$data->class,					
				'user_id'=>$data->user_id,
				'jn_id'=>$get_id,
				'status'=>1,
				'trash'=>0,
				'created_at'=>date('Y-m-d'),
			    'updated_at'=>date('Y-m-d')
			]);
			DB::commit();
		return Redirect::to('accounting/expense/index')->with('message',' Insert Data Successfully !');
		} catch (Exception $e) {
			DB::rollback();
			return Redirect::to('accounting/expense/index')->with('message','Insert Data Unsuccessfully !');
		}
	}
	public function getJsonList(){
		$row = TableExpense::LeftJoin('table_account_charts','table_account_charts.id','=','table_expenses.acc_id')
			->LeftJoin('users','users.id','=','table_expenses.user_id')
			->select('table_expenses.*','users.name','table_account_charts.ac_name');
		return Datatables::of($row)
		->addColumn('created_at',function($val){
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
						<a class="font-yellow" href="'.url("accounting/expense/edit").'/'.$val->jn_id.'">
							<i class="font-yellow fa fa-edit"></i> '.trans("template.edit").' </a>
					</li>
					<i class="divider"></i>
					<li>
						<a class="font-red" onclick="onDelete('.$val->jn_id.')">
							<i class="font-red fa fa-trash"></i> '.trans("template.delete").' </a>
					</li>
				</ul>
			</div>';
       })->make(true);
	}
	public function getJsonListDetail(Request $data,$id){
		$expense_id = TableExpense::find($id);
		DB::statement(DB::raw('set @rownum=0'));
		$row = TableJournal::LeftJoin('table_account_charts','table_account_charts.id','=','table_journals.jn_ac_type')
		->LeftJoin('users','users.id','=','table_journals.user_id')
		->where('table_journals.id',$expense_id->jn_id)->orwhere('table_journals.jn_pid',$expense_id->jn_id)->where('table_journals.jn_status',1)->where('table_journals.jn_trash',0)
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
		$expense = TableExpense::where('jn_id',$id)->first();
		$journal = TableJournal::where('jn_pid',$id)->where('tax_id','!=',-1)->get();
		$tax = TableTax::get();
		$amount = TableJournal::where('jn_ac_type',$expense->acc_id)->where('jn_status',1)->where('jn_trash',0)
		->select(DB::raw('SUM(jn_drb - jn_crb) as total_amount'))->first();
		$arr_view=[
			'expense'=>$expense,
			'journal'=>$journal,
			'tax'=>$tax,
			'amount'=>$amount
		];
		return view('accounting.expense.edit',$arr_view);
	}
	public function updateData(Request $data){
		$this->Validate($data, [
			'referent_no' => 'required',
            'expense_date' => 'required',
			'user_id'=>'required',
			'chart_account'=>'required',
        ]);
		DB::beginTransaction();		
		try {
			TableJournal::where('id',$data->update_id)->orwhere('jn_pid',$data->update_id)->update(['jn_status'=>0,'jn_trash'=>1]);
			$acc_code = TableAccountChart::find($data->chart_account);
			$get_id = TableJournal::insertGetId([
				'jn_pid' => 0,
				'jn_code'=>$data->referent_no,
				'jn_ac_type'=>$data->chart_account,
				'jn_ac_code'=>$acc_code->ac_code,
				'jn_des'=>$acc_code->ac_name,
				'jn_crb'=>$data->grand_total,
				'jn_drb'=>0,
				'jn_date_transaction'=>date('Y-m-d',strtotime($data->expense_date)),
				'jn_date_pay'=>date('Y-m-d',strtotime($data->expense_date)),
				'jn_referent'=>4,
				'user_id'=>$data->user_id,
				'jn_class'=>$data->class,
				'jn_status'=>1,
				'jn_trash'=>0,
				'referent_tpye'=>'income',
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
						'jn_crb'=>0,
						'jn_drb'=>$data->amount[$i],
						'jn_date_transaction'=>date('Y-m-d',strtotime($data->expense_date)),
						'jn_date_pay'=>date('Y-m-d',strtotime($data->expense_date)),
						'jn_referent'=>4,
						'user_id'=>$data->user_id,
						'jn_class'=>$data->class_data[$i],
						'jn_status'=>1,
						'jn_trash'=>0,
						'referent_tpye'=>'income',
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
					'jn_crb'=>0,
					'jn_drb'=>$data->total_tax,
					'jn_date_transaction'=>date('Y-m-d',strtotime($data->expense_date)),
					'jn_date_pay'=>date('Y-m-d',strtotime($data->expense_date)),
					'jn_referent'=>4,
					'user_id'=>$data->user_id,
					'jn_class'=>$data->class,
					'jn_status'=>1,
					'jn_trash'=>0,
					'referent_tpye'=>'income',
					'created_at'=>date('Y-m-d'),
		            'updated_at'=>date('Y-m-d'),
		            'tax_id'=>-1,
				]);
			}
			TableExpense::where('jn_id',$data->update_id)->update([
				'code'=> $data->referent_no,
				'acc_id'=>$acc_code->id,
				'acc_code'=>$acc_code->ac_code,
				'amount'=>$data->grand_total,
				'expense_date'=>date('Y-m-d',strtotime($data->expense_date)),
				'class'=>$data->class,					
				'user_id'=>$data->user_id,
				'jn_id'=>$get_id,
				'status'=>1,
				'trash'=>0,
			    'updated_at'=>date('Y-m-d')
			]);
			DB::commit();
		return Redirect::to('accounting/expense/index')->with('message',' Update Data Successfully !');
		} catch (Exception $e) {
			DB::rollback();
			return Redirect::to('accounting/expense/index')->with('message','Update Data Unsuccessfully !');
		}
	}
	public function getDelete(Request $data){		
		if($data->ajax() && TableExpense::find($data['id'])){			
			TableExpense::where('jn_id',$data->id)->update(['status'=>0,'trash'=>1]);
			TableJournal::where('id',$data['id'])->orwhere('jn_pid',$data['id'])->update(['jn_status'=>0,'jn_trash'=>1]);
		}
			
	}
}
