@extends('templates.master')
@section('content')
	<div class="container">
		<div class="row">
			<h3>{{$Posts['Title']}}</h3>
			<div class="body-post">
				{!! $Posts['Body'] !!}
			</div>
			<div class="author">
				
			</div>
		</div>
	</div>
@stop