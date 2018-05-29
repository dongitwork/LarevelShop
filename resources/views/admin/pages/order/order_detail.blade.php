@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Chi Tiết Đơn hàng</h4>
	</div>
	<div class="container1 padding-10">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-8">
					<div class="col-md-12"  style=" background: white;  box-shadow: 1px 2px 3px #CACED2;">
						<h4>Mã đơn hàng: <b>{{$orderDetail['Order']->OrderId}}</b></h4>
						<table class="table table-bordered table-hover">
							<thead>
						        <tr style="background-color: #f0f0f0; color: #ff0000;">
						          	<th class="name-pro rieng">Tên sản phẩm</th>
						          	<th class="rieng">Giá tiền</th>
						          	<th class="rieng">Số lượng</th>
						          	<th class="rieng">Tổng tiền</th>
						        </tr>
						    </thead>
						    <tbody>
							@foreach($orderDetail['Product'] as $item)
						    	<tr>
						          	<td>{{$item->get('ProductName')}}</td>
						          	<td>{{number_format(round($item->get('TotalPrice')/$item->get('Quantity')),0, ',', ',')}}</td>
						          	<td>{{$item->get('Quantity')}}</td>
						          	<td>{{number_format(round($item->get('TotalPrice')),0, ',', ',')}}</td>
						        </tr>
							@endforeach
						    </tbody>
						</table>
						<div class="sum row">
							<div class="group-col col-md-6 col-md-offset-6">
								<div class="left col-md-6 text-right">
									<b>Tổng tiền:</b>
								</div>
								<div class="right col-md-6 text-right">
									<p>{{number_format(round($orderDetail['Order']->TotalPrice - $orderDetail['Order']->PriceDeliver),0, ',', ',')}} VND</p>
								</div>
							</div>
							<div class="group-col col-md-6 col-md-offset-6">
								<div class="left col-md-6 text-right">
									<p>Phí vận chuyển:</p>
								</div>
								<div class="right col-md-6 text-right">
									<p>{{number_format(round($orderDetail['Order']->PriceDeliver),0, ',', ',')}} VND</p>
								</div>
							</div>
							<div class="group-col col-md-6 col-md-offset-6">
								<div class="left col-md-6 text-right">
									<b  style="font-size: 16px">Thành tiền:</b>
								</div>
								<div class="right col-md-6 text-right">
									<p  class="text-primary" style="font-size: 16px"><b>{{number_format(round($orderDetail['Order']->TotalPrice),0, ',', ',')}} VND</b></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 grt">
						<div class="group-col col-md-12">
							<div class="left col-md-5 text-left">
								<p>Ngày khởi tạo</p>
							</div>
							<div class="right col-md-6">
								<p>{{date_format(date_create($orderDetail['Order']->CreatedAt),'H:i:s d/m/Y')}}</p>
							</div>
						</div>
						<div class="group-col col-md-12">
							<div class="left col-md-5 text-left">
								<p>Trạng thái</p>
							</div>
							<div class="right col-md-6">
								<p><span class="{{$orderStatus->StatusIcon}}" aria-hidden="true"> {{$orderStatus->StatusName}}</span></p>
							</div>
						</div>
						@if($orderStatus->StatusName == "Shipping" or $orderStatus->StatusName == "Shipped")
							<div class="group-col col-md-12">
								<div class="left col-md-5 text-left">
									<p>Shipper</p>
								</div>
								<div class="right col-md-6">
									<p><span aria-hidden="true"> @foreach($shipperList as $item) @if($item['ShipperId'] == $orderShipperId->ShipperId) {{$item['ShipperName']}} @endif @endforeach</span></p>
								</div>
							</div>
						@endif
						<div class="group-col col-md-12">
							<div class="left col-md-5 text-left">
								<p>Phương thức thanh toán</p>
							</div>
							<div class="right col-md-6">
								<p>{{$orderDetail['PaymentMethod']->PaymentMethodName}}</p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-4">
					<form role="form" method="post">
						{{csrf_field()}}
						<div class="form-group">
						    <label for="example">Trạng thái đơn hàng</label>
						    <select name="order_status" class="form-select1 form-category" id="order_status">
								@foreach($statusList as $item)
									<option value="{{$item['StatusId']}}" @if($item['StatusName'] == $orderStatus->StatusName) selected @endif>{{$item['StatusName']}}</option>
								@endforeach
						    </select>
						</div>
						<div class="form-group">
							<div class="shipper">
								<label for="example">Shipper</label>
								<select name="shipper" class="form-select1 form-category" id="shipper">
									<option value="" {{isset($orderShipperId) ? "" : "selected"}}>-- Chọn Shipper --</option>
									@foreach($shipperList as $item)
										<option value="{{$item['ShipperId']}}" @if($orderShipperId->ShipperId == $item['ShipperId'])selected @endif>{{$item['ShipperName']}}</option>
									@endforeach
								</select>
							</div>
						</div>
						{{ Form::submit('CẬP NHẬT',['class'=>'btn btn-info']) }}
					</form>
					<div class="col">
						<h5>Thông tin khách hàng</h5>
						<div class="col-cus">
							<b>{{$orderDetail['Customer']->CustomerFullName}}</b>
							<p>{{$orderDetail['Customer']->Email}}</p>
							<p>{{$orderDetail['Customer']->Address}}</p>
							<span class="glyphicon glyphicon-earphone"> {{$orderDetail['Customer']->Phone}}</span>
						</div>

					</div>
					<div class="col">
						<h5>Địa chỉ giao hàng</h5>
						<div class="col-cus">
							<b>{{$orderDetail['Order']->FullName}}</b>
							<p>{{$orderDetail['Order']->Address}}</p>
							<span class="glyphicon glyphicon-earphone"> {{$orderDetail['Order']->Phone}}</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop