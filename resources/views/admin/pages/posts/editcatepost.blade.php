<div class="content-admin">
	<div class="title">
		<h4>Sửa danh mục</h4>
	</div>
	<div class="container1 padding-10">
		<div class="col-md-10 col-md-ofset-1">
			<div class="form-main">
				{{Form::open(['method' => 'post'])}}
					{{Form::token()}}
					<div class="form-group col-md-12">
					    {{ Form::label('PostCategoryName', 'Tên danh mục') }}
					    {{ Form::text('PostCategoryName',$data['PostCategoryName'],['class'=>'required form-control','placeholder'=>"Nhập tên danh mục"]) }}
					</div>
					<div class="form-group col-md-12">
						{{ Form::label('Description', 'Mô tả') }}
					    {{ Form::text('Description',$data['Description'],['class'=>'form-control','placeholder'=>""]) }}
					</div>
					<div class="form-group col-md-12">
						{{ Form::submit('Cập nhập',['class'=>'btn btn-warning']) }}
					</div>
				{{ Form::close() }}

			</div>
		</div>
	</div>
</div>