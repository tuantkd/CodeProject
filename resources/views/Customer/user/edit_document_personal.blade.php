@extends('Customer.master')
@section('title', 'Chỉnh sửa tài liệu')
@section('noidung_tailieu')

	<div class="row">
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title" align="center">Cập nhật tài liệu:</h3>
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
					action="update_document_personal{{ $edit_document_personal->id }}">

					{!! csrf_field() !!}
            		{!! method_field('PUT') !!}

						<div class="form-group">
						    <h3>Tiêu đề:</h3>
						    <input type="text" class="form-control"
						    value="{{ $edit_document_personal->title_file }}" name="txt_tieude">
						</div>

						<div class="form-group">
						    <h3>Nội dung tóm tắt:</h3>
						    <textarea class="form-control" rows="3" name="txt_noidungtt">{{ $edit_document_personal->content }}
						    </textarea>
						</div>
						
						<div class="form-group">
							<h3>Thể loại: 
								<input type="text" name="txt_loai"
								value="{{ $edit_document_personal->kind }}">
							</h3>
						</div>
						
						<div class="form-group">
							<h3>Tác giả:</h3>
						    <input type="text" class="form-control" style="width: 50%;"
						    value="{{ $edit_document_personal->author }}" name="txt_tacgia">
						</div>

						<div class="form-group">
							<h3>Năm xuất bản:</h3>
						    <input type="text" class="form-control" style="width: 50%;"
						    value="{{ $edit_document_personal->publish }}" name="txt_xuatban">
						</div>

						<div class="form-group">
						    <h3>Nguồn:</h3>
						    <input type="text" class="form-control" style="width: 50%;"
						    value="{{ $edit_document_personal->source }}" name="txt_nguon">
						</div>
						<hr>

						<div class="form-group">
						    <h3>Chọn tệp upload file:</h3>
						    <div class="form-group">
	                        	<input type="file" 
	                        	value="{!! $edit_document_personal->file_name !!}" 
	                        	name="file" id="file"/>
	                        </div>
						</div>

						<div class="alert alert-info" style="width: 70%;">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Kích thước bắt buộc nhỏ hơn 2M. Nếu kích thước file upload lớn.
							</strong>
							<br>
							<a href="https://www.foxitsoftware.com/compress-pdf/">
							Click vào đây
							</a>
						</div>

						<div class="form-group">
						    <h3>Chọn tệp ảnh bìa tài liệu:</h3>
						    <div class="form-group">
	                        	<input type="file" name="image" id="cover_image"
	                        	value="{!! $edit_document_personal->file_cover_image !!}"/>
	                        </div>
						</div>
						
						
						@if(Auth::check())
							<input type="hidden" name="txt_user"
							value="{!! Auth::user()->id !!}">
						@else

						@php
						    
						@endphp
							
						@endif

						<br>
				
					    <div class="text-right">
						  	<button type="submit" class="btn btn-primary">
						  	CẬP NHẬT
						  	</button>
						</div>
					</form>
					

					<br>

					
					<!--script kiểm tra file upload tài liệu-->
			         <script type="text/javascript">
			         	var uploadField = document.getElementById("file");
						uploadField.onchange = function() {
						    if(this.files[0].size > 2097152){
						       alert("Kích thước file bắt buộc nhỏ hơn 2M. Vui lòng chọn lại!");
						       this.value = "";
						    };
						};
			         </script>
			         <!--script kiểm tra file upload tài liệu-->


					 <!--script size ảnh bìa tài liệu-->
			         <script type="text/javascript">
			         	var uploadField = document.getElementById("cover_image");
						uploadField.onchange = function() {
						    if(this.files[0].size > 1097152){
						       alert("Kích thước hình ảnh nhỏ hơn 1M!");
						       this.value = "";
						    };
						};
			         </script>
			         <!--script size ảnh bìa tài liệu-->


				</div>
				{{-- end_panel-body --}}
			</div>
			{{-- end_panel panel-default --}}

		</div>
		{{-- end_col1 --}}

		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>{{-- end_col2 --}}

	</div>

@endsection