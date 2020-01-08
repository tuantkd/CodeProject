@include('Admin2.header')

  {{-- container --}}
  <div class="container">
      <div class="row">
        
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
          <div class="panel panel-default"
          style="border: 1px solid gray; border-radius: 3px;">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session()->has('message'))
                <div class="alert alert-success">
                    <strong>{{ session()->get('message') }}</strong>
                </div>
            @endif

            <div class="panel-body">
              <form action="{{ route('post_information') }}"
              method="POST" role="form" style="margin: 10px;">
                {{ csrf_field() }}

                <h2 align="center">Thêm thông tin:</h2><br>
                <div class="form-group">
                  <h4>Tiêu đề nội dung:</h4>
                  <input type="text" class="form-control" name="txt_tieude"
                  placeholder="Nhập tiêu đề nội dung">
                </div>

                @if(Auth::check())
                  <input type="hidden" name="txt_user"
                  value="{!! Auth::user()->id !!}">
                @endif

                <div class="form-group">
                  <h4>Nội dung:</h4>
                  <textarea class="form-control" rows="5" name="content"></textarea>
                </div>

                <div class="text-right">
                  <button type="submit" class="btn btn-primary">THÊM</button>
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
