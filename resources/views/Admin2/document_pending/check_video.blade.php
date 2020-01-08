@include('Admin2.header')
	<style type="text/css" media="screen">
		#pannel{
	      border: 1px solid gray;
	      border-radius: 3px;
	    }
	    h4{
	      color: #2F4F4F;
	    }
	</style>
	<div class="row">
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="pannel"><br>
			<h2 align="center">Thông tin video chờ duyệt:</h2><br>
			<div class="panel panel-default">
				<div class="panel-body">

					<form action="checked_video{!! $load_videos->id !!}" method="POST">
					{!! csrf_field() !!}
					{!! method_field('PUT') !!}

						<div class="form-group">
						    <h4>Tiêu đề:</h4>
						    <input type="text" class="form-control"
						    value="{!! $load_videos->title_file !!}" name="txt_tieude_video">
						</div>

						<div class="form-group">
						    <h4>Nguồn:</h4>
						    <input type="text" class="form-control"
						    value="{!! $load_videos->source !!}" name="txt_nguon_video">
						</div>
						<hr>

						<div class="form-group">
						    <h4>
						    	Nhúng video Youtube (click [Source] bên góc trái):
						    </h4>
						    <textarea class="form-control"
						    name="content">{!! $load_videos->code_iframe_youtb !!}
						    </textarea>
						</div>
						
						@if(Auth::check())
							<input type="hidden" name="txt_user"
							value="{!! $load_videos->id_user_fk !!}">
						@endif
				
					    <div class="text-right">
						  	<button type="submit" class="btn btn-primary">
						  	<i class="fas fa-check-double"></i> DUYỆT
						  	</button>
						</div>
					</form><br>
					

				</div>
				{{-- end_panel-body --}}
			</div>
			{{-- end_panel panel-default --}}

		</div>
		{{-- end_col1 --}}

		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
		{{-- end_col2 --}}

	</div>

@include('Admin2.footer')