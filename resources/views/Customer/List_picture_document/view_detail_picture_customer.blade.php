<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Chi tiết hình ảnh</title>
	<link rel="icon" type="image/ico" href="public/admin_new/images/image_icon_title.png" />
</head>
<body style="background-color: black;">

	<div class="container-fluid text-center">
		
		<style type="text/css">
			#img_large{
				width: 80%;
				height: 100%;
			}
		</style>

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
				@if(isset($image_details))
				@foreach($image_details as $image_curriculum)
					
				<img src="{{ asset('public/upload_document_images/'.$image_curriculum->file_name) }}"
				class="img-responsive" id="img_large">
								
					 
				@endforeach
				@endif

			</div>
		</div>
		<!--row1-->

	</div>

</body>
</html>





	



