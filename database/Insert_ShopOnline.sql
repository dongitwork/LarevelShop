-- ----------------------------------- 1.CATEGORY -----------------------------------
INSERT INTO `category` (`CategoryId`, `CategoryName`, `CategoryIcon`, `Description`) VALUES
(1, 'Điện Thoại', 'ti-mobile', 'Điện thoại di động'),
(2, 'Tablet', 'ti-tablet', 'Máy tính bảng'),
(3, 'Laptop', 'ti-desktop', 'Máy tính xách tay'),
(4, 'Desktop', 'ti-desktop', 'Máy tính bàn'),
(5, 'Phụ kiện', 'ti-headphone', 'Phụ kiện ');

-- ----------------------------------- 2.CUSTOMER -----------------------------------

INSERT INTO `customer` (`CustomerId`, `CustomerFullName`, `Password`, `Image`, `Status`, `Address`, `Email`, `Birthday`, `Gender`, `Phone`, `remember_token`) VALUES
(1, 'Nguyễn Thị Ly Na', '$2y$10$n72fGyFQ41tCCFOUhbOBN.wciP9LAGCnwQlOomnVf55W.voWp5QBa', '/img/customer/Majin_buu.jpg', 1, NULL, 'lyna31093@gmail.com', NULL, 1, NULL, ''),
(2, 'Hoàng Ngọc Nhất Anh', '$2y$10$jSlaUE88dwIu9PPV/i8H7u0h0G5y6c7XIAjTcHUTyCFxhwP43rSIO', '/img/customer/Majin_buu.jpg', 1, NULL, 'nhatanh0603@gmail.com', NULL, 0, NULL, '');


-- ----------------------------------- 3.ROLE -----------------------------------

INSERT INTO `role` (`RoleId`, `RoleName`, `Description`) VALUES
(1, 'Super Administrator', 'Người quản trị toàn bộ hệ thống'),
(2, 'Administrator', 'Người quản trị hệ thống'),
(3, 'Customer Service', 'Nhân viên chăm sóc khách hàng'),
(4, 'Store Keeper', 'Nhân viên thủ kho kiêm kế toán');

-- ----------------------------------- 4.USER -----------------------------------

INSERT INTO `user` (`UserId`, `UserName`, `Password`, `Image`, `Status`, `Email`, `Address`, `Birthday`, `Gender`, `Phone`, `remember_token`, `RoleId`) VALUES
(1, 'Super Administrator', '$2y$10$x9ZIswilj5SfEtufwRxfTOsIy.FtFSHeWrValL9uMTPdIb1eGwpve', '/img/YaoMing.jpg', 1, 'superadmin@gmail.com', 'nhà superadmin', '2016-03-03', 2, '0000123456', NULL, 1),
(2, 'Administrator', '$2y$10$10ZigQzTNC.f42B78/s3qeWwIh5M4S/oOOjbyrAsh902PrYVYwc1i', '/img/YaoMing.jpg', 1, 'admin@gmail.com', 'nhà admin', '2016-03-03', 0, '0000123456', NULL, 2),
(3, 'Customer Support', '$2y$10$x9ZIswilj5SfEtufwRxfTOsIy.FtFSHeWrValL9uMTPdIb1eGwpve', '/img/YaoMing.jpg', 1, 'customersupport@gmail.com', 'nhà customer support', '2016-03-03', 2, '0000123456', NULL, 3),
(4, 'Store Keeper', '$2y$10$10ZigQzTNC.f42B78/s3qeWwIh5M4S/oOOjbyrAsh902PrYVYwc1i', '/img/YaoMing.jpg', 1, 'storekeeper@gmail.com', 'nhà store keeper', '2016-03-03', 0, '0000123456', NULL, 4);

-- ----------------------------------- 5.DELIVER_FEE -----------------------------------

-- ----------------------------------- 6.DISCOUNT -----------------------------------

INSERT INTO `discount` (`DiscountId`, `Percent`, `Description`) VALUES
(1, 20, 'Giảm 20%'),
(2, 50, 'Giảm 50%'),
(3, 10, 'Giảm 10%');

-- ----------------------------------- 7.GIFT -----------------------------------

INSERT INTO `gift` (`GiftId`, `GiftName`, `Description`) VALUES
(1, 'Phiếu Mua Hàng 500K', 'Tặng phiếu mua hàng 500k'),
(2, 'Phiếu Mua hàng 200k', 'Tặng phiếu mua hàng 500k'),
(3, 'Ba lô đểu', 'Quá tuyệt vời'),
(4, 'Ba lô xịn', 'Quá tuyệt vời'),
(5, 'Chuột', 'Tặng chuột trị giá 100k'),
(6, 'Bàn phím', 'Tặng bàn phím trị giá 150k'),
(7, 'Bộ vệ sinh Laptop', 'Tặng bộ vệ sinh laptop trị giá 50k'),
(8, 'Lót chuột Razer', 'Tặng lót chuột Razer trị giá 200k'),
(9, 'Thẻ nhớ 8Gb', 'Tặng thẻ nhớ 8Gb trị giá 86k'),
(10, 'Bao da', 'Tặng bao da trị giá 100k-150k');

-- ----------------------------------- 8.MANUFACTURER -----------------------------------

INSERT INTO `manufacturer` (`ManufacturerId`, `ManufacturerName`, `Image`, `Description`) VALUES
(1, 'Apple', '', ''),
(2, 'Samsung', '', ''),
(3, 'Dell', '', ''),
(4, 'OPPO', '', ''),
(5, 'Toshiba', '', ''),
(6, 'Hp', '', ''),
(7, 'Lenovo', '', ''),
(8, 'Sony', '', ''),
(9, 'Acer', '', ''),
(10, 'Asus', '', ''),
(11, 'MSI', '', ''),
(12, 'HTC', '', ''),
(13, 'LG', '', '');

-- ----------------------------------- 9.ORDER -----------------------------------


-- ----------------------------------- 10.ORDER_DETAIL -----------------------------------


-- ----------------------------------- 11.PAYMENT_METHOD -----------------------------------

INSERT INTO `payment_method` (`PaymentMethodId`, `PaymentMethodName`, `Description`) VALUES
(1, 'Thanh toán qua Ngân Lượng', 'Thanh toán qua ví điện tử Ngân Lượng'),
(2, 'Thanh toán qua Bảo Kim', 'Thanh toán qua ví điện tử Bảo Kim'),
(3, 'Thanh toán khi nhận hàng', 'Thanh toán trực tiếp cho nhân viên giao hàng khi nhận hàng'),
(4, 'Thanh toán bằng CreditCard', 'Thanh toán qua thẻ ghi nợ nội địa hoặc quốc tế'),
(5, 'Thanh toán qua OnePay', 'Thanh toán qua cổng thanh toán OnePay');





-- ----------------------------------- 12.PERMISSION -----------------------------------


-- Super Admin = 1, Admin = 2, Customer Support = 3, Store Keeper = 4

INSERT INTO `permission` (`PermissionId`, `PermissionName`, `Description`) VALUES
-- Nhân viên
(1, 'Quyền Thêm Nhân Viên', 'Quyền Thêm Nhân Viên'),
(2, 'Quyền Sửa Nhân Viên', 'Quyền Sửa Nhân Viên'),
(3, 'Quyền Xóa Nhân Viên', 'Quyền Xóa Nhân Viên'),
(4, 'Quyền Xem Danh Sách Nhân Viên', 'Quyền Xem Danh Sách Nhân Viên'),
-- Khuyến mãi quà tặng
(5, 'Quyền Thêm Khuyến Mãi Quà Tặng', 'Quyền Thêm Khuyến Mãi Quà Tặng'),
(6, 'Quyền Sửa Khuyến Mãi Quà Tặng', 'Quyền Sửa Khuyến Mãi Quà Tặng'),
(7, 'Quyền Xóa Khuyến Mãi Quà Tặng', 'Quyền Xóa Khuyến Mãi Quà Tặng'),
(8, 'Quyền Xem Danh Sách Khuyến Mãi Quà Tặng', 'Quyền Xem Danh Sách Khuyến Mãi Quà Tặng'),
-- Khuyến mãi giảm giá
(9, 'Quyền Thêm Khuyến Mãi Giảm Giá', 'Quyền Thêm Khuyến Mãi Giảm Giá'),
(10, 'Quyền Sửa Khuyến Mãi Giảm Giá', 'Quyền Sửa Khuyến Mãi Giảm Giá'),
(11, 'Quyền Xóa Khuyến Mãi Giảm Giá', 'Quyền Xóa Khuyến Mãi Giảm Giá'),
(12, 'Quyền Xem Danh Sách Khuyến Mãi Giảm Giá', 'Quyền Xem Danh Sách Khuyến Mãi Giảm Giá'),
-- Sản phẩm nhập về
(13, 'Quyền Thêm Sản Phẩm Nhập Về', 'Quyền Thêm Sản Phẩm Nhập Về'),
(14, 'Quyền Sửa Sản Phẩm Nhập Về', 'Quyền Sửa Sản Phẩm Nhập Về'),
(15, 'Quyền Xóa Sản Phẩm Nhập Về', 'Quyền Xóa Sản Phẩm Nhập Về'),
(16, 'Quyền Xem Danh Sách Sản Phẩm Nhập Về', 'Quyền Xem Danh Sách Sản Phẩm Nhập Về'),
-- Sản phẩm hiển thị
(17, 'Quyền Thêm Sản Phẩm Hiển Thị', 'Quyền Thêm Sản Phẩm Hiển Thị'),
(18, 'Quyền Sửa Sản Phẩm Hiển Thị', 'Quyền Sửa Sản Phẩm Hiển Thị'),
(19, 'Quyền Xóa Sản Phẩm Hiển Thị', 'Quyền Xóa Sản Phẩm Hiển Thị'),
(20, 'Quyền Xem Danh Sách Sản Phẩm Hiển Thị', 'Quyền Xem Danh Sách Sản Phẩm Hiển Thị'),
-- Slider
(21, 'Quyền Thêm Slide', 'Quyền Thêm Sản Slide'),
(22, 'Quyền Sửa Slide', 'Quyền Sửa Slide'),
(23, 'Quyền Xóa Slide', 'Quyền Xóa Slide'),
(24, 'Quyền Xem Danh Sách Slide', 'Quyền Xem Danh Sách Slide'),
-- Thuộc tính sản phẩm
(25, 'Quyền Thêm Thuộc tính Sản phẩm', 'Quyền Thêm Sản Thuộc tính Sản phẩm'),
(26, 'Quyền Sửa Thuộc tính Sản phẩm', 'Quyền Sửa Thuộc tính Sản phẩm'),
(27, 'Quyền Xóa Thuộc tính Sản phẩm', 'Quyền Xóa Thuộc tính Sản phẩm'),
(28, 'Quyền Xem Danh Sách Thuộc tính Sản phẩm', 'Quyền Xem Danh Sách Thuộc tính Sản phẩm'),
-- Tin Tức
(29, 'Quyền Thêm Tin Tức', 'Quyền Thêm Tin Tức'),
(30, 'Quyền Sửa Tin Tức', 'Quyền Sửa Tin Tức'),
(31, 'Quyền Xóa Tin Tức', 'Quyền Xóa Tin Tức'),
(32, 'Quyền Xem Danh Sách Tin Tức', 'Quyền Xem Danh Sách Tin Tức'),
-- Loại Sản phẩm - Category
(33, 'Quyền Thêm Loại Sản Phẩm', 'Quyền Thêm Sản Loại Sản Phẩm'),
(34, 'Quyền Sửa Loại Sản Phẩm', 'Quyền Sửa Loại Sản Phẩm'),
(35, 'Quyền Xóa Loại Sản Phẩm', 'Quyền Xóa Loại Sản Phẩm'),
(36, 'Quyền Xem Danh Sách Loại Sản Phẩm', 'Quyền Xem Danh Sách Loại Sản Phẩm'),
-- Nhà Sản Xuất
(37, 'Quyền Thêm Nhà Sản Xuất', 'Quyền Thêm Sản Nhà Sản Xuất'),
(38, 'Quyền Sửa Nhà Sản Xuất', 'Quyền Sửa Nhà Sản Xuất'),
(39, 'Quyền Xóa Nhà Sản Xuất', 'Quyền Xóa Nhà Sản Xuất'),
(40, 'Quyền Xem Danh Sách Nhà Sản Xuất', 'Quyền Xem Danh Sách Nhà Sản Xuất'),
-- Thuế
(41, 'Quyền Thêm Thuế', 'Quyền Thêm Sản Thuế'),
(42, 'Quyền Sửa Thuế', 'Quyền Sửa Thuế'),
(43, 'Quyền Xóa Thuế', 'Quyền Xóa Thuế'),
(44, 'Quyền Xem Danh Sách Thuế', 'Quyền Xem Danh Sách Thuế'),
-- Bình Luận
(45, 'Quyền Trả Lời Bình Luận', 'Quyền Trả Lời Bình Luận'),
(46, 'Quyền Xem Chi Tiết Bình Luận', 'Quyền Xem Chi Tiết Bình Luận'),
(47, 'Quyền Xem Danh Sách Bình Luận', 'Quyền Xem Danh Sách Bình Luận'),
-- Liên Hệ
(48, 'Quyền Trả Lời Liên Hệ', 'Quyền Trả Lời Liên Hệ'),
(49, 'Quyền Xem Chi Tiết Liên Hệ', 'Quyền Xem Chi Tiết Liên Hệ'),
(50, 'Quyền Xem Danh Sách Liên Hệ', 'Quyền Xem Danh Sách Liên Hệ'),
-- Nhóm Người Dùng
(51, 'Quyền Thêm Nhóm Người Dùng', 'Quyền Thêm Nhóm Người Dùng'),
(52, 'Quyền Sửa Nhóm Người Dùng', 'Quyền Sửa Nhóm Người Dùng'),
(53, 'Quyền Xóa Nhóm Người Dùng', 'Quyền Xóa Nhóm Người Dùng'),
(54, 'Quyền Xem Danh Sách Nhóm Người Dùng', 'Quyền Xem Danh Sách Nhóm Người Dùng'),
-- Đơn Hàng
(55, 'Quyền Sửa Trạng Thái Đơn Hàng', 'Quyền Sửa Trạng Thái Đơn Hàng'),
(56, 'Quyền Xem Chi Tiết Đơn Hàng', 'Quyền Xem Chi Tiết Đơn Hàng'),
(57, 'Quyền Xem Danh Sách Đơn Hàng', 'Quyền Xem Danh Sách Đơn Hàng'),
-- Các Loại Trạng Thái Đơn Hàng
(58, 'Quyền Thêm Trạng Thái Đơn Hàng', 'Quyền Thêm Trạng Thái Đơn Hàng'),
(59, 'Quyền Sửa Trạng Thái Đơn Hàng', 'Quyền Sửa Trạng Thái Đơn Hàng'),
(60, 'Quyền Xóa Trạng Thái Đơn Hàng', 'Quyền Xóa Trạng Thái Đơn Hàng'),
(61, 'Quyền Xem Danh Sách Trạng Thái Đơn Hàng', 'Quyền Xem Danh Sách Trạng Thái Đơn Hàng'),
-- Quản lý quyền
(62, 'Quyền Thêm Quyền Người Dùng', 'Quyền Thêm Quyền Người Dùng'),
(63, 'Quyền Xem Danh Sách Quyền Người Dùng', 'Quyền Xem Danh Sách Quyền Người Dùng');
-- Danh Mục Tin Tức
(64, 'Quyền Thêm Danh Mục Tin Tức', 'Quyền Thêm Danh Mục Tin Tức'),
(65, 'Quyền Sửa Danh Mục Tin Tức', 'Quyền Sửa Danh Mục Tin Tức'),
(66, 'Quyền Xóa Danh Mục Tin Tức', 'Quyền Xóa Danh Mục Tin Tức'),
(67, 'Quyền Xem Danh Sách Danh Mục Tin Tức', 'Quyền Xem Danh Sách Danh Mục Tin Tức'),







-- ----------------------------------- 13.POST_CATEGORY -----------------------------------

INSERT INTO `post_category` (`PostCategoryId`, `PostCategoryName`, `Description`) VALUES
(1, 'Chính sách khách hàng', ''),
(2, 'Dịch vụ hỗ trợ', '');


-- ----------------------------------- 14.POST -----------------------------------

INSERT INTO `post` (`PostId`, `Title`, `Body`, `Active`, `CreatedAt`, `UpdatedAt`, `UserId`, `PostCategoryId`) VALUES
(1, 'Chính sách đổi trả', '', 1, '2016-05-17 08:42:23', '2016-05-17 08:42:23', 1, 1),
(2, 'Hướng dẫn mua hàng', '', 1, '2016-05-17 08:42:53', '2016-05-17 08:42:53', 1, 2);





-- ----------------------------------- 20.ROLE_PERMISSION -----------------------------------

INSERT INTO `role_permission` (`RoleId`, `PermissionId`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 4);

-- ----------------------------------- 21.SHIPPER -----------------------------------

INSERT INTO `shipper` (`ShipperId`, `ShipperName`, `Phone`, `Address`) VALUES
(1, 'Shipper 1', '0935123456', 'Address 1'),
(2, 'Shipper 2', '0905123456', 'Address 2'),
(3, 'Shipper 3', '0915123456', 'Address 3'),
(4, 'Shipper 4', '0995123456', 'Address 4'),
(5, 'Shipper 5', '0935444555', 'Address 5');



-- ----------------------------------- 23.STATUS -----------------------------------
INSERT INTO `status` (`StatusId`, `StatusName`, `StatusIcon`, `Description`) VALUES
(1, 'Pending', 'glyphicon glyphicon-hourglass', 'Trạng thái đơn hàng: đang chờ xử lý'),
(2, 'Ready To Ship', 'glyphicon glyphicon-gift', 'Trạng thái đơn hàng: sẵn sàng để ship'),
(3, 'Shipping', 'glyphicon glyphicon-plane', 'Trạng thái đơn hàng: đang ship'),
(4, 'Shipped', 'glyphicon glyphicon-ok', 'Trạng thái đơn hàng: đã ship thành công'),
(5, 'Cancelled', 'glyphicon glyphicon-remove', 'Trạng thái đơn hàng: hủy đơn hàng');


-- ----------------------------------- 24.SLIDER -----------------------------------
INSERT INTO `slider` (`SliderId`, `ProductPublishId`, `Title`, `SliderImage`) VALUES
(1, 1, 'Sản phẩm mới', 'Slider_computer1.jpg'),
(2, 2, 'segs', 'Slider_computer3.jpg'),
(3, 3, 'dshsdh', 'Slider_computer4.jpg'),
(4, 4, 'w4yw', 'Slider_computer2.jpg'),
(5, 5, 'ergeh', 'Slider_htc-liveblog.png');