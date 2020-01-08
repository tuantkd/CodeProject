<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Xem banner</title>
	<link rel="icon" type="image/ico" href="public/admin_new/images/image_icon_title.png" />
</head>
<body style="background-color: black;">

	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center"><br><br>
				@if(isset($banners))
				@foreach($banners as $banner)

					<img id="myimage" src="{!! URL::to('public/image_banner/' .$banner->image) !!}"
					alt="Banner web" style="width:90%; height=100%;">

				@endforeach
				@endif
			</div>
		</div>
	</div>

</body>
</html>