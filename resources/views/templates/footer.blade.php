  <div class="end-content">
  </div>           
<footer id="footer" class="padding-10">
  <div class="container">
      <div class="row">
      @foreach($DataFooter as $key => $value)
        <div class="col-md-3">
          <h4 class="menu"> {{$value['PostCategoryName']}} </h4>
          <ul class="list-unstyled">
            @if(!empty($value['post']))
              @foreach($value['post'] as $link)
                <li><a href="{{ URL::route('post.postDetail', $link->PostId)}}"> {{$link->Title}} </a></li>
              @endforeach
            @endif
          </ul>
        </div>
      @endforeach

        <div class="col-md-3">
          <h4 class="menu">Giới thiệu</h4>
          <p>ShopOnline chuyên cung cấp điện thoại, Tablet, PC, Desktop, linh kiện điện tử các loại.</p>
          <ul class="list-unstyled">
            <li><a>Email: lyna310@gmail.com</a></li>
            <li><a>Phone: 0987503992</a></li>
            <li><a>Địa chỉ: 151 Hải Sơn, Hải Châu, Đà Nẵng</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          
        </div>
      </div>
    <div class="thuong-hieu">
      <div class="container">
        <div class="row">
          <!-- <span>Bạn có thể thanh toán tại cửa hàng: <img src="{{ asset('img/thanh_toan.png') }}" style=" width: 230px; "></span> -->
        </div>
      </div>
    </div>
  </div>
</footer> <!-- end footer -->

  <div class="container cong-ty">
         <div class="row">
            <div class="col-md-12">
                <p>Copyright by Hoàng Ngọc Nhất Anh - Nguyễn Thị Ly Na</p>
                <p>Sản phẩm đồ án tốt nghiệp - Lớp CT12A1.1 - Ngành CNTT -Trường Đại học Đông Á- 2016</p>
            </div>
        </div>
    </div>