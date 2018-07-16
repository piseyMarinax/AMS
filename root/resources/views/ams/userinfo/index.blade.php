@extends('layouts.apptop3')

@section('content')
<div class="container">
	<ul class="page-breadcrumb breadcrumb">
		<li><i class="fa fa-circle"></i>
			<a href="{{url('/')}}" style="font-family: Kh-Battambang;">{{ trans('template.dashboard') }}</a>
			<span class="caption-subject font-blue-sharp uppercase bold" style="font-family: Kh-Battambang;"><i class="fa fa-circle"></i>  {{ trans('template.user_list') }}</span>
		</li>
		
	</ul>
	<div class="page-content-inner">
		<div class="row">
			<div class="col-md-12">
				<div class="portlet light bordered">
					<div class="portlet-title">
						<div class="caption font-green">
							<i class="fa fa-table font-green"></i>
							<span class="caption-subject bold uppercase">{{ trans('template.user_info') }}</span>
						</div>
						<div class="actions">
							<a title="{{ trans('template.add_new') }}" class="btn btn-circle btn-icon-only btn-default" href="{{ url('/user/add') }}">
								<i class="fa fa-plus"></i>
							</a>
						</div>
					</div>
					
					<div class="portlet-body">
						<?php if(Session::has('success')):?>
							<div class="alert alert-success display-show">
								<button class="close" data-close="alert"></button><strong>{{trans('template.success')}}!</strong> {{Session::get('success')}} 
							</div>
						<?php elseif(Session::has('fail')):?>
							<div class="alert alert-danger display-show">
								<button class="close" data-close="alert"></button><strong>{{trans('template.fail')}}!</strong> {{Session::get('fail')}} 
							</div>
						<?php endif; ?>
						<!--
						<table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="users-table">
							<thead>
								<tr class="bg-primary">
									<th class="text-center all">{{ trans('template.full_name') }}</th>
									<th class="text-center ">{{ trans('template.gender') }}</th>
									<th class="text-center ">{{ trans('template.email') }}</th>
									<th class="text-center ">{{ trans('template.phone') }}</th>
									<th class="text-center all">{{ trans('template.status') }}</th>
									<th class="text-center none">{{ trans('template.user_create') }}</th>
									<th class="text-center none">{{ trans('template.date_create') }}</th>
									<th class="text-center none">{{ trans('template.user_update') }}</th>
									<th class="text-center none">{{ trans('template.date_update') }}</th>
									<th class="text-center all">{{ trans('template.action') }}</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table> -->

						<table class="table table-striped table-bordered table-hover" width="100%" id="tableEmp">
                            <thead>
                                <tr class="bg-primary" style="font-family: Hanuman;">
                                    
                                    <th>No.</th>
                                    <th>{{ trans('template.full_name') }}</th>
                                    <th>{{ trans('template.gender') }}</th>
                                    <th>{{ trans('template.email') }}</th>
                                    <th>{{ trans('template.phone') }}</th>
                                    <th>{{ trans('template.status') }}</th> 
                                    <th>{{ trans('template.action') }}</th>                        
                                    
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
@endsection()
@section('javascript')
<script type="text/javascript">
function converQuot(value){
    return value.replace(/&quot;/g,'\"');
} 
$.fn.dataTable.ext.errMode = 'throw';
/*
	$('#users-table').DataTable({
		"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
		processing: true,
		serverSide: true,
		ajax: '{{url("user/jsonUsers")}}',
		columns: [
			{data: 'name'},
			{data: 'gender'},
			{data: 'email'},
			{data: 'phone'},
			{data: 'status'},
			{data: 'create_by'},
			{data: 'created_at'},
			{data: 'update_by'},
			{data: 'updated_at'},
			{data: 'action', orderable: false, searchable: false},
		],'fnCreatedRow':function(nRow,aData,iDataIndex){
			var str="";
			if(aData['status'] == 0){
				str ='<button class="btn btn-primary btn-xs">{{trans("template.active")}}</button>';
			}else{
				str ='<button class="btn btn-danger btn-xs">{{trans("template.disable")}}</button>';
			}
			$('td:eq(4)',nRow).html(str).addClass("text-center");
		}
	}); */

	
	$('#tableEmp').DataTable({
    "lengthMenu": [[25, 10, 50, 100, -1], [25, 10, 50, 100, "All"]],
    processing: true,
    serverSide: true,
    paging: true,
    ajax: '{{url("/backend/user/jsonUserslist")}}',
    columns: [
        {data: 'rownum'},
        {data:'name'},
        {data:'gender'},
        {data:'email'},
        {data:'phone'},
        {data:'status'},
        {data:'action'},
    ],'fnCreatedRow':function(nRow,aData,iDataIndex){
        var satatus ="";
        if(aData['status']== 1){
            satatus = '<button class="btn blue btn-xs dropdown-toggle">{{trans("template.active")}}</button>';
        }else{
            satatus = '<button class="btn btn-danger btn-xs dropdown-toggle">{{trans("template.disable")}}</button>';
        }
        $('td:eq(5)',nRow).html(satatus);
    }
});

	function onDelete(id){
		var _token = $("input[name=_token]").val();
		App.doDelete("{{ trans('template.delete').' '.trans('template.user') }}","{{trans('template.message_delete').' '.trans('template.user').' ?'}}",'/user/delete',id,'post',_token);
	}
</script>
@endsection()