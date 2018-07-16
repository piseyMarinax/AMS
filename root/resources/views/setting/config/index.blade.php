@extends('layouts.app')

@section('content')
<style>
legend.scheduler-border {
    font-size: 1.1em !important;
    font-weight: bold !important;
    text-align: left !important;
    width: auto;
    color: #fff;
    padding: 5px 15px;
    border: 1px solid #32c5d2 !important;
    margin: 0;
    background: #32c5d2;
}
</style>
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
			<span>{{ trans('template.config') }}</span>
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
					<span class="caption-subject bold uppercase">{{ trans('template.config') }}</span>
				</div>
			</div>
			
			<div class="portlet-body">
				@if(Session::has('message'))
					<div class="alert alert-success display-show">
						<button class="close" data-close="alert"></button> {!!Session::get('message')!!}
					</div>
				@endif
				 <form action="{{url('setting/config/insert')}}" method="post" id="form_holiday" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
					<div class="form-body">
						<div class="col-md-12">
							<div class="alert alert-danger display-hide">
								<button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
							<div class="alert alert-success display-hide">
								<button class="close" data-close="alert"></button> ​Your form validation is successful!
							</div>
							<fieldset class="scheduler-border m-heading-1 border-green m-bordered">
								<legend id="title-loan-1" class="scheduler-border">System Configuration</legend>
								<div class="form-group col-md-6">
									<label class="control-label col-md-4">Company Logo
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-8">
										<div class="input-icon right">
											<i class="fa"></i>
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
													<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
												<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
												<div>
													<span class="btn default btn-file">
														<span class="fileinput-new"> Select image </span>
														<span class="fileinput-exists"> Change </span>
														<input type="file" name="company_logo"> </span>
													<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
												</div>
											</div>
											<div style="clear:both;"></div>
										</div>
									</div>
								</div>
								<div class="form-group col-md-6">
									<label class="control-label col-md-4">Address
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-8">
										<div class="input-group">
											<input type="text" value="" id="Address" name="Address" class="form-control" placeholder="Address">
											<span id="PostAddress" class="input-group-addon" style="cursor: pointer;"><i class="fa fa-map-marker"></i></span>
									</div>
																</div>
								</div>
								<div class="form-group col-md-6">
									<label class="control-label col-md-4">Company Name
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-8">
										<div class="input-icon right">
											<i class="fa"></i>
											<input type="text" value="" class="form-control" placeholder="" autocomplete="off" name="company_name" id="company_name">
										</div>
									</div>
								</div>
								<div class="form-group col-md-6">
									<label class="control-label col-md-4">Company Phone
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-8">
										<div class="input-icon right">
											<i class="fa"></i>
											<input type="text" value="" class="form-control" placeholder="" autocomplete="off" name="company_phone" id="company_phone">
										</div>
									</div>
								</div>
								<div class="form-group col-md-6">
									<label class="control-label col-md-4">Company Website
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-8">
										<div class="input-icon right">
											<i class="fa"></i>
											<input type="text" value="" class="form-control" placeholder="" autocomplete="off" name="company_webiste" id="company_webiste">
										</div>
									</div>
								</div>
								<div class="form-group col-md-6">
									<label class="control-label col-md-4">Email
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-8">
										<div class="input-icon right">
											<i class="fa"></i>
											<input type="text" value="" class="form-control" placeholder="" autocomplete="off" name="email" id="Email">
										</div>
									</div>
								</div>
								<div class="form-group col-md-6">
									<label class="control-label col-md-4">Slogan
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-8">
										<div class="input-icon right">
											<i class="fa"></i>
											<input type="text" value="" class="form-control" placeholder="" autocomplete="off" name="slogan" id="slogan">
										</div>
									</div>
								</div>
							</fieldset>
							<fieldset class="scheduler-border m-heading-1 border-green m-bordered">
								<legend id="title-loan-1" class="scheduler-border">{{trans('template.accounting')}}</legend>
								<div class="form-group col-md-6">
									<label class="control-label col-md-4">{{ trans('template.beginning_cash_balance') }}
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-8">
										<div class="input-icon right">
											<select name="beginning_cash[]" class="form-control select2-multiple" multiple>
											{{\App\Helpers\Helpers::getAllChartConfig(0,0,'',1)}}
											</select>
										</div>
									</div>
								</div>
								<div class="form-group col-md-6">
									<label class="control-label col-md-4">{{ trans('template.ending_cash_balance') }}
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-8">
										<div class="input-group">
											<select name="ending_cash[]" class="form-control select2-multiple" multiple>
												{{\App\Helpers\Helpers::getAllChartConfig(0,0,'',1)}}
											</select>
										</div>
									</div>
								</div>
								<div class="form-group col-md-6">
									<label class="control-label col-md-4">{{ trans('template.cash_inflow') }}
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-8">
										<div class="input-icon right">
											<select name="cash_inflow[]" class="form-control select2-multiple" multiple>
												{{\App\Helpers\Helpers::getAllChartConfig(0,0,'')}}
											</select>
										</div>
									</div>
								</div>
								<div class="form-group col-md-6">
									<label class="control-label col-md-4">{{ trans('template.cash_outflow') }}
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-8">
										<div class="input-icon right">
										<select name="cash_outflow[]" class="form-control select2-multiple" multiple>
												{{\App\Helpers\Helpers::getChartAccountConfig()}}
											</select>
										</div>
									</div>
								</div>
								<div class="form-group col-md-6">
									<label class="control-label col-md-4">{{ trans('template.cash_supposed_to_be_received') }}
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-8">
										<div class="input-icon right">
											<select name="cash_tobeReceived[]" class="form-control select2-multiple" multiple>
												{{\App\Helpers\Helpers::getAllChartConfig(0,0,'',1)}}
											</select>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-10 col-md-2">
								<button type="submit" name="save" value="s" class="btn btn-primary"> <i class="fa fa-save"> </i> <strong>{{ trans('template.save') }}</strong></button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div style="clear:both;"></div>
		</div>
	</div>
</div>
@include('modal.classes')
@endsection()
@section('javascript')
<script type="text/javascript">	
	$(function(){
		$('#table-tax').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{{url("setting/class/list")}}',
			columns: [
				{data: 'id'},
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
				$('td:eq(1)',nRow).addClass("text-center");
				$('td:eq(2)',nRow).html(str).addClass("text-center");
			}
		});
	})

	function onDelete(id){
		var _token = $("input[name=_token]").val();
		App.doDelete("{{ trans('template.delete').' '.trans('template.class') }}","{{trans('template.message_delete').' '.trans('template.class').' ?'}}",'/setting/class/delete',id,'post',_token);
	}
	$('.addNewClass').click(function(){
		alert();
		$('#ModalClasses').modal('show');
		$('#tax_name').val('');
		$('#tax_value').val('');
		$('#tax_des').val('');
	});
	function FunctionUpdate(id){
		$.get('{{url("/setting/class/edit")}}/'+id,function(data){
			$('#ModalClasses').modal('show');
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