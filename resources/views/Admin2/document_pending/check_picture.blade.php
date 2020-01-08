@include('Admin2.header')
	<style type="text/css" media="screen">
		#pannel{
	      border: 1px solid gray;
	      border-radius: 3px;
	    }
	    h4{
	      color: #2F4F4F;
	    }
	</style>
	<div class="row">
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="pannel"><br>
			<h2 align="center">Thông tin hình ảnh chờ duyệt:</h2><br>
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
					action="checked_picture{!! $load_pictures->id !!}">

					{!! csrf_field() !!}
					{!! method_field('PUT') !!}


						<div class="form-group">
						    <h4>Tiêu đề:</h4>
						    <input type="text" class="form-control"
						    value="{!! $load_pictures->title_file !!}" name="txt_tieude_image">
						</div>

						
						<div class="form-group">
							<h4>Thể loại:</h4>
							<input type="text" class="form-control"
						    value="{!! $load_pictures->kind !!}" name="txt_loai_image">
						</div>

						<div class="form-group">
						    <h4>Nguồn:</h4>
						    <input type="text" class="form-control"
						    value="{!! $load_pictures->source !!}" name="txt_nguon_image">
						</div>

						<div class="form-group">
						    <h4>Nội dung về hình ảnh:</h4>
						    <textarea class="form-control" rows="4"
						    name="txt_noidung_image">{!! $load_pictures->content !!}
						    </textarea>
						</div>
						<hr>

						<div class="form-group">
							<h4>Tệp file hình ảnh:</h4>
							<input type="text" class="form-control"
						    value="{!! $load_pictures->file_name !!}" name="image">

						   {{--  <div class="form-group">
	                        	<input type="file" name="image"
	                        	id="image" value="{!! $image->file_name !!}" />
	                        </div> --}}
						</div>
						
						@if(Auth::check())
							<input type="hidden" name="txt_user"
							value="{!! $load_pictures->id_user_fk !!}">
						@endif
						<br>
				
					    <div class="text-right">
						  	<button type="submit" class="btn btn-primary">
						  	<i class="fas fa-check-double"></i> DUYỆT
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