@extends('Customer.master')
@section('title', 'Đăng ký')
@section('noidung_tailieu')

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			
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

	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<div class="panel panel-default" id="dangky">
			<div class="panel-heading">
				<h3 class="panel-title">Đăng ký thành viên</h3>
			</div>
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

			<form action="{{ route('post_register') }}" method="POST">
			<input type="hidden" name="_token" value="{!! csrf_token() !!}"/>

					<div class="form-group">
						<label for="">Họ tên:</label>
						<input type="text" class="form-control" name="txt_hoten" placeholder="Nhập họ tên" id="hover_input" style="width: 60%;" value="{{ old('txt_hoten') }}">

						@if($errors->has('txt_hoten'))
							<span class="help-block">
								<strong>{{ $errors->first('txt_hoten') }}</strong>
							</span>
						@endif

					</div>

					<div class="form-group">
						<label for="">Email:</label>
						<input type="text" class="form-control" name="txt_email" placeholder="Nhập email đăng ký" id="hover_input" style="width: 60%;" value="{{ old('txt_email') }}">

						@if($errors->has('txt_email'))
							<span class="help-block">
								<strong>{{ $errors->first('txt_email') }}</strong>
							</span>
						@endif

					</div>

					<div class="form-group">
						<label for="">Mật khẩu:</label>
						<input type="password" class="form-control" name="txt_matkhau" placeholder="Nhập mật khẩu" id="hover_input" style="width: 60%;">
					</div>

					<div class="form-group">
						<label for="">Địa chỉ:</label>
						<input type="text" class="form-control" name="txt_diachi" placeholder="Nhập Xã/Phường - Huyện/Quận - TP/Tỉnh" id="hover_input">
					</div>

					<div class="form-group">
						<label for="">Tuổi:</label>
						<input type="number" class="form-control" name="txt_tuoi" 
						placeholder="Nhập số tuổi" style="width: 50%;" id="hover_input">
					</div>

					<div class="form-group">
						<label for="">Giới tính:</label>
						<select name="txt_gioi_tinh" class="form-control" 
						style="width: 50%;" id="hover_input">
							<option value="">-- chọn --</option>
							<option value="Nam">Nam</option>
							<option value="Nữ">Nữ</option>
							</select>
					</div>

					<div class="form-group">
						<label for="">Nghề nghiệp:</label>
						<select name="txt_nghenghiep" class="form-control" style="width: 50%;" id="hover_input">
							<option value="">-- chọn --</option>
							<option value="Học sinh hoặc sinh viên">Học sinh hoặc sinh viên</option>
							<option value="Kỹ sư">Kỹ sư</option>
							<option value="Giáo viên hoặc giảng viên">Giáo viên hoặc giảng viên</option>
							<option value="Khác">-- Khác --</option>
						</select>
					</div>
				
					<button type="submit" class="btn btn-primary btn-block" id="btn_upload"
					disabled="disabled">ĐĂNG KÝ</button>
				</form>
			</div>
		</div>
	</div>


	
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		
		<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Điều khoản quy định</strong></h3>
				</div>
				<div class="panel-body" id="body_dieukhoan">
					<p>
						<strong>Điều khoản 1: </strong>Chịu trách nhiệm về nội dung upload nếu có các vấn đề phát sinh về bản quyền. <br>
						<strong>Điều khoản 2: </strong>Tuân thủ các quy định của pháp luật Việt Nam, quy định của Bộ Thông tin và truyền thông, Bộ văn hoá thể thao và du lịch, bộ giáo dục và đào tạo Về sở hữu trí tuệ, quyền tác giả và các quy định có liên quan khác trong lĩnh vực xuất bản. <br>
						<strong>Điều khoản 3: </strong>Các tài liệu vi phạm sẽ bị gỡ bỏ khỏi website. <br>
						<strong>Điều khoản 4: </strong>Ban quản trị website không chịu trách nhiệm với các xung đột lợi ích giữa tác giả và các thành viên trên website.
					</p><br>
					<div class="checkbox" align="right">
						<label>
							<input type="checkbox" value="Đồng ý" id="myCheck" onclick="test_checkbox()">
							Đồng ý điều khoản
						</label>
					</div>
				</div>
			</div>
	
			<script>
				function test_checkbox() {
					var checkbox = document.getElementById('myCheck');
					if (checkbox.checked) {
						document.getElementById("btn_upload").disabled = false;
					} else {
						document.getElementById("btn_upload").disabled = true;
					}
				}
			</script>

	</div>


	

			</div>
		</div>

	</div>
</div>

@endsection