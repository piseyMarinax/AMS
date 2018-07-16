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
			<span>{{ trans('template.income_statement') }}</span>
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
							<span class="caption-subject bold uppercase">{{ trans('template.income_statement') }}</span>
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
				<div class="col-md-4" style="margin-top: 10px;">
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
				<table class="table table-striped table-bordered" width="100%" id="table_income">
					<thead>
						<tr class="bg-primary">
							<th style="width:5%;">{{ trans('template.no') }}</th>
							<th >{{ trans('template.revenue') }}</th>
							<th style="width:30%; text-align:right; padding-right:30px;">{{ trans('template.amount') }}</th>
						</tr>
					</thead>
					<tbody>
					
					</tbody>
					<tfoot>
						<tr style="color:red">
							<td></td>
							<td style="text-align:right;">{{ trans('template.total') }}</td>
							<td style="text-align:right;padding-right:30px;"><span id="Total_Revenus">0.00 </span> </td>
						</tr>
					</tfoot>
				</table>
				<table class="table table-striped table-bordered" width="100%" id="table_expense">
					<thead>
						<tr class="bg-primary">
							<th style="width:5%;">{{ trans('template.no') }}</th>
							<th >{{ trans('template.expense') }}</th>
							<th style="width:30%; text-align:right; padding-right:30px;">{{ trans('template.amount') }}</th>
						</tr>
					</thead>
					<tbody>
					
					</tbody>
					<tfoot>
						<tr style="color:red">
							<td></td>
							<td style="text-align:right;">{{ trans('template.total') }}</td>
							<td style="text-align:right;padding-right:30px;"><span id="Total_Expense">$ 0.00 </span> </td>
						</tr>
					</tfoot>
				</table>
				<table class="table table-striped table-bordered" width="100%" id="table_netIncome">
					<thead>
						<tr class="bg-warning">
							<th style="width:5%;">{{ trans('template.no') }}</th>
							<th>NetIncome</th>
							<th style="width:30%; text-align:right; padding-right:30px;">{{ trans('template.amount') }}</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>{{ trans('template.revenue') }} - {{ trans('template.expense') }} <i style="text-align:right;padding-left:50px;"><span id="Total_Revenuss"> 0.00 </span> - <span id="Total_Expensess">$ 0.00 </span></i> </td>
							<td style="text-align:right;padding-right:30px;"><b><span id="Total_NetIncome" style="color:red">$ 0.00</span></b></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection()
@section('javascript')
<script type="text/javascript">	
var all_Revenus = 0;
var all_Expense = 0;
table_income =$('#table_income').DataTable({
	"paging":   false,
	"filter":   false,
    "info":     false,
	processing: true,
	serverSide: true,
	ajax: '{{url("/accounting/income-statement/Revenue")}}<?php echo $param; ?>',
	columns: [
		{data: 'rownum', name: 'rownum'},
		{data: 'account_name', name: 'account_name'},
		{data: 'total_Revenue', name: 'total_Revenue'}
	],'fnCreatedRow':function(nRow,aData,iDataIndex){
		$('td:eq(1)',nRow).attr('style','padding-left:30px;font-size:15px;');
		$('td:eq(2)',nRow).attr('style','text-align:right;padding-right:30px;font-size:15px;');
	},initComplete:function(setting,json){
		var total_amount =0;
		$.each(json.data,function(index,DataRow){
			total_amount = total_amount+parseFloat(DataRow.amount_Revenue);
		});
		$('#Total_Revenus').html(formatCurrency(total_amount));
		$('#Total_Revenuss').html(formatCurrency(total_amount));
		all_Revenus = total_amount;
		$('#Total_NetIncome').html(formatCurrency(parseFloat(all_Revenus)-parseFloat(all_Expense)));
	}
});
table_expense =$('#table_expense').DataTable({
	"paging":   false,
	"filter":   false,
    "info":     false,
	processing: true,
	serverSide: true,
	ajax: '{{url("/accounting/income-statement/Expense")}}<?php echo $param; ?>',
	columns: [
		{data: 'rownum', name: 'rownum'},
		{data: 'account_name', name: 'account_name'},
		{data: 'total_Expense', name: 'total_Expense'},
	],'fnCreatedRow':function(nRow,aData,iDataIndex){
		$('td:eq(1)',nRow).attr('style','padding-left:30px;font-size:15px;');
		$('td:eq(2)',nRow).attr('style','text-align:right;padding-right:30px;font-size:15px;');
	},initComplete:function(setting,json){
		var total_expenses =0;
		$.each(json.data,function(index,DataRow){
			total_expenses = total_expenses+parseFloat(DataRow.amount_Expense);
		});
		$('#Total_Expense').html(formatCurrency(total_expenses));
		$('#Total_Expensess').html(formatCurrency(total_expenses));
		all_Expense = total_expenses;
		$('#Total_NetIncome').html(formatCurrency(parseFloat(all_Revenus)-parseFloat(all_Expense)));
	}
});
table_netIncome =$('#table_netIncome').DataTable({
	"paging":   false,
	"filter":   false,
    "info":     false
});
console.log(all_Expense);
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