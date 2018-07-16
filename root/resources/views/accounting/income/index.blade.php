@extends('layouts.app')

@section('content')
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="{{url('/')}}">{{ trans('template.dashboard') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>{{ trans('template.income') }}</span>
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
					<span class="caption-subject bold uppercase">{{ trans('template.income') }}</span>
				</div>
				<div class="actions">
					<a title="{{ trans('template.add_new') }}" class="btn btn-circle btn-icon-only btn-default" href="{{ url('accounting/income/add') }}">
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
				<table class="table table-striped table-bordered" width="100%" id="table-income">
					<thead>
						<tr class="bg-primary">
							<th class="text-center all"></th>
							<th class="text-center min-phone-l">{{ trans('template.referent_no') }}</th>
							<th class="text-center min-phone-l">{{ trans('template.chart_account') }}</th>
							<th class="text-center min-phone-l">{{ trans('template.amount') }}</th>
							<th class="text-center min-phone-l">{{ trans('template.date') }}</th>
							<th class="text-center min-phone-l">{{ trans('template.name') }}</th>
							<th class="text-center min-phone-l">{{ trans('template.status') }}</th>
							<th class="text-center min-phone-l">{{ trans('template.action') }}</th>
						</tr>
					</thead>
					<tbody>
					
					</tbody>
				</table>
				<script id="details-template" type="text/x-handlebars-template">
			        <table class="table details-table" id="income-@{{id}}">
			            <thead>
			                <tr>
			                    <th>{{ trans('template.no') }}</th>
			                    <th>{{ trans('template.code') }}</th>
			                    <th>{{ trans('template.chart_account') }}</th>
			                    <th>{{ trans('template.description') }}</th>
			                    <th>{{ trans('template.debit') }}</th>
			                    <th>{{ trans('template.credit') }}</th>
			                    <th>{{ trans('template.date') }}</th>
			                    <th>{{ trans('template.name') }}</th>
			                </tr>
			            </thead>
			        </table>
			    </script>
			</div>
		</div>
	</div>
</div>
@endsection()
@section('javascript')
<script type="text/javascript">	
	var template = Handlebars.compile($("#details-template").html());
    $.fn.dataTable.ext.errMode = 'throw';
	var table =$('#table-income').DataTable({
		processing: true,
		serverSide: true,
		ajax: '{{url("/accounting/income/list")}}',
		columns: [
			{
                "class":'details-control',
                "orderable":false,
                "searchable":false,
                "data":null,
                "defaultContent":''
            },
			{data: 'code'},
			{data: 'ac_name'},
			{data: 'amount'},
			{data: 'created_at'},
			{data: 'name'},
			{data: 'status'},
			{data: 'action', orderable: false, searchable: false},
		],'fnCreatedRow':function(nRow,aData,iDataIndex){
			var str="";
			if(aData['status'] == 1){
				str ='<button class="btn btn-primary btn-xs">{{trans("template.active")}}</button>';
			}else{
				str ='<button class="btn btn-danger btn-xs">{{trans("template.disable")}}</button>';
			}
			$('td:eq(6)',nRow).html(str).addClass("text-center");
			$('td:eq(0)',nRow).html('<i class="fa fa-plus"> </i>').addClass("text-center");
		},
		order:[[1,'asc']]
	});
	$('#table-income tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var tableId = 'income-' + row.data().id;       
        if (row.child.isShown()){
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
            tr.addClass('odd');
        } else {
            row.child(template(row.data())).show();
            initTable(tableId, row.data().id);
            tr.addClass('shown');
            tr.removeClass('odd');
            tr.next().find('td').addClass('m-heading-1 border-green m-bordered no-padding bg-gray');
            tr.next().find('td').attr('style','border-right-width: 1px;border-left-width:8px;border-bottom-width: 1px;padding-top:0;padding-left:0;padding-right:0');
            $('#income-'+row.data().id+'_length').addClass('col-xs-12 col-md-6');
        }
    });
    function initTable(tableId,id){
        $.fn.dataTable.ext.errMode = 'throw';
        $('#'+tableId).DataTable({
            bInfo: false,
            bFilter:false,
            processing: true,
            serverSide: true,
            "dom": '<"top"i>rt<"bottom"flp><"clear">',
            ajax:'{{url("")}}/accounting/income/getDetailData/'+id,
            columns:[
                { data: 'rownum', name: 'rownum'},
                { data: 'ac_code', name: 'ac_code'},
                { data: 'ac_name', name:'ac_name'},
                { data: 'jn_des', name: 'jn_des'},
                { data: 'jn_drb', name: 'jn_drb'},
                { data: 'jn_crb', name: 'jn_crb'},
                { data: 'jn_date_transaction', name:'jn_date_transaction'},
                { data: 'name', name: 'name'}
            ],'fnCreatedRow':function(nRow,aData,iDataIndex){
                
            }
        });
    }
	function onDelete(id){
		var _token = $("input[name=_token]").val();
		App.doDelete("{{ trans('template.delete').' '.trans('template.income') }}","{{trans('template.message_delete').' '.trans('template.income').' ?'}}",'/accounting/income/delete',id,'post',_token);
	}
</script>
@endsection()