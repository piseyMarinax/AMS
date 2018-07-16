@extends('layouts.app')

@section('content')
 <div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="{{url('/')}}">{{ trans('template.dashboard') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<a href="{{url('accounting/journal_entry/index')}}">​{{ trans('template.journal_entry') }}</a>
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
					<span class="caption-subject font-green sbold uppercase">{{ trans('template.journal_entry') }}</a></span>
				</div>
			</div>
			<div class="portlet-body form-body">
				<form class="form-horizontal formjournal_entry" method="POST" action="{{url('accounting/journal_entry/update')}}" id="form_validation">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					<input type="hidden" name="update_id" value="<?php echo $journal_entry->id;?>" />
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
										<input type="text" value="{{$journal_entry->code}}" class="form-control" name="referent_no" id="referent_no" placeholder="{{trans('template.referent_no')}}" /> </div>
									@if($errors->has('referent_no'))
	                                        <span style="color:red">{!!$errors->first('referent_no')!!} </span>
									@endif	
								</div>
							</div>
							<div class="form-group{{ $errors->has('journal_entry_date') ? ' has-error' : '' }}  margin-top-20" style="padding: 8.5px;">
								<label class="control-label col-md-3">{{trans('template.date')}}
								<span class="required"> * </span>
								</label>			                    
								<div class="col-md-9">
									<div class="input-icon right">
										<input class="form-control datepicker" value="{{date('d-M-Y',strtotime($journal_entry->entry_date))}}" type="text" name="journal_entry_date" id="journal_entry_date" placeholder="{{trans('template.date')}} - day-Month-Year" >
									</div>
									@if($errors->has('journal_entry_date'))
	                                        <span style="color:red">{!!$errors->first('journal_entry_date')!!} </span>
									@endif	
								</div>
							</div>
						</div>
						<div style="border: 1px solid #b7b7b7; background: rgba(173, 203, 206, 0.28);    margin-top: -15px;" class="col-md-6">
							<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}  margin-top-20">
								<label class="control-label col-md-7" style="color: green; font-size: 18px;">{{trans('template.direct_journal_entry')}}</label>
								<label class="control-label col-md-5" id="AmountPayment" style="text-align: center;font-size: 18px;color: red;"> $ <?php echo number_format($journal_entry->amount,2); ?></label>			    
							</div>
							<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}  margin-top-20">
								<label class="control-label col-md-4">{{trans('template.description')}}
								</label>			                    
								<div class="col-md-8">
									<div class="input-icon right">
										<textarea class="form-control" name="des">{{$journal_entry->des}}</textarea>
									</div>
									@if($errors->has('description'))
	                                    <span style="color:red">{!!$errors->first('description')!!} </span>
									@endif	
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<table class="table table-striped table-bordered table-hover dt-responsive" id="tablejournal_entry" width="100%" >
							<thead>
								<tr style="text-align: center;" class="btn-success">
									<td style="width: 8%;">{{trans('template.action')}}</td>
									<td >{{trans('template.chart_account')}}</td>
									<td >{{trans('template.debit')}}</td>
									<td >{{trans('template.credit')}}</td>
									<td>{{trans('template.description')}}</td>									
									<td>{{trans('template.class')}}</td>
									<td>{{trans('template.user')}}</td>
								</tr>
							</thead>
							<tbody>
								<?php foreach($journal as $key=>$data){ ?>
								<tr>
									<td>
										<?php if($key ==0){ ?>
											<a class="btn btn-circle btn-icon-only btn-primary AddNew">
												<i class="fa fa-plus"></i> 
											</a>
										<?php }else{ ?>
											<a id="row_<?php echo $key;?>" class="btn btn-circle btn-icon-only btn-danger" onclick="deleteRow(this.id)" >
												<i class="fa fa-times"></i> 
											</a>
										<?php } ?>
									</td>
									<td style="width: 30%;">
										<select name="arr_chart_account[]" class="form-control select2 chart_account_name">
											<option value="0">--- {{trans('template.please_select')}} ---</option>
											{{\App\Helpers\Helpers::getAllChart(0,0,$data->jn_ac_type,'')}}
										</select>
									</td>
									<td>
										<?php if($data->jn_drb == 0 || $data->jn_drb == ""){
											$drb_select = 'readonly="readonly"';
										}else{
											$drb_select = '';
										}?>
										<input <?php echo $drb_select; ?> type="text" class="form-control enter_debit enter_debit<?php echo $key; ?>" value="{{$data->jn_drb}}" onkeyup="EnterDebit(this,<?php echo $key; ?>)" name="debit[]" placeholder="{{trans('template.amount')}}">
									</td>
									<td>
										<?php if($data->jn_crb == 0 || $data->jn_crb == ""){
											$crb_select = 'readonly="readonly"';
										}else{
											$crb_select = '';
										}?>
										<input <?php echo $crb_select; ?> type="text" class="form-control enter_credit enter_credit<?php echo $key; ?>" value="{{$data->jn_crb}}" onkeyup="EnterCredit(this,<?php echo $key; ?>)" name="credit[]" placeholder="{{trans('template.amount')}}">
									</td>
									<td>
										<textarea class="form-control" name="arr_des[]">{{$data->jn_des}}</textarea>
									</td>
									<td>
										<select name="class_data[]" class="form-control select2">
											<option value="0">--- {{trans('template.please_select')}} ---</option>
											{{\App\Helpers\Helpers::getClasses(0,0,$data->jn_class)}}
										</select>
									</td>
									<td>
										<select name="user[]" class="form-control select2" id="user" style="width: 100%;">
											<option value="0">--- {{trans('template.please_select')}} ---</option>
											{{\App\Helpers\Helpers::getUsers($data->user_id)}}
										</select>
									</td>									
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<div class="col-md-3"></div>
						<div class="col-md-9" style="padding-right: 0px !important;" >
							<table class="table table-striped table-bordered">
								<tr>
									<td style="line-height: 30px;">{{trans('template.total')}} {{trans('template.debit')}} : </td>
									<td>
										<input type="text" class="form-control" id="totalDebit" placeholder="$ 0.00" name="totalDebit" readonly>
									</td>
									<td style="line-height: 30px;">{{trans('template.total')}} {{trans('template.credit')}} : </td>
									<td>
										<input type="text" placeholder="$ 0.00" id="totalCredit" class="form-control" name="totalCredit" readonly>
									</td>
								</tr>
							</table>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-4 col-md-6">
								<button type="submit"  name="btnSave" value="save" class="btn green" id="Save"> <i class="fa fa-save"> </i> <strong> {{trans('template.save')}}</strong></button>
								<a href="{{url('accounting/journal_entry/index')}}"><button type="button" id="btnClose" class="btn btn-danger"> <i class="fa fa-times-circle"> </i> <strong> {{trans('template.cancel')}}</strong></button> </a>
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
	table_journal_entry = $('#tablejournal_entry').DataTable({
		"filter":   false,
		"paging":   false,
	    "ordering": false,
	    "info":     false
	});	
	CalculateDataTable();
});
var counter = $('#tablejournal_entry tr').length-1;
$('.AddNew').click(function(){		
	table_journal_entry.row.add( [
		'<a id="row_'+counter+'" class="btn btn-circle btn-icon-only btn-danger" onclick="deleteRow(this.id)" ><i class="fa fa-times"></i> </a>',
		'<select name="arr_chart_account[]" class="form-control select2 chart_account_name">'+
			'<option value="0">--- {{trans("template.please_select")}} ---</option>'+
			'{{\App\Helpers\Helpers::getAllChart(0,0,"",'')}}'+
		'</select>',
		'<input type="text" class="form-control enter_debit enter_debit'+counter+'" onkeyup="EnterDebit(this,'+counter+')" name="debit[]" placeholder="{{trans("template.amount")}}" >',
		'<input type="text" class="form-control enter_credit enter_credit'+counter+'" onkeyup="EnterCredit(this,'+counter+')" name="credit[]" placeholder="{{trans("template.amount")}}" >',
		'<textarea class="form-control" name="arr_des[]"></textarea>',
		'<select name="class_data[]" class="form-control select2">'+
			'<option value="0">--- {{trans("template.please_select")}} ---</option>'+
			'{{\App\Helpers\Helpers::getClasses(0,0,"")}}'+
		'</select>',
		'<select name="user[]" class="form-control select2">'+
			'<option value="0">--- {{trans("template.please_select")}} ---</option>'+
			'{{\App\Helpers\Helpers::getUsers()}}'+
		'</select>',
		] ).draw();
	counter++;
	$('.select2').select2();
});
function deleteRow(id){
	table_journal_entry.row($('#'+id).parents('tr')).remove().draw( false );
	CalculateDataTable();
}
function EnterCredit(field,ids){
	var val=$(field).val();
	if(val!='' && val!=null){
		var re = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)$/g;
		var re1 = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)/g; 
		if (re.test(val)) {
			var datacre = $('.enter_credit'+ids).val();
			if(datacre=="" || datacre==null){
				$('.enter_debit'+ids).removeAttr('readonly');
				$(field).css("border", "1px solid #ccc");
			}else{
				$('.enter_debit'+ids).attr('readonly','readonly');
			}
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
		$('.enter_debit'+ids).removeAttr('readonly');
	}
}
function EnterDebit(field,ids){
	var val=$(field).val();
	if(val!='' && val!=null){
		var re = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)$/g;
		var re1 = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)/g; 
		if (re.test(val)) {			
			var datacre = $('.enter_debit'+ids).val();
			if(datacre=="" || datacre==null){
				$('.enter_credit'+ids).removeAttr('readonly');
				$(field).css("border", "1px solid #ccc");
			}else{
				$('.enter_credit'+ids).attr('readonly','readonly');
			}			
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
		$('.enter_credit'+ids).removeAttr('readonly');
	}
}
$('.value_class').on('change',function(){
	var id = $(this).val();
	if(id == -1){
		$('#ModalClasses').modal('show');
	}	
});
function CalculateDataTable(){
	var amount_debit = 0;
	var amount_credit = 0;
	$('#tablejournal_entry tbody tr').each(function() {
		var debit=$(this).children().find('.enter_debit').val();
		if(debit=='' || debit==null || typeof(debit)==typeof(undefind)){
			debit=0;
		}		
		var credit=$(this).children().find('.enter_credit').val();
		if(credit=='' || credit==null || typeof(credit)==typeof(undefind)){
			credit=0;
		}
		amount_debit=amount_debit+(parseFloat(debit));		
		amount_credit=amount_credit+(parseFloat(credit));		
    });
    $('#totalDebit').val('0.00');
	$('#totalDebit').val(amount_debit);
	$('#totalCredit').val('0.00');
	$('#totalCredit').val(amount_credit);	
	if(amount_debit > amount_credit){
		$('#AmountPayment').html('$ 0.00');
		$('#AmountPayment').html(formatCurrency(amount_debit));
	}else{
		$('#AmountPayment').html('$ 0.00');
		$('#AmountPayment').html(formatCurrency(amount_credit));
	}
	//GrandTotal();
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
$('#Save').click(function(){
	if(onSubmit()){
	}else{
		return isValid  = false;
	}
});
function onSubmit(){
	var referent_no=  $('#referent_no').val();
	var journal_entry_date = $('#journal_entry_date').val();
	var user_id = $('#user_id').val();
	var chart_account = $('#chart_account').val();
	var chart_account_name = $('.chart_account_name').val();
	var enter_price  = $('.enter_price ').val();
	if(referent_no=="" || journal_entry_date=="" || user_id==0 || chart_account==0 || chart_account_name==0 || enter_price =="" || chart_account==0 || chart_account_name==0 || enter_price =="" ){
		if(referent_no !=""){
			$('#referent_no').css("border", "1px solid #ccc");
		}else{
			$('#referent_no').css("border", "1px solid red");
		}
		if(journal_entry_date !=""){
			$('#journal_entry_date').css("border", "1px solid #ccc");
		}else{
			$('#journal_entry_date').css("border", "1px solid red");
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
		$(".chart_account_name").each(function () {
			if ($(this).val()==0 || $(this).val()==null) {
				$(this).next().find('.select2-selection').css("border", "1px solid red");
			} else {
				$(this).next().find('.select2-selection').css("border", "1px solid #ccc");
			}
		});
		return isValid = false;
	}else{
		var amount_credit = $('#totalDebit').val();
		var amount_debit = $('#totalCredit').val();
		if(amount_credit == amount_debit){
			return isValid = true;
		}else{
			alert('Please check Debit and Credit.');
			return isValid = false;
		}
	}
}
</script>
@endsection()

