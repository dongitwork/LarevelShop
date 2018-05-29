@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Danh sách bình luận</h4>
	</div>
	<div class="container1">
		<div class="col-md-1 col-md-offset-10">
			
		</div>
		<div class="col-md-12 margin-top-10">
			<table class="table table-bordered table-hover">
				<thead>
			        <tr>
			          	<th>STT</th>
			          	<th>Ngày bình luận</th>
						<th>Ngày sửa đổi</th>
			          	<th>Tên khách hàng</th>
			          	<th>Nội dung</th>
			          	<th>Sản phẩm</th>
			          	<th>Trạng thái</th>
			          	<th>Xem chi tiết</th>
			        </tr>
			    </thead>
			    <tbody>
				<?php $stt = 1;?>
				@foreach($CommentInfo as $item)
			    	<tr>
			          	<td>{{$stt++}}</td>
						<td>{{date_format(date_create($item->CreatedAt),'H:i:s d/m/Y')}}</td>
						@if($item->UpdatedAt != null)
			          		<td>{{date_format(date_create($item->UpdatedAt),'H:i:s d/m/Y')}}</td>
						@else
							<td>Không có dữ liệu</td>
						@endif
						<td>{{$item->CustomerFullName}}</td>
						<td>{{str_limit($item->Content,15)}}</td>
			          	<td>{{$item->ProductName}}</td>
						@if($item->Status == 0)
							<td>Không hiển thị</td>
						@else
							<td>Hiển thị</td>
						@endif
			          	<td><a href="{{URL::route('comment.getEdit',$item->CommentId)}}"><span class="glyphicon glyphicon-eye-open" style="text-align: center;display: block"></span></a></td>
			        </tr>
				@endforeach
			    </tbody>
			</table>
		</div>
	</div>
</div>
@stop