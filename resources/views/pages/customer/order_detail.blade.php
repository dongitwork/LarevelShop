@extends('templates.master')
@section('content')
	<div class="container">
		<div class="row user-setting">
			<div class="col-md-2 user-main">
				 @include('templates.customer')
			</div>
			<div class="col-md-10 user-form">
				<div class="col-md-12">
					<h4>Chi tiết đơn hàng: {{$OrderDetail['Order']->OrderId}}<!-- (id đơn hàng) --></h4>
					<div class="col-md-6">
						<p>Mã số đơn hàng: <b>{{$OrderDetail['Order']->OrderId}}</b></p>
						<p>Ngày đặt hàng: <b>{{date_format(date_create($OrderDetail['Order']->CreatedAt),'H:i:s d/m/Y')}}</b></p>
						<p>Trạng thái: <span class="{{$Status->StatusIcon}}" aria-hidden="true"><b>{{$Status->StatusName}}</b></span></p>
						<p>Số tiền thanh toán: <b>{{number_format(round($OrderDetail['Order']->TotalPrice),0, ',', ',')}}</b></p>
						<p>Hình thức thanh toán: <b>{{$OrderDetail['PaymentMethod']->PaymentMethodName}}</b></p>
					</div>
					<div class="col-md-6">
						<p>Họ Tên Người Nhận: <span class="label label-info" style="font-size: 14px">{{$OrderDetail['Order']->FullName}}</span></p>
						<p>Địa Chỉ Giao Hàng:</p>
						<p><b>{{$OrderDetail['Order']->Address}}</b></p>
						<p>Điện thoại: <b>{{$OrderDetail['Order']->Phone}}</b></p>
					</div>
					<div class="col-md-12" style=" margin-top: 10px; ">
						<table class="table table-bordered table-hover">
							<thead>
						        <tr style=" background-color: #40ADE9; ">
						          	<th>Tên sản phẩm</th>
						          	<th>Đơn giá</th>
						          	<th>Số lượng</th>
						          	<th>Thành tiền</th>
						        </tr>
						    </thead>
						    <tbody>
							@foreach($OrderDetail['Product'] as $item)
						    	<tr>
						          	<td>{{$item->get('ProductName')}}</td>
						          	<td>{{number_format(round($item->get('TotalPrice')/$item->get('Quantity')),0, ',', ',')}}</td>
						          	<td>{{$item->get('Quantity')}}</td>
						          	<td>{{number_format(round($item->get('TotalPrice')),0, ',', ',')}}</td>
						        </tr>
							@endforeach
						    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop