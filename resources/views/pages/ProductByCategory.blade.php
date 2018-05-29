@extends('templates.master')
@section('content')

<div class="container-phone">
	<div class="clear">
		<div class="breadcrumb-main">
			<ol class="breadcrumb">
			  <li><a href="#">Trang Chủ</a></li>
			  <li class="active"> {{ $Category->CategoryName }} </li>
			</ol>
		</div>
	</div>
	<div class="dien-thoai-menu drop">
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
	</div>
    
  <div class="sp-phone">

      @if(count($Product) > 0 )
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
          <div class="col-md-4 sp-phone-list thumbnail">
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

	<div class="container">
    <div class="row clear center">
      {{ $Product->render() }}
    </div>
  </div>
</div>

@stop