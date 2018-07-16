<div id="ModalTax" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="padding: 10px 20px; background:#2a4469; color: #FFF;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{trans('template.tax')}}</h4>
      </div>
      <div class="modal-body">
      		<form class="form-horizontal form_add_class" method="POST" action="" id="form_validation">
				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
				<input type="hidden" name="id_update" value="0" id="id_update" />
				<div class="form-body">
					<div class="alert alert-danger display-hide">
						<button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
					<div class="alert alert-success display-hide">
						<button class="close" data-close="alert"></button> Your form validation is successful! </div>
						<div style="border: 1px solid #b7b7b7; background: rgba(173, 203, 206, 0.28);" class="col-md-12">
							<div class="form-group{{ $errors->has('tax_name') ? ' has-error' : '' }}  margin-top-20">
								<label class="control-label col-md-3">{{trans('template.name')}}
									<span class="required"> * </span>
								</label>			                    
								<div class="col-md-9">
									<div class="input-icon right">
										<i class="fa"></i>
										<input type="text" value="{{ old('tax_name') }}" class="form-control" name="tax_name" id="tax_name" placeholder="{{trans('template.name')}}" /> 
									</div>
									@if($errors->has('tax_name'))
	                                        <span style="color:red">{!!$errors->first('tax_name')!!} </span>
									@endif	
								</div>
							</div>
							<div class="form-group{{ $errors->has('class_name') ? ' has-error' : '' }}  margin-top-20">
								<label class="control-label col-md-3">{{trans('template.amount')}}
								<span class="required"> * </span>
								</label>			                    
								<div class="col-md-9">
									<div class="input-icon right">
										<i class="fa"></i>
										<div class="input-icon right">
											<i class="fa"></i>
											<input type="text" value="{{ old('tax_value') }}" class="form-control" name="tax_value" id="tax_value" placeholder="{{trans('template.amount')}}" /> 
										</div>
									@if($errors->has('tax_value'))
	                                        <span style="color:red">{!!$errors->first('tax_value')!!} </span>
									@endif	
									</div>
								</div>
							</div>
							<div class="form-group{{ $errors->has('class_name') ? ' has-error' : '' }}  margin-top-20">
								<label class="control-label col-md-3">{{trans('template.description')}}
								</label>			                    
								<div class="col-md-9">
									<div class="input-icon right">
										<i class="fa"></i>
										<div class="input-icon right">
											<i class="fa"></i>
											<textarea class="form-control" name="tax_des" id="tax_des"></textarea>
										</div>
									@if($errors->has('tax_des'))
	                                        <span style="color:red">{!!$errors->first('tax_des')!!} </span>
									@endif	
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row" style="margin-top:10px;">
						<div class="col-md-offset-4 col-md-6">
							<button type="button" onclick ="SaveClassData()"  name="btnSave" value="save" class="btn green"> <i class="fa fa-save"> </i> <strong> {{trans('template.save')}}</strong></button>
							<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-times-circle"> </i> <strong> {{trans('template.cancel')}}</strong></button>
						</div>
					</div>
				</div>				
			</form>			
      	</div>
    </div>
  </div>
</div>
<script type="text/javascript">
	function SaveClassData(){
		datafrm = $(".form_add_class").serialize();
		$.ajax({
			type:"POST",
			url:'{{url("/setting/tax/insert")}}',
			data: datafrm,
			dataType: 'json',
			success: function(data){				
				if(data.row==0){
					alert(data.validation);
				}else{
					alert(data.validation);
					window.location.reload();
				}
				
			},
			error: function(data){
				
			}
		});
	}
</script>
