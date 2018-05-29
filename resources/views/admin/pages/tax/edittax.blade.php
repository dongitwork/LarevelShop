@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Sửa loại thuế</h4>
	</div>
	<div class="container1 padding-10">
		<div class="col-md-10 col-md-ofset-1">
			<div class="form-main">
				<form role="form" method="post">

				{!! csrf_field() !!}
					<input type="hidden" name="tax_id"  value="{{!empty($data['TaxId']) ? $data['TaxId'] : null}}" />
					<div class="col-md-5">
						<div class="form-group">
						    <label for="example">Tên thuế</label>
							<input type="text" class="form-control" id="name" name="tax_name" placeholder="Nhập tên thuế" value="{!! old('tax_name',isset($data) ? $data['TaxName'] : null) !!}">

							@if ($errors->has('tax_name'))
								<span class="help-block">
                                        <strong>{{ $errors->first('tax_name') }}</strong>
                                    </span>
							@endif

						</div>
						<div class="form-group">
						    <label for="example">Gía trị</label>
							<input type="number" name="percent" class="form-control" id="name" placeholder="Nhập giá trị" value="{!! old('percent',isset($data) ? $data['Percent'] : null) !!}">

							@if ($errors->has('percent'))
								<span class="help-block">
                                        <strong>{{ $errors->first('percent') }}</strong>
                                    </span>
							@endif

						</div>
						<div class="form-group">
						    <label for="example">Mô tả</label>
							<input type="text" name="description" class="form-control" id="name" placeholder="Nhập mô tả" value="{!! old('description',isset($data) ? $data['Description'] : null) !!}">

							@if ($errors->has('description'))
								<span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
							@endif

						</div>
					</div>
					<button class="btn btn-warning" type="submit" class="btn btn-default">Cập nhập</button>
				</form>
			</div>
		</div>
	</div>
</div>
@stop