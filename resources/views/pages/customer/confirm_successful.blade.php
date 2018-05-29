@extends('templates.master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<h4>Chúc mừng bạn đã kích hoạt tài khoản thành công</h4>
			<h3>Hãy <a href="{{route('customer.getLogin')}}">Đăng nhập</a> để bắt đầu mua hàng</h3>
		</div>
	</div>
@stop