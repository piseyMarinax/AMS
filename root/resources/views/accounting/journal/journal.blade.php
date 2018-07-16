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
	if(Request::input('chart_account')){
		$chart_account = Request::input('chart_account');
		$param.='&chart_account='.$chart_account;
	}else{
		$chart_account = '';
		$param.='&chart_account='.$chart_account;
	}
	if(Request::input('chart_account_gruop')){
		$chart_account_gruop = Request::input('chart_account_gruop');
		$param.='&chart_account_gruop='.$chart_account_gruop;
	}else{
		$chart_account_gruop = '';
		$param.='&chart_account_gruop='.$chart_account_gruop;
	}
?>
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="{{url('/')}}">{{ trans('template.dashboard') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>{{ trans('template.journal') }}</span>
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
					<div class="page-toolbar">
						<div id="search-daterangepicker" style="border: 1px solid #ccc;padding: 7px 30px;" class="pull-right tooltips btn btn-sm" data-container="body">
							<i class="icon-calendar"></i>&nbsp;
							<span class="thin uppercase hidden-xs"> </span>&nbsp;
							<i class="fa fa-angle-down"></i>
							<input type="hidden" name="start_date" value="{{$start_date}}" id="start_date" class="start_date" />
							<input type="hidden" name="end_date" value="{{$end_date}}" id="end_date" class="end_date" />
						</div>
					</div>
				</div>
				<div class="caption font-dark col-md-3">
					<div class="page-toolbar">
						<select name="chart_account" class="form-control select2 chart_account">
							<option value="0">--- {{trans('template.chart_account')}} ---</option>
							{{\App\Helpers\Helpers::getAllChart(0,0,$chart_account)}}
						</select>
					</div>
				</div>
				<div class="caption font-dark col-md-3">
					<div class="page-toolbar">
						<select name="chart_account_gruop" class="form-control select2 chart_account_gruop">
							<option value="0">--- {{trans('template.chart_account')}} ---</option>
							{{\App\Helpers\Helpers::getAccountGruop($chart_account_gruop)}}
						</select>
					</div>
				</div>
				<div class="col-md-1">
					<button type="submit" class="btn btn-primary"><i class="fa fa-search"> </i> {{ trans('template.search') }}</button>
				</div>
				<div class="col-md-1">
					<div class="btn-group">
						<button class="btn blue dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
						Action <i class="fa fa-angle-down"></i>
						</button>
						<ul class="dropdown-menu" role="menu" style="min-width:130px;"> 
							<li>
								<a style="color:#1f78b5;" onclick="onDataTable()" ><i class="fa fa-print"> </i> {{ trans('template.print') }}</a>
							</li>
							<li>
								<a style="color:#1f78b5;" onclick="ExportDataTable()" href="#"><i class="fa fa-file-text-o"> </i> {{ trans('template.export') }}</a>
							</li>
						</ul>
					</div>							
				</div>
				</form>
			</div>
			<div class="portlet-body">
				@if(Session::has('message'))
					<div class="alert alert-success display-show">
						<button class="close" data-close="alert"></button> {!!Session::get('message')!!}
					</div>
				@endif
				<table class="table table-striped table-bordered" width="100%" id="table_journal">
					<thead>
						<tr class="bg-primary">
							<th>{{ trans('template.no') }}</th>
							<th>{{ trans('template.date') }}</th>
							<th>{{ trans('template.referent_no') }}</th>
							<th>{{ trans('template.chart_account') }}</th>
							<th>{{ trans('template.description') }}</th>
							<th>{{ trans('template.name') }}</th>
							<th>{{ trans('template.credit') }}</th>
							<th>{{ trans('template.debit') }}</th>
						</tr>
					</thead>
					<tbody>
					
					</tbody>
					<tfoot>
						<tr>
							<td colspan="5"></td>
							<td>{{trans('template.total')}} : </td>
							<td> $ <?php echo number_format($dataJournal->debit,2) ?></td>
							<td> $ <?php echo number_format($dataJournal->credit,2) ?></td>
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
$.fn.dataTable.ext.errMode = 'throw';
var table=$('#table_journal').DataTable({
		processing: true,
		serverSide: true,
		ordering:false,
		iDisplayLength:50,
		"lengthMenu": [[15, 25, 50, 100, -1], [15, 25, 50, 100, "All"]],
		ajax:'{{url("/accounting/journal/listjournal")}}<?php echo $param; ?>',
		columns: [
			{data: 'rownum'},
			{data: 'jn_DateTransaction'},
			{data: 'reference_no'},
			{data: 'account_chart_code'},
			{data: 'jn_DES'},
			{data: 'received_by'},
			{data: 'debit'},
			{data: 'credit'}
		],'fnCreatedRow':function(nRow,aData,iDataIndex){
			if(aData['rownum']==0){
				$('td:eq(0)',nRow).html('');
				$('td:eq(2)',nRow).html('');
				$('td:eq(5)',nRow).attr('style','text-decoration: underline;color:red');
				$('td:eq(6)',nRow).attr('style','text-decoration: underline;color:red');
				$('td:eq(7)',nRow).attr('style','text-decoration: underline;color:red');
			}
		},
		order:[[1,'asc']]
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