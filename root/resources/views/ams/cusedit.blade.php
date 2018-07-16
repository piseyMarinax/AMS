@extends('layouts.apptop3')

@section('content')

<!-- BEGIN CONTAINER -->
<div class="container">
    <!-- BEGIN PAGE BREADCRUMBS -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <i class="fa fa-circle"></i> <a href="{{ url('/') }}" style="font-family: Hanuman;"> {{ trans('template.dashboard') }}</a>

            <span class="caption-subject font-blue-sharp uppercase bold"><a href="{{ url('backend/customers/list') }}" style="font-family: Hanuman;"> {{ trans('template.customer') }}</a></span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMBS -->
    <!-- BEGIN PAGE CONTENT INNER -->
    <div class="page-content-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box blue">
                    <div class="portlet-title" style="font-family: Hanuman;">
                        <div class="caption"> 
                             <strong><i class="fa fa-refresh"> </i>  {{ trans('template.update') }}</strong> </div>
                        <div class="tools">
                        <a href="{{ url('/backend/customers/list') }}" style="color:#fff;"> <i class="fa fa-list"> </i> <strong>{{ trans('template.list') }}</strong></a>
                            <a href="" class="collapse"> </a>
                            <a href="" class="reload"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('backend/customers/update') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-body">                                
                                <div class="row">
                                    <div class="col-md-6">
                                        
                                        <div class="form-group{{ $errors->has('idcard') ? ' has-error' : '' }}">
                                            <label for="idcard" class="col-md-4 control-label" style="font-family: Hanuman;"><strong>{{ trans('template.customer_id') }} AMS-</strong>
                                                <span class="required">  </span>
                                            </label>                                                         
                                            <div class="col-md-8">
                                                <input id="userid" type="hidden" class="form-control" name="userid" value="{{ Auth::user()->id }}" >
                                                <input id="id" type="hidden" class="form-control" name="id" value="{{$pro->id}}" >
                                                <input id="cusid" type="text" class="form-control" name="cusid" value="<?php echo '000'?>{{$pro->cust_id}}" >
                                                @if ($errors->has('cusid'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('cusid') }}</strong>
                                                    </span>
                                                @endif  
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('nameen') ? ' has-error' : '' }}">
                                            <label for="nameen" class="col-md-4 control-label" style="font-family: Hanuman;"><strong>{{ trans('template.customer_name') }}</strong>
                                                <span class="required"> </span>
                                            </label>
                                            <div class="col-md-8">
                                                <input id="nameen" type="text" class="form-control" name="nameen" value="{{$pro->cust_name}}" >
                                                @if ($errors->has('nameen'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('nameen') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                            <label for="phone" class="col-md-4 control-label" style="font-family: Hanuman;"><strong>{{ trans('template.phone') }}</strong>
                                                <span class="required"> </span>
                                            </label>
                                            <div class="col-md-8">
                                                <input id="phone" type="text" class="form-control" name="phone" value="{{$pro->cust_phone}}" >
                                                @if ($errors->has('phone'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('phone') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-4 control-label" style="font-family: Hanuman;"><strong>{{ trans('template.email') }}</strong>
                                                
                                            </label>
                                            <div class="col-md-8">
                                                <input id="email" type="email" class="form-control" name="email" value="{{$pro->cust_email}}" >
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('namekh') ? ' has-error' : '' }}">
                                            <label for="namekh" class="col-md-4 control-label" style="font-family: Hanuman;"><strong> {{ trans('template.company') }} </strong>
                                                <span class="">  </span>
                                            </label>
                                            <div class="col-md-8">
                                                <input id="namekh" type="text" class="form-control" name="namekh" value="{{$pro->cust_comname}}" >
                                                @if ($errors->has('namekh'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('namekh') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <?php
                                        $v = 0;
                                        foreach($cprice as $val){
                                            $v++;
                                        }
                                        if($v > 0){
                                        foreach($cprice as $cval){
                                            if($pro->cust_id == $cval->cu_id){?>
                                        <div class="form-group{{ $errors->has('items') ? ' has-error' : '' }}">
                                            <label for="items" class="col-md-4 control-label" style="font-family: Hanuman;"><strong> {{ trans('template.unit') }} </strong>
                                                <span class="">  </span>
                                            </label>
                                            <div class="col-md-8">
                                                <input id="items" type="text" class="form-control" name="items" value="<?php echo $cval->items;?>" >
                                                @if ($errors->has('items'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('items') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('iprice') ? ' has-error' : '' }}">
                                            <label for="iprice" class="col-md-4 control-label" style="font-family: Hanuman;"><strong> {{ trans('template.price') }}/{{ trans('template.unit') }} ($)</strong>
                                                <span class="">  </span>
                                            </label>
                                            <div class="col-md-8">
                                                <input id="iprice" type="text" class="form-control" name="iprice" value="<?php echo $cval->item_price;?>">
                                                @if ($errors->has('iprice'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('iprice') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <?php   
                                            }
                                        }//end foreach
                                        }else{?>
                                        <div class="form-group{{ $errors->has('items') ? ' has-error' : '' }}">
                                            <label for="items" class="col-md-4 control-label" style="font-family: Hanuman;"><strong> {{ trans('template.unit') }} </strong>
                                                <span class="">  </span>
                                            </label>
                                            <div class="col-md-8">
                                                <input id="items" type="text" class="form-control" name="items" value="" >
                                                @if ($errors->has('items'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('items') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('iprice') ? ' has-error' : '' }}">
                                            <label for="iprice" class="col-md-4 control-label" style="font-family: Hanuman;"><strong> {{ trans('template.price') }}/{{ trans('template.unit') }} ($)</strong>
                                                <span class="">  </span>
                                            </label>
                                            <div class="col-md-8">
                                                <input id="iprice" type="text" class="form-control" name="iprice" value="{{ old('iprice') }}" >
                                                @if ($errors->has('iprice'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('iprice') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <?php
                                        }?>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('sdob') ? ' has-error' : '' }}">
                                            <label for="sdob" class="control-label col-md-4" style="font-family: Hanuman;"><strong>{{ trans('template.dateregister') }}</strong>
                                                <span class="required"> * </span>
                                            </label>  
                                            <?php
                                            $d = $pro->cust_regdate;
                                            ?>                              
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <input class="form-control" type="text" name="reg_date" id="reg_date" placeholder="{{trans('template.date')}}:  dd-mm-yyyy" value="<?php echo date('M d, Y', strtotime($d));?>" >
                                                </div>
                                                @if($errors->has('reg_date'))
                                                        <span style="color:red">{!!$errors->first('reg_date')!!} </span>
                                                @endif  
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('cus_t') ? ' has-error' : '' }}">
                                            <label for="cus_t" class="col-md-4 control-label" style="font-family: Hanuman;"><strong>{{ trans('template.service_type') }}</strong>
                                                <span class="required"> * </span>
                                            </label>
                                            
                                            <div class="col-md-8">
                                                <select name="cus_t" id="cus_t" class="form-control">
                                                    <?php $ct = $pro->cust_tid;?>
                                                    <option value="1" <?=$ct==1?'selected':''?>> Premium </option>
                                                    <option value="2" <?=$ct==2?'selected':''?>> VIP </option>
                                                    <option value="3" <?=$ct==3?'selected':''?>> Gold </option>
                                                    <option value=""> No Selected type </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                            <label for="status" class="col-md-4 control-label" style="font-family: Hanuman;"><strong>{{ trans('template.status') }}</strong>
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <select name="status" id="status" class="form-control" >
                                                    <?php $status = $pro->cust_status;?>
                                                <option value="1" <?=$status==1?'selected':''?>> Active </option>
                                                <option value="0" <?=$status==0?'selected':''?>> Disable </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                            <label for="address" class="col-md-4 control-label" style="font-family: Hanuman;"><strong>{{ trans('template.address') }}</strong>
                                                <span class="required">  </span>
                                            </label>
                                            <div class="col-md-8">
                                                <textarea id="address" class="form-control" name="address" cols="5">{{$pro->cust_addr}}</textarea>
                                                
                                                @if ($errors->has('address'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('address') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('reffile') ? ' has-error' : '' }}">
                                            <label for="reffile" class="col-md-4 control-label" style="font-family: Hanuman;"><strong>{{ trans('template.file') }}</strong>
                                                <span class="required"> </span>
                                            </label>
                                            <div class="col-md-8">
                                                <input id="reffile" type="file" class="form-control" name="reffile[]" multiple value="">
                                                @if ($errors->has('reffile'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('reffile') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <?php $cd = 0;
                                        foreach($doc as $dval){
                                            $cd++;?>
                                        <div class="form-group{{ $errors->has('reffile') ? ' has-error' : '' }}">
                                            <label for="file" class="col-md-4 control-label" style="font-family: Hanuman;"><strong></strong>
                                            </label>
                                            <label for="file" class="col-md-8" style="font-family: Hanuman; margin-top: 5px;"><strong><a href="{{url('public/media/')}}/<?php echo $dval->c_files;?>" title="<?php echo @$dval->c_files;?>" target="_blank">{{ trans('template.file') }} <?php echo @$cd;?></a><!--<a class="font-red" onclick="onDelete('<?php echo $dval->id;?>')">
                                <i class="font-red fa fa-trash"></i></a>--></strong>
                                            </label>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                                            <label for="detail" class="col-md-4" style="font-family: Hanuman;"><strong>{{ trans('template.description') }}</strong>
                                                <span class="required">  </span>
                                            </label>
                                            <div class="col-md-12">
                                                <textarea id="detail" class="form-control" name="detail" cols="10" rows="5">{{$pro->cust_noted}}</textarea>
                                                
                                                @if ($errors->has('detail'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('detail') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                    <div class="col-md-offset-4 col-md-8" style="font-family: KhmerOS;">
                                        <button type="submit" name="btnSave" value="save" class="btn btn-primary"> <i class="fa fa-save"> </i> <strong>{{ trans('template.save_change') }}</strong></button>
                                        <a href="{{ url('/backend/customers/list') }}" class="btn btn-success btn-outline"> <i class="fa fa-list"> </i> <strong>{{ trans('template.list') }}</strong></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT INNER -->
</div><!--END CONTAINER -->

@endsection
@section('javascript')
<script type="text/javascript">
function onDelete(id){
    var _token = $("input[name=_token]").val();
    App.doDelete("{{ trans('template.delete').' '.trans('template.file') }}","{{trans('template.message_delete').' '.trans('template.file').' ?'}}",'/backend/customers/filesdelete',id,'post',_token);
}
</script>
@endsection