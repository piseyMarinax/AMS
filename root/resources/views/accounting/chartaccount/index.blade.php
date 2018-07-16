@extends('layouts.app')

@section('content')
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="{{url('/')}}">{{ trans('template.dashboard') }}</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>{{ trans('template.chart_account') }}</span>
		</li>
	</ul>
</div>
<br/>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">			
			<div class="portlet-body">
				@if(Session::has('message'))
					<div class="alert alert-success display-show">
						<button class="close" data-close="alert"></button> {!!Session::get('message')!!}
					</div>
				@endif
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		            <a id="group-accounting" class="dashboard-stat dashboard-stat-v2 blue" href="#">
		                <div class="visual">
		                    <i class="fa fa-list"></i>
		                </div>
		                <div class="details">
		                    <div class="number">
		                        <span data-counter="counterup" data-string="{{trans('template.group_accounting')}}">{{trans('template.group_accounting')}}</span>
		                    </div>
		                    <div class="desc"> {{trans('template.view_group_accounting')}} </div>
		                </div>
		            </a>
		        </div>
		        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		            <a class="dashboard-stat dashboard-stat-v2 blue" href="{{url('accounting/chart_account/type-account')}}">
		                <div class="visual">
		                    <i class="fa fa-list"></i>
		                </div>
		                <div class="details">
		                    <div class="number">
		                        <span data-counter="counterup" data-string="{{trans('template.type_of_accounting')}}">{{trans('template.type_of_accounting')}} </span>
		                    </div>
		                    <div class="desc">{{trans('template.list_type_of_accounting')}}  </div>
		                </div>
		            </a>
		        </div>
		        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		            <a class="dashboard-stat dashboard-stat-v2 blue" href="{{url('accounting/chart_account/chart_accounting')}}">
		                <div class="visual">
		                    <i class="fa fa-list"></i>
		                </div>
		                <div class="details">
		                    <div class="number">
		                        <span data-counter="counterup" data-string="{{trans('template.chart_account')}}">
		                        {{trans('template.chart_account')}} </span>
		                    </div>
		                    <div class="desc"> {{trans('template.list-chart_account')}}  </div>
		                </div>
		            </a>
		        </div>
		        <div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
@include('modal.group_accounting')
@endsection()
@section('javascript')
<script type="text/javascript">
	$('#group-accounting').on('click',function(){
		$('#myModalGroupAccounting').modal('show');
	});
</script>
@endsection()