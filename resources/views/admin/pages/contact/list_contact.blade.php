@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Danh sách liên hệ</h4>
	</div>
	<div class="container1">
		<div class="col-md-1 col-md-offset-10">
			
		</div>
		<div class="col-md-12 margin-top-10">
			<table class="table table-bordered table-hover">
				<thead>
			        <tr>
						<th>Trạng Thái</th>
			          	<th>STT</th>
			          	<th>Ngày Gởi</th>
			          	<th>Tên Người Gởi</th>
			          	<th>Email</th>
			          	<th>Tiêu Đề Thư</th>
			          	<th>Xem Chi Tiết</th>
			        </tr>
			    </thead>
			    <tbody>
				<?php $stt =1; ?>
				@foreach($Contact->reverse() as $item)
			    	<tr>
					@if($item->Status == 0)
						<td style="text-align: center"><span style="font-size: 13px" class="label label-danger">Chưa Trả Lời</span></td>
					@else
						<td style="text-align: center"><span style="font-size: 13px" class="label label-success">Đã Trả Lời</span></td>
					@endif
			          	<td>{{$stt++}}</td>
						<td>{{date_format(date_create($item->CreatedAt),'H:i:s d/m/Y')}}</td>
		          		<td>{{$item->ContactName}}</td>
						<td>{{$item->Email}}</td>
						<td>{{$item->Title}}</td>
			          	<td><a href="{{url()->route('contact.getDetail',$item->ContactId)}}"><span class="glyphicon glyphicon-eye-open" style="text-align: center;display: block"></span></a></td>
			        </tr>
				@endforeach
			    </tbody>
			</table>
		</div>
	</div>
</div>
@stop