@extends('admin.layouts.index')
@section('content')
  <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Trạng thái bài đăng
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
              @if (count($errors)>0)
                @foreach ($errors->all() as $err)
                  {{$err}}<br>
                @endforeach
              @endif
              @if (session('thongbao'))
                {{session('thongbao')}}
              @endif
                <form action="admin/posts/updatestatus" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <select name="accepted" class="form-control">
                        <option value="0" 
                          @if ($post->accepted == 0)
                            {{"selected"}}
                          @endif
                        >Chưa duyệt</option>
                        <option value="1"
                          @if ($post->accepted == 1)
                            {{"selected"}}
                          @endif
                        >Duyệt bài</option>
                      </select>
                    </div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="id" value="{{$post->id}}">
                    <button type="submit" class="btn btn-default"> Sửa</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
@endsection