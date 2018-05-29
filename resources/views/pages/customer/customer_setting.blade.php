@extends('templates.master')
@section('content')
<div class="container">
	<div class="row user-setting">
		<div class="col-md-2 user-main">
		@include('templates.customer')
		</div>
		<div class="col-md-10 user-form">
			{{Form::open(['files' => true])}}
			<h4 align="center"><b>THÔNG TIN CÁ NHÂN</b></h4>
			<hr>
			<div class="col-md-12">
				<div class="col-md-8">

					<div class="form-group row">
						{{ Form::label('Name', 'Email', ['class' => 'col-md-4']) }}
						<p class="col-md-7"><span style="font-size: 15px" class="label label-primary">{{auth('customer')->user()->Email}}</span></p>
					</div>

					<div class="form-group {{$errors->has('name') ? 'has-error' : ''}} row">
					{{ Form::label('Name', 'Họ và tên', ['class' => 'col-md-4']) }}
					<input name="name" type="text" class="form-controler col-md-7" value="{{auth('customer')->user()->CustomerFullName}}">
						@if ($errors->has('name'))
							<span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
						@endif
					</div>

					<div class="form-group {{$errors->has('birthday') ? 'has-error' : ''}} row">
					{{ Form::label('Name', 'Ngày sinh', ['class' => 'col-md-4']) }}
						<input name="birthday" type="date" class="form-controler col-md-7" @if(auth('customer')->user()->Birthday == null)
							placeholder="Chưa có thông tin ngày sinh"
						@else
							value="{{auth('customer')->user()->Birthday}}"
						@endif>
						@if ($errors->has('birthday'))
							<span class="help-block">
                                <strong>{{ $errors->first('birthday') }}</strong>
                            </span>
						@endif
					</div>

					<div class="form-group {{$errors->has('phone') ? 'has-error' : ''}} row">
					{{ Form::label('Name', 'Số điện thoại', ['class' => 'col-md-4']) }}
						<input name="phone" type="tel" class="form-controler col-md-7" @if(auth('customer')->user()->Phone == null)
							placeholder="Chưa có thông tin số điện thoại"
						@else
							value="{{auth('customer')->user()->Phone}}" placeholder="Hãy cập nhật số điện thoại của bạn"
						@endif>
						@if ($errors->has('phone'))
							<span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
						@endif
					</div>

					<div class="form-group {{$errors->has('address') ? 'has-error' : ''}} row">
					{{ Form::label('Name', 'Địa chỉ', ['class' => 'col-md-4']) }}
						<input name="address" type="text" class="form-controler col-md-7" @if(auth('customer')->user()->Address == null)
							placeholder="Chưa có thông tin địa chỉ"
						@else
							value="{{auth('customer')->user()->Address}}" placeholder="Hãy cập nhật địa chỉ của bạn"
						@endif>
						@if ($errors->has('address'))
							<span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
						@endif
					</div>

				</div>
				<div class="col-md-4">
					<div class="form-group row">
						<div class="col-md-6">
							<label><span style="font-size: 15px" class="label label-primary">Giới tính</span></label>
						</div>
						<div class="col-md-6">
							<label><input type="radio" name="gender" value="0" @if(auth('customer')->user()->Gender == 0) checked @endif> Nam</label><br>
							<label><input type="radio" name="gender" value="1" @if(auth('customer')->user()->Gender == 1) checked @endif> Nữ</label><br>
							<label><input type="radio" name="gender" value="2" @if(auth('customer')->user()->Gender == 2) checked @endif> Chưa xác định</label>
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label">Chọn ảnh đại diện</label>
						<input name="image" id="image" type="file" accept="image/*">
					</div>
				</div>
			</div>
			<div class="col-md-7 col-md-offset-5">
				{{ Form::submit('Thay đổi thông tin',['class'=>'btn btn-success']) }}
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop