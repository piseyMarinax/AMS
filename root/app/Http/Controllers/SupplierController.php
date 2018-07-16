<?php

namespace App\Http\Controllers;

use App\Model\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
use Datatables;
use Redirect;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index(){
		return view('supplier.index');
	}
	
	public function getJsonSuppliers()
    {
        $data = DB::table('suppliers')->select(['id', 'sup_code', 'sup_name','address','phone','email','web','cont_name','cont_phone','cont_email','cus_cf1','cus_cf2','cus_cf3','cus_cf4','cus_cf5','status' ,DB::raw('(select T.name from users AS T where T.id=suppliers.user_create) as user_create'), 'created_at', DB::raw('(select T.name from users AS T where T.id=suppliers.user_update) as user_update'), 'updated_at']);
        return Datatables::of($data)
		->addColumn('action', function ($val) {
                return '
				<div class="btn-group">
					<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> '.trans("template.action").'
						<i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu pull-right" role="menu">
						<li>
							<a class="font-blue bold" href="'.url("supplier/edit").'/'.$val->id.'">
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
		return view('supplier.add');
	}
	
	public function insert(Request $request){
		try {
			$rules = array(
				'sup_code' => 'required|max:50|unique:suppliers',
				'sup_name' => 'required|max:100',
				'address' => 'required|max:255',
				'phone' => 'required|max:50',
				'cont_name' => 'required|max:50',
				'cont_phone' => 'required|max:50',
				'status' => 'required',
			);
			Validator::make($request->all(),$rules)->validate();
			
			Supplier::insert([
				'sup_code' => $request['sup_code'],
				'sup_name' => $request['sup_name'],
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
				return Redirect::to('supplier/add')->with('success',trans('template.save_success'));
			}
			return Redirect::to('supplier/index')->with('success',trans('template.save_success'));
		}catch (Exception $e) {
			return Redirect::to('supplier/index')->with('fail',trans('template.save_fail'));
		}
	}
	
	public function edit($id){
		$data = Supplier::find($id);
		if($data){
			return view('supplier.edit',compact('data'));
		}
		return Redirect::to('supplier/index');
	}
	
	public function update(Request $request){
		if(Supplier::find($request['id'])){
			if($request['sup_code']!=$request['old_sup_code']){
				$unique="|unique:suppliers";
			}else{
				$unique="";
			}
			$rules = array(
				'sup_code' => 'required|max:50'.$unique,
				'sup_name' => 'required|max:100',
				'address' => 'required|max:255',
				'phone' => 'required|max:50',
				'cont_name' => 'required|max:50',
				'cont_phone' => 'required|max:50',
				'status' => 'required',
			);
			Validator::make($request->all(),$rules)->validate();
			
			Supplier::where('id',$request['id'])->update([
				'sup_code' => $request['sup_code'],
				'sup_name' => $request['sup_name'],
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
			return Redirect::to('supplier/index')->with('success',trans('template.update_success'));
		}else{
			return Redirect::to('supplier/index')->with('fail',trans('template.update_fail'));
		}
	}
	
	public function onDelete(Request $request){
		if($request->ajax() && Supplier::find($request['id'])){
			Supplier::where('id',$request['id'])->delete();
		}
	}
}
