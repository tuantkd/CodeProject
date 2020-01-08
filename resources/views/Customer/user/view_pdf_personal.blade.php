<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Xem PDF cá nhân</title>
	<link rel="icon" type="image/ico" href="public/admin_new/images/image_icon_title.png"/>
</head>
<body>

	<div class="container-fluid">
		
		@foreach($pdfs as $pdf)
		<embed src="{{ asset('public/upload_file/'.$pdf->file_name) }}"
		width="100%" height="1200px" type="application/pdf">
		@endforeach

	</div>
	
</body>
</html>