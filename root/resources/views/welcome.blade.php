@extends('layouts.apptop3')

@section('content')

                    <!-- BEGIN CONTAINER -->
                    <div class="container">
                        <!-- BEGIN PAGE BREADCRUMBS -->
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <!--<a href="" style="font-family: Hanuman;"> ផ្ទាំងគ្រប់គ្រង</a>-->

                                <span class="caption-subject font-blue-sharp uppercase bold" style="font-family: Kh-Battambang;"><i class="fa fa-tachometer"></i>  {{ trans('template.dashboard') }}</span>
                            </li>
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                        <?php
                        $pr = '0'; $vi = '0'; $go = '0'; $t1 = 0; $t2 = 0; $t3 = 0; $total = 0;
                        foreach($pre as $val){if($val->Count1 < 10){$pr = '00'.$val->Count1;}else if($val->Count1 < 100){ $pr = '0'.$val->Count1;}else{$pr = $val->Count1;}
                            $t1 = $val->Count1;
                        }
                        foreach($vip as $val2){if($val2->Count2 < 10){$vi = '00'.$val2->Count2;}else if($val2->Count2 < 100){ $vi = '0'.$val2->Count2;}else{$vi = $val2->Count2;} $t2 = $val2->Count2;
                        }
                        foreach($gold as $val3){if($val3->Count3 < 10){$go = '00'.$val3->Count3;}else if($val3->Count3 < 100){ $go = '0'.$val3->Count3;}else{$go = $val3->Count3;} $t3 = $val3->Count3;
                        }
                        $total = $t1 + $t2 + $t3; $per1 = 0; $per2 = 0; $per3 = 0;
                        $per1 = ($t1 * 100)/$total; $per2 = ($t2 * 100)/$total; $per3 = ($t3 * 100)/$total;
                        ?>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 ">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-green-sharp">
                                                    <span data-counter="counterup" data-value="7800">0</span>
                                                    <small class="font-green-sharp">$</small>
                                                </h3>
                                                <small>DIAMOND</small>
                                            </div>
                                            <div class="icon">
                                                <i class="icon-pie-chart"></i>
                                            </div>
                                        </div>
                                        <div class="progress-info">
                                            <div class="progress">
                                                <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                                    <span class="sr-only">76% progress</span>
                                                </span>
                                            </div>
                                            <div class="status">
                                                <div class="status-title"> progress </div>
                                                <div class="status-number"> 76% </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 ">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-red-haze">
                                                    <span data-counter="counterup" data-value="<?php echo @$pr;?>">0</span>
                                                </h3>
                                                <small>PREMIUM</small>
                                            </div>
                                            <div class="icon">
                                                <i class="icon-user"></i>
                                            </div>
                                        </div>
                                        <div class="progress-info">
                                            <div class="progress">
                                                <span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
                                                    <span class="sr-only"><?php echo number_format(@$per1,2).' %';?> Connected</span>
                                                </span>
                                            </div>
                                            <div class="status">
                                                <div class="status-title"> Connected </div>
                                                <div class="status-number"> <?php echo number_format(@$per1,2).' %';?> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 ">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-blue-sharp">
                                                    <span data-counter="counterup" data-value="<?php echo @$vi;?>"></span>
                                                </h3>
                                                <small>VIP</small>
                                            </div>
                                            <div class="icon">
                                                <i class="icon-user"></i>
                                            </div>
                                        </div>
                                        <div class="progress-info">
                                            <div class="progress">
                                                <span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
                                                    <span class="sr-only"><?php echo number_format(@$per2,2).' %';?> Connected</span>
                                                </span>
                                            </div>
                                            <div class="status">
                                                <div class="status-title"> Connected </div>
                                                <div class="status-number"> <?php echo number_format(@$per2,2).' %';?> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 ">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-purple-soft">
                                                    <span data-counter="counterup" data-value="<?php echo @$go;?>"></span>
                                                </h3>
                                                <small>GOLD</small>
                                            </div>
                                            <div class="icon">
                                                <i class="icon-user"></i>
                                            </div>
                                        </div>
                                        <div class="progress-info">
                                            <div class="progress">
                                                <span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
                                                    <span class="sr-only"><?php echo number_format(@$per3,2).' %';?> Connected</span>
                                                </span>
                                            </div>
                                            <div class="status">
                                                <div class="status-title"> Connected </div>
                                                <div class="status-number"> <?php echo number_format(@$per3,2).' %';?> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <a class="dashboard-stat dashboard-stat-v2 blue" href="{{ url('backend/customers/add')}}">
                                        <div class="visual">
                                            <i class="fa fa-comments"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                <span data-counter="counterup" data-value="1349">0</span>
                                            </div>
                                            <div class="desc"> New Customers </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                        <div class="visual">
                                            <i class="fa fa-bar-chart-o"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                <span data-counter="counterup" data-value="12,5">0</span>M$ </div>
                                            <div class="desc"> Total Profit </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                        <div class="visual">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                <span data-counter="counterup" data-value="549">0</span>
                                            </div>
                                            <div class="desc"> New Orders </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                        <div class="visual">
                                            <i class="fa fa-globe"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number"> +
                                                <span data-counter="counterup" data-value="89"></span>% </div>
                                            <div class="desc"> Brand Popularity </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div><!--END CONTAINER -->

@endsection