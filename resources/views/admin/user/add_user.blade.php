@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Thêm nhân viên</h4>
	</div>
	<div class="container1 padding-10">
		<div class="col-md-12">
			<div class="form-main thanhvien">
				<form role="form" method="post">

					{!! csrf_field() !!}

					<div class="col-md-5">
						<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
						    <label for="example">Tên thành viên</label>
							<input type="name" class="form-control" id="name" placeholder="Abc" name="username" value="{{ old('username') }}">

							@if ($errors->has('username'))
								<span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
							@endif
						</div>
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="exampleInputFile">Email</label>
							<input class="form-control" type="email" id="email" name="email" placeholder="abc@mail.com" value="{{ old('email') }}">

							@if ($errors->has('email'))
								<span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
							@endif
						</div>
						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="exampleInputFile">Mật khẩu</label>
							<input class="form-control" type="password" id="password" name="password">

							@if ($errors->has('password'))
								<span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
							@endif
						</div>
						<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
							<label for="exampleInputFile">Địa chỉ</label>
							<input class="form-control" type="text" id="address" name="address" placeholder="123 ABC Đà Nẵng" value="{{ old('address') }}">

							@if ($errors->has('address'))
								<span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
							@endif
						</div>
						
					</div>
					<div class="col-md-5 col-md-offset-1">
						<div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
							<label for="exampleInputFile">Ngày sinh</label>
							<input class="form-control" type="date" id="birthday" name="birthday" value="{{ old('birthday') }}">

							@if ($errors->has('birthday'))
								<span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
							@endif
						</div>
						<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
							<label for="exampleInputFile">Điện thoại</label>
							<input class="form-control" type="text" id="phone" name="phone" placeholder="0905123456" value="{{ old('phone') }}">

							@if ($errors->has('phone'))
								<span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
							@endif
						</div>
						<div class="form-group">
							<label for="example">Giới tính</label>
							<select name="gender" class="form-select">
								<option value="0">Nam</option>
								<option value="1">Nữ</option>
								<option value="2">Chưa xác định</option>
							</select>
						</div>
						<div class="form-group">
							<label for="example">Trạng thái</label>
							<select name="status" class="form-select">
								<option value="1">Kích hoạt</option>
								<option value="0">Chưa kích hoạt</option>
							</select>
						</div>
						<div class="form-group">
							<label for="example">Role</label>
							<select name="role" class="form-select">
								@foreach($listRole as $item)
								<option value="{!! $item['RoleId'] !!}">{!! $item['RoleName'] !!}</option>
								@endforeach
							</select>
						</div>
					</div>
					<button class="btn btn-success btn-lg" type="submit">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</div>
@stop