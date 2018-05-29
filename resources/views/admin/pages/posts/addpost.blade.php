@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Bài viết mới</h4>
	</div>
	<div class="container1">
		<div class="col-md-12">
			<div class="form-main">
				{{Form::open(['method' => 'post'])}}
					{{Form::token()}}
					<div class="col-md-8 nd">
						<div class="form-group ">
						{{ Form::label('Title', 'Tiêu đề bài viết') }}
					    {{ Form::text('Title','',['class'=>'form-control required','placeholder'=>"Tiêu đề"]) }}
						</div>
						<div class="form-group">
						{{ Form::label('Body', 'Nội dung') }}
						 {{ Form::textarea('Body','',['class'=>'form-control','placeholder'=>"Tiêu đề",'id'=>'Body']) }}
							<script type="text/javascript">CKEDITOR.replace('Body'); </script>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group ">
						{{ Form::label('PostCategoryId', 'Nội dung') }}
						{{ Form::select('PostCategoryId',$listcate,'',['class' => 'required form-select']) }}
						</div>
						<div class="form-group">
							{{ Form::checkbox('Active', 1 , false) }}
							{{ Form::label('Active', 'Kích Hoạt') }}
						</div>
					</div>
					<div class="form-group col-md-12">
						{{ Form::submit('Lưu',['class'=>'btn btn-warning']) }}
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@stop