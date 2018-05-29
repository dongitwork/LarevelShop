@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Danh sách nhà sản xuất</h4>
	</div>
	<form role="form" method="post">
	{!! csrf_field() !!}
	<div class="container1">
		<div class="btn-group col-md-3 col-md-offset-9">
			<a class="btn btn-info" href="{{URL::to('/admin/manuf/add_manufacturer')}}">Thêm mới</a>
			<button class="btn btn-danger" type="submit" class="btn btn-default"> Xóa nhiều dòng</button>
		</div>
		<div class="col-md-12 margin-top-10">
			<table class="table table-bordered table-hover">
				<thead>
			        <tr>
			        	<th><input type="checkbox" id="checkAll"/> All</th>
			          	<th>STT</th>
			          	<th>Tên nhà sản xuất</th>
			          	<th>Hình ảnh</th>
			          	<th>Mô tả</th>
			          	<th>Sửa</th>
			          	<th>Xóa</th>
			        </tr>
			    </thead>
			    <tbody>
			    @foreach( $listmanuf as $key => $value )

			    	<tr>
			    		<td><input class="checkbox text-center" type="checkbox" value="{!! $value->ManufacturerId !!}" name="checkbox_delete[]"></td>
			          	<td>{{ $key +1 }}</td>
			          	<td>{{ $value->ManufacturerName }}</td>
			          	<td>
		          			@if(!empty($value->Image))
		          				{!! Html::image('/images/manufacturer/'.$value->Image ,'', ['width' => '100',
		          																'class'=>"image"] ) !!}
		          			@endif
			          	</td>
			          	<!-- {!! Html::image('ulr' ,'', ['width' => '100','class'=>"image"] ) !!} -->
			          	<td>{{ $value->Description }}</td>
			          	<td><a  class="btn btn-warning btn-sm colobox-ajax" href="{!! URL::route('manuf.getEdit',$value->ManufacturerId) !!}"><span class="glyphicon glyphicon-edit"></span> Sửa</a></td>
			          	<td><a class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="{!!URL::route('manuf.getDelete', $value->ManufacturerId) !!}"><span class="glyphicon glyphicon-trash"> Xóa</span></a></td>
			        </tr>
			    @endforeach
			    </tbody>
			</table>
		</div>
	</div>
	</form>
</div>
@stop