<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Xem tài liệu PDF</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				@foreach($pdf_lessons as $pdf_lesson)
					<embed src="{!! asset('public/upload_file/'.$pdf_lesson->file_name) !!}"
					width="100%" height="1000px" type="application/pdf">
					
				@endforeach

			</div>
		</div>
	</div>
</body>
</html>