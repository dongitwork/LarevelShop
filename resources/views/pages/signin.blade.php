@extends('templates.master')
@section('content')
	<div class="row">
		<div class="col-md-3 center">
			<img src="{{ asset('img/member.jpg') }}" alt="Dell">
		</div>
		<div class="col-md-9">
			<h4>Chào mừng thành viên mới</h4>
			<h5>Xin mời đăng ký</h5>
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
					<div class="form-group">  
						<label for="pwd">Nhập Lại Mật Khẩu:</label>  
					    <input class="form-control" id="pwd" type="password">  
					</div>  
					<button class="btn btn-default" type="submit">Đăng Ký</button>  
				</form>
			</div>
		</div>
	</div>
@stop