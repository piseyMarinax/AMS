@extends('layouts.app')

@section('content')
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="{{url('/')}}">{{ trans('template.dashboard') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>{{ trans('template.user_list') }}</span>
		</li>
	</ul>
</div>
<br/>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-green">
					<i class="fa fa-table font-green"></i>
					<span class="caption-subject bold uppercase">{{ trans('template.user_info') }}</span>
				</div>
				<div class="actions">
					<a title="{{ trans('template.add_new') }}" class="btn btn-circle btn-icon-only btn-default" href="{{ url('/user/add') }}">
						<i class="fa fa-plus"></i>
					</a>
				</div>
			</div>
			
			<div class="portlet-body">
				<?php if(Session::has('success')):?>
					<div class="alert alert-success display-show">
						<button class="close" data-close="alert"></button><strong>{{trans('template.success')}}!</strong> {{Session::get('success')}} 
					</div>
				<?php elseif(Session::has('fail')):?>
					<div class="alert alert-danger display-show">
						<button class="close" data-close="alert"></button><strong>{{trans('template.fail')}}!</strong> {{Session::get('fail')}} 
					</div>
				<?php endif; ?>
				<table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="users-table">
					<thead>
						<tr class="bg-primary">
							<th class="text-center all">{{ trans('template.full_name') }}</th>
							<th class="text-center ">{{ trans('template.gender') }}</th>
							<th class="text-center ">{{ trans('template.email') }}</th>
							<th class="text-center ">{{ trans('template.phone') }}</th>
							<th class="text-center all">{{ trans('template.status') }}</th>
							<th class="text-center none">{{ trans('template.user_create') }}</th>
							<th class="text-center none">{{ trans('template.date_create') }}</th>
							<th class="text-center none">{{ trans('template.user_update') }}</th>
							<th class="text-center none">{{ trans('template.date_update') }}</th>
							<th class="text-center all">{{ trans('template.action') }}</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection()
@section('javascript')
<script type="text/javascript">
	$('#users-table').DataTable({
		"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
		processing: true,
		serverSide: true,
		ajax: '{{url("user/jsonUsers")}}',
		columns: [
			{data: 'name'},
			{data: 'gender'},
			{data: 'email'},
			{data: 'phone'},
			{data: 'status'},
			{data: 'create_by'},
			{data: 'created_at'},
			{data: 'update_by'},
			{data: 'updated_at'},
			{data: 'action', orderable: false, searchable: false},
		],'fnCreatedRow':function(nRow,aData,iDataIndex){
			var str="";
			if(aData['status'] == 0){
				str ='<button class="btn btn-primary btn-xs">{{trans("template.active")}}</button>';
			}else{
				str ='<button class="btn btn-danger btn-xs">{{trans("template.disable")}}</button>';
			}
			$('td:eq(4)',nRow).html(str).addClass("text-center");
		}
	});
	
	function onDelete(id){
		var _token = $("input[name=_token]").val();
		App.doDelete("{{ trans('template.delete').' '.trans('template.user') }}","{{trans('template.message_delete').' '.trans('template.user').' ?'}}",'/user/delete',id,'post',_token);
	}
</script>
@endsection()