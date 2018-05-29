@extends('templates.master')
@section('content')
	<div class="container">
	<div class="clear">
		<div class="breadcrumb-main">
			<ol class="breadcrumb">
			  <li><a href="#">Trang Chủ</a></li>
			  <li class="active">Kết quả tìm kiếm: {{$sea}}</li>
			</ol>
		</div>
	</div>
 

	<div class="row">
		@if(count($Product) > 0) <!-- đếm các phần tử trong mảng  -->
        @foreach($Product as $key => $Value)
        <?php
              $selPrice ='';
              $price = $Value->Price;
              $ProfitPercent = $Value->ProfitPercent;
              $tax = $Value->taxPercent;
              $selPrice = $price + ($price*((config('TaxVat')/100)+($tax/100))); 
              if (!empty($Value->disPercent)) {
                $selPrice  = $selPrice - ($selPrice*($Value->disPercent/100));
              }
              $selPrice = $selPrice + ($price*($ProfitPercent/100));
              $selPrice = number_format(round($selPrice),0, '.', '.');
        ?>
			<div class="col-md-4 sp-phone-list thumbnail">
              <div class="row1">
                @if(!empty($Value->disPercent))
                    <div class="hth">
                    <span>{{ $Value->disPercent }}%</span>
                    </div>
                @elseif(!empty($Value->GiftName))
                    <div class="hth">
                    <span class="glyphicon glyphicon-gift"></span>
                    </div>
                @else
                    <div class="hth" style="display:none;">
                    </div>
                @endif
                <figure>
                      @if(!empty($Value->AdsImage))
                        {!! Html::image('/images/product/'.$Value->AdsImage ,'', ['class'=>"img-responsive"] ) !!}
                      @endif
                    <figcaption class="text-center">
                        <h3>{{ $Value->ProductName }}</h3>
                        <div class="p-promotion">
                          @if($Value->GiftName)
                            <div class="col-md-12">
                              <p class="glyphicon glyphicon-gift"> Tặng  
                                {{ $Value->GiftName}}
                              </p>
                            </div>
                          @endif

                          @if($Value->disPercent)
                            <div class="col-md-12">
                              <p class="glyphicon glyphicon-hand-right"> Giảm ngay {{ $Value->disPercent }}%</p>
                            </div>
                          @endif
                        </div>
                        <p><a class="btn btn-info mg-20" href="{{ URL::route('product.getShow',$Value->ProductId) }}">Xem ngay</a></p>
                    </figcaption>
                </figure>
                <div class="description clear pull-left">
                    <p><span class="name"><a href="{{ URL::route('product.getShow',$Value->ProductId) }}">{{ $Value->ProductName }}</a></span></p>
                    <p><span class="price">{{ (!empty($selPrice))?$selPrice:0 }} VNĐ</span></p>
                </div>
              </div>
          </div>
        @endforeach
        @else
          <div class="col-md-12">
            Không tìm thấy sản phẩm với từ khóa <b>{{$sea}}</b>!
          </div>
        @endif
		</div>
	</div>
@stop