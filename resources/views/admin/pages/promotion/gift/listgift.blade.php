@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Danh sách Quà Tặng</h4>
	</div>
	<form role="form" method="post">
	{!! csrf_field() !!}
	<div class="container1">
		<div class="btn-group col-md-3 col-md-offset-9">
			<a class="btn btn-info colobox-ajax " href="{{URL::to('/admin/gift/add-gift')}}">Thêm mới</a>
			<button class="btn btn-danger" type="submit" class="btn btn-default"> Xóa nhiều dòng</button>
		</div>
		<div class="col-md-12 margin-top-10">
			<table class="table table-bordered table-hover">
				<thead>
			        <tr>
						<th><input type="checkbox" id="checkAll"/> All</th>
			          	<th>STT</th>
			          	<th>Tên quà tặng</th>
			          	<th>Mô tả</th>
			          	<th>Sửa</th>
			          	<th>Xóa</th>
			        </tr>
			    </thead>
			    <tbody>
			    <?php
			        $stt = 1;		
						?>
			    @foreach( $listgift as $key => $value )
			    	<tr>

			    		<td><input class="checkbox text-center" type="checkbox" value="{!! $value->GiftId !!}" name="checkbox_delete[]"></td>
			          	<td class="text-center" >{{$stt++}}</td>
			          	<td>{{ $value->GiftName }}</td>
			          	<td>{{ $value->Description }}</td>
			          	<td class="text-center"><a class="btn btn-warning btn-sm colobox-ajax" href="{!! URL::route('gift.getEdit',$value->GiftId) !!}"><span class="glyphicon glyphicon-edit"> Sửa</span></a></td>
			          	<td class="text-center" ><a  class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="{!!URL::route('gift.getDelete', $value->GiftId) !!}"><span class="glyphicon glyphicon-trash"> Xóa</span></a></td>
			        </tr>
			    @endforeach
			    </tbody>
			</table>
		</div>
	</div>
	</form>
</div>
@stop