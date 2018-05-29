<div class="content-admin">
	<div class="title">
		<h4>Thêm Slider</h4>
	</div>
	<div class="container1 padding-10">
		<div class="col-md-10 col-md-ofset-1">
			<div class="form-main">
				{{Form::open(['method' => 'post','files' => true])}}
					{{Form::token()}}
					<div class="form-group col-md-12">
					    {{ Form::label('Title', 'Tiêu đề Slider') }}
					    {{ Form::text('Title','',['class'=>'form-control','placeholder'=>"Nhập tiêu đề"]) }}
					</div>
					<div class="form-group col-md-12 ">
					    {{ Form::label('ProductPublishId', 'Product') }}
					    {{ Form::select('ProductPublishId',$ListProducts,'',['class'=>'form-control'])}}
					</div>
					<div class="form-group col-md-12 ">
					    {{ Form::label('SliderImage', 'Hình Ảnh') }}
					    {{ Form::file('SliderImage',['class'=>'Image']) }}
					    <div>
					    	<div class="AttachImage" style="display: none;"></div>
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