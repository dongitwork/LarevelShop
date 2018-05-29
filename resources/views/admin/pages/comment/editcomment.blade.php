@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin" xmlns="http://www.w3.org/1999/html">
	<div class="title">
		<h4>Kiểm duyệt bình luận</h4>
	</div>
	<div class="container1 padding-10">
		<div class="col-md-12">
			<div class="form-main">
				<form role="form" action="" method="post" enctype="multipart/form-data" >
				{!! csrf_field() !!}
					<div class="col-md-5">
						<div class="form-group">
						    <label for="example">Tên khách hàng</label>
							<span style="font-size: 15px" class="label label-success pull-right">{{$CommentInfo[0]->CustomerFullName}}</span>
						</div>

						<div class="form-group">
							<label for="example">Tên sản phẩm</label>
							<span style="font-size: 15px" class="label label-success pull-right">{{$CommentInfo[0]->ProductName}}</span>
						</div>

						<div class="form-group">
							<label for="example">Ngày bình luận</label>
							<span style="font-size: 15px" class="label label-success pull-right">{{date_format(date_create($CommentInfo[0]->CreatedAt),'H:i:s d/m/Y')}}</span>
						</div>

						<div class="form-group">
							<label for="example">Ngày cập nhật trạng thái</label>
							<span style="font-size: 15px" class="label label-success pull-right">
								@if($CommentInfo[0]->UpdatedAt != null)
									{{date_format(date_create($CommentInfo[0]->UpdatedAt),'H:i:s d/m/Y')}}
								@else
									Không có dữ liệu
								@endif
							</span>
						</div>

						<div class="form-group">
							<label>Trạng thái bình luận</label></br>
							<label class="radio-inline">
								<input type="radio" name="status" value="1" @if($CommentInfo[0]->Status == 1) checked @endif>Hiển thị</label>
							<label class="radio-inline">
								<input type="radio" name="status" value="0" @if($CommentInfo[0]->Status == 0) checked @endif>Không hiển thị</label>
						</div>
					</div>
					<div class="col-md-7">
						<div class="form-group">
							<label for="example">Nội dung bình luận của khách hàng</label>
							<textarea class="form-control" rows="3" id="comment" disabled>{{$CommentInfo[0]->Content}}</textarea>
						</div>
						<div class="form-group">
						  	<label for="example">Trả lời bình luận của khách hàng</label>
							@if($CommentInfo[0]->Reply != null)
								<textarea class="form-control" rows="3" name="reply" placeholder="Trả lời bình luận">
								{{$CommentInfo[0]->Reply}}</textarea>
								<script type="text/javascript">CKEDITOR.replace('reply'); </script>
							@else
								<input type="hidden" name="no_reply_before" value="yes">
								<textarea class="form-control" rows="3" name="reply" placeholder="Trả lời bình luận"></textarea>
								<script type="text/javascript">CKEDITOR.replace('reply'); </script>
							@endif
						</div>
					</div>
					<button class="btn btn-warning" type="submit" class="btn btn-default">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</div>
@stop
