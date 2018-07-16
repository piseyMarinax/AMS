<?php

namespace App\Http\Controllers;

use App\Model\AtbStaff;
use App\Model\tbcusfiles;
use App\Model\tbcusitemprices;
use App\Model\Tbcustomers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
use Datatables;
use Redirect;

class CustomerAmsController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
	}
	public function getIndex()
	{
		return view('ams.cuslist');
	}

    public function getCusAdd(){
		//$getid = DB::select('select * FROM `tb_content` ORDER BY RAND() LIMIT 0,8');
		$getid = DB::table('tbcustomers')->where('cust_trash',0)->orderby('id','DESC')->limit(1)->get();
    	return view('ams.cusadd', compact('getid'));
    }
    public function Outreceipt(){
    	return view('ams.receipt');
    }


    public function getJsonCustomer()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $row = DB::table('tbcustomers')->leftJoin('tbcusttypes','tbcusttypes.id','tbcustomers.cust_tid')
        ->select('tbcustomers.*','tbcusttypes.ct_title',DB::raw('@rownum := @rownum +1 AS rownum'))->orderby('id','DESC')->get();
        return Datatables::of($row)

        ->addColumn('cust_id',function($val){
        	if($val->cust_id < 10){
        		$cust_id = 'AMS-000'.$val->cust_id;
        	}else if($val->cust_id < 100){
        		$cust_id = 'AMS-00'.$val->cust_id;
        	}else if($val->cust_id < 1000){
        		$cust_id = 'AMS-0'.$val->cust_id;
        	}else{
        		$cust_id = 'AMS-'.$val->cust_id;
        	}
            return $cust_id;
        })

        ->addColumn('cust_regdate',function($val){
            return date('d-M-y',strtoTime($val->cust_regdate));
        })

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
                            <a class="font-blue" href="'.url("backend/customers/cview").'/'.$vid.'">
                                <i class="font-blue fa fa-eye"></i> '.trans("template.view").' </a>
                        </li>
                        <i class="devider"></i>
                        <li>
							<a class="font-green" href="'.url("backend/customers/cusedit").'/'.$vid.'?ref=updateprofile">
								<i class="font-green fa fa-edit"></i> '.trans("template.edit").' </a>
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

    public function getJsonCustomers()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $row = AtbStaff::select('atb_staffs.*',DB::raw('@rownum := @rownum +1 AS rownum'))->get();
        return Datatables::of($row)

        ->addColumn('dob',function($val){
            return date('d-M-Y',strtoTime($val->dob));
        })

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
                            <a class="font-blue" href="'.url("backend/customers/cview").'/'.$vid.'">
                                <i class="font-blue fa fa-eye"></i> '.trans("template.view").' </a>
                        </li>
                        <i class="devider"></i>
                        <li>
                            <a class="font-blue" href="'.url("backend/customers/receipt").'">
                                <i class="font-blue fa fa-user-plus"></i> '.' '."Invoice".' </a>
                        </li>
                        <i class="devider"></i>
                        <li>
                            <a class="font-blue" href="'.url("backend/customers/receipt").'">
                                <i class="font-blue fa fa-user-plus"></i> '.' '."Receipt".' </a>
                        </li>
                        <i class="devider"></i>
                        <li>
							<a class="font-green" href="'.url("backend/customers/cusedit").'/'.$vid.'?ref=updateprofile">
								<i class="font-green fa fa-edit"></i> '.trans("template.edit").' </a>
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

    // insert Customer 
    public function insertCustomer(Request $data)
    {
    	$idcount = DB::table('tbcustomers')->where('cust_id',$data['cusid'])->first();
    	if($idcount == ""){
    		$validation = Validator::make($data->all(), array('cusid' => 'required', 'nameen' => 'required', 'reg_date'=>'required'));
    		if($validation->fails()){
                return Redirect::to('backend/customers/add')->withErrors($validation);
            }else{
            	//insert content
            	$valid_extensions = array('doc','docx','xls', 'xlsx', 'jpg','jpeg','png','pdf'); // valid extensions
                $path = 'public/media/'; // upload image to directory
                $datafiles = array(
                        'cfiles' => $_FILES['reffile']
                    );

                $lastid = DB::table('tbcustomers')->insertGetId([
                            'cust_id'	=> $data['cusid'],
                            'cust_name'   => $data['nameen'],
                            'cust_phone'    => $data['phone'],
                            'cust_email'      => $data['email'],
                            'cust_comname'      => $data['namekh'],
                            'cust_tid'      => $data['cus_t'],
                            'cust_status'      => $data['status'],
                            'cust_addr'      => $data['address'],
                            'cust_noted'      => $data['detail'],
                            'cust_regdate'      => date('Y-m-d', strtotime($data['reg_date'])),
                            'cust_regby'      => $data['userid'],
                            'created_at'    => date('Y-m-d H:i:s')
                    	]);
                // insert price
                tbcusitemprices::insert([
                        'cu_id' => $lastid,
                        'items'=>$data['items'],
                        'item_price'=>$data['iprice'],
                        'created_at'=>date('Y-m-d H:i:s'),
                    ]);

                //if have file
                $cfiles = $datafiles['cfiles'];
                for($i=0; $i<count($cfiles['tmp_name']); $i++){
					$file_name = $cfiles['name'][$i];
					$filetmp = $cfiles['tmp_name'][$i];
					if(!empty($cfiles['tmp_name'][$i])){
						// get uploaded file's extension
						$ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
						$finalpro = rand(1000,1000000).$file_name;
						if(in_array($ext, $valid_extensions)){
							$filepath = $path.strtolower($finalpro);
							if(move_uploaded_file($filetmp, $filepath)){
								tbcusfiles::insert([
	                                'cus_id' => $lastid,
	                                'c_files'=>strtolower($finalpro),
	                                'created_at'=>date('Y-m-d H:i:s'),
	                            ]);
							}
						}//end if in_array
						else{
							$message = "File is invalid!"; 
						}//end else invalid picture
					}
				}
				if($data->Input('btnSave') == "save_new"){
                    return Redirect::to('backend/customers/add')->with('message','Data has been Insert Successfully !');
                }else{
                    return Redirect::to('backend/customers/list')->with('message','Data has been Insert Successfully !');
                }
            }
    	}else{
            return Redirect::to('backend/customers/add')->with('message','<span style="color:red;">Customer ID : (<strong> AMS-'.$data["cusid"].'</strong>) is already exists!</span>');
        }
    }
    public function getCusEdit($id){
        $doc = DB::select("SELECT * FROM tbcusfiles WHERE cus_id = ".$id);
    	$cprice = DB::table('tbcusitemprices')->where('cu_id',$id)->get();
        $cus = DB::table('tbcustomers')
                ->LEFTJOIN('tbcusitemprices','tbcustomers.id','tbcusitemprices.cu_id')
                ->LEFTJOIN('tbcusttypes','tbcustomers.cust_tid','tbcusttypes.id')
                ->select('tbcustomers.*','tbcusitemprices.item_price','tbcusitemprices.items','tbcusttypes.ct_title')
                ->WHERE('tbcustomers.id',$id)->get();

        $pro = Tbcustomers::find($id);
        return view('ams.cusedit',compact('pro','cus','doc','cprice'));
    }
    public function getCusEditSave(Request $data)
    {
    	$idcount = DB::table('tbcustomers')->where([
                            ['cust_id', '=', $data['cusid']],
                            ['id', '<>', $data['id']],
                        ])->first();
        if($idcount == ""){
        	$validation = Validator::make($data->all(), array('cusid' => 'required', 'nameen' => 'required', 'reg_date'=>'required'));
    		if($validation->fails()){
                return Redirect::to('backend/customers/cusedit/'.$data["id"].'?ref=updateprofile')->withErrors($validation);
            }else{
            	//Update content
            	$valid_extensions = array('doc','docx','xls', 'xlsx', 'jpg','jpeg','png','pdf'); // valid extensions
                $path = 'public/media/'; // upload image to directory
                $datafiles = array(
                        'cfiles' => $_FILES['reffile']
                    );

                Tbcustomers::where('id',$data->Input('id'))->update([
                        'cust_id'	=> $data['cusid'],
                        'cust_name'   => $data['nameen'],
                        'cust_phone'    => $data['phone'],
                        'cust_email'      => $data['email'],
                        'cust_comname'      => $data['namekh'],
                        'cust_tid'      => $data['cus_t'],
                        'cust_status'      => $data['status'],
                        'cust_addr'      => $data['address'],
                        'cust_noted'      => $data['detail'],
                        'cust_regdate'      => date('Y-m-d', strtotime($data['reg_date'])),
                        'cust_regby'      => $data['userid'],
                        'updated_at'    => date('Y-m-d H:i:s')
                    ]);
                // insert price
                tbcusitemprices::where('cu_id',$data->Input('cusid'))->update([
                        'items'=>$data['items'],
                        'item_price'=>$data['iprice'],
                        'updated_at'=>date('Y-m-d H:i:s'),
                    ]);

                //if have file
                $cfiles = $datafiles['cfiles'];
                for($i=0; $i<count($cfiles['tmp_name']); $i++){
					$file_name = $cfiles['name'][$i];
					$filetmp = $cfiles['tmp_name'][$i];
					if(!empty($cfiles['tmp_name'][$i])){
						// get uploaded file's extension
						$ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
						$finalpro = rand(1000,1000000).$file_name;
						if(in_array($ext, $valid_extensions)){
							$filepath = $path.strtolower($finalpro);
							if(move_uploaded_file($filetmp, $filepath)){
								tbcusfiles::insert([
	                                'cus_id' => $data['cusid'],
	                                'c_files'=>strtolower($finalpro),
	                                'created_at'=>date('Y-m-d H:i:s'),
	                            ]);
							}
						}//end if in_array
						else{
							$message = "File is invalid!"; 
						}//end else invalid picture
					}
				}
				if($data->Input('btnSave') == "save_new"){
                    return Redirect::to('backend/customers/cusedit/'.$data["id"].'?ref=updateprofile')->with('message','Data has been Updated Successfully !');
                }else{
                    return Redirect::to('backend/customers/list')->with('message','Data has been Updated Successfully !');
                }
            }
        }else{
            return Redirect::to('backend/customers/cusedit/'.$data["id"].'?ref=updateprofile')->with('message','<span style="color:red;">Customer ID (<strong>'.$data["cust_id"].'</strong>) is already exists!</span>');
        }
    }
    public function custView($id)
    {
    	$doc = DB::select("SELECT * FROM tbcusfiles WHERE cus_id = ".$id);
    	$cprice = DB::table('tbcusitemprices')->where('cu_id',$id)->get();
        $cus = DB::table('tbcustomers')
                ->LEFTJOIN('tbcusitemprices','tbcustomers.id','tbcusitemprices.cu_id')
                ->LEFTJOIN('tbcusttypes','tbcustomers.cust_tid','tbcusttypes.id')
                ->select('tbcustomers.*','tbcusitemprices.item_price','tbcusitemprices.items','tbcusttypes.ct_title')
                ->WHERE('tbcustomers.id',$id)->get();

        $pro = Tbcustomers::find($id);
        return view('ams.cusprofiles',compact('pro','cus','doc','cprice'));
    }
    public function monthReceipt($id)
    {
    	$doc = DB::select("SELECT * FROM tbcusfiles WHERE cus_id = ".$id);
    	$cprice = DB::table('tbcusitemprices')->where('cu_id',$id)->get();
        $cus = DB::table('tbcustomers')
                ->LEFTJOIN('tbcusitemprices','tbcustomers.id','tbcusitemprices.cu_id')
                ->LEFTJOIN('tbcusttypes','tbcustomers.cust_tid','tbcusttypes.id')
                ->select('tbcustomers.*','tbcusitemprices.item_price','tbcusitemprices.items','tbcusttypes.ct_title')
                ->WHERE('tbcustomers.id',$id)->get();

        $pro = Tbcustomers::find($id);
        return view('ams.cusreceipt',compact('pro','cus','doc','cprice'));
    }

    //delete Customer profile
    public function onDelete(Request $request){
		if($request->ajax() && Tbcustomers::find($request['id'])){
			Tbcustomers::where('id',$request['id'])->delete();
		}
	}
}
