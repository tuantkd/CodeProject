<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Xem hình ảnh cá nhân</title>
	<link rel="icon" type="image/ico" href="public/admin_new/images/image_icon_title.png"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Bai Jamjuree' rel='stylesheet'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>
<body style="background-color: black;">
	<style type="text/css" media="screen">
		#img_personal{
			width: 90%;
			height: 100%;
		}
	</style>
	<div class="container-fluid">
		<div class="row" align="center">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><br>
				@foreach($images as $image)
				<img src="{{ asset('public/upload_document_images/'.$image->file_name) }}"
				class="img-responsive" id="img_personal">
				@endforeach
			</div>
		</div>
	</div>
</body>
</html>