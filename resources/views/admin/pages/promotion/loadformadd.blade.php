@if ($Type == 'gift') 
	<div class="form-group">
		{{ Form::label('GiftId', 'Chọn Quà Tặng') }}
		{{ Form::select('GiftId',$Promotion,'',['class' => 'form-select']) }}
	</div>

	<div class="form-group">
		{{ Form::label('StartDate', 'Ngày bắt đầu') }}
		{{Form::date('GiftStartDate','',['class' => 'form-control', 'type'=>'datetime-local'])}}
	</div>

	<div class="form-group">
		{{ Form::label('EndDate', 'Ngày kết thúc') }}
		{{Form::date('GiftEndDate','',['class' => 'form-control'])}}
	</div>
@else 
	<div class="form-group">
		{{ Form::label('DiscountId', 'Giảm giá') }}
		{{ Form::select('DiscountId',$Promotion,'',['class' => 'form-select']) }}
	</div>

	<div class="form-group">
		{{ Form::label('StartDate', 'Ngày bắt đầu') }}
		{{Form::date('DisStartDate','',['class' => 'form-control'])}}
	</div>

	<div class="form-group">
		{{ Form::label('EndDate', 'Ngày kết thúc') }}
		{{Form::date('DisEndDate','',['class' => 'form-control'])}}
	</div>
@endif