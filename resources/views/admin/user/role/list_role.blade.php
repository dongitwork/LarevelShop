@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Danh sách Role</h4>
	</div>
	<form role="form" method="post">
	{!! csrf_field() !!}
		<div class="container1">
			<div class="col-md-2">
				
			</div>
			<div class="btn-group col-md-3 col-md-offset-7">				
				<a class="btn btn-info" href="{{URL::to('/admin/role/add_role')}}">Thêm mới</a>
				<button class="btn btn-danger" type="submit" class="btn btn-default"> Xóa nhiều dòng</button>
			</div>
			<div class="col-md-12 margin-top-10">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th><p><label><input type="checkbox" id="checkAll"/> Check all</label></p></th>
							<th>STT</th>
							<th>Tên Role</th>
							<th>Mô tả</th>
							<th>Sửa</th>
							<th>Xóa</th>
						</tr>
					</thead>
					<tbody>
					@foreach($data as $key => $item)
						<tr {{--class="odd gradeX" align="center"--}}>
							<td><input class="checkbox" type="checkbox" value="{!! $item['RoleId'] !!}" name="checkbox_delete[]"></td>
							<td>{!! $key+1 !!}</td>
							<td>{!! $item['RoleName'] !!}</td>
							<td>{!! $item['Description'] !!}</td>
							<td><a class="btn btn-warning btn-sm" href="{!! URL::route('role.getEdit',$item['RoleId']) !!}"><span class="glyphicon glyphicon-edit"> Sửa</span></a></td>
							<td><a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" class="btn btn-danger btn-sm" href="{!! URL::route('role.getDelete',$item['RoleId']) !!}"><span class="glyphicon glyphicon-trash"> Xóa</span></a></td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</form>
</div>
@stop