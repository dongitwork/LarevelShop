@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Danh sách đơn hàng</h4>
	</div>
	<div class="container1">
		<div class="col-md-1 col-md-offset-10">
			
		</div>
		<div class="col-md-12 margin-top-10">
			<table class="table table-bordered table-hover">
				<thead>
			        <tr>
			          	<th>STT</th>
			          	<th>ID</th>
			          	<th>Ngày tạo</th>
			          	<th>Tên khách hàng</th>
			          	<th>Tổng tiền</th>
			          	<th>Phí giao hàng</th>
			          	<th>Phương thức thanh toán</th>
			          	<th>Trạng thái</th>
			          	<th>Xem chi tiết</th>
			        </tr>
			    </thead>
			    <tbody>
				<?php
					$stt = 1;
				?>
				@foreach($listorder as $item)
			    	<tr>
			          	<td>{{$stt++}}</td>
			          	<td>{{$item->OrderId}}</td>
						<td>{{date_format(date_create($item->CreatedAt),'H:i:s d/m/Y')}}</td>
			          	<td><a href="{{URL::route('order.getDetail',$item->OrderId)}}">{{$item->FullName}}</a></td>
						<td>{{number_format(round($item->TotalPrice),0, ',', ',')}}</td>
			          	<td>{{number_format(round($item->PriceDeliver),0, ',', ',')}}</td>
						<td>{{$item->PaymentMethodName}}</td>
						<td><a href="{{URL::route('order.getDetail',$item->OrderId)}}"><span class="{{$item->OrderStatusIcon}}" aria-hidden="true"> {{$item->OrderStatusName}}</span></a></td>
			          	<td><a href="{{URL::route('order.getDetail',$item->OrderId)}}"><span class="glyphicon glyphicon-eye-open" style="text-align: center;display: block"></span></a></td>
			        </tr>
				@endforeach
			    </tbody>
			</table>
		</div>
	</div>
</div>
@stop