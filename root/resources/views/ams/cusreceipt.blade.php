@extends('layouts.apptop3')

@section('content')

                    <!-- BEGIN CONTAINER -->
                    <div class="container">
                        <!-- BEGIN PAGE TITLE 
                        <div class="page-title">
                            <h1 style="font-family: Hanuman; text-decoration: underline;">{{ trans('template.receipt') }}</h1>
                        </div>
                        <!-- BEGIN PAGE BREADCRUMBS -->
                        <!--
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <i class="fa fa-circle"></i> <a href="{{ url('/') }}" style="font-family: Hanuman;"> {{ trans('template.dashboard') }}</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="{{ url('backend/customers/list') }}" style="font-family: Hanuman;"> {{ trans('template.customer') }}</a>
                                
                            </li>
                        </ul>-->
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                                    <div class="page-content-inner">
                                        <div class="invoice">
                                            <div class="row invoice-logo">
                                                <div class="col-xs-4 invoice-logo-space">
                                                    <img src="{{URL('/')}}/assets/img/AMS_03.png" class="img-responsive"width="100"  alt="" /> </div>
                                                <div class="col-xs-8">
                                                    <h1 style="font-family: KhmerOS_muollight;">អេ អឹម អេស</h1>
                                                    <p style="font-family: KhmerOS; font-size: 18px;"> អ៊ែខនឌិតសិននើ មែនធេនិន សេវីស
                                                        <span class="muted"> </span>
                                                    </p>
                                                    <ul class="list-unstyled">
                                                        <li> <b>AMS Air Conditioner Maintenance Service</b> </li>
                                                        <li class="fa fa-mobile"> 092 500 295 / 081 321 007 </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="row">
                                                <div class="col-xs-4"><br/>
                                                    <h3>To:</h3>
                                                    <ul class="list-unstyled">
                                                        <li> {{$pro->cust_name}} </li>
                                                        <li> {{$pro->cust_phone}} </li>
                                                        <li> {{$pro->cust_email}} </li>
                                                        <li> {{$pro->cust_addr}} </li>
                                                    </ul>
                                                </div>
                                                <div class="col-xs-4">
                                                    <h2 style="font-family: Hanuman;">បង្កាន់ដៃបង់ប្រាក់</h2>
                                                    
                                                </div>
                                                <div class="col-xs-4 invoice-payment">
                                                    <h3></h3>
                                                    <ul class="list-unstyled"><br/>
                                                        <li>
                                                            <strong>Receipt #:</strong> 5454<?php echo date('m').'00'.$pro->cust_id;?> </li>
                                                        <li>
                                                            <strong>Date:</strong> <?php echo date('M d, Y');?> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <?php
                                            $rv = 0; $unit = 0; $uprice = 0; $total = 0;
                                            foreach($cprice as $val){
                                                $rv++;
                                            }
                                            if($rv > 0){
                                                foreach($cprice as $rval){
                                                    $uprice = $rval->item_price;
                                                    $unit = $rval->items;
                                                    $total = $uprice * $unit;
                                                }

                                            }
                                            ?>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <table class="table table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th> # </th>
                                                                <th> Name </th>
                                                                <!--<th class="hidden-xs"> Desciption/Address </th>-->
                                                                <th> Desciption </th>
                                                                <th> Quantity </th>
                                                                <th> Unit Cost </th>
                                                                <th> Total </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td> 1 </td>
                                                                <td> {{$pro->cust_name}}<br/>{{$pro->cust_phone}}<br/>{{$pro->cust_email}} </td>
                                                                <td> {{$pro->cust_noted}} </td>
                                                                <td> <?php if($unit > 0){echo $unit;}else{ echo '-';}?> </td>
                                                                <td> <?php if($uprice > 0){echo '$ '.$uprice;}else{ echo '-';}?> </td>
                                                                <td> <?php if($total > 0){echo "$ ". $total;}else{echo '-';}?> </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <div class="well">
                                                        <address>
                                                            
                                                        <address>
                                                            <strong>Noted:</strong>
                                                            <br/>
                                                            <strong> This receipt is made in 2 copies: </strong><br/>
                                                            <ul class="list-unstyled">
                                                                <li> 1-For Customer </li>
                                                                <li> 2-For Seller </li>
                                                            </ul>
                                                        </address>
                                                    </div>
                                                </div>
                                                <div class="col-xs-2">
                                                    
                                                </div>
                                                <div class="col-xs-6 invoice-block">
                                                    <ul class="list-unstyled amounts">
                                                        <li class="col-xs-12">
                                                            <strong class="col-xs-8">Sub - Total amount:</strong> <strong class="col-xs-4"><?php if($total > 0){echo "$ ". $total;}else{echo '-';}?></strong><br/>
                                                            <strong class="col-xs-8">Discount:</strong> <strong class="col-xs-4">-</strong><br/>
                                                            <strong class="col-xs-8">VAT:</strong> <strong class="col-xs-4">-</strong><br/>
                                                            <strong class="col-xs-8">Grand Total:</strong> <strong class="col-xs-4"><?php if($total > 0){echo "$ ". $total;}else{echo '-';}?></strong><br/>
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-xs-4">
                                                    <div class="well">
                                                        <address>
                                                            <strong>Received By</strong>
                                                            <br/> 
                                                            <br/> 
                                                            <br/>
                                                            <br/> 
                                                            <br/>
                                                            <abbr></abbr> </address>
                                                        <address>
                                                            <strong>Name:................. </strong>
                                                            <br/><br/>
                                                            <a> Date:...../...../......... </a>
                                                        </address>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4">
                                                    
                                                </div>
                                                <div class="col-xs-4 invoice-block">
                                                    <div class="well">
                                                        <address>
                                                            <strong>Paid By</strong>
                                                            <br/> 
                                                            <br/> 
                                                            <br/>
                                                            <br/> 
                                                            <br/>
                                                            <abbr></abbr> </address>
                                                        <address>
                                                            <strong>Name:................. </strong>
                                                            <br/><br/>
                                                            <a> Date:...../...../......... </a>
                                                        </address>
                                                    </div>
                                                    <br/>
                                                    <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> Print
                                                        <i class="fa fa-print"></i>
                                                    </a><!--
                                                    <a class="btn btn-lg green hidden-print margin-bottom-5"> Submit Your Invoice
                                                        <i class="fa fa-check"></i>
                                                    </a>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PAGE CONTENT INNER -->
                    </div><!--END CONTAINER -->

@endsection