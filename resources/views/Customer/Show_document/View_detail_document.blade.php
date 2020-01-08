@extends('Customer.master')
@section('title', 'Tài liệu')

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














{{-- ======================================================= --}}
@section('noidung_tailieu')
	
	<style type="text/css" media="screen">
		#hinhanh{
			width: 95%;
			height: 80%;
			margin: auto;
			padding: 0px;
			border-radius: 5px;
			box-shadow: 0.5px 3px 7px #888888;
		}
	</style>

	<!--CSS đánh giá sao-->
	<style type="text/css" media="screen">
		div.stars {
		  width: 270px;
		  display: inline-block;
		}
		 
		input.star { display: none; }
		 
		label.star {
		  float: right;
		  padding: 10px;
		  font-size: 36px;
		  color: #444;
		  transition: all .2s;
		}
		 
		input.star:checked ~ label.star:before {
		  content: '\f005';
		  color: #FD4;
		  transition: all .25s;
		}
		 
		input.star-5:checked ~ label.star:before {
		  color: yellow;
		  text-shadow: 0 0 5px gray;
		}
		 
		input.star-1:checked ~ label.star:before { color: #F62; }
		 
		label.star:hover { transform: rotate(-15deg) scale(1.3); }
		 
		label.star:before {
		  content: '\f006';
		  font-family: FontAwesome;
		}

	</style>
	<!--CSS đánh giá sao-->



	<div class="row">
		@if(isset($documents))
		@foreach($documents as $document)
		
		<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
			<!--Tiêu đề tài liệu-->
			<span style="color: blue; font-size: 28px;">
				{!! $document->title_file !!}
			</span><br><br>
			

			<!--Người đăng tài liệu-->
			@php($users = DB::table('users')->where('id', $document->id_user_fk)->get()) 
			@foreach($users as $user)
                Đăng bởi: <strong style="color: #04B4AE;">{!! $user->name !!}</strong> 
            @endforeach 
			

			<!--Ngày đăng tài liệu-->
            | Ngày đăng: 
            <strong style="color: #DF0101;">
            	{!! date("d-m-Y", strtotime($document->created_at)) !!}
            </strong>

            <!--Ngày cập nhật-->
            | Ngày cập nhật:
            <strong style="color: #DF0101;">
            	{!! date("d-m-Y", strtotime($document->updated_at)) !!}
            </strong>


            

			



			{{-- <div class="fb-share-button" data-href="https://eevnps.org/view_detail_document{{ $document->id }}" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a>
			</div> --}}


			

			<!--Lượt xem và tải tài liệu-->
			<div class="text-right" style="margin-right: 10px;">

				<i class="fas fa-eye"></i> <span id="xem"></span>&emsp;
				
				<!--Tổng lượt tải về-->
				@php($total_down = DB::table('count_downloads')
                ->where('id_document_fk', '=', $document->id)->sum('count_download'))

            	<i class="fas fa-download"></i> {{ $total_down }}


            	<!--Đếm lượt xem load-->
				<script type="text/javascript">
					var n = localStorage.getItem('on_load_counter');
				    if (n === null){
				        n = 0;
				    }
				    n++;
				    localStorage.setItem("on_load_counter", n);
				    document.getElementById('xem').innerHTML = n;

				    //Đặt giá trị lượt xem đến con số nào đó và lặp lại
				    //localStorage.removeItem('on_load_counter');
				</script>
				<!--Đếm lượt xem load--> 

				&emsp;
				<div class="fb-like" data-href="https://eevnps.org/view_detail_document{{ $document->id }}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>

			</div>



			<!--Đánh giá 5 sao-->
			@php($document_rating = DB::table('rating_stars')
                ->where('id_document_fk', '=', $document->id)->avg('rating'))

			Đánh giá:
			{{ number_format($document_rating, 1) }} <span class="fa fa-star checked" style="color: yellow;"></span>
		
			<div class="form-group">
		        <div class="stars">
				  <form action="{{ route('star_rating', $document->id) }}" method="POST">
					{!! csrf_field() !!}
				    <input class="star star-5" id="star-5"
				    type="radio" name="star" value="5"/>
				    <label class="star star-5" for="star-5"></label>

				    <input class="star star-4" id="star-4"
				    type="radio" name="star" value="4"/>
				    <label class="star star-4" for="star-4"></label>

				    <input class="star star-3" id="star-3"
				    type="radio" name="star" value="3"/>
				    <label class="star star-3" for="star-3"></label>

				    <input class="star star-2" id="star-2"
				    type="radio" name="star" value="2"/>
				    <label class="star star-2" for="star-2"></label>

				    <input class="star star-1" id="star-1"
				    type="radio" name="star" value="1"/>
				    <label class="star star-1" for="star-1"></label>

				    @if(Auth::check())
				    	<input type="hidden" name="txt_user" value="{{ Auth::user()->id }}">
				    @endif
					
					<input type="hidden" name="txt_document_id" value="{{ $document->id }}">

				    <button type="submit" class="btn btn-primary btn-xs">Đánh giá</button>
				  </form>
				</div>
			</div>
			<!--Đánh giá 5 sao-->
            <br><br><br>
			

			<!--Viewer PDF tài liệu-->
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<embed src="{{ asset('public/upload_file/'.$document->file_name.'#toolbar=0&scrollbar=0&navpanes=1') }}"
					width="100%" height="1000px" type="application/pdf"> <br><br> <br>
				</div>
			</div>
			<!--Viewer PDF tài liệu-->


			<!--Thông tin tài liệu-->
			<strong>Nguồn:</strong> {!! $document->source !!}<br>
			<strong>Tác giả:</strong> {!! $document->author !!}<br>	
			<!--Thông tin tài liệu-->
			

			<!--Button download tài liệu-->
			<div class="text-right">
				@if(Auth::check())
					
					<form action="{{ route('count_download', $document->id) }}" method="post">
					{{ csrf_field() }}

					   	<input type="hidden" name="txt_number" value="1"/>
						
						<input type="hidden" name="txt_id_user" value="{{ Auth::user()->id }}">

						<input type="hidden" name="txt_id_document" value="{{ $document->id }}">

					   	<button type="submit" onclick="incrementValue()"
					   	class="btn btn-danger">Click vào để tải xuống</button>
					</form>

				@else

					<a class="btn btn-danger"
					onclick="return doawloadtailieu('Vui lòng đăng nhập để xem chi tiết và tải tài liệu!')"
					href="{{ URL::to('get_login') }}" role="button" onclick="clickCounter()">
					Download
					</a>

				@endif
			</div>
			<!--Button download tài liệu-->
			

			<!--Đăng nhập mới cho xem và tải-->
			<script type="text/javascript">
				function doawloadtailieu(msg){
				    if(window.confirm(msg)){
				      	return true;
				    }
				    	return false;
				}
			</script>
			<!--Đăng nhập mới cho xem và tải-->
			
			<!--Đếm lượt tải xuống-->
			<script type="text/javascript">
				function incrementValue()
				{
				    var value = parseInt(document.getElementById('number').value, 10);
				    value = isNaN(value) ? 0 : value;
				    value++;
				    document.getElementById('number').value = value;
				}
			</script>
			<!--Đếm lượt tải xuống-->


			<!--Nội dung tài liệu-->
			<h3>Nội dung tóm tắt: </h3>
			<p style="font-style: italic;">{!! $document->content !!}</p><br><br>
			<!--Nội dung tài liệu-->


		</div>
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>


		
				
				
                




	<!--Form bình luận -->
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12col-lg-12">
			<form action="{{ route('post_comment_document', $document->id) }}"
			method="POST" role="form">
				{{ csrf_field() }}
			
				<div class="form-group">
					<label for="">Bình luận:</label><br>

					@if(count($errors) > 0)
				        <div class = "alert alert-danger" style="width: 25%;">
			               	@foreach ($errors->all() as $error)
			                  {{ $error }}
			               	@endforeach
				        </div>
				    @endif

					<textarea name="txt_binhluan"  rows="3" 
						required="required" style="width: 60%;">
					</textarea>
				</div>


				@if(Auth::check())
					<input type="hidden" name="txt_id_user" value="{{ Auth::user()->id }}">
				@endif

				<input type="hidden" name="txt_id_document" value="{{ $document->id }}">
				

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
				@php($count_comments = DB::table('comments')
				->where('id_document_fk', $document->id)->count())
				<h3>Danh sách bình luận: ({{ $count_comments }})</h3><br>



				@php($comments = DB::table('comments')
				->where('id_document_fk', $document->id)->get())

				@foreach($comments as $comment)
					@php($users = DB::table('users')->where('id', $comment->id_user_fk)->get())
					<div class="alert" 
					style="background-color: white; width: 50%; border: 0.5px solid gray;">
						@foreach($users as $user)
							<strong>
								<i class="far fa-user"></i>&nbsp;{{ $user->name }}
							</strong>
						@endforeach
						| Ngày: 
						<strong>
							{!! date("d-m-Y", strtotime($comment->created_at)) !!}
						</strong>
						<br><br>
						&emsp;{{ $comment->content }}



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
						method="post" action="{{ route('post_reply_comment_document', $document->id) }}">
						{{ csrf_field() }}

							<div class="form-group"><br>
							<textarea class="form-control" rows="2" name="txt_binhluan" class="post_rep">
						    </textarea>
							</div>

							@if(Auth::check())
								<input type="hidden" name="txt_id_user" value="{{ Auth::user()->id }}">
							@endif

							<input type="hidden" name="txt_id_document" value="{{ $document->id }}">

							<input type="hidden" name="txt_id_comment" value="{{ $comment->id }}">

						    <div class="text-right">
							    <button type="submit" class="btn btn-primary" class="post_rep_sub">
							    Bình luận
								</button>
						    </div>
						</form>
					</div>
				@endforeach



				<!--Trả lời người bình luận hiển thị ra trang-->
				@php($reply_comments = DB::table('reply_comments')
				->where('id_document_fk', $document->id)->get())

				@foreach($reply_comments as $reply_comment)
				@php($users = DB::table('users')->where('id', $reply_comment->id_user_fk)->get())

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
						{!! date("d-m-Y", strtotime($reply_comment->created_at)) !!}
					</strong>
			
					
					<br><br>
					<p style="font-style: italic;">{{ $reply_comment->content_reply }}</p><br>

					@php($comment_documents = DB::table('comments')
					->where('id', $reply_comment->id_comment_fk)->get())
					@foreach($comment_documents as $comment_document)
					<p style="font-style: italic;">Nội dung:&nbsp;{{ $comment_document->content }}</p>
					@endforeach
					
				</div>
				@endforeach
				<!--Trả lời người bình luận hiển thị ra trang-->


			</div>
		</div>
		<!--Hiển thị bình luận ra trang hiện tại-->

		<!--Ẩn form nhập trả lời-->
		<style type="text/css">
			form.comment_reply{
			  display: none;
			}
		</style>
		<!--Ẩn form nhập trả lời-->

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


	@endforeach 
	@endif
	<!--lớn nhất và chung hết trang-->
	
@endsection