@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Thêm nhân viên giao hàng</h4>
	</div>
	<div class="container1 padding-10">
		<div class="col-md-5">
			<div class="form-main">
				{{Form::open(['method' => 'post'])}}
					{{Form::token()}}
					<div class="form-group{{ $errors->has('category_name') ? ' has-error' : '' }} ">
					    {{ Form::label('shipper_name', 'Tên nhân viên') }}
					    {{ Form::text('shipper_name','',['class'=>'form-control','placeholder'=>"Nhập tên nhân viên"]) }}
						@if ($errors->has('shipper_name'))
							<span class="help-block">
                                <strong>{{ $errors->first('shipper_name') }}</strong>
                            </span>
						@endif
					</div>
					<div class="form-group  clear">
					    {{ Form::label('Phone', 'Điện thoại') }}
					    {{ Form::text('Phone','',['class'=>'form-control'])}}
					</div>
					<div class="form-group  clear">
					    {{ Form::label('Address', 'Địa chỉ') }}
					    {{ Form::text('Address','',['class'=>'form-control'])}}
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