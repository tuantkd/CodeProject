@extends('Customer.master')
@section('title', 'Cập nhật video')
@section('noidung_tailieu')

	<div class="row">
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title" align="center">Cập nhật video:</h3>
				</div>
				<div class="panel-body">


					@if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

            
					<form method="post" enctype="multipart/form-data"
					action="update_video_personal{{ $edit_video_personal->id }}">

					{!! csrf_field() !!}
            		{!! method_field('PUT') !!}

						<div class="form-group">
						    <h3>Tiêu đề:</h3>
						    <input type="text" class="form-control"
						    value="{{ $edit_video_personal->title_file }}" name="txt_tieude">
						</div>

						<div class="form-group">
						    <h3>Nguồn:</h3>
						    <input type="text" class="form-control"
						    value="{{ $edit_video_personal->source }}" name="txt_nguon">
						</div>
						<hr>

						<div class="form-group">
						    <h3>Nhúng video Youtube (<a href="{{ URL::to('tutorial_embed') }}">Click để xem hướng dẫn!</a>):
						    </h3>
						    <textarea class="form-control" name="txt_noidung">{!! $edit_video_personal->code_iframe_youtb !!}
						    </textarea>
						</div>
						
						@if(Auth::check())
							<input type="hidden" name="txt_user"
							value="{!! Auth::user()->id !!}">
						@endif
						<br>
				
					    <div class="text-right">
						  	<button type="submit" class="btn btn-primary">
						  	CẬP NHẬT
						  	</button>
						</div>
					</form>
					

				</div>
				{{-- end_panel-body --}}
			</div>
			{{-- end_panel panel-default --}}

		</div>
		{{-- end_col1 --}}

		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>{{-- end_col2 --}}

	</div>

@endsection