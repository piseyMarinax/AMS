@extends('layouts.apptop3')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">			
			<div class="portlet-title">
				<div class="caption font-green">
					<i class="fa fa-table font-green"></i>
					<span class="caption-subject bold uppercase">{{ trans('template.category') }}</span>
				</div>
				<div class="actions">
					<a title="{{ trans('template.add_new') }}" class="btn btn-circle btn-icon-only btn-default" href="{{ url('category/add') }}">
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
				<table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="table-category">
					<thead>
						<tr class="bg-primary">
							<th class="text-center all">{{ trans('template.no') }}</th>
							<th class="text-center min-phone-l">{{ trans('template.code') }}</th>
							<th class="text-center min-phone-l">{{ trans('template.category') }}</th>
							<th class="text-center min-phone-l">{{ trans('template.parent') }}</th>
							<th class="text-center min-phone-l">{{ trans('template.status') }}</th>
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
		$('#table-category').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{{url("/category/list")}}',
			columns: [
				{data: 'id'},
				{data: 'category_code'},
				{data: 'category_name'},
				{data: 'parent_id'},
				{data: 'status'},
				{data: 'action', orderable: false, searchable: false},
			],'fnCreatedRow':function(nRow,aData,iDataIndex){
				var str="";
				if(aData['status'] == 1){
					str ='<button class="btn btn-primary btn-xs">{{trans("template.active")}}</button>';
				}else{
					str ='<button class="btn btn-danger btn-xs">{{trans("template.disable")}}</button>';
				}
				$('td:eq(4)',nRow).html(str).addClass("text-center");
			}
		});
	})

	function onDelete(id){
		var _token = $("input[name=_token]").val();
		App.doDelete("{{ trans('template.delete').' '.trans('template.category') }}","{{trans('template.message_delete').' '.trans('template.category').' ?'}}",'/category/delete',id,'post',_token);
	}
</script>
@endsection()