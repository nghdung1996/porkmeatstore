@extends('quanly.layouts.index')
@section('content')
  <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bài đăng
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:120px">
              @if (count($errors)>0)
                <div class="alert alert-danger">
                  @foreach ($errors->all() as $err)
                    {{$err}}<br>
                  @endforeach
                </div>
              @endif
              @if (session('thongbao'))
                {{session('thongbao')}}
              @endif
                <form action="quanly/posts/create" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Tiêu đề</label>
                      <input class="form-control" name="title" placeholder="Nhập tiêu đề bài đăng" type="text" />
                    </div>

                    <div class="form-group">
                      <label>Ảnh hiển thị</label>
                      <input class="form-control" name="thumbnail" type="file" />
                    </div>

                    <div class="form-group">
                      <label>Tóm tắt</label>
                      <textarea name="description" cols="161" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                      <label>Mô tả</label>
                      <textarea class="form-control" rows="3" name="content" id="article-ckeditor"></textarea>
                    </div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <button type="submit" class="btn btn-default"> Thêm</button>
                    <button type="reset" class="btn btn-default"> Xóa hết</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
@endsection

@section('script')
<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script>
  CKEDITOR.replace( 'article-ckeditor' );
</script>
@endsection