@extends('layouts.app')

@section('content')
 <div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="{{url('/')}}">{{ trans('template.dashboard') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<a href="{{url('/admins/absentt')}}">{{ trans('template.absentt') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>​{{ trans('template.type') }}</span>
		</li>
	</ul>
</div>
<br/>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light portlet-fit portlet-form bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-plus font-green"></i>
					<span class="caption-subject font-green sbold uppercase">{{ trans('template.absentt') }}</a></span>
				</div>
			</div>
			<div class="portlet-body form-body">
				<form class="form-horizontal" method="POST" action="{{url('/admins/absentttype/update')}}" id="form_validation">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					<input type="hidden" name="id" value="{{ $row->id }}" />
					<div class="form-body">
						@if(count($errors))
							@foreach($errors->all() as $error)
								<span class="alert alert-danger" style="display:block;">{{$error}}</span>
							@endforeach
						@endif
						@if(Session::has('message'))
							<div class="alert alert-success display-show" >
								<button class="close" data-close="alert"></button> 
								{!!Session::get('message')!!} 
							</div>
						@endif
						<div class="alert alert-danger display-hide">
							<button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
						<div class="alert alert-success display-hide">
							<button class="close" data-close="alert"></button> Your form validation is successful! </div>
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}  margin-top-20">
							<label class="control-label col-md-4">{{trans('template.document')}}
								<span class="required"> * </span>
							</label>			                    
							<div class="col-md-6">
								<div class="input-icon right">
									<i class="fa"></i>
									<input type="text" class="form-control" value="{{$row->att_title }}" name="name" id="name" /> </div>
									@if($errors->has('name'))
                                        <span style="color:red">{!!$errors->first('name')!!} </span>
									@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}  margin-top-20">
							<label class="control-label col-md-4">{{trans('template.description')}}
								<span class="required"> * </span>
							</label>			                    
							<div class="col-md-6">
								<div class="input-icon right">
									<i class="fa"></i>
									<input type="text" value="{{$row->attdetail }}" class="form-control" name="des" id="description" /> </div>
								@if($errors->has('description'))
                                        <span style="color:red">{!!$errors->first('description')!!} </span>
								@endif	
							</div>
						</div>
						<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
							<label for="phone" class="col-md-4 control-label">{{ trans('template.status') }}
								<span class="required"> * </span>
							</label>
							<?php 
								$status=array(
									'1' => trans("template.active"),
									'0' => trans("template.disable"),
								);
							?>
							<div class="col-md-6">
								{{ Form::select('status', $status, $row->attstatus, ['id' => 'status','class'=>'form-control']) }}
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
							<div class="col-md-offset-4 col-md-6">
								<button type="submit"  name="btnSave" value="save" class="btn green"> <i class="fa fa-save"> </i> <strong> {{trans('template.save')}}</strong></button>
								<a href="{{url('admins/absentt')}}"><button type="button" id="btnClose" class="btn btn-danger"> <i class="fa fa-times-circle"> </i> <strong> {{trans('template.cancel')}}</strong></button> </a>
							</div>
						</div>
					</div>
				</form>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">

</script>
@endsection()