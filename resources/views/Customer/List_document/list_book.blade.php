@extends('Customer.master')
@section('title', 'Sách')



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
          <a href="view_detail_infomation{!! $value->id !!}" class="list-group-item" id="link_thongtin">
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
		#img_sach{
			width: 100%;
      		height: 300px;
      		margin: auto;

		}
		#img_sach:hover{
			box-shadow: 0.5px 3px 7px #888888;
		
		}
		#link_a{
			text-decoration: none;
			font-weight: bold;
		}
		#link_a:hover{
			color: #00008B;
		}
	</style>


	<div class="row">
		
		<!--Form tìm kiếm-->
		<form class="form-inline" method="GET" action="{{ route('view_list_book') }}">
			{{ csrf_field() }}

		    <div class="text-left">
			    <div class="form-group">
			      <input type="text" name="txt_timkiem" class="form-control" 
			      placeholder="Nhập từ khóa tìm kiếm ...">
			    </div>

			    <div class="form-group">
			    	<button type="submit" class="btn btn-primary"> 
				    	<i class="fas fa-search"></i>&nbsp;
						Tìm kiếm
					</button>
			    </div>
		    </div>
		</form><hr>
		<!--Form tìm kiếm-->
		

		@if(isset($books))
			@foreach($books as $book)

				<div class="col-xs-11 col-sm-11 col-md-3 col-lg-3">
					<div class="panel panel-default">
						<div class="panel-body">

							<a href="view_detail_document{{ $book->id }}" id="link_a">
								<img src="{{ asset('public/upload_file_images/' 
								.$book->file_cover_image) }}"
			                    class="img-responsive" alt="khai giảng" id="img_sach"><br>
								{{ $book->title_file }}
							</a>

						</div>
						
						<div class="panel-footer">
							<!--Đánh giá 5 sao-->
		                    @php($document_rating = DB::table('rating_stars')
		                    ->where('id_document_fk', '=', $book->id)->avg('rating'))

		                    Đánh giá:
		                    {{ number_format($document_rating, 1) }}
		                    <span class="fa fa-star checked" style="color: yellow;">
		                    </span>
		                    <!--Đánh giá 5 sao--><br>

		                    @php($total_down_book = DB::table('count_downloads')
		                    ->where('id_document_fk', '=', $book->id)->sum('count_download'))

		                    <i class="fas fa-download"></i>&nbsp;{{ $total_down_book }}
		
							<div class="text-right">
								<i class="far fa-calendar-alt"></i>
		                    	{!! date("d-m-Y", strtotime($book->updated_at)) !!}
							</div>
		                    

						</div>
						
					</div>
				</div>

			@endforeach
		@endif
	
	</div>
	{{-- end_row --}}

	<div class="row" align="center">
		@if(isset($books))
			<nav>
			    <ul class="pagination justify-content-end"> 
			        {{ $books->links('vendor.pagination.bootstrap-4') }}
			    </ul>
			</nav>
		@endif
	</div>

@endsection
