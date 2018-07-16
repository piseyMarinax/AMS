<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\Model\AtbDocument;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class DocumentController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
	}
	public function getIndex()
	{

	}
	public function getdocAdd(){
    	return view('admins.document.document');
    }

    public function getDocAddSave(Request $data){

        $validation = Validator::make($data->all(), array('name' => 'required'));
        if($validation->fails()){
            return Redirect::to('admins/document/document')->withErrors($validation);
        }else{
            AtbDocument::insert([
                'docname'=>$data->Input('name'),
                'docstatus'=>$data->Input('status'),
                'docdetail'=>$data->Input('des'),
                'created_at'=>date('Y-m-d')
            ]);
            if($data->Input('btnSaveNew') == "save_new"){
                return Redirect::to('admins/document/document')->with('message','Data has been Insert Successfully !');
            }else{
                return Redirect::to('admins/document/document')->with('message','Data has been Insert Successfully !');
            }
        }

    }
    public function getJsonDoc()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $doc = AtbDocument::select('atb_documents.*',DB::raw('@rownum := @rownum +1 AS rownum'))->get();
        return Datatables::of($doc)
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
							<a class="font-yellow" href="'.url("admins/document/edit").'/'.$vid.'">
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
    public function getDocEdit($id){
        $edit = AtbDocument::find($id);
        return view('admins.document.documentedit',compact('edit'));
    }
    public function updateDataDoc(Request $data){
         $validation = Validator::make($data->all(), array('name' => 'min:3|required'));
        if($validation->fails()){
            return Redirect::to('admins/document/document')->withErrors($validation);
        }else{
            AtbDocument::where('id',$data->Input('id'))->update([
                'docname'=>$data->Input('name'),
                'docstatus'=>$data->Input('status'),
                'docdetail'=>$data->Input('des'),
                'updated_at'=>date('Y-m-d')
            ]);
            if($data->Input('btnSave') == "save"){
                return Redirect::to('admins/document/document')->with('message','Data has been Update Successfully !');
            }
        }
    }
    public function onDelete(Request $request){
		if($request->ajax() && AtbDocument::find($request['id'])){
			AtbDocument::where('id',$request['id'])->delete();
		}
	}
}
