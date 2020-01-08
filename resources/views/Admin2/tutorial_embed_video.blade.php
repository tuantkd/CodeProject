@include('Admin2.header')
	<div class="row">
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" style="background-color: #B0E0E6;">

			<div class="panel panel-default"><br>
				<h2>Hướng dẫn nhúng video từ Youtube</h2>
				<div class="panel-body">
				<p>
					<strong>Bước 1: Click chuột chọn biểu tượng trang nhúng video youtube
					<img src="public/tutorial_image/b1.PNG"> <br><br>
					</strong>

					<strong>Bước 2: Lên trang youtube muốn nhúng video nào, kéo xuống click chọn biểu tượng <img src="public/tutorial_image/b2.PNG"> <br><br>
					</strong>

					<strong>Bước 3: Tìm biểu tượng <img src="public/tutorial_image/b3.PNG"> 
						click vào! <br><br>
					</strong>

					<strong>Bước 4: Click coppy mã code iframe 
						<img src="public/tutorial_image/b4.PNG"> <br>
						và paste vào khung source ở Bước 1.
						<br><br>
					</strong>


					<strong>Bước 5: Hoàn thành và nhúng video lên trang. <br><br>
						<img src="public/tutorial_image/b5.PNG"> <br>
						<br><br>
					</strong>

					<a class="btn btn-primary" href="{!! URL::to('get_add_embed_video') !!}" 
					role="button">Quay về trang nhúng video youtube</a>
				</p>
				</div>
			</div>
			
		</div>
		{{-- end_col1 --}}

		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
		{{-- end_col2 --}}

	</div>

@include('Admin2.footer')