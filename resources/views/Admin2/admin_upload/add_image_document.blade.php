@include('Admin2.header')

	<style type="text/css" media="screen">
		#pannel{
	      border: 1px solid gray;
	      border-radius: 3px;
	    }
	    h4{
	      color: ##2F4F4F;
	    }
	</style>

	<div class="row">
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="pannel"><br>
			<h2 align="center">Thêm tài liệu hình ảnh liên quan:</h2><br>
			<div class="panel panel-default">
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
					action="{{ route('post_add_image_admin') }}">
					{!! csrf_field() !!}
						<div class="form-group">
						    <h4>Tiêu đề:</h4>
						    <input type="text" class="form-control"
						    placeholder="Nhập tiêu đề" name="txt_tieude_image">
						</div>

						
						<div class="form-group">
							<h4>Thể loại:</h4>
							<select name="txt_loai_image" class="form-control"
							style="width: 50%;">
								<option value="">-- Chọn --</option>

								<option value="Sách">
									Hình ảnh về sách
								</option>

								<option value="Giáo trình">
									Hình ảnh giáo trình
								</option>

								<option value="TT/bài báo khoa học">
									Hình ảnh thông tin/bài báo khoa học
								</option>

								<option value="Báo cáo chuyên đề">
									Hình ảnh báo cáo chuyên đề
								</option>

								<option value="Bài giảng">
									Hình ảnh bài giảng
								</option>

								<option value="Báo cáo tổng quan">
									Hình ảnh báo cáo tổng quan
								</option>

								<option value="Khác">
									Khác
								</option>
								
							</select>
						</div>

						<div class="form-group">
						    <h4>Nguồn:</h4>
						    <input type="text" class="form-control"
						    placeholder="Nhập trích dẫn nguồn ảnh" name="txt_nguon_image">
						</div>

						<div class="form-group">
						    <h4>Nội dung về hình ảnh:</h4>
						    <textarea class="form-control" rows="3" name="txt_noidung_image">
						    </textarea>
						</div>
						<hr>

						<div class="form-group">
							<h4>Chọn tệp hình ảnh:</h4>
						    <div class="form-group">
	                        	<input type="file" name="image" id="image"/>
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
						  	THÊM
						  	</button>
						</div>
					</form>
				
					<br>

					 <!--script size ảnh-->
			         <script type="text/javascript">
			         	var uploadField = document.getElementById("image");
						uploadField.onchange = function() {
						    if(this.files[0].size > 2097152){
						       alert("Kích thước hình ảnh bắt buộc nhỏ hơn 2M!");
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
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
		

	</div>
	{{-- end_row --}}

@include('Admin2.footer')