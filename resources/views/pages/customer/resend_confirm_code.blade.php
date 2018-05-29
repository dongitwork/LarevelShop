@extends('templates.master')
@section('content')
<div class="form-group col-md-10 col-md-offset-2">
    <p>Bạn chưa nhận được email kích hoạt?</p>
    <p>Hãy nhập email bạn đã dùng để đăng ký tài khoản vào đây để chúng tôi gởi lại email kích hoạt khác cho bạn</p>
    <div class="form-inline col-md-8 {{ $errors->has('email') ? 'has-error' : '' }}">
        {{Form::open()}}
        <div class="col-md-1">
            {{Form::label('email','Email: ')}}
        </div>
        <div class="col-md-5">
            {{Form::text('email','',['class' => 'form-control','placeholder' => 'nhatanh@gmail.com'])}}
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="col-md-3">{{Form::button('GỞI YÊU CẦU',['type' => 'submit','class' => 'btn btn-primary'])}}</div>
        {{Form::close()}}
    </div>
</div>
@stop