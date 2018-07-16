<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\Model\AtbDept;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class DeptController extends Controller
{
    //
    public function __construct(){
		$this->middleware('auth');
	}
	public function getIndex()
	{

	}
	public function getDeptAdd(){
    	return view('admins.dept.deptadd');
    }

    public function getDeptAddSave(Request $data){

        $validation = Validator::make($data->all(), array('name' => 'required'));
        if($validation->fails()){
            return Redirect::to('admins/dept/add')->withErrors($validation);
        }else{
            AtbDept::insert([
                'dept'=>$data->Input('name'),
                'dstatus'=>$data->Input('status'),
                'ddetail'=>$data->Input('des'),
                'created_at'=>date('Y-m-d')
            ]);
            if($data->Input('btnSaveNew') == "save_new"){
                return Redirect::to('admins/dept/add')->with('message','Data has been Insert Successfully !');
            }else{
                return Redirect::to('admins/dept/add')->with('message','Data has been Insert Successfully !');
            }
        }

    }
    public function getJsonDept()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $dept = AtbDept::select('atb_depts.*',DB::raw('@rownum := @rownum +1 AS rownum'))->get();
        return Datatables::of($dept)
		->addColumn('action', function ($val) {
                return '
				<div class="btn-group">
					<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> '.trans("template.action").'
						<i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu pull-right" role="menu">
						<li>
							<a class="font-yellow" href="'.url("admins/dept/edit").'/'.$val->id.'">
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
    public function getdeptEdit($id){
        $edit = AtbDept::find($id);
        return view('admins.dept.deptedit',compact('edit'));
    }
    public function updateDataDept(Request $data){
         $validation = Validator::make($data->all(), array('name' => 'min:3|required'));
        if($validation->fails()){
            return Redirect::to('admins/dept/add')->withErrors($validation);
        }else{
            AtbDept::where('id',$data->Input('id'))->update([
                'dept'=>$data->Input('name'),
                'dstatus'=>$data->Input('status'),
                'ddetail'=>$data->Input('des'),
                'updated_at'=>date('Y-m-d')
            ]);
            if($data->Input('btnSave') == "save"){
                return Redirect::to('admins/dept/add')->with('message','Data has been Update Successfully !');
            }
        }
    }
    public function onDelete(Request $request){
		if($request->ajax() && AtbDept::find($request['id'])){
			AtbDept::where('id',$request['id'])->delete();
		}
	}
}
