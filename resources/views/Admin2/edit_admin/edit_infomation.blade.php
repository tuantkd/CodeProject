@include('Admin2.header')

  {{-- container --}}
  <div class="container">
      <div class="row">
        
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
          <div class="panel panel-default"
          style="border: 1px solid gray; border-radius: 5px;">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        
            <div class="panel-body">
              <form action="update_information{{ $infos->id }}"
              method="POST" role="form" style="margin: 10px;">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <h2 align="center">Cập nhật thông tin:</h2><br>
                <div class="form-group">
                  <h4>Tiêu đề:</h4>
                  <input type="text" class="form-control" name="txt_tieude"
                  value="{!! $infos->title !!}">
                </div>

                @if(Auth::check())
                  <input type="hidden" name="txt_user"
                  value="{!! Auth::user()->name !!}">
                @endif

                <div class="form-group">
                  <h4>Nội dung:</h4>
                  <textarea class="form-control" rows="5" name="content">{!! $infos->content !!}
                  </textarea>
                </div>

                <div class="text-right">
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
              </form>

            </div>
            {{-- panel-body --}}
          </div>
          {{-- panel-default --}}
        </div>
        {{-- end_col2 --}}
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>

      </div><br>
      {{-- end_row1 --}}

	</div>
  {{-- end_container --}}

@include('Admin2.footer')
