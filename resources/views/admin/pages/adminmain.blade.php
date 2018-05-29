@extends('admin.templates.masteradmin')
@section('contentadmin')
	<div class="content-admin">
		<div class="truycap">
			<h4 class="bdk">Welcome to ShopOnline Administrator</h4>
			<div class="truycap-content">
				<div class="col-md-4">
					<span class="title"></span>
					<ul>
						<li><span><i class="glyphicon glyphicon-pencil"></i></span><a href="{{URL::to('/admin/product/add')}}">Nhập sản phẩm mới</a></li>
						<li><span><i class="glyphicon glyphicon-plus"></i></span><a href="{{URL::to('/admin/product/add-productpublish')}}">Nhập sản phẩm hiển thị</a></li>
						<li><span><i class="glyphicon glyphicon-home"></i></span><a href="{{URL::to('/')}}">Site bán hàng</a></li>
					</ul>
				</div>
				<div class="col-md-4">
					<span class="title"></span>
					<ul>
						<li><span><i class="glyphicon glyphicon-picture"></i></span></applet><a href="{{URL::to('/admin/user/list_user')}}">Quản lý thành viên</a></li>
						<li><span><i class="glyphicon glyphicon-comment"></i></span><a href="{{URL::to('/admin/post/add-posts')}}">Thêm bài viết</a></li>
						<li><span><i class="glyphicon glyphicon-comment"></i></span><a href="{{URL::to('/admin/role/manager_role_permision')}}">Quản lý quyền người dùng</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@stop