@extends('templates.master')
@section('content')
	<div class="row login">
		<div class="col-md-3 center">
			<img src="{{ asset('img/congratulate.png') }}" alt="Dell">
		</div>
		<div class="col-md-9">
			<h4>Chào mừng khách hàng thân thiết</h4>
			<h5>Xin mời đăng nhập</h5>
			<div class="col-md-8 col-md-offset-2">
				<form role="form">  
					<div class="form-group">  
						<label for="email">Email:</label>  
					    <input class="form-control" id="email" type="email">  
					</div>  
					<div class="form-group">  
						<label for="pwd">Mật Khẩu:</label>  
					    <input class="form-control" id="pwd" type="password">  
					</div>  
					<div class="checkbox">  
						<label><input type="checkbox"> Remember me</label>  
					</div>  
					<button class="btn btn-default" type="submit">Đăng Nhập</button>  
				</form>
			</div>
		</div>
	</div>
@stop