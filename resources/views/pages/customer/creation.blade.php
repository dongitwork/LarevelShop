@extends('templates.master')
@section('content')
	<div class="row">
		<div class="col-md-3 center">
			<img src="{{ asset('img/member.jpg') }}" alt="Dell">
		</div>
		<div class="col-md-9">
			<h4>Chào mừng thành viên mới</h4>
			<h5>Xin mời đăng ký</h5>
			<div class="col-md-8 col-md-offset-2">
				{{Form::open(['role' => 'form'])}}
					<div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
						{{Form::label('fullname', 'Họ & Tên: ')}}
					    {{Form::text('fullname', '', ['class' => 'form-control','placeholder' => 'Hoàng Ngọc Nhất Anh'])}}
						@if ($errors->has('fullname'))
							<span class="help-block">
                                <strong>{{ $errors->first('fullname') }}</strong>
                            </span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						{{Form::label('email', 'Email: ')}}
						{{Form::email('email', '', ['class' => 'form-control','placeholder' => 'nhatanh@gmail.com'])}}
						@if ($errors->has('email'))
							<span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
						{{Form::label('gender', 'Giới tính: ')}}
						<div style="margin-left: 120px">
							<label class="radio-inline">{{Form::radio('gender',0)}}Nam</label>
							<label class="radio-inline">{{Form::radio('gender',1)}}Nữ</label>
							<label class="radio-inline">{{Form::radio('gender',2,true)}}Chưa xác định</label>
						</div>
					</div>
					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						{{Form::label('password', 'Password: ')}}
						{{Form::password('password',['class' => 'form-control','placeholder' => '******'])}}
						@if ($errors->has('password'))
							<span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('password_confirm') ? ' has-error' : '' }}">
						{{Form::label('password_confirm', 'Xác nhận lại Password: ')}}
						{{Form::password('password_confirm',['class' => 'form-control','placeholder' => '******'])}}
						@if ($errors->has('password_confirm'))
							<span class="help-block">
                                <strong>{{ $errors->first('password_confirm') }}</strong>
                            </span>
						@endif
					</div>
					{{Form::button('ĐĂNG KÝ',['type' => 'submit','class' => 'btn btn-primary'])}}
				{{Form::close()}}
			</div>
		</div>
	</div>
@stop