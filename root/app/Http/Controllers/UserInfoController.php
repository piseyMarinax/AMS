<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Auth;
use Datatables;
use Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function indexs(){
		return view('ams.userinfo.index');
	}
	//left sidebar
    public function index(){
		return view('userinfo.index');
	}
	
	public function getJsonUsers()
    {
        $users = DB::table('users')->select(['id', 'name', 'gender','email', 'phone', 'status',DB::raw('(select T.name from users AS T where T.id=users.create_by) as create_by'), 'created_at', DB::raw('(select T.name from users AS T where T.id=users.update_by) as update_by'), 'updated_at']);
        return Datatables::of($users)
		->addColumn('action', function ($val) {
                return '
				<div class="btn-group">
					<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> '.trans("template.action").'
						<i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu pull-right" role="menu">
						<li>
							<a class="font-yellow" href="'.url("user/edit").'/'.$val->id.'">
								<i class="font-yellow fa fa-edit"></i> '.trans("template.edit").' </a>
						</li>
						<li>
							<a class="font-blue" href="'.url("user/reset_pass").'/'.$val->id.'">
								<i class="font-blue fa fa-key"></i> '.trans("template.reset_password").' </a>
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
    public function getJsonUserList()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $row = DB::table('users')
        ->select('users.*',DB::raw('@rownum := @rownum +1 AS rownum'))->orderby('id','DESC')->get();
        return Datatables::of($row)

        ->addColumn('action', function ($val) {
                return '
				<div class="btn-group">
					<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> '.trans("template.action").'
						<i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu pull-right" role="menu">
						<li>
							<a class="font-yellow" href="'.url("backend/user/edit").'/'.$val->id.'?userupdate">
								<i class="font-yellow fa fa-edit"></i> '.trans("template.edit").' </a>
						</li>
						<li>
							<a class="font-blue" href="'.url("backend/user/reset_pass").'/'.$val->id.'?adminreset">
								<i class="font-blue fa fa-key"></i> '.trans("template.reset_password").' </a>
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
	
	public function add(){
		return view('userinfo.add');
	}
	
	public function insert(Request $request){
		try {
			$rules = array(
				'name' => 'required|max:255',
				'gender' => 'required|max:255',
				'phone' => 'required|max:255',
				'status' => 'required|max:255',
				'email' => 'required|email|max:255|unique:users',
				'password' => 'required|min:6|confirmed',
			);
			Validator::make($request->all(),$rules)->validate();
			
			User::insert([
				'name' => $request['name'],
				'gender' => $request['gender'],
				'email' => $request['email'],
				'password' => bcrypt($request['password']),
				'phone' => $request['phone'],
				'status' => $request['status'],
				'created_at'=> date('Y-m-d H:i:s'),
				'updated_at'=> date('Y-m-d H:i:s'),
				'create_by'	=> Auth::user()->id,
				'update_by'	=> Auth::user()->id,
			]);
			
			if($request['save_new']){
				return Redirect::to('user/add')->with('success',trans('template.save_success'));
			}
			return Redirect::to('user/index')->with('success',trans('template.save_success'));
		}catch (Exception $e) {
			return Redirect::to('user/index')->with('fail',trans('template.save_fail'));
		}
	}
	
	public function edit($id){
		$data = User::find($id);
		if($data){
			return view('ams.userinfo.edit',compact('data'));
		}
		return Redirect::to('backend/user/list');
	}
	
	public function update(Request $request){
		if(User::find($request['id'])){
			if($request['email']!=$request['old_email']){
				$unique="|unique:users";
			}else{
				$unique="";
			}
			$rules = array(
				'name' => 'required|max:255',
				'gender' => 'required|max:255',
				'phone' => 'required|max:255',
				'status' => 'required|max:255',
				'email' => 'required|email|max:255'.$unique,
			);
			Validator::make($request->all(),$rules)->validate();
			
			User::where('id',$request['id'])->update([
				'name' => $request['name'],
				'gender' => $request['gender'],
				'email' => $request['email'],
				'phone' => $request['phone'],
				'status' => $request['status'],
				'updated_at'=> date('Y-m-d H:i:s'),
				'update_by'	=> Auth::user()->id,
			]);
			return Redirect::to('backend/user/list')->with('success',trans('template.update_success'));
		}else{
			return Redirect::to('backend/user/list')->with('fail',trans('template.update_fail'));
		}
	}
	
	public function reset_pass($id){
		$data = User::find($id);
		if($data){
			return view('ams/userinfo/reset',['id'=>$id]);
		}
		return Redirect::to('ams/user/index');
	}
	
	public function update_pass(Request $request){
		if(User::find($request['id'])){
			$rules = array(
				'password' => 'required|min:6|confirmed',
			);
			Validator::make($request->all(),$rules)->validate();
			
			User::where('id',$request['id'])->update([
				'password' => bcrypt($request['password']),
				'updated_at'=> date('Y-m-d H:i:s'),
				'update_by'	=> Auth::user()->id,
			]);
			return Redirect::to('backend/user/list')->with('success',trans('template.reset_success'));
		}else{
			return Redirect::to('backend/user/list')->with('fail',trans('template.reset_fail'));
		}
	}
	
	public function onDelete(Request $request){
		if($request->ajax() && User::find($request['id'])){
			User::where('id',$request['id'])->delete();
		}
	}
	
}
