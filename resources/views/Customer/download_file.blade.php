<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Download</title>
	<link rel="icon" type="image/ico" href="public/admin_new/images/image_icon_title.png"/>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Bai Jamjuree' rel='stylesheet'>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid text-center">
		<div class="row">
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8"><br>
				
				<div class="panel panel-primary">
					<div class="panel-body">
						@if(isset($downloads))
						@foreach($downloads as $download)

						<h2>Bạn muốn tải tài liệu xuống. Nhấp vào nút bên dưới!</h2><br>
						
						<a class="btn btn-success btn lg" download="{{ $download->file_name }}" 
						href="#" role="button">Download</a>

						@endforeach
						@endif
					</div>
				</div>


			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
		</div>
	</div>
</body>
</html>