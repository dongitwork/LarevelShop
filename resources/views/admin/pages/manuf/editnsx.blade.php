<div class="content-admin">
	<div class="title">
		<h4>Sửa nhà sản xuất</h4>
	</div>
	<div class="container1 padding-10">
		<div class="col-md-12">
			<div class="form-main">
				<form role="form" action="" method="post" enctype="multipart/form-data" >
				{!! csrf_field() !!}
					<div class="col-md-12">
						<div class="form-group">
						    <label for="example">Tên nhà sản xuất</label>
							<input value="{{ $value->ManufacturerName }}" type="text" name="manufacturer_name" class="form-control required" id="name" placeholder="Nhập tên nhà sản xuất">
						</div>
						<div class="form-group">
							<label for="exampleInputFile">Hình ảnh</label>
							<input type="file" id="exampleInputFile" name="image">
							@if(!empty($value->Image))
								Hình ảnh hiện tại
		          				{!! Html::image('/images/manufacturer/'.$value->Image ,'', ['width' => '100','class'=>"image"] ) !!}
		          				<input  name="curent_images" type="checkbox" value="1"  > Xóa hình ảnh hiện tại
		          			@endif
		          			
						</div>
						<div class="form-group">
							<label for="exampleInputFile">Mô tả</label>
							<input value="{{ $value->Description }}" type="text" id="name" name="description">
						</div>
					</div>
					<button class="btn btn-warning" type="submit" class="btn btn-default">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</div>