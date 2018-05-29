@extends('templates.master')
@section('content')
	<div class="row">
		<div class="news">
			<div class="col-md-3">
				<img src="{{ asset('img/news.jpg') }}" alt="tin mới">
			</div>
			<div class="col-md-9">
				<h3>Tin mới</h3>
				<div class="row">
					<div class="col-md-4">
						<img src="{{ asset('img/apple.jpg') }}" alt="tin mới">
					</div>
					<div class="col-md-8">
						<h5>Tin công nghệ</h5>
						<h4><a href="">Xu hướng công nghệ mới từ Apple</a></h4>
						<span>10/11/2015 - 3:20pm</span>
						<p>Apple đang dẫn đầu xu hướng công nghệ năm nay. Các công ty cổ phần di động lớn đang là đích ngắm của Apple trong thời gian tới.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="tintuc">
			<div class="col-md-6 news-nbb">
				<h3>Tin Nổi Bật</h3>
				<ul>
					<li>
						<div class="news-nb">
							<h4><a href="">Microsoft ngừng hỗ trợ Windows 8 từ ngày mai</a></h4>
							<span>10/11/2015 - 3:20pm</span>
							<div class="col-md-4">
								<img src="{{ asset('img/apple.jpg') }}" alt="tin mới">
							</div>
							<div class="col-md-8">
								<p>Đáng chú ý, những thông tin rò rỉ liên quan tới Galaxy S7 edge đều khác xa với tin đồn trước đây.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="news-nb">
							<h4><a href="">Facebook đang biến người dùng thành... lũ ngốc</a></h4>
							<span>10/11/2015 - 3:20pm</span>
							<div class="col-md-4">
								<img src="{{ asset('img/apple1.jpg') }}" alt="tin mới">
							</div>
							<div class="col-md-8">
								<p>Chi nhánh của Uber tại Trung Quốc vừa nhận được khoản vốn lớn từ các nhà đầu tư địa phương. Nhờ vậy, hãng chia sẻ xe trị giá hơn 60 tỷ USD này sẽ có thêm lợi thế trong cuộc chiến với Didi Kuaidi, đối thủ chính tại quốc gia đông dân nhất thế giới.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="news-nb">
							<h4><a href="">Nhà Trắng bắt đầu sử dụng Snapchat để hiểu hơn về giới trẻ</a></h4>
							<span>10/11/2015 - 3:20pm</span>
							<div class="col-md-4">
								<img src="{{ asset('img/apple2.jpg') }}" alt="tin mới">
							</div>
							<div class="col-md-8">
								<p>Theo các lập trình viên, Night Shift là tính năng đáng kể nhất có trên phiên bản iOS 9.3 beta.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="news-nb">
							<h4><a href="">Apple phủ nhận đang làm ứng dụng chuyển dữ liệu từ iOS sang Android</a></h4>
							<span>10/11/2015 - 3:20pm</span>
							<div class="col-md-4">
								<img src="{{ asset('img/apple3.png') }}" alt="tin mới">
							</div>
							<div class="col-md-8">
								<p>Apple đang dẫn đầu xu hướng công nghệ năm nay. Các công ty cổ phần di động lớn đang là đích ngắm của Apple trong thời gian tới.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="news-nb">
							<h4><a href="">Xiaomi tiếp tục khiến các nhà đầu tư lo ngại, giá trị thực có phải 46 tỷ USD?</a></h4>
							<span>10/11/2015 - 3:20pm</span>
							<div class="col-md-4">
								<img src="{{ asset('img/apple4.jpg') }}" alt="tin mới">
							</div>
							<div class="col-md-8">
								<p>Apple đang dẫn đầu xu hướng công nghệ năm nay. Các công ty cổ phần di động lớn đang là đích ngắm của Apple trong thời gian tới.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="news-nb">
							<h4><a href="">Nữ giám đốc Microsoft: Phụ nữ thành công, không thể cân bằng công việc và gia đình</a></h4>
							<span>10/11/2015 - 3:20pm</span>
							<div class="col-md-4">
								<img src="{{ asset('img/apple5.jpg') }}" alt="tin mới">
							</div>
							<div class="col-md-8">
								<p>Apple đang dẫn đầu xu hướng công nghệ năm nay. Các công ty cổ phần di động lớn đang là đích ngắm của Apple trong thời gian tới.</p>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="col-md-6">
				<div class="congnghe">
					<h3>Tin Công Nghệ</h3>
					<ul>
						<li>
							<div class="news-nb">
								<h4><a href="">Vừa bắt đầu năm 2016, một đại diện nữa của TMĐT Việt Nam đã bỏ cuộc chơi</a></h4>
								<span>10/11/2015 - 3:20pm</span>
								<div class="col-md-4">
									<img src="{{ asset('img/apple6.jpg') }}" alt="tin mới">
								</div>
								<div class="col-md-8">
									<p>Apple đang dẫn đầu xu hướng công nghệ năm nay. Các công ty cổ phần di động lớn đang là đích ngắm của Apple trong thời gian tới.</p>
								</div>
							</div>
						</li>
						<li>
							<div class="news-nb">
								<h4><a href="">Soi kỹ smartphone Redmi 3 sử dụng hợp kim magie, hoa văn độc đáo</a></h4>
								<span>10/11/2015 - 3:20pm</span>
								<div class="col-md-4">
									<img src="{{ asset('img/appl7.jpg') }}" alt="tin mới">
								</div>
								<div class="col-md-8">
									<p>Hoạt động dưới dạng liên minh các chủ shop bán hàng online với mô hình khá thú vị, thế nhưng Asis vẫn phải rút lui khỏi cuộc đua TMĐT khốc liệt.</p>
								</div>
							</div>
						</li>
						<li>
							<div class="news-nb">
								<h4><a href="">Tính năng mới của iOS 9.3 beta sẽ giúp bạn sử dụng iPhone xuyên màn đêm</a></h4>
								<span>10/11/2015 - 3:20pm</span>
								<div class="col-md-4">
									<img src="{{ asset('img/apple8.jpg') }}" alt="tin mới">
								</div>
								<div class="col-md-8">
									<p>Theo các lập trình viên, Night Shift là tính năng đáng kể nhất có trên phiên bản iOS 9.3 beta.</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="congnghe">
					<h3>Tin Giải Trí</h3>
					<ul>
						<li>
							<div class="news-nb">
								<h4><a href="">Đừng vứt vỏ chuối sau khi ăn vì chúng hoàn toàn có thể ăn được như ruột</a></h4>
								<span>10/11/2015 - 3:20pm</span>
								<div class="col-md-4">
									<img src="{{ asset('img/apple9.jpg') }}" alt="tin mới">
								</div>
								<div class="col-md-8">
									<p>Apple đang dẫn đầu xu hướng công nghệ năm nay. Các công ty cổ phần di động lớn đang là đích ngắm của Apple trong thời gian tới.</p>
								</div>
							</div>
						</li>
						<li>
							<div class="news-nb">
								<h4><a href="">Uber Trung Quốc nhận thêm vốn bổ sung vào tổng giá trị 7 tỷ USD</a></h4>
								<span>10/11/2015 - 3:20pm</span>
								<div class="col-md-4">
									<img src="{{ asset('img/apple10.jpg') }}" alt="tin mới">
								</div>
								<div class="col-md-8">
									<p>Apple đang dẫn đầu xu hướng công nghệ năm nay. Các công ty cổ phần di động lớn đang là đích ngắm của Apple trong thời gian tới.</p>
								</div>
							</div>
						</li>
						<li>
							<div class="news-nb">
								<h4><a href="">Lộ cấu hình Galaxy S7 edge: vẫn 5,1 inch, SoC 820, camera 12 MP cải lùi?</a></h4>
								<span>10/11/2015 - 3:20pm</span>
								<div class="col-md-4">
									<img src="{{ asset('img/apple1.jpg') }}" alt="tin mới">
								</div>
								<div class="col-md-8">
									<p>Hoạt động dưới dạng liên minh các chủ shop bán hàng online với mô hình khá thú vị, thế nhưng Asis vẫn phải rút lui khỏi cuộc đua TMĐT khốc liệt.</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@stop