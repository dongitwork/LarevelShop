
@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Sửa nhân viên giao hàng</h4>
	</div>
	<div class="container1 padding-10">
		<div class="col-md-10 col-md-ofset-1">
			<div class="form-main">
				{{Form::open(['method' => 'post'])}}
					{{Form::token()}}
					<div class="form-group col-md-5">
					    {{ Form::label('shipper_name', 'Tên nhân viên') }}
					    {{ Form::text('shipper_name',$data['ShipperName'],['class'=>'form-control','placeholder'=>"Nhập tên nhân viên giao hàng"]) }}
						@if ($errors->has('shipper_name'))
							<span class="help-block">
                                <strong>{{ $errors->first('shipper_name') }}</strong>
                            </span>
						@endif
					</div>
					<div class="form-group col-md-5 clear">
					    {{ Form::label('Phone', 'Điện thoại') }}
					    {{ Form::text('Phone',$data['Phone'],['class'=>'form-control'])}}
					</div>
					<div class="form-group col-md-5 clear">
					    {{ Form::label('Address', 'Địa chỉ') }}
					    {{ Form::text('Address',$data['Address'],['class'=>'form-control'])}}
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