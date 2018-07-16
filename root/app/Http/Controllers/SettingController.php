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
use App\Model\TableDataConfig;
use App\Model\TableTax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class SettingController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
	}
	public function getIndexConfig(){
		return view('setting.config.index');
	}
	public function getInsertConfig(Request $data){
		//print_r(implode(',',$data->beginning_cash));
		//print_r($data->all());exit;
		TableDataConfig::insert([
		'company_logo'=>$data->Address,
		'address'=>$data->Address,
		'company_name'=>$data->company_name,
		'company_phone'=>$data->company_phone,
		'company_website'=>$data->company_webiste,
		'email'=>$data->email,
		'slogan'=>$data->slogan,
		'Beginning_Cash'=> implode(',',$data->beginning_cash),
		'Ending_Cash'=> implode(',',$data->ending_cash),
		'Cash_Inflow'=> implode(',',$data->cash_inflow),
		'Cash_Outflow'=> implode(',',$data->cash_outflow),
		'Cash_Supposed'=> implode(',',$data->cash_tobeReceived)
		]);
	}
}
