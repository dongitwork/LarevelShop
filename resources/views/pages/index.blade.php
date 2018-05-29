@extends('templates.master')
@section('content')
<div class="container1">         
    <div class="header-bottom">
        <div class="col-md-3">
            <div class="row white menu_left">
                <h4>Danh mục sản phẩm</h4>
                @if(!empty($DataMenuHome))
                  <ul  class="list-unstyled menu_vertical">
                    @foreach($DataMenuHome as $key => $link)
                      <li>
                      <a href="{{ URL::route('category.getShow',$key) }}">
                        <span class="glyphicon {{ $link['CategoryIcon'] }} "></span> {{ $link['CategoryName'] }} </a>
                          @if(!empty($link['Manufacturer']))
                            <div class="menu_submenu">
                                <h3 class="menu-title">Hãng sản xuất</h3>
                                <ul class="menu-list">
                                    @foreach($link['Manufacturer'] as $id => $linkChild)
                                      <li>
                                        <a  href="{{ URL::route('category.getShow',$key) }}?nxs={{$id}}"> {{ $linkChild }} </a>
                                      </li>
                                    @endforeach 
                                </ul>
                            </div>
                          @endif
                      </li>
                    @endforeach
                  </ul>
                @endif
                
                  
            </div>
        </div>
        <div class="col-md-9">
            <div id="Owl_Carosel1" class="owl-carousel ">
                    @foreach($Sliders as $Slider)
                    <div><a href="{{ URL::route('product.getShow',$Slider->ProductId) }}" >
                      @if(!empty($Slider->SliderImage))
                        {!! Html::image('/images/slider/'.$Slider->SliderImage ,'', ['class'=>"img-responsive"] ) !!}
                      @endif
                    </a></div>
                    @endforeach
            </div>

            <div id="Owl_Carosel2" class="owl-carousel ">
                    @foreach($Sliders as $Slider)
                    <div><h3 class="item"><span>{{ $Slider->Title }}</span></h3></div>
                    @endforeach
            </div>
        </div>
    </div>
</div>
  <div class="container1">
      <div class="product index">
   
        @if(!empty($Product))
            @foreach($Product as $key => $Value)
            <?php
              $selPrice ='';
              $price = $Value->Price;
              $ProfitPercent = $Value->ProfitPercent;
              $tax = $Value->Percent;
              $selPrice = $price + ($price*((config('TaxVat')/100)+($tax/100))); 
              
              $DisPercent = DB::table('product_discount')
                      ->select('Percent')
                      ->join('discount','discount.DiscountId','=','product_discount.DiscountId')
                      ->where('ProductPublishId','=',$Value->ProductPublishId)
                      ->select()->first();
              if (!empty($DisPercent)) {
                $selPrice  = $selPrice - ($selPrice*($DisPercent->Percent/100));
              }

              $selPrice = $selPrice + ($selPrice*($ProfitPercent/100));
              $selPrice = number_format(round($selPrice),0, ',', ',');
            ?>
              <div class="col-md-4 thumbnail">
                  <div class="row1">
                  <a class="" href="{{ URL::route('product.getShow',$Value->ProductId) }}">
                    <figure>
                          @if(!empty($Value->AdsImage))
                            {!! Html::image('/images/product/'.$Value->AdsImage ,'', ['class'=>"img-responsive"] ) !!}
                          @endif
                        <figcaption class="text-center">
                            <h3>{{ $Value->ProductName }}</h3>
                            <p>{{ strip_tags($Value->ShortDescription) }}</p>
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
  </div>
@stop