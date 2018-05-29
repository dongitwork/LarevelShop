@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Thêm sản phẩm nhập về</h4>
	</div>
	<div class="container1 product-add">
		<div class="col-md-12">
			<div class="form-main">
				{{Form::open(['method' => 'post','files' => true])}}
					<div class="col-md-12 nd">
			    		<div class="col-md-8">
			    			<div class="form-group ">
							    {{ Form::label('ProductName', 'Tên sản phẩm') }}
							    {{ Form::text('ProductName','',['class'=>'form-control required','placeholder'=>"Nhập tên sản phẩm"]) }}
							</div>
							<div class="form-group">
								{{ Form::label('Description', 'Chi tiết sản phẩm') }}
								{{ Form::textarea('Description','',['class'=>'form-control','id'=>'Description','placeholder'=>'Nhập Chi tiết sản phẩm']) }}
								<script type="text/javascript">CKEDITOR.replace('Description'); </script>
							</div>
							
			    		</div>
			    		<div class="col-md-4">
							<div class="form-group">
								{{ Form::label('CategoryId', 'Loại sản phẩm') }}
								{{ Form::select('CategoryId',$dataAdd['listcate'],'',['class' => 'required form-select form-category'] ) }}
							</div>
							<div class="form-group">
								{{ Form::label('ManufacturerId', 'Nhà sản xuất') }}
								{{ Form::select('ManufacturerId',$dataAdd['listmanu'],'',['class' => 'required form-select']) }}
							</div>

							<div class="form-group">
								{{ Form::label('TaxId', 'Thuế VAT') }}
								{{Form::text('TaxVat',$dataAdd['vat']->Percent.'%',['disabled'=>'disabled', 'class' => 'form-select '] )}}
							</div>

							<div class="form-group">
								{{ Form::label('TaxId', 'Thuế') }}
								{{Form::select('TaxId',$dataAdd['listtax'],'',['class' => 'form-select required'] )}}
							</div>

							<div class="form-group">
								<div class="AttachImage" style="display: none;">
									
								</div>
								{{ Form::label('Image', 'Hình ảnh minh họa') }}
								{{ Form::file('Image',['class'=>'Image']) }}
							</div>

							<div class="form-group">
								{{ Form::label('DeviceAttached', 'Hộp sp gồm') }}
								{{ Form::text('DeviceAttached','',['class'=>'form-text']) }}
							</div>

							<div class="form-group">
								{{ Form::label('Price', 'Giá nhập về') }}
								{{Form::text('Price',0,['class'=>'form-text required','min'=>0])}}
							</div>

							<div class="form-group">
								{{ Form::label('Quantity', 'Số Lượng') }}
								{{Form::number('Quantity',0,['class'=>'form-text required','min'=>0])}}
							</div>

							<div class="form-group">
								{{ Form::label('ShortDescription', 'Mô tả ngắn') }}
								{{ Form::textarea('ShortDescription','',['class'=>'form-control txt','id'=>'ShortDescription','placeholder'=>'Nhập mô tả ngắn']) }}
							</div>

						</div>
						<div class="col-md-12" >
							<div class="form-group" style=" margin-top: -19px; ">
				    			<fieldset>
									<legend style=" font-size: 15px; font-weight: bold; ">Thông số kỹ thuật</legend>
									<div class="list-product-option row">
					    				<p style=" padding-left: 20px; ">Vui lòng chọn loại sản phẩm</p>
					    			</div>
								</fieldset>
							</div>
						</div>
					<div class="form-group col-md-12">
						{{ Form::submit('Lưu',['class'=>'btn btn-warning']) }}
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@stop