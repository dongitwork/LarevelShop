@extends('templates.master')
@section('content')
	<div class="container">
		<div class="row user-setting">
			<div class="col-md-2 user-main">
				 @include('templates.customer')
			</div>
			<div class="col-md-10 user-form">
				<div class="col-md-12">
					<h4>Đổi mật khẩu</h4>
					<form method="post">
						{{csrf_field()}}
						<div class="change">
							<div class="form-group row {{ $errors->has('old_pass') ? 'has-error' : '' }}">
								{{ Form::label('old_pass', 'Nhập mật khẩu cũ', ['class' => 'col-md-3']) }}
								<input type="password" class="form-control col-md-7" name="old_pass" id="old_pass">
								@if ($errors->has('old_pass'))
									<span class="help-block">
                                        <strong>{{ $errors->first('old_pass') }}</strong>
                                    </span>
								@endif
							</div>
							<div class="form-group row {{ $errors->has('new_pass') ? 'has-error' : '' }}">
								{{ Form::label('new_pass', 'Nhập mật khẩu mới', ['class' => 'col-md-3']) }}
								<input type="password" class="form-control col-md-7" name="new_pass" id="new_pass">
								@if ($errors->has('new_pass'))
									<span class="help-block">
                                        <strong>{{ $errors->first('new_pass') }}</strong>
                                    </span>
								@endif
							</div>
							<div class="form-group row {{ $errors->has('confirm_new_pass') ? 'has-error' : '' }}">
								{{ Form::label('confirm_new_pass', 'Nhập lại mật khẩu mới', ['class' => 'col-md-3']) }}
							    <input type="password" class="form-control col-md-7" name="confirm_new_pass" id="confirm_new_pass">
								@if ($errors->has('confirm_new_pass'))
									<span class="help-block">
                                        <strong>{{ $errors->first('confirm_new_pass') }}</strong>
                                    </span>
								@endif
							</div>
						</div>
					    <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop