@extends('Customer.master')
@section('title', 'Upload video')
@section('noidung_tailieu')

	<div class="row">
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title" align="center">Upload hoặc nhúng video từ youtube:</h3>
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

                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif



					<form method="post" enctype="multipart/form-data"
					action="{{ route('post_upload_video') }}">
					{!! csrf_field() !!}
						<div class="form-group">
						    <h3>Tiêu đề:</h3>
						    <input type="text" class="form-control"
						    placeholder="Nhập tiêu đề" name="txt_tieude">
						</div>

						<div class="form-group">
						    <h3>Nguồn:</h3>
						    <input type="text" class="form-control"
						    placeholder="Nhập trích dẫn nguồn" name="txt_nguon">
						</div>
						<hr>

						<div class="form-group">
						    <h3>Nhúng video Youtube (<a href="{{ URL::to('tutorial_embed') }}">Click để xem hướng dẫn!</a>):
						    </h3>
						    <textarea class="form-control" name="txt_noidung">
						    </textarea>
						</div>
						
						@if(Auth::check())
							<input type="hidden" name="txt_user"
							value="{!! Auth::user()->id !!}">
						@endif
						<br>
				
					    <div class="text-right">
						  	<button type="submit" class="btn btn-primary">
						  	UPLOAD / NHÚNG
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