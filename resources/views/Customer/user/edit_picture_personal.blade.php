@extends('Customer.master')
@section('title', 'Chỉnh sửa hình ảnh')
@section('noidung_tailieu')

	<div class="row">
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<div class="panel panel-primary"=>
				<div class="panel-heading">
					<h3 class="panel-title" align="center">Cập nhật hình ảnh:</h3>
				</div>
				<div class="panel-body">
					@if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

					<form method="post" enctype="multipart/form-data"
					action="update_picture_personal{{ $edit_picture_personal->id }}">

					{!! csrf_field() !!}
            		{!! method_field('PUT') !!}

						<div class="form-group">
						    <h3>Tiêu đề:</h3>
						    <input type="text" class="form-control"
						    value="{{ $edit_picture_personal->title_file }}" name="txt_tieude">
						</div>

						
						<div class="form-group">
							<h3>Thể loại: 
								<input type="text" name="txt_loai"
								value="{{ $edit_picture_personal->kind }}">
							</h3>
						</div>

						<div class="form-group">
						    <h3>Nguồn:</h3>
						    <input type="text" class="form-control"
						    value="{{ $edit_picture_personal->source }}" name="txt_nguon">
						</div>

						<div class="form-group">
						    <h3>Nội dung về hình ảnh:</h3>
						    <textarea class="form-control" rows="3" name="txt_nd">{{ $edit_picture_personal->content }}
						    </textarea>
						</div>
						<hr>

						<div class="form-group">
							<h3>Chọn tệp hình ảnh:</h3>
						    <div class="form-group">
	                        	<input type="file" name="image"
	                        	value="{{ $edit_picture_personal->file_name }}" id="image"/>
	                        </div>
						</div>

						<img id="blah" class="img-responsive">
						
						@if(Auth::check())
							<input type="hidden" name="txt_user"
							value="{!! Auth::user()->id !!}">
						@endif
						<br>
				
					    <div class="text-right">
						  	<button type="submit" class="btn btn-primary">
						  	CẬP NHẬT
						  	</button>
						</div>
					</form>
				
					<br>

					 <!--script size ảnh-->
			         <script type="text/javascript">
			         	var uploadField = document.getElementById("image");
						uploadField.onchange = function() {
						    if(this.files[0].size > 1097152){
						       alert("Kích thước hình ảnh bắt buộc nhỏ hơn 1M!");
						       this.value = "";
						    };
						};
			         </script>
			         <!--script size ảnh-->


				</div>
				{{-- end_panel-body --}}
			</div>
			{{-- end_panel panel-default --}}

		</div>
		{{-- end_col1 --}}

		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>{{-- end_col2 --}}

	</div>

@endsection