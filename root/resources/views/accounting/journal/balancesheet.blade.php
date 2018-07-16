@extends('layouts.app')

@section('content')
<?php 
	$start_date = '';
	$end_date = '';
	$param = '?v=1';
	if(Request::input('start_date')){
		$start_date = Request::input('start_date');
		$param.='&start_date='.$start_date;
	}else{
		$start_date = '';
		$param.='&start_date='.$start_date;
	}
	
	if(Request::input('end_date')){
		$end_date = Request::input('end_date');
		$param.='&end_date='.$end_date;
	}else{
		$end_date = '';
		$param.='&end_date='.$end_date;
	}
?>
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="{{url('/')}}">{{ trans('template.dashboard') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>{{ trans('template.balance_sheet') }}</span>
		</li>
	</ul>
</div>
<br/>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title col-md-12">
				<form id="FrmIncomeStatement" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
				<div class="caption font-dark col-md-4">		
					<div class="portlet-title">
						<div class="caption font-green">
							<i class="fa fa-table font-green"></i>
							<span class="caption-subject bold uppercase">{{ trans('template.balance_sheet') }}</span>
						</div>
					</div>
				</div>
				<div class="caption font-dark col-md-4">
					<div class="page-toolbar">
						<div id="search-daterangepicker" style="border: 1px solid #ccc;padding: 7px 30px;" class="pull-right tooltips btn btn-sm" data-container="body">
							<i class="icon-calendar"></i>&nbsp;
							<span class="thin uppercase hidden-xs"> </span>&nbsp;
							<i class="fa fa-angle-down"></i>
							<input type="hidden" name="start_date" value="2017-09-15" id="start_date" class="start_date" />
							<input type="hidden" name="end_date" value="2017-09-15" id="end_date" class="end_date" />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<button type="submit" class="btn btn-primary"><i class="fa fa-search"> </i> {{ trans('template.search') }}</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-print"> </i> {{ trans('template.print') }}</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-book"> </i> {{ trans('template.export') }}</button>
				</div>
				</form>
			</div>
			<div class="portlet-body">
				@if(Session::has('message'))
					<div class="alert alert-success display-show">
						<button class="close" data-close="alert"></button> {!!Session::get('message')!!}
					</div>
				@endif
				<table class="table table-striped table-bordered" width="100%" id="table_Assets">
					<thead>
						<tr class="bg-primary">
							<th style="width:5%;">{{ trans('template.no') }}</th>
							<th >{{ trans('template.assets') }}</th>
							<th style="width:30%; text-align:right; padding-right:30px;">{{ trans('template.amount') }}</th>
						</tr>
					</thead>
					<tbody>
					
					</tbody>
					<tfoot>
						<tr style="text-align:right; color:red">
							<td></td>
							<td>{{trans('template.total')}} : </td>
							<td style=" padding-right:30px;"><span id="Total_Asset"> $ 0.00 </span></td>
						</tr>
					</tfoot>
				</table>
				<table class="table table-striped table-bordered" width="100%" id="table_Libilities">
					<thead>
						<tr class="bg-primary">
							<th style="width:5%;">{{ trans('template.no') }}</th>
							<th >{{ trans('template.libilities') }}</th>
							<th style="width:30%; text-align:right; padding-right:30px;">{{ trans('template.amount') }}</th>
						</tr>
					</thead>
					<tbody>
					
					</tbody>
					<tfoot>
						<tr style="text-align:right;">
							<td></td>
							<td>{{trans('template.total')}} : </td>
							<td style=" padding-right:30px;"><span id="total_Libilities"> $ 0.00 </span></td>
						</tr>
					</tfoot>
				</table>
				<table class="table table-striped table-bordered" width="100%" id="table_Equity">
					<thead>
						<tr class="bg-primary">
							<th style="width:5%;">{{ trans('template.no') }}</th>
							<th >{{ trans('template.equity') }}</th>
							<th style="width:30%; text-align:right; padding-right:30px;">{{ trans('template.amount') }}</th>
						</tr>
					</thead>
					<tbody>
					
					</tbody>
					<tfoot>
						<tr style="text-align:right;">
							<td></td>
							<td>{{trans('template.total')}} : </td>
							<td style=" padding-right:30px;"><span id="total_Equity"> $ 0.00 </span></td>
						</tr>
					</tfoot>
				</table>
				<table class="table table-striped table-bordered" width="100%" id="table_TotalData">
					<thead>
						<tr class="bg-warning">
							<th style="width:5%;">{{ trans('template.no') }}</th>
							<th>{{ trans('template.libilities') }} + {{ trans('template.equity') }}</th>
							<th style="width:30%; text-align:right; padding-right:30px;">{{ trans('template.amount') }}</th>
						</tr>
					</thead>
					<tfoot>
						<tr style="text-align:right;color:red">
							<td> 1 </td>
							<td> <i style="padding-right:50px;"><span id="total_Libilitiess"> $ 0.00 </span> + <span id="total_Equitys"> $ 0.00 </span></i> {{trans('template.total')}} : </td>
							<td style=" padding-right:30px;"> <span id="total_LE"> $ 0.00</span></td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection()
@section('javascript')
<script type="text/javascript">	
table_Assets =$('#table_Assets').DataTable({
	"paging":   false,
	"filter":   false,
    "info":     false,
	processing: true,
	serverSide: true,
	ajax: '{{url("/accounting/balance-sheet/Asset")}}<?php echo $param; ?>',
	columns: [
		{data: 'rownum', name: 'rownum'},
		{data: 'account_name', name: 'account_name'},
		{data: 'total_Asset', name: 'total_Asset'}
	],'fnCreatedRow':function(nRow,aData,iDataIndex){
		$('td:eq(0)',nRow).attr('style','text-align:center');
		$('td:eq(1)',nRow).attr('style','padding-left:30px;font-size:15px;');
		$('td:eq(2)',nRow).attr('style','text-align:right;padding-right:30px;font-size:15px;');
	},initComplete:function(setting,json){
		var amount_Asset =0;
		$.each(json.data,function(index,DataRow){
			amount_Asset = amount_Asset+parseFloat(DataRow.amount_Asset);
		});
		$('#Total_Asset').html(formatCurrency(amount_Asset));
	}
});
var all_libility = 0;
var all_equity =0;
table_Libilities =$('#table_Libilities').DataTable({
	"paging":   false,
	"filter":   false,
    "info":     false,
	processing: true,
	serverSide: true,
	ajax: '{{url("/accounting/balance-sheet/Libilities")}}<?php echo $param; ?>',
	columns: [
		{data: 'rownum', name: 'rownum'},
		{data: 'account_name', name: 'account_name'},
		{data: 'total_Libilities', name: 'total_Libilities'}
	],'fnCreatedRow':function(nRow,aData,iDataIndex){
		$('td:eq(0)',nRow).attr('style','text-align:center');
		$('td:eq(1)',nRow).attr('style','padding-left:30px;font-size:15px;');
		$('td:eq(2)',nRow).attr('style','text-align:right;padding-right:30px;font-size:15px;');
	},initComplete:function(setting,json){
		var amount_Libilities =0;
		$.each(json.data,function(index,DataRow){
			amount_Libilities = amount_Libilities+parseFloat(DataRow.amount_Libilities);
		});
		$('#total_Libilities').html(formatCurrency(amount_Libilities));
		$('#total_Libilitiess').html(formatCurrency(amount_Libilities));
		all_libility = amount_Libilities;
		$('#total_LE').html(formatCurrency(parseFloat(all_libility)+parseFloat(all_equity)));
	}
});
table_Equity =$('#table_Equity').DataTable({
	"paging":   false,
	"filter":   false,
    "info":     false,
	processing: true,
	serverSide: true,
	ajax: '{{url("/accounting/balance-sheet/Equity")}}<?php echo $param; ?>',
	columns: [
		{data: 'rownum', name: 'rownum'},
		{data: 'account_name', name: 'account_name'},
		{data: 'total_Equity', name: 'total_Equity'}
	],'fnCreatedRow':function(nRow,aData,iDataIndex){
		$('td:eq(0)',nRow).attr('style','text-align:center');
		$('td:eq(1)',nRow).attr('style','padding-left:30px;font-size:15px;');
		$('td:eq(2)',nRow).attr('style','text-align:right;padding-right:30px;font-size:15px;');
	},initComplete:function(setting,json){
		var total_Equity =0;
		$.each(json.data,function(index,DataRow){
			total_Equity = total_Equity+parseFloat(DataRow.amount_Equity);
		});
		$('#total_Equity').html(formatCurrency(total_Equity));
		$('#total_Equitys').html(formatCurrency(total_Equity));
		all_equity= total_Equity;
		$('#total_LE').html(formatCurrency(parseFloat(all_libility)+parseFloat(all_equity)));
	}
});
$(document).ready(function(){	
	var start_date = $("#start_date").val();
	var end_date = $("#end_date").val();
	if(start_date=='' || start_date==null){
		$('#start_date').val(moment().format('YYYY-MM-DD'));
		$('#PrintStartDateData').text(moment().format('DD/MM/YYYY'));
		start_date = moment().format('MMMM D, YYYY');
		
	}else{
		var date =  Date.parse(start_date);
		start_date = date.toString('MMMM d, yyyy');
		$('#PrintStartDateData').text(date.toString('dd/MM/yyyy'));
	}
	if(end_date=='' || end_date==null){
		$('#end_date').val(moment().format('YYYY-MM-DD'));
		$('#PrintEmdDateData').text(moment().format('DD/MM/YYYY'));
		end_date = moment().format('MMMM D, YYYY');
	}else{
		var date  = Date.parse(end_date);
		end_date = date.toString('MMMM d, yyyy');
		$('#PrintEmdDateData').text(date.toString('dd/MM/yyyy'));
	}
	$('#search-daterangepicker').daterangepicker({
		"ranges": {
			'Today': [moment(), moment()],
			'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
			'Last 7 Days': [moment().subtract('days', 6), moment()],
			'Last 30 Days': [moment().subtract('days', 29), moment()],
			'This Month': [moment().startOf('month'), moment().endOf('month')],
			'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')],
			'This Year': [moment().startOf('year'), moment().endOf('year')],
			'Last Year': [moment().subtract('year', 1).startOf('year'), moment().subtract('year', 1).endOf('year')],
		},
		"locale": {
			"format": "MM/DD/YYYY",
			"separator": " - ",
			"applyLabel": "Apply",
			"cancelLabel": "Cancel",
			"fromLabel": "From",
			"toLabel": "To",
			"customRangeLabel": "Custom",
			"daysOfWeek": [
				"Su",
				"Mo",
				"Tu",
				"We",
				"Th",
				"Fr",
				"Sa"
			],
			"monthNames": [
				"January",
				"February",
				"March",
				"April",
				"May",
				"June",
				"July",
				"August",
				"September",
				"October",
				"November",
				"December"
			],
			"firstDay": 1
		},
		opens: (App.isRTL() ? 'right' : 'left'),
	}, function(start, end, label) {
		$('.start_date').val(start.format('YYYY-MM-DD'));
		$('#search-daterangepicker span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		$('.end_date').val(end.format('YYYY-MM-DD'));
	});
	
	$('#search-daterangepicker span').html(start_date + ' - ' + end_date);
	$('#search-daterangepicker').show();
});	
</script>
@endsection()