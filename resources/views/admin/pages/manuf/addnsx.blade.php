@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Thêm nhà sản xuất</h4>
	</div>
	<div class="container1 padding-10">
		<div class="col-md-12">
			<div class="form-main">
				<form role="form" action="" method="post" enctype="multipart/form-data" >
				{!! csrf_field() !!}
					<div class="col-md-6">
						<div class="form-group">
						    <label for="example">Tên nhà sản xuất</label>
							<input type="text" name="manufacturer_name" class="form-control required" id="name" placeholder="Nhập tên nhà sản xuất">

							@if ($errors->has('manufacturer_name'))
							<span class="help-block">
                                <strong>{{ $errors->first('manufacturer_name') }}</strong>
                            </span>
							@endif

						</div>
						<div class="form-group">
							<label for="exampleInputFile">Hình ảnh</label>
							<input type="file" id="exampleInputFile" name="image">
						</div>
						<div class="form-group">
							<label for="exampleInputFile">Mô tả</label>
							<input type="text" id="name" name="description">

							@if ($errors->has('description'))
							<span class="help-block">
	                            <strong>{{ $errors->first('description') }}</strong>
	                        </span>
							@endif
						</div>
					</div>
					<div class="col-md-6">
						<h5>Danh sách nhà sản xuất</h5>
					</div>
					<button class="btn btn-warning" type="submit" class="btn btn-default">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</div>
@stop