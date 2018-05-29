@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Thêm loại thuế</h4>
	</div>
	<div class="container1 padding-10">
		<div class="col-md-10 col-md-ofset-1">
			<div class="form-main">
				<form role="form" method="post">
				{!! csrf_field() !!}
					<div class="col-md-5">
						<div class="form-group">
						    <label for="example">Tên thuế</label>
							<input type="name" name='tax_name' class="form-control" id="name" placeholder="Nhập tên thuế">

							@if ($errors->has('tax_name'))
							<span class="help-block">
                                <strong>{{ $errors->first('tax_name') }}</strong>
                            </span>
							@endif
							
						</div>
						<div class="form-group">
						    <label for="example">Gía trị</label>
							<input type="name" name="percent" class="form-control" id="name">

							@if ($errors->has('percent'))
							<span class="help-block">
                                <strong>{{ $errors->first('percent') }}</strong>
                            </span>
                            @endif

						</div>
						<div class="form-group">
						    <label for="example">Mô tả</label>
							<input type="name" name="description" class="form-control" id="name">

							@if ($errors->has('description'))
							<span class="help-block">
	                            <strong>{{ $errors->first('description') }}</strong>
	                        </span>
							@endif

						</div>
					</div>
					<button class="btn btn-warning" type="submit" class="btn btn-default">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</div>
@stop