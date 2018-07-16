@extends('layouts.app')

@section('content')
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="{{url('/')}}">{{ trans('template.dashboard') }}</a>
			<i class="fa fa-circle"></i>
		</li>		
		<li>
			<span>{{ trans('template.setting') }}</span>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>{{ trans('template.tax') }}</span>
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
					<span class="caption-subject bold uppercase">{{ trans('template.tax') }}</span>
				</div>
				<div class="actions">
					<a title="{{ trans('template.add_new') }}" class="btn btn-circle btn-icon-only btn-default addNewTax" href="#">
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
				<table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="table-tax">
					<thead>
						<tr class="bg-primary">
							<th class="text-center all">{{ trans('template.no') }}</th>
							<th class="text-center min-phone-l">{{ trans('template.name') }}</th>
							<th class="text-center min-phone-l">{{ trans('template.amount') }}</th>
							<th class="text-center min-phone-l">{{ trans('template.description') }}</th>
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
@include('modal.tax')
@endsection()
@section('javascript')
<script type="text/javascript">	
	$(function(){
		$('#table-tax').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{{url("setting/tax/list")}}',
			columns: [
				{data: 'id'},
				{data: 'tax_name'},
				{data: 'tax_vale'},
				{data: 'tax_detail'},
				{data: 'status'},				
				{data: 'action', orderable: false, searchable: false},
			],'fnCreatedRow':function(nRow,aData,iDataIndex){
				var str="";
				if(aData['status'] == 1){
					str ='<button class="btn btn-primary btn-xs">{{trans("template.active")}}</button>';
				}else{
					str ='<button class="btn btn-danger btn-xs">{{trans("template.disable")}}</button>';
				}
				$('td:eq(1)',nRow).addClass("text-center");
				$('td:eq(2)',nRow).addClass("text-center");
				$('td:eq(3)',nRow).addClass("text-center");
				$('td:eq(4)',nRow).html(str).addClass("text-center");
			}
		});
	})

	function onDelete(id){
		var _token = $("input[name=_token]").val();
		App.doDelete("{{ trans('template.delete').' '.trans('template.tax') }}","{{trans('template.message_delete').' '.trans('template.tax').' ?'}}",'/setting/tax/delete',id,'post',_token);
	}
	$('.addNewTax').click(function(){
		$('#ModalTax').modal('show');
		$('#tax_name').val('');
		$('#tax_value').val('');
		$('#tax_des').val('');
	});
	function FunctionUpdate(id){
		$.get('{{url("/setting/tax/edit")}}/'+id,function(data){
			$('#ModalTax').modal('show');
			$('#tax_name').val('');
			$('#tax_value').val('');
			$('#tax_des').val('');
			//////////////Append Value///////////
			$('#tax_name').val(data.tax_name);
			$('#tax_value').val(data.tax_vale);
			$('#tax_des').val(data.tax_detail);
			$('#id_update').val(id);
		});
		
	}
</script>
@endsection()