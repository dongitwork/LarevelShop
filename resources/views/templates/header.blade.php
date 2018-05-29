<div class="header-center">
    <div class="row">
        <div class="col-md-2 logo">
            <a class="navbar-brand" href="/">ShopOnline</a>

        </div>
        <div class="col-md-9">
            <nav class="navbar navbar-inverse">
                    <!-- Nav -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        
                    </div>
                    <!-- Nav collapse -->
                    <div class="collapse navbar-collapse menu-main" id="menu">
                        <ul class="nav navbar-nav nav-main">
                            <li>
                                <a href="{{URL::to('/')}}"><span class="glyphicon glyphicon-home"></span>Trang Chủ</a>
                            </li>
                            
                            @if(!empty($DataTopMenu))
                               @foreach($DataTopMenu as $key => $link)
                                    <li>
                                        <a href="{{ URL::route('category.getShow',$key) }}">
                                            <span class="glyphicon ti {{ $link['CategoryIcon'] }}"> </span>{{ $link['CategoryName'] }}</a>
                                    </li>
                               @endforeach
                            @endif 
                            <li>
                                <a  href="{{ URL::route('promotion.getPromotion') }}"><span class="glyphicon glyphicon-gift"></span>Khuyến Mãi</a>
                            </li>
                            <li>
                                <a  href="{{URL::to('/contact')}}"><span class="glyphicon glyphicon-envelope"></span>Liên Hệ</a>
                            </li>
                        </ul>
             
                    </div>
                    <!-- /.navbar-collapse -->
            </nav>
        </div>
        <?php
            $totalPurchased = 0;
            if(session()->has('Product')){
                foreach(session()->get('Product') as $item){
                    $totalPurchased = $totalPurchased + $item['QuantityPurchased'];
                }
            }
        ?>
        <div class="col-md-1">
            <a href="{{URL::to('/cart')}}">
                <img src="/img/shopping-cart.png" width="75" height="59">
                <b class="cart">Giỏ hàng({{$totalPurchased}})</b>
            </a>
        </div>
    </div>
    <!-- /Navigation -->
    
</div>