@extends('Customer.master')
@section('title', 'Hình ảnh')



@section('banner')

@php( $images = DB::table('image_banners')->get())
<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ol class="carousel-indicators">
	    @foreach($images as $item)
	        <li data-target="#myCarousel" data-slide-to="{{ $loop->index }}"
	            class="{{ $loop->first ? ' active' : '' }}"></li>
	    @endforeach
	</ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      	@foreach($images as $item)
		    <div class="item {{ $loop->first ? ' active' : '' }}">

		        <img src="{{ asset('public/image_banner/' .$item->image) }}"
		        style="width: 1002px; height:200px;">
		        <div class="carousel-caption">
		        	<h3>{{ $item->title }}</h3>
	          		
		        </div>
		    </div>
		@endforeach
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

@endsection






{{-- ============================================================================ --}}
@section('thongbao')

	<style type="text/css">
	    #link_thongtin{
	      color: #4682B4;
	      font-style: italic;
	    }
	    h3{
	      margin: auto;
	    }
	</style>

	<div class="panel panel-info">
      <div class="panel-heading">
        <h3 align="center">Thông tin nổi bật</h3>
      </div>
      <div class="panel-body">
        <div class="list-group">
          
          @php( $infos = DB::table('infomations')->get())  
          @foreach($infos as $value)
          <a href="{!! URL::to('view_infomation') !!}" class="list-group-item" id="link_thongtin">
            <i class="fas fa-chevron-right"></i> 
            {!! $value->title !!}
          </a>
          @endforeach

        </div>
      </div>
  </div>

@endsection








{{-- ======================================================================== --}}
@section('noidung_tailieu')
	<style type="text/css">
		#img{
			width: 100%;
			height: 95%;
		}
	</style>

	<div class="row">

		<!--Form tìm kiếm-->
		<form class="form-inline" method="GET" action="{{ route('view_list_picture') }}">
			{{ csrf_field() }}
		    <div class="text-left">
		      <input type="text" name="txt_timkiem" class="form-control" 
		      placeholder="Nhập từ khóa tìm kiếm ...">

		    <button type="submit" class="btn btn-success"> 
			    <i class="fas fa-search"></i>&nbsp;
				Tìm kiếm
			</button>

		    </div>
		</form><hr>
		<!--Form tìm kiếm-->

		


		<!--col1 hiển thị hình ảnh -->
		<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
			<div class="row">
				
				@if(isset($image_books))
				@foreach($image_books as $image_book)
					
					@php($users = DB::table('users')->where('id', $image_book->id_user_fk)->get())
					<div class="panel panel-success">
						<div class="panel-body">

							<h2>{!! $image_book->title_file !!}</h2>
							
	                        <p>
								<i class="fas fa-user"></i>&nbsp;
								<strong style="color: #5B63FB;">
								@foreach($users as $user)	
									{!! $user->name !!}
								@endforeach	
								</strong> |

								<i class="far fa-calendar-alt"></i>&nbsp;
								<strong style="color: #DC5546;">
									{!! date("d-m-Y", strtotime($image_book->created_at)) !!}
								</strong>
	                        </p><br>
							
						<div class="row">	
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="detail_picture{{ $image_book->id }}" style="text-decoration: none;">

								<img src="{{ asset('public/upload_document_images/'
								.$image_book->file_name) }}"
								class="img-responsive" id="img">
								<br>
								<p align="center" style="font-size: 18px;">
									{!! $image_book->content !!}
								</p>
							</a>
							</div>
						</div>
							
						</div>
					</div>
				@endforeach
				@endif
				

				<!--row hiển thị số phân trang nằm trong col-->
				<div class="row" align="center">
				@if(isset($image_books))
					<nav>
					    <ul class="pagination justify-content-end"> 
					        {{ $image_books->links('vendor.pagination.bootstrap-4') }}
					    </ul>
					</nav>
				@endif
				</div>
				<!--row hiển thị số phân trang nằm trong col-->

			</div> 
		
		</div>
		<!--col7-->


		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			{{-- <div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Hình liên quan</h3>
				</div>
				<div class="panel-body">
					<ol>
						<a href="#"><li>Hình hoạt động giải trí</li></a>
						<a href="#"><li>Hình nghiên cứu khoa học</li></a>
						<a href="#"><li>Ảnh thực tập nghiên cứu sinh</li></a>
					</ol>
				</div>
			</div> --}}
		</div>
		<!--col4-->

	</div>
	<!--row1--> 




	<!--Form bình luận -->
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12col-lg-12">
			<form action="{{ route('post_comment_image', $image_book->id) }}"
			method="POST" role="form">
				{{ csrf_field() }}
			
				<div class="form-group">
					<label for="">Bình luận:</label><br>
					<textarea name="txt_binhluan"  rows="3" 
						required="required" style="width: 60%;">
					</textarea>
				</div>

				@if(Auth::check())
					<input type="hidden" name="txt_id_user" value="{{ Auth::user()->id }}">
				@endif

				<input type="hidden" name="txt_id_image" value="{{ $image_book->id }}">

				@if(Auth::check())
					<button type="submit" class="btn btn-primary">Bình luận</button>
				@else
					<a class="btn btn-primary"
					onclick="return comment('Vui lòng đăng nhập để bình luận tài liệu!')"
					href="{{ URL::to('get_login') }}" 
					role="button"> Bình luận
					</a>
				@endif
			</form>
		</div>
	</div><br>
	<!--Form bình luận -->



	
	<!--Đăng nhập mới cho bình luận-->
	<script type="text/javascript">
		function comment(msg){
		    if(window.confirm(msg)){
		      	return true;
		    }
		    	return false;
		}
	</script>
	<!--Đăng nhập mới cho bình luận-->



	<!--Hiển thị bình luận ra trang hiện tại-->
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!--Đếm số bình luận trang hiện tại-->
			@php($count = DB::table('comments')
			->where('id_image_fk', $image_book->id)->count())
			<h3>Danh sách bình luận: ({{ $count }})</h3><br>





			<!--Lấy tất cả các bình luận của id tài liệu hiện tại-->
			@php($comment_images = DB::table('comments')
			->where('id_image_fk', $image_book->id)->get())
		
			@foreach($comment_images as $comment_image)
			@php($users = DB::table('users')->where('id', $comment_image->id_user_fk)->get())

			<div class="alert"
			style="background-color: white; width: 50%; border: 0.5px solid gray;">
				@foreach($users as $user)
					<strong>
						<i class="far fa-user"></i>&nbsp;{{ $user->name }}
					</strong>
				@endforeach
				&nbsp;|&nbsp;
				<i class="fas fa-calendar-alt"></i>&nbsp;
				<strong>
					{!! date("d-m-Y", strtotime($comment_image->created_at)) !!}
				</strong>
			
				<br>
				&emsp;
				<p style="font-style: italic;">{{ $comment_image->content }}</p><br>
			
				<div class="text-right">
					@if(Auth::check())
					    <button type="button" class="btn btn-primary btn-sm"
					    data-id="" data-toggle="tooltip" title="Trả lời">
					    	<i class="fas fa-reply"></i>
					    </button>
				    @else
				    @endif
				</div>

				<form class="comment_reply" data-id=""
				method="post" action="{{ route('post_reply_comment_image', $image_book->id) }}">
				{{ csrf_field() }}
					<div class="form-group">
					<textarea class="form-control" rows="2" name="txt_binhluan" class="post_rep">
				    </textarea>
					</div>

					@if(Auth::check())
						<input type="hidden" name="txt_id_user" value="{{ Auth::user()->id }}">
					@endif

					<input type="hidden" name="txt_id_image" value="{{ $image_book->id }}">

					<input type="hidden" name="txt_id_comment" value="{{ $comment_image->id }}">

				    <div class="text-right">
					    <button type="submit" class="btn btn-primary" class="post_rep_sub">
					    Bình luận
						</button>
				    </div>
				</form>
			</div>
			@endforeach
			<!--Lấy tất cả các bình luận của id tài liệu hiện tại-->






			<!--Trả lời người bình luận hiển thị ra trang-->
			@php($reply_comment_images = DB::table('reply_comments')
			->where('id_image_fk', $image_book->id)->get())

			@foreach($reply_comment_images as $comment_image)
			@php($users = DB::table('users')->where('id', $comment_image->id_user_fk)->get())

			<div class="alert"
			style="background-color: #E0F8EC; width: 50%; border: 0.5px solid gray;">
				@foreach($users as $user)
					<strong>
						<i class="far fa-user"></i>&nbsp;{{ $user->name }} 
					</strong>
					đã trả lời
				@endforeach
				&nbsp;|&nbsp;
				<i class="fas fa-calendar-alt"></i>&nbsp;
				<strong>
					{!! date("d-m-Y", strtotime($comment_image->created_at)) !!}
				</strong>
		
				
				<br><br>
				<p style="font-style: italic;">{{ $comment_image->content_reply }}</p><br>

				@php($comments = DB::table('comments')
				->where('id', $comment_image->id_comment_fk)->get())
				@foreach($comments as $comment)
				<p style="font-style: italic;">Nội dung:&nbsp;{{ $comment->content }}</p>
				@endforeach
				
			</div>
			@endforeach
			<!--Trả lời người bình luận hiển thị ra trang-->


			
		</div>
	</div>
	<!--Hiển thị bình luận ra trang hiện tại-->

	<style type="text/css">
		form.comment_reply{
		  display: none;
		}
	</style>

	<!--Hiện thông tin-->
    <script>
      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
      });
    </script>
    <!--Hiện thông tin-->

	<!--Hiện thông tin-->
    <script>
      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
      });
    </script>
    <!--Hiện thông tin-->
	
	<!--Hiện thông tin form trả lời-->
    <script type="text/javascript">
    	$(document).on('click' , '.btn-sm' , function(){
		   var closestDiv = $(this).closest('div'); //bạn cũng có thể sử dụng $(this).parent();
		   closestDiv.fadeOut();
		   closestDiv.next('form').show();
		});
    </script>
    <!--Hiện thông tin form trả lời-->

@endsection