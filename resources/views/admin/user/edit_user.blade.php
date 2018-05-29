@extends('admin.templates.masteradmin')
@section('contentadmin')
    <div class="content-admin">
        <div class="title">
            <h4>Sửa nhân viên</h4>
        </div>
        <div class="container1 padding-10">
            <div class="col-md-12">
                <div class="form-main thanhvien">
                    <form role="form" method="post">

                        {!! csrf_field() !!}

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="example">Tên thành viên</label>
                                <input type="name" class="form-control" id="name" placeholder="Abc" name="username" value="{{ old('username', isset($data) ? $data['UserName'] : null) }}">

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="exampleInputFile">Email</label>
                                <input class="form-control" type="email" id="email" name="email" placeholder="abc@mail.com" value="{{ old('email', isset($data) ? $data['Email'] : null) }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="exampleInputFile">Địa chỉ</label>
                                <input class="form-control" type="text" id="address" name="address" placeholder="123 ABC Đà Nẵng" value="{{ old('address', isset($data) ? $data['Address'] : null) }}">

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                                <label for="exampleInputFile">Ngày sinh</label>
                                <input class="form-control" type="date" id="birthday" name="birthday" value="{{ old('birthday', isset($data) ? $data['Birthday'] : null) }}">

                                @if ($errors->has('birthday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="exampleInputFile">Điện thoại</label>
                                <input class="form-control" type="text" id="phone" name="phone" placeholder="0905123456" value="{{ old('phone', isset($data) ? $data['Phone'] : null ) }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="example">Giới tính</label>
                                <select name="gender" class="form-select">
                                    <option @if($data['Gender'] == 0) selected @endif value="0">Nam</option>
                                    <option @if($data['Gender'] == 1) selected @endif value="1">Nữ</option>
                                    <option @if($data['Gender'] == 2) selected @endif value="2">Chưa xác định</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="example">Trạng thái</label>
                                <select name="status" class="form-select">
                                    <option @if($data['Status'] == 1) selected @endif value="1">Kích hoạt</option>
                                    <option @if($data['Status'] == 0) selected @endif value="0">Chưa kích hoạt</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="example">Role</label>
                                <select name="role" class="form-select">
                                    @foreach($listRole as $item)
                                        <option @if($data['RoleId'] == $item['RoleId']) selected @endif value="{{ $item['RoleId'] }}">{{ $item['RoleName'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                        <button class="btn btn-success btn-lg" type="submit">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop