<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Model\AtbFunction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class FuncController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
	}
	public function getIndex()
	{

	}
	public function getFuncAdd(){
    	return view('admins.position.functions');
    }

    public function getFuncAddSave(Request $data){

        $validation = Validator::make($data->all(), array('name' => 'min:3|required'));
        if($validation->fails()){
            return Redirect::to('admins/position/add')->withErrors($validation);
        }else{
            AtbFunction::insert([
                'functitle'=>$data->Input('name'),
                'funcstatus'=>$data->Input('status'),
                'funcdetail'=>$data->Input('des'),
                'created_at'=>date('Y-m-d')
            ]);
            if($data->Input('btnSaveNew') == "save_new"){
                return Redirect::to('admins/position/add')->with('message','Data has been Insert Successfully !');
            }else{
                return Redirect::to('admins/position/add')->with('message','Data has been Insert Successfully !');
            }
        }

    }
    public function getJsonFunc()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $func = AtbFunction::select('atb_functions.*',DB::raw('@rownum := @rownum +1 AS rownum'))->get();
        return Datatables::of($func)
		->addColumn('action', function ($val) {
                return '
				<div class="btn-group">
					<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> '.trans("template.action").'
						<i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu pull-right" role="menu">
						<li>
							<a class="font-yellow" href="'.url("admins/position/edit").'/'.$val->id.'">
								<i class="font-yellow fa fa-edit"></i> '.trans("template.edit").' </a>
						</li>
						<i class="devider"></i>
						<li>
							<a class="font-red" onclick="onDelete('.$val->id.')">
								<i class="font-red fa fa-trash"></i> '.trans("template.delete").' </a>
						</li>
					</ul>
				</div>'; 
       })->make(true);
    }
    public function getfuncEdit($id){
        $edit = AtbFunction::find($id);
        return view('admins.position.funcedit',compact('edit'));
    }
    public function updateDataFunc(Request $data){
         $validation = Validator::make($data->all(), array('name' => 'min:3|required'));
        if($validation->fails()){
            return Redirect::to('admins/position/add')->withErrors($validation);
        }else{
            AtbFunction::where('id',$data->Input('id'))->update([
                'functitle'=>$data->Input('name'),
                'funcstatus'=>$data->Input('status'),
                'funcdetail'=>$data->Input('des'),
                'updated_at'=>date('Y-m-d')
            ]);
            if($data->Input('btnSave') == "save"){
                return Redirect::to('admins/position/add')->with('message','Data has been Update Successfully !');
            }
        }
    }
    public function onDelete(Request $request){
		if($request->ajax() && AtbFunction::find($request['id'])){
			AtbFunction::where('id',$request['id'])->delete();
		}
	}
}
