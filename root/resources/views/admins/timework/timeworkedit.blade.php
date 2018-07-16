@extends('layouts.app')

@section('content')
 <div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="{{url('/')}}">{{ trans('template.dashboard') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<a href="{{url('/admins/timework/timework')}}">{{ trans('template.timework') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>​{{ trans('template.update') }}</span>
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
					<span class="caption-subject font-green sbold uppercase">{{ trans('template.timework') }}</a></span>
				</div>
			</div>
			<div class="portlet-body form-body">
				<form class="form-horizontal" method="POST" action="{{url('/admins/timework/update')}}" id="form_validation">
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
							<label class="control-label col-md-4">{{trans('template.timework')}}
								<span class="required"> * </span>
							</label>			                    
							<div class="col-md-6">
								<div class="input-icon right">
									<i class="fa"></i>
									<input type="text" class="form-control" value="{{$edit->titleshift}}" name="name" id="name" placeholder="Full Time"/> </div>
									@if($errors->has('name'))
                                        <span style="color:red">{!!$errors->first('name')!!} </span>
									@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}  margin-top-20">
							<label class="control-label col-md-4">{{trans('template.time')}}
								<span class="required"> * </span>
							</label>			                    
							<div class="col-md-6">
								<div class="input-icon right">
									<i class="fa"></i>
									<input type="text" class="form-control" value="{{$edit->timeofshift}}" name="time" id="time" placeholder="8:00 AM - 5:00 PM" /> </div>
									@if($errors->has('time'))
                                        <span style="color:red">{!!$errors->first('time')!!} </span>
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
									<input type="text" value="{{$edit->tdetail}}" class="form-control" name="des" id="description" /> </div>
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
								<select name="status" id="status" class="form-control">
                                    <?php $status = $edit->tstatus;?>
                                        <option value="1" <?=$status==1?'selected':''?>> Active </option>
                                        <option value="0" <?=$status==0?'selected':''?>> Disable </option>
                                    </select>
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
								<button type="submit"  name="btnSave" value="save" class="btn green"> <i class="fa fa-edit"> </i> <strong> {{trans('template.edit')}}</strong></button>
								<a href="{{url('admins/document/document')}}"><button type="button" id="btnClose" class="btn btn-danger"> <i class="fa fa-times-circle"> </i> <strong> {{trans('template.cancel')}}</strong></button> </a>
							</div>
						</div>
					</div>
				</form>
				<div class="col-md-12">
						<table class="table table-striped table-bordered" width="100%" id="table-time">
							<thead>
								<tr class="bg-primary">
									<th class="text-center min-phone-l">{{trans('template.no')}}</th>
									<th class="text-center min-phone-l">{{trans('template.timework')}}</th>
									<th class="text-center min-phone-l">{{trans('template.time')}}</th>
									<th class="text-center min-phone-l">{{trans('template.status')}}</th>
									<th class="text-center min-phone-l">{{trans('template.description')}}</th>
									<th class="text-center min-phone-l">{{trans('template.action')}}</th>
								</tr>
							</thead>
							<tbody>
							
							</tbody>
						</table>
					</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
	$('#table-time').DataTable({
		"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
		processing: true,
		serverSide: true,
		ajax: '{{url("admins/timework/getJsonTime")}}',
		columns: [
			{data: 'rownum'},
			{data: 'titleshift'},
			{data: 'timeofshift'},
			{data: 'tstatus'},
			{data: 'tdetail'},
			{data: 'action', orderable: false, searchable: false},
		],'fnCreatedRow':function(nRow,aData,iDataIndex){
			var str="";
			if(aData['tstatus'] == 1){
				str ='<button class="btn btn-primary btn-xs">{{trans("template.active")}}</button>';
			}else{
				str ='<button class="btn btn-danger btn-xs">{{trans("template.disable")}}</button>';
			}
			$('td:eq(3)',nRow).html(str).addClass("text-center");
		}
	});
	
	function onDelete(id){
		var _token = $("input[name=_token]").val();
		App.doDelete("{{ trans('template.delete').' '.trans('template.timework') }}","{{trans('template.message_delete').' '.trans('template.timework').' ?'}}",'/admins/timework/delete',id,'post',_token);
	}
</script>
@endsection()