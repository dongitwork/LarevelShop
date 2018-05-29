@extends('templates.master')
@section('content')
	<h3>Thanh toán đơn hàng</h3>
	<div class="payment">
		{{Form::open()}}
		<div class="col-md-4">
			<h5>Thông tin giao hàng</h5>
			<div class="form-group">
				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
	            	<label for="name" id="name-ariaLabel">Họ và Tên: <span> *</span></label>
	            	<input class="form-control" id="name" placeholder="Nguyễn Văn A" name="name" type="text" aria-labelledby="name-ariaLabel" value="{{old('name')}}">

					@if ($errors->has('name'))
						<span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
					@endif
	            </div>
				<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
	            	<label for="phone" id="phone-ariaLabel">Điện thoại: <span> *</span></label>
	            	<input class="form-control" placeholder="0981826173" id="phone" name="phone" type="text" aria-labelledby="phone-ariaLabel" value="{{old('phone')}}">

					@if ($errors->has('phone'))
						<span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
					@endif
	            </div>
	            <div class="form-group {{ $errors->has('province') ? 'has-error' : '' }}">
	            	<label for="province" id="province-ariaLabel">Tỉnh thành: <span> *</span></label>
	                <select class="form-control" name="province" id="province">
						<option value="">-- Vui lòng chọn --</option>
						@foreach($Province as $item)
							<option value="{{$item['ProvinceId']}}">{{$item['ProvinceName']}}</option>
						@endforeach
	                </select>
					<p id="demo"></p>
					@if ($errors->has('province'))
						<span class="help-block">
                                        <strong>{{ $errors->first('province') }}</strong>
                                    </span>
					@endif
				</div>
				<div class="form-group {{ $errors->has('district') ? 'has-error' : '' }}">
	            	<label for="district" id="district-ariaLabel">Quận Huyện:<span> *</span></label>
	                <select class="form-control" name="district" id="district">
	                 </select>

					@if ($errors->has('district'))
						<span class="help-block">
                                        <strong>{{ $errors->first('district') }}</strong>
                                    </span>
					@endif
				</div>
				<div class="form-group {{ $errors->has('ward') ? 'has-error' : '' }}">
	            	<label class="control-label" for="ward" id="ward-ariaLabel">Xã Phường: <span> *</span></label>
	            	<select class="form-control" id="ward" name="ward">
	                </select>

					@if ($errors->has('ward'))
						<span class="help-block">
                                        <strong>{{ $errors->first('ward') }}</strong>
                                    </span>
					@endif
	            </div>

	            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
	            	<label for="address" id="address-ariaLabel">Địa chỉ nhà: <span> *</span></label>
	            	<input class="form-control" placeholder="90" id="address" name="address" type="text" aria-labelledby="address-ariaLabel" value="{{old('address')}}">

					@if ($errors->has('address'))
						<span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
					@endif
	            </div>
				<div class="form-group {{ $errors->has('postcode') ? 'has-error' : '' }}">
					<label for="postcode" id="postcode-ariaLabel">Mã bưu điện: </label>
					<input class="form-control" id="postcode" name="postcode" type="text" aria-labelledby="postcode-ariaLabel" value="{{old('postcode')}}">

					@if ($errors->has('postcode'))
						<span class="help-block">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
					@endif
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<h5>Phương thức thanh toán</h5>
			<div class="btn-group thanhtoan-card">
				<ul>
					@foreach($PaymentMethod as $item)
						<li>
							<label><input type="radio" name="radioCheckout" value="{{$item['PaymentMethodId']}}"> @if($item['PaymentMethodId'] == 1 || $item['PaymentMethodId'] == 3)
					        	{{$item['PaymentMethodName']}}
					       	@else
					        	{{$item['PaymentMethodName']}}  <span class="label label-danger">Đang xây dựng</span>
					      	@endif
						</li>
					@endforeach
				</ul>
				<div class="form-group {{ $errors->has('radioCheckout') ? 'has-error' : '' }} center">
					@if ($errors->has('radioCheckout'))
						<span class="help-block">
                                        <strong>{{ $errors->first('radioCheckout') }}</strong>
                                    </span>
					@endif
				</div>
				<p>- Nhân viên của công ty hoặc bưu điện sẽ nhận tiền khi giao hàng cho quý khách. </p>
                <p>- Trong trường hợp nhờ người nhận giùm, quý khách phải thông báo số tiền thanh toán cho người đó để công ty dễ dàng thực hiện giao dịch.</p>
                <p>- Miễn phí giao dịch đối với thành phố Đà Nẵng.</p>
			</div>
		</div>
		<div class="col-md-4">
			<h5>Chi tiết thanh toán</h5>
			<div class="sum">
                <span class="phi">Giá Sản Phẩm :<span>{{session()->has('Product') ? ''.number_format(round(session()->get('TotalPrice')),0, ',', ',') : '0'}} VNĐ</span></span>
                <span class="phi">Phí Vận Chuyển :<span>Miễn phí</span></span>
                <span class="phi">Thuế :<span>Sản phẩm đã bao gồm</span></span>
                <span class="phi">Tổng Cộng :<span>{{number_format(round(session()->get('TotalPrice')),0, ',', ',')}} VNĐ</span></span>
                <div class="thanhtoan">
                	<input type="submit" name="checkout" class="thanhtoan btn btn-info" value="Thanh toán">
            	</div>
            </div>
		</div>
		{{Form::close()}}
	</div>
@stop