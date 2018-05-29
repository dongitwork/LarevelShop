@extends('admin.templates.masteradmin')
@section('contentadmin')
<div class="content-admin">
	<div class="title">
		<h4>Thêm sản phẩm hiển thị</h4>
	</div>
	<div class="container1 product-add">
		<div class="col-md-12">
			<div class="form-main">
				{{Form::open(['method' => 'post','files' => true])}}
					<div class="col-md-12 nd">
						<div class="col-md-8">
							<div class="col-md-12 row mg-bt">
								<div class="col-md-5 row">
									{{ Form::label('ProductId', 'Chọn sản phẩm') }}
								</div>
								<div class="col-md-7 row">
									@if(!empty($_GET['ProcutId']))
										{{Form::select('ProductId',$Product,$_GET['ProcutId'],['class' => 'form-control ProductCheck'] )}}
									@else
										{{ Form::select('ProductId',$Product,'',['class' => 'required form-control ProductCheck'] ) }}
									@endif
									<div class="ProductErro"> </div>
								</div>
							</div>
			    			<div class="col-md-12 row mg-bt">
			    				<div class="col-md-5 row">
									{{ Form::label('Status', 'Trạng thái') }}
								</div>
								<div class="col-md-7 row">
									{{Form::select('Status',[1=>'Hiển thị',0=>'Không hiển thị'],'',['class' => 'form-control'] )}}
								</div>
			    			</div>
							
							<div class="col-md-12 row mg-bt">
								<div class="col-md-5 row">
									{{ Form::label('ProfitPercent', 'Lợi nhuận (%)') }}
								</div>
								<div class="col-md-7 row">
									{{ Form::text('ProfitPercent','',['class'=>'form-control']) }}
								</div>
							</div>
							<div class="col-md-12 row mg-bt">
								<div class="col-md-5 row">
									{{ Form::label('Sticky', 'Đưa Lên trang chủ') }}
								</div>
								<div class="col-md-7 row">
									{{ Form::checkbox('Sticky', 1 , false) }}
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<div class="AttachImage" style="display: none;"></div>
								{{ Form::label('AdsImage', 'Hình ảnh minh họa') }}
								{{ Form::file('AdsImage',['class'=>'Image']) }}
							</div>
						</div>
						
			    		<div class="col-md-12 row ht">
			    			<fieldset>
			    				<legend>Hình thức khuyến mãi</legend>
			    				<div class="col-md-5">
									<h4>Quà Tặng</h4>
									<div class="form-group">
										{{ Form::checkbox('GiftStatus', 1 , false,['class'=>'checkpromotion','types' => 'gift']) }}
										{{ Form::label('Status', 'Có quà tặng') }}
									</div>	
					    			<div class="gift_wp" style="display: none;"></div>
					    		</div>
					    		<div class="col-md-5 col-md-offet-1">
					    			<h4>Giảm giá</h4>
					    			<div class="form-group">
										{{ Form::checkbox('DisStatus', 1 , false,['class'=>'checkpromotion','types' => 'discount']) }}
										{{ Form::label('Status', 'Có giảm giá') }}
									</div>	
					    			<div class="discount_wp" style="display: none;"></div>
									
					    		</div>
			    			</fieldset>
			    		</div>
					</div>	
					<div class="form-group col-md-12 clear-both">
						{{ Form::submit('Lưu',['class'=>'btn btn-warning']) }}
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@stop