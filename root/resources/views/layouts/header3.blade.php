<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ config('app.locale') }}">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title> AMS System </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{URL('/')}}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL('/')}}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL('/')}}/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL('/')}}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{URL('/')}}/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL('/')}}/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="{{URL('/')}}/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL('/')}}/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{URL('/')}}/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL('/')}}/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL('/')}}/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL('/')}}/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL('/')}}/assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{URL('/')}}/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{URL('/')}}/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{URL('/')}}/assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL('/')}}/assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{URL('/')}}/assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="{{ URL('/') }}/assets/img/AMS_03.png" /> 
		<link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{URL('/')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
       <link href="{{ asset('assets/jquery-confirm/css/jquery-confirm.css') }}" rel="stylesheet" type="text/css"/>
      <link href="{{ asset('assets/flags/flags.css') }}" rel="stylesheet" type="text/css" />
        <style type="text/css">
            
            @font-face {
                font-family: KhmerOS;
                src: url("{{ url('assets/font/KhmerOS.ttf') }}");
            }
            @font-face {
              font-family: KhmerOSFreehand;
              src: url("{{ url('assets/font/KhmerOSfasthand.ttf') }}");
            }
            @font-face {
              font-family: KhmerOSbokor;
              src: url("{{ url('assets/font/KhmerOSbokor.ttf') }}");
            }
            @font-face {
              font-family: KhmerOS_muollight;
              src: url("{{ url('assets/font/KhmerOS_muollight.ttf') }}");
            }
            @font-face {
              font-family: Hanuman;
              src: url("{{ url('assets/font/Hanuman.ttf') }}");
              }
              
            @font-face {
              font-family: DaunTeav;
              src: url("{{ url('assets/font/DaunTeav.ttf') }}");
            }

            @font-face {
              font-family: Kh-Battambang;
              src: url("{{ url('assets/font/Kh-Battambang.ttf') }}");
            }

            @font-face {
              font-family: KhmerOSSiemreap;
              src: url("{{ url('assets/font/KhmerOSSiemreap.ttf') }}");
            }
            /* English font */
            @font-face {
              font-family: Georgia;
              src: url("{{ url('assets/font/Georgia.ttf') }}");
            }
        </style>
    </head>
    <!-- END HEAD -->