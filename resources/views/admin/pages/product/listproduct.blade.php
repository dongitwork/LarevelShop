@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Danh sách sản phẩm</h4>
	</div>
	<div class="container1">
		<div class="row">
			<div class="col-md-10">
				<ul>
					<li class="col-md-3" style=" border-right: 1px solid; "><a href="{{ URL::route('product.list') }}">Danh Sách Sản Phẩm</a></li>
					<li class="col-md-3"><a href="{{ URL::route('product.list') }}?type=publish">Sản Phẩm Hiển Thị</a></li>
				</ul>
			</div>
			<div class="col-md-1 ">
				<a class="btn btn-info" href="{{URL::to('/admin/product/add')}}">Thêm mới</a>
			</div>
		</div>
		<div class="col-md-12 margin-top-10">
			<table class="table table-bordered table-hover">
				<thead>
			        <tr>
			          	<th>STT</th>
			          	<th>ID</th>
			          	<th>Tên sản phẩm</th>
			          	<th>Hình ảnh</th>
			          	<th>Danh mục</th>
			          	<th>Nhà sản xuất</th>
			          	<th>Giá gốc</th>
			          	<th>Số lượng</th>
			          	<th>Sửa</th>
			          	<th>Xóa</th>
			        </tr>
			    </thead>
			    <tbody>
			    	@foreach($Product as $key => $Value)
			        <tr>
			          	<td>{{ $key+1 }}</td>
			          	<td>{{ $Value->ProductId }}</td>
			          	<td>{{ $Value->ProductName }}</td>
			          	<td>
			          		@if(!empty($Value->Image))
		          				{!! Html::image('/images/product/'.$Value->Image ,'', ['width' => '100','class'=>"image"] ) !!}
		          			@endif
			          	</td>
			          	<td>{{ $Value->CategoryName }}</td>
			          	<td>{{ $Value->ManufacturerName }}</td>
			          	<td>{{ number_format($Value->Price,0, '.', ' ') }}</td>
			          	<td  align="center">{{ $Value->Quantity }}</td>
			          	<td><a class="btn btn-warning btn-sm" href="{{ URL::route('product.getEdit',$Value->ProductId) }}"><span class="glyphicon glyphicon-edit"> Sửa</span></a></td>
			          	<td><a  class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="{{URL::route('product.getDelete',$Value->ProductId)}}"><span class="glyphicon glyphicon-trash"> Xóa</span></a></td>
			        </tr>
			        @endforeach

			    </tbody>
			</table>
		</div>
		<div class="container2 clear-fix">
		    <div class="clear text-center">
		      {{ $Product->render() }}
		    </div>
		</div>
	</div>

</div>
@stop