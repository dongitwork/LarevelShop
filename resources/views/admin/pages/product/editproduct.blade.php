@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Sửa sản phẩm</h4>
	</div>
		<div class="container1">
		<div class="col-md-12">
			<div class="form-main">
<?php
	$product = $dataEdit->product;
	$product_publish = $dataEdit->product_publish;
	if (isset($dataEdit->product_detail)) {
		$product_detail = $dataEdit->product_detail; 
	}else{
		$product_detail = (object) array();
	}

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

	//print_r($dataEdit);die();

?>
				{{Form::open(['method' => 'post','files' => true])}}
					<div class="col-md-12 nd">
						<ul class="nav nav-tabs" role="tablist" style=" margin-bottom: 20px; ">
						    <li role="presentation" class="active">
						    	<a href="#MainProduct" aria-controls="MainProduct" role="tab" data-toggle="tab">
						    		Sản Phẩm mới</a>
						    </li>
						    <li role="presentation">
						     	<a href="#Promotion" aria-controls="Promotion" role="tab" data-toggle="tab">Sản phẩm hiển thị</a>
						    </li>
						</ul>
						<div class="tab-content">
					    	<div role="tabpanel" class="tab-pane active" id="MainProduct">
					    		<div class="col-md-12">
					    			<div class="col-md-8">
						    			<div class="form-group ">
										    {{ Form::label('ProductName', 'Tên sản phẩm') }}
										    {{ Form::text('ProductName',$product->ProductName,['class'=>'form-control']) }}

										</div>
										<div class="form-group">
											{{ Form::label('Description', 'Chi tiết sản phẩm') }}
											{{ Form::textarea('Description',$product->Description,['class'=>'form-control']) }}
											<script type="text/javascript">CKEDITOR.replace('Description'); </script>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											{{ Form::label('CategoryId', 'Loại sản phẩm') }}
											{{ Form::select('CategoryId',$dataEdit->listcate,$product->CategoryId,['disabled' => 'disabled', 'class' => 'form-select form-category'] ) }}
										</div>
										<div class="form-group">
											{{ Form::label('ManufacturerId', 'Nhà sản xuất') }}
											{{ Form::select('ManufacturerId',$dataEdit->listmanu,$product->ManufacturerId,['class' => 'form-select required']) }}
										</div>

										<div class="form-group">
											{{ Form::label('TaxId', 'Thuế') }}
											{{Form::select('TaxId',$dataEdit->listtax,$product->TaxId,['class' => 'form-select required'] )}}
										</div>

										<div class="form-group">
											{{ Form::label('Image', 'Hình ảnh minh họa') }}
											<div class="col-md-12">
												@if(!empty($product->Image))
							          				{!! Html::image('/images/product/'.$product->Image ,'', ['width' => '80','class'=>"image"] ) !!}
							          				Hình hiện tại
							          			@endif
											</div>
											{{ Form::file('Image') }}
										</div>

										<div class="form-group">
											{{ Form::label('DeviceAttached', 'Hộp sp gồm') }}
											{{ Form::text('DeviceAttached',$product->DeviceAttached,['class'=>'form-text']) }}
										</div>

										<div class="form-group">
											{{ Form::label('Price', 'Giá nhập (VNĐ)') }}
											{{Form::text('Price',$product->Price,['class'=>'form-text','min'=>0])}}
										</div>

										<div class="form-group">
											{{ Form::label('Quantity', 'Số Lượng') }}
											{{Form::number('Quantity',$product->Quantity,['class'=>'form-text','min'=>0])}}
										</div>

										<div class="form-group">
											{{ Form::label('ShortDescription', 'Mô tả ngắn') }}
											{{ Form::textarea('ShortDescription',$product->ShortDescription,['class'=>'form-control txt','placeholder'=>'Nhập mô tả ngắn']) }}
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
							    			<fieldset>
												<legend style="font-size: 15px; font-weight: bold;">Thông số kỹ thuật</legend>
												<div class="list-product-option">
								    				@if(!empty($dataEdit->detail))
													@foreach($dataEdit->detail as $value)
														<div class="col-md-6">
															<div class="form-group row">
															    <div class="col-md-5">
															    	{{ Form::label($value->Field, $value->Label) }}
															    </div>
															    <div class="col-md-7">
															    	<?php $var = $value->Field; ?>
															    	{{ Form::text($value->Field,(isset($product_detail->$var))?$product_detail->$var:'',['class'=>'form-control']) }}
															    </div>
															</div>
														</div>
													@endforeach
													@else
														<p> Không có dữ liệu để nhập! </p>
													@endif
								    			</div>
											</fieldset>
										</div>
									</div>
								</div>
				    		</div>
							<div role="tabpanel" class="tab-pane" id="Promotion">
					    		@if(!empty($product_publish))
					    			<div class="col-md-12 nd">
										<div class="col-md-8">
							    			<div class="col-md-12 row mg-bt">
							    				<div class="col-md-12">
													{{ Form::checkbox('PublishDel', 1 , false) }}
													{{ Form::label('PublishDel', 'Xóa Sản Phẩm Hiển Thị') }}
							    				</div>
							    				<div class="col-md-5 row">
													{{ Form::label('Status', 'Trạng thái') }}
												</div>
												<div class="col-md-7 row">
													{{Form::select('Status',[1=>'Hiển thị',0=>'Không hiển thị'],$product_publish->Status,['class' => 'form-control'] )}}
												</div>
							    			</div>
											
											<div class="col-md-12 row mg-bt">
												<div class="col-md-5 row">
													{{ Form::label('ProfitPercent', 'Lợi nhuận (%)') }}
												</div>
												<div class="col-md-7 row">
													{{ Form::text('ProfitPercent',$product_publish->ProfitPercent,['class'=>'form-control']) }}
												</div>
											</div>
											<div class="col-md-12 row mg-bt">
												<div class="col-md-5 row">
													{{ Form::label('Sticky', 'Đưa Lên trang chủ') }}
												</div>
												<div class="col-md-7 row">
													{{ Form::checkbox('Sticky', 1 , $product_publish->Sticky) }}
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<div class="AttachImage" style="display: none;"></div>
												{{ Form::label('AdsImage', 'Hình ảnh minh họa') }}
												<div class="col-md-12">
													@if(!empty($product_publish->AdsImage))
								          				{!! Html::image('/images/product/'.$product_publish->AdsImage ,'', ['width' => '80','class'=>"image"] ) !!}
								          				Hình hiện tại
								          			@endif
												</div>
												{{ Form::file('AdsImage',['class'=>'Image']) }}
											</div>
										</div>
										
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
									</div>
					    		@else
									<div class="col-md-12 nd" style="margin-bottom: 100px;">
										<a class="btn btn-info" href="{{ URL::route('product.getAddProductPublish') }}?ProcutId={{$product->ProductId}} "> Thêm vào sản phẩm hiển thị </a>
									</div>
					    		@endif	
							</div>
					  	</div>
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