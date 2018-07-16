<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\Model\TableAccountType;
use App\Model\TableAccountChart;
use App\Model\TableAccountGroup;
use App\Model\TableClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;
class ChartAccountController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
	}
	public function getIndex(){
		return view('accounting.chartaccount.index');
	}
	public function getJsonList(){
    	$row = TableAccountChart::Leftjoin('table_account_types','table_account_types.id','=','table_account_charts.ac_type')
        ->Leftjoin('table_account_groups','table_account_groups.id','=','table_account_types.at_gruop')
        ->select('table_account_charts.*','table_account_groups.ag_name','table_account_types.at_name')->get();
        return Datatables::of($row)     
        ->addColumn('action', function ($val) {
                return '
                <div class="btn-group">
                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> '.trans("template.action").'
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li>
                            <a class="font-yellow" href="'.url("/accounting/chart_account/chart_accounting/edit").'/'.$val->id.'">
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
    public function getIndexChartAccount(){
        return view('accounting.chartaccount.chartacc');
    }
	public function getAdd(){
    	return view('accounting.chartaccount.add-chartacc');
    }
    public function insertData(Request $data){
        $validation = Validator::make($data->all(), array('code' => 'max:100|required','name' => 'max:1000|required'));
        if($validation->fails()){
            return Redirect::to('accounting/chart_account/chart_accounting/add')->withErrors($validation);
        }else{
            TableAccountChart::insert([
                'ac_code'=>$data->Input('code'),
                'ac_name'=>$data->Input('name'),
                'ac_type'=>$data->Input('account_type'),
                'parent_id'=>$data->Input('parent_id'),
                'ordering'=>$data->Input('ordering'),
                'des'=>$data->Input('des'),
                'no_trash'=>$data->Input('trash'),
                'created_at'=>date('Y-m-d'),
                'updated_at'=>date('Y-m-d')
            ]);
            if($data->Input('btnSaveNew') == "save_new"){
                return Redirect::to('accounting/chart_account/chart_accounting/add')->with('message','Data has been Insert Successfully !');
            }else{
                return Redirect::to('accounting/chart_account/chart_accounting')->with('message','Data has been Insert Successfully !');
            }
        }
    }
    public function getEdit($id){
        $edit = TableAccountChart::find($id);
        return view('accounting.chartaccount.edit-chartacc',compact('edit'));
    }
    public function updateData(Request $data){
        $validation = Validator::make($data->all(), array('code' => 'max:100|required','name' => 'max:1000|required'));
        if($validation->fails()){
            return Redirect::to('accounting/chart_account/chart_accounting/add')->withErrors($validation);
        }else{
            TableAccountChart::where('id',$data->Input('id'))->update([
                'ac_code'=>$data->Input('code'),
                'ac_name'=>$data->Input('name'),
                'ac_type'=>$data->Input('account_type'),
                'parent_id'=>$data->Input('parent_id'),
                'ordering'=>$data->Input('ordering'),
                'des'=>$data->Input('des'),
                'no_trash'=>$data->Input('trash'),
                'created_at'=>date('Y-m-d'),
                'updated_at'=>date('Y-m-d')
            ]);
            if($data->Input('btnSaveNew') == "save_new"){
                return Redirect::to('accounting/chart_account/chart_accounting/add')->with('message','Data has been Update Successfully !');
            }else{
                return Redirect::to('accounting/chart_account/chart_accounting')->with('message','Data has been Update Successfully !');
            }
        }
    }
    public function getDelete(Request $data){
        if($data->ajax() && TableAccountChart::find($data['id'])){
            $countdistion = TableAccountChart::find($data['id']);
            if($countdistion->no_trash!=1){
                TableAccountChart::where('id',$data['id'])->delete();
            }            
        }
    }
    public function getTypeAccountIndex(){
        return view('accounting.chartaccount.type');
    }
    public function getJsonListTypeAccount(){
        $row = TableAccountType::Leftjoin('table_account_groups','table_account_groups.id','=','table_account_types.at_gruop')
        ->select('table_account_types.*','table_account_groups.ag_name')->get();
        return Datatables::of($row)     
        ->addColumn('action', function ($val) {
                return '
                <div class="btn-group">
                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> '.trans("template.action").'
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li>
                            <a class="font-yellow" href="'.url("/accounting/chart_account/type-account/edit").'/'.$val->id.'">
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
    public function getTypeAccountAdd(){
        return view('accounting.chartaccount.typeadd');
    }
    public function getTypeAccountInsertData(Request $data){
        $validation = Validator::make($data->all(), array('name' => 'max:1000|required'));
        if($validation->fails()){
            return Redirect::to('accounting/chart_account/type-account/add')->withErrors($validation);
        }else{
            TableAccountType::insert([
                'at_name'=>$data->Input('name'),
                'at_gruop'=>$data->Input('parent_id'),
                'des'=>$data->Input('des'),
                'created_at'=>date('Y-m-d'),
                'updated_at'=>date('Y-m-d')
            ]);
            if($data->Input('btnSaveNew') == "save_new"){
                return Redirect::to('accounting/chart_account/type-account/add')->with('message','Data has been Insert Successfully !');
            }else{
                return Redirect::to('accounting/chart_account/type-account')->with('message','Data has been Insert Successfully !');
            }
        }
    }
    public function getTypeAccountEdit($id){
        $edit = TableAccountType::find($id);
        return view('accounting.chartaccount.type-edit',compact('edit'));
    }
    public function updateDataTypeAccount(Request $data){
         $validation = Validator::make($data->all(), array('name' => 'max:1000|required'));
        if($validation->fails()){
            return Redirect::to('accounting/chart_account/type-account/add')->withErrors($validation);
        }else{
            TableAccountType::where('id',$data->Input('id'))->update([
                'at_name'=>$data->Input('name'),
                'at_gruop'=>$data->Input('parent_id'),
                'des'=>$data->Input('des'),
                'created_at'=>date('Y-m-d'),
                'updated_at'=>date('Y-m-d')
            ]);
            if($data->Input('btnSaveNew') == "save_new"){
                return Redirect::to('accounting/chart_account/type-account/add')->with('message','Data has been Update Successfully !');
            }else{
                return Redirect::to('accounting/chart_account/type-account')->with('message','Data has been Update Successfully !');
            }
        }
    }
    public function getDeleteTypeAccount(Request $data){
        if($data->ajax() && TableAccountType::find($data['id'])){
            TableAccountType::where('id',$data['id'])->delete();
        }        
    }
    public function insertClass(Request $data){
        $validation = Validator::make($data->all(), array('class_name' => 'max:200|required'));
        if($validation->fails()){
            return response()->json(['row'=>0,'validation'=>'Name empty please check it.']);
        }else{
            $id = TableClass::insertGetId([
                'name'=>$data->class_name,
                'class_type'=>$data->class_type,
                'status'=>1,
                'created_at'=>date('Y-m-d'),
                'updated_at'=>date('Y-m-d'),
            ]);
            $validation = "Insert Data Successfully ";
            return response()->json(['row'=>TableClass::find($id),'validation'=> $validation]);
        }
    }
}
