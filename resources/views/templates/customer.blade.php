<div class="col-md-12 user-info">
	<img class="img-circle" src="{{auth()->guard('customer')->user()->Image}}">
	<p>{{Auth::guard('customer')->user()->CustomerFullName}}</p>
	<ul class="user">
		<li>
			<a href="{{ URL::route('customer.getCustomerSetting') }}">Thông tin tài khoản</a>
		</li>
		<li>
			<a href="{{ URL::route('customer.getOrderHistory') }}">Lịch sử đơn hàng</a>
		</li>
		<li>
			<a href="{{ URL::route('customer.getChangedPass') }}">Đổi mật khẩu</a>
		</li>
	</ul>
</div>