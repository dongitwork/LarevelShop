@extends('admin.templates.masteradmin')
@section('contentadmin')
    <div class="content-admin">
        <div class="title">
            <h4>Danh sách nhân viên</h4>
        </div>
        <form role="form" method="post">
        {!! csrf_field() !!}
        <div class="container1">
            <div class="btn-group col-md-3 col-md-offset-9">
                <button class="btn btn-info"><a class="btnn" href="{{URL::to('/admin/user/add_user')}}">Thêm mới</a></button>
                <button class="btn btn-danger" type="submit" class="btn btn-default"> Xóa nhiều dòng</button>
            </div>
            <div class="col-md-12 margin-top-10">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>All<input type="checkbox" id="checkAll"/></th>
                        <th>STT</th>
                        <th>Tên thành viên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Giới tính</th>
                        <th>Ngày sinh</th>
                        <th>Role</th>
                        <th>Trạng thái</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <form role="form" method="post">

                        {!! csrf_field() !!}
                        @foreach($data as $key => $value)
                        <tr>
                            <td><input class="checkbox" type="checkbox" value="{!! $value['UserId'] !!}" name="checkbox_delete[]"></td>
                            <td>{!! $key+1 !!}</td>
                            <td>{!! $value['UserName'] !!}</td>
                            <td>{!! $value['Email'] !!}</td>
                            <td>{!! $value['Address'] !!}</td>
                            <td>{!! $value['Phone'] !!}</td>
                            @if($value['Gender'] == 0)
                                <td>Nam</td>
                            @elseif($value['Gender'] == 1)
                                <td>Nữ</td>
                            @else
                                <td>Chưa xác định</td>
                            @endif
                            <td>{!! date('d-m-Y',strtotime($value['Birthday'])) !!}</td>
                            @foreach($role as $item)
                                @if($item['RoleId'] == $value['RoleId'])
                                <td>{!! $item['RoleName'] !!}</td>
                                @endif
                            @endforeach
                            @if($value['Status'] == 1)
                                <td>Active</td>
                            @else
                                <td>Deactive</td>
                            @endif
                            <td><a class="btn btn-warning btn-sm" href="{!! URL::route('user.getEdit',$value['UserId']) !!}"><span class="glyphicon glyphicon-edit"> Sửa</span></a></td>
                            <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" class="btn btn-danger btn-sm" href="{!! URL::route('user.getDelete',$value['UserId']) !!}"><span class="glyphicon glyphicon-trash"> Xóa</span></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </form>
    </div>
@stop