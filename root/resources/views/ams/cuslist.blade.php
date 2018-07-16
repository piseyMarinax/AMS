@extends('layouts.apptop3')

@section('content')

<!-- BEGIN CONTAINER -->
<div class="container">
    <!-- BEGIN PAGE BREADCRUMBS -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <i class="fa fa-circle"></i> <a href="{{ url('/') }}" style="font-family: Hanuman;"> {{ trans('template.dashboard') }}</a>

            <span class="caption-subject font-blue-sharp uppercase bold" style="font-family: Kh-Battambang;"><i class="fa fa-circle"></i> {{ trans('template.customer_list') }}</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMBS -->
    <!-- BEGIN PAGE CONTENT INNER -->
    <div class="page-content-inner">
        <div class="row">
            <div class="col-md-18">
                <div class="portlet light bordered">
                    <div class="portlet-body">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab"> 
                                        <i class="fa fa-table font-green"></i>
                                        <span class="caption-subject bold uppercase">{{ trans('template.customer') }}</span>
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
                                        <a title="{{ trans('template.add_new') }}" class="btn btn-circle btn-icon-only btn-default" href="{{ url('backend/customers/add') }}">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                    <div class="portlet-body">
                                        @if(Session::has('message'))
                                            <div class="alert alert-success display-show">
                                                <button class="close" data-close="alert"></button> {!!Session::get('message')!!}
                                            </div>
                                        @endif
                                        
                                        <table class="table table-striped table-bordered table-hover" width="100%" id="tableEmp">
                                            <thead>
                                                <tr class="bg-primary" style="font-family: Hanuman;">
                                                    
                                                    <th>No.</th>
                                                    <th>{{ trans('template.action') }}</th>
                                                    <th>{{ trans('template.customer_id') }}</th>
                                                    <th>{{ trans('template.company') }}</th>
                                                    <th>{{ trans('template.full_name') }}</th>
                                                    <th>{{ trans('template.service_type') }}</th>
                                                    <th>{{ trans('template.dateregister') }}</th>
                                                    <th>{{ trans('template.phone') }}</th>
                                                    <th>{{ trans('template.address') }}</th>
                                                    <th>{{ trans('template.status') }}</th>                         
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                            </tbody>
                                        </table>                                        
                                    </div>
                                </div>
                            </div>
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
function converQuot(value){
    return value.replace(/&quot;/g,'\"');
}   
//var template = Handlebars.compile($("#details-template").html());
$.fn.dataTable.ext.errMode = 'throw';
$('#table-absentType').DataTable();
$('#tableEmp').DataTable({
    "lengthMenu": [[25, 10, 50, 100, -1], [25, 10, 50, 100, "All"]],
    processing: true,
    serverSide: true,
    paging: true,
    ajax: '{{url("/backend/customers/getJsonCus")}}',
    columns: [
        {data: 'rownum'},
        {data:'action'},
        {data:'cust_id'},
        {data:'cust_comname'},
        {data:'cust_name'},
        {data:'ct_title'},
        {data:'cust_regdate'},
        {data:'cust_phone'},
        {data:'cust_addr'},
        {data:'cust_status'},
    ],'fnCreatedRow':function(nRow,aData,iDataIndex){
        var satatus ="";
        if(aData['cust_status']== 1){
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

    }
});
function onDelete(id){
    var _token = $("input[name=_token]").val();
    App.doDelete("{{ trans('template.delete').' '.trans('template.customer') }}","{{trans('template.message_delete').' '.trans('template.customer').' ?'}}",'/backend/customers/delete',id,'post',_token);
}
</script>
@endsection()