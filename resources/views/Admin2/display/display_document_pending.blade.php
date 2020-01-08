<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PDF chờ duyệt</title>
	<link rel="icon" type="image/ico" href="public/admin_new/images/image_icon_title.png" />
</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">

				@if(isset($document_pendings))
				@foreach($document_pendings as $document)

					<embed src="{!! asset('public/upload_file/'.$document->file_name) !!}"
					width="100%" height="1000px" type="application/pdf">

				@endforeach
				@endif
			</div>
		</div>
	</div>

</body>
</html>