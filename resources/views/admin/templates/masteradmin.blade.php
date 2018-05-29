<!DOCTYPE html>
<html>
    <head> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administrator Cpanel ShopOnline - Quản trị hệ thống</title>        
       <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/respon.css') }}">
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
        <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('css/colorbox.css') }}">
        <script src="{{ asset('js/jquery-main.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery.colorbox-min.js') }}"></script>
        <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
        <link rel="shortcut icon" href="{{ asset('img/icon-cpanel.gif') }}">
      <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> -->
        <script  src="{{ asset('library/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
        <script  src="{{ asset('js/admin-js.js') }}" type="text/javascript"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="header">
                <div class="top">
                    <div class="col-md-4">
                        <img src="{{ asset('img/logo-admin.png') }}" alt="AdminCpanel">
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <div class="col-md-3 col-md-offset-2">
                            <img class="user" src="{{ asset('img/user.jpg') }}">
                        </div>
                        <div class="col-md-5 mg hello" style=" margin: 18px; ">
                            <span>Xin chào!</span></br>
                            <p>{{Auth::guard('admin')->user()->UserName}} <span class="hic "></span></p>
                                <a href="{!! URL::route('user.logout') !!}"><b style=" color: #fff; cursor: pointer; margin-top: -6px; display: block; ">Thoát</b></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom">
                </div>
            </div>
            <div class="content row">
                <div class="content-left col-md-2 mg">
                    <div class="left-bar " style="overflow: hidden;" tabindex="0">
                        <!-- admin-logo -->
                        <ul id="mainMenu" class="list-unstyled menu-parent">
                            <li class="current">
                                <a class="current waves-effect waves-light" href="/admin/cpanel">
                                    <i class="icon ti-home"></i>
                                    <span class="text ">Tổng quan</span>
                                </a>
                            </li>
                            <li class="submenu">
                                <a href="#layouts" class="waves-effect waves-light">
                                    <i class="icon ti-write"></i>
                                    <span class="text">Tin Tức</span>
                                    <i class="chevron ti-angle-right"></i>
                                </a>
                                <ul class="list-unstyled" style="display: none;">
                                    <li><a href="{{ URL::route('posts.getAdd') }}">Thêm mới</a></li>
                                    <li><a href="{{ URL::route('posts.list') }}">Danh sách tin tức</a></li>
                                    <li><a href="{{ URL::route('post.listcate') }}">Danh mục tin tức</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#layouts" class="waves-effect waves-light">
                                    <i class="icon ti-layout"></i>
                                    <span class="text">Sản phẩm</span>
                                    <i class="chevron ti-angle-right"></i>
                                </a>
                                <ul class="list-unstyled" style="display: none;">
                                    <li><a href="{{URL::to('/admin/product/add')}}">Sản phẩm nhập về</a></li>
                                    <li><a href="{{URL::to('/admin/product/add-productpublish')}}">Nhập sản phẩm hiển thị</a></li>
                                    <li><a href="{{URL::to('/admin/product/list')}}">Danh sách sản phẩm</a></li>
                                    <li><a href="{{URL::to('/admin/product/list_promotion')}}">Sản phẩm khuyến mãi</a></li>
                                    <li><a href="{{ URL::route('Slider.List') }}">Product Slider</a></li>
                                    <li><a href="{{URL::to('/admin/pro-option/list')}}">Thuộc tính sản phẩm</a></li>
                                </ul>
                            </li>
                             <li class="submenu">
                                <a href="#layouts" class="waves-effect waves-light">
                                    <i class="icon ti-gift"></i>
                                    <span class="text">Khuyến Mãi</span>
                                    <i class="chevron ti-angle-right"></i>
                                </a>
                                <ul class="list-unstyled" style="display: none;">
                                    <li><a href="{{URL::to('/admin/gift/list-gift')}}">Khuyến mãi quà tặng</a></li>
                                    <li><a href="{{URL::to('/admin/discount/list-discount')}}">Khuyến mãi giảm giá</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#layouts" class="waves-effect waves-light">
                                    <i class="icon ti-archive"></i>
                                    <span class="text">Loại sản phẩm</span>
                                    <i class="chevron ti-angle-right"></i>
                                </a>
                                <ul id="tables" class="list-unstyled" style="display: none;">
                                    <li><a href="{{URL::to('/admin/cate/add_cate')}}">Thêm mới</a></li>
                                    <li><a href="{{URL::to('/admin/cate/list_cate')}}">Danh sách</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#layouts" class="waves-effect waves-light">
                                    <i class="icon ti-anchor"></i>
                                    <span class="text">Nhà sản xuất</span>
                                    <i class="chevron ti-angle-right"></i>
                                </a>
                                <ul id="tables" class="list-unstyled" style="display: none;">
                                    <li><a href="{{URL::to('/admin/manuf/add_manufacturer')}}">Thêm mới</a></li>
                                    <li><a href="{{URL::to('/admin/manuf/list_manufacturer')}}">Danh sách</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#layouts" class="waves-effect waves-light">
                                    <i class="icon ti-shield"></i>
                                    <span class="text">Thuế</span>
                                    <i class="chevron ti-angle-right"></i>
                                </a>
                                <ul id="tables" class="list-unstyled" style="display: none;">
                                    <li><a href="{{URL::to('/admin/tax/add_tax')}}">Thêm mới</a></li>
                                    <li><a href="{{URL::to('/admin/tax/list_tax')}}">Danh sách</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#layouts" class="waves-effect waves-light">
                                    <i class="icon ti-comments"></i>
                                    <span class="text">Bình luận</span>
                                    <i class="chevron ti-angle-right"></i>
                                </a>
                                <ul id="tables" class="list-unstyled" style="display: none;">
                                    <li><a href="{{URL::to('/admin/comment/list_comment')}}">Danh sách</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#layouts" class="waves-effect waves-light">
                                    <i class="icon ti-email"></i>
                                    <span class="text">Liên hệ</span>
                                    <i class="chevron ti-angle-right"></i>
                                </a>
                                <ul id="tables" class="list-unstyled" style="display: none;">
                                    <li><a href="{{URL::to('/admin/contact/list_contact')}}">Danh sách</a></li>
                                </ul>
                            </li>
                            {{-- thêm nhóm người dùng--}}
                            <li class="submenu">
                                <a href="#tables" class="waves-effect waves-light">
                                    <i class="glyphicon glyphicon-list-alt"></i>
                                    <span class="text">Nhóm người dùng</span>
                                    <i class="chevron ti-angle-right"></i>
                                </a>
                                <ul id="tables" class="list-unstyled" style="display: none;">
                                    <li><a href="{{URL::to('/admin/role/add_role')}}">Thêm mới</a></li>
                                    <li><a href="{{URL::to('/admin/role/list_role')}}">Danh sách</a></li>
                                    <li><a href="{{URL::to('/admin/role/manager_role_permision')}}">Quản lý quyền</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#piluku_utility" class="waves-effect waves-light">
                                    <i class="icon ti-truck"></i>
                                    <span class="text">Đơn hàng</span>
                                    <i class="chevron ti-angle-right"></i>
                                </a>
                                <ul id="piluku_utility" class="list-unstyled" style="display: none;">
                                    <li><a href="{{URL::to('/admin/order/list_order')}}">Danh sách đơn hàng</a></li></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#piluku_utility" class="waves-effect waves-light">
                                    <i class="icon ti-bell"></i>
                                    <span class="text">Trạng thái đơn hàng</span>
                                    <i class="chevron ti-angle-right"></i>
                                </a>
                                <ul id="piluku_utility" class="list-unstyled" style="display: none;">
                                    <li><a href="{{URL::to('/admin/status/add_status')}}">Thêm mới trạng thái</a></li>
                                    <li><a href="{{URL::to('/admin/status/list_status')}}">Danh sách trạng thái</a></li>

                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#tables" class="waves-effect waves-light">
                                    <i class="icon ti-user"></i>
                                    <span class="text">Nhân viên</span>
                                    <i class="chevron ti-angle-right"></i>
                                </a>
                                <ul id="tables" class="list-unstyled" style="display: none;">
                                    <li><a href="{{URL::to('/admin/user/add_user')}}">Thêm mới</a></li>
                                    <li><a href="{{URL::to('/admin/user/list_user')}}">Danh sách nhân viên quản trị</a></li>
                                    <li><a href="{{URL::to('/admin/shipper/list')}}">Nhân viên giao hàng</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="content-right col-md-10">
                
                    <!-- chỗ đặt flash message -->
                    @if(Session::has('flash_message'))
                        <div align="center" class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @elseif(Session::has('flash_message_warning'))
                        <div align="center" class="alert alert-warning">
                            {{ Session::get('flash_message_warning') }}
                        </div>
                    @elseif(Session::has('flash_message_danger'))
                        <div align="center" class="alert alert-danger">
                            {{ Session::get('flash_message_danger') }}
                        </div>
                    @endif

                    @yield('contentadmin')
                </div>
            </div>
            <div class="footer">
            </div>
        </div>
    <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/jquery.accordion.js') }}"></script>
    <script src="{{ asset('js/core.js') }}"></script>
        <script src="{{ asset('js/my_script.js') }}"></script>
    </body>
</html>