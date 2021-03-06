@extends('layouts.apptop3')

@section('content')

                    <!-- BEGIN CONTAINER -->
                    <div class="container">
                        <!-- BEGIN PAGE BREADCRUMBS -->
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <i class="fa fa-circle"></i> <a href="{{ url('/') }}" style="font-family: Hanuman;"> {{ trans('template.dashboard') }}</a>

                                <span class="caption-subject font-blue-sharp uppercase bold" style="font-family: Kh-Battambang;"><i class="fa fa-circle"></i> {{ trans('template.customer_new') }}</span>
                            </li>
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light portlet-fit portlet-form bordered">
										<div class="portlet-title">
											<div class="caption">
												<i class="icon-plus font-green"></i>
												<span class="caption-subject font-green sbold uppercase">{{ trans('template.function') }}</a></span>
											</div>
										</div>
										<div class="portlet-body form-body">
											<form class="form-horizontal" method="POST" action="{{url('/admins/position/insert')}}" id="form_validation">
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
													<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}  margin-top-20">
														<label class="control-label col-md-4">{{trans('template.name')}}
															<span class="required"> * </span>
														</label>			                    
														<div class="col-md-6">
															<div class="input-icon right">
																<i class="fa"></i>
																<input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name" /> </div>
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
																<input type="text" value="{{ old('description') }}" class="form-control" name="des" id="description" /> </div>
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
														<div class="col-md-offset-4 col-md-6">
															<button type="submit"  name="btnSave" value="save" class="btn green"> <i class="fa fa-save"> </i> <strong> {{trans('template.save')}}</strong></button>
															<button type="submit"  name="btnSaveNew" value="save_new" class="btn blue"> <strong> {{trans('template.save_new')}} </strong></button>
															<a href="{{url('admins/position/add')}}"><button type="button" id="btnClose" class="btn btn-danger"> <i class="fa fa-times-circle"> </i> <strong> {{trans('template.cancel')}}</strong></button> </a>
														</div>
													</div>
												</div>
											</form>
											<div class="col-md-12">
													<table class="table table-striped table-bordered" width="100%" id="table-dept">
														<thead>
															<tr class="bg-primary">
																<th class="text-center min-phone-l">{{trans('template.no')}}</th>
																<th class="text-center min-phone-l">{{trans('template.function')}}</th>
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
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div><!--END CONTAINER -->

@endsection
@section('javascript')
<script type="text/javascript">
	$('#table-dept').DataTable({
		"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
		processing: true,
		serverSide: true,
		ajax: '{{url("admins/position/getJsonFunc")}}',
		columns: [
			{data: 'rownum'},
			{data: 'functitle'},
			{data: 'funcstatus'},
			{data: 'funcdetail'},
			{data: 'action', orderable: false, searchable: false},
		],'fnCreatedRow':function(nRow,aData,iDataIndex){
			var str="";
			if(aData['funcstatus'] == 1){
				str ='<button class="btn btn-primary btn-xs">{{trans("template.active")}}</button>';
			}else{
				str ='<button class="btn btn-danger btn-xs">{{trans("template.disable")}}</button>';
			}
			$('td:eq(2)',nRow).html(str).addClass("text-center");
		}
	});
	
	function onDelete(id){
		var _token = $("input[name=_token]").val();
		App.doDelete("{{ trans('template.delete').' '.trans('template.function') }}","{{trans('template.message_delete').' '.trans('template.function').' ?'}}",'/admins/position/delete',id,'post',_token);
	}
</script>
@endsection