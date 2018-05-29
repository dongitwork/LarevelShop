@extends('admin.templates.masteradmin')
@section('contentadmin')
    <div class="content-admin">
        <div class="title">
            <h4>Sửa nhóm người dùng</h4>
        </div>
        <div class="container1 padding-10">
            <div class="col-md-12">
                <div class="form-main thanhvien">
                    <form role="form" method="post">

                        {!! csrf_field() !!}

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('role_name') ? ' has-error' : '' }}">
                                <label for="example">Tên nhóm người dùng</label>
                                <input type="name" class="form-control" id="rolename" placeholder="Nhập tên nhóm người dùng" name="role_name" value="{{ old('role_name', isset($data) ? $data['RoleName'] : null) }}">

                                @if ($errors->has('role_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="exampleInputFile">Mô tả</label>
                                <input class="form-control" type="text" id="description" placeholder="Nhập mô tả" name="description" value="{{ old('description', isset($data) ? $data['Description'] : null) }}">

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
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