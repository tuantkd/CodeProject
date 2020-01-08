@extends('Customer.master')
@section('title', 'Trang chủ')





{{-- ========================================================== --}}
@section('banner')<br>

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
  <br>
	<div class="panel panel-info">
      <div class="panel-heading">
        <h3 align="center">Thông tin nổi bật</h3>
      </div>
      <div class="panel-body">
        <div class="list-group">
          
          @php( $infos = DB::table('infomations')->get())  
          @foreach($infos as $value)
            <a href="view_detail_infomation{{ $value->id }}"
              class="list-group-item" id="link_thongtin">
              <i class="fas fa-chevron-right"></i> 
              {!! $value->title !!}
            </a>
          @endforeach

        </div>
      </div>
  </div>

@endsection
















{{-- ============================================================================ --}}
@section('noidung_tailieu')

  <style type="text/css" media="screen">
    #img{
      width: 250px;
      height: 300px;
      margin: auto;
    }
    #hover_img{
      text-decoration: none;
    }
    #img{
      box-shadow: 1px 3px 5px #888888;
    }
    
    h4:hover{
      color: #00008B;
    }
  </style>



<div class="row">
  
	<div class="panel panel-primary">
         <div class="panel-heading">
           <h3>Tài liệu chung liên quan</h3>
         </div>
         <div class="panel-body">
          
         
            {{-- Sách --}}
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="panel panel-default" >

                    @php($books = DB::table('documents')->where('kind', 1)->get())
                  
                    <div class="panel-body">
                    @foreach($books as $book)
                    @if($loop->first)
                      <a href="view_detail_document{{ $book->id }}" id="hover_img">
                        <img src="{{ asset('public/upload_file_images/'.$book->file_cover_image) }}"
                        class="img-responsive" alt="khai giảng" id="img"><br>
                        <h4>{{ $book->title_file }}</h4>
                      </a>
                    

                    @php($document_rating = DB::table('rating_stars')
                    ->where('id_document_fk', '=', $book->id)->avg('rating'))

                    @php($total_down_book = DB::table('count_downloads')
                    ->where('id_document_fk', '=', $book->id)->sum('count_download'))

                    
                    <!--Đánh giá 5 sao-->
                    Đánh giá:
                    {{ number_format($document_rating, 1) }}
                    <span class="fa fa-star checked" style="color: yellow;"></span>
                    
                    <br>
                    <i class="fas fa-eye"></i> <span id="book"></span>&nbsp;&nbsp;&nbsp;

                    <i class="fas fa-download"></i> {{ $total_down_book }}
                    
                    <div class="text-right">
                      <a class="btn btn-primary" href="{{ URL::to('view_list_book') }}" 
                      role="button">Xem thêm</a>
                    </div>
                    
                   
                    @endif
                    @endforeach             
                    </div>
                </div>
            </div>{{-- COL_4 --}}


            <!--Đếm lượt xem load-->
            <script type="text/javascript">
              var n = localStorage.getItem('book');
                if (n === null){
                    n = 0;
                }
                n++;
                localStorage.setItem("book", n);
                document.getElementById('book').innerHTML = n;

                //Đặt giá trị lượt xem đến con số nào đó và lặp lại
                // localStorage.removeItem('on_load_counter');
            </script>
            <!--Đếm lượt xem load-->

         






            {{-- Giáo trình --}}
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="panel panel-default" id="hover_tailieu_trangchu">

                    
                    @php($curriculums = DB::table('documents')->where('kind', 2)->get())
                    
                    
                    <div class="panel-body">
                    @foreach($curriculums as $curriculum)
                    @if($loop->first)
                      <a href="view_detail_document{{ $curriculum->id }}" id="hover_img">
                      <img src="{!! asset('public/upload_file_images/'. $curriculum->file_cover_image) !!}"
                        class="img-responsive" alt="khai giảng" id="img"><br>
                        <h4>{{ $curriculum->title_file }}</h4>
                      </a>
                    


                    <!--Đánh giá 5 sao-->
                    @php($document_rating = DB::table('rating_stars')
                    ->where('id_document_fk', '=', $curriculum->id)->avg('rating'))

                    Đánh giá:
                    {{ number_format($document_rating, 1) }}
                    <span class="fa fa-star checked" style="color: yellow;"></span>
                    <br>

                    <i class="fas fa-eye"></i> <span id="curriculum"></span>&nbsp;&nbsp;&nbsp;

                    @php($total_down_curriculum = DB::table('count_downloads')
                    ->where('id_document_fk', '=', $curriculum->id)->sum('count_download'))

                    <i class="fas fa-download"></i> {{ $total_down_curriculum }}

                    <div class="text-right">
                      <a class="btn btn-primary" href="{{ URL::to('view_list_curriculum') }}" 
                      role="button">Xem thêm</a>
                    </div>

                    @endif
                    @endforeach
                    </div>

                </div>
            </div>{{-- COL_4 --}}


            <!--Đếm lượt xem load-->
            <script type="text/javascript">
              var n = localStorage.getItem('curriculum');
                if (n === null){
                    n = 0;
                }
                n++;
                localStorage.setItem("curriculum", n);
                document.getElementById('curriculum').innerHTML = n;

                //Đặt giá trị lượt xem đến con số nào đó và lặp lại
                //localStorage.removeItem('curriculum');
            </script>
            <!--Đếm lượt xem load-->

          






            {{-- Thông tin bài báo khoa học --}}
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="panel panel-default" id="hover_tailieu_trangchu">

                    
                    @php($sciences = DB::table('documents')->where('kind', 3)->get())

                    <div class="panel-body">
                    @foreach($sciences as $science)
                    @if($loop->first)
                      <a href="view_detail_document{{ $science->id }}" id="hover_img">
                        <img src="{{ asset('public/upload_file_images/'.$science->file_cover_image) }}"
                        class="img-responsive" alt="khai giảng" id="img"><br>
                        <h4>{{ $science->title_file }}</h4>
                      </a>
                    


                    <!--Đánh giá 5 sao-->
                    @php($document_rating = DB::table('rating_stars')
                    ->where('id_document_fk', '=', $science->id)->avg('rating'))

                    Đánh giá:
                    {{ number_format($document_rating, 1) }}
                    <span class="fa fa-star checked" style="color: yellow;"></span>
                    <br>

                    <i class="fas fa-eye"></i> <span id="science"></span>&nbsp;&nbsp;&nbsp;

                    @php($total_down_science = DB::table('count_downloads')
                    ->where('id_document_fk', '=', $science->id)->sum('count_download'))

                    <i class="fas fa-download"></i> {{ $total_down_science }}

                    <div class="text-right">
                      <a class="btn btn-primary" href="{{ URL::to('view_list_science') }}" 
                      role="button">Xem thêm</a>
                    </div>
                    
                    @endif
                    @endforeach
                    </div>
                </div>
            </div>
            {{-- COL_4 --}}


            <!--Đếm lượt xem load-->
            <script type="text/javascript">
              var n = localStorage.getItem('science');
                if (n === null){
                    n = 0;
                }
                n++;
                localStorage.setItem("science", n);
                document.getElementById('science').innerHTML = n;

                //Đặt giá trị lượt xem đến con số nào đó và lặp lại
                // localStorage.removeItem('on_load_counter');
            </script>
            <!--Đếm lượt xem load-->

           





		<br>





            {{-- Báo cáo chuyên đề --}}
				    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="panel panel-default" id="hover_tailieu_trangchu">

                    
                    @php($thematics = DB::table('documents')->where('kind', 4)->get())

                    <div class="panel-body">
                    @foreach($thematics as $thematic)
                    @if($loop->first)
                      <a href="view_detail_document{{ $thematic->id }}" id="hover_img">
                        <img src="{{ asset('public/upload_file_images/'. $thematic->file_cover_image) }}"
                        class="img-responsive" alt="khai giảng" id="img"><br>
                        <h4>{{ $thematic->title_file }}</h4>
                      </a>
                    


                    <!--Đánh giá 5 sao-->
                    @php($document_rating = DB::table('rating_stars')
                    ->where('id_document_fk', '=', $thematic->id)->avg('rating'))

                    Đánh giá:
                    {{ number_format($document_rating, 1) }}
                    <span class="fa fa-star checked" style="color: yellow;"></span>
                    <br>

                    <i class="fas fa-eye"></i> <span id="thematic"></span>&nbsp;&nbsp;&nbsp;

                    @php($total_down_thematic = DB::table('count_downloads')
                    ->where('id_document_fk', '=', $thematic->id)->sum('count_download'))

                    <i class="fas fa-download"></i> {{ $total_down_thematic }}
                    <div class="text-right">
                      <a class="btn btn-primary" href="{{ URL::to('view_list_thematic') }}" 
                      role="button">Xem thêm</a>
                    </div>
                    
                    @endif
                    @endforeach
                    </div>
                    {{-- panel-body --}}
                </div>
            </div>{{-- COL_4 --}}


            <!--Đếm lượt xem load-->
            <script type="text/javascript">
              var n = localStorage.getItem('thematic');
                if (n === null){
                    n = 0;
                }
                n++;
                localStorage.setItem("thematic", n);
                document.getElementById('thematic').innerHTML = n;

                //Đặt giá trị lượt xem đến con số nào đó và lặp lại
                //localStorage.removeItem('thematic');
            </script>
            <!--Đếm lượt xem load-->
            
          







            {{-- Bài giảng --}}
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="panel panel-default" id="hover_tailieu_trangchu">

                    @php($lessons = DB::table('documents')->where('kind', 5)->get())

                    <div class="panel-body">
                    @foreach($lessons as $lesson)
                    @if($loop->first)
                      <a href="view_detail_document{{ $lesson->id }}" id="hover_img">
                        <img src="{{ asset('public/upload_file_images/'. $lesson->file_cover_image) }}"
                        class="img-responsive" alt="khai giảng" id="img"><br>
                        <h4>{{ $lesson->title_file }}</h4>
                      </a>
                    


                    <!--Đánh giá 5 sao-->
                    @php($document_rating = DB::table('rating_stars')
                    ->where('id_document_fk', '=', $lesson->id)->avg('rating'))

                    Đánh giá:
                    {{ number_format($document_rating, 1) }}
                    <span class="fa fa-star checked" style="color: yellow;"></span>
                    <br>

                    <i class="fas fa-eye"></i> <span id="lesson"></span>&nbsp;&nbsp;&nbsp;

                    @php($total_down_lesson = DB::table('count_downloads')
                    ->where('id_document_fk', '=', $lesson->id)->sum('count_download'))

                    <i class="fas fa-download"></i> {{ $total_down_lesson }}

                    <div class="text-right">
                      <a class="btn btn-primary" href="{{ URL::to('view_list_lesson') }}" 
                      role="button">Xem thêm</a>
                    </div>
                    
                    @endif
                    @endforeach
                    </div>
                    {{-- panel-body --}}
                </div>
            </div>{{-- COL_4 --}}


            <!--Đếm lượt xem load-->
            <script type="text/javascript">
              var n = localStorage.getItem('lesson');
                if (n === null){
                    n = 0;
                }
                n++;
                localStorage.setItem("lesson", n);
                document.getElementById('lesson').innerHTML = n;

                //Đặt giá trị lượt xem đến con số nào đó và lặp lại
                // localStorage.removeItem('lesson');
            </script>
            <!--Đếm lượt xem load-->

           


            



            {{-- Báo cáo tổng quan --}}
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="panel panel-default" id="hover_tailieu_trangchu">

                    @php($overviews = DB::table('documents')->where('kind', 6)->get())

                    <div class="panel-body">
                    @foreach($overviews as $overview)
                    @if($loop->first)
                      <a href="view_detail_document{{ $overview->id }}" id="hover_img">
                        <img src="{{ asset('public/upload_file_images/'. $overview->file_cover_image) }}"
                        class="img-responsive" alt="khai giảng" id="img"><br>
                        <h4>{{ $overview->title_file }}</h4>
                      </a>
                    


                    <!--Đánh giá 5 sao-->
                    @php($document_rating = DB::table('rating_stars')
                    ->where('id_document_fk', '=', $overview->id)->avg('rating'))

                    Đánh giá:
                    {{ number_format($document_rating, 1) }}
                    <span class="fa fa-star checked" style="color: yellow;"></span>
                    <br>
                    
                    <i class="fas fa-eye"></i> <span id="overview"></span>&nbsp;&nbsp;&nbsp;

                    @php($total_down_overview = DB::table('count_downloads')
                    ->where('id_document_fk', '=', $overview->id)->sum('count_download'))

                    <i class="fas fa-download"></i> {{ $total_down_overview }}

                    <div class="text-right">
                      <a class="btn btn-primary" href="{{ URL::to('view_list_overview') }}" 
                      role="button">Xem thêm</a>
                    </div>

                    @endif
                    @endforeach
                    </div>
                </div>
            </div>{{-- COL_4 --}} 
            

            <!--Đếm lượt xem load-->
            <script type="text/javascript">
              var n = localStorage.getItem('overview');
                if (n === null){
                    n = 0;
                }
                n++;
                localStorage.setItem("overview", n);
                document.getElementById('overview').innerHTML = n;

                //Đặt giá trị lượt xem đến con số nào đó và lặp lại
                //localStorage.removeItem('overview');
            </script>
            <!--Đếm lượt xem load-->

         
          
      </div>
      {{-- end_panel_body --}}
  </div>
  {{-- end_panel_primary --}}
</div>
{{-- end_row --}}

@endsection














{{-- =================================================================================== --}}
@section('noidung_hinh')

	<div class="panel panel-success">

        <div class="panel-heading">
          <h3>Hình ảnh tài liệu liên quan</h3>
        </div>

        <div class="panel-body">
          <div class="row">
            <!--Hình ảnh liên quan về sách-->
            @php($images = DB::table('document_images')->simplePaginate(3))
            @foreach($images as $image)
              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="panel panel-default">
                  <div class="panel-body">
              
                    <a href="detail_picture{{ $image->id }}">
                    <img src="{{ asset('public/upload_document_images/' .$image->file_name) }}"
                    class="img-responsive" style="width: 500px; height: 400px;">
                    </a><br>

                    <p align="center">{{ $image->title_file }}</p>
                  
                  </div>
                </div>
              </div>
            @endforeach

          </div>
          <!--end_row-->
        </div>
          

         <div class="panel-footer" align="right">
            <a class="btn btn-primary"
            href="{{ URL::to('view_list_picture') }}" role="button">
            - - Xem thêm - - 
            </a>
         </div>

  </div> 


@endsection












{{-- ============================================================================ --}}
@section('noidung_video')


	<div class="panel panel-info">
        <div class="panel-heading">
          <h3>Video youtube liên quan</h3>
        </div>
        
        

        
        <div class="panel-body">
            <!--Hiển thị 4 mục nội dung ra trong csdl-->
            @php($images = DB::table('document_videos')->paginate(3))
            @foreach($images as $image)

              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <strong>{!! $image->title_file !!}</strong>
                    </div>
                    <div class="panel-body">

                      <div class="embed-responsive embed-responsive-16by9">
                        {!! $image->code_iframe_youtb !!}
                      </div>

                    </div>
                  </div>
              </div>
              {{-- col-sm-4 --}}
            @endforeach
        </div>
        {{-- panel_body --}}
        
        

      <div class="panel-footer" align="right">
        <a class="btn btn-primary" href="{{ URL::to('view_video') }}" role="button">- - Xem thêm - -</a>
      </div>

  </div>{{-- panel panel-primary --}}



@endsection
