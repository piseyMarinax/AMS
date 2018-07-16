<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
use Datatables;
use Redirect;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index(){
		return view('customer.index');
	}
	
	public function getJsonCustomers()
    {
        $data = DB::table('customers')->select(['id', 'cus_code', 'cus_name','address','phone','email','web','cont_name','cont_phone','cont_email','cus_cf1','cus_cf2','cus_cf3','cus_cf4','cus_cf5','status' ,DB::raw('(select T.name from users AS T where T.id=customers.user_create) as user_create'), 'created_at', DB::raw('(select T.name from users AS T where T.id=customers.user_update) as user_update'), 'updated_at']);
        return Datatables::of($data)
		->addColumn('action', function ($val) {
                return '
				<div class="btn-group">
					<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> '.trans("template.action").'
						<i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu pull-right" role="menu">
						<li>
							<a class="font-blue bold" href="'.url("customer/edit").'/'.$val->id.'">
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
		return view('customer.add');
	}
	
	public function insert(Request $request){
		try {
			$rules = array(
				'cus_code' => 'required|max:50|unique:customers',
				'cus_name' => 'required|max:100',
				'address' => 'required|max:255',
				'phone' => 'required|max:50',
				'cont_name' => 'required|max:50',
				'cont_phone' => 'required|max:50',
				'status' => 'required',
			);
			Validator::make($request->all(),$rules)->validate();
			
			Customer::insert([
				'cus_code' => $request['cus_code'],
				'cus_name' => $request['cus_name'],
				'address' => $request['address'],
				'phone' => $request['phone'],
				'email' => $request['email'],
				'web' => $request['web'],
				'cont_name' => $request['cont_name'],
				'cont_phone' => $request['cont_phone'],
				'cont_email' => $request['cont_email'],
				'cus_cf1' => $request['cus_cf1'],
				'cus_cf2' => $request['cus_cf2'],
				'cus_cf3' => $request['cus_cf3'],
				'cus_cf4' => $request['cus_cf4'],
				'cus_cf5' => $request['cus_cf5'],
				'status' => $request['status'],
				'created_at'=> date('Y-m-d H:i:s'),
				'updated_at'=> date('Y-m-d H:i:s'),
				'user_create'	=> Auth::user()->id,
				'user_update'	=> Auth::user()->id,
			]);
			
			if($request['save_new']){
				return Redirect::to('customer/add')->with('success',trans('template.save_success'));
			}
			return Redirect::to('customer/index')->with('success',trans('template.save_success'));
		}catch (Exception $e) {
			return Redirect::to('customer/index')->with('fail',trans('template.save_fail'));
		}
	}
	
	public function edit($id){
		$data = Customer::find($id);
		if($data){
			return view('customer.edit',compact('data'));
		}
		return Redirect::to('customer/index');
	}
	
	public function update(Request $request){
		if(Customer::find($request['id'])){
			if($request['cus_code']!=$request['old_cus_code']){
				$unique="|unique:customers";
			}else{
				$unique="";
			}
			$rules = array(
				'cus_code' => 'required|max:50'.$unique,
				'cus_name' => 'required|max:100',
				'address' => 'required|max:255',
				'phone' => 'required|max:50',
				'cont_name' => 'required|max:50',
				'cont_phone' => 'required|max:50',
				'status' => 'required',
			);
			Validator::make($request->all(),$rules)->validate();
			
			Customer::where('id',$request['id'])->update([
				'cus_code' => $request['cus_code'],
				'cus_name' => $request['cus_name'],
				'address' => $request['address'],
				'phone' => $request['phone'],
				'email' => $request['email'],
				'web' => $request['web'],
				'cont_name' => $request['cont_name'],
				'cont_phone' => $request['cont_phone'],
				'cont_email' => $request['cont_email'],
				'cus_cf1' => $request['cus_cf1'],
				'cus_cf2' => $request['cus_cf2'],
				'cus_cf3' => $request['cus_cf3'],
				'cus_cf4' => $request['cus_cf4'],
				'cus_cf5' => $request['cus_cf5'],
				'status' => $request['status'],
				'updated_at'=> date('Y-m-d H:i:s'),
				'user_update'	=> Auth::user()->id,
			]);
			return Redirect::to('customer/index')->with('success',trans('template.update_success'));
		}else{
			return Redirect::to('customer/index')->with('fail',trans('template.update_fail'));
		}
	}
	
	public function onDelete(Request $request){
		if($request->ajax() && Customer::find($request['id'])){
			Customer::where('id',$request['id'])->delete();
		}
	}
}
