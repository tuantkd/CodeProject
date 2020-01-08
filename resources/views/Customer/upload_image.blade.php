@extends('Customer.master')
@section('title', 'Upload hình ảnh')
@section('noidung_tailieu')

	<div class="row">
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<div class="panel panel-primary"=>
				<div class="panel-heading">
					<h3 class="panel-title" align="center">Upload hình ảnh:</h3>
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
                            {{ session()->get('message') }}
                        </div>
                    @endif

					<form method="post" enctype="multipart/form-data"
					action="{{ route('post_upload_image') }}">
					{!! csrf_field() !!}
						<div class="form-group">
						    <h3>Tiêu đề:</h3>
						    <input type="text" class="form-control"
						    placeholder="Nhập tiêu đề" name="txt_tieude">
						</div>

						
						<div class="form-group">
							<h3>Thể loại:</h3>
							<select name="txt_loai" class="form-control" style="width: 50%;">
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
						    <h3>Nguồn:</h3>
						    <input type="text" class="form-control"
						    placeholder="Nhập trích dẫn nguồn ảnh" name="txt_nguon">
						</div>

						<div class="form-group">
						    <h3>Nội dung về hình ảnh:</h3>
						    <textarea class="form-control" rows="3" name="txt_nd">
						    </textarea>
						</div>
						<hr>

						<div class="form-group">
							<h3>Chọn tệp hình ảnh:</h3>
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
						  	UPLOAD
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