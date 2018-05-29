@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Danh sách Slider</h4>
	</div>
	<form role="form" method="post">
	{!! csrf_field() !!}
	<div class="container1">
		<div class="btn-group col-md-3 col-md-offset-9">
			<a class="btn btn-info colobox-ajax" href="{!! URL::route('Slider.Add') !!}">Thêm mới</a>
			<button class="btn btn-danger" type="submit" class="btn btn-default"> Xóa nhiều dòng</button>
		</div>
		<div class="col-md-12 margin-top-10">
			<table class="table table-bordered table-hover">
				<thead>
			        <tr>
			        	<th><input type="checkbox" id="checkAll"/> All</th>
			          	<th>STT</th>
			          	<th>Title</th>
			          	<th>Hình ảnh</th>
			          	<th>Sửa</th>
			          	<th>Xóa</th>
			        </tr>
			    </thead>
			    <tbody>
			    @foreach( $ListSlider as $key => $value )
			    	<tr>
			    		<td><input class="checkbox text-center" type="checkbox" value="{!! $value->SliderId !!}" name="checkbox_delete[]"></td>
			          	<td>{{ $key +1 }}</td>
			          	<td>{{ $value->Title }}</td>
			          	<td>
		          			@if(!empty($value->SliderImage))
		          				{!! Html::image('/images/slider/'.$value->SliderImage ,'', ['width' => '100',
		          																'class'=>"image"] ) !!}
		          			@endif
			          	</td>
			          	<td><a  class="btn btn-warning btn-sm colobox-ajax" href="{!! URL::route('Slider.Edit',$value->SliderId) !!}"><span class="glyphicon glyphicon-edit"></span> Sửa</a></td>
			          	<td><a class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="{!!URL::route('Slider.Delete', $value->SliderId) !!}"><span class="glyphicon glyphicon-trash"> Xóa</span></a></td>
			        </tr>
			    @endforeach
			    </tbody>
			</table>
		</div>
	</div>
	</form>
</div>
@stop