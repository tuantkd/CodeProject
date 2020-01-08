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
          <a href="view_detail_infomation{!! $value->id !!}" class="list-group-item"
          	id="link_thongtin">
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

	<div class="row">

		@if(isset($detail_lessons))
		@foreach($detail_lessons as $document)
		

		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<img src="{{ asset('public/upload_file_images/'.$document->file_cover_image) }}"
			id="hinhanh">
		</div>

		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="panel-title" >
				<span style="color: blue; font-size: 25px;">
					{!! $document->title_file !!}
				</span><br>

				<p>	
					@php($users = DB::table('users')->where('id', $document->id_user_fk)->get())
					Đăng bởi: 
					@foreach($users as $user)
                        <strong style="color: #04B4AE;">{!! $user->name !!}</strong>
                    @endforeach
                    | Ngày: <strong style="color: #DF0101;">
                    	{!! date("d-m-Y", strtotime($document->created_at)) !!}
                    </strong><br><br>



					
					<strong>Nguồn:</strong> {!! $document->source !!}<br>
					<strong>Tác giả:</strong> {!! $document->author !!}<br>

					<h3>Nội dung tóm tắt: </h3>
					<p style="font-style: italic;">{!! $document->content !!}</p><br>
					

					@if(Auth::check())

						<a class="btn btn-warning"
						href="view_pdf_document{{ $document->id }}" 
						role="button"> Xem nội dung chi tiết và Download!
						</a>

					@else

						<a class="btn btn-warning"
						onclick="return doawloadtailieu('Vui lòng đăng nhập để xem chi tiết và tải tài liệu!')"
						href="{{ URL::to('get_login') }}" role="button">
						Xem nội dung chi tiết và Download!
						</a>

					@endif
					<br><br>


					Đánh giá:
		           	<span class="fa fa-star checked" style="color: yellow;"></span>
		          	<span class="fa fa-star checked" style="color: yellow;"></span>
		          	<span class="fa fa-star checked" style="color: yellow;"></span>
		          	<span class="fa fa-star"></span>
		          	<span class="fa fa-star"></span>

		          	<br><br>

		           	<i class="fas fa-eye"></i> 20 &nbsp;
					<i class="fas fa-download"></i> 12 <br>
				</p>

			</div>
		</div>
		
		
	</div><br>

	
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




	<!--Form bình luận-->
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
	<!--Form bình luận-->


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
	
		
		<!--Hiển thị thông tin bình luận-->
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<!--Đếm lượt bình luận với id_document-->
				@php($count_comments = DB::table('comments')
				->where('id_document_fk', $document->id)->count())

				<h3>Danh sách bình luận: ({{ $count_comments }})</h3><br>


				@php($comments = DB::table('comments')
				->where('id_document_fk', $document->id)->get())
				
				@foreach($comments as $comment)
			
				<div class="alert" style="background-color: #CEF6F5; width: 50%;">
					@php($users = DB::table('users')->where('id', $comment->id_user_fk)->get())
					@foreach($users as $user)

						<strong>
							<i class="far fa-user"></i>&nbsp;{{ $user->name }}
						</strong>
						| Ngày: 
						<strong>{!! date("d-m-Y", strtotime($document->created_at)) !!}
						</strong>

					@endforeach <br><br>

					&emsp;{{ $comment->content }}
				</div>

				@endforeach

			</div>
		</div>
		<!--Hiển thị thông tin bình luận-->
	
	@endforeach
	@endif
	
@endsection