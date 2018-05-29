<div class="content-admin">
	<div class="title">
		<h4>Thêm Thông tin sản phẩm</h4>
	</div>
	<div class="container1 padding-10">
		<div class="col-md-10 col-md-ofset-1">
			<div class="form-main">
				{{Form::open(['method' => 'post'])}}
					{{Form::token()}}
					<input type="hidden" name="ProductOptionId" value="{{$data->ProductOptionId}}" />
					<div class="row">
						<div class="form-group col-md-4">
						    {{ Form::label('Field', 'Tên Trường') }}
						    {{ Form::text('Field',$data->Field,['class'=>'form-control ','disabled'=>'disabled']) }}
						</div>
						<div class="form-group col-md-4">
							{{ Form::label('Type', 'Type') }}
							{{ Form::text('Type',$data->Type,['class'=>'form-control','disabled'=>'disabled']) }}
						</div>
						<div class="form-group col-md-4">
							{{ Form::label('CategoryId', 'Danh Mục') }} 
							{{ Form::text('CategoryId',$data->CategoryName,['class'=>'form-control','disabled'=>'disabled']) }}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-4">
						    {{ Form::label('Label', 'Label') }}
						    {{ Form::text('Label',$data->Label,['class'=>'form-control ']) }}
						</div>
						<div class="form-group col-md-8">
							{{ Form::label('Description', 'Mô tả') }}
						    {{ Form::text('Description',$data->Description,['class'=>'form-control','placeholder'=>""]) }}
						</div>
					</div>
					<div class="form-group col-md-12">
						{{ Form::submit('Cập Nhật',['class'=>'btn btn-warning']) }}
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
