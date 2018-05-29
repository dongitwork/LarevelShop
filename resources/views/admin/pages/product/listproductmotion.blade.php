@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Danh sách sản phẩm khuyến mãi</h4>
	</div>
	<div class="container1">
		<div class="col-md-12 margin-top-10">
			<table class="table table-bordered table-hover">
				<thead>
			        <tr>
			          	<th>STT</th>
			          	<th>Tên sản phẩm</th>
			          	<th>Thông tin khuyến mãi</th>
			          	<th>Xem</th>
			        </tr>
			    </thead>
			    <tbody>
			    <?php
			    	$stt = 1;
			    ?>
			    	@foreach($ProductPromotion as $key => $Value)
				        <tr>
				          	<td>{{ $stt++ }}</td>
				          	<td>{{ $Value->ProductName }}</td>
				          	<td>
							@if(!empty($Value->GiftName) && empty($Value->disPercent))
								Tặng {{ $Value->GiftName }}
							@elseif(!empty($Value->disPercent) && empty($Value->GiftName))
								Giảm {{ $Value->disPercent }}%
							@elseif(!empty($Value->GiftName) && !empty($Value->disPercent))
								Tặng {{ $Value->GiftName }} và Giảm {{ $Value->disPercent }}%
							@else
								Không có khuyến mãi
				          	@endif</td>
				          	<td><a class="btn btn-warning btn-sm" href="{{ URL::route('product.getEditpromotion',$Value->ProductId) }}"><span class="glyphicon glyphicon-edit">Sửa</span></a></td>
				        </tr>
			        @endforeach

			    </tbody>
			</table>
		</div>
		<div class="container2 clear-fix">
		    <div class="clear text-center">
		      {{ $ProductPromotion->render() }}
		    </div>
		</div>
	</div>

</div>
@stop