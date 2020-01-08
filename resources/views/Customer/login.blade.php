@extends('Customer.master')
@section('title', 'Đăng nhập')
@section('noidung_tailieu')

<div class="row">
				
	<style type="text/css" media="screen">
		#hover_input:hover{
			border: 1px solid #1E90FF;
		}
		#info_error{
			color: red;
			margin-left: 5px; 
			font-style: italic;
		}
	</style>

	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>

	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<div class="panel panel-primary" id="dangky">
			<div class="panel-body" id="body_panel">

				@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif

				@if(session('thongbao'))
					<div class="alert alert-success">
						{{ session('thongbao') }}
					</div>
				@endif

			<form action="{{ route('post_login') }}" method="POST" role="form">
			<input type="hidden" name="_token" value="{!! csrf_token() !!}"/>

					<div class="form-group">
						<label for="">Họ tên:</label>
						<input type="text" class="form-control" name="txt_name"
						placeholder="Nhập tên email đăng ký" id="hover_input">
					</div>

					<div class="form-group">
						<label for="">Mật khẩu:</label>
						<input type="password" class="form-control" name="txt_pass" placeholder="Nhập mật khẩu" id="hover_input">
					</div>

					<div class="checkbox">
						<label>
							<input type="checkbox" value="remember">
							Nhớ tôi
						</label>
					</div>

					<button type="submit" class="btn btn-primary btn-block">ĐĂNG NHẬP</button>
					<br>
					<a href="{!! URL::to('get_register') !!}"
					style="text-decoration: none; color: blue;">Tạo tài khoản mới!</a>
					<br>
					<a href="{{ route('password.request') }}" 
					style="text-decoration: none; color: blue;">Quên mật khẩu!</a>

				</form>
			</div>
		</div>
	</div>
	
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
			
</div>

@endsection