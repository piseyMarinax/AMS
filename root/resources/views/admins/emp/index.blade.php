@extends('layouts.apptop3')

@section('content')
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="{{url('/')}}">{{ trans('template.dashboard') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>			
			<span>{{ trans('template.administrative') }}</span>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>{{ trans('template.employee') }}</span>
		</li>
	</ul>
</div>
<br/>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-body">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab_1_1" data-toggle="tab"> 
								<i class="fa fa-table font-green"></i>
								<span class="caption-subject bold uppercase">{{ trans('template.employee') }}</span>
							</a>
						</li><!--
						<li>
							<a href="#tab_1_2" data-toggle="tab"> 
								<i class="fa fa-table font-green"></i>
								<span class="caption-subject bold uppercase">{{ trans('template.employee') }}</span>
							</a>
						</li>-->
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade active in" id="tab_1_1">
							<div class="actions" style="float:right;padding:8px;">
								<a title="{{ trans('template.add_new') }}" class="btn btn-circle btn-icon-only btn-default" href="{{ url('admins/staff/add') }}">
									<i class="fa fa-plus"></i>
								</a>
							</div>
							<div class="portlet-body">
								@if(Session::has('message'))
									<div class="alert alert-success display-show">
										<button class="close" data-close="alert"></button> {!!Session::get('message')!!}
									</div>
								@endif
								
								<table class="table table-striped table-bordered table-hover" width="100%" id="table-emp">
									<thead>
										<tr class="bg-primary">
											
											<th>No.</th>
											<th>ID</th>
											<th>{{ trans('template.action') }}</th>
											<!--<th>{{ trans('template.photo') }}</th>-->
											<th>{{ trans('template.namekh') }}</th>
											<th>{{ trans('template.nameen') }}</th>
											<th>{{ trans('template.gender') }}</th>
											<th>Date of Birth</th>
											<th>{{ trans('template.phone') }}</th>
											<th>{{ trans('template.email') }}</th>
											<th>{{ trans('template.status') }}</th>							
											
										</tr>
									</thead>
									<tbody>
									
									</tbody>
								</table>
								<script id="details-template" type="text/x-handlebars-template">
									<table class="table details-table" id="accountar-@{{id}}">
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
						</div><!--
						<div class="tab-pane fade" id="tab_1_2">
							<div class="actions" style="float:right;padding:8px;">
								<a title="{{ trans('template.add_new') }}" class="btn btn-circle btn-icon-only btn-default" href="{{ url('admins/absentt/type') }}">
									<i class="fa fa-plus"></i>
								</a>
							</div>
							<div class="portlet-body">
								@if(Session::has('message'))
									<div class="alert alert-success display-show">
										<button class="close" data-close="alert"></button> {!!Session::get('message')!!}
									</div>
								@endif
								<table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="table-absentType">
									<thead>
										<tr class="bg-primary">
											<th>{{ trans('template.no') }}</th>
											<th>{{ trans('template.title') }}</th>
											<th>{{ trans('template.description') }}</th>
											<th>{{ trans('template.status') }}</th>					
											<th>{{ trans('template.action') }}</th>
										</tr>
									</thead>
									<tbody>
									
									</tbody>
								</table>
							</div>
						</div>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection()
@section('javascript')
<script type="text/javascript">
function converQuot(value){
	return value.replace(/&quot;/g,'\"');
}	
var template = Handlebars.compile($("#details-template").html());
$.fn.dataTable.ext.errMode = 'throw';
$('#table-absentType').DataTable();
/*var table = $('#table-absentType').DataTable({
	processing: true,
	serverSide: true,
	ajax: '{{url("/admins/absentt/listtype")}}',
	columns: [
		{data:'id'},
		{data:'att_title'},
		{data:'attdetail'},
		{data:'attstatus'},
		{data:'action'},
	],'fnCreatedRow':function(nRow,aData,iDataIndex){
		var satatus ="";
		if(aData['attstatus']== 1){
			satatus = '<button class="btn blue btn-xs dropdown-toggle">{{trans("template.active")}}</button>';
		}else{
			satatus = '<button class="btn blue btn-xs dropdown-toggle">{{trans("template.disable")}}</button>';
		}
		$('td:eq(3)',nRow).html(satatus);
	}
});*/
var push_data =[];
var table = $('#table-emp').DataTable({
	processing: true,
	serverSide: true,
	ajax: '{{url("/admins/staff/getJsonEmp")}}',
	columns: [
		{data: 'rownum'},
		{data:'idnumber'},
		{data:'action'},
		//{data:'staffphoto'},
		{data:'fullnamekh'},
		{data:'fullnameen'},
		{data:'gender'},
		{data:'dob'},
		{data:'phone'},
		{data:'semail'},
		{data:'sstatus'},
	],'fnCreatedRow':function(nRow,aData,iDataIndex){
		var satatus ="";
		if(aData['sstatus']== 1){
			satatus = '<button class="btn blue btn-xs dropdown-toggle">{{trans("template.active")}}</button>';
		}else{
			satatus = '<button class="btn blue btn-xs dropdown-toggle">{{trans("template.disable")}}</button>';
		}
		$('td:eq(9)',nRow).html(satatus);

/*
		var images = "";
		if(aData['staffphoto']){
			images = '<img src="{{url('')}}/assets/employeephoto/'+aData['staffphoto']+'" width="100" >';
		}else{images = 'No Photo';}
		$('td:eq(3)',nRow).html(images);*/

	},initComplete:function(setting,json){
		//console.log(json.data);
		push_data.push(json.data);
		var datastr ='';
		$.each(json.data,function(index,Row){
			datastr+="<tr>";
				datastr+="<td><img src='{{url('/assets/employeephoto')}}//"+Row.staffphoto+"' width='100' ></td>";
				datastr+="<td>"+Row.dob+"</td>";
				datastr+="<td>"+Row.dob+"</td>";
				datastr+="<td>"+Row.dob+"</td>";
				datastr+="<td>"+Row.dob+"</td>";
			datastr+="</tr>";
		});
		$('#table-absentType tbody').html(datastr);
	}
});

function onDeleteType(id){
	var _token = $("input[name=_token]").val();
	App.doDelete("{{ trans('template.delete').' '.trans('template.type') }}","{{trans('template.message_delete').' '.trans('template.type').' ?'}}",'/admins/absenttType/delete',id,'post',_token);
}
var table = $('#table-ar').DataTable({
	processing: true,
	serverSide: true,
	ajax: '{{url("/accounting/account_receivable/list")}}',
	columns: [
		{
			"class":'details-control',
			"orderable":false,
			"searchable":false,
			"data":null,
			"defaultContent":''
		},
		{data: 'code'},
		{data: 'customer_name'},
		{data: 'amount'},
		{data: 'ar_date'},
		{data: 'user_name'},
		{data: 'status'},
		{data: 'amount'},
		{data: 'action', orderable: false, searchable: false},
	],'fnCreatedRow':function(nRow,aData,iDataIndex){
		var data_remaining = JSON.parse(converQuot(aData['remaining']));
		var amount_ar = aData['amount_ar'];
		var amount_paid = 0;
		var amount_apply =0;
		var amount_credit=0;
		$.each(data_remaining,function(index,DataRow){
			if(DataRow.action == 2 || DataRow.action == 3){
				amount_paid = amount_paid+parseFloat(DataRow.total_amount);
			}
			if(DataRow.action==5){
				amount_apply = amount_apply+parseFloat(DataRow.apply_amount);
			}
			if(DataRow.apply_amount<0){
				amount_credit = amount_credit+parseFloat(DataRow.apply_amount);
			}
		});
		var amount_remaining = amount_paid - amount_apply + amount_credit;
		if(amount_remaining !=0){					
				if((amount_ar - amount_remaining)> 0){
					if(parseFloat(amount_ar) - parseFloat(amount_remaining)- parseFloat(amount_appyle)==0){
						$('td:eq(6)',nRow).html('<button class="btn green btn-xs dropdown-toggle">Paid</button>').addClass("text-center");	
						$('td:eq(7)',nRow).html('<button class="btn green btn-xs dropdown-toggle">'+formatCurrency(0)+'</button>').addClass("text-center");	
					}else{
						$('td:eq(6)',nRow).html('<button class="btn yellow btn-xs dropdown-toggle">Partial Paid</button>').addClass("text-center");	
						$('td:eq(7)',nRow).html('<button class="btn yellow btn-xs dropdown-toggle">'+formatCurrency(parseFloat(amount_ar) - parseFloat(amount_remaining))+'</button>').addClass("text-center");	
					}
				}else{
					if((amount_ar - amount_remaining) < 0){
						amount_remaining = 0;
						$('td:eq(6)',nRow).html('<button class="btn blue btn-xs dropdown-toggle">Owed</button>').addClass("text-center");	
						$('td:eq(7)',nRow).html('<button class="btn blue btn-xs dropdown-toggle">'+formatCurrency(parseFloat(amount_ar))+'</button>').addClass("text-center");	
						$('td:eq(0)',nRow).addClass("text-center");
					}else{
						$('td:eq(6)',nRow).html('<button class="btn green btn-xs dropdown-toggle">Paid</button>').addClass("text-center");	
						$('td:eq(7)',nRow).html('<button class="btn green btn-xs dropdown-toggle">'+formatCurrency(0)+'</button>').addClass("text-center");	
					}
				}
			}else{
				amount_remaining = 0;
				$('td:eq(6)',nRow).html('<button class="btn blue btn-xs dropdown-toggle">Owed</button>').addClass("text-center");	
				$('td:eq(7)',nRow).html('<button class="btn blue btn-xs dropdown-toggle">'+formatCurrency(parseFloat(amount_ar))+'</button>').addClass("text-center");	
				$('td:eq(0)',nRow).addClass("text-center");	
			}
			if(aData['referent'] == 1){
				$('td:eq(6)',nRow).html('<button class="btn green btn-xs dropdown-toggle">Paid</button>').addClass("text-center");
				$('td:eq(7)',nRow).html('<button class="btn green btn-xs dropdown-toggle">'+formatCurrency(0)+'</button>').addClass("text-center");
			}
		$('td:eq(0)',nRow).html('<i class="fa fa-plus"> </i>').addClass("text-center");
	}
});
$('#table-ar tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var tableId = 'accountar-' + row.data().id;       
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
            $('#accountar-'+row.data().id+'_length').addClass('col-xs-12 col-md-6');
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
		ajax:'{{url("")}}/accounting/account_receivable/getDetailData/'+id,
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
	App.doDelete("{{ trans('template.delete').' '.trans('template.category') }}","{{trans('template.message_delete').' '.trans('template.category').' ?'}}",'/category/delete',id,'post',_token);
}
</script>
@endsection()