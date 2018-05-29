<!DOCTYPE html> 
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Adminnistrator Cpanel</title>      
       	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery.flexisel.js') }}"></script>
        <link rel="shortcut icon" href="{{ asset('img/icon-cpanel.gif') }}">
	<link rel="stylesheet" href="{{ asset('css/login.css') }}">
	<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
</head>
<body id="body-admin" style="">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-main">
					<h1>ShopOnline</h1>
					<form id="contactform" name="contact" method="post">
						{{csrf_field()}}
						<h4 class="login">LOGIN</h4>
									<!-- chỗ đặt flash message -->
									@if(Session::has('flash_message_success'))
										<div class="alert alert-success">
											{{ Session::get('flash_message_success') }}
										</div>
									@elseif(Session::has('flash_message_warning'))
										<div class="alert alert-warning">
											{{ Session::get('flash_message_warning') }}
										</div>
									@endif
							<div class="hi" style=" width: calc(100% - 20px); margin: 10px; ">
								<div class="row2 row3{{ $errors->has('email') ? 'has-error' : '' }}">
									<span class="req glyphicon glyphicon-user"></span>
									<input type="text" name="email" id="email" class="txt" tabindex="2" placeholder="Email đăng nhập">
									@if ($errors->has('email'))
										<span class="help-block">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
									@endif
								</div>				 
								<div class="row2 row3{{ $errors->has('password') ? 'has-error' : '' }}">
									<span class="req glyphicon glyphicon-lock"></span>
									<input type="password" name="password" id="pass" class="txt" tabindex="3" placeholder="Mật khẩu">
									@if ($errors->has('password'))
										<span class="help-block">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
									@endif
								</div>
							</div>
							<div class="center login-3">
								<input type="submit" id="submitbtn" name="submitbtn" class="btn btn-info" tabindex="5" value="LOGIN">
							</div>
						</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>