<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="<?php if(Session::get('sidebar')){ echo "page-sidebar-menu  page-header-fixed page-sidebar-menu-closed"; }else{ echo "page-sidebar-menu  page-header-fixed";} ?>" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                    <span></span>
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="nav-item start <?php if(Request::is('/')){echo "active open";} ?>">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="icon-home"></i>
                    <span class="title">{{ trans('template.dashboard') }}</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="nav-item start <?php if(Request::is('accounting/*')){echo "active open";} ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-wrench"></i>
                    <span class="title">{{ trans('template.accounting') }}</span>
                    <span class="arrow <?php if(Request::is('accounting/*')){echo "open";} ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php if(Request::is('accounting/chart_account/*')){echo "active open";} ?>">
                        <a href="{{url('accounting/chart_account/index')}}" class="nav-link ">
                            <span class="title">{{ trans('template.chart_account') }}</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if(Request::is('accounting/income/*')){echo "active open";} ?>">
                        <a href="{{url('accounting/income/index')}}" class="nav-link ">
                            <span class="title">{{ trans('template.income') }}</span>
                        </a>
                    </li>  
                    <li class="nav-item <?php if(Request::is('accounting/expense/*')){echo "active open";} ?>">
                        <a href="{{url('accounting/expense/index')}}" class="nav-link ">
                            <span class="title">{{ trans('template.expense') }}</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if(Request::is('accounting/journal_entry/*')){echo "active open";} ?>">
                        <a href="{{url('accounting/journal_entry/index')}}" class="nav-link ">
                            <span class="title">{{ trans('template.journal_entry') }}</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if(Request::is('accounting/account_receivable*')){echo "active open";} ?>">
                        <a href="{{url('accounting/account_receivable/index')}}" class="nav-link ">
                            <span class="title">{{ trans('template.account_receivable') }}</span>
                        </a>
                    </li> 
                    <li class="nav-item <?php if(Request::is('accounting/account-payable/*')){echo "active open";} ?>">
                        <a href="{{url('accounting/account-payable/index')}}" class="nav-link ">
                            <span class="title">{{ trans('template.account_payable') }}</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if(Request::is('accounting/income-statement/*')){echo "active open";} ?>">
                        <a href="{{url('accounting/income-statement/index')}}" class="nav-link ">
                            <span class="title">{{ trans('template.income_statement') }}</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if(Request::is('accounting/balance-sheet/*')){echo "active open";} ?>">
                        <a href="{{url('accounting/balance-sheet/index')}}" class="nav-link ">
                            <span class="title">{{ trans('template.balance_sheet') }}</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if(Request::is('accounting/cash_flow/*')){echo "active open";} ?>">
                        <a href="{{url('accounting/cash_flow/index')}}" class="nav-link ">
                            <span class="title">{{ trans('template.cash_flow') }}</span>
                        </a>
                    </li> 
                    <li class="nav-item <?php if(Request::is('accounting/journal/*')){echo "active open";} ?>">
                        <a href="{{url('accounting/journal/index')}}" class="nav-link ">
                            <span class="title">{{ trans('template.journal') }}</span>
                        </a>
                    </li>                         
                </ul>
            </li>
			<li class="nav-item start <?php if(Request::is('customer/*') || Request::is('supplier/*') || Request::is('supitems/*') || Request::is('expensecat/*')){echo "active open";} ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-briefcase"></i>
                    <span class="title">{{ trans('template.maintains') }}</span>
                    <span class="arrow <?php if(Request::is('customer/*') || Request::is('supplier/*') || Request::is('supitems/*') || Request::is('expensecat/*')){echo "open";} ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php if(Request::is('customer/*')){echo "active open";} ?>">
                        <a href="{{url('customer/index')}}" class="nav-link ">
                            <span class="title">{{ trans('template.customer') }}</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if(Request::is('supplier/*')){echo "active open";} ?>">
                        <a href="{{url('supplier/index')}}" class="nav-link ">
                            <span class="title">{{ trans('template.supplier') }}</span>
                        </a>
                    </li>                    
                </ul>
            </li>
			<li class="nav-item start <?php if(Request::is('category/*') || Request::is('items/*') || Request::is('unit/*') || Request::is('warehouse/*')){echo "active open";} ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">{{ trans('template.stock') }}</span>
                    <span class="arrow <?php if(Request::is('category/*') || Request::is('items/*') || Request::is('unit/*') || Request::is('warehouse/*')){echo "open";} ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php if(Request::is('category/*')){echo "active open";} ?>">
                        <a href="{{url('category/index')}}" class="nav-link ">
                            <span class="title">{{ trans('template.category') }}</span>
                        </a>
                    </li>                    
                </ul>
            </li>
            
            <li class="nav-item start <?php if(Request::is('admins/*') || Request::is('supplier/*') || Request::is('supitems/*') || Request::is('expensecat/*') || Request::is('admins/dept/*') || Request::is('admins/position/*') || Request::is('admins/document/*') || Request::is('admins/timework/*') || Request::is('admins/staff/*')){echo "active open";} ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-briefcase"></i>
                    <span class="title">{{ trans('template.administrative') }}</span>
                    <span class="arrow <?php if(Request::is('admins/*') || Request::is('supplier/*') || Request::is('supitems/*') || Request::is('expensecat/*') || Request::is('admins/dept/*') || Request::is('admins/position/*') || Request::is('admins/document/*') || Request::is('admins/timework/*') || Request::is('admins/staff/*')){echo "open";} ?>"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php if(Request::is('admins/staff/*')){echo "active open";} ?>">
                        <a href="{{url('admins/staff/emplist')}}" class="nav-link ">
                            <span class="title">{{ trans('template.employee') }}</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if(Request::is('admins/dept/*')){echo "active open";} ?>">
                        <a href="{{url('admins/dept/add')}}" class="nav-link ">
                            <span class="title">{{ trans('template.department') }}</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if(Request::is('admins/position/*')){echo "active open";} ?>">
                        <a href="{{url('admins/position/add')}}" class="nav-link ">
                            <span class="title">{{ trans('template.function') }}</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if(Request::is('admins/document/*')){echo "active open";} ?>">
                        <a href="{{url('admins/document/document')}}" class="nav-link ">
                            <span class="title">{{ trans('template.document') }}</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if(Request::is('admins/timework/*')){echo "active open";} ?>">
                        <a href="{{url('admins/timework/timework')}}" class="nav-link ">
                            <span class="title">{{ trans('template.timework') }}</span>
                        </a>
                    </li>
					  <li class="nav-item <?php if(Request::is('admins/absentt/*')){echo "active open";} ?>">
                        <a href="{{url('admins/absentt')}}" class="nav-link ">
                            <span class="title">{{ trans('template.absentt') }}</span>
                        </a>
                    </li>
                </ul>
            </li>            
            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-bar-chart"></i>
                    <span class="title">{{ trans('template.report') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-truck"></i>
                            <span class="title">{{ trans('template.purchase') }}</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item ">
                                <a href="#" target="_blank"> {{ trans('template.order') }} </a>
                            </li> 
                            <li class="nav-item ">
                                <a href="#" target="_blank"> {{ trans('template.invoice') }} </a>
                            </li>                                
                        </ul>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-notebook"></i>
                            <span class="title">{{ trans('template.sale') }}</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item ">
                                <a href="#" target="_blank"> {{ trans('template.quotation') }} </a>
                            </li> 
                            <li class="nav-item ">
                                <a href="#" target="_blank"> {{ trans('template.invoice') }} </a>
                            </li>                                
                        </ul>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-notebook"></i>
                            <span class="title">{{ trans('template.inventory') }}</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item ">
                                <a href="#" target="_blank"> {{ trans('template.stock_balance') }} </a>
                            </li> 
                            <li class="nav-item ">
                                <a href="#" target="_blank"> {{ trans('template.moment_transfer') }} </a>
                            </li> 
                            <li class="nav-item ">
                                <a href="#" target="_blank"> {{ trans('template.adjustment') }} </a>
                            </li>                                   
                        </ul>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-notebook"></i>
                            <span class="title">{{ trans('template.cash_flow') }}</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item ">
                                <a href="#" target="_blank"> {{ trans('template.expense') }} </a>
                            </li> 
                            <li class="nav-item ">
                                <a href="#" target="_blank"> {{ trans('template.revenue') }} </a>
                            </li>                                
                        </ul>
                    </li>
                </ul>
            </li>
			<li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title">{{ trans('template.user_control') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ url('/user/index') }}" class="nav-link ">
							<i class="icon-user"></i>
                            <span class="title">{{ trans('template.user_info') }}</span>
                        </a>
                    </li>
					<li class="nav-item  ">
                        <a href="{{url('group/index')}}" class="nav-link ">
							<i class="icon-users"></i>
                            <span class="title">{{ trans('template.user_group') }}</span>
                        </a>
                    </li>
					<li class="nav-item  ">
                        <a href="ui_colors.html" class="nav-link ">
							<i class="icon-shield"></i>
                            <span class="title">{{ trans('template.permission') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
			
			<li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ trans('template.system_config') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="ui_colors.html" class="nav-link ">
                            <span class="title">Color Library</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{url('/setting/tax')}}" class="nav-link ">
                            <span class="title">{{trans('template.tax')}}</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{url('/setting/class')}}" class="nav-link ">
                            <span class="title">{{trans('template.class')}}</span>
                        </a>
                    </li>
					<li class="nav-item  ">
                        <a href="{{url('/setting/config')}}" class="nav-link ">
                            <span class="title">{{trans('template.config')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
			
         </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>