@extends('layouts.app')

@section('content')
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="{{url('/')}}">{{ trans('template.dashboard') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>{{ trans('template.cash_flow') }}</span>
		</li>
	</ul>
</div>
<br/>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title col-md-12">
				<div class="caption font-dark col-md-4">		
					<div class="portlet-title">
						<div class="caption font-green">
							<i class="fa fa-table font-green"></i>
							<span class="caption-subject bold uppercase">{{ trans('template.cash_flow') }}</span>
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
							<th >{{ trans('template.beginning_cash_balance') }}</th>
							<th style="width:30%; text-align:right; padding-right:30px;">{{ trans('template.amount') }}</th>
						</tr>
					</thead>
					<tbody>
					
					</tbody>
				</table>
				<table class="table table-striped table-bordered" width="100%" id="table_expense">
					<thead>
						<tr class="bg-primary">
							<th style="width:5%;">{{ trans('template.no') }}</th>
							<th >{{ trans('template.cash_inflow') }}</th>
							<th style="width:30%; text-align:right; padding-right:30px;">{{ trans('template.amount') }}</th>
						</tr>
					</thead>
					<tbody>
					
					</tbody>
				</table>
				<table class="table table-striped table-bordered" width="100%" id="table_expense">
					<thead>
						<tr class="bg-primary">
							<th style="width:5%;">{{ trans('template.no') }}</th>
							<th >{{ trans('template.cash_outflow') }}</th>
							<th style="width:30%; text-align:right; padding-right:30px;">{{ trans('template.amount') }}</th>
						</tr>
					</thead>
					<tbody>
					
					</tbody>
				</table>
				<table class="table table-striped table-bordered" width="100%" id="table_expense">
					<thead>
						<tr class="bg-primary">
							<th style="width:5%;">{{ trans('template.no') }}</th>
							<th >{{ trans('template.cash_supposed_to_be_received') }}</th>
							<th style="width:30%; text-align:right; padding-right:30px;">{{ trans('template.amount') }}</th>
						</tr>
					</thead>
					<tbody>
					
					</tbody>
				</table>
				<table class="table table-striped table-bordered" width="100%" id="table_netIncome">
					<thead>
						<tr class="bg-warning">
							<th style="width:5%;">{{ trans('template.no') }}</th>
							<th>{{ trans('template.ending_cash_balance') }}</th>
							<th style="width:30%; text-align:right; padding-right:30px;">{{ trans('template.amount') }}</th>
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
table_income =$('#table_income').DataTable({
	"paging":   false,
	"filter":   false,
    "info":     false
});
table_expense =$('#table_expense').DataTable({
	"paging":   false,
	"filter":   false,
    "info":     false
});
table_netIncome =$('#table_netIncome').DataTable({
	"paging":   false,
	"filter":   false,
    "info":     false
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