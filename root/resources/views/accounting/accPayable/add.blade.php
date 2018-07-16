@extends('layouts.app')

@section('content')
 <div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="{{url('/')}}">{{ trans('template.dashboard') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<a href="{{url('accounting/income/index')}}">​{{ trans('template.income') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>​{{ trans('template.add_new') }}</span>
		</li>
	</ul>
</div>
<br/>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light portlet-fit portlet-form bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-plus font-green"></i>
					<span class="caption-subject font-green sbold uppercase">{{ trans('template.income') }}</a></span>
				</div>
			</div>
			<div class="portlet-body form-body">
				<form class="form-horizontal formIncome" method="POST" action="{{url('accounting/income/insert')}}" id="form_validation">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					<div class="form-body">
						@if(count($errors))
							@foreach($errors->all() as $error)
								<span class="alert alert-danger" style="display:block;">{{$error}}</span>
							@endforeach
						@endif
						@if(Session::has('message'))
							<div class="alert alert-success display-show" >
								<button class="close" data-close="alert"></button> 
								{!!Session::get('message')!!} 
							</div>
						@endif
						<div class="alert alert-danger display-hide">
							<button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
						<div class="alert alert-success display-hide">
							<button class="close" data-close="alert"></button> Your form validation is successful! </div>

						<div style="border: 1px solid #b7b7b7; background: rgba(173, 203, 206, 0.28);    margin-top: -15px;" class="col-md-6">
							<div class="form-group{{ $errors->has('referent_no') ? ' has-error' : '' }}  margin-top-20">
								<label class="control-label col-md-3">{{trans('template.referent_no')}}
									<span class="required"> * </span>
								</label>			                    
								<div class="col-md-9">
									<div class="input-icon right">
										<i class="fa"></i>
										<input type="text" value="{{ old('referent_no') }}" class="form-control" name="referent_no" id="referent_no" placeholder="{{trans('template.referent_no')}}" /> </div>
									@if($errors->has('referent_no'))
	                                        <span style="color:red">{!!$errors->first('referent_no')!!} </span>
									@endif	
								</div>
							</div>
							<div class="form-group{{ $errors->has('income_date') ? ' has-error' : '' }}  margin-top-20">
								<label class="control-label col-md-3">{{trans('template.date')}}
								<span class="required"> * </span>
								</label>			                    
								<div class="col-md-9">
									<div class="input-icon right">
										<input class="form-control datepicker" type="text" name="income_date" id="income_date" placeholder="{{trans('template.date')}} - day-Month-Year" >
									</div>
									@if($errors->has('income_date'))
	                                        <span style="color:red">{!!$errors->first('income_date')!!} </span>
									@endif	
								</div>
							</div>
							<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}  margin-top-20">
								<label class="control-label col-md-3">{{trans('template.name')}}
								<span class="required"> * </span>
								</label>			                    
								<div class="col-md-9">
									<div class="input-icon right">
										<select name="user_id" class="form-control select2" id="user_id" style="width: 100%;">
											<option value="0">--- {{trans('template.please_select')}} ---</option>
											{{\App\Helpers\Helpers::getUsers()}}
										</select>
									</div>
									@if($errors->has('name'))
	                                        <span style="color:red">{!!$errors->first('name')!!} </span>
									@endif	
								</div>
							</div>
						</div>
						<div style="border: 1px solid #b7b7b7; background: rgba(173, 203, 206, 0.28);    margin-top: -15px;" class="col-md-6">
							<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}  margin-top-20">
								<label class="control-label col-md-5" style="color: green; font-size: 18px;">{{trans('template.direct_income')}}</label>
								<label class="control-label col-md-5"></label>			    
							</div>
							<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}  margin-top-20">
								<label class="control-label col-md-4">{{trans('template.chart_account')}}
									<span class="required"> * </span>
								</label>			                    
								<div class="col-md-8">
									<div class="input-icon right">
										<select name="chart_account" class="form-control select2" id="chart_account">
											<option value="0">--- {{trans('template.please_select')}} ---</option>
											{{\App\Helpers\Helpers::getChartAccountID([1,4,5])}}
										</select>
									</div>
									@if($errors->has('chart_account'))
	                                        <span style="color:red">{!!$errors->first('chart_account')!!} </span>
									@endif	
								</div>
							</div>
							<div class="form-group{{ $errors->has('class') ? ' has-error' : '' }}  margin-top-20">
								<label class="control-label col-md-4">{{trans('template.class')}}
								</label>			                    
								<div class="col-md-8">
									<div class="input-icon right">
										<select name="class" class="form-control select2 value_class" id="AddClass">
											<option value="0">--- {{trans('template.please_select')}} ---</option>
											<option value="-1"> {{trans('template.add_new')}} </option>
											{{\App\Helpers\Helpers::getClasses(0,0,'')}}
										</select>
									</div>
									@if($errors->has('class'))
	                                        <span style="color:red">{!!$errors->first('class')!!} </span>
									@endif	
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<table class="table table-striped table-bordered table-hover dt-responsive" id="tableIncome" width="100%" >
							<thead>
								<tr style="text-align: center;" class="btn-success">
									<td style="width: 8%;">{{trans('template.action')}}</td>
									<td >{{trans('template.chart_account')}}</td>
									<td >{{trans('template.amount')}}</td>
									<td >{{trans('template.description')}}</td>									
									<td>{{trans('template.class')}}</td>
									<td>{{trans('template.tax')}}</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<a class="btn btn-circle btn-icon-only btn-primary AddNew"><i class="fa fa-plus"></i> </a>
									</td>
									<td style="width: 30%;">
										<select name="arr_chart_account[]" class="form-control select2 chart_account_name">
											<option value="0">--- {{trans('template.please_select')}} ---</option>
											{{\App\Helpers\Helpers::getAllChart(0,0,'',4)}}
										</select>
									</td>
									<td>
										<input type="text" class="form-control enter_price enter_price0" onkeyup="EnterQty(this)" name="amount[]" placeholder="{{trans('template.amount')}}">
									</td>
									<td>
										<textarea class="form-control"></textarea>
									</td>
									<td>
										<select name="class" class="form-control select2">
											<option value="0">--- {{trans('template.please_select')}} ---</option>
											{{\App\Helpers\Helpers::getClasses(0,0,'')}}
										</select>
									</td>
									<td>
										<select name="class" class="form-control select2 select_tax select_tax0" onchange="ClickTax(this,0)">
											<option value="0">--- {{trans('template.please_select')}} ---</option>
											{{\App\Helpers\Helpers::getTax()}}
										</select>
										<input type="hidden" name="tax_value" class="value_tax value_tax0" value="0">
									</td>
								</tr>
							</tbody>
						</table>
						<div class="col-md-8"></div>
						<div class="col-md-4" style="padding-right: 0px !important;" >
							<table class="table table-striped table-bordered">
								<tr>
									<td style="line-height: 30px;">{{trans('template.sub_total')}} : </td>
									<td>
										<input type="text" class="form-control" id="sub_total" placeholder="$ 0.00" name="sub_total" readonly>
									</td>
								</tr>
								<tr>
									<td style="line-height: 30px;">{{trans('template.total_tax')}} : </td>
									<td>
										<input type="text" class="form-control" id="total_tax" placeholder="$ 0.00" name="total_tax" readonly>
									</td>
								</tr>
								<tr>
									<td style="line-height: 30px;">{{trans('template.grand_total')}} : </td>
									<td>
										<input type="text" placeholder="$ 0.00" id="grand_total" class="form-control" name="grand_total" readonly>
									</td>
								</tr>
							</table>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-4 col-md-6">
								<button type="submit"  name="btnSave" value="save" class="btn green" id="SaveIncome"> <i class="fa fa-save"> </i> <strong> {{trans('template.save')}}</strong></button>
								<a href="{{url('category/index')}}"><button type="button" id="btnClose" class="btn btn-danger"> <i class="fa fa-times-circle"> </i> <strong> {{trans('template.cancel')}}</strong></button> </a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@include('modal.classes')
@endsection
@section('javascript')
<script type="text/javascript">
$(document).ready(function() {
	table_income = $('#tableIncome').DataTable({
		"filter":   false,
		"paging":   false,
	    "ordering": false,
	    "info":     false
	});	
});
var counter = 1;
$('.AddNew').click(function(){	
	table_income.row.add( [
		'<a id="row_'+counter+'" class="btn btn-circle btn-icon-only btn-danger" onclick="deleteRow(this.id)" ><i class="fa fa-times"></i> </a>',
		'<select name="arr_chart_account[]" class="form-control select2 chart_account_name">'+
			'<option value="0">--- {{trans("template.please_select")}} ---</option>'+
			'{{\App\Helpers\Helpers::getAllChart(0,0,"",4)}}'+
		'</select>',
		'<input type="text" class="form-control enter_price enter_price'+counter+'" onkeyup="EnterQty(this)" name="amount[]" placeholder="{{trans("template.amount")}}" >',
		'<textarea class="form-control"></textarea>',
		'<select name="class_data[]" class="form-control select2">'+
			'<option value="0">--- {{trans("template.please_select")}} ---</option>'+
			'{{\App\Helpers\Helpers::getClasses(0,0,"")}}'+
		'</select>',
		'<select name="tax[]" class="form-control select2 select_tax select_tax'+counter+'" onchange="ClickTax(this,'+counter+')">'+
			'<option value="0">--- {{trans("template.please_select")}} ---</option>'+
			'{{\App\Helpers\Helpers::getTax()}}'+
		'</select><input type="hidden" name="tax_value" class="value_tax value_tax'+counter+'" value="0">',
		] ).draw();
	$('.select2').select2();
});
function deleteRow(id){
	table_income.row($('#'+id).parents('tr')).remove().draw( false );
	CalculateDataTable();
}
function EnterQty(field){
	var val=$(field).val();
	if(val!='' && val!=null){
		var re = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)$/g;
		var re1 = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)/g; 
		if (re.test(val)) {
			$(field).css("border", "1px solid #ccc");
			CalculateDataTable();
		} else {
			val = re1.exec(val);
			if (val) {
				$(field).val(val[0]);
			} else {
				$(field).val('');
			}
		}
	}else{
		$(field).css("border", "1px solid red");
	}
}
$('.value_class').on('change',function(){
	var id = $(this).val();
	if(id == -1){
		$('#ModalClasses').modal('show');
	}	
});
function CalculateDataTable(){
	var amount = 0;
	var amount_tax = 0;
	$('#tableIncome tbody tr').each(function() {
		var price=$(this).children().find('.enter_price').val();
		if(price=='' || price==null || typeof(price)==typeof(undefind)){
			price=0;
		}		
		var tax=$(this).children().find('.value_tax').val();
		if(tax=='' || tax==null || typeof(tax)==typeof(undefind)){
			tax=0;
		}
		amount=amount+(parseFloat(price));		
		amount_tax=amount_tax+(parseFloat(price*tax));		
    });
    $('#sub_total').val('0.00');
	$('#sub_total').val(amount);
	$('#total_tax').val('0.00');
	$('#total_tax').val(amount_tax);
	GrandTotal();
}
function GrandTotal(){
	var sub_total = $('#sub_total').val();
	var total_tax = $('#total_tax').val();
	if(total_tax == "" || total_tax==null){
		total_tax = 0;
	}else{
		total_tax = total_tax;
	}
	$('#grand_total').val(parseFloat(sub_total)+parseFloat(total_tax));
}
function ClickTax(field,ids){
	var val=$(field).val();
	if(val !=0){
		name = $(".select_tax"+ids+" option[value='"+val+"']").text();
		var array_tax = name.split("=").map(Number);
		$('.value_tax'+ids).val(array_tax[1]);
	}else{
		$('.value_tax'+ids).val(0);
	}
	CalculateDataTable();	
}
$('#SaveIncome').click(function(){
	if(onSubmit()){
	}else{
		return isValid  = false;
	}
});
function onSubmit(){
	var referent_no=  $('#referent_no').val();
	var income_date = $('#income_date').val();
	var user_id = $('#user_id').val();
	var chart_account = $('#chart_account').val();
	var chart_account_name = $('.chart_account_name').val();
	var enter_price  = $('.enter_price ').val();
	if(referent_no=="" || income_date=="" || user_id==0 || chart_account==0 || chart_account_name==0 || enter_price =="" || chart_account==0 || chart_account_name==0 || enter_price =="" ){
		if(referent_no !=""){
			$('#referent_no').css("border", "1px solid #ccc");
		}else{
			$('#referent_no').css("border", "1px solid red");
		}
		if(income_date !=""){
			$('#income_date').css("border", "1px solid #ccc");
		}else{
			$('#income_date').css("border", "1px solid red");
		}
		if(user_id !=0){
			$('#user_id').next().find('.select2-selection').css("border", "1px solid #ccc");
		}else{
			$('#user_id').next().find('.select2-selection').css("border", "1px solid red");
		}	
		if(chart_account !=0){
			$('#chart_account').next().find('.select2-selection').css("border", "1px solid #ccc");
		}else{
			$('#chart_account').next().find('.select2-selection').css("border", "1px solid red");
		}
		$(".enter_price").each(function () {
			if ($(this).val()=='' || $(this).val()==null) {
				isValid = false;
				$(this).css("border", "1px solid red");
			} else {
				$(this).css("border", "1px solid #ccc");
			}
		});
		$(".chart_account_name").each(function () {
			if ($(this).val()==0 || $(this).val()==null) {
				$(this).next().find('.select2-selection').css("border", "1px solid red");
			} else {
				$(this).next().find('.select2-selection').css("border", "1px solid #ccc");
			}
		});
		return isValid = false;
	}else{
		return isValid = true;
	}
}
</script>
@endsection()

