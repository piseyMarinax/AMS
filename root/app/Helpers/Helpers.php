<?php
namespace App\Helpers;

use App\Model\ItemCategory;
use App\Model\SupplierItem;
use App\Model\Items;
use App\Model\UnitPrice;
use App\Model\TableTax;
use App\Model\TableAccountGroup;
use App\Model\TableAccountType;
use App\Model\TableAccountChart;
use App\Model\TableTypeOfPay;
use App\Model\TableClass;
use App\User;
use DB;

class Helpers {
    public function __construct()
    {
	
    }
	////////////////////// get User ///////////////////////////////
	public static function getUsers($val=NULL){
		$data = User::get();
		foreach($data as $row){
			if($val!=NULL && $val==$row->id){
				echo '<option value="'.$row->id.'" selected>'.$row->name.'</option>';
			}else{
				echo '<option value="'.$row->id.'">'.$row->name.'</option>';
			}
		}
    }
	////////////////////// get Customer ///////////////////////////////
	public static function getCustomer($val=NULL){
		$data = DB::table('customers')->where('status',1)->get();
		foreach($data as $row){
			if($val!=NULL && $val==$row->id){
				echo '<option value="'.$row->id.'" selected>'.$row->cus_code.' - '.$row->cus_name.'</option>';
			}else{
				echo '<option value="'.$row->id.'">'.$row->cus_code.' - '.$row->cus_name.'</option>';
			}
		}
    }
	//////////////////////////////////////Categote///////////////////////////////////
	public static function getCatogery($parent_id,$level=0,$selected_id=0){
        $minus="";
        $res = ItemCategory::where('parent_id','=',$parent_id)->get();
        for($i=$level; $i>0; $i--){
            $minus .= "  -- ";
        }
        foreach($res as $row){
            $name = $row->category_name;
            $id = $row->id;
            $sl="";
            if($row->id == $selected_id ) $sl = "selected";
            echo '<option '.$sl.' value="'.$id.'">'.$minus.$row->category_code.' ('.$name.')</option>';
            $i++;
            self::getCatogery($id,$level+1,$selected_id);
        }
    }
    
	////////////////////// payment term ///////////////////////////////
    public static function getPaymentTerm($val=NULL){
        $data = DB::table('payment_terms')->select('id',DB::raw('CONCAT(term_code," (",term_desc,")")AS name'))->get();
		foreach($data as $row){
			if($val!=NULL && $val=$row->id){
				echo '<option value="'.$row->id.'" selected>'.$row->name.'</option>';
			}else{
				echo '<option value="'.$row->id.'">'.$row->name.'</option>';
			}
		}
    }
	
	////////////////////// unit stock ///////////////////////////////
    public static function getUnitStock($val=NULL){
        $data = DB::table('unit_converts')->select(['to_code','to_desc'])->distinct('to_code')->get();
		foreach($data as $row){
			if($val!=NULL && $val==$row->to_code){
				echo '<option value="'.$row->to_code.'" selected>'.$row->to_code.' ('.$row->to_desc.')</option>';
			}else{
				echo '<option value="'.$row->to_code.'">'.$row->to_code.' ('.$row->to_desc.')</option>';
			}
		}
    }
	
	////////////////////// unit sale ///////////////////////////////
	public static function getUnitSale($val=NULL){
		$data = DB::table('unit_converts')->select('from_code','from_desc')->get();
		foreach($data as $row){
			if($val!=NULL && $val==$row->from_code){
				echo '<option value="'.$row->from_code.'" selected>'.$row->from_code.' ('.$row->from_desc.')</option>';
			}else{
				echo '<option value="'.$row->from_code.'">'.$row->from_code.' ('.$row->from_desc.')</option>';
			}
		}
    }
	
	////////////////////// unit purchase ///////////////////////////////
	public static function getUnitPurchase($stock=NULL,$val=NULL){
		if($stock!=NULL){
			$data = DB::table('unit_converts')->select('from_code','from_desc')->where('to_code',$stock)->get();
			foreach($data as $row){
				if($val!=NULL && $val==$row->from_code){
					echo '<option value="'.$row->from_code.'" selected>'.$row->from_code.' ('.$row->from_desc.')</option>';
				}else{
					echo '<option value="'.$row->from_code.'">'.$row->from_code.' ('.$row->from_desc.')</option>';
				}
			}
		}
    }
	
	////////////////////// unit purchase with item_id ///////////////////////////////
	public static function getUnitPurchaseItem($item_id=NULL,$val=NULL){
		if($item_id!=NULL){
			$item = Items::find($item_id);
			if($item){
				$data = DB::table('unit_converts')->select('from_code','from_desc')->where('to_code',$item->unit_stock)->get();
				foreach($data as $row){
					if($val!=NULL && $val==$row->from_code){
						echo '<option value="'.$row->from_code.'" selected>'.$row->from_code.' ('.$row->from_desc.')</option>';
					}else{
						echo '<option value="'.$row->from_code.'">'.$row->from_code.' ('.$row->from_desc.')</option>';
					}
				}
			}
		}
    }
	
	////////////////////// get supplier ///////////////////////////////
	public static function getSuppliers($val=NULL){
		$data = DB::table('suppliers')->select('id','sup_code','sup_name')->where('status','0')->get();
		foreach($data as $row){
			if($val!=NULL && $val==$row->id){
				echo '<option value="'.$row->id.'" selected>'.$row->sup_code.' ('.$row->sup_name.')</option>';
			}else{
				echo '<option value="'.$row->id.'">'.$row->sup_code.' ('.$row->sup_name.')</option>';
			}
		}
    }
	
	////////////////////// check supplier items ///////////////////////////////
	public static function checkSupplierItem($sup_id=NULL,$item_id=NULL){
		$resp = SupplierItem::select()->where('sup_id',$sup_id)->where('item_id',$item_id)->count();
		return $resp;
    }
	
	////////////////////// check unit sale ///////////////////////////////
	public static function checkUnitPrice($unit_sale=NULL,$item_id=NULL){
		$resp = UnitPrice::select()->where('unit_sale',$unit_sale)->where('item_id',$item_id)->count();
		return $resp;
    }
	
	////////////////////// get items ///////////////////////////////
	public static function getItems($val=NULL){
		$data = DB::table('items')->select('id','item_code','item_name','item_barcode')->where('status','0')->get();
		foreach($data as $row){
			if($val!=NULL && $val==$row->id){
				echo '<option value="'.$row->id.'" selected>'.$row->item_code.' ('.$row->item_name.') /'.$row->item_barcode.'</option>';
			}else{
				echo '<option value="'.$row->id.'">'.$row->item_code.' ('.$row->item_name.') /'.$row->item_barcode.'</option>';
			}
		}
    }
	
	////////////////////// get customer ///////////////////////////////
	public static function getCustomers($val=NULL){
		$data = DB::table('customers')->select('id','cus_code','cus_name')->where('status','0')->get();
		foreach($data as $row){
			if($val!=NULL && $val==$row->id){
				echo '<option value="'.$row->id.'" selected>'.$row->cus_code.' ('.$row->cus_name.')</option>';
			}else{
				echo '<option value="'.$row->id.'">'.$row->cus_code.' ('.$row->cus_name.')</option>';
			}
		}
    }
	////////////////////// get customer ///////////////////////////////
	public static function getProductItem($val=NULL){
		$data = DB::table('items')->select('id','item_code','item_name')->where('status','0')->get();
		foreach($data as $row){
			if($val!=NULL && $val==$row->id){
				echo '<option value="'.$row->id.'" selected>'.$row->item_code.' ('.$row->item_name.')</option>';
			}else{
				echo '<option value="'.$row->id.'">'.$row->item_code.' ('.$row->item_name.')</option>';
			}
		}
    }
    public static function getGroupAccounting(){
    	$data = TableAccountGroup::get();
    	foreach ($data as $key => $value) {
    		echo '<tr style="text-align: center;">';
    		echo '<td>'.$value->id.'</td>';
    		echo '<td>'.$value->ag_name.'</td>';
    		echo '</tr>';
    	}
    }
    ////////////////////// get Account Group ///////////////////////////////
	public static function getAccountGruop($val=NULL){
		$data = TableAccountGroup::get();
		foreach($data as $row){
			if($val!=NULL && $val==$row->id){
				echo '<option value="'.$row->id.'" selected>'.$row->ag_name.'</option>';
			}else{
				echo '<option value="'.$row->id.'">'.$row->ag_name.'</option>';
			}
		}
    }
    ////////////////////// get Account Chart  ///////////////////////////////
	public static function getChartAccount($val=NULL){
		$data = TableAccountType::get();
		foreach($data as $row){
			if($val!=NULL && $val==$row->id){
				echo '<option value="'.$row->id.'" selected>'.$row->at_name.'</option>';
			}else{
				echo '<option value="'.$row->id.'">'.$row->at_name.'</option>';
			}
		}
    }
    ////////////////////// get Account Chart  ///////////////////////////////
	public static function getChartAccounting($val=NULL){
		$data = TableAccountChart::get();
		foreach($data as $row){
			if($val!=NULL && $val==$row->id){
				echo '<option value="'.$row->id.'" selected>'.$row->ac_code.' - '.$row->ac_name.'</option>';
			}else{
				echo '<option value="'.$row->id.'">'.$row->ac_code.' - '.$row->ac_name.'</option>';
			}
		}
    }
    public static function getAllChart($parent_id,$level=0,$selected_id="",$id_code=null){
        $minus="";
        $res = TableAccountChart::join('table_account_types','table_account_types.id','=','table_account_charts.ac_type')->select('table_account_charts.*')
		->where('table_account_charts.parent_id','=',$parent_id);
		if($id_code !=null || $id_code !=""){
			$res = $res->where('table_account_types.at_gruop',$id_code);
		}
		$rows = $res->get();
        for($i=$level; $i>0; $i--){
            $minus .= "  -- ";
        }
        foreach($rows as $row){
            $name = $row->ac_name;
            $id = $row->ac_code;
            $sl="";
            if($row->id == $selected_id ) $sl = "selected";
            echo '<option '.$sl.' value="'.$row->id.'"> '.$minus.$id.' - '.$name.'</option>';
            $i++;
            self::getAllChart($row->id,$level+1,$selected_id,$id_code);
        }
    }
    public static function getAllClass(){
        $res = DB::table('ref_sements')->get();
        foreach($res as $row){
            $name = $row->sement_name;
            $id = $row->id;
            echo '<option value="'.$id.'">'.$name.'</option>';
        }
    }
    ////////////////////// get Account Chart  ///////////////////////////////
	public static function getChartAccountID($val=NULL,$selected=null){
		$data = TableAccountChart::whereIn('id',$val)->get();
		foreach($data as $row){
			if($selected!=NULL && $selected==$row->id){
				echo '<option value="'.$row->id.'" selected>'.$row->ac_code.' - '.$row->ac_name.'</option>';
			}else{
				echo '<option value="'.$row->id.'">'.$row->ac_code.' - '.$row->ac_name.'</option>';
			}
		}
    }
    ////////////////////// Hepers Class ///////////////////////////////
	public static function getClasses($parent_id,$level=0,$selected_id=0){
        $minus="";
        $res = TableClass::where('class_type','=',$parent_id)->get();
        for($i=$level; $i>0; $i--){
            $minus .= "  -- ";
        }
        foreach($res as $row){
            $name = $row->name;
            $id = $row->id;
            $sl="";
            if($row->id == $selected_id ) $sl = "selected";
            echo '<option '.$sl.' value="'.$id.'">'.$minus.$row->name.'</option>';
            $i++;
            self::getClasses($id,$level+1,$selected_id);
        }
    }
    ////////////////////// get Account Chart  ///////////////////////////////
	public static function getTax($val=NULL){
		$data = TableTax::get();
		foreach($data as $row){
			if($val!=NULL && $val==$row->id){
				echo '<option value="'.$row->id.'" selected>'.$row->tax_name.' =  '.$row->tax_vale.'</option>';
			}else{
				echo '<option value="'.$row->id.'">'.$row->tax_name.' =  '.$row->tax_vale.'</option>';
			}
		}
    }
	public static function getAllChartConfig($parent_id,$level=0,$selected_id="",$id_code=null){
        $minus="";
        $res = TableAccountChart::join('table_account_types','table_account_types.id','=','table_account_charts.ac_type')->select('table_account_charts.*')
		->where('table_account_charts.parent_id','=',$parent_id);
		if($id_code !=null || $id_code !=""){
			$res = $res->where('table_account_types.at_gruop',$id_code);
		}
		$rows = $res->get();
        for($i=$level; $i>0; $i--){
            $minus .= "  -- ";
        }
        foreach($rows as $row){
            $name = $row->ac_name;
            $id = $row->ac_code;
            $sl="";
			$data_arr = explode(',',$selected_id);
			if (in_array($row->id,$data_arr)) {
				$selected = " selected='selected'";
			}else{
				$selected = "";
			}
            echo '<option '.$selected.' value="'.$row->id.'"> '.$minus.$id.' - '.$name.'</option>';
            $i++;
            self::getAllChart($row->id,$level+1,$selected_id,$id_code);
        }
    }
	 ////////////////////// get Account Chart  ///////////////////////////////
	public static function getChartAccountConfig($val=NULL){
		$data = TableAccountType::get();
		foreach($data as $row){
			$data_arr = explode(',',$val);
			if (in_array($row->id,$data_arr)) {
				$selected = " selected='selected'";
			}else{
				$selected = "";
			}
			echo '<option value="'.$row->id.'" '.$selected.'>'.$row->at_name.'</option>';
		}
    }
	////////////////////// get Account Chart  ///////////////////////////////
	public static function getAdsentType($val=NULL){
		$data = DB::table('atb_absenttypes')->get();
		foreach($data as $row){
			if($val!=NULL && $val==$row->id){
				echo '<option value="'.$row->id.'" selected>'.$row->att_title.'</option>';
			}else{
				echo '<option value="'.$row->id.'">'.$row->att_title.'</option>';
			}
		}
    }
	public static function getStaff($val=NULL){
		$data = DB::table('atb_staffs')->get();
		foreach($data as $row){
			if($val!=NULL && $val==$row->id){
				echo '<option value="'.$row->id.'" selected>'.$row->fullnameen.' -  '.$row->fullnamekh.'</option>';
			}else{
				echo '<option value="'.$row->id.'">'.$row->fullnameen.'-  '.$row->fullnamekh.'</option>';
			}
		}
    }
	 ////////////////////// get Account Chart  ///////////////////////////////
	public static function getStaffAarray($val=NULL){
		$data = DB::table('atb_staffs')->get();
		foreach($data as $row){
			$data_arr = explode(',',$val);
			if (in_array($row->id,$data_arr)) {
				$selected = " selected='selected'";
			}else{
				$selected = "";
			}
			echo '<option value="'.$row->id.'" '.$selected.'>'.$row->fullnameen.'-  '.$row->fullnamekh.'</option>';
		}
    }
}