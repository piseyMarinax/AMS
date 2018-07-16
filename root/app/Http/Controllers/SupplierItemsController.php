<?php

namespace App\Http\Controllers;

use App\Model\Items;
use App\Model\SupplierItem;
use App\Model\UnitConvert;
use App\Helpers\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
use Datatables;
use Redirect;

class SupplierItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index(){
		return view('supplieritems.index');
	}
	
	public function getJsonSupplierItems()
    {
        $data = DB::table('view_supplier_items')->select(['id', 'sup_code', 'sup_name','item_code', 'item_name','unit_purch','defult_cost','user_create', 'created_at','user_update', 'updated_at']);
        return Datatables::of($data)
		->addColumn('action', function ($val) {
                return '
				<div class="btn-group">
					<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> '.trans("template.action").'
						<i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu pull-right" role="menu">
						<li>
							<a class="font-yellow bold" href="'.url("supitems/edit").'/'.$val->id.'">
								<i class="font-yellow fa fa-edit"></i> '.trans("template.edit").' </a>
						</li>
						<li>
							<a class="font-red bold" onclick="onDelete('.$val->id.')">
								<i class="font-red fa fa-trash"></i> '.trans("template.delete").' </a>
						</li>
					</ul>
				</div>'; 
       })->make(true);
    }
	
	public function add(){
		return view('supplieritems.add');
	}
	
	public function insert(Request $request){
		try {
			$rules = [
				'item_id' => 'required',
				'unit_purch' => 'required',
				'unit_stock' => 'required',
			];
			if(count($request['supplier_code']) > 0){
				for($i=0;$i<count($request['supplier_code']);$i++){
					$rules['supplier_code.'.$i] = 'required';
					$rules['supplier_price.'.$i] = 'required';
				}
			}
			
			Validator::make($request->all(),$rules)->validate();
			
			if(count($request['supplier_code']) > 0){
				for($i=0;$i<count($request['supplier_code']);$i++){
					if($request['supplier_code'][$i]!=null && $request['supplier_code'][$i]!=''){
						$chk = Helpers::checkSupplierItem($request['supplier_code'][$i],$request['item_id']);
						if($chk<=0){
							$supplier_data = [
								'sup_id' => $request['supplier_code'][$i],
								'item_id' => $request['item_id'],
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
				return Redirect::to('supitems/add')->with('success',trans('template.save_success'));
			}
			return Redirect::to('supitems/index')->with('success',trans('template.save_success'));
		}catch (Exception $e) {
			return Redirect::to('supitems/index')->with('fail',trans('template.save_fail'));
		}
	}
	
	public function edit($id){
		$data = SupplierItem::find($id);
		if($data){
			return view('supplieritems.edit',compact('data'));
		}
		return Redirect::to('supitems/index');
	}
	
	public function update(Request $request){
		if(SupplierItem::find($request['id'])){
			if($request['sup_id']!=$request['old_sup_id'] || $request['item_id']!=$request['old_item_id']){
				$unique='|unique_supplier_items:'.$request['sup_id'];
			}else{
				$unique='';
			}
			$rules = [
				'item_id' => 'required'.$unique,
				'unit_purch' => 'required',
				'sup_id' => 'required',
				'defult_cost' => 'required|max:20',
			];
			Validator::make($request->all(),$rules)->validate();
			$data = [
				'sup_id' => $request['sup_id'],
				'item_id' => $request['item_id'],
				'unit_purch' => $request['unit_purch'],
				'defult_cost' => $request['defult_cost']==NULL?0:$request['defult_cost'],
				'updated_at'=> date('Y-m-d H:i:s'),
				'user_update'	=> Auth::user()->id,
			];
			SupplierItem::where('id',$request['id'])->update($data);
			return Redirect::to('supitems/index')->with('success',trans('template.update_success'));
		}else{
			return Redirect::to('supitems/index')->with('fail',trans('template.update_fail'));
		}
	}
	
	public function onDelete(Request $request){
		if($request->ajax() && SupplierItem::find($request['id'])){
			SupplierItem::where('id',$request['id'])->delete();
		}
	}
	
	public function getUnitPurchase(Request $request){
		if($request->ajax() && $request['val']){
			$item = Items::find($request['val']);
			if($item){
				$unit = UnitConvert::select('from_code','from_desc')->where('to_code',$item->unit_stock)->get();
				if($unit){
					$unit_purch = '';
					foreach($unit as $row){
						$unit_purch.= '<option value="'.$row->from_code.'">'.$row->from_code.' ('.$row->from_desc.')</option>';
					}
					$data = [
						'item_barcode'=>$item->item_barcode,
						'default_cost'=>$item->default_cost,
						'default_price'=>$item->default_price,
						'unit_stock'=>$item->unit_stock,
						'unit_purch'=>$unit_purch,
						'num_row_unit'=> count($unit),
					];
					return $data;
				}
			} 
		}
	}
}
