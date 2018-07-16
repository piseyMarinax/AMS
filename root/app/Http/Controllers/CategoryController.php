<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\Model\ItemCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;
class CategoryController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	
    public function getIndex(){
    	return view('category.index');
    }
	
    public function getAdd(){
    	return view('category.add');
    }
	
	public function insertData(Request $data){
		$validation = Validator::make($data->all(), array(
            'code' => 'max:20|unique:item_categories,category_code',
            'name' => 'max:100|required',
            )
		);
		if($validation->fails()){
			return Redirect::to('category/add')->withErrors($validation);
		}else{
			DB::table('item_categories')->insert([
				'category_code' => $data['code'],
				'category_name' => $data['name'],
				'parent_id' => $data['parent_id'],
				'status' => $data['status'],
				'trans_status' => 0,
				'user_create'=>Auth::user()->id,
				'user_update'=>Auth::user()->id,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
			]);
			if($data->Input('btnSaveNew') == "save_new"){
				return Redirect::to('/category/add')->with('message','Data has been Insert Successfully !');
			}else{
				return Redirect::to('/category/index')->with('message','Data has been Insert Successfully !');
			}
		}
	}
	public function getJsonList(){
		$row = ItemCategory::select()->where('trans_status',0);
		return Datatables::of($row)		
		->addColumn('action', function ($val) {
                return '
				<div class="btn-group">
					<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> '.trans("template.action").'
						<i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu pull-right" role="menu">
						<li>
							<a class="font-yellow" href="'.url("category/edit").'/'.$val->id.'">
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
	public function getEdit($id){
		$edit = ItemCategory::find($id);
		return view('category.edit',compact('edit'));
	}
	public function updateData(Request $data, $id){
		$validation = Validator::make($data->all(), array(
            'code' => 'required',
            'name' => 'required',
        ));
		if($validation->fails()){
			return Redirect::to('category/add')->withErrors($validation);
		}else{
			DB::table('item_categories')->where('id',$id)->update([
				'category_code' => $data['code'],
				'category_name' => $data['name'],
				'parent_id' => $data['parent_id'],
				'status' => $data['status'],
				'user_update'=>Auth::user()->id,
				'updated_at'=>date('Y-m-d H:i:s'),
			]);
			if($data->Input('btnSaveNew') == "save_new"){
				return Redirect::to('/category/add')->with('message','Data has been Insert Successfully !');
			}else{
				return Redirect::to('/category/index')->with('message','Data has been Insert Successfully !');
			}
		}
	}
	public function getDelete(Request $data){
		if($request->ajax() && ItemCategory::find($request['id'])){
			ItemCategory::where('id',$request['id'])->delete();
		}
		
	}
}
