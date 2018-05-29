@extends('templates.master')
@section('content')
	<div class="container">
	<div class="clear">
		<div class="breadcrumb-main">
			<ol class="breadcrumb">
			  <li><a href="#">Trang Chủ</a></li>
			  <li class="active">Khuyến mãi</li>
			</ol>
		</div>
	</div>
  <div class="dien-thoai-menu drop">
    <div class="phu-kien-menu drop pull-right">
      <div class="phukien-drop  col-md-2">
        <?php 
          $datasoft = array(
            0 =>'Mặc Định',
            'disasc'=>'Giảm giá tăng dần',
            'disdesc'=>'Giảm giá giảm dần',
            'giaasc'=>'Giá tăng dần',
            'giadesc'=>'Giá giảm dần',
            'nameasc'=>'Theo tên từ A-Z',
            'namedesc'=>'Theo tên từ Z-A'
          );
        ?>
        {{ Form::select('sortby',$datasoft,(isset($_GET['sortby']))?$_GET['sortby']:0,[ 'class' => 'sortby'] ) }}
      </div>
    </div>
  </div>
	<div class="row">
		@if(count($Promotion) > 0 )
        @foreach($Promotion as $key => $Value)
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
                @else
                    <div class="hth">
                    <span class="glyphicon glyphicon-gift"></span>
                    </div>
                @endif
                <a class="" href="{{ URL::route('product.getShow',$Value->ProductId) }}">
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
                        <p><span class="btn btn-info">Xem ngay</span></p>
                    </figcaption>
                </figure>
                </a>
                <div class="description clear pull-left">
                    <p><span class="name"><a href="{{ URL::route('product.getShow',$Value->ProductId) }}">{{ $Value->ProductName }}</a></span></p>
                    <p><span class="price">{{ (!empty($selPrice))?$selPrice:0 }} VNĐ</span></p>
                </div>
              </div>
          </div>
        @endforeach
        @else
          <div class="col-md-12">
            Không có sản phẩm nào hiển thị!
          </div>
        @endif
		</div>
	</div>
@stop