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
			<span>{{ trans('template.type_of_accounting') }}</span>
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
					<span class="caption-subject bold uppercase">{{ trans('template.type_of_accounting') }}</span>
				</div>
				<div class="actions">
					<a title="{{ trans('template.add_new') }}" class="btn btn-circle btn-icon-only btn-default" href="{{ url('/accounting/chart_account/type-account/add') }}">
						<i class="fa fa-plus"></i>
					</a>
				</div>
			</div>
			
			<div class="portlet-body">
				@if(Session::has('message'))
					<div class="alert alert-success display-show">
						<button class="close" data-close="alert"></button> {!!Session::get('message')!!}
					</div>
				@endif
				<table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="table-typeaccounting">
					<thead>
						<tr class="bg-primary">
							<th class="text-center all">{{ trans('template.no') }}</th>
							<th class="text-center min-phone-l">{{ trans('template.name') }}</th>
							<th class="text-center min-phone-l">{{ trans('template.group_accounting') }}</th>
							<th class="text-center min-phone-l">{{ trans('template.description') }}</th>
							<th class="text-center min-phone-l">{{ trans('template.action') }}</th>
						</tr>
					</thead>
					<tbody>
					
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection()
@section('javascript')
<script type="text/javascript">	
	$(function(){
		$('#table-typeaccounting').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{{url("/accounting/chart_account/type-account/list")}}',
			columns: [
				{data: 'id'},
				{data: 'at_name'},
				{data: 'ag_name'},
				{data: 'des'},
				{data: 'action', orderable: false, searchable: false},
			]
		});
	})

	function onDelete(id){
		var _token = $("input[name=_token]").val();
		App.doDelete("{{ trans('template.delete').' '.trans('template.type_of_accounting') }}","{{trans('template.message_delete').' '.trans('template.type_of_accounting').' ?'}}",'/accounting/chart_account/type-account/delete',id,'post',_token);
	}
</script>
@endsection()