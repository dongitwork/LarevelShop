@extends('templates.master')
@section('content')
<div class="container-contact">
	<div class="row contact">
		<div class="col-md-6">
			<h3>Contact Us</h3>
			<form method="post">
				{{csrf_field()}}
				<div class="form-group {{$errors->has('name') ? ' has-error' : '' }}">
					<label for="exampleInputname">Tên của bạn</label>
					<input name="name" type="name" class="form-control" id="" placeholder="Nhập họ và tên" value="{{old('name')}}">
					@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					@endif
				</div>

				<div class="form-group {{$errors->has('email') ? ' has-error' : '' }}">
					<label for="exampleInputemail">Email của bạn</label>
					<input name="email" type="text" class="form-control" id="" placeholder="Nhập đúng email" value="{{old('email')}}">
					@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>

				<div class="form-group {{$errors->has('title') ? ' has-error' : '' }}">
					<label for="exampleInputemail">Tiêu đề thư</label>
					<input name="title" type="text" class="form-control" id="" placeholder="Tiêu đề thư" value="{{old('title')}}">
					@if ($errors->has('title'))
						<span class="help-block">
							<strong>{{ $errors->first('title') }}</strong>
						</span>
					@endif
				</div>

				<div class="form-group {{$errors->has('contact_content') ? ' has-error' : '' }}">
					<label for="exampleInputemail">Nội dung</label>
					<textarea class="form-control" name="contact_content" rows="6" cols="60" placeholder="Nội dung cần liên hệ"></textarea>
					@if ($errors->has('contact_content'))
						<span class="help-block">
						<strong>{{ $errors->first('contact_content') }}</strong>
					</span>
					@endif
				</div>
				<button type="submit" class="btn btn-info">Gởi Liên Hệ</button>
			</form>
		</div>
		<div class="col-md-6">
			<div class="thongtinlh">
				<h3>Thông tin liên hệ</h3>
				<p>Sản phẩm đồ án tốt nghiệp Hoàng Ngọc Nhất Anh - Nguyễn Thị Ly Na</p>
				<p>Khoa CNTT Trường Đại học Đông Á</p>
				<p>ĐT: 0987503992 - 01662924471</p>
				<p>Email: <a href="">lyna31093@gmail.com</a> - <a href="">nhatanh0603@gmail.com</a> </p>
			</div>
			<div class="bando" id="map-container">
				<h4>Tìm trên bản đồ</h4>
				<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:300px;width:100%;"><div id="gmap_canvas" style="height:300px;width:600px;"><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://www.themecircle.net" id="get-map-data">themecircle.net</a></div></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(16.032173,108.21653500000002),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(16.032173, 108.21653500000002)});infowindow = new google.maps.InfoWindow({content:"<b>Khoa CNTT Tr&#432;&#7901;ng &#272;&#7841;i H&#7885;c &#272;&ocirc;ng &Aacute;</b><br/>33 X&ocirc; Vi&#7871;t Ngh&#7879; T&#297;nh<br/> &#272;&agrave; N&#7861;ng" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
			</div>
		</div>
	</div>
</div>
@stop