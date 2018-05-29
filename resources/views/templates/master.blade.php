<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shoponline.com - Máy tính, điện thoại, linh kiện PC... Chính hãng</title>        
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <script src="{{ asset('js/hugemenu.class.js') }}"></script>
        <script src="{{ asset('js/jquery.hoverIntent.minified.js') }}"></script>
        <script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery.flexisel.js') }}"></script>
        <script src="{{ asset('js/cloud-zoom.1.0.2.js') }}"></script>
        <script src="{{ asset('js/jquery-main.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('css/cloud-zoom.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('css/respon.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="shortcut icon" href="{{{ asset('img/favicon.jpg') }}}">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
<!---font-->
      <link href='https://fonts.googleapis.com/css?family=Euphoria+Script' rel='stylesheet' type='text/css'>
    </head>
    <body>
    <!--facebook-->
        <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
    <!--facebook-->

        <div id="page" class='body'>
            <header id="header">
                 <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                
                            </div>
                            <div class="col-md-6" style=" margin-top: 15px; ">
                                <form action="/search" method="GET">
                                   <!--  {{Form::token()}} -->
                                    <div class="input-group">
                                        <input name="searchtext" type="text" class="form-control" placeholder="Nhập sản phẩm cần tìm" aria-describedby="basic-addon2">
                                        <span class="input-group-addon btn-info" id="basic-addon2">Tìm kiếm</span>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-3 float-right">
                                 @if(Auth::guard('customer')->check())
                                    <div class="col-md-2 col-md-offset-2">
                                       
                                    </div>
                                    <div class="col-md-8 hello">
                                        <span>Xin chào!</span></br>
                                        <p><a style="color:#157DD7" href="{{ URL::route('customer.getCustomerSetting') }}">{{Auth::guard('customer')->user()->CustomerFullName}} </a><span class="hic glyphicon glyphicon-chevron-down" style=" color: #949AA9;cursor: pointer; "></span></p>
                                        <div class="quick">
                                            <div class="quick-i">
                                                <h5>Cài đặt</h5>
                                                <ul class="user">
                                                    <li>
                                                        <a href="{{ URL::route('customer.getCustomerSetting') }}">Thông tin tài khoản</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ URL::route('customer.getOrderHistory') }}">Lịch sử đơn hàng</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ URL::route('customer.getChangedPass') }}">Đổi mật khẩu</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <a href="{!! URL::route('customer.logout') !!}"><span class="glyphicon glyphicon-log-in"> Thoát</span></a>
                                        </div>
                                    </div>
                                @else
                                    <a href="{{URL::route('customer.getLogin')}}" class="float-right btn navbar-btn">Đăng Nhập</a>
                                    <a href="{{URL::route('customer.getCreation')}}" class="float-right btn navbar-btn">Đăng Ký</a>
                                @endif
                                    
                            </div>
                        </div>
                        @include('templates.header')
                    </div>
                    
                </div>
               
            </header><!-- end header -->

            <!-- CHỖ ĐẶT FLASH MESSAGE-->
            @if(session()->has('flash_message'))
                <div align="center" class="alert alert-success">
                    {{ session()->get('flash_message') }}
                </div>
            @elseif(session()->has('flash_message_warning'))
                <div align="center" class="alert alert-warning">
                    {{session()->get('flash_message_warning')}}
                </div>
            @elseif(session()->has('flash_message_danger'))
                <div align="center" class="alert alert-danger">
                    {{session()->get('flash_message_danger')}}
                </div>
            @elseif(session()->has('flash_message_account_activated'))
                <div align="center" class="alert alert-info fade in">
                    {{session()->get('flash_message_account_activated')}}
                </div>
            @endif
            <!-- CHỖ ĐẶT FLASH MESSAGE-->
            
            <div id="main_content">
                <div class="container">
                    <div class="content  container-main">
                        @yield('content')
                    </div>
                </div>
            </div> <!-- end main conten  -->
            @include('templates.footer')
        </div>
        <script src="{{ asset('js/cloud-zoom.1.0.2.min.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/my_script.js') }}"></script>
    </body>
</html>
