<div class="content-admin">
	<div class="title">
		<h4>Thêm giảm giá</h4>
	</div>
	<div class="container1 padding-10">
		<div class="col-md-12">
			<div class="form-main thanhvien">
			{{Form::open(['method' => 'post'])}}
					{!! csrf_field() !!}

					<div class="col-md-12">
						<div class="form-group">
							{{ Form::label('Percent', 'Giảm giá(%)') }}
							{{ Form::text('Percent','',['class'=>'form-control', 'max'=>'99','placeholder'=>"Nhập phần trăm giảm giá"]) }}
						</div>
						<div class="form-group">
							{{ Form::label('Description', 'Mô tả') }}
							{{ Form::textarea('Description','',['class'=>'form-control','placeholder'=>"Nhập mô tả"]) }}
						</div>
					</div>
					<div class="form-group col-md-12">
						{{ Form::submit('Lưu Giảm Giá',['class'=>'btn btn-warning']) }}
					</div>
			{{ Form::close() }}
			</div>
		</div>
	</div>
</div>