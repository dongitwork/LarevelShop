@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Danh sách thành viên</h4>
	</div>
	<div class="container1">
		<div class="col-md-1 col-md-offset-10">
			<button class="btn btn-info"><a class="btnn" href="{{URL::to('/admin/addcustomer')}}">Thêm mới</a></button>
		</div>
		<div class="col-md-12 margin-top-10">
			<table class="table table-bordered table-hover">
				<thead>
			        <tr>
			          	<th>STT</th>
			          	<th>ID</th>
			          	<th>Tên thành viên</th>
			          	<th>Emaill</th>
			          	<th>Password</th>
			          	<th>Địa chỉ</th>
			          	<th>Số điện thoại</th>
			          	<th>Giới tính</th>
			          	<th>Ngày sinh</th>
			          	<th>Sửa</th>
			          	<th>Xóa</th>
			        </tr>
			    </thead>
			    <tbody>
			    	<tr>
			          	<td>1</td>
			          	<td>1</td>
			          	<td>Trần Phước Cường</td>
			          	<td>cuongback@gmail.com</td>
			          	<td>cuongdien123</td>
			          	<td>Đà Nẵng</td>
			          	<td>1224837562</td>
			          	<td>Bê đê</td>
			          	<td>28/1/1994</td>
			          	<td><a href="{{URL::to('/admin/editcustomer')}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
			          	<td><a href=""><span class="glyphicon glyphicon-remove"></span></a></td>
			        </tr>
			        <tr>
			          	<td>2</td>
			          	<td>2</td>
			          	<td>Hà Tiến</td>
			          	<td>ryuki@gmail.com</td>
			          	<td>tiendien123</td>
			          	<td>Đà Nẵng</td>
			          	<td>1246262</td>
			          	<td>Bê đê</td>
			          	<td>15/6/1994</td>
			          	<td><a href="{{URL::to('/admin/editcustomer')}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
			          	<td><a href=""><span class="glyphicon glyphicon-remove"></span></a></td>
			        </tr>
			    </tbody>
			</table>
		</div>
	</div>
</div>
@stop