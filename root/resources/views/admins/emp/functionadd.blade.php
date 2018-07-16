@extends('layouts.app')
<script src="http://code.jquery.com/jquery-2.1.1.js"></script>
<script>
/*
function addMore() {
	$("<div>").load("{{ URL('/addmorerow.php') }}", function() {
			$("#morestatus").append($(this).html());
	});	
} 
function addMore() {
	$("<div>").load("{{ URL('/assets/config/addmorerow.php') }}", function() {
			$("#morestatus").append($(this).html());
	});	
}
function deleteRow() {
	$('tr.status-item').each(function(index, item){
		jQuery(':checkbox', this).each(function () {
            if ($(this).is(':checked')) {
				$(item).remove();
            }
        });
	});
}*/
</script>
@section('content')
 <div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="{{url('/')}}">{{ trans('template.dashboard') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<a href="{{ url('/admins/staff/index') }}">{{ trans('template.employee') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>{{ trans('template.add_new') }} {{ trans('template.function') }}</span>
		</li>
	</ul>
</div>
<br/>
<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-pencil"></i> <strong>{{ trans('template.function') }}</strong> </div>
                <div class="tools">
                <a href="{{ url('/admins/staff/emplist') }}" style="color:#fff;"> <i class="fa fa-list"> </i> <strong>{{ trans('template.list') }}</strong></a>
                    <a href="" class="collapse"> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    <a href="" class="reload"> </a>
                    <a href="" class="remove"> </a>
                </div>
            </div>
            <!--
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-user font-green"></i>
					<span class="caption-subject font-green sbold uppercase"><strong>{{ trans('template.employee') }}</strong></span>
				</div>
			</div>-->
			<div class="portlet-body">
				<form class="form-horizontal" role="form" method="POST" action="{{ url('admins/staff/stfunctionSave') }}" enctype="multipart/form-data">
					{{ csrf_field() }}
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
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group{{ $errors->has('staffpic') ? ' has-error' : '' }}">
									<label for="staffpic" class="col-md-4 control-label"><strong></strong>
										<span class="required">  </span>
									</label><!--
									<div class="col-md-6">
										<input type="file" name="staffpic">
									</div>-->
									
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <?php $photo = $edit->staffphoto; if(!empty($photo)){?>
                                            <img src="{{URL('assets/employeephoto')}}<?php echo '/'.$photo;?>" alt="" />
                                        <?php }else{?>
                                        	<img src="{{URL('assets/pages/img/noimage.png')}}" alt="" />
                                        <?php }?>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div><!--
                                        <div>
                                            <span class="btn default btn-file">
                                                <span class="fileinput-new"> Select image </span>
                                                <span class="fileinput-exists"> Change </span>
                                                <input type="file" name="staffpic"> </span>
                                            <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            	<div class="form-group">
									<label for="nameen" class="col-md-4 control-label"><strong></strong>
										<span class="required"> </span>
									</label>
									<div class="col-md-8">
										
									</div>
								</div>
                            	<div class="form-group{{ $errors->has('idcard') ? ' has-error' : '' }}">
									<label for="idcard" class="col-md-4 control-label"><strong>{{ trans('template.idcard') }}</strong>
										<span class="required"> * </span>
									</label>
									<div class="col-md-8">
										<input id="brand" type="hidden" class="form-control" name="brand" value="1" >
										<input id="id" type="hidden" class="form-control" name="id" value="{{$edit->id}}" >
										<input id="idcard" type="text" class="form-control" name="idcard" value="{{$edit->idnumber}}" readonly="">
										@if ($errors->has('idcard'))
											<span class="help-block">
												<strong>{{ $errors->first('idcard') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group{{ $errors->has('namekh') ? ' has-error' : '' }}">
									<label for="namekh" class="col-md-4 control-label"><strong>{{ trans('template.namekh') }}</strong>
										<span class="">  </span>
									</label>
									<div class="col-md-8">
										<input id="namekh" type="text" class="form-control" name="namekh" value="{{$edit->fullnamekh}}" readonly="">
										@if ($errors->has('namekh'))
											<span class="help-block">
												<strong>{{ $errors->first('namekh') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group{{ $errors->has('nameen') ? ' has-error' : '' }}">
									<label for="nameen" class="col-md-4 control-label"><strong>{{ trans('template.nameen') }}</strong>
										<span class="required"> * </span>
									</label>
									<div class="col-md-8">
										<input id="nameen" type="text" class="form-control" name="nameen" value="{{$edit->fullnameen}}" readonly="">
										@if ($errors->has('nameen'))
											<span class="help-block">
												<strong>{{ $errors->first('nameen') }}</strong>
											</span>
										@endif
									</div>
								</div>
                            </div>
						</div>
						<div class="row">
						<hr>
							<div class="col-md-6">
                                <div class="form-group{{ $errors->has('dept') ? ' has-error' : '' }}">
									<label for="dept" class="col-md-4 control-label"><strong>{{ trans('template.department') }}</strong>
										<span class="required"> </span>
									</label>
									<div class="col-md-8">
										<select name="dept" id="dept" class="form-control" required>
		                                    <option value="">- Select Department -</option>
		                                    <?php 
		                                    foreach($dept as $dval){?>
		                                    	<option value="<?php echo $dval->id;?>"><?php echo $dval->dept;?></option>
		                                    <?php
		                                    }
		                                    ?>
	                                    </select>
										@if ($errors->has('dept'))
											<span class="help-block">
												<strong>{{ $errors->first('dept') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group{{ $errors->has('func') ? ' has-error' : '' }}">
									<label for="func" class="col-md-4 control-label"><strong>{{ trans('template.function') }}</strong>
										<span class="required"> </span>
									</label>
									<div class="col-md-8">
										<select name="func" id="func" class="form-control" required>
											<option value="">- Select Function -</option>
		                                    <?php 
		                                    foreach($func as $fval){?>
		                                    	<option value="<?php echo $fval->id;?>"><?php echo $fval->functitle;?></option>
		                                    <?php
		                                    }
		                                    ?>
	                                    </select>
										@if ($errors->has('func'))
											<span class="help-block">
												<strong>{{ $errors->first('func') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
									<label for="status" class="col-md-4 control-label"><strong>{{ trans('template.status') }}</strong>
										<span class="required"> * </span>
									</label>
									<div class="col-md-8">
										<select name="status" id="status" class="form-control" required>
											<option value="1">{{trans("template.active")}}</option>
											<option value="0">{{trans("template.disable")}}</option>
	                                    </select>
										@if ($errors->has('status'))
											<span class="help-block">
												<strong>{{ $errors->first('status') }}</strong>
											</span>
										@endif
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group{{ $errors->has('startdate') ? ' has-error' : '' }}">
									<label for="startdate" class="control-label col-md-4"><strong>{{trans('template.startingdate')}}</strong>
										<span class="required">  </span>
									</label>			                    
									<div class="col-md-8">
										<div class="input-icon right">
											<input class="form-control datepicker" type="text" name="startdate" id="startdate" placeholder="{{trans('template.date')}}: dd-mm-yyyy" required>
										</div>
										@if($errors->has('startdate'))
		                                        <span style="color:red">{!!$errors->first('startdate')!!} </span>
										@endif	
									</div>
								</div>
								
								<div class="form-group{{ $errors->has('stopdate') ? ' has-error' : '' }}">
									<label for="stopdate" class="control-label col-md-4"><strong>{{trans('template.expireddate')}}</strong>
										<span class="required"> </span>
									</label>			                    
									<div class="col-md-8">
										<div class="input-icon right">
											<input class="form-control datepicker" type="text" name="stopdate" id="stopdate" placeholder="{{trans('template.date')}}: dd-mm-yyyy" >
										</div>
										@if($errors->has('stopdate'))
		                                        <span style="color:red">{!!$errors->first('stopdate')!!} </span>
										@endif	
									</div>
								</div><!--
								<div class="form-group{{ $errors->has('reffile') ? ' has-error' : '' }}">
									<label for="reffile" class="col-md-4 control-label"><strong>{{ trans('template.reference') }} {{ trans('template.file') }}</strong>
										<span class="required"> </span>
									</label>
									<div class="col-md-8">
										<input id="reffile" type="file" class="form-control" name="reffile[]" value="">
										@if ($errors->has('reffile'))
											<span class="help-block">
												<strong>{{ $errors->first('reffile') }}</strong>
											</span>
										@endif
									</div>
								</div>-->
							</div>
						</div>
						<div class="row">
                            <div class="col-md-12">
                            	<div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
									<label for="detail" class="col-md-4"><strong>{{ trans('template.description') }}</strong>
										<span class="required">  </span>
									</label>
									<div class="col-md-12">
										<textarea id="detail" class="form-control" name="detail" cols="10" rows="5"></textarea>
										
										@if ($errors->has('detail'))
											<span class="help-block">
												<strong>{{ $errors->first('detail') }}</strong>
											</span>
										@endif
									</div>
								</div>
                            </div>
                        </div>
					</div>
					
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-4 col-md-8">
								<button type="submit" name="save" value="s" class="btn btn-primary"> <i class="fa fa-save"> </i> <strong>{{ trans('template.save') }}</strong></button>
								<a href="{{ url('/admins/staff/emplist') }}" class="btn btn-success btn-outline"> <i class="fa fa-list"> </i> <strong>{{ trans('template.list') }}</strong></a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">

</script>
@endsection
