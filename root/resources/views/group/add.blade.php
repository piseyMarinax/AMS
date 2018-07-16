@extends('layouts.app')

@section('content')
 <div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="{{url('/')}}"><strong>{{ trans('template.dashboard') }}</strong></a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<a href="{{ url('/group/index') }}"><strong>{{ trans('template.group_user_list') }}</strong></a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span><strong>{{ trans('template.add_new') }}</strong></span>
		</li>
	</ul>
</div>
<br/>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light portlet-fit portlet-form bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-users font-green"></i>
					<span class="caption-subject font-green sbold uppercase"><strong>{{ trans('template.enter_group_user_info') }}</strong></span>
				</div>
			</div>
			<div class="portlet-body">
				<form class="form-horizontal" role="form" method="POST" action="{{ url('group/insert') }}">
					{{ csrf_field() }}
					<div class="form-body">
						<?php if(Session::has('success')):?>
							<div class="alert alert-success display-show">
								<button class="close" data-close="alert"></button><strong>{{ trans('template.success') }}!</strong> {{Session::get('success')}}
							</div>
						<?php elseif(Session::has('fail')):?>
							<div class="alert alert-danger display-show">
								<button class="close" data-close="alert"></button><strong>{{ trans('template.fail') }}!</strong> {{Session::get('fail')}} 
							</div>
						<?php endif; ?>
						
						<div class="form-group{{ $errors->has('group_code') ? ' has-error' : '' }}">
							<label for="group_code" class="col-md-4 control-label"><strong>{{ trans('template.code') }}</strong>
								<span class="required"> * </span>
							</label>
							
							<div class="col-md-6">
								<input id="group_code" type="text" class="form-control" name="group_code" value="{{ old('group_code') }}" autofocus>
								@if ($errors->has('group_code'))
									<span class="help-block">
										<strong>{{ $errors->first('group_code') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('group_name') ? ' has-error' : '' }}">
							<label for="group_name" class="col-md-4 control-label"><strong>{{ trans('template.group_name') }}</strong>
								<span class="required"> * </span>
							</label>

							<div class="col-md-6">
								<input id="group_name" type="text" class="form-control" name="group_name" value="{{ old('group_name') }}">

								@if ($errors->has('group_name'))
									<span class="help-block">
										<strong>{{ $errors->first('group_name') }}</strong>
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
							<div class="col-md-6">
								{{ Form::select('status', $status, old('status'), ['id' => 'status','class'=>'form-control']) }}
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
								<button type="submit" name="save" value="s" class="btn btn-primary"> <i class="fa fa-save"> </i> <strong>{{ trans('template.save') }}</strong></button>
								<button type="submit" name="save_new" value="sn" class="btn btn-info"><strong>{{ trans('template.save_new') }}</strong></button>
								<a href="{{ url('/group/index') }}" class="btn btn-danger btn-outline"> <i class="fa fa-close"> </i> <strong>{{ trans('template.cancel') }}</strong></a>
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
