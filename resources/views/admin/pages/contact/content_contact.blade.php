@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin" xmlns="http://www.w3.org/1999/html">
	<div class="title">
		<h4>Trả Lời Liên Hệ</h4>
	</div>
	<div class="container1 padding-10">
		<div class="col-md-12">
			<div class="form-main">
				<form role="form" action="" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="col-md-5">
						<div class="form-group">
						    <label for="example">Tên Người Gởi</label>
							<span style="font-size: 15px" class="label label-success pull-right">{{$Contact['ContactName']}}</span>
						</div>

						<div class="form-group">
							<label for="example">Email</label>
							<span style="font-size: 15px" class="label label-success pull-right">{{$Contact['Email']}}</span>
						</div>

						<div class="form-group">
							<label for="example">Tiêu Đề</label>
							<span style="font-size: 15px" class="label label-success pull-right">{{$Contact['Title']}}</span>
						</div>
						<div class="form-group">
							<label for="example">Nội Dung Liên Hệ</label>
							<textarea class="form-control" rows="3" id="comment" disabled>{!! $Contact['Content'] !!}</textarea>
						</div>
					</div>
					<div class="col-md-7">
						<div class="form-group {{$errors->has('reply') ? 'has-error' : '' }}">
						  	<label for="example">Trả Lời Liên Hệ</label>
							<textarea class="form-control" rows="3" name="reply" placeholder="Nhập nội dung trả lời"></textarea>
							@if ($errors->has('reply'))
								<span class="help-block">
							<strong>{{ $errors->first('reply') }}</strong>
						</span>
							@endif
								<script type="text/javascript">CKEDITOR.replace('reply'); </script>
						</div>
					</div>
					<button class="btn btn-warning" type="submit" class="btn btn-default">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</div>
@stop
