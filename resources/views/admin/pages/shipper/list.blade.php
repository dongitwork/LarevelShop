@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Danh sách nhân viên giao hàng</h4>
	</div>
	<form role="form" method="post">
	{!! csrf_field() !!}
	<div class="container1">
		<div class="btn-group col-md-3 col-md-offset-9">
			<a class="btn btn-info" href="{{URL::to('/admin/shipper/add')}}">Thêm mới</a>
			<button class="btn btn-danger" type="submit" class="btn btn-default"> Xóa nhiều dòng</button>
		</div>
		<div class="col-md-12 margin-top-10">
			<table class="table table-bordered table-hover" >
				<thead>
			        <tr>
			        	<th><input type="checkbox" id="checkAll"/> All</th>
			          	<th>STT</th>
			          	<th>Tên nhân viên</th>
			          	<th>Điện thoại</th>
			          	<th>Địa chỉ</th>
			          	<th>Sửa</th>
			          	<th>Xóa</th>
			        </tr>
			    </thead>
			    <tbody>
			    @foreach( $list as $key => $value )
			    	<tr>
			    		<td><input class="checkbox text-center" type="checkbox" value="{!! $value->ShipperId !!}" name="checkbox_delete[]"></td>
			          	<td>{{ $key +1 }}</td>
			          	<td>{{ $value->ShipperName }}</td>
			          	<td><span class="{{ $value->Phone }}"></span></td>
			          	<td>{{ $value->Address }}</td>
			          	<td align="center"><a class="btn btn-warning btn-sm" href="{!! URL::route('shipper.getEdit',$value->ShipperId) !!}"><span class="glyphicon glyphicon-edit"> Sửa</span></a></td>
			          	<td align="center"><a class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="{!!URL::route('shipper.getDelete', $value->ShipperId) !!}"><span class="glyphicon glyphicon-trash"> Xóa</span></a></td>
			        </tr>
			        @endforeach
			    </tbody>
			</table>
		</div>
	</div>
	</form>
</div>
@stop