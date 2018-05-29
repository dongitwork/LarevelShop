@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Product Option Detail</h4>
	</div>
	<div class="container1">
		<div class="col-md-1 col-md-offset-10">
			<a class="btn btn-info colobox-ajax" href="{{URL::to('/admin/pro-option/add')}}">Thêm mới</a>
		</div>
		<div class="col-md-12 margin-top-10">
			<table class="table table-bordered table-hover">
				<thead>
			        <tr>
			          	<th>STT</th>
			          	<th>Tên Trường</th>
			          	<th>Label</th>
			          	<th>Danh Mục</th>
			          	<th>Type</th>
			          	<th>Mô tả</th>
			          	<th>Sửa</th>
			          	<th>Xóa</th>
			        </tr>
			    </thead>
			    <tbody>
			    	@foreach( $data as $key => $value )
				    	<tr>
				          	<td> {{ $key +1 }}</td>
				          	<td>{{ $value->Field }}</td>
				          	<td>{{ $value->Label }}</td>
				          	<td>{{ $value->CategoryName }}</td>
				          	<td>{{ $value->Type }}</td>
				          	<td>{{ $value->Description }}</td>
				          	<td><a class="btn btn-warning btn-sm colobox-ajax"  href="{!! URL::route('ProOption.getEdit',$value->ProductOptionId) !!}"><span class="glyphicon glyphicon-edit"> Sửa</span></a></td>
				          	<td><a class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="{!!URL::route('ProOption.getDelete', $value->ProductOptionId) !!}"><span class="glyphicon glyphicon-trash"> Xóa</span></a></td>
				        </tr>
			        @endforeach
			    </tbody>
			</table>
		</div>
	</div>
</div>
@stop