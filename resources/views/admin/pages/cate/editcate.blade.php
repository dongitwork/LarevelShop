@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Sửa danh mục</h4>
	</div>
	<div class="container1 padding-10">
		<div class="col-md-10 col-md-ofset-1">
			<div class="form-main">
				{{Form::open(['method' => 'post'])}}
					{{Form::token()}}
					<div class="form-group col-md-5">
					    {{ Form::label('category_name', 'Tên danh mục') }}
					    {{ Form::text('category_name',$data['CategoryName'],['class'=>'form-control','placeholder'=>"Nhập tên danh mục"]) }}
						@if ($errors->has('category_name'))
							<span class="help-block">
                                <strong>{{ $errors->first('category_name') }}</strong>
                            </span>
						@endif
					</div>
					<div class="form-group col-md-5 clear">
					    {{ Form::label('CategoryIcon', 'Icon class') }}
					    {{ Form::text('CategoryIcon',$data['CategoryIcon'],['class'=>'form-control'])}}
					</div>
					<div class="form-group col-md-5">
						{{ Form::label('description', 'Mô tả') }}
					    {{ Form::text('description',$data['Description'],['class'=>'form-control','placeholder'=>""]) }}
						@if ($errors->has('description'))
							<span class="help-block">
	                            <strong>{{ $errors->first('description') }}</strong>
	                        </span>
						@endif
					</div>
					<div class="form-group col-md-12">
						{{ Form::submit('Cập nhập',['class'=>'btn btn-warning']) }}
					</div>
				{{ Form::close() }}

			</div>
		</div>
	</div>
</div>
@stop