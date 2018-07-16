<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Model\TableTax;
use App\Model\AtbAbsent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class AdsentController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	public function getIndex(){
		return view('admins.absentt.index');
	}
	public function getFuncAdd(){
		return view('admins.absentt.add');
	}
	public function insertData(Request $data){
		$this->Validate($data,[
			'adsent_date' => 'required',
            'staff_id' => 'required',
            'adsent_type' => 'required',
            'request_by' => 'required',
            'approved_by' => 'required',
            'approved_by' => 'required',
        ]);
		DB::beginTransaction();		
		try {
			$get_id = DB::table('atb_absents')->insertGetId([
				'staffid'=>$data->staff_id,			
				'att_typeid'=>$data->adsent_type,			
				'addORrequest_by'=>$data->request_by,			
				'approvedby'=>$data->approved_by,			
				'attdate'=>date('Y-m-d',strtotime($data->adsent_date)),			
				'attdetail'=>$data->detial,			
				'attstatus'=>1,			
				'att_empty'=>0,			
				'created_at'=>date('Y-m-d'),			
				'updated_at'=>date('Y-m-d')
			]);
			if(count($data->staff_right)>0){
				for($i=0; $i < count($data->staff_right); $i++){
					 DB::table('atb_absents')->insert([
						'staffid'=>$get_id,
						'att_date'=>$get_id,
						'late_in'=>$get_id,
						's_out'=>$get_id,
						'attaddedby'=>$get_id,
						'att_detail'=>$data->detial,
						'att_status'=>1,
						'att_empty'=>0,
					 ]);
				}
			}
			DB::commit();
			return Redirect::to('admins/absentt')->with('message','Insert Data Successfully !');
		} catch (Exception $e) {
			DB::rollback();
			return Redirect::to('admins/absentt')->with('message','Insert Data Unsuccessfully !');
		}
	}
}
