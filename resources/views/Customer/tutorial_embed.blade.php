@extends('Customer.master')
@section('title', 'Upload video')
@section('noidung_tailieu')

	<div class="row">

		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>

		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Hướng dẫn nhúng video từ Youtube</h3>
				</div>
				<div class="panel-body">
					
					<div class="form-group">
						<strong>Bước 1: Click chuột chọn biểu tượng trang nhúng video youtube</strong>
						<img src="public/tutorial_image/b1.PNG" class="img-responsive">
						
					</div>
					
					<div class="form-group">
						<strong>
							Bước 2: Lên trang youtube muốn nhúng video nào, kéo xuống click chọn biểu tượng
						</strong>
						<img src="public/tutorial_image/b2.PNG" class="img-responsive">
					</div>
					
					<div class="form-group">
						<strong>Bước 3: Tìm biểu tượng click vào! </strong>
							<img src="public/tutorial_image/b3.PNG" class="img-responsive"> 
					</div>
					
					<div class="form-group">
						<strong>
							Bước 4: Click coppy mã code iframe và paste vào khung source ở Bước 1.
						</strong>
						<img src="public/tutorial_image/b4.PNG" class="img-responsive">
					</div>
						
					<div class="form-group">
						<strong>Bước 5: Hoàn thành và nhúng video lên trang.</strong>
						<img src="public/tutorial_image/b5.PNG" class="img-responsive">
					</div>
						

					<div class="text-right">
						<a class="btn btn-primary" href="{!! URL::to('get_upload_video') !!}" 
						role="button">Quay về trang nhúng video youtube</a>
					</div>
				
				</div>
			</div>
			
		</div>
		{{-- end_col1 --}}

		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
		{{-- end_col2 --}}

	</div>

@endsection