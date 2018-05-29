@extends('templates.master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<h4>Chúc mừng <font color="blue">{{session()->get('NameTemp')}}</font> đã đăng ký thành công</h4>
			<h5>Chúng tôi đã gởi một Email xác thực vào địa chỉ <font color="blue">{{session()->get('EmailTemp')}}</font> để xác thực tài khoản, vui lòng kiểm tra hộp thư và hoàn thành bước cuối cùng để có thể đăng nhập vào hệ thống</h5>
			<h3>Xin Cảm Ơn!</h3>
			<a href="{{route('mail.getResendConfirmCode')}}">Chưa nhận được Email kích hoạt tài khoản?</a>
		</div>
	</div>
@stop