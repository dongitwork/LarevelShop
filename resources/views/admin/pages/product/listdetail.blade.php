@if(!empty($data))
	@foreach($data as $value)
		<div class="form-group col-md-6">
		    <div class="col-md-5">
		    	{{ Form::label($value->Field, $value->Label) }}
		    </div>
		    <div class="col-md-7">
		    	{{ Form::text($value->Field,'',['class'=>'form-control']) }}
		    </div>
		</div>
	@endforeach
@else
	<p class="col-md-12" style="padding:20px;"> Không có dữ liệu để nhập! </p>
@endif