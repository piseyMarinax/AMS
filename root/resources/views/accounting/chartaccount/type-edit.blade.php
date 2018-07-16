@extends('layouts.app')

@section('content')
 <div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="{{url('/')}}">{{ trans('template.dashboard') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<a href="{{url('/accounting/chart_account/index')}}">{{ trans('template.chart_account') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<a href="{{url('accounting/chart_account/type-account')}}">​{{ trans('template.type_of_accounting') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>​{{ trans('template.edit') }}</span>
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
					<span class="caption-subject font-green sbold uppercase">{{ trans('template.type_of_accounting') }}</a></span>
				</div>
			</div>
			<div class="portlet-body form-body">
				<form class="form-horizontal" method="POST" action="{{url('/accounting/chart_account/type-account/update')}}" id="form_validation">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					<input type="hidden" name="id" value="{{$edit->id}}" />
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
							<label class="control-label col-md-4">{{trans('template.name')}}
								<span class="required"> * </span>
							</label>			                    
							<div class="col-md-6">
								<div class="input-icon right">
									<i class="fa"></i>
									<input type="text" value="{{$edit->at_name}}" class="form-control" name="name" id="name" /> </div>
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
									<input type="text" value="{{$edit->des}}" class="form-control" name="des" id="description" /> </div>
								@if($errors->has('description'))
                                        <span style="color:red">{!!$errors->first('description')!!} </span>
								@endif	
							</div>
						</div>
						<div class="form-group{{ $errors->has('parent') ? ' has-error' : '' }}  margin-top-20">
							<label class="control-label col-md-4">{{trans('template.parent')}}
							</label>			                    
							<div class="col-md-6">
								<div class="input-icon right">
									<select name="parent_id" class="form-control select2">
										<option value="0">--- {{trans('template.please_select')}} ---</option>
										{{\App\Helpers\Helpers::getAccountGruop($edit->at_gruop)}}
									</select>
								</div>
								@if($errors->has('parent_id'))
                                        <span style="color:red">{!!$errors->first('parent_id')!!} </span>
								@endif	
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-4 col-md-6">
								<button type="submit"  name="btnSave" value="save" class="btn green"> <i class="fa fa-save"> </i> <strong> {{trans('template.save')}}</strong></button>
								<button type="submit"  name="btnSaveNew" value="save_new" class="btn blue"> <strong> {{trans('template.save_new')}} </strong></button>
								<a href="{{url('accounting/chart_account/type-account')}}"><button type="button" id="btnClose" class="btn btn-danger"> <i class="fa fa-times-circle"> </i> <strong> {{trans('template.cancel')}}</strong></button> </a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
