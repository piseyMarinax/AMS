@extends('layouts.app')

@section('content')
 <div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="{{url('/')}}">{{ trans('template.dashboard') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<a href="{{ url('/user/index') }}">{{ trans('template.user_list') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>{{ trans('template.update_user') }}</span>
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
					<span class="caption-subject font-green sbold uppercase"><strong>{{ trans('template.enter_user_info') }}</strong></span>
				</div>
			</div>
			<div class="portlet-body">
				<form class="form-horizontal" role="form" method="POST" action="{{ url('user/update') }}">
					{{ csrf_field() }}
					<input id="id" type="hidden" name="id" value="{{$data->id}}"/>
					<div class="form-body">
						
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label"><strong>{{ trans('template.full_name') }}</strong>
								<span class="required"> * </span>
							</label>
							
							<div class="col-md-6">
								<input id="name" type="text" class="form-control" name="name" value="{{$data->name}}" autofocus>
								@if ($errors->has('name'))
									<span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
							</div>
						</div>
						
						<div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
							<label for="gender" class="col-md-4 control-label"><strong>{{ trans('template.gender') }}</strong>
								<span class="required"> * </span>
							</label>
							<?php 
								$options = [
									'M' => 'M ('.trans("template.male").')',
									'F' => 'F ('.trans("template.female").')',
								];
								$options = array_merge(['' => '--- '.trans("template.please_select").' ---'], $options);
							?>
							<div class="col-md-6">
								{{ Form::select('gender', $options, $data->gender, ['id' => 'gender','class'=>'form-control']) }}
								@if ($errors->has('gender'))
									<span class="help-block">
										<strong>{{ $errors->first('gender') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-4 control-label"><strong>{{ trans('template.email') }}</strong>
								<span class="required"> * </span>
							</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control" name="email" value="{{$data->email}}"/>
								<input id="old_email" type="hidden" name="old_email" value="{{$data->email}}"/>

								@if ($errors->has('email'))
									<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
						</div>
						
						<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
							<label for="phone" class="col-md-4 control-label"><strong>{{ trans('template.phone') }}</strong>
								<span class="required"> * </span>
							</label>

							<div class="col-md-6">
								<input id="phone" type="text" class="form-control" name="phone" value="{{$data->phone}}">
								@if ($errors->has('phone'))
									<span class="help-block">
										<strong>{{ $errors->first('phone') }}</strong>
									</span>
								@endif
							</div>
						</div>
					
						<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
							<label for="phone" class="col-md-4 control-label"><strong>{{ trans('template.status') }}</strong>
								<span class="required"> * </span>
							</label>
							<?php 
								$status=array(
									'0' => trans("template.active"),
									'1' => trans("template.disable"),
								);
								$status=array_merge([''=>'--- '.trans("template.please_select").' ---'],$status);
							?>
							<div class="col-md-6">
								{{ Form::select('status', $status, $data->status, ['id' => 'status','class'=>'form-control']) }}
								@if ($errors->has('status'))
									<span class="help-block">
										<strong>{{ $errors->first('status') }}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>
					
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-4 col-md-8">
								<button type="submit" class="btn btn-primary"> <i class="fa fa-edit"> </i> <strong>{{ trans('template.save_change') }}</strong></button>
								<a href="{{ url('/user/index') }}" class="btn btn-danger btn-outline"> <i class="fa fa-close"> </i> <strong>{{ trans('template.cancel') }}</strong></a>
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
