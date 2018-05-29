@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Thêm thành viên</h4>
	</div>
	<div class="container1 padding-10">
		<div class="col-md-12">
			<div class="form-main thanhvien">
				<form role="form">
					<div class="col-md-6">
						<div class="form-group">
						    <label for="example">Tên thành viên</label>
							<input type="name" class="form-control" id="name" placeholder="Nhập tên danh mục">
						</div>
						<div class="form-group">
							<label for="example">Trạng thái</label>
							<select class="form-select">
							  	<option value="volvo">Kích hoạt</option>
							  	<option value="saab">Không kích hoạt</option>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputFile">Email</label>
							<input class="form-text" type="" id="price">
						</div>
						<div class="form-group">
							<label for="exampleInputFile">Mật khẩu</label>
							<input class="form-text" type="password" id="price">
						</div>
						<div class="form-group">
							<label for="exampleInputFile">Địa chỉ</label>
							<input class="form-text" type="" id="price">
						</div>
						<div class="form-group">
							<label for="exampleInputFile">Ngày sinh</label>
							<input class="form-text" type="" id="price">
						</div>
						<div class="form-group">
							<label for="exampleInputFile">Giới tính</label>
							<input class="form-text" type="" id="price">
						</div>
						<div class="form-group">
							<label for="exampleInputFile">Điện thoại</label>
							<input class="form-text" type="" id="price">
						</div>
					</div>
					<div class="col-md-6">
						
					</div>
					<button class="btn btn-warning" type="submit" class="btn btn-default">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</div>
@stop