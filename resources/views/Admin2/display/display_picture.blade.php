<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Hình ảnh</title>
	<link rel="icon" type="image/ico" href="public/admin_new/images/image_icon_title.png" />
</head>
<body style="background-color: black;">

	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center"><br>

				@if(isset($pictures))
				@foreach($pictures as $picture)

				<img src="{{ URL::to('public/upload_document_images/'.$picture->file_name) }}" 
                alt="Hình ảnh" class="img-responsive" style="width: 90%; height: 100%;">

				@endforeach
				@endif
			</div>
		</div>
	</div>

</body>
</html>