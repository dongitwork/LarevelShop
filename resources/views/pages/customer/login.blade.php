@extends('templates.master')
@section('content')
	<div class="row login">
		<div class="col-md-3 center">
			<img src="{{ asset('img/congratulate.png') }}" alt="Dell">
		</div>
		<div class="col-md-9">
			<h4>Chào mừng khách hàng thân thiết</h4>
			<h5>Xin mời đăng nhập</h5>
			<div class="col-md-8 col-md-offset-2">
				{{Form::open(['role' => 'form'])}}
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						{{Form::label('email','Email:')}}
						{{Form::email('email','',['class' => 'form-control','placeholder' => 'nhatanh@gmail.com'])}}
						@if ($errors->has('email'))
							<span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
						@endif
					</div>  
					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						{{Form::label('password','Password:')}}
						{{Form::password('password',['class' => 'form-control','placeholder' => '******'])}}
						@if ($errors->has('password'))
							<span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
						@endif
					</div>  
					<div class="checkbox">  
						<label>{{Form::checkbox('remember_check','check')}} Remember me</label>

					</div>
					<div><a href="{{route('mail.getResendConfirmCode')}}">Chưa nhận được Email kích hoạt?</a></div>
				{{Form::button('ĐĂNG NHẬP',['type' => 'submit','class' => 'btn btn-primary'])}}
				{{Form::close()}}
			</div>
		</div>
	</div>
@stop