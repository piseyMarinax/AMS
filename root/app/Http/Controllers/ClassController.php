<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Model\TableClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class ClassController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
	}
	public function getIndex(){
		return view('setting.class.index');
	}
	public function getJsonList(){
    	$row = TableClass::select()->where('status',1);
        return Datatables::of($row)     
        ->addColumn('action', function ($val) {
                return '
                <div class="btn-group">
                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> '.trans("template.action").'
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li>
                            <a class="font-yellow" onclick="FunctionUpdate('.$val->id.')" href="#">
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
	public function insertData(Request $data){
		$validation = Validator::make($data->all(), array('tax_name' => 'max:200|required','tax_value' => 'max:200|required'));
        if($validation->fails()){
            return response()->json(['row'=>0,'validation'=>'Data empty please check it.']);
        }else{
        	if($data->id_update !=0){
        		TableClass::where('id',$data->id_update)->update([
	                'tax_name'=>$data->tax_name,
	                'tax_vale'=>$data->tax_value,
	                'status'=>1,
	                'tax_detail'=>$data->tax_des,
	                'updated_at'=>date('Y-m-d'),
	            ]);
	            $validation = "Update Data Successfully ";
	            return response()->json(['row'=>TableClass::find($data->id_update),'validation'=> $validation]);
        	}else{
	            $id = TableClass::insertGetId([
	                'tax_name'=>$data->tax_name,
	                'tax_vale'=>$data->tax_value,
	                'status'=>1,
	                'tax_detail'=>$data->tax_des,
	                'created_at'=>date('Y-m-d'),
	                'updated_at'=>date('Y-m-d'),
	            ]);
	            $validation = "Insert Data Successfully ";
	            return response()->json(['row'=>TableClass::find($id),'validation'=> $validation]);
        	}
        }
	}
	public function getEdit($id){
		return response()->json(TableClass::find($id));
	}
	public function getDelete(Request $data){
        if($data->ajax() && TableClass::find($data['id'])){
            TableClass::where('id',$data['id'])->delete();
        }        
    }
}
