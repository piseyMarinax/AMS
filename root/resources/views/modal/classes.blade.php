<div id="ModalClasses" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="padding: 10px 20px; background:#2a4469; color: #FFF;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{trans('template.class')}}</h4>
      </div>
      <div class="modal-body">
      		<form class="form-horizontal form_add_class" method="POST" action="" id="form_validation">
				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
				<div class="form-body">
					<div class="alert alert-danger display-hide">
						<button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
					<div class="alert alert-success display-hide">
						<button class="close" data-close="alert"></button> Your form validation is successful! </div>
						<div style="border: 1px solid #b7b7b7; background: rgba(173, 203, 206, 0.28);" class="col-md-12">
							<div class="form-group{{ $errors->has('class_name') ? ' has-error' : '' }}  margin-top-20">
								<label class="control-label col-md-3">{{trans('template.name')}}
									<span class="required"> * </span>
								</label>			                    
								<div class="col-md-9">
									<div class="input-icon right">
										<i class="fa"></i>
										<input type="text" value="{{ old('class_name') }}" class="form-control" name="class_name" id="class_name" placeholder="{{trans('template.name')}}" /> </div>
									@if($errors->has('class_name'))
	                                        <span style="color:red">{!!$errors->first('class_name')!!} </span>
									@endif	
								</div>
							</div>
							<div class="form-group{{ $errors->has('class_name') ? ' has-error' : '' }}  margin-top-20">
								<label class="control-label col-md-3">{{trans('template.parent')}}
								</label>			                    
								<div class="col-md-9">
									<div class="input-icon right">
										<i class="fa"></i>
										<select name="class_type" class="form-control select2" style="width: 100%;">
											<option value="0">--- {{trans('template.please_select')}} ---</option>
											{{\App\Helpers\Helpers::getClasses(0,0,'')}}
										</select>
									@if($errors->has('class_type'))
	                                        <span style="color:red">{!!$errors->first('class_type')!!} </span>
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
			url:'{{url("/accounting/class-data")}}',
			data: datafrm,
			dataType: 'json',
			success: function(data){				
				if(data.row==0){
					alert(data.validation);
				}else{
					alert(data.validation);
					var ids = $("<option/>", {value: data.row.id, text: data.row.name});
					$('#AddClass').append(ids);			
					$('#AddClass option[value="' + data.row.id + '"]').prop('selected',true);
					$('#AddClass').trigger('change');
					$('#ModalClasses').modal('hide');
				}
				
			},
			error: function(data){
				
			}
		});
	}
</script>
