@extends('layouts.app')

@section('content')
 <div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="{{url('/')}}">{{ trans('template.dashboard') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<a href="{{url('category/index')}}">​{{ trans('template.category') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>​{{ trans('template.add_new') }}</span>
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
					<span class="caption-subject font-green sbold uppercase">{{ trans('template.category') }}</a></span>
				</div>
			</div>
			<div class="portlet-body form-body">
				<form class="form-horizontal" method="POST" action="{{url('/category/insert')}}" id="form_validation">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
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
						<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}  margin-top-20">
							<label class="control-label col-md-4">{{trans('template.code')}}
								<span class="required"> * </span>
							</label>			                    
							<div class="col-md-6">
								<div class="input-icon right">
									<i class="fa"></i>
									<input type="text" class="form-control" value="{{ old('code') }}" name="code" id="code" /> </div>
									@if($errors->has('code'))
                                        <span style="color:red">{!!$errors->first('code')!!} </span>
									@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}  margin-top-20">
							<label class="control-label col-md-4">{{trans('template.name')}}
								<span class="required"> * </span>
							</label>			                    
							<div class="col-md-6">
								<div class="input-icon right">
									<i class="fa"></i>
									<input type="text" value="{{ old('name') }}" class="form-control" name="name" id="name" /> </div>
								@if($errors->has('name'))
                                        <span style="color:red">{!!$errors->first('name')!!} </span>
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
										{{\App\Helpers\Helpers::getCatogery(0,0,"")}}
									</select>
								</div>
								@if($errors->has('parent_id'))
                                        <span style="color:red">{!!$errors->first('parent_id')!!} </span>
								@endif	
							</div>
						</div>
						<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}  margin-top-20">
							<label class="control-label col-md-4">{{trans('template.status')}}
							</label>			                    
							<div class="col-md-6">
								<div class="input-icon right">
									<select name="status" class="form-control select2">
										<option value="1"> {{trans('template.active')}} </option>
										<option value="0"> {{trans('template.disable')}} </option>
									</select>
								</div>
								@if($errors->has('status'))
                                        <span style="color:red">{!!$errors->first('status')!!} </span>
								@endif	
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-4 col-md-6">
								<button type="submit"  name="btnSave" value="save" class="btn green"> <i class="fa fa-save"> </i> <strong> {{trans('template.save')}}</strong></button>
								<button type="submit"  name="btnSaveNew" value="save_new" class="btn blue"> <strong> {{trans('template.save_new')}} </strong></button>
								<a href="{{url('category/index')}}"><button type="button" id="btnClose" class="btn btn-danger"> <i class="fa fa-times-circle"> </i> <strong> {{trans('template.cancel')}}</strong></button> </a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
