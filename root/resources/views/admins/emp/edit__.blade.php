@extends('layouts.app')

@section('content')
 <div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="{{url('/')}}">{{ trans('template.dashboard') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<a href="{{ url('/customer/index') }}">{{ trans('template.customer_list') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>{{ trans('template.edit') }}</span>
		</li>
	</ul>
</div>
<br/>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light portlet-fit portlet-form bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-user font-green"></i>
					<span class="caption-subject font-green sbold uppercase"><strong>{{ trans('template.enter_customer_info') }}</strong></span>
				</div>
			</div>
			<div class="portlet-body">
				<form class="form-horizontal" role="form" method="POST" action="{{ url('customer/update') }}">
					{{ csrf_field() }}
					<input id="id" type="hidden" name="id" value="{{$data->id}}"/>
					<input id="old_cus_code" type="hidden" name="old_cus_code" value="{{$data->cus_code}}"/>
					<div class="form-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group{{ $errors->has('cus_code') ? ' has-error' : '' }}">
									<label for="cus_code" class="col-md-4 control-label"><strong>{{ trans('template.code') }}</strong>
										<span class="required"> * </span>
									</label>
									<div class="col-md-8">
										<input id="cus_code" type="text" class="form-control" name="cus_code" value="{{ $data->cus_code }}" autofocus>
										@if ($errors->has('cus_code'))
											<span class="help-block">
												<strong>{{ $errors->first('cus_code') }}</strong>
											</span>
										@endif
									</div>
								</div>
								
								<div class="form-group{{ $errors->has('cus_name') ? ' has-error' : '' }}">
									<label for="cus_name" class="col-md-4 control-label"><strong>{{ trans('template.name') }}</strong>
										<span class="required"> * </span>
									</label>
									<div class="col-md-8">
										<input id="cus_name" type="text" class="form-control" name="cus_name" value="{{ $data->cus_name }}">
										@if ($errors->has('cus_name'))
											<span class="help-block">
												<strong>{{ $errors->first('cus_name') }}</strong>
											</span>
										@endif
									</div>
								</div>
								
								<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
									<label for="address" class="col-md-4 control-label"><strong>{{ trans('template.address') }}</strong>
										<span class="required"> * </span>
									</label>
									<div class="col-md-8">
										<input id="address" type="text" class="form-control" name="address" value="{{ $data->address }}">
										@if ($errors->has('address'))
											<span class="help-block">
												<strong>{{ $errors->first('address') }}</strong>
											</span>
										@endif
									</div>
								</div>
								
								<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
									<label for="phone" class="col-md-4 control-label"><strong>{{ trans('template.phone') }}</strong>
										<span class="required"> * </span>
									</label>
									<div class="col-md-8">
										<input id="phone" type="text" class="form-control" name="phone" value="{{ $data->phone }}">
										@if ($errors->has('phone'))
											<span class="help-block">
												<strong>{{ $errors->first('phone') }}</strong>
											</span>
										@endif
									</div>
								</div>
								
								<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
									<label for="email" class="col-md-4 control-label"><strong>{{ trans('template.email') }}</strong>
										
									</label>
									<div class="col-md-8">
										<input id="email" type="email" class="form-control" name="email" value="{{ $data->email }}">
										@if ($errors->has('email'))
											<span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<!------------ cus_cf1 for limit cradit -------------->
								<div class="form-group{{ $errors->has('cus_cf1') ? ' has-error' : '' }}">
									<label for="cus_cf1" class="col-md-4 control-label"><strong>{{ trans('template.limit_cradit') }}</strong>
										
									</label>
									<div class="col-md-8">
										<input id="cus_cf1" type="number" step="any" class="form-control" name="cus_cf1" value="{{ $data->cus_cf1 }}">
										@if ($errors->has('cus_cf1'))
											<span class="help-block">
												<strong>{{ $errors->first('cus_cf1') }}</strong>
											</span>
										@endif
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group{{ $errors->has('web') ? ' has-error' : '' }}">
									<label for="web" class="col-md-4 control-label"><strong>{{ trans('template.web') }}</strong>
										
									</label>
									<div class="col-md-8">
										<input id="web" type="text" class="form-control" name="web" value="{{ $data->web }}">
										@if ($errors->has('web'))
											<span class="help-block">
												<strong>{{ $errors->first('web') }}</strong>
											</span>
										@endif
									</div>
								</div>
								
								<div class="form-group{{ $errors->has('cont_name') ? ' has-error' : '' }}">
									<label for="cont_name" class="col-md-4 control-label"><strong>{{ trans('template.contact_name') }}</strong>
										<span class="required"> * </span>
									</label>

									<div class="col-md-8">
										<input id="cont_name" type="text" class="form-control" name="cont_name" value="{{ $data->cont_name }}">
										@if ($errors->has('cont_name'))
											<span class="help-block">
												<strong>{{ $errors->first('cont_name') }}</strong>
											</span>
										@endif
									</div>
								</div>
								
								<div class="form-group{{ $errors->has('cont_phone') ? ' has-error' : '' }}">
									<label for="cont_phone" class="col-md-4 control-label"><strong>{{ trans('template.contact_phone') }}</strong>
										<span class="required"> * </span>
									</label>
									<div class="col-md-8">
										<input id="cont_phone" type="text" class="form-control" name="cont_phone" value="{{ $data->cont_phone }}">
										@if ($errors->has('cont_phone'))
											<span class="help-block">
												<strong>{{ $errors->first('cont_phone') }}</strong>
											</span>
										@endif
									</div>
								</div>
							
								<div class="form-group{{ $errors->has('cont_email') ? ' has-error' : '' }}">
									<label for="cont_email" class="col-md-4 control-label"><strong>{{ trans('template.contact_email') }}</strong>
										
									</label>
									<div class="col-md-8">
										<input id="cont_email" type="email" class="form-control" name="cont_email" value="{{ $data->cont_email }}">
										@if ($errors->has('cont_email'))
											<span class="help-block">
												<strong>{{ $errors->first('cont_email') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<!-------------------cus_cf2 for payment term------------------->
								<div class="form-group{{ $errors->has('cus_cf2') ? ' has-error' : '' }}">
									<label for="cus_cf2" class="col-md-4 control-label"><strong>{{ trans('template.payment_term') }}</strong>
										
									</label>
									<div class="col-md-8">
										<select name="cus_cf2" class="form-control select2">
											<option value="0">--- {{trans('template.please_select')}} ---</option>
											{{\App\Helpers\Helpers::getPaymentTerm($data->cus_cf2)}}
										</select>
										@if ($errors->has('cus_cf2'))
											<span class="help-block">
												<strong>{{ $errors->first('cus_cf2') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
									<label for="status" class="col-md-4 control-label"><strong>{{ trans('template.status') }}</strong>
										<span class="required"> * </span>
									</label>
									<?php 
										$status=array(
											'0' => trans("template.active"),
											'1' => trans("template.disable"),
										);
										$status=array_merge([''=>'--- '.trans("template.please_select").' ---'],$status);
									?>
									<div class="col-md-8">
										{{ Form::select('status', $status,$data->status, ['id' => 'status','class'=>'form-control']) }}
										@if ($errors->has('status'))
											<span class="help-block">
												<strong>{{ $errors->first('status') }}</strong>
											</span>
										@endif
									</div>
								</div>
							</div>
						</div>
						<div class="row display-hide">
							<div class="col-md-6">
								<div class="form-group{{ $errors->has('cus_cf3') ? ' has-error' : '' }}">
									<label for="cus_cf3" class="col-md-4 control-label"><strong>{{ trans('template.cus_cf3') }}</strong>
										<span class="required"> * </span>
									</label>
									<div class="col-md-8">
										<input id="cus_cf3" type="text" class="form-control" name="cus_cf3" value="{{ $data->cus_cf3 }}">
										@if ($errors->has('cus_cf3'))
											<span class="help-block">
												<strong>{{ $errors->first('cus_cf3') }}</strong>
											</span>
										@endif
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group{{ $errors->has('cus_cf4') ? ' has-error' : '' }}">
									<label for="cus_cf4" class="col-md-4 control-label"><strong>{{ trans('template.cus_cf4') }}</strong>
										<span class="required"> * </span>
									</label>
									<div class="col-md-8">
										<input id="cus_cf4" type="text" class="form-control" name="cus_cf4" value="{{ $data->cus_cf4 }}">
										@if ($errors->has('cus_cf4'))
											<span class="help-block">
												<strong>{{ $errors->first('cus_cf4') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group{{ $errors->has('cus_cf5') ? ' has-error' : '' }}">
									<label for="cus_cf5" class="col-md-4 control-label"><strong>{{ trans('template.cus_cf5') }}</strong>
										<span class="required"> * </span>
									</label>
									<div class="col-md-8">
										<input id="cus_cf5" type="text" class="form-control" name="cus_cf5" value="{{ $data->cus_cf5 }}">
										@if ($errors->has('cus_cf5'))
											<span class="help-block">
												<strong>{{ $errors->first('cus_cf5') }}</strong>
											</span>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-4 col-md-8">
								<button type="submit" class="btn btn-primary"> <i class="fa fa-edit"> </i> <strong>{{ trans('template.save_change') }}</strong></button>
								<a href="{{ url('/customer/index') }}" class="btn btn-danger btn-outline"> <i class="fa fa-close"> </i> <strong>{{ trans('template.cancel') }}</strong></a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">

</script>
@endsection
