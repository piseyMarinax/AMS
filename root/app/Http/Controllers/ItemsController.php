<?php

namespace App\Http\Controllers;

use App\Model\Items;
use App\Model\SupplierItem;
use Auth;
use DB;
use Datatables;
use Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Helpers\Helpers;

class ItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index(){
		return view('items.index');
	}
	
	public function getJsonItems()
    {
        $data = DB::table('items')->select(['id', 'item_code', 'item_barcode','item_name','item_desc',DB::raw('(SELECT `item_categories`.`category_code` FROM `item_categories` WHERE `item_categories`.`id`=items.category_id) AS category_id'),'default_cost','default_price', 'item_price1','item_price2','item_price3','item_price4','item_price5','unit_stock','unit_purch','item_cf1','item_cf2','item_cf3','item_cf4','item_cf5','item_pic', 'status',DB::raw('(select T.name from users AS T where T.id=items.user_create) AS user_create'), 'created_at', DB::raw('(select T.name from users AS T where T.id=items.user_update) AS user_update'), 'updated_at']);
        return Datatables::of($data)
		->addColumn('action', function ($val) {
                return '
				<div class="btn-group">
					<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> '.trans("template.action").'
						<i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu pull-right" role="menu">
						<li>
							<a class="font-blue bold" href="">
								<i class="font-blue fa fa-money"></i> '.trans("template.unit_selling_price").' </a>
						</li>
						<li>
							<a class="font-green bold" href="">
								<i class="font-green icon-users"></i> '.trans("template.supplier_items").' </a>
						</li>
						<li>
							<a class="font-yellow bold" href="'.url("items/edit").'/'.$val->id.'">
								<i class="font-yellow fa fa-edit"></i> '.trans("template.edit").' </a>
						</li>
						<li class="divider"></li>
						<li>
							<a class="font-red bold" onclick="onDelete('.$val->id.')">
								<i class="font-red fa fa-trash"></i> '.trans("template.delete").' </a>
						</li>
					</ul>
				</div>'; 
       })->make(true);
    }
	
	public function add(){
		return view('items.add');
	}
	
	public function insert(Request $request){
		try {
			$rules = array(
				'item_code' => 'required|max:50|unique:items',
				'item_barcode' => 'max:50|unique:items',
				'item_name' => 'required|max:100',
				'category_id' => 'required',
				'default_cost' => 'required|max:25',
				'default_price' => 'required|max:25',
				'unit_stock' => 'required',
				'unit_purch' => 'required',
				'status' => 'required',
				'stock_type' => 'required',
			);
			Validator::make($request->all(),$rules)->validate();
			
			$data = [
				'item_code' => $request['item_code'],
				'item_barcode' => $request['item_barcode'],
				'item_name' => $request['item_name'],
				'item_desc' => $request['item_name'],
				'category_id' => $request['category_id'],
				'default_cost' => $request['default_cost'],
				'default_price' => $request['default_price'],
				'item_price1' => $request['item_price1']==NULL?0:$request['item_price1'],
				'item_price2' => $request['item_price2']==NULL?0:$request['item_price2'],
				'item_price3' => $request['item_price3']==NULL?0:$request['item_price3'],
				'item_price4' => $request['item_price4']==NULL?0:$request['item_price4'],
				'item_price5' => $request['item_price5']==NULL?0:$request['item_price5'],
				'unit_stock' => $request['unit_stock'],
				'unit_purch' => $request['unit_purch'],
				'item_cf1' => $request['item_cf1'],
				'item_cf2' => $request['item_cf2'],
				'item_cf3' => $request['item_cf3'],
				'item_cf4' => $request['item_cf4'],
				'item_cf5' => $request['item_cf5'],
				'stock_type' => $request['stock_type'],
				'status' => $request['status'],
				'created_at'=> date('Y-m-d H:i:s'),
				'updated_at'=> date('Y-m-d H:i:s'),
				'user_create'	=> Auth::user()->id,
				'user_update'	=> Auth::user()->id,
			];
			
			if($request['item_pic']){
				$destination = "assets/upload/item-pic";
				$imageName = date('Y_m_d_H_i_s').time().'.'.$request->item_pic->getClientOriginalExtension();
				$request->item_pic->move($destination, $imageName);
				$data=array_merge($data,['item_pic'=>$imageName]);
			}
			$id = Items::insertGetId($data);
			
			if(count($request['supplier_code']) > 0){
				for($i=0;$i<count($request['supplier_code']);$i++){
					if($request['supplier_code'][$i]!=null && $request['supplier_code'][$i]!=''){
						$chk = Helpers::checkSupplierItem($request['supplier_code'][$i],$id);
						if($chk<=0){
							$supplier_data = [
								'sup_id' => $request['supplier_code'][$i],
								'item_id' => $id,
								'unit_purch' => $request['unit_purch'],
								'defult_cost' => $request['supplier_price'][$i]==NULL?0:$request['supplier_price'][$i],
								'created_at'=> date('Y-m-d H:i:s'),
								'updated_at'=> date('Y-m-d H:i:s'),
								'user_create'	=> Auth::user()->id,
								'user_update'	=> Auth::user()->id,
							];
							SupplierItem::insert($supplier_data);
						}
					}
				}
			}
			
			if($request['save_new']){
				return Redirect::to('items/add')->with('success',trans('template.save_success'));
			}
			return Redirect::to('items/index')->with('success',trans('template.save_success'));
		}catch (Exception $e) {
			return Redirect::to('items/index')->with('fail',trans('template.save_fail'));
		}
	}
	
	public function edit($id){
		$item = Items::find($id);
		$sup_item = SupplierItem::select(['sup_id','defult_cost'])->where('item_id',$id)->get();
		$data = [
			'data'=>$item,
			'sup_item'=>$sup_item,
		];
		if($item){
			return view('items.edit',$data);
		}
		return Redirect::to('items/index');
	}
	
	public function update(Request $request){
		$item = Items::find($request['id']);
		if($item){
			if($request['item_code']!=$request['old_item_code']){
				$unique_code="|unique:items";
			}else{
				$unique_code="";
			}
			if($request['item_barcode']!=$request['old_item_barcode']){
				$unique_barcode="|unique:items";
			}else{
				$unique_barcode="";
			}
			$rules = array(
				'item_code' => 'required|max:50'.$unique_code,
				'item_barcode' => 'max:50'.$unique_barcode,
				'item_name' => 'required|max:100',
				'category_id' => 'required',
				'default_cost' => 'required|max:25',
				'default_price' => 'required|max:25',
				'unit_stock' => 'required',
				'unit_purch' => 'required',
				'status' => 'required',
				'stock_type' => 'required',
			);
			Validator::make($request->all(),$rules)->validate();
			
			$data = [
				'item_code' => $request['item_code'],
				'item_barcode' => $request['item_barcode'],
				'item_name' => $request['item_name'],
				'item_desc' => $request['item_desc'],
				'category_id' => $request['category_id'],
				'default_cost' => $request['default_cost'],
				'default_price' => $request['default_price'],
				'item_price1' => $request['item_price1']==NULL?0:$request['item_price1'],
				'item_price2' => $request['item_price2']==NULL?0:$request['item_price2'],
				'item_price3' => $request['item_price3']==NULL?0:$request['item_price3'],
				'item_price4' => $request['item_price4']==NULL?0:$request['item_price4'],
				'item_price5' => $request['item_price5']==NULL?0:$request['item_price5'],
				'unit_stock' => $request['unit_stock'],
				'unit_purch' => $request['unit_purch'],
				'item_cf1' => $request['item_cf1'],
				'item_cf2' => $request['item_cf2'],
				'item_cf3' => $request['item_cf3'],
				'item_cf4' => $request['item_cf4'],
				'item_cf5' => $request['item_cf5'],
				'stock_type' => $request['stock_type'],
				'status' => $request['status'],
				'updated_at'=> date('Y-m-d H:i:s'),
				'user_update'	=> Auth::user()->id,
			];
			
			if($request['item_pic']){
				$destination = "assets/upload/item-pic";
				if($item->item_pic!=NULL && $item->item_pic!=''){
					unlink($destination.'/'.$item->item_pic);
				}
				$imageName = date('Y_m_d_H_i_s').time().'.'.$request->item_pic->getClientOriginalExtension();
				$request->item_pic->move($destination, $imageName);
				$data=array_merge($data,['item_pic'=>$imageName]);
			}
			
			Items::where('id',$request['id'])->update($data);
			
			if(count($request['supplier_code']) > 0){
				SupplierItem::where('item_id',$request['id'])->delete();
				for($i=0;$i<count($request['supplier_code']);$i++){
					if($request['supplier_code'][$i]!=null && $request['supplier_code'][$i]!=''){
						$chk = Helpers::checkSupplierItem($request['supplier_code'][$i],$request['id']);
						if($chk<=0){
							$supplier_data = [
								'sup_id' => $request['supplier_code'][$i],
								'item_id' => $request['id'],
								'unit_purch' => $request['unit_purch'],
								'defult_cost' => $request['supplier_price'][$i]==NULL?0:$request['supplier_price'][$i],
								'created_at'=> date('Y-m-d H:i:s'),
								'updated_at'=> date('Y-m-d H:i:s'),
								'user_create'	=> Auth::user()->id,
								'user_update'	=> Auth::user()->id,
							];
							SupplierItem::insert($supplier_data);
						}
					}
				}
			}
			
			return Redirect::to('items/index')->with('success',trans('template.update_success'));
		}else{
			return Redirect::to('items/index')->with('fail',trans('template.update_fail'));
		}
	}
	
	public function onDelete(Request $request){
		$item = Items::find($request['id']);
		if($request->ajax() && $item){
			$source = "assets/upload/item-pic";
			if($item->item_pic!=NULL && $item->item_pic!=''){
				unlink($source.'/'.$item->item_pic);
			}
			Items::where('id',$request['id'])->delete();
			$sup_id = SupplierItem::find($item->sup_id);
			if($sup_id){
				SupplierItem::where('sup_id',$item->sup_id)->delete();
			}
		}
	}
	
	public function getUnitPurchase(Request $request){
		if($request->ajax()){
			$str = Helpers::getUnitPurchase($request['val'],NULL);
			return $str;
		}
	}
}
