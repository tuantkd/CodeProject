@include('Admin2.header')


    <div class="container">
      
      <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                
                <!--Đếm số bình luận trang hiện tại-->
                @php($count_comments = DB::table('comments')->count())
                <div class="mr-5">Tổng cộng có ( {{ $count_comments }} ) lượt bình luận</div>

              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-download"></i>
                </div>

                <!--Đếm số bình luận trang hiện tại-->
                @php($count_downloads = DB::table('count_downloads')->count())
                <div class="mr-5">Tổng cộng có ( {{ $count_downloads }} ) lượt tải về</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-star"></i>
                </div>

                @php($rating_stars = DB::table('rating_stars')->count())
                <div class="mr-5">Tổng cộng có ( {{ $rating_stars }} ) lượt đánh giá</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
              </a>
            </div>
          </div>
          
        </div>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Danh sánh bình luận</div>
          <div class="card-body">
            
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Người dùng</th>
                    <th>Tài liệu</th>
                    <th>Hình ảnh</th>
                    <th>Nội dung</th>
                    <th>Ngày</th>
                    <th>Tùy chọn</th>
                  </tr>
                </thead>
                <tbody>
                
                <?php $i=1; ?>
                @php($comments = DB::table('comments')->get())



                @foreach($comments as $comment)
                  <tr>

                    <td><strong><?php echo $i++; ?></strong></td>

                    @php($users = DB::table('users')->where('id', $comment->id_user_fk)->get())
                    <td>
                      Tên:
                      @foreach($users as $user)
                        <strong>{{ $user->name }}</strong>
                      @endforeach
                    </td>


                    @php($documents = DB::table('documents')->where('id', $comment->id_document_fk)->get())
                    <td>
                      Tài liệu:
                      @foreach($documents as $document)
                        <strong>{{ $document->file_name }}</strong>
                      @endforeach
                    </td>
                    


                    @php($images = DB::table('document_images')->where('id', $comment->id_image_fk)->get())
                    <td>
                      Hình ảnh:
                      @foreach($images as $image)
                        <a data-toggle="tooltip" title="Click xem hình"
                          href="display_picture{{ $image->id }}">
                          <img src="{{ URL::to('public/upload_document_images/'
                          .$image->file_name) }}" 
                          alt="Ảnh bìa tài liệu" width="100" height="120">
                        </a>
                      @endforeach
                    </td>
                    

                    <td style="font-style: italic">
                      {{ $comment->content }}
                    </td>
                    
                    <td>
                      {!! date("d-m-Y", strtotime($comment->created_at)) !!}
                    </td>

                    <td>
                      <a class="btn btn-danger" href="delete_comment{{ $comment->id }}"
                        role="button" onclick="return xacnhanxoa('Bạn có chắc chắn xóa không?')">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    </td>
                      
                  </tr>
                @endforeach

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

                </tbody>
              </table>
            </div>

          </div>
          <!-- end-card-body -->
        </div>
         





          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Danh sánh trả lời bình luận
            </div>
            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Người dùng</th>
                      <th>Tài liệu</th>
                      <th>Hình ảnh</th>
                      <th>Nội dung bình luận</th>
                      <th>Nội dung trả lời</th>
                      <th>Ngày</th>
                      <th>Tùy chọn</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  <?php $i=1; ?>
                  @php($reply_comments = DB::table('reply_comments')->get())



                  @foreach($reply_comments as $reply_comment)
                    <tr>

                      <td><strong><?php echo $i++; ?></strong></td>

                      @php($users = DB::table('users')->where('id', $reply_comment->id_user_fk)->get())
                      <td>
                        Tên:
                        @foreach($users as $user)
                          <strong>{{ $user->name }}</strong>
                        @endforeach
                      </td>


                      @php($documents = DB::table('documents')
                      ->where('id', $reply_comment->id_document_fk)->get())
                      <td>
                        Tài liệu:
                        @foreach($documents as $document)
                          <strong>{{ $document->file_name }}</strong>
                        @endforeach
                      </td>
                      


                      @php($images = DB::table('document_images')
                      ->where('id', $reply_comment->id_image_fk)->get())
                      <td>
                        Hình ảnh:
                        @foreach($images as $image)
                          <a data-toggle="tooltip" title="Click xem hình"
                            href="display_picture{{ $image->id }}">
                            <img src="{{ URL::to('public/upload_document_images/'
                            .$image->file_name) }}" 
                            alt="Ảnh bìa tài liệu" width="100" height="120">
                          </a>
                        @endforeach
                      </td>
                      
                      @php($comments = DB::table('comments')->where('id', $reply_comment->id_comment_fk)->get())
                      <td>
                        Nội dung:
                        @foreach($comments as $comment)
                          <strong style="font-style: italic">{{ $comment->content }}</strong>
                        @endforeach
                      </td>

                      <td style="font-style: italic">
                        {{ $reply_comment->content_reply }}
                      </td>
                      
                      <td>
                        {!! date("d-m-Y", strtotime($reply_comment->created_at)) !!}
                      </td>

                      <td>
                        <a class="btn btn-danger" href="delete_reply_comment{{ $reply_comment->id }}"
                          role="button" onclick="return xacnhanxoa('Bạn có chắc chắn xóa không?')">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </td>
                        
                    </tr>
                  @endforeach

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

                  </tbody>
                </table>
              </div>

            </div>
            <!-- end-card-body -->
          </div>
          
	</div>



@include('Admin2.footer')
