@extends('Customer.master')
@section('title', 'Video')



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
			height: 100%;
		}
	</style>

	<div class="row">

		<!--Form tìm kiếm-->
		<form class="form-inline" method="GET" action="{{ route('view_video') }}">
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
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

		<div class="row">
			
			@foreach($videos as $video)
		
				<div class="panel panel-success">
					<div class="panel-body">

						<h2>{!! $video->title_file !!}</h2>
						
                        <p>
							<i class="fas fa-user"></i>&nbsp;
							<strong style="color: #5B63FB;">
							@php($users = DB::table('users')->where('id', $video->id_user_fk)->get())
							@foreach($users as $user)	
								{!! $user->name !!}
							@endforeach	
							</strong> |

							<i class="far fa-calendar-alt"></i>&nbsp;
							<strong style="color: #DC5546;">
								{!! date("d-m-Y", strtotime($video->created_at)) !!}
							</strong>
                        </p><br>
						
					<div class="row">	
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="embed-responsive embed-responsive-16by9">
		                        {!! $video->code_iframe_youtb !!}
		                    </div><br>

							<p align="center">Nguồn: {!! $video->source !!}</p>
						</div>
					</div>
						
					</div>
				</div>
				 
			@endforeach
			

			<!--row hiển thị số phân trang nằm trong col-->
			<div class="row" align="center">
				@if(isset($videos))
					<nav>
					    <ul class="pagination justify-content-end"> 
					        {{ $videos->links('vendor.pagination.bootstrap-4') }}
					    </ul>
					</nav>
				@endif
			</div>
			<!--row hiển thị số phân trang nằm trong col-->

		</div> 
		<!--row hiển thị hình ảnh về sách -->
		<br><br><br><br>







		

		
		

		</div>
		<!--col8-->


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
	<!--row lớn-->


@endsection