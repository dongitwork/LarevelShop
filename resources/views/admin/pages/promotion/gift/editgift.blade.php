<div class="content-admin">
	<div class="title">
		<h4>Sửa Quà Tặng</h4>
	</div>
	<div class="container1 padding-10">
		<div class="col-md-12">
			<div class="form-main thanhvien">
				{{Form::open(['method' => 'post'])}}
					{!! csrf_field() !!}
					<div class="col-md-12">
						<div class="form-group">
							{{ Form::label('GiftName', 'Tên Quà Tặng') }}
							{{ Form::text('GiftName',$value->GiftName,['class'=>'form-control','placeholder'=>"Nhập tên quà tặng"]) }}
						</div>
						<div class="form-group">
							{{ Form::label('Description', 'Mô tả') }}
							{{ Form::textarea('Description',$value->Description,['class'=>'form-control','placeholder'=>"Nhập mô tả"]) }}

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