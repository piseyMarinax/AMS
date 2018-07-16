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

class JournalController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
	}
	public function getIncomeStatement(Request $data){
		$start_date = $data->Input('start_date');
		$end_date = $data->Input('end_date');
		if($start_date !=""){
			$start_date = date('Y-m-d',strtotime($start_date));
		}else{
			$start_date = "";
		}
		if($end_date !=""){
			$end_date = date('Y-m-d',strtotime($end_date));
		}else{
			$end_date =  "";
		}
		return view('accounting.journal.incomestatement',compact('end_date','start_date'));
	}
	public function getDataRevenue(Request $data){
		$start_date = $data->Input('start_date');
		$end_date = $data->Input('end_date');
		if($start_date !=""){
			$start_date = date('Y-m-d',strtotime($start_date));
		}else{
			$start_date = "";
		}
		if($end_date !=""){
			$end_date = date('Y-m-d',strtotime($end_date));
		}else{
			$end_date =  "";
		}
		$row = TableJournal::LeftJoin('table_account_charts','table_account_charts.id','=','table_journals.jn_ac_type')
			->LeftJoin('table_account_types','table_account_types.id','=','table_account_charts.ac_type')
			->where('table_account_types.at_gruop',4)->where('jn_status',1)->where('jn_trash',0)
			->groupBy('table_journals.jn_ac_type');
			if($start_date !="" || $end_date !=""){
				$row = $row->whereBetween('table_journals.jn_date_transaction',[$start_date,$end_date]);
			}
			DB::statement(DB::raw('set @rownum=0'));
			$rows = $row->select(
				DB::raw('@rownum  := @rownum  +1 AS rownum'),
				DB::raw('CONCAT(table_account_charts.ac_code," - ",table_account_charts.ac_name) as account_name'),
				DB::raw('SUM(jn_crb - jn_drb) as total_Revenue'),
				DB::raw('SUM(jn_crb - jn_drb) as amount_Revenue')
			);
		return Datatables::of($rows->get())
		->addColumn('total_Revenue',function($value){
			return '$ '.number_format($value->total_Revenue,2);
		})
		->make(true);
	}
	public function getDataExpense(Request $data){
		$start_date = $data->Input('start_date');
		$end_date = $data->Input('end_date');
		if($start_date !=""){
			$start_date = date('Y-m-d',strtotime($start_date));
		}else{
			$start_date = "";
		}
		if($end_date !=""){
			$end_date = date('Y-m-d',strtotime($end_date));
		}else{
			$end_date =  "";
		}
		$row = TableJournal::LeftJoin('table_account_charts','table_account_charts.id','=','table_journals.jn_ac_type')
			->LeftJoin('table_account_types','table_account_types.id','=','table_account_charts.ac_type')
			->where('table_account_types.at_gruop',5)->where('jn_status',1)->where('jn_trash',0)
			->groupBy('table_journals.jn_ac_type');
			if($start_date !="" || $end_date !=""){
				$row = $row->whereBetween('table_journals.jn_date_transaction',[$start_date,$end_date]);
			}
			DB::statement(DB::raw('set @rownum=0'));
			$rows = $row->select(
				DB::raw('@rownum  := @rownum  +1 AS rownum'),
				DB::raw('CONCAT(table_account_charts.ac_code," - ",table_account_charts.ac_name) as account_name'),
				DB::raw('SUM(jn_drb - jn_crb) as total_Expense'),
				DB::raw('SUM(jn_drb - jn_crb) as amount_Expense')
			);
		return Datatables::of($rows->get())
		->addColumn('total_Expense',function($value){
			return '$ '.number_format($value->total_Expense,2);
		})
		->make(true);
	}
	public function getBalanceSheet(Request $data){
		$start_date = $data->Input('start_date');
		$end_date = $data->Input('end_date');
		if($start_date !=""){
			$start_date = date('Y-m-d',strtotime($start_date));
		}else{
			$start_date = "";
		}
		if($end_date !=""){
			$end_date = date('Y-m-d',strtotime($end_date));
		}else{
			$end_date =  "";
		}
		return view('accounting.journal.balancesheet',compact('start_date','end_date'));
	}
	public function getDataAsset(Request $data){
		$start_date = $data->Input('start_date');
		$end_date = $data->Input('end_date');
		if($start_date !=""){
			$start_date = date('Y-m-d',strtotime($start_date));
		}else{
			$start_date = "";
		}
		if($end_date !=""){
			$end_date = date('Y-m-d',strtotime($end_date));
		}else{
			$end_date =  "";
		}
		$row = TableJournal::LeftJoin('table_account_charts','table_account_charts.id','=','table_journals.jn_ac_type')
			->LeftJoin('table_account_types','table_account_types.id','=','table_account_charts.ac_type')
			->where('table_account_types.at_gruop',1)->where('jn_status',1)->where('jn_trash',0)
			->groupBy('table_journals.jn_ac_type');
			if($start_date !="" || $end_date !=""){
				$row = $row->whereBetween('table_journals.jn_date_transaction',[$start_date,$end_date]);
			}
			DB::statement(DB::raw('set @rownum=0'));
			$rows = $row->select(
				DB::raw('@rownum  := @rownum  +1 AS rownum'),
				DB::raw('CONCAT(table_account_charts.ac_code," - ",table_account_charts.ac_name) as account_name'),
				DB::raw('SUM(jn_drb) as debit'),
				DB::raw('SUM(jn_crb) as credit')
			);
		return Datatables::of($rows->get())
		->addColumn('total_Asset',function($value){
			return '$ '.number_format($value->debit-$value->credit,2);
		})
		->addColumn('amount_Asset',function($value){
			return $value->debit-$value->credit;
		})
		->make(true);
	}
	public function getDataLibilities(Request $data){
		$start_date = $data->Input('start_date');
		$end_date = $data->Input('end_date');
		if($start_date !=""){
			$start_date = date('Y-m-d',strtotime($start_date));
		}else{
			$start_date = "";
		}
		if($end_date !=""){
			$end_date = date('Y-m-d',strtotime($end_date));
		}else{
			$end_date =  "";
		}
		$row = TableJournal::LeftJoin('table_account_charts','table_account_charts.id','=','table_journals.jn_ac_type')
			->LeftJoin('table_account_types','table_account_types.id','=','table_account_charts.ac_type')
			->where('table_account_types.at_gruop',2)->where('jn_status',1)->where('jn_trash',0);			
			if($start_date !="" || $end_date !=""){
				$row = $row->whereBetween('jn_date_transaction',[$start_date,$end_date]);
			}
			$row = $row->groupBy('table_journals.jn_ac_type');
			DB::statement(DB::raw('set @rownum=0'));
			$rows = $row->select(
				DB::raw('@rownum  := @rownum  +1 AS rownum'),
				DB::raw('CONCAT(table_account_charts.ac_code," - ",table_account_charts.ac_name) as account_name'),
				DB::raw('SUM(jn_crb) as credit'),
				DB::raw('SUM(jn_drb) as debit')
			);
		return Datatables::of($rows->get())
		->addColumn('total_Libilities',function($value){
			return '$ '.number_format($value->credit-$value->debit,2);
		})->addColumn('amount_Libilities',function($value){
			return $value->credit-$value->debit;
		})
		->make(true);
	}
	public function getDataEquity(Request $data){
		$start_date = $data->Input('start_date');
		$end_date = $data->Input('end_date');
		if($start_date !=""){
			$start_date = date('Y-m-d',strtotime($start_date));
		}else{
			$start_date = "";
		}
		if($end_date !=""){
			$end_date = date('Y-m-d',strtotime($end_date));
		}else{
			$end_date =  "";
		}
		$row = TableJournal::LeftJoin('table_account_charts','table_account_charts.id','=','table_journals.jn_ac_type')
			->LeftJoin('table_account_types','table_account_types.id','=','table_account_charts.ac_type')
			->where('table_account_types.at_gruop',3)->where('jn_status',1)->where('jn_trash',0)
			->groupBy('table_journals.jn_ac_type');
			if($start_date !="" || $end_date !=""){
				$row = $row->whereBetween('table_journals.jn_date_transaction',[$start_date,$end_date]);
			}
			DB::statement(DB::raw('set @rownum=0'));
			$rows = $row->select(
				DB::raw('@rownum  := @rownum  +1 AS rownum'),
				DB::raw('CONCAT(table_account_charts.ac_code," - ",table_account_charts.ac_name) as account_name'),
				DB::raw('SUM(jn_drb) as debit'),
				DB::raw('SUM(jn_crb) as credit')
			);
		return Datatables::of($rows->get())
		->addColumn('total_Equity',function($value){
			return '$ '.number_format($value->debit-$value->credit,2);
		})->addColumn('amount_Equity',function($value){
			return $value->debit-$value->credit;
		})
		->make(true);
	}
	public function getCashFlow(Request $data){
		return view('accounting.journal.cashflow');
	}
	public function getJournalData(Request $data){
		$start_date = $data->Input('start_date');
		$end_date = $data->Input('end_date');
		$chart_account = $data->Input('chart_account');
		$chart_account_gruop = $data->Input('chart_account_gruop');
		if($start_date !=""){
			$start_date = date('Y-m-d',strtotime($start_date));
		}else{
			$start_date = "";
		}
		if($end_date !=""){
			$end_date = date('Y-m-d',strtotime($end_date));
		}else{
			$end_date =  "";
		}
		$row = TableJournal::LeftJoin('table_account_charts','table_account_charts.id','table_journals.jn_ac_type')
			->LeftJoin('table_account_types','table_account_types.id','table_account_charts.ac_type')
			->where('jn_status',1)->where('jn_trash',0);
			if($start_date !="" || $end_date !=""){
				$row = $row->whereBetween('table_journals.jn_date_transaction',[$start_date,$end_date]);
			}if($chart_account !=0){
				$row = $row->where('jn_ac_type',$chart_account);
			}
			if($chart_account_gruop !=0){
				$row = $row->where('table_account_types.at_gruop',$chart_account_gruop);
			}
		$dataJournal = $row->select(
			DB::raw('SUM(jn_drb) as debit'),
			DB::raw('SUM(jn_crb) as credit')
		)->first();
		return view('accounting.journal.journal',compact('dataJournal','start_date','end_date','chart_account','chart_account_gruop'));
	}
	public function getListJournalData(Request $data){
		$start_date = $data->Input('start_date');
		$end_date = $data->Input('end_date');
		$chart_account = $data->Input('chart_account');
		$chart_account_gruop = $data->Input('chart_account_gruop');
		if($start_date !=""){
			$start_date = date('Y-m-d',strtotime($start_date));
		}else{
			$start_date = "";
		}
		if($end_date !=""){
			$end_date = date('Y-m-d',strtotime($end_date));
		}else{
			$end_date =  "";
		}
		$row = TableJournal::LeftJoin('table_account_charts','table_account_charts.id','table_journals.jn_ac_type')
			->LeftJoin('table_account_types','table_account_types.id','table_account_charts.ac_type')
			->LeftJoin('users','users.id','table_journals.user_id')
			->where('jn_status',1)->where('jn_trash',0);
			if($start_date !="" || $end_date !=""){
				$row = $row->whereBetween('table_journals.jn_date_transaction',[$start_date,$end_date]);
			}if($chart_account !=0){
				$row = $row->where('jn_ac_type',$chart_account);
			}
			if($chart_account_gruop !=0){
				$row = $row->where('table_account_types.at_gruop',$chart_account_gruop);
			}
			DB::statement(DB::raw('set @rownum=0'));
			$rows = $row->select(
				'table_journals.id as jn_id',
				DB::raw('@rownum  := @rownum  +1 AS rownum'),
				'jn_pid as parent_id',
				'jn_code as reference_no',
				'jn_ac_type as account_chart',
				'jn_date_transaction as jn_DateTransaction',
				'jn_drb as debit',
				'jn_crb as credit',
				'referent_tpye as reference_type',
				'table_account_charts.ac_code as account_chart_code',
				'table_account_charts.ac_name as account_chart_name',
				'table_account_types.at_gruop as account_group',
				'jn_des as jn_DES',
				'users.name as received_by'
			);
		//print_r($rows->get());exit;
		$journalCollection = new \Illuminate\Support\Collection;
		$journalDB = $rows->get();
        $totalRows = [];
        $totalDebit = [];
        $totalCredit = [];
        foreach ($journalDB as $jnDB) {
            if (isset($totalRows[$jnDB->reference_no]) > 0) {
                $totalRows[$jnDB->reference_no] = floatval($totalRows[$jnDB->reference_no]) + 1;
                $totalDebit[$jnDB->reference_no] = floatval($totalDebit[$jnDB->reference_no]) + floatval($jnDB->debit);
                $totalCredit[$jnDB->reference_no] = floatval($totalCredit[$jnDB->reference_no]) + floatval($jnDB->credit);
            }else{
                $totalRows[$jnDB->reference_no] = 1;
                $totalDebit[$jnDB->reference_no] = floatval($jnDB->debit);
                $totalCredit[$jnDB->reference_no] = floatval($jnDB->credit);
            }
        }	
		$rows = 0;
        foreach ($journalDB as $key => $jnDBB) {
            $rows++;
            if (intval($totalRows[$jnDBB->reference_no])==$rows && intval($totalRows[$jnDBB->reference_no]) > 1) {
                $journalCollection->push([
                    'jn_id'=>$jnDBB->jn_id,
                    'rownum'=>$jnDBB->rownum,
                    'parent_id'=>$jnDBB->parent_id,
                    'account_group'=>$jnDBB->account_group,
                    'account_chart'=>$jnDBB->account_chart,
                    'account_chart_code'=>$jnDBB->account_chart_code,
                    'account_chart_name'=>$jnDBB->account_chart_name,
                    'jn_DES'=>$jnDBB->jn_DES,
                    'received_by'=>$jnDBB->received_by,
                    'reference_type'=>$jnDBB->reference_type,
                    'reference_no'=>$jnDBB->reference_no,
                    'credit'=>'$ '.number_format($jnDBB->credit,2),
                    'debit'=>'$ '.number_format($jnDBB->debit,2),
                    'jn_DateTransaction'=>date('d-m-Y',strtotime($jnDBB->jn_DateTransaction)),
                    'key'=>0
                ]);
               $journalCollection->push([
                    'jn_id'=>0,
                    'rownum'=>0,
                    'parent_id'=>'',
                    'account_group'=>'',
                    'account_chart'=>'',
                    'account_chart_code'=>'',
                    'account_chart_name'=>'',
                    'jn_DES'=>'',
                    'received_by'=>trans('template.total').' : ',
                    'reference_type'=>'',
                    'reference_no'=>$jnDBB->reference_no,
                    'credit'=>'$ '.number_format($totalCredit[$jnDBB->reference_no],2),
                    'debit'=>'$ '.number_format($totalDebit[$jnDBB->reference_no],2),
                    'jn_DateTransaction'=>'',
                    'key'=>$key
                ]);
                $rows = 0;
            }elseif(intval($totalRows[$jnDBB->reference_no])==1 && intval($totalRows[$jnDBB->reference_no])==$rows){
                $journalCollection->push([
                    'jn_id'=>$jnDBB->jn_id,
                    'rownum'=>$jnDBB->rownum,
                    'parent_id'=>$jnDBB->parent_id,
                    'account_group'=>$jnDBB->account_group,
                    'account_chart'=>$jnDBB->account_chart,
                    'account_chart_code'=>$jnDBB->account_chart_code,
                    'account_chart_name'=>$jnDBB->account_chart_name,
                    'jn_DES'=>$jnDBB->jn_DES,
                    'received_by'=>$jnDBB->received_by,
                    'reference_type'=>$jnDBB->reference_type,
                    'reference_no'=>$jnDBB->reference_no,
                    'credit'=>'$ '.number_format($jnDBB->credit,2),
                    'debit'=>'$ '.number_format($jnDBB->debit,2),
                    'jn_DateTransaction'=>date('d-m-Y',strtotime($jnDBB->jn_DateTransaction)),
                    'key'=>0
                ]);
                 $journalCollection->push([
                    'jn_id'=>0,
                    'rownum'=>0,
                    'parent_id'=>'',
                    'account_group'=>'',
                    'account_chart'=>'',
                    'account_chart_code'=>'',
                    'account_chart_name'=>'',
                    'jn_DES'=>'',
                    'received_by'=>trans('template.total').' : ',
                    'reference_type'=>'',
                    'reference_no'=>$jnDBB->reference_no,
                    'credit'=>'$ '.number_format($totalCredit[$jnDBB->reference_no],2),
                    'debit'=>'$ '.number_format($totalDebit[$jnDBB->reference_no],2),
                    'jn_DateTransaction'=>'',
                    'key'=>$key
                ]);
               $rows = 0;
            }else{
                $journalCollection->push([
                    'jn_id'=>$jnDBB->jn_id,
                    'rownum'=>$jnDBB->rownum,
                    'parent_id'=>$jnDBB->parent_id,
                    'account_group'=>$jnDBB->account_group,
                    'account_chart'=>$jnDBB->account_chart,
                    'account_chart_code'=>$jnDBB->account_chart_code,
                    'account_chart_name'=>$jnDBB->account_chart_name,
                    'jn_DES'=>$jnDBB->jn_DES,
                    'received_by'=>$jnDBB->received_by,
                    'reference_type'=>$jnDBB->reference_type,
                    'reference_no'=>$jnDBB->reference_no,
                    'credit'=>'$ '.number_format($jnDBB->credit,2),
                    'debit'=>'$ '.number_format($jnDBB->debit,2),
                    'jn_DateTransaction'=>date('d-m-Y',strtotime($jnDBB->jn_DateTransaction)),
                    'key'=>0
                ]);
            }
        }
		return Datatables::of(collect($journalCollection))
		->addColumn('account_chart_code',function($val){
			return $val['account_chart_code'].' - '.$val['account_chart_name'];
		})->make(true);
	}
}
