<?php

namespace App\Http\Controllers;

use App\Model\GroupUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
use Datatables;
use Redirect;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index(){
		return view('group.index');
	}
	
	public function getJsonGroups()
    {
        $data = DB::table('group_users')->select(['id', 'group_code', 'group_name','status' ,DB::raw('(select T.name from users AS T where T.id=group_users.created_by) as created_by'), 'created_at', DB::raw('(select T.name from users AS T where T.id=group_users.updated_by) as updated_by'), 'updated_at']);
        return Datatables::of($data)
		->addColumn('action', function ($val) {
                return '
				<div class="btn-group">
					<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> '.trans("template.action").'
						<i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu pull-right" role="menu">
						<li>
							<a class="font-blue bold" href="'.url("group/edit").'/'.$val->id.'">
								<i class="font-blue fa fa-edit"></i> '.trans("template.edit").' </a>
						</li>
						<i class="devider"></i>
						<li>
							<a class="font-red bold" onclick="onDelete('.$val->id.')">
								<i class="font-red fa fa-trash"></i> '.trans("template.delete").' </a>
						</li>
					</ul>
				</div>'; 
       })->make(true);
    }
	
	public function add(){
		return view('group.add');
	}
	
	public function insert(Request $request){
		try {
			$rules = array(
				'group_code' => 'required|max:50|unique:group_users',
				'group_name' => 'required|max:255',
				'status' => 'required|max:255',
			);
			Validator::make($request->all(),$rules)->validate();
			
			GroupUser::insert([
				'group_code' => $request['group_code'],
				'group_name' => $request['group_name'],
				'status' => $request['status'],
				'created_at'=> date('Y-m-d H:i:s'),
				'updated_at'=> date('Y-m-d H:i:s'),
				'created_by'	=> Auth::user()->id,
				'updated_by'	=> Auth::user()->id,
			]);
			
			if($request['save_new']){
				return Redirect::to('group/add')->with('success',trans('template.save_success'));
			}
			return Redirect::to('group/index')->with('success',trans('template.save_success'));
		}catch (Exception $e) {
			return Redirect::to('group/index')->with('fail',trans('template.save_fail'));
		}
	}
	
	public function edit($id){
		$data = GroupUser::find($id);
		if($data){
			return view('group.edit',compact('data'));
		}
		return Redirect::to('group/index');
	}
	
	public function update(Request $request){
		if(GroupUser::find($request['id'])){
			if($request['group_code']!=$request['old_group_code']){
				$unique="|unique:group_users";
			}else{
				$unique="";
			}
			$rules = array(
				'group_code' => 'required|max:50'.$unique,
				'group_name' => 'required|max:255',
				'status' => 'required|max:255',
			);
			Validator::make($request->all(),$rules)->validate();
			
			GroupUser::where('id',$request['id'])->update([
				'group_code' => $request['group_code'],
				'group_name' => $request['group_name'],
				'status' => $request['status'],
				'updated_at'=> date('Y-m-d H:i:s'),
				'updated_by'	=> Auth::user()->id,
			]);
			return Redirect::to('group/index')->with('success',trans('template.update_success'));
		}else{
			return Redirect::to('group/index')->with('fail',trans('template.update_fail'));
		}
	}
	
	public function onDelete(Request $request){
		if($request->ajax() && GroupUser::find($request['id'])){
			GroupUser::where('id',$request['id'])->delete();
		}
	}
	
}
