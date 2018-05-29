@extends('templates.master')
@section('content')
	<div class="container">
		<div class="row user-setting">
			<div class="col-md-2 user-main">
				 @include('templates.customer')
			</div>
			<div class="col-md-10 user-form">
				<div class="col-md-12">
					<h4>LỊCH SỬ ĐƠN HÀNG CỦA BẠN</h4>
					<table class="table table-bordered table-hover">
						<thead>
					        <tr style=" background-color: #40ADE9; ">
					          	<th>Mã ĐH</th>
					          	<th>Chi tiết đơn hàng</th>
					          	<th>Ngày đặt</th>
					          	<th>Trạng thái</th>
					          	<th>Tổng tiền</th>
					          	<th>Xem</th>
					        </tr>
					    </thead>
					    <tbody>
						@if(!isset($OrderHistory))
							<div>Không có thông tin đơn hàng</div>
						@else
							@foreach($OrderHistory as $key => $item)
								<tr>
									<td>{{$item['Order'][0]->OrderId}}</td>
									<td>{{$item['Product']}}</td>
									<td>{{date_format(date_create($item['Order'][0]->CreatedAt),'H:i:s d/m/Y')}}</td>
									<td>{{$item['Status']->StatusName}}</td>
									<td>{{number_format(round($item['Order'][0]->TotalPrice),0, ',', ',')}}</td>
									<td><a href="{{URL::to('/customer/order_detail',$item['Order'][0]->OrderId)}}"><span class="glyphicon glyphicon-eye-open"></span></a></td>
								</tr>
							@endforeach
						@endif
					    </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@stop