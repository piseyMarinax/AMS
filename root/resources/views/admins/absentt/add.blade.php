@extends('layouts.app')

@section('content')
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="{{url('/')}}">{{ trans('template.dashboard') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>			
			<span>{{ trans('template.admin') }}</span>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<a href="{{url('/admins/absentt')}}"><span>{{ trans('template.absentt') }}</span></a>
			<i class="fa fa-circle"></i>
		</li>
		<li>			
			<span>{{ trans('template.add_new') }}</span>
		</li>
	</ul>
</div>
<br/>
<div class="row">
	<form class="form-horizontal" method="POST" action="{{url('admins/absentt/insert')}}" id="form_validation" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-green">
					<i class="fa fa-plus font-green"></i>
					<span class="caption-subject bold uppercase">{{ trans('template.absentt') }}</span>
				</div>
				<div class="actions">
					<button style="padding:6px 10px" type="submit"  name="btnSave" value="save" class="btn green" id="ValueSave"> <i class="fa fa-save"> </i> <strong> {{trans('template.save')}}</strong></button>
					<a href="{{url('admins/absentt')}}"><button type="button" id="btnClose" class="btn red"> <i class="fa fa-times-circle"> </i> <strong> {{trans('template.cancel')}}</strong></button> </a>
				</div>
			</div>
			<div class="portlet-body">
				<?php if(Session::has('success')):?>
					<div class="alert alert-success display-show">
						<button class="close" data-close="alert"></button><strong>{{trans('template.success')}}!</strong> {{Session::get('success')}} 
					</div>
				<?php elseif(Session::has('fail')):?>
					<div class="alert alert-danger display-show">
						<button class="close" data-close="alert"></button><strong>{{trans('template.fail')}}!</strong> {{Session::get('fail')}} 
					</div>
				<?php endif; ?>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group margin-top-20">           
							<div class="col-md-5 {{ $errors->has('adsent_date') ? ' has-error' : '' }}" style="padding:0;">
								<div class="input-icon right">
									<input class="form-control datepicker" type="text" name="adsent_date" id="adsent_date" placeholder="{{trans('template.date')}} - day-Month-Year" >
								</div>
								@if($errors->has('adsent_date'))
										<span style="color:red">{!!$errors->first('adsent_date')!!} </span>
								@endif	
							</div>
							<label class="control-label col-md-1"> </label>
							<label class="control-label col-md-1"> </label>
							<div class="col-md-5 {{ $errors->has('staff_id') ? ' has-error' : '' }}"  style="padding:0;">
								<div class="input-icon right">
									<select name="staff_id" class="form-control select2" id="staff_id" style="width: 100%;">
										<option value=" ">--- {{trans('template.please_select')}} {{trans('template.staff')}} ---</option>
										{{\App\Helpers\Helpers::getStaff()}}
									</select>
								</div>
								@if($errors->has('staff_id'))
										<span style="color:red">{!!$errors->first('staff_id')!!} </span>
								@endif	
							</div>							
						</div>
						<div class="form-group{{ $errors->has('adsent_type') ? ' has-error' : '' }}  margin-top-20">           
							<div class="col-md-5 {{ $errors->has('adsent_type') ? ' has-error' : '' }}"  style="padding:0;">
								<div class="input-icon right">
									<select name="adsent_type" class="form-control select2" id="adsent_type" style="width: 100%;">
										<option value=" ">--- {{trans('template.please_select')}} {{trans('template.absentt')}} {{trans('template.type')}} ---</option>
										{{\App\Helpers\Helpers::getAdsentType()}}
									</select>
								</div>
								@if($errors->has('adsent_type'))
										<span style="color:red">{!!$errors->first('adsent_type')!!} </span>
								@endif	
							</div>		
							<label class="control-label col-md-1"> </label>
							<label class="control-label col-md-1"> </label>
							<div class="col-md-5 {{ $errors->has('request_by') ? ' has-error' : '' }}"  style="padding:0;">
								<div class="input-icon right">
									<select name="request_by" class="form-control select2" id="request_by" style="width: 100%;">
										<option value=" ">--- {{trans('template.please_select')}} {{trans('template.request_by')}} ---</option>
										{{\App\Helpers\Helpers::getUsers()}}
									</select>
								</div>
								@if($errors->has('request_by'))
										<span style="color:red">{!!$errors->first('request_by')!!} </span>
								@endif	
							</div>							
						</div>
						<div class="form-group margin-top-20">           
							<div class="col-md-5 {{ $errors->has('approved_by') ? ' has-error' : '' }}"  style="padding:0;">
								<div class="input-icon right">
									<select name="approved_by" class="form-control select2" id="approved_by" style="width: 100%;">
										<option value=" ">--- {{trans('template.please_select')}} {{trans('template.approved_by')}} ---</option>
										{{\App\Helpers\Helpers::getUsers()}}
									</select>
								</div>
								@if($errors->has('approved_by'))
										<span style="color:red">{!!$errors->first('approved_by')!!} </span>
								@endif	
							</div>		
							<label class="control-label col-md-1"> </label>
							<label class="control-label col-md-1"> </label>
							<div class="col-md-5"  style="padding:0;">
								<div class="input-icon right">
									<textarea placeholder="{{trans('template.description')}}" name="detial" style="" class="form-control"> </textarea>
								</div>
								@if($errors->has('description'))
										<span style="color:red">{!!$errors->first('description')!!} </span>
								@endif	
							</div>							
						</div>
						<div class="box">
							<div id="div-3" class="accordion-body collapse in body">
								<div class="row">
									<div class="col-lg-5">
										<div class="form-group">
											<div class="input-group">
												<input id="box1Filter" type="text" placeholder="Filter" class="form-control" />
												<span class="input-group-btn">
													<button id="box1Clear" class="btn btn-warning" type="button">x</button>
												</span>
											</div>
										</div>
										<div class="form-group">
											<select id="box1View" name="boxleft[]" multiple="multiple" class="form-control" size="16">
												<option value=" ">--- {{trans('template.please_select')}} {{trans('template.approved_by')}} ---</option>
												{{\App\Helpers\Helpers::getStaffAarray()}}
											</select>
											<hr>
											<div class="alert alert-block">
												<span id="box1Counter" class="countLabel"></span>
												<select id="box1Storage" class="form-control"></select>
											</div>
										</div>
									</div>

									<div class="col-lg-2">
										<div class="btn-group btn-group-vertical" style="white-space: normal;">
											<button id="to2" type="button" class="btn btn-primary">
												<i class="icon-chevron-right"></i>
											</button>
											<button id="allTo2" type="button" class="btn btn-primary">
												<i class="icon-forward"></i>
											</button>
											<button id="allTo1" type="button" class="btn btn-danger">
												<i class="icon-backward"></i>
											</button>
											<button id="to1" type="button" class="btn btn-danger">
												<i class=" icon-chevron-left icon-white"></i>
											</button>
										</div>
									</div>

									<div class="col-lg-5">
										<div class="form-group">
											<div class="input-group">
												<input id="box2Filter" type="text" placeholder="Filter" class="form-control" />
												<span class="input-group-btn">
													<button id="box2Clear" class="btn btn-warning" type="button">x</button>
												</span>
											</div>
										</div>
										<div class="form-group">
											<select id="box2View" name="staff_right[]" multiple="multiple" class="form-control" size="16"></select>
										</div>
										<hr />

										<div class="alert alert-block">
											<span id="box2Counter" class="countLabel"></span>
											<select id="box2Storage" class="form-control" > </select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
</div>
@endsection()
@section('javascript')
<link rel="stylesheet" href="{{url('add_js')}}/assets/plugins/Font-Awesome/css/font-awesome.css" />
<script src="{{url('add_js')}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="{{url('add_js')}}/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<script src="{{url('add_js')}}/assets/js/jquery-ui.min.js"></script>
 <script src="{{url('add_js')}}/assets/plugins/uniform/jquery.uniform.min.js"></script>
<script src="{{url('add_js')}}/assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="{{url('add_js')}}/assets/plugins/chosen/chosen.jquery.min.js"></script>
<script src="{{url('add_js')}}/assets/plugins/colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="{{url('add_js')}}/assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script src="{{url('add_js')}}/assets/plugins/validVal/js/jquery.validVal.min.js"></script>
<script src="{{url('add_js')}}/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="{{url('add_js')}}/assets/plugins/daterangepicker/moment.min.js"></script>
<script src="{{url('add_js')}}/assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script src="{{url('add_js')}}/assets/plugins/timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="{{url('add_js')}}/assets/plugins/switch/static/js/bootstrap-switch.min.js"></script>
<script src="{{url('add_js')}}/assets/plugins/jquery.dualListbox-1.3/jquery.dualListBox-1.3.min.js"></script>
<script src="{{url('add_js')}}/assets/plugins/autosize/jquery.autosize.min.js"></script>
<script src="{{url('add_js')}}/assets/plugins/jasny/js/bootstrap-inputmask.js"></script>
<script src="{{url('add_js')}}/assets/js/formsInit.js"></script>
<script>
	$(function () { formInit(); });
</script>
<script type="text/javascript">
	
</script>
@endsection()