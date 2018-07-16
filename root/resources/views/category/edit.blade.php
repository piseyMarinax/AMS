@extends('layouts.app')

@section('content')
 <div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="">{{ trans('template.dashboard') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<a href="">{{ trans('template.category') }}</a>
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
					<i class="fa fa-edit font-green"></i>
					<span class="caption-subject font-green sbold uppercase">{{ trans('template.category') }}</a></span>
				</div>
			</div>
			<div class="portlet-body form">
				<form class="form-horizontal" method="POST" action="{{url('/category/update')}}/<?php echo $edit->id; ?>" id="form_validation">
					@if(count($errors))
                		@foreach($errors->all() as $error)
                    		<span class="alert alert-danger">{{$error}}</span>
			            @endforeach
			        @endif
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					<div class="form-body">
						@if(Session::has('message'))
							<div class="breadLine">
								<i class="fa fa-save"> </i> <span style="color:green">{!!Session::get('message')!!} </span>
							</div>
						@endif
						<div class="alert alert-danger display-hide">
							<button class="close" data-close="alert"></button> You have some form errors. Please check below. 
						</div>
						<div class="alert alert-success display-hide">
							<button class="close" data-close="alert"></button> Your form validation is successful! 
						</div>
						
						<div class="form-group  margin-top-20">
							<label class="control-label col-md-4">{{trans('template.code')}}
								<span class="required"> * </span>
							</label>			                    
							<div class="col-md-6">
								<div class="input-icon right">
									<i class="fa"></i>
									<input type="text" class="form-control" value="<?php echo $edit->category_code; ?>" name="code" id="code" /> </div>
							</div>
						</div>
						
						<div class="form-group  margin-top-20">
							<label class="control-label col-md-4">{{trans('template.name')}}
								<span class="required"> * </span>
							</label>			                    
							<div class="col-md-6">
								<div class="input-icon right">
									<i class="fa"></i>
									<input type="text" class="form-control" value="<?php echo $edit->category_name; ?>" name="name" id="name" /> </div>
							</div>
						</div>
						
						<div class="form-group  margin-top-20">
							<label class="control-label col-md-4">{{trans('template.parent')}}
							</label>			                    
							<div class="col-md-6">
								<div class="input-icon right">
									<select name="parent_id" class="form-control select2">
										<option value="0">--- {{trans('template.please_select')}} ---</option>
										{{\App\Helpers\Helpers::getCatogery(0,0,$edit->parent_id)}}
									</select>
								</div>	
							</div>
						</div>
						
						<div class="form-group  margin-top-20">
							<label class="control-label col-md-4">{{trans('template.status')}}
							</label>			                    
							<div class="col-md-6">
								<div class="input-icon right">
									<select name="status" class="form-control select2">
										<option value="1" <?php if ($edit->status==1) echo 'selected="selected"';?> ><?php echo trans('template.active'); ?></option>
										<option value="0" <?php if ($edit->status==0) echo 'selected="selected"';?> ><?php echo trans('template.disable'); ?></option>
									</select>
								</div>	
							</div>
						</div>
						
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-4 col-md-6">
								<button type="submit"  name="btnSave" value="save" class="btn btn-primary"><i class="fa fa-edit"> </i>  {{trans('template.save_change')}} </button>
								<a href="{{url('category/index')}}"><button type="button" id="btnClose" class="btn btn-danger"><i class="fa fa-times-circle"> </i>  {{trans('template.cancel')}} </button> </a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
