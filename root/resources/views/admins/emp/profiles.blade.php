@extends('layouts.app')

@section('content')
<!-- starting page bar profile -->
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
		<li>
			<a href="{{url('/')}}">{{ trans('template.dashboard') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>			
			<span>{{ trans('template.administrative') }}</span>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>{{ trans('template.profile') }}</span>
		</li>
	</ul>
    <div class="page-toolbar">
        <div class="btn-group pull-right">
            <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Go to
                <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
                <li>
                    <a href="{{url('/')}}/admins/staff/emplist">
                        <i class="icon-user"></i> {{ trans('template.employee') }}</a>
                </li><!--
                <li>
                    <a href="#">
                        <i class="icon-shield"></i> Another action</a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-user"></i> Something else here</a>
                </li>
                <li class="divider"> </li>
                <li>
                    <a href="#">
                        <i class="icon-bag"></i> Separated link</a>
                </li>-->
            </ul>
        </div>
    </div>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title"> Employee Profile</h1>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="profile">
    <div class="tabbable-line tabbable-full-width">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#tab_1_1" data-toggle="tab"> Overview </a>
            </li><!--
            <li>
                <a href="#tab_1_3" data-toggle="tab"> Account </a>
            </li>
            <li>
                <a href="#tab_1_6" data-toggle="tab"> Help </a>
            </li>-->
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1_1">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="list-unstyled profile-nav">
                            <li>
                            <?php
                            $pic = $pro->staffphoto; $dateob = date('d-M-Y', strtotime($pro->dob));
                            if(isset($pic)){?>
                            	<img src="{{URL('/')}}/assets/employeephoto/<?php echo $pic;?>" class="img-responsive pic-bordered" alt="" />
                                <a href="{{URL('/')}}/admins/staff/edit/<?php echo $pro->id;?>?ref=updateprofile" class="profile-edit"> Edit</a>
                            <?php
                            }else{?>
                            	<img src="{{URL('assets/pages/img/noimage.png')}}" class="img-responsive pic-bordered" alt="" />
                                <a href="{{URL('/')}}/admins/staff/edit/<?php echo $pro->id;?>?ref=updateprofile" class="profile-edit"> Edit</a>
                            <?php	
                            }
                            ?>
                            </li><!--
                            <li>
                                <a href="javascript:;"> Projects </a>
                            </li>
                            <li>
                                <a href="javascript:;"> Messages
                                    <span> 3 </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;"> Friends </a>
                            </li>
                            <li>
                                <a href="javascript:;"> Settings </a>
                            </li>-->
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12 profile-info">
                                <h1 class="font-green sbold uppercase" style="font-family: KhmerOS;">{{$pro->fullnamekh}}</h1>
                                <h1 class="font-green sbold uppercase">{{$pro->fullnameen}}</h1>
                                <p><b>Address: </b></p>
                                <p> {{$pro->saddress}} </p>
                                <p>
                                    <strong><i class="fa fa-envelope-o"></i> E-mail: </strong><a href="javascript:;"> {{$pro->semail}} </a>  <strong><i class="fa fa-mobile"></i> Phone : </strong><a href="javascript:;"> {{$pro->phone}} </a>
                                </p>
                                <ul class="list-inline"><!--
                                    <li>
                                        <i class="fa fa-map-marker"></i> Spain </li>
                                    <li>
                                        <i class="fa fa-star"></i> Top Seller </li>
                                    <li>
                                        <i class="fa fa-heart"></i> BASE Jumping </li>-->
                                    <li>
                                        <i class="fa fa-calendar"></i> Date of Birth: <?php echo @$dateob;?> </li><!--
                                    <li>
                                        <i class="fa fa-briefcase"></i> Design </li>-->
                                    
                                </ul>
                            </div>
                            <!--end col-md-8--><!--
                            <div class="col-md-4">
                                <div class="portlet sale-summary">
                                    <div class="portlet-title">
                                        <div class="caption font-red sbold"> Sales Summary </div>
                                        <div class="tools">
                                            <a class="reload" href="javascript:;"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <ul class="list-unstyled">
                                            <li>
                                                <span class="sale-info"> TODAY SOLD
                                                    <i class="fa fa-img-up"></i>
                                                </span>
                                                <span class="sale-num"> 23 </span>
                                            </li>
                                            <li>
                                                <span class="sale-info"> WEEKLY SALES
                                                    <i class="fa fa-img-down"></i>
                                                </span>
                                                <span class="sale-num"> 87 </span>
                                            </li>
                                            <li>
                                                <span class="sale-info"> TOTAL SOLD </span>
                                                <span class="sale-num"> 2377 </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>-->
                            <!--end col-md-4-->
                        </div>
                        <!--end row-->
                        <div class="tabbable-line tabbable-custom-profile">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_11" data-toggle="tab"> Functions </a>
                                </li>
                                <li>
                                    <a href="#tab_1_22" data-toggle="tab"> Document </a>
                                </li>
                                <li>
                                    <a href="#tab_1_33" data-toggle="tab"> Salary </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1_11">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-advance table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Function </th>
                                                    <th>
                                                        Department </th>
                                                    <th>
                                                        <i class="fa fa-calendar"></i> Starded date </th>
                                                    <th class="hidden-xs">
                                                        <i class="fa fa-calendar"></i> Expire Date </th>
                                                    <th class="hidden-xs">
                                                        Status </th><!--
                                                    <th> </th>-->
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $nf=0; $len = count($stfun);
                                            foreach($stfun as $sfun){
                                                $nf++;?>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:;"> <?php echo $sfun->functitle; ?> </a>
                                                    </td>
                                                    <td class="hidden-xs"> <?php echo $sfun->dept; ?> </td>
                                                    <td> <?php echo date('d-M-Y', strtotime($sfun->sfstartdate)); ?></td>
                                                    <td><?php if(!is_null($sfun->sfenddate)){echo date('d-M-Y', strtotime($sfun->sfenddate));}?></td>
                                                    <td><?php 
                                                        if($sfun->sfstatus == 1){
                                                            echo '<span class="label label-success label-sm"> Active </span>';
                                                            }else if($sfun->sfstatus == 0){
                                                                echo '<span class="label label-danger label-sm"> Expired </span>';}?></td>
                                                    <!--
                                                    <td>
                                                        <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                                    </td>-->
                                                </tr>
                                            <?php    
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--tab-pane-->
                                <div class="tab-pane " id="tab_1_22">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-advance table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <i class="fa fa-file"></i> Document </th>
                                                    <th>
                                                        <i class="fa fa-file"></i> Document Type </th>
                                                    <th>
                                                        <i class="fa fa-calendar"></i> Issued Date </th>
                                                    <th>
                                                        <i class="fa fa-calendar"></i> Expire Date </th>
                                                    <th>Status </th>
                                                    <th class="hidden-xs">Other</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach($doc as $dkey => $dval){?>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:;"> <?php echo $dval->sdtitlenumber;?> </a>
                                                    </td>
                                                    <td><?php echo $dval->docname;?></td>
                                                    <td><?php if(!is_null($dval->sdissuedate)){echo date('d-M-Y', strtotime($dval->sdissuedate));}?> </td>
                                                    <td><?php if(!is_null($dval->sdexpiredate)){echo date('d-M-Y', strtotime($dval->sdexpiredate));}?>
                                                        
                                                    </td>
                                                    <td><?php if($dval->sdstatus == 1){echo '<span class="label label-success label-sm"> Active </span>';}else if($dval->sdstatus == 0){ echo '<span class="label label-danger label-sm"> Disable </span>';}?></td>
                                                    <td class="hidden-xs"> <?php echo $dval->sddetail;?> </td>
                                                </tr>
                                            <?php    
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_1_33">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-advance table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <i class="fa fa-money"></i> Amount </th>
                                                    <th>
                                                        <i class="fa fa-calendar"></i> Starting Date </th>
                                                    <th>
                                                        <i class="fa fa-calendar"></i> End Date </th>
                                                    <th> Status</th>
                                                    <th class="hidden-xs"> Other</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach($sal as $sakey => $saval){?>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:;"><strong> <?php echo '$ '.number_format($saval->salary,2);?> </strong></a>
                                                    </td>
                                                    <td><?php echo date('d-M-Y', strtotime($saval->startdate));?></td>
                                                    <td> <?php if(!is_null($saval->expiredate)){echo date('d-M-Y', strtotime($saval->expiredate));}?></td>
                                                    <td>
                                                        <?php if($saval->dstatus == 1){echo '<span class="label label-success label-sm"> Active </span>';}else if($saval->dstatus == 0){echo '<span class="label label-danger label-sm"> Disable </span>';}?>
                                                    </td>
                                                    <td class="hidden-xs"> <?php echo $saval->sadetail;?> </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>    
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--tab-pane-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--tab_1_2-->
            <div class="tab-pane" id="tab_1_3">
                <div class="row profile-account">
                    <div class="col-md-3">
                        <ul class="ver-inline-menu tabbable margin-bottom-10">
                            <li class="active">
                                <a data-toggle="tab" href="#tab_1-1">
                                    <i class="fa fa-cog"></i> Personal info </a>
                                <span class="after"> </span>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_2-2">
                                    <i class="fa fa-picture-o"></i> Change Avatar </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_3-3">
                                    <i class="fa fa-lock"></i> Change Password </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_4-4">
                                    <i class="fa fa-eye"></i> Privacity Settings </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div id="tab_1-1" class="tab-pane active">
                                <form role="form" action="#">
                                    <div class="form-group">
                                        <label class="control-label">First Name</label>
                                        <input type="text" placeholder="John" class="form-control" /> </div>
                                    <div class="form-group">
                                        <label class="control-label">Last Name</label>
                                        <input type="text" placeholder="Doe" class="form-control" /> </div>
                                    <div class="form-group">
                                        <label class="control-label">Mobile Number</label>
                                        <input type="text" placeholder="+1 646 580 DEMO (6284)" class="form-control" /> </div>
                                    <div class="form-group">
                                        <label class="control-label">Interests</label>
                                        <input type="text" placeholder="Design, Web etc." class="form-control" /> </div>
                                    <div class="form-group">
                                        <label class="control-label">Occupation</label>
                                        <input type="text" placeholder="Web Developer" class="form-control" /> </div>
                                    <div class="form-group">
                                        <label class="control-label">About</label>
                                        <textarea class="form-control" rows="3" placeholder="We are KeenThemes!!!"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Website Url</label>
                                        <input type="text" placeholder="http://www.mywebsite.com" class="form-control" /> </div>
                                    <div class="margiv-top-10">
                                        <a href="javascript:;" class="btn green"> Save Changes </a>
                                        <a href="javascript:;" class="btn default"> Cancel </a>
                                    </div>
                                </form>
                            </div>
                            <div id="tab_2-2" class="tab-pane">
                                <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                    eiusmod. </p>
                                <form action="#" role="form">
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                    <span class="fileinput-new"> Select image </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <input type="file" name="..."> </span>
                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>
                                        <div class="clearfix margin-top-10">
                                            <span class="label label-danger"> NOTE! </span>
                                            <span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                        </div>
                                    </div>
                                    <div class="margin-top-10">
                                        <a href="javascript:;" class="btn green"> Submit </a>
                                        <a href="javascript:;" class="btn default"> Cancel </a>
                                    </div>
                                </form>
                            </div>
                            <div id="tab_3-3" class="tab-pane">
                                <form action="#">
                                    <div class="form-group">
                                        <label class="control-label">Current Password</label>
                                        <input type="password" class="form-control" /> </div>
                                    <div class="form-group">
                                        <label class="control-label">New Password</label>
                                        <input type="password" class="form-control" /> </div>
                                    <div class="form-group">
                                        <label class="control-label">Re-type New Password</label>
                                        <input type="password" class="form-control" /> </div>
                                    <div class="margin-top-10">
                                        <a href="javascript:;" class="btn green"> Change Password </a>
                                        <a href="javascript:;" class="btn default"> Cancel </a>
                                    </div>
                                </form>
                            </div>
                            <div id="tab_4-4" class="tab-pane">
                                <form action="#">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus.. </td>
                                            <td>
                                                <div class="mt-radio-inline">
                                                    <label class="mt-radio">
                                                        <input type="radio" name="optionsRadios1" value="option1" /> Yes
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" name="optionsRadios1" value="option2" checked/> No
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                            <td>
                                                <div class="mt-radio-inline">
                                                    <label class="mt-radio">
                                                        <input type="radio" name="optionsRadios21" value="option1" /> Yes
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" name="optionsRadios21" value="option2" checked/> No
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                            <td>
                                                <div class="mt-radio-inline">
                                                    <label class="mt-radio">
                                                        <input type="radio" name="optionsRadios31" value="option1" /> Yes
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" name="optionsRadios31" value="option2" checked/> No
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                            <td>
                                                <div class="mt-radio-inline">
                                                    <label class="mt-radio">
                                                        <input type="radio" name="optionsRadios41" value="option1" /> Yes
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" name="optionsRadios41" value="option2" checked/> No
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <!--end profile-settings-->
                                    <div class="margin-top-10">
                                        <a href="javascript:;" class="btn green"> Save Changes </a>
                                        <a href="javascript:;" class="btn default"> Cancel </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end col-md-9-->
                </div>
            </div>
            <!--end tab-pane--><!--
            <div class="tab-pane" id="tab_1_6">
                <div class="row">
                    <div class="col-md-2">
                        <ul class="ver-inline-menu tabbable margin-bottom-10">
                            <li class="active">
                                <a data-toggle="tab" href="#tab_1">
                                    <i class="fa fa-briefcase"></i> General Questions </a>
                                <span class="after"> </span>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_2">
                                    <i class="fa fa-group"></i> Membership </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_3">
                                    <i class="fa fa-leaf"></i> Terms Of Service </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_1">
                                    <i class="fa fa-info-circle"></i> License Terms </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_2">
                                    <i class="fa fa-tint"></i> Payment Rules </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_3">
                                    <i class="fa fa-plus"></i> Other Questions </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-10">
                        <div class="tab-content">
                            <div id="tab_1" class="tab-pane active">
                                <div id="accordion1" class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_1"> 1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
                                            </h4>
                                        </div>
                                        <div id="accordion1_1" class="panel-collapse collapse in">
                                            <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                                                laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                                wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably
                                                haven't heard of them accusamus labore sustainable VHS. </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_2"> 2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
                                            </h4>
                                        </div>
                                        <div id="accordion1_2" class="panel-collapse collapse">
                                            <div class="panel-body"> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit,
                                                enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                                ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore
                                                sustainable VHS. </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_3"> 3. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor ? </a>
                                            </h4>
                                        </div>
                                        <div id="accordion1_3" class="panel-collapse collapse">
                                            <div class="panel-body"> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit,
                                                enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                                ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore
                                                sustainable VHS. </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-warning">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_4"> 4. Wolf moon officia aute, non cupidatat skateboard dolor brunch ? </a>
                                            </h4>
                                        </div>
                                        <div id="accordion1_4" class="panel-collapse collapse">
                                            <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-danger">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_5"> 5. Leggings occaecat craft beer farm-to-table, raw denim aesthetic ? </a>
                                            </h4>
                                        </div>
                                        <div id="accordion1_5" class="panel-collapse collapse">
                                            <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.
                                                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_6"> 6. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth ? </a>
                                            </h4>
                                        </div>
                                        <div id="accordion1_6" class="panel-collapse collapse">
                                            <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.
                                                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_7"> 7. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft ? </a>
                                            </h4>
                                        </div>
                                        <div id="accordion1_7" class="panel-collapse collapse">
                                            <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.
                                                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab_2" class="tab-pane">
                                <div id="accordion2" class="panel-group">
                                    <div class="panel panel-warning">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_1"> 1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
                                            </h4>
                                        </div>
                                        <div id="accordion2_1" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                                    nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                                                    beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                                    you probably haven't heard of them accusamus labore sustainable VHS. </p>
                                                <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                                    nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                                                    beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                                    you probably haven't heard of them accusamus labore sustainable VHS. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-danger">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_2"> 2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
                                            </h4>
                                        </div>
                                        <div id="accordion2_2" class="panel-collapse collapse">
                                            <div class="panel-body"> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit,
                                                enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                                ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore
                                                sustainable VHS. </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_3"> 3. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor ? </a>
                                            </h4>
                                        </div>
                                        <div id="accordion2_3" class="panel-collapse collapse">
                                            <div class="panel-body"> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit,
                                                enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                                ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore
                                                sustainable VHS. </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_4"> 4. Wolf moon officia aute, non cupidatat skateboard dolor brunch ? </a>
                                            </h4>
                                        </div>
                                        <div id="accordion2_4" class="panel-collapse collapse">
                                            <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_5"> 5. Leggings occaecat craft beer farm-to-table, raw denim aesthetic ? </a>
                                            </h4>
                                        </div>
                                        <div id="accordion2_5" class="panel-collapse collapse">
                                            <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.
                                                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_6"> 6. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth ? </a>
                                            </h4>
                                        </div>
                                        <div id="accordion2_6" class="panel-collapse collapse">
                                            <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.
                                                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_7"> 7. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft ? </a>
                                            </h4>
                                        </div>
                                        <div id="accordion2_7" class="panel-collapse collapse">
                                            <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.
                                                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab_3" class="tab-pane">
                                <div id="accordion3" class="panel-group">
                                    <div class="panel panel-danger">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_1"> 1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
                                            </h4>
                                        </div>
                                        <div id="accordion3_1" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                                    nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. </p>
                                                <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                                    nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. </p>
                                                <p> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica,
                                                    craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth
                                                    nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_2"> 2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
                                            </h4>
                                        </div>
                                        <div id="accordion3_2" class="panel-collapse collapse">
                                            <div class="panel-body"> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit,
                                                enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                                ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore
                                                sustainable VHS. </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_3"> 3. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor ? </a>
                                            </h4>
                                        </div>
                                        <div id="accordion3_3" class="panel-collapse collapse">
                                            <div class="panel-body"> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit,
                                                enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                                ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore
                                                sustainable VHS. </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_4"> 4. Wolf moon officia aute, non cupidatat skateboard dolor brunch ? </a>
                                            </h4>
                                        </div>
                                        <div id="accordion3_4" class="panel-collapse collapse">
                                            <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_5"> 5. Leggings occaecat craft beer farm-to-table, raw denim aesthetic ? </a>
                                            </h4>
                                        </div>
                                        <div id="accordion3_5" class="panel-collapse collapse">
                                            <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.
                                                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_6"> 6. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth ? </a>
                                            </h4>
                                        </div>
                                        <div id="accordion3_6" class="panel-collapse collapse">
                                            <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.
                                                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_7"> 7. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft ? </a>
                                            </h4>
                                        </div>
                                        <div id="accordion3_7" class="panel-collapse collapse">
                                            <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.
                                                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <!--end tab-pane-->
        </div>
    </div>
</div>

<!-- end page bar profile -->

@endsection()
@section('javascript')
<script type="text/javascript">
function converQuot(value){
	return value.replace(/&quot;/g,'\"');
}	
var template = Handlebars.compile($("#details-template").html());
$.fn.dataTable.ext.errMode = 'throw';
$('#table-absentType').DataTable();
/*var table = $('#table-absentType').DataTable({
	processing: true,
	serverSide: true,
	ajax: '{{url("/admins/absentt/listtype")}}',
	columns: [
		{data:'id'},
		{data:'att_title'},
		{data:'attdetail'},
		{data:'attstatus'},
		{data:'action'},
	],'fnCreatedRow':function(nRow,aData,iDataIndex){
		var satatus ="";
		if(aData['attstatus']== 1){
			satatus = '<button class="btn blue btn-xs dropdown-toggle">{{trans("template.active")}}</button>';
		}else{
			satatus = '<button class="btn blue btn-xs dropdown-toggle">{{trans("template.disable")}}</button>';
		}
		$('td:eq(3)',nRow).html(satatus);
	}
});*/
var push_data =[];
var table = $('#table-emp').DataTable({
	processing: true,
	serverSide: true,
	ajax: '{{url("/admins/staff/getJsonEmp")}}',
	columns: [
		{data: 'rownum'},
		{data:'idnumber'},
		{data:'action'},
		//{data:'staffphoto'},
		{data:'fullnamekh'},
		{data:'fullnameen'},
		{data:'gender'},
		{data:'dob'},
		{data:'phone'},
		{data:'semail'},
		{data:'sstatus'},
	],'fnCreatedRow':function(nRow,aData,iDataIndex){
		var satatus ="";
		if(aData['sstatus']== 1){
			satatus = '<button class="btn blue btn-xs dropdown-toggle">{{trans("template.active")}}</button>';
		}else{
			satatus = '<button class="btn blue btn-xs dropdown-toggle">{{trans("template.disable")}}</button>';
		}
		$('td:eq(9)',nRow).html(satatus);

/*
		var images = "";
		if(aData['staffphoto']){
			images = '<img src="{{url('')}}/assets/employeephoto/'+aData['staffphoto']+'" width="100" >';
		}else{images = 'No Photo';}
		$('td:eq(3)',nRow).html(images);*/

	},initComplete:function(setting,json){
		//console.log(json.data);
		push_data.push(json.data);
		var datastr ='';
		$.each(json.data,function(index,Row){
			datastr+="<tr>";
				datastr+="<td><img src='{{url('/assets/employeephoto')}}//"+Row.staffphoto+"' width='100' ></td>";
				datastr+="<td>"+Row.dob+"</td>";
				datastr+="<td>"+Row.dob+"</td>";
				datastr+="<td>"+Row.dob+"</td>";
				datastr+="<td>"+Row.dob+"</td>";
			datastr+="</tr>";
		});
		$('#table-absentType tbody').html(datastr);
	}
});

function onDeleteType(id){
	var _token = $("input[name=_token]").val();
	App.doDelete("{{ trans('template.delete').' '.trans('template.type') }}","{{trans('template.message_delete').' '.trans('template.type').' ?'}}",'/admins/absenttType/delete',id,'post',_token);
}
var table = $('#table-ar').DataTable({
	processing: true,
	serverSide: true,
	ajax: '{{url("/accounting/account_receivable/list")}}',
	columns: [
		{
			"class":'details-control',
			"orderable":false,
			"searchable":false,
			"data":null,
			"defaultContent":''
		},
		{data: 'code'},
		{data: 'customer_name'},
		{data: 'amount'},
		{data: 'ar_date'},
		{data: 'user_name'},
		{data: 'status'},
		{data: 'amount'},
		{data: 'action', orderable: false, searchable: false},
	],'fnCreatedRow':function(nRow,aData,iDataIndex){
		var data_remaining = JSON.parse(converQuot(aData['remaining']));
		var amount_ar = aData['amount_ar'];
		var amount_paid = 0;
		var amount_apply =0;
		var amount_credit=0;
		$.each(data_remaining,function(index,DataRow){
			if(DataRow.action == 2 || DataRow.action == 3){
				amount_paid = amount_paid+parseFloat(DataRow.total_amount);
			}
			if(DataRow.action==5){
				amount_apply = amount_apply+parseFloat(DataRow.apply_amount);
			}
			if(DataRow.apply_amount<0){
				amount_credit = amount_credit+parseFloat(DataRow.apply_amount);
			}
		});
		var amount_remaining = amount_paid - amount_apply + amount_credit;
		if(amount_remaining !=0){					
				if((amount_ar - amount_remaining)> 0){
					if(parseFloat(amount_ar) - parseFloat(amount_remaining)- parseFloat(amount_appyle)==0){
						$('td:eq(6)',nRow).html('<button class="btn green btn-xs dropdown-toggle">Paid</button>').addClass("text-center");	
						$('td:eq(7)',nRow).html('<button class="btn green btn-xs dropdown-toggle">'+formatCurrency(0)+'</button>').addClass("text-center");	
					}else{
						$('td:eq(6)',nRow).html('<button class="btn yellow btn-xs dropdown-toggle">Partial Paid</button>').addClass("text-center");	
						$('td:eq(7)',nRow).html('<button class="btn yellow btn-xs dropdown-toggle">'+formatCurrency(parseFloat(amount_ar) - parseFloat(amount_remaining))+'</button>').addClass("text-center");	
					}
				}else{
					if((amount_ar - amount_remaining) < 0){
						amount_remaining = 0;
						$('td:eq(6)',nRow).html('<button class="btn blue btn-xs dropdown-toggle">Owed</button>').addClass("text-center");	
						$('td:eq(7)',nRow).html('<button class="btn blue btn-xs dropdown-toggle">'+formatCurrency(parseFloat(amount_ar))+'</button>').addClass("text-center");	
						$('td:eq(0)',nRow).addClass("text-center");
					}else{
						$('td:eq(6)',nRow).html('<button class="btn green btn-xs dropdown-toggle">Paid</button>').addClass("text-center");	
						$('td:eq(7)',nRow).html('<button class="btn green btn-xs dropdown-toggle">'+formatCurrency(0)+'</button>').addClass("text-center");	
					}
				}
			}else{
				amount_remaining = 0;
				$('td:eq(6)',nRow).html('<button class="btn blue btn-xs dropdown-toggle">Owed</button>').addClass("text-center");	
				$('td:eq(7)',nRow).html('<button class="btn blue btn-xs dropdown-toggle">'+formatCurrency(parseFloat(amount_ar))+'</button>').addClass("text-center");	
				$('td:eq(0)',nRow).addClass("text-center");	
			}
			if(aData['referent'] == 1){
				$('td:eq(6)',nRow).html('<button class="btn green btn-xs dropdown-toggle">Paid</button>').addClass("text-center");
				$('td:eq(7)',nRow).html('<button class="btn green btn-xs dropdown-toggle">'+formatCurrency(0)+'</button>').addClass("text-center");
			}
		$('td:eq(0)',nRow).html('<i class="fa fa-plus"> </i>').addClass("text-center");
	}
});
$('#table-ar tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var tableId = 'accountar-' + row.data().id;       
        if (row.child.isShown()){
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
            tr.addClass('odd');
        } else {
            row.child(template(row.data())).show();
            initTable(tableId, row.data().id);
            tr.addClass('shown');
            tr.removeClass('odd');
            tr.next().find('td').addClass('m-heading-1 border-green m-bordered no-padding bg-gray');
            tr.next().find('td').attr('style','border-right-width: 1px;border-left-width:8px;border-bottom-width: 1px;padding-top:0;padding-left:0;padding-right:0');
            $('#accountar-'+row.data().id+'_length').addClass('col-xs-12 col-md-6');
        }
    });
function initTable(tableId,id){
	$.fn.dataTable.ext.errMode = 'throw';
	$('#'+tableId).DataTable({
		bInfo: false,
		bFilter:false,
		processing: true,
		serverSide: true,
		"dom": '<"top"i>rt<"bottom"flp><"clear">',
		ajax:'{{url("")}}/accounting/account_receivable/getDetailData/'+id,
		columns:[
			{ data: 'rownum', name: 'rownum'},
			{ data: 'ac_code', name: 'ac_code'},
			{ data: 'ac_name', name:'ac_name'},
			{ data: 'jn_des', name: 'jn_des'},
			{ data: 'jn_drb', name: 'jn_drb'},
			{ data: 'jn_crb', name: 'jn_crb'},
			{ data: 'jn_date_transaction', name:'jn_date_transaction'},
			{ data: 'name', name: 'name'}
		],'fnCreatedRow':function(nRow,aData,iDataIndex){
			
		}
	});
}
function onDelete(id){
	var _token = $("input[name=_token]").val();
	App.doDelete("{{ trans('template.delete').' '.trans('template.category') }}","{{trans('template.message_delete').' '.trans('template.category').' ?'}}",'/category/delete',id,'post',_token);
}
</script>
@endsection()