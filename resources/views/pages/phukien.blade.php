@extends('templates.master')
@section('content')
<div class="container-phukien">
  <div class="clear">
    <div class="breadcrumb-main">
      <ol class="breadcrumb">
        <li><a href="/">Trang Chủ</a></li>
        <li class="active">Phụ Kiện</li>
      </ol>
    </div>
    <div class="col-md-1 col-md-offset-7">
      
    </div>
     <div class="phu-kien-menu drop">
      <div class="phukien-drop pull-right col-md-2">
        <?php 
          $datasoft = array(
                    0=>'Mặc Định',
                    'giaasc'=>'Giá tăng dần',
                    'giadesc'=>'Giá giảm dần',
                    'nameasc'=>'Theo tên từ A-Z',
                    'namedesc'=>'Theo tên từ Z-A'
                  );
        ?>
        {{ Form::select('sortby',$datasoft,(isset($_GET['sortby']))?$_GET['sortby']:0,[ 'class' => 'sortby'] ) }}
      </div>
    </div>
    <div class="sp-phukien">
        @if(count($Product) > 0)
          @foreach($Product as $key => $Value)
          <?php
              $selPrice ='';
              $price = $Value->Price;
              $ProfitPercent = $Value->ProfitPercent;
              $tax = $Value->Percent;
              $selPrice = $price + ($price*((config('TaxVat')/100)+($tax/100))); 

              if (!empty($Value->disPercent)) {
                $selPrice  = $selPrice - ($selPrice*($Value->disPercent/100));
              }

              $selPrice = $selPrice + ($selPrice*($ProfitPercent/100));
              $selPrice = number_format(round($selPrice),0, ',', ',');
          ?>
            <div class="col-md-2 thumbnaill">
              <div class="row">
                  <a href="{{ URL::route('product.getShow',$Value->ProductId) }}">
                  @if(!empty($Value->AdsImage))
                      {!! Html::image('/images/product/'.$Value->AdsImage ,'', ['class'=>"height-fixed"] ) !!}
                    @endif 
                  <p><span class="center-block text-center">{{ $Value->ProductName }}</span></p>
                  <p><span class="center-block text-center price">{{ (!empty($selPrice))?$selPrice:0 }} VNĐ</span></p>
                </a>
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
</div>
@stop