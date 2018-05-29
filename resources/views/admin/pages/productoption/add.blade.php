<div class="content-admin">
	<div class="title">
		<h4>Thêm Thông tin sản phẩm</h4>
	</div>
	<div class="container1 padding-10">
		<div class="col-md-10 col-md-ofset-1">
			<div class="form-main">
				{{Form::open(['method' => 'post'])}}
					{{Form::token()}}
					<div class="row">
						<div class="form-group col-md-4">
						    {{ Form::label('Field', 'Tên Trường') }}
						    {{ Form::text('Field','',['class'=>'form-control disabled','placeholder'=>"Nhập tên trường"]) }}
						</div>
						<div class="form-group col-md-4">
						    {{ Form::label('Label', 'Label') }}
						    {{ Form::text('Label','',['class'=>'form-control disabled']) }}
						</div>
						<div class="form-group col-md-4">
							{{ Form::label('Type', 'Type') }}
							{{ Form::select('Type',['varchar(255)' => 'Varchar'],'',['class'=>'form-control disabled']) }}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-4">
							{{ Form::label('CategoryId', 'Danh Mục') }} 
							{{ Form::select('CategoryId',$data_op['optioncate'],'',['class'=>'form-control']) }}
						</div>
						
						<div class="form-group col-md-8">
							{{ Form::label('Description', 'Mô tả') }}
						    {{ Form::text('Description','',['class'=>'form-control','placeholder'=>""]) }}
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-10">
							{{ Form::label('OldField', 'Chọn trường đã có') }} 
							{{ Form::select('OldField',$data_op['prooption'],'',['class'=>'form-control old-select']) }}
						</div>
					</div>
					<div class="form-group col-md-12">
						{{ Form::submit('Lưu',['class'=>'btn btn-warning']) }}
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('.old-select').change(function(event) {
				if ($(this).val() != 0 ) {
					$('.disabled').attr('disabled', 'disabled');
				}else{
					$('.disabled').removeAttr('disabled');
				}
			});
		});
	</script>
</div>