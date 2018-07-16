<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{ config('app.name') }} | Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{url('assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/pages/css/login-4.css')}}" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="{{url('favicon.ico')}}" /> 
	</head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="{{url('')}}">
                <img src="{{ url('assets/layouts/layout/img/logo.png') }}" style="height: 17px;width:104.42px;" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                <div class="form-title">
                    <span class="form-title">Welcome.</span>
                    <span class="form-subtitle">Please login.</span>
                </div>
				@if ($errors->has('password'))
					<div class="alert alert-danger display-show">
						<button class="close" data-close="alert"></button>
						<span>{{ $errors->first('password') }}</span>
					</div>
				@endif
				@if ($errors->has('email'))
					<div class="alert alert-danger display-show">
						<button class="close" data-close="alert"></button>
						<span>{{ $errors->first('email') }}</span>
					</div>
				@endif
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="email" class="control-label visible-ie8 visible-ie9">E-Mail Address</label>
					<input id="email" type="email" class="form-control form-control-solid placeholder-no-fix" name="email" value="{{ old('email') }}" required autofocus>
					@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					<label for="password" class="control-label visible-ie8 visible-ie9">Password</label>
					<input id="password" type="password" class="form-control form-control-solid placeholder-no-fix" name="password" required>
					@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
				</div>
                <div class="form-actions">
                    <label class="rememberme mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} /> Remember me
                        <span></span>
                    </label>
                    <button type="submit" class="btn btn-block green pull-right"> Login </button>
                </div>
                <div class="forget-password">
                    <a href="{{ route('password.request') }}" class="btn btn-block btn-danger" id="forget-password">Forgot password ?</a>
                </div>
                <div class="create-account">
                    <a href="{{ route('register') }}" class="btn btn-block btn-primary" id="register-btn"> Create an account </a>
                </div>
            </form>
        </div>
        <div class="copyright"> 2017 © 7MPro. POS Restaurant System. </div>
        <script src="{{ url('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/global/plugins/backstretch/jquery.backstretch.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/pages/scripts/login-4.js') }}" type="text/javascript"></script>
    </body>
</html>