@extends('templates.master')
@section('content')
<?php
  $selPrice ='';
  $price = $Product['product']->Price;
  $ProfitPercent = $Product['product']->ProfitPercent;
  $tax = $Product['product']->Percent;
  $selPrice = $price + ($price*((config('TaxVat')/100)+($tax/100)));  

  $listPrice = $selPrice;
  if (!empty($Product['discount'])) {
	  $listPrice  = $selPrice - ($selPrice*($Product['discount']->Percent/100)); 
  }
  $listPrice  = $listPrice + ($listPrice*($ProfitPercent/100));
  $PriceWithoutFormat = $listPrice;

  $selPrice = $selPrice + ($selPrice*($ProfitPercent/100));
  $savePrice = number_format(round($selPrice - $listPrice),0, ',', ',');
  $selPrice = number_format(round($selPrice),0, ',', ',');
  $listPrice = number_format(round($listPrice),0, ',', ',');
 
?>
<div class="container-phone">
	<div class="row">
		<div class="breadcrumb-main">
			<ol class="breadcrumb">
			  <li><a href="/">Trang Chủ</a></li>
			  <li><a href="{{ URL::route('category.getShow',$Product['product']->CategoryId) }}">{{ $Product['product']->CategoryName }}</a></li>
			  <li class="active">{{ $Product['product']->ProductName }}</li>
			</ol>
		</div>
	</div>
	<div class="detail-phone">
		<h3>{{ $Product['product']->ProductName }} </h3>
		<div class="groupdetail row">
			<div class="col-md-4 detail-phone-item">
			<div class="zoom-section">
				@if(!empty($Product['product']->Image))
				<div class="zoom-small-image">
					<a href="{{'/images/product/'.$Product['product']->Image}}" class='cloud-zoom' rel="position:'inside',showTitle:false,adjustX:-4,adjustY:-4">
						{!! Html::image('/images/product/'.$Product['product']->Image ,'', ['class'=>"image"] ) !!}
				 </a>
				</div>
				@endif
			</div><!--zoom-section end-->
				<!-- @if(!empty($Product['product']->Image))
					{!! Html::image('/images/product/'.$Product['product']->Image ,'', ['class'=>"image"] ) !!}
				 @endif -->
			</div>
			<div class="col-mg-4">
				<div class="col-md-5">
					@if(!empty($Product['discount']))
						<h3 class="price1">{{ $selPrice }} VNĐ</h3>
					@endif
					{!! (!empty($listPrice))?'<p><h3 class="price">'.$listPrice.' VNĐ</h3><span style=" font-size: 12px; ">(Đã bao gồm thuế)</span></p>':'' !!}
					<div class="col-md-12 row">
						{!! (!empty($Product['gift']))?'<p class="gift glyphicon glyphicon-gift"></p> Quà tặng: <a>'.$Product['gift']->GiftName.'</a>':'' !!}
					</div>
					<?php
					if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
							$uri = 'https://';
						} else {
							$uri = 'http://';
						}
					$uri .= $_SERVER['HTTP_HOST'];
					?>
					<div class="row">
						<div class="oloo col-md-12">
							<div class="dtv2-social">
								<div class="icon-sc">
									<div class="fb-share-button ll" data-href="{{$uri}}/product/view/{{$Product['product']->ProductId}}" data-type="button_count">
									</div>
									<div id="fb-root">
									</div>
									<div class="fshop-ulgg ll">
										<div class="g-plusone" data-href="{{$uri}}/product/view/{{$Product['product']->ProductId}}">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 reques row">
						<ul>
							<li>
								<p>Hộp sản phẩm bao gồm: <a >{{ $Product['product']->DeviceAttached }}</a></p>
							</li>
							<li>
								<p>Giao hàng tận nơi miễn phí tại quận Hải Châu - Đà Nẵng.</p>
							</li>
							<li>
								<p>1 đổi 1 trong 1 tháng đối với lỗi kỹ thuật</p>
							</li>
						</ul>
					</div>
					<div class="buy">
						{{Form::open()}}
						<button type="submit" class="muangay" name="buy_now" value="BuyNow">
							<input type="hidden" name="ProductId" value="{{$Product['product']->ProductId}}">
							<input type="hidden" name="ProductPublishId" value="{{$Product['product']->ProductPublishId}}">
							<input type="hidden" name="Price" value="{{$listPrice}}">
							<input type="hidden" name="PriceWithoutFormat" value="{{$PriceWithoutFormat}}">
							<input type="hidden" name="ProductName" value="{{$Product['product']->ProductName}}">
							<input type="hidden" name="Quantity" value="{{$Product['product']->Quantity}}">
							<input type="hidden" name="Image" value="{{$Product['product']->Image}}">
							<input type="hidden" name="QuantityPurchased" value="1">
							MUA NGAY
						</button>
						{{Form::close()}}
					</div>

				</div>
			</div>
			<div class="col-md-3">

			@if(!empty($Product['discount']))
			<div class="row">
				<div class="col-md-12  dis-col ">
					<h6 class="dis">Giảm {{ $Product['discount']->Percent}}%</h6>
					<h5 class="price3">Tiết kiệm ngay <b>{{ $savePrice }} VNĐ</b></h5>
					<p class="date-pr">(Từ ngày {!!date('d-m-Y',strtotime($Product['discount']->StartDate))!!}</p>
					<p class="date-pr">đến ngày {!!date('d-m-Y',strtotime($Product['discount']->EndDate))!!})</p>
				</div>
			</div>
			@endif
				<div class="row">
					<div class="datmua col-md-12">
						<p class="sp-giao"><i class="ti-check" style=" color: #011003; font-weight: bold; "></i>Sản phẩm sẽ được giao trong vòng 3-5 ngày làm việc</p>
						<p class="tv">Tư vấn mua hàng Online: <b>0987.503.992</b></p>
					</div>
				</div>
			</div>
		</div>
		<div class="description-phone row clear">
			<div class=" col-md-9  clearfix">
				<h4 class="text-center"></h4>
				<ul class="nav nav-tabs">
					<li class="active"><a href="#home" data-toggle="tab" aria-expanded="true">Thông số kỹ thuật <span class="glyphicon glyphicon-asterisk"></span></a></li>
					<li><a href="#info" data-toggle="tab">Bình luận - Đánh giá <span class="glyphicon glyphicon-pencil"></span></a></li>
					<li><a href="#contact" data-toggle="tab">Mô tả sản phẩm <span class="glyphicon glyphicon-info-sign"></span></a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="home">
						<div class="tab-thongso padding-tab">

							@if( isset($Product['product_detail']) && !empty($Product['detail']))
								@foreach($Product['detail'] as $key => $val)
								<?php
								$field = $val->Field;
									if (!empty($Product['product_detail']->$field)) {
										$value = $Product['product_detail']->$field;
									}else{
										$value = '<span>Đang cập nhập</span>';
									}
								 ?>
									{!! '<div class="row">
											<div class="col-md-5 col" style="font-weight: bold;">'.$val->Label.': </div>

											<div class="col-md-7 col">
											'.$value.'
											</div>
										</div>' !!}
								@endforeach
							@else
							<p>Thông tin đang cập nhập!</p>
							@endif
						</div>
					</div>
{{--****************************************** COMMENT AREA ******************************************--}}
					<div class="tab-pane" id="info">
						<div class="padding-tab">
							@if($Product['comment'] != null)
								@foreach($Product['comment'] as $item)
									<div class="col-md-12">
										<div class="col-md-2"><img src="{{$item->Image}}" class="img-thumbnail" alt="Cinque Terre" width="75" height="75"></div>
										<div class="col-md-10">
											<b style="color: darkgreen">{{$item->CustomerFullName}}</b>
											<p>{{$item->Content}}</p>
										</div>
									</div>
									@if($item->ReplyContent != null)
									<div class="col-md-12">
										<div class="col-md-9 col-md-offset-3">
											<div class="col-md-2"><img src="{{$item->UserImage}}" class="img-thumbnail" alt="Cinque Terre" width="75" height="75"></div>
											<div class="col-md-10">
												<b style="color: darkred">{{$item->UserName}}</b><span style="color: #ff9900; margin-left: 20px" class="badge">{{$item->RoleName}}</span>
												{!!$item->ReplyContent!!}
											</div>
										</div>
									</div>
									@endif
								@endforeach
								@if(auth()->guard('customer')->check())
									<form method="post">
										{{csrf_field()}}
										<div class="col-md-12">
											<div class="col-md-2"><img src="{{auth()->guard('customer')->user()->Image}}" class="img-thumbnail" alt="Cinque Terre" width="150" height="150"></div>
											<div class="form-group col-md-10">
												<textarea name="comment" class="form-control" rows="5" placeholder="Viết bình luận của bạn"></textarea>
											</div>
										</div>
										<input type="hidden" name="ProductPublishId" value="{{$Product['product']->ProductPublishId}}">
										<button name="button_comment" value="ButtonComment" type="submit" class="btn btn-danger" style="margin-left: 673px">Gởi bình luận</button>
									</form>
								@else
									<p>Bạn hãy <a href="{{route('customer.getLogin')}}">đăng nhập</a> để bình luận ngay!</p>
								@endif
							@else
								@if(auth()->guard('customer')->check())
									<p>Chưa có bình luận cho sản phẩm này. Hãy bình luận ngay!</p>
									<form method="post">
										{{csrf_field()}}
										<div class="col-md-12">
											<div class="col-md-2"><img src="{{auth()->guard('customer')->user()->Image}}" class="img-thumbnail" alt="Cinque Terre" width="200" height="200"></div>
											<div class="form-group col-md-10">
												<textarea name="comment" class="form-control" rows="5" placeholder="Viết bình luận của bạn"></textarea>
											</div>
										</div>
										<input type="hidden" name="ProductPublishId" value="{{$Product['product']->ProductPublishId}}">
										<button name="button_comment" value="ButtonComment" type="submit" class="btn btn-danger" style="margin-left: 673px">Gởi bình luận</button>
									</form>
								@else
									<p>Chưa có bình luận cho sản phẩm này. Bạn hãy <a href="{{route('customer.getLogin')}}">đăng nhập</a> để bình luận ngay!</p>
								@endif
							@endif
						</div>
					</div>
{{--****************************************** COMMENT AREA ******************************************--}}
					<div class="tab-pane" id="contact">
						<div class="padding-tab">
							{!! $Product['product']->proDescription !!}
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<h4 class="text-center cth">Có thể bạn muốn xem</h4>
				<div class="product-mit">
				@if(!empty($Product['replace']))
					<ul class="row">
						@foreach($Product['replace']  as $key => $Value)
						<li class="col-md-12">
							<div class="imges-ll">
								@if(!empty($Value->AdsImage))
									<a href="{{ URL::route('product.getShow',$Value->ProductId) }}">{!! Html::image('/images/product/'.$Value->AdsImage,'', ['class'=>"img-responsive imgs"] ) !!}</a>
								 @endif
							</div>
							<div class="test-ll">
								<h4 class="mit">{{$Value->ProductName}}</h4>
						<?php
							  $selPrice ='';
							  $price = $Value->Price;
							  $ProfitPercent = $Value->ProfitPercent;
							  $tax = $Value->taxPercent;
							  $selPrice = $price + ($price*((config('TaxVat')/100)+($tax/100)));
							  if (!empty($Value->disPercent)) {
								$selPrice  = $selPrice - ($selPrice*($Value->disPercent/100));
							  }
							  $selPrice = $selPrice + ($selPrice*($ProfitPercent/100));
							  $selPrice = number_format(round($selPrice),0, ',', ',');
						?>
								<b>{{ (!empty($selPrice))?$selPrice:0 }} VNĐ</b>
							</div>
						</li>
						@endforeach
					</ul>
				@endif
				</div>
			</div>
		</div>
	</div>
</div>
@stop