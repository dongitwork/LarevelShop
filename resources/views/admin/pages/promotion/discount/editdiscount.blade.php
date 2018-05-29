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
							{{ Form::text('Percent',$data['Percent'],['class'=>'form-control','placeholder'=>"Nhập phần trăm giảm giá"]) }}
						</div>
						<div class="form-group">
							{{ Form::label('Description', 'Mô tả') }}
							{{ Form::textarea('Description',$data['Description'],['class'=>'form-control','placeholder'=>"Nhập mô tả"]) }}

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