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
			<span>{{ trans('template.add_new') }}</span>
		</li>
	</ul>
</div>
<br/>
<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i> <strong>{{ trans('template.employee') }}</strong> </div>
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
				<form class="form-horizontal" role="form" method="POST" action="{{ url('admins/staff/insert') }}" enctype="multipart/form-data">
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
								
								<div class="form-group{{ $errors->has('idcard') ? ' has-error' : '' }}">
									<label for="idcard" class="col-md-4 control-label"><strong>{{ trans('template.idnumber') }}</strong>
										<span class="required"> * </span>
									</label>
									<div class="col-md-8">
										<input id="userid" type="hidden" class="form-control" name="userid" value="{{ Auth::user()->id }}" >
										<input id="brand" type="hidden" class="form-control" name="brand" value="1" >
										<input id="stafftype" type="hidden" class="form-control" name="stafftype" value="1" >
										<input id="idcard" type="text" class="form-control" name="idcard" value="{{ old('idcard') }}" autofocus>
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
										<input id="namekh" type="text" class="form-control" name="namekh" value="{{ old('namekh') }}">
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
										<input id="nameen" type="text" class="form-control" name="nameen" value="{{ old('nameen') }}">
										@if ($errors->has('nameen'))
											<span class="help-block">
												<strong>{{ $errors->first('nameen') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group{{ $errors->has('gen') ? ' has-error' : '' }}">
									<label for="gen" class="col-md-4 control-label"><strong>{{ trans('template.gender') }}</strong>
										<span class="required"> </span>
									</label>
									<?php 
										$gen=array(
											'M' => trans("template.male"),
											'F' => trans("template.female"),
										);
										$gen=array_merge($gen);
									?>
									<div class="col-md-8">
										{{ Form::select('gen', $gen, old('gen'), ['id' => 'gen','class'=>'form-control']) }}
										@if ($errors->has('gen'))
											<span class="help-block">
												<strong>{{ $errors->first('gen') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group{{ $errors->has('sdob') ? ' has-error' : '' }}">
									<label for="sdob" class="control-label col-md-4"><strong>{{trans('template.dob')}}</strong>
										<span class="required"> * </span>
									</label>			                    
									<div class="col-md-8">
										<div class="input-icon right">
											<input class="form-control datepicker" type="text" name="sdob" id="sdob" placeholder="{{trans('template.date')}}:  dd-mm-yyyy" >
										</div>
										@if($errors->has('sdob'))
		                                        <span style="color:red">{!!$errors->first('sdob')!!} </span>
										@endif	
									</div>
								</div>
								<div class="form-group{{ $errors->has('sregisterdate') ? ' has-error' : '' }}">
									<label for="sregisterdate" class="control-label col-md-4"><strong>{{trans('template.dateregister')}}</strong>
										<span class="required">  </span>
									</label>			                    
									<div class="col-md-8">
										<div class="input-icon right">
											<input class="form-control datepicker" type="text" name="sregisterdate" id="sregisterdate" placeholder="{{trans('template.date')}}:  dd-mm-yyyy" >
										</div>
										@if($errors->has('sregisterdate'))
		                                        <span style="color:red">{!!$errors->first('sregisterdate')!!} </span>
										@endif	
									</div>
								</div>
								
								<div class="form-group{{ $errors->has('sresigndate') ? ' has-error' : '' }}">
									<label for="sresigndate" class="control-label col-md-4"><strong>{{trans('template.dateresign')}}</strong>
										<span class="required"> </span>
									</label>			                    
									<div class="col-md-8">
										<div class="input-icon right">
											<input class="form-control datepicker" type="text" name="sresigndate" id="sresigndate" placeholder="{{trans('template.date')}} - day-Month-Year" >
										</div>
										@if($errors->has('sresigndate'))
		                                        <span style="color:red">{!!$errors->first('sresigndate')!!} </span>
										@endif	
									</div>
								</div>
								<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
									<label for="phone" class="col-md-4 control-label"><strong>{{ trans('template.phone') }}</strong>
										<span class="required"> </span>
									</label>
									<div class="col-md-8">
										<input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">
										@if ($errors->has('phone'))
											<span class="help-block">
												<strong>{{ $errors->first('phone') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
									<label for="email" class="col-md-4 control-label"><strong>{{ trans('template.email') }}</strong>
										
									</label>
									<div class="col-md-8">
										<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
										@if ($errors->has('email'))
											<span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
										@endif
									</div>
								</div>
							</div>
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
                                            <img src="{{URL('assets/pages/img/noimage.png')}}" alt="" /> </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                        <div>
                                            <span class="btn default btn-file">
                                                <span class="fileinput-new"> Select image </span>
                                                <span class="fileinput-exists"> Change </span>
                                                <input type="file" name="staffpic"> </span>
                                            <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                        </div>
                                    </div>
                                </div>

								
								<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
									<label for="status" class="col-md-4 control-label"><strong>{{ trans('template.status') }}</strong>
										<span class="required"> * </span>
									</label>
									<?php 
										$status=array(
											'1' => trans("template.active"),
											'0' => trans("template.disable"),
										);
										$status=array_merge($status);
									?>
									<div class="col-md-8">
										{{ Form::select('status', $status, old('status'), ['id' => 'status','class'=>'form-control']) }}
										@if ($errors->has('status'))
											<span class="help-block">
												<strong>{{ $errors->first('status') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group{{ $errors->has('stype') ? ' has-error' : '' }}">
									<label for="stype" class="col-md-4 control-label"><strong>{{ trans('template.type') }}</strong>
										<span class="required"> * </span>
									</label>
									<?php 
										$stype=array(
											'1' => trans("template.office"),
											'2' => trans("template.security"),
										);
										$stype=array_merge($stype);
									?>
									<div class="col-md-8">
										{{ Form::select('stype', $stype, old('stype'), ['id' => 'stype','class'=>'form-control']) }}
										@if ($errors->has('stype'))
											<span class="help-block">
												<strong>{{ $errors->first('stype') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
									<label for="address" class="col-md-4 control-label"><strong>{{ trans('template.address') }}</strong>
										<span class="required">  </span>
									</label>
									<div class="col-md-8">
										<textarea id="address" class="form-control" name="address" cols="5"></textarea>
										
										@if ($errors->has('address'))
											<span class="help-block">
												<strong>{{ $errors->first('address') }}</strong>
											</span>
										@endif
									</div>
								</div>
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
                        <!--
						<div class="row">
                            <div class="col-md-12">
                                 BEGIN SAMPLE TABLE PORTLET
                                <div class="portlet">
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
                                            <table class="table table-striped table-bordered table-advance table-hover">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">Status type</th>
                                                        <th>Status</th>
                                                        <th>Issued date </th>
                                                        <th>Expired Date</th>
                                                        <th>Attachment </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="morestatus">
                                                    <tr>
                                                        <td> <input type="checkbox" name="item_index[]" class="mt-checkbox mt-checkbox-outline"> </td>
                                                        <td>
                                                        	<select name="stStatus[]" class="form-control">
                                                        		
                                                        	</select>
														</td>
                                                        <td>
                                                        	<select name="statusst[]" class="form-control">
                                                        		<option value="">.: Status :.</option>
                                                        		<option value="1">Active</option><option value="0">Disable</option>
                                                        	</select></td>
                                                        <td> <input class="form-control datepicker" type="text" name="sissuedate[]" id="sissuedate" placeholder="{{trans('template.date')}}:  dd-mm-yyyy" > </td>
                                                        <td> <input class="form-control datepicker" type="text" name="sexpiredate[]"  placeholder="{{trans('template.date')}}:  dd-mm-yyyy" > </td>
                                                        <td> <input type="file" name="filerefer[]"> </td>
                                                    </tr>
                                                </tbody>
                                            </table><br/>
                                            <table>
                                            	<tr>
                                                        <td colspan="5"> <button class="btn btn-outline btn-circle btn-sm purple" type="button" name="add_item" onclick="addMore();"><i class="fa fa-plus-circle"></i></button>
                                                        <button class="btn btn-outline btn-circle dark btn-sm black" type="button" name="del_item" onclick="deleteRow();"><i class="fa fa-trash-o"></i></button> </td>
                                                    </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                 END SAMPLE TABLE PORTLET
                            </div>
                        </div>-->


						<div class="row display-hide">
							<div class="col-md-6">
								<div class="form-group{{ $errors->has('cus_cf3') ? ' has-error' : '' }}">
									<label for="cus_cf3" class="col-md-4 control-label"><strong>{{ trans('template.cus_cf3') }}</strong>
										<span class="required"> * </span>
									</label>
									<div class="col-md-8">
										<input id="cus_cf3" type="text" class="form-control" name="cus_cf3" value="{{ old('cus_cf3') }}">
										@if ($errors->has('cus_cf3'))
											<span class="help-block">
												<strong>{{ $errors->first('cus_cf3') }}</strong>
											</span>
										@endif
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group{{ $errors->has('cus_cf4') ? ' has-error' : '' }}">
									<label for="cus_cf4" class="col-md-4 control-label"><strong>{{ trans('template.cus_cf4') }}</strong>
										<span class="required"> * </span>
									</label>
									<div class="col-md-8">
										<input id="cus_cf4" type="text" class="form-control" name="cus_cf4" value="{{ old('cus_cf4') }}">
										@if ($errors->has('cus_cf4'))
											<span class="help-block">
												<strong>{{ $errors->first('cus_cf4') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group{{ $errors->has('cus_cf5') ? ' has-error' : '' }}">
									<label for="cus_cf5" class="col-md-4 control-label"><strong>{{ trans('template.cus_cf5') }}</strong>
										<span class="required"> * </span>
									</label>
									<div class="col-md-8">
										<input id="cus_cf5" type="text" class="form-control" name="cus_cf5" value="{{ old('cus_cf5') }}">
										@if ($errors->has('cus_cf5'))
											<span class="help-block">
												<strong>{{ $errors->first('cus_cf5') }}</strong>
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
								<button type="submit" name="save_new" value="sn" class="btn btn-info"><strong>{{ trans('template.save_new') }}</strong></button>
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
