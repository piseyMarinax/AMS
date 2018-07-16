@extends('layouts.apptop3')
@section('content')
<div class="container">
	<div class="page-bar">
	 	<ul class="page-breadcrumb breadcrumb">
			<li><i class="fa fa-circle"></i>
				<a href="{{url('/')}}" style="font-family: Kh-Battambang;">{{ trans('template.dashboard') }}</a>
				<a href="{{url('backend/user/list')}}" style="font-family: Kh-Battambang;"><i class="fa fa-circle"></i>  {{ trans('template.user_list') }}</a>
				<span class="caption-subject font-blue-sharp uppercase bold" style="font-family: Kh-Battambang;"><i class="fa fa-circle"></i> {{ trans('template.reset_password') }}</span>
			</li>
			
		</ul>
	</div>
	<div class="page-content-inner">
		<div class="row">
			<div class="col-md-12">
				<div class="portlet light portlet-fit portlet-form bordered">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-key font-green"></i>
							<span class="caption-subject font-green sbold uppercase"><strong>{{ trans('template.enter_new_password') }}</strong></span>
						</div>
					</div>
					<div class="portlet-body">
						<form class="form-horizontal" role="form" method="POST" action="{{ url('user/update_pass') }}">
							{{ csrf_field() }}
							<div class="form-body">
								<input id="id" type="hidden" name="id" value="{{$id}}"/>
								<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
									<label for="password" class="col-md-4 control-label"><strong>{{ trans('template.new_password') }}</strong>
										<span class="required"> * </span>
									</label>

									<div class="col-md-6">
										<input id="password" type="password" class="form-control" name="password">

										@if ($errors->has('password'))
											<span class="help-block">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
									</div>
								</div>

								<div class="form-group">
									<label for="password-confirm" class="col-md-4 control-label"><strong>{{ trans('template.confirm_password') }}</strong></label>

									<div class="col-md-6">
										<input id="password-confirm" type="password" class="form-control" name="password_confirmation">
									</div>
								</div>
							</div>
							
							<div class="form-actions">
								<div class="row">
									<div class="col-md-offset-4 col-md-8">
										<button type="submit" class="btn btn-primary"> <i class="fa fa-refresh"> </i> <strong>{{ trans('template.save_change') }}</strong></button>
										<a href="{{ url('/backend/user/list') }}" class="btn btn-danger btn-outline"> <i class="fa fa-close"> </i> <strong>{{ trans('template.cancel') }}</strong></a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">

</script>
@endsection
