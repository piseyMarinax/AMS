<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Model\TableAccountType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class AdsentTypeController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
	}
	public function getFuncAdd(){
		return view('admins.absentt.type');
	}
	public function insertDataType(Request $data){
		DB::beginTransaction();		
		try {
			DB::table('atb_absenttypes')->insert([
				'att_title' => $data->name,
				'attdetail'=> $data->des,
				'attstatus'=>$data->status,
				'created_at'=>date('Y-m-d'),
	            'updated_at'=>date('Y-m-d')
			]);
			DB::commit();
		return Redirect::to('admins/absentt')->with('message',' Insert Data Successfully !');
		} catch (Exception $e) {
			DB::rollback();
			return Redirect::to('admins/absentt')->with('message','Insert Data Unsuccessfully !');
		}
	}
	public function getJsonList(){
		$row = DB::table('atb_absenttypes')->where('attstatus',1)->get();
		return Datatables::of($row)
		->addColumn('action', function ($val) {
            return '
			<div class="btn-group">
				<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> '.trans("template.action").'
					<i class="fa fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu pull-right" role="menu">
					<li>
						<a class="font-yellow" href="'.url("admins/absentttype/edit").'/'.$val->id.'">
							<i class="font-yellow fa fa-edit"></i> '.trans("template.edit").' </a>
					</li>
					<i class="divider"></i>
					<li>
						<a class="font-red" onclick="onDeleteType('.$val->id.')">
							<i class="font-red fa fa-trash"></i> '.trans("template.delete").' </a>
					</li>
				</ul>
			</div>';
       })->make(true);
	}
	public function getDelete(Request $data){
		 if($data->ajax() && DB::table('atb_absenttypes')->where('id',$data->id)->first()){
            $countdistion = DB::table('atb_absenttypes')->where('id',$data->id)->first();
            if($countdistion->attstatus==1){
                DB::table('atb_absenttypes')->where('id',$data->id)->delete();
            }            
        }
	}
	public function getEdit($id){
		 $row = DB::table('atb_absenttypes')->where('id',$id)->first();
		 return view('admins.absentt.type_edit',compact('row'));
	}
	public function updateData(Request $data){
		//print_r($data->all());exit;
		DB::beginTransaction();		
		try {
			DB::table('atb_absenttypes')->where('id',$data->id)->update([
				'att_title' => $data->name,
				'attdetail'=> $data->des,
				'attstatus'=>$data->status,
				'created_at'=>date('Y-m-d')
			]);
			DB::commit();
		return Redirect::to('admins/absentt')->with('message',' Update Data Successfully !');
		} catch (Exception $e) {
			DB::rollback();
			return Redirect::to('admins/absentt')->with('message','Update Data Unsuccessfully !');
		}
	}
}
