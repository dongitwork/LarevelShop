@extends('admin.templates.masteradmin')
@section('contentadmin')
    <div class="content-admin">
        <div class="title">
            <h4>SỬA TRẠNG THÁI ĐƠN HÀNG</h4>
        </div>
        <div class="container1 padding-10">
            <div class="col-md-12">
                <div class="form-main thanhvien">
                    <form role="form" method="post">

                        {!! csrf_field() !!}

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="example">Tên Trạng thái</label>
                                <input type="name" class="form-control" id="name" placeholder="Nhập tên trạng thái" name="name" value="{{old('name', isset($status) ? $status['StatusName'] : null)}}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
                                <label for="exampleInputFile">Icon</label>
                                <input class="form-control" type="text" id="icon" placeholder="Nhập Icon (Có thể bỏ trống)" name="icon" value="{{old('icon', isset($status) ? $status['StatusIcon'] : null)}}">

                                @if ($errors->has('icon'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('icon') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="exampleInputFile">Mô tả</label>
                                <input class="form-control" type="text" id="description" placeholder="Nhập mô tả" name="description" value="{{old('description', isset($status) ? $status['Description'] : null)}}">

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6">

                            </div>
                            <div class="form-group col-md-12">
                                {{ Form::submit('Cập nhập',['class'=>'btn btn-warning']) }}
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop