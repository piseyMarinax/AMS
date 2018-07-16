<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Model\AtbTimework;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class TimeworkController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
	}
	public function getIndex()
	{

	}
	public function getTimeAdd(){
    	return view('admins.timework.timework');
    }

    public function getTimeAddSave(Request $data){

        $validation = Validator::make($data->all(), array('name' => 'required'));
        if($validation->fails()){
            return Redirect::to('admins/timework/timework')->withErrors($validation);
        }else{
            AtbTimework::insert([
                'titleshift'=>$data->Input('name'),
                'timeofshift'=>$data->Input('time'),
                'tstatus'=>$data->Input('status'),
                'tdetail'=>$data->Input('des'),
                'created_at'=>date('Y-m-d')
            ]);
            if($data->Input('btnSaveNew') == "save_new"){
                return Redirect::to('admins/timework/timework')->with('message','Data has been Insert Successfully !');
            }else{
                return Redirect::to('admins/timework/timework')->with('message','Data has been Insert Successfully !');
            }
        }

    }
    public function getJsonTime()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $time = AtbTimework::select('atb_timeworks.*',DB::raw('@rownum := @rownum +1 AS rownum'))->get();
        return Datatables::of($time)
		->addColumn('action', function ($val) {
			if($val->id < 10){
				$vid = "00".$val->id;
			}else if($val->id < 100){
				$vid = "0".$val->id;
			}else{
				$vid = $val->id;
			}
                return '
				<div class="btn-group">
					<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> '.trans("template.action").'
						<i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu pull-right" role="menu">
						<li>
							<a class="font-yellow" href="'.url("admins/timework/edit").'/'.$vid.'">
								<i class="font-yellow fa fa-edit"></i> '.trans("template.edit").' </a>
						</li>
						<i class="devider"></i>
						<li>
							<a class="font-red" onclick="onDelete('.$vid.')">
								<i class="font-red fa fa-trash"></i> '.trans("template.delete").' </a>
						</li>
					</ul>
				</div>'; 
       })->make(true);
    }
    public function getTimeEdit($id){
        $edit = AtbTimework::find($id);
        return view('admins.timework.timeworkedit',compact('edit'));
    }
    public function updateDataTime(Request $data){
         $validation = Validator::make($data->all(), array('name' => 'min:3|required'));
        if($validation->fails()){
            return Redirect::to('admins/timework/timework')->withErrors($validation);
        }else{
            AtbTimework::where('id',$data->Input('id'))->update([
                'titleshift'=>$data->Input('name'),
                'timeofshift'=>$data->Input('time'),
                'tstatus'=>$data->Input('status'),
                'tdetail'=>$data->Input('des'),
                'updated_at'=>date('Y-m-d')
            ]);
            if($data->Input('btnSave') == "save"){
                return Redirect::to('admins/timework/timework')->with('message','Data has been Update Successfully !');
            }
        }
    }
    public function onDelete(Request $request){
		if($request->ajax() && AtbTimework::find($request['id'])){
			AtbTimework::where('id',$request['id'])->delete();
		}
	}
}
