@extends('templates.master')
@section('content')
	<div class="row">
		<div class="col-md-3 center">
			<img src="{{ asset('img/member.jpg') }}" alt="Dell">
		</div>
		<div class="col-md-9">
			<h4>{{$notification}}</h4>
			<div class="col-md-8 col-md-offset-2">
			</div>
		</div>
	</div>
@stop