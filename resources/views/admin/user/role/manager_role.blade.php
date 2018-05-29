@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Quản lý quyền</h4>
	</div>
	<div class="container1">
		<h5 style=" padding: 0 17px; font-size: 15px; ">Phân quyền</h5>
		{{Form::open(['method' => 'post'])}}
			<div class="permision form-select2">
				<select>
				  <option value="">Super Administrator</option>
				  <option value="">Administrator</option>
				  <option value="">Customer Service</option>
				</select>
			</div>
			<div class="col-md-12 margin-top-10">
				<table class="table table-bordered table-hover" >
					<thead>
				        <tr>
				          	<th style="text-align: left">Tên chức năng</th>
				          	<th>Xem</th>
				          	<th>Sửa</th>
				          	<th>Thêm</th>
				          	<th>Xóa</th>
				        </tr>
				    </thead>
				    <tbody>
				    	<tr>
				    		<td>Được phép truy cập vào công cụ quản trị</td>
				          	<td><input type="checkbox" name="vehicle" value=""><br></td>
				          	<td><input type="checkbox" name="vehicle" value=""><br></td>
				          	<td><input type="checkbox" name="vehicle" value=""><br></td>
				          	<td><input type="checkbox" name="vehicle" value=""><br></td>
					    </tr>  	
				    </tbody>
				</table>
			</div>
		{{ Form::close() }}

	</div>
</div>
@stop