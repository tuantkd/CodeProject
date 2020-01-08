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
			<h2 align="center">Cập nhật tài liệu hình ảnh liên quan:</h2><br>
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
					action="get_update_image_admin{!! $image->id !!}">

					{!! csrf_field() !!}
					{!! method_field('PUT') !!}


						<div class="form-group">
						    <h4>Tiêu đề:</h4>
						    <input type="text" class="form-control"
						    value="{!! $image->title_file !!}" name="txt_tieude_image">
						</div>

						
						<div class="form-group">
							<h4>Thể loại: {!! $image->kind !!}</h4>
						</div>

						<div class="form-group">
						    <h4>Nguồn:</h4>
						    <input type="text" class="form-control"
						    value="{!! $image->source !!}" name="txt_nguon_image">
						</div>

						<div class="form-group">
						    <h4>Nội dung về hình ảnh:</h4>
						    <textarea class="form-control" rows="3"
						    name="txt_noidung_image">{!! $image->content !!}
						    </textarea>
						</div>
						<hr>

						<div class="form-group">
							<h4>Chọn tệp hình ảnh:</h4>
						    <div class="form-group">
	                        	<input type="file" name="image"
	                        	id="image" value="{!! $image->file_name !!}" />
	                        </div>
						</div>
						
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