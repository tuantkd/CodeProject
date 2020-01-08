@extends('Customer.master')
@section('title', 'Thông tin cá nhân')
@section('noidung_tailieu')

<div class="row">
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

		<style type="text/css" media="screen">
			#td1{
				font-size: 20px;
				text-align: right;
				font-family: 'Roboto Slab', serif;
			}
			#td2{
				font-family: 'Roboto Slab', serif;
				font-size: 20px;
				font-weight: bold;
				color: #0080FF;
			}
			th{
				text-align: center;
			}
			#a{
				text-decoration: none;
			}
		</style>
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title" align="center">THÔNG TIN CÁ NHÂN</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive" align="center">
					<table class="table-condensed">
					@if(isset($user_customers))	
					@foreach($user_customers as $user_customer)
						<tr>
							<td id="td1">Họ và tên:</td>
							<td id="td2">{{ $user_customer->name }}</td>
						</tr>
						<tr>
							<td id="td1">Email:</td>
							<td id="td2">{{ $user_customer->email }}</td>
						</tr>
						<tr>
							<td id="td1">Địa chỉ:</td>
							<td id="td2">{{ $user_customer->address }}</td>
						</tr>
						<tr>
							<td id="td1">Tuổi:</td>
							<td id="td2">{{ $user_customer->old }}</td>
						</tr>
						<tr>
							<td id="td1">Giới tính:</td>
							<td id="td2">{{ $user_customer->sex }}</td>
						</tr>
						<tr>
							<td id="td1">Nghề nghiệp:</td>
							<td id="td2">{{ $user_customer->job }}</td>
						</tr>
					@endforeach
					@endif
					</table>
				</div>
				<!--table1-->
			</div>
			<!--body_panel-->
		</div>

	</div>
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
</div>



<div class="alert alert-danger" style="width: 55%;">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Lưu ý: </strong> Tài liệu và hình ảnh của bạn được hiển thị trên trang sau khi admin eeps duyệt!
</div>


<div class="row">
	<div class="container-fluid">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">
			TÀI LIỆU CỦA BẠN
			</h3>
		</div>
		<div class="panel-body">
			
			@if(session()->has('message'))
                <div class="alert alert-success" style="width: 20%;" align="center">
                    <strong>{{ session()->get('message') }}</strong>
                </div>
            @endif

			<div class="table-responsive" align="center">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tiêu đề</th>
							<th>Tài liệu</th>
							<th>Nội dung</th>
							<th>Năm xuất bản</th>
							<th>Tác giả</th>
							<th>Nguồn</th>
							<th>Thể loại</th>
							<th>Ảnh bìa</th>
							<th>Ngày tải lên</th>
							<th colspan="2">Tùy chọn</th>
						</tr>
					</thead>
					<tbody>

					@php($document_users = DB::table('document__pendings')
					->where('id_user_fk', $user_customer->id)->get())
					
					<?php $i=1; ?>
					@if(isset($document_users))
					@foreach($document_users as $document_user)
					
						<tr align="center">
						
							<td><?php echo $i++; ?></td>

							<td>{{ $document_user->title_file }}</td>

							<td>
							<a href="view_pdf_personal{{ $document_user->id }}" id="a">
								{{ $document_user->file_name }}
							</a>
							</td>

							<td>{{ $document_user->content }}</td>

							<td>{{ $document_user->publish }}</td>

							<td>{{ $document_user->author }}</td>

							<td>{{ $document_user->source }}</td>

							<td>{{ $document_user->kind }}</td>

							<td>
							<a href="view_pdf_personal{{ $document_user->id }}">
								<img src="{!! URL::to('public/upload_file_images/'
		                        .$document_user->file_cover_image) !!}" 
		                        alt="Ảnh bìa tài liệu" style="width: 100px; height: 120px;">
		                    </a>
							</td>

							<td>
								{!! date("d-m-Y", strtotime($document_user->created_at)) !!}
							</td>


							<td>
								<a class="btn btn-primary" data-toggle="tooltip" title="Chỉnh sửa"
								href="edit_document_personal{{ $document_user->id }}" role="button">
								<i class="fas fa-edit"></i></a>
							</td>

							<td>
								<a class="btn btn-danger" data-toggle="tooltip" title="Xóa"
								href="delete_document_personal{{ $document_user->id }}"
								role="button" 
								onclick="return xacnhanxoa('Bạn có chắc chắn xóa không?')">
								<i class="fas fa-trash-alt"></i></a>
							</td>

						
						</tr>
					
					@endforeach
					@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
</div>


<!--HIỆN THÔNG TIN-->
<script>
	$(document).ready(function(){
	  $('[data-toggle="tooltip"]').tooltip();   
	});
</script>
<!--HIỆN THÔNG TIN-->

<!--XÁC NHẬN XÓA-->
<script type="text/javascript">
	function xacnhanxoa(msg){
	  if(window.confirm(msg)){
	    return true;
	  }
	  return false;
	}
</script>
<!--XÁC NHẬN XÓA-->




<div class="row">
	<div class="container-fluid">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">
			HÌNH ẢNH CỦA BẠN
			</h3>
		</div>
		<div class="panel-body">
			
			@if(session()->has('message_image'))
                <div class="alert alert-success" style="width: 20%;" align="center">
                    <strong>{{ session()->get('message_image') }}</strong>
                </div>
            @endif

			<div class="table-responsive" align="center">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tiêu đề</th>
							<th>Nội dung</th>
							<th>Nguồn</th>
							<th>Thể loại</th>
							<th>Hình ảnh</th>
							<th>Ngày tải lên</th>
							<th colspan="2">Tùy chọn</th>
						</tr>
					</thead>
					<tbody>

					@php($image_users = DB::table('document_image_pendings')
					->where('id_user_fk', $user_customer->id)->get())
					
					<?php $i=1; ?>
					@foreach($image_users as $image_user)
					
						<tr align="center">
						
							<td><?php echo $i++; ?></td>

							<td>{{ $image_user->title_file }}</td>

							<td>{{ $image_user->content }}</td>

							<td>{{ $image_user->source }}</td>

							<td>{{ $image_user->kind }}</td>

							<td>
							<a href="view_picture_personal{{ $image_user->id }}">
								<img src="{!! URL::to('public/upload_document_images/'
		                        .$image_user->file_name) !!}" 
		                        data-toggle="tooltip" title="Click xem hình ảnh"
		                        alt="Hình ảnh" style="width: 120px; height: 140px;">
		                    </a>
							</td>

							<td>
								{!! date("d-m-Y", strtotime($image_user->created_at)) !!}
							</td>

							<td>
								<a class="btn btn-primary" data-toggle="tooltip" title="Chỉnh sửa"
								href="edit_picture_personal{{ $image_user->id }}" role="button">
								<i class="fas fa-edit"></i></a>
							</td>

							<td>
								<a class="btn btn-danger" data-toggle="tooltip" title="Xóa"
								href="delete_picture_personal{{ $image_user->id }}"
								role="button" 
								onclick="return xacnhanxoa('Bạn có chắc chắn xóa không?')">
								<i class="fas fa-trash-alt"></i></a>
							</td>
						
						</tr>
					
					@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
</div>






<div class="row">
	<div class="container-fluid">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">
			VIDEO CỦA BẠN
			</h3>
		</div>
		<div class="panel-body">
			
			@if(session()->has('message_video'))
                <div class="alert alert-success" style="width: 20%;" align="center">
                    <strong>{{ session()->get('message_video') }}</strong>
                </div>
            @endif

			<div class="table-responsive" align="center">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tiêu đề</th>
							<th>Nội dung</th>
							<th>Video</th>
							<th>Ngày tải lên</th>
							<th colspan="2">Tùy chọn</th>
						</tr>
					</thead>
					<tbody>

					@php($video_users = DB::table('document_video_pendings')
					->where('id_user_fk', $user_customer->id)->get())
					
					<?php $i=1; ?>
					@foreach($video_users as $video_user)
					
						<tr align="center">
						
							<td><?php echo $i++; ?></td>

							<td>{{ $video_user->title_file }}</td>

							<td>{{ $video_user->source }}</td>

							<td>
								<div class="embed-responsive embed-responsive-16by9">
									{!! $video_user->code_iframe_youtb !!}
								</div>
							</td>

							<td>
								{!! date("d-m-Y", strtotime($video_user->created_at)) !!}
							</td>

							<td>
								<a class="btn btn-primary" data-toggle="tooltip" title="Chỉnh sửa"
								href="edit_video_personal{{ $video_user->id }}" role="button">
								<i class="fas fa-edit"></i></a>
							</td>

							<td>
								<a class="btn btn-danger" data-toggle="tooltip" title="Xóa"
								href="delete_video_personal{{ $video_user->id }}"
								role="button" 
								onclick="return xacnhanxoa('Bạn có chắc chắn xóa không?')">
								<i class="fas fa-trash-alt"></i></a>
							</td>
						
						</tr>
					
					@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
</div>






@endsection