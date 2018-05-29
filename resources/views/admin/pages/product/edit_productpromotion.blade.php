@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Sửa sản phẩm khuyến mãi</h4>
	</div>
		<div class="container1">
			<div class="col-md-12">
				<div class="form-main">	
<?php
	$product_publish = $dataEdit->product_publish;

	if (isset($dataEdit->discount)) {
		$discount = $dataEdit->discount;
	}else{
		$discount = '';
	}
	if (isset($dataEdit->gift)) {
		$gift = $dataEdit->gift;
	}else{
		$gift = '';
	}

?>
				{{Form::open(['method' => 'post','files' => true])}}	
					<div class="col-md-12 row ht">
						<fieldset>
							<legend>Hình thức khuyến mãi</legend>
							@if(!empty($gift))
							<div class="col-md-5">
								<h4>Quà Tặng</h4>
								<div class="form-group">
									{{ Form::checkbox('GiftDel', 1 , false) }}
									{{ Form::label('Status', 'Xóa quà tặng') }}
								</div>	
								<div class="form-group">
									{{ Form::label('GiftId', 'Chọn Quà Tặng') }}
									{{ Form::select('GiftId',$dataEdit->giftlists,$gift->GiftId,['class' => 'form-select']) }}
								</div>

								<div class="form-group">
									{{ Form::label('StartDate', 'Ngày bắt đầu') }}
									{{Form::date('GiftStartDate',$gift->StartDate,['class' => 'form-control', 'type'=>'datetime-local'])}}
								</div>

								<div class="form-group">
									{{ Form::label('EndDate', 'Ngày kết thúc') }}
									{{Form::date('GiftEndDate',$gift->EndDate,['class' => 'form-control'])}}
								</div>
							</div>
							@else
					    		<div class="col-md-5">
									<h4>Quà Tặng</h4>
									<div class="form-group">
										{{ Form::checkbox('GiftStatus', 1 , false,['class'=>'checkpromotion','types' => 'gift']) }}
										{{ Form::label('Status', 'Có quà tặng') }}
									</div>	
					    			<div class="gift_wp" style="display: none;"></div>
					    		</div>
							@endif

							@if(!empty($discount))
								<div class="col-md-5 col-md-offet-1">
					    			<h4>Giảm giá</h4>
					    			<div class="form-group">
										{{ Form::checkbox('DiscounDel', 1 , false) }}
										{{ Form::label('Status', 'Xóa giảm giá') }}
									</div>	
									<div class="form-group">
										{{ Form::label('DiscountId', 'Giảm giá') }}
										{{ Form::select('DiscountId',$dataEdit->discountlists,$discount->DiscountId,['class' => 'form-select']) }}
									</div>

									<div class="form-group">
										{{ Form::label('StartDate', 'Ngày bắt đầu') }}
										{{Form::date('DisStartDate',$discount->StartDate,['class' => 'form-control'])}}
									</div>

									<div class="form-group">
										{{ Form::label('EndDate', 'Ngày kết thúc') }}
										{{Form::date('DisEndDate',$discount->EndDate,['class' => 'form-control'])}}
									</div>
								</div>
							@else
					    		<div class="col-md-5 col-md-offet-1">
					    			<h4>Giảm giá</h4>
					    			<div class="form-group">
										{{ Form::checkbox('DisStatus', 1 , false,['class'=>'checkpromotion','types' => 'discount']) }}
										{{ Form::label('Status', 'Có giảm giá') }}
									</div>	
					    			<div class="discount_wp" style="display: none;"></div>
									
					    		</div>
							@endif
							
						</fieldset>
					</div>
					<div class="form-group col-md-12">
						{{ Form::submit('Cập Nhật',['class'=>'btn btn-warning']) }}
					</div>
				{{ Form::close() }}
				</div>
			</div>
		</div>
</div>
@stop