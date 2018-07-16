<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Model\AtbStaff;
use App\Model\AtbDept;
use App\Model\AtbFunction;
use App\Model\AtbStafffunction;
use App\Model\AtbStaffstatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class EmpController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
	}
	public function getIndex()
	{
		return view('admins.emp.index');
	}
	public function getEmpAdd(){
		$sstatus = DB::table('atb_statuses')->get();
    	return view('admins.emp.add', compact('sstatus'));
    }

    public function getEmpAddSave(Request $data){
        
        $idcount = DB::table('atb_staffs')->where('idnumber',$data['idcard'])->first();
        if($idcount == ""){
            $validation = Validator::make($data->all(), array('idcard' => 'min:3|required', 'nameen' => 'required', 'sdob'=>'required'));
            if($validation->fails()){
                return Redirect::to('admins/staff/add')->withErrors($validation);
            }else{
                //Insert content
                $valid_extensions = array('jpeg', 'jpg', 'png','bmp'); // valid extensions
                $path = 'assets/employeephoto/'; // upload image to directory
                $datapic = array(
                        'photos' => $_FILES['staffpic']
                    );
                $img = $datapic['photos'];
                $photo = $img['name'];
                $tmp = $img['tmp_name'];
                if(!empty($img['tmp_name'])){
                    // get uploaded file's extension
                    $ext = strtolower(pathinfo($photo, PATHINFO_EXTENSION));
                    // can upload same image using rand function
                    $final_image = rand(1000,1000000).$photo;
                    // check's valid format
                    if(in_array($ext, $valid_extensions)) 
                    {                   
                        $path = $path.strtolower($final_image); 
                            
                        if(move_uploaded_file($tmp,$path)) 
                        {
                            if(!empty($data['sregisterdate']) AND empty($data['sresigndate'])){
                                $lastid = DB::table('atb_staffs')->insertGetId([
                                        'idnumber'     => $data['idcard'],
                                        'fullnamekh'   => $data['namekh'],
                                        'fullnameen'   => $data['nameen'],
                                        'dob'   => date('Y-m-d', strtotime($data['sdob'])),
                                        'gender'   => $data['gen'],
                                        'phone'   => $data['phone'],
                                        'semail'   => $data['email'],
                                        'saddress'   => $data['address'],
                                        'sdateregister'   => date('Y-m-d', strtotime($data['sregisterdate'])),
                                        //'sdateleave'   => date('Y-m-d', strtotime($data['sresigndate'])),
                                        'stafftypeid'   => $data['stype'],
                                        'sdetail'   => $data['detail'],
                                        'sbrandid' => 1,

                                        'sstatus'    => $data['status'],
                                        'added_by' => $data['userid'],
                                        'created_at'    => date('Y-m-d H:i:s'),
                                        'staffphoto'        => strtolower($final_image)
                                ]);

                            }else if(empty($data['sregisterdate']) AND !empty($data['sresigndate'])){
                                $lastid = DB::table('atb_staffs')->insertGetId([
                                        'idnumber'     => $data['idcard'],
                                        'fullnamekh'   => $data['namekh'],
                                        'fullnameen'   => $data['nameen'],
                                        'dob'   => date('Y-m-d', strtotime($data['sdob'])),
                                        'gender'   => $data['gen'],
                                        'phone'   => $data['phone'],
                                        'semail'   => $data['email'],
                                        'saddress'   => $data['address'],
                                        //'sdateregister'   => date('Y-m-d', strtotime($data['sregisterdate'])),
                                        'sdateleave'   => date('Y-m-d', strtotime($data['sresigndate'])),
                                        'stafftypeid'   => $data['stype'],
                                        'sdetail'   => $data['detail'],
                                        'sbrandid' => 1,

                                        'sstatus'    => $data['status'],
                                        'added_by' => $data['userid'],
                                        'created_at'    => date('Y-m-d H:i:s'),
                                        'staffphoto'        => strtolower($final_image)
                                ]);

                            }else if(!empty($data['sregisterdate']) AND !empty($data['sresigndate'])){
                                $lastid = DB::table('atb_staffs')->insertGetId([
                                        'idnumber'     => $data['idcard'],
                                        'fullnamekh'   => $data['namekh'],
                                        'fullnameen'   => $data['nameen'],
                                        'dob'   => date('Y-m-d', strtotime($data['sdob'])),
                                        'gender'   => $data['gen'],
                                        'phone'   => $data['phone'],
                                        'semail'   => $data['email'],
                                        'saddress'   => $data['address'],
                                        'sdateregister'   => date('Y-m-d', strtotime($data['sregisterdate'])),
                                        'sdateleave'   => date('Y-m-d', strtotime($data['sresigndate'])),
                                        'stafftypeid'   => $data['stype'],
                                        'sdetail'   => $data['detail'],
                                        'sbrandid' => 1,

                                        'sstatus'    => $data['status'],
                                        'added_by' => $data['userid'],
                                        'created_at'    => date('Y-m-d H:i:s'),
                                        'staffphoto'        => strtolower($final_image)
                                ]);

                            }else{
                                $lastid = DB::table('atb_staffs')->insertGetId([
                                        'idnumber'     => $data['idcard'],
                                        'fullnamekh'   => $data['namekh'],
                                        'fullnameen'   => $data['nameen'],
                                        'dob'   => date('Y-m-d', strtotime($data['sdob'])),
                                        'gender'   => $data['gen'],
                                        'phone'   => $data['phone'],
                                        'semail'   => $data['email'],
                                        'saddress'   => $data['address'],
                                        //'sdateregister'   => date('Y-m-d', strtotime($data['sregisterdate'])),
                                        //'sdateleave'   => date('Y-m-d', strtotime($data['sresigndate'])),
                                        'stafftypeid'   => $data['stype'],
                                        'sdetail'   => $data['detail'],
                                        'sbrandid' => 1,

                                        'sstatus'    => $data['status'],
                                        'added_by' => $data['userid'],
                                        'created_at'    => date('Y-m-d H:i:s'),
                                        'staffphoto'        => strtolower($final_image)
                                ]);
                            }
                        }                                   
                    } else { return Redirect::to('admins/staff/add')->with('message','Please select image as JPG, PNG, JPEG, BMP !'); }
                }//end empty 
                else{
                       if(!empty($data['sregisterdate']) AND empty($data['sresigndate'])){
                                $lastid = DB::table('atb_staffs')->insertGetId([
                                        'idnumber'     => $data['idcard'],
                                        'fullnamekh'   => $data['namekh'],
                                        'fullnameen'   => $data['nameen'],
                                        'dob'   => date('Y-m-d', strtotime($data['sdob'])),
                                        'gender'   => $data['gen'],
                                        'phone'   => $data['phone'],
                                        'semail'   => $data['email'],
                                        'saddress'   => $data['address'],
                                        'sdateregister'   => date('Y-m-d', strtotime($data['sregisterdate'])),
                                        //'sdateleave'   => date('Y-m-d', strtotime($data['sresigndate'])),
                                        'stafftypeid'   => $data['stype'],
                                        'sdetail'   => $data['detail'],
                                        'sbrandid' => 1,

                                        'sstatus'    => $data['status'],
                                        'added_by' => $data['userid'],
                                        'created_at'    => date('Y-m-d H:i:s'),
                                        //'staffphoto'        => strtolower($final_image)
                                ]);

                            }else if(empty($data['sregisterdate']) AND !empty($data['sresigndate'])){
                                $lastid = DB::table('atb_staffs')->insertGetId([
                                        'idnumber'     => $data['idcard'],
                                        'fullnamekh'   => $data['namekh'],
                                        'fullnameen'   => $data['nameen'],
                                        'dob'   => date('Y-m-d', strtotime($data['sdob'])),
                                        'gender'   => $data['gen'],
                                        'phone'   => $data['phone'],
                                        'semail'   => $data['email'],
                                        'saddress'   => $data['address'],
                                        //'sdateregister'   => date('Y-m-d', strtotime($data['sregisterdate'])),
                                        'sdateleave'   => date('Y-m-d', strtotime($data['sresigndate'])),
                                        'stafftypeid'   => $data['stype'],
                                        'sdetail'   => $data['detail'],
                                        'sbrandid' => 1,

                                        'sstatus'    => $data['status'],
                                        'added_by' => $data['userid'],
                                        'created_at'    => date('Y-m-d H:i:s'),
                                        //'staffphoto'        => strtolower($final_image)
                                ]);

                            }else if(!empty($data['sregisterdate']) AND !empty($data['sresigndate'])){
                                $lastid = DB::table('atb_staffs')->insertGetId([
                                        'idnumber'     => $data['idcard'],
                                        'fullnamekh'   => $data['namekh'],
                                        'fullnameen'   => $data['nameen'],
                                        'dob'   => date('Y-m-d', strtotime($data['sdob'])),
                                        'gender'   => $data['gen'],
                                        'phone'   => $data['phone'],
                                        'semail'   => $data['email'],
                                        'saddress'   => $data['address'],
                                        'sdateregister'   => date('Y-m-d', strtotime($data['sregisterdate'])),
                                        'sdateleave'   => date('Y-m-d', strtotime($data['sresigndate'])),
                                        'stafftypeid'   => $data['stype'],
                                        'sdetail'   => $data['detail'],
                                        'sbrandid' => 1,

                                        'sstatus'    => $data['status'],
                                        'added_by' => $data['userid'],
                                        'created_at'    => date('Y-m-d H:i:s'),
                                        //'staffphoto'        => strtolower($final_image)
                                ]);

                            }else{
                                $lastid = DB::table('atb_staffs')->insertGetId([
                                        'idnumber'     => $data['idcard'],
                                        'fullnamekh'   => $data['namekh'],
                                        'fullnameen'   => $data['nameen'],
                                        'dob'   => date('Y-m-d', strtotime($data['sdob'])),
                                        'gender'   => $data['gen'],
                                        'phone'   => $data['phone'],
                                        'semail'   => $data['email'],
                                        'saddress'   => $data['address'],
                                        //'sdateregister'   => date('Y-m-d', strtotime($data['sregisterdate'])),
                                        //'sdateleave'   => date('Y-m-d', strtotime($data['sresigndate'])),
                                        'stafftypeid'   => $data['stype'],
                                        'sdetail'   => $data['detail'],
                                        'sbrandid' => 1,

                                        'sstatus'    => $data['status'],
                                        //'added_by'      => $data['added_by'],
                                        'created_at'    => date('Y-m-d H:i:s'),
                                        //'staffphoto'        => strtolower($final_image)
                                ]);
                            } 
                }//end of else of if image !empty
                /*
                if($lastid > 0){
                    $path1 = 'assets/employeephoto/fileref/';
                    $vali_extensions = array('doc','docx','xls', 'xlsx', 'jpg','jpeg','png','pdf');
                    if(count($data->stStatus)>0){
                        for($i=0; $i < count($data->stStatus); $i++){
                            $sissue = ""; $expire = "";
                            if(!empty($data->sissuedate[$i])){
                                $sissue = $data->sissuedate[$i];
                            }else{$sissue = '0000-00-00';}
                            if(!empty($data->sexpiredate[$i])){
                                $expire = $data->sexpiredate[$i];
                            }else{$expire = '0000-00-00';}
                            
                            AtbStaffstatus::insert([
                                'statid' => $data->stStatus[$i],
                                'staffid'=> $lastid,
                                'sta_issuedate'=>date('Y-m-d',strtotime($sissue)),
                                'sta_expiredate'=>date('Y-m-d',strtotime($expire)),
                                'sta_status'=>$data->statusst[$i],
                                'created_at'=>date('Y-m-d'),
                            ]);
                        }
                    }
                }*/

                if($data->Input('btnSaveNew') == "save_new"){
                    return Redirect::to('admins/staff/add')->with('message','Data has been Insert Successfully !');
                }else{
                    return Redirect::to('admins/staff/emplist')->with('message','Data has been Insert Successfully !');
                }
                
            }//end else validate and insert data
        }else{
            return Redirect::to('admins/staff/add')->with('message','<span style="color:red;">ID Number (<strong>'.$data["idcard"].'</strong>) is already exists!</span>');
        }
        
    }
    public function getJsonStaff()
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
                            <a class="font-blue" href="'.url("admins/staff/profilesdetail").'/'.$vid.'?ref=profiledetail">
                                <i class="font-blue fa fa-eye"></i> '.trans("template.view").' </a>
                        </li>
                        <i class="devider"></i>
                        <li>
                            <a class="font-blue" href="'.url("admins/staff/stfunction").'/'.$vid.'?ref=position">
                                <i class="font-blue fa fa-user-plus"></i> '.trans("template.add").' '.trans("template.function").' </a>
                        </li>
                        <i class="devider"></i>
                        <li>
                            <a class="font-blue" href="'.url("admins/staff/stdocument").'/'.$vid.'?ref=document">
                                <i class="font-blue fa fa-file"></i> '.trans("template.add").' '.trans("template.document").' </a>
                        </li>
                        <i class="devider"></i>
                        <li>
                            <a class="font-blue" href="'.url("admins/staff/stsalaries").'/'.$vid.'?ref=monthlysalaries">
                                <i class="font-blue fa fa-money"></i> '.trans("template.add").' '.trans("template.salary").' </a>
                        </li>
                        <i class="devider"></i>
                        <li>
							<a class="font-green" href="'.url("admins/staff/edit").'/'.$vid.'?ref=updateprofile">
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
    public function getStaffEdit($id){
        $edit = AtbStaff::find($id);
        return view('admins.emp.edit',compact('edit'));
    }
    public function getProfileStaff($id){
        $sal = DB::select("SELECT * FROM atb_salaries WHERE staffid = ".$id);
        $doc = DB::select("SELECT * FROM atb_staffdocs sd LEFT JOIN atb_documents d ON sd.sddocid = d.id WHERE sd.sdstaffid = ".$id);
        $stfun = DB::table('atb_stafffunctions')
                ->LEFTJOIN('atb_functions','atb_stafffunctions.sffuncid','atb_functions.id')
                ->LEFTJOIN('atb_depts','atb_stafffunctions.sfdeptid','atb_depts.id')
                ->select('atb_stafffunctions.*','atb_functions.functitle','atb_depts.dept')
                ->WHERE('sfstaffid',$id)->get();

        $pro = AtbStaff::find($id);
        return view('admins.emp.profiles',compact('pro','stfun','sal','doc'));
    }
    public function getStaffaddfunction($id){
        $dept = DB::table('atb_depts')->get();
        $func = DB::table('atb_functions')->get();
        $edit = AtbStaff::find($id);
        return view('admins.emp.functionadd',compact('edit', 'dept', 'func'));
    }
    public function StaffaddSavefunction(Request $data){
        $exist = DB::table('atb_stafffunctions')->where([
                            ['sfstaffid', '=', $data['id']],
                            ['sfdeptid', '=', $data['dept']],
                            ['sffuncid', '=', $data['func']],
                        ])->first();
        if($exist == ""){

            if(!is_null($data['stopdate'])){
                DB::table('atb_stafffunctions')->insert([
                            'sfstaffid'  => $data['id'],
                            'sfdeptid'   => $data['dept'],
                            'sffuncid' => $data['func'],
                            'sfstartdate' => date('Y-m-d', strtotime($data['startdate'])),
                            'sfenddate' => date('Y-m-d', strtotime($data['stopdate'])),
                            'sfdetail'   => $data['detail'],
                            'sfstatus' => $data['status'],

                            'created_at'=>date('Y-m-d H:i:s')

                        ]);
            }else{
                DB::table('atb_stafffunctions')->insert([
                            'sfstaffid'  => $data['id'],
                            'sfdeptid'   => $data['dept'],
                            'sffuncid' => $data['func'],
                            'sfstartdate' => date('Y-m-d', strtotime($data['startdate'])),
                            'sfdetail'   => $data['detail'],
                            'sfstatus' => $data['status'],

                            'created_at'=>date('Y-m-d H:i:s')

                        ]);
            }
            if($data->Input('btnSaveNew') == "save_new"){
                    return Redirect::to('admins/staff/stfunction/'.$data["id"].'?ref=position')->with('message','Function has been insert Successfully !');
                }else{
                    return Redirect::to('admins/staff/emplist')->with('message','Function has been insert Successfully !');
                }
            
        }else{
            return Redirect::to('admins/staff/stfunction/'.$data["id"].'?ref=position')->with('message','This Staff already with this function!');
        }

    }
    public function getStaffaddDocument($id){
        $doc = DB::table('atb_documents')->get();
        $edit = AtbStaff::find($id);
        return view('admins.emp.documentadd',compact('edit','doc'));
    }
    public function StaffaddSavedocument(Request $data){
        
        //var_dump($data);

        if(!is_null($data['issueddate']) AND !is_null($data['expireddate'])){
            $lastsdid = DB::table('atb_staffdocs')->insertGetId([
                            'sdstaffid'     => $data['id'],
                            'sddocid'   => $data['doctype'],
                            'sdtitlenumber'   => $data['title'],
                            'sdissuedate'   => date('Y-m-d', strtotime($data['issueddate'])),
                            'sdexpiredate'   => date('Y-m-d', strtotime($data['expireddate'])),
                            'sddetail'   => $data['detail'],
                            'sdstatus'    => $data['status'],
                            'created_at'    => date('Y-m-d H:i:s'),
                    ]);
        }else if(!is_null($data['issueddate']) AND is_null($data['expireddate'])){
            $lastsdid = DB::table('atb_staffdocs')->insertGetId([
                            'sdstaffid'     => $data['id'],
                            'sddocid'   => $data['doctype'],
                            'sdtitlenumber'   => $data['title'],
                            'sdissuedate'   => date('Y-m-d', strtotime($data['issueddate'])),
                            //'sdexpiredate'   => date('Y-m-d', strtotime($data['expireddate'])),
                            'sddetail'   => $data['detail'],
                            'sdstatus'    => $data['status'],
                            'created_at'    => date('Y-m-d H:i:s'),
                    ]);
        }else if(is_null($data['issueddate']) AND !is_null($data['expireddate'])){
            $lastsdid = DB::table('atb_staffdocs')->insertGetId([
                            'sdstaffid'     => $data['id'],
                            'sddocid'   => $data['doctype'],
                            'sdtitlenumber'   => $data['title'],
                            //'sdissuedate'   => date('Y-m-d', strtotime($data['issueddate'])),
                            'sdexpiredate'   => date('Y-m-d', strtotime($data['expireddate'])),
                            'sddetail'   => $data['detail'],
                            'sdstatus'    => $data['status'],
                            'created_at'    => date('Y-m-d H:i:s'),
                    ]);
        }else if(is_null($data['issueddate']) AND is_null($data['expireddate'])){
            $lastsdid = DB::table('atb_staffdocs')->insertGetId([
                            'sdstaffid'     => $data['id'],
                            'sddocid'   => $data['doctype'],
                            'sdtitlenumber'   => $data['title'],
                            //'sdissuedate'   => date('Y-m-d', strtotime($data['issueddate'])),
                            //'sdexpiredate'   => date('Y-m-d', strtotime($data['expireddate'])),
                            'sddetail'   => $data['detail'],
                            'sdstatus'    => $data['status'],
                            'created_at'    => date('Y-m-d H:i:s'),
                    ]);
        }
        // insert file to table

        if($data->Input('btnSaveNew') == "save_new"){
            return Redirect::to('admins/staff/stdocument/'.$data["id"].'?ref=document')->with('message','Document has been insert Successfully !');
        }else{
            return Redirect::to('admins/staff/emplist')->with('message','Document has been insert Successfully !');
        }
    }
    public function getStaffaddSalary($id){
        $edit = AtbStaff::find($id);
        return view('admins.emp.salariesadd',compact('edit'));
    }
    public function StaffaddSaveSalary(Request $data){
        if(!is_null($data['expireddate'])){
                DB::table('atb_salaries')->insert([
                            'staffid'  => $data['id'],
                            'salary' => $data['salamount'],
                            'startdate' => date('Y-m-d', strtotime($data['startingdate'])),
                            'expiredate' => date('Y-m-d', strtotime($data['expireddate'])),
                            'sadetail'   => $data['detail'],
                            'dstatus' => $data['status'],

                            'created_at'=>date('Y-m-d H:i:s')

                        ]);
            }else{
                DB::table('atb_salaries')->insert([
                            'staffid'  => $data['id'],
                            'salary' => $data['salamount'],
                            'startdate' => date('Y-m-d', strtotime($data['startingdate'])),
                            'sadetail'   => $data['detail'],
                            'dstatus' => $data['status'],

                            'created_at'=>date('Y-m-d H:i:s')

                        ]);
            }
            if($data->Input('btnSaveNew') == "save_new"){
                    return Redirect::to('admins/staff/stsalaries/'.$data["id"].'?ref=monthlysalaries')->with('message','Data has been insert Successfully !');
            }else{
                return Redirect::to('admins/staff/emplist')->with('message','Data has been insert Successfully !');
            }
    }
    public function updateDataEmp(Request $data){
        $idcount = DB::table('atb_staffs')->where([
                            ['idnumber', '=', $data['idcard']],
                            ['id', '<>', $data['id']],
                        ])->first();
        if($idcount == ""){
            $validation = Validator::make($data->all(), array('idcard' => 'min:3|required', 'nameen' => 'required', 'sdob'=>'required'));
            if($validation->fails()){
                return Redirect::to('admins/staff/edit/'.$data["id"].'?ref=updateprofile')->withErrors($validation);
            }else{
                //Insert content
                $regis = "1200-01-01"; if(!is_null($data['sregisterdate'])){$regis = date('Y-m-d', strtotime($data['sregisterdate']));}
                $resi = "1200-01-01"; if(!is_null($data['sresigndate'])){$resi = date('Y-m-d', strtotime($data['sresigndate']));}

                $valid_extensions = array('jpeg', 'jpg', 'png','bmp'); // valid extensions
                $path = 'assets/employeephoto/'; // upload image to directory
                $datapic = array(
                        'photos' => $_FILES['staffpic']
                    );
                $img = $datapic['photos'];
                $photo = $img['name'];
                $tmp = $img['tmp_name'];
                if(!empty($img['tmp_name'])){
                    // get uploaded file's extension
                    $ext = strtolower(pathinfo($photo, PATHINFO_EXTENSION));
                    // can upload same image using rand function
                    $final_image = rand(1000,1000000).$photo;
                    // check's valid format
                    if(in_array($ext, $valid_extensions)) 
                    {                   
                        $path = $path.strtolower($final_image); 
                            
                        if(move_uploaded_file($tmp,$path)) 
                        {
                            AtbStaff::where('id',$data->Input('id'))->update([
                                'idnumber'     => $data['idcard'],
                                'fullnamekh'   => $data['namekh'],
                                'fullnameen'   => $data['nameen'],
                                'dob'   => date('Y-m-d', strtotime($data['sdob'])),
                                'gender'   => $data['gen'],
                                'phone'   => $data['phone'],
                                'semail'   => $data['email'],
                                'saddress'   => $data['address'],
                                'sdateregister'   => date('Y-m-d', strtotime($regis)),
                                'sdateleave'   => date('Y-m-d', strtotime($resi)),
                                'stafftypeid'   => $data['stype'],
                                'sdetail'   => $data['detail'],
                                'sbrandid' => 1,
                                'sstatus'    => $data['status'],
                                'staffphoto' => strtolower($final_image),
                                'updated_at'=>date('Y-m-d H:i:s')
                            ]);
                        }                                   
                    } else { return Redirect::to('admins/staff/add')->with('message','Please select image as JPG, PNG, JPEG, BMP !'); }
                }//end empty 
                else{
                    AtbStaff::where('id',$data->Input('id'))->update([
                        'idnumber'     => $data['idcard'],
                        'fullnamekh'   => $data['namekh'],
                        'fullnameen'   => $data['nameen'],
                        'dob'   => date('Y-m-d', strtotime($data['sdob'])),
                        'gender'   => $data['gen'],
                        'phone'   => $data['phone'],
                        'semail'   => $data['email'],
                        'saddress'   => $data['address'],
                        'sdateregister'   => date('Y-m-d', strtotime($regis)),
                        'sdateleave'   => date('Y-m-d', strtotime($resi)),
                        'stafftypeid'   => $data['stype'],
                        'sdetail'   => $data['detail'],
                        'sbrandid' => 1,
                        'sstatus'    => $data['status'],
                        'updated_at'=>date('Y-m-d H:i:s')
                    ]);        
                }//end of else of if image !empty
                
                if($data->Input('btnSaveNew') == "save_new"){
                    return Redirect::to('admins/staff/add')->with('message','Data has been Update Successfully !');
                }else{
                    return Redirect::to('admins/staff/emplist')->with('message','Data has been Update Successfully !');
                }
                
            }//end else validate and insert data
        }else{
            return Redirect::to('admins/staff/edit/'.$data["id"].'?ref=updateprofile')->with('message','<span style="color:red;">ID Number (<strong>'.$data["idcard"].'</strong>) is already exists!</span>');
        }



        /*
         $validation = Validator::make($data->all(), array('name' => 'min:3|required'));
        if($validation->fails()){
            return Redirect::to('admins/staff/emplist')->withErrors($validation);
        }else{
            AtbDocument::where('id',$data->Input('id'))->update([
                'docname'=>$data->Input('name'),
                'docstatus'=>$data->Input('status'),
                'docdetail'=>$data->Input('des'),
                'updated_at'=>date('Y-m-d')
            ]);
            if($data->Input('btnSave') == "save"){
                return Redirect::to('admins/staff/emplist')->with('message','Data has been Update Successfully !');
            }
        }*/
    }
    public function onDelete(Request $request){
		if($request->ajax() && AtbStaff::find($request['id'])){
			AtbStaff::where('id',$request['id'])->delete();
		}
	}
}
