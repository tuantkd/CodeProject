@extends('Customer.master')
@section('title', 'Upload tài liệu')
@section('noidung_tailieu')

	<div class="row">
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title" align="center">Upload tài liệu:</h3>
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

                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <strong>{{ session()->get('message') }}</strong>
                        </div>
                    @endif

					<form method="post" enctype="multipart/form-data"
					action="{{ route('post_upload_document') }}">
					<input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
						<div class="form-group">
						    <h3>Tiêu đề:</h3>
						    <input type="text" class="form-control"
						    placeholder="Nhập tiêu đề" name="txt_tieude">
						</div>

						<div class="form-group">
						    <h3>Nội dung tóm tắt:</h3>
						    <textarea class="form-control" rows="4" name="txt_noidungtt">
						    </textarea>
						</div>
						
						<div class="form-group">
							<h3>Thể loại:</h3>
							<select name="txt_loai" class="form-control" style="width: 40%;">
								<option value="">-- Chọn --</option>

								<option value="Sách">Sách</option>

								<option value="Giáo trình">Giáo trình</option>

								<option value="TT/bào báo khoa học">
									TT/bào báo khoa học
								</option>

								<option value="Báo cáo chuyên đề">
									Báo cáo chuyên đề
								</option>

								<option value="Bài giảng">
									Bài giảng
								</option>

								<option value="Báo cáo tổng quan">
									Báo cáo tổng quan
								</option>
								<option value="Khác">
									Khác
								</option>
							</select>
						</div>
						
						<div class="form-group">
							<h3>Tác giả:</h3>
						    <input type="text" class="form-control" style="width: 50%;"
						    placeholder="Nhập tên tác giả" name="txt_tacgia">
						</div>

						<div class="form-group">
							<h3>Năm xuất bản:</h3>
						    <input type="text" class="form-control" style="width: 50%;"
						    placeholder="Nhập năm xuất bản" name="txt_xuatban">
						</div>

						<div class="form-group">
						    <h3>Nguồn:</h3>
						    <input type="text" class="form-control" style="width: 50%;"
						    placeholder="Nhập trích dẫn nguồn" name="txt_nguon">
						</div>
						<hr>

						<div class="form-group">
						    <h3>Chọn tệp upload file:</h3>
						    <div class="form-group">
	                        	<input type="file" name="file" id="file"/>
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
	                        	<input type="file" name="image" id="cover_image"/>
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
						  	UPLOAD
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