@extends('quanly.layouts.index')
@section('content')
  <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bài đăng
                  <small>danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if (session('success'))
              <div class="alert alert-success">
                {{session('success')}}
              </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                      <th>ID</th>
                      <th>Tiêu đề</th>
                      <th>Ảnh hiển thị</th>
                      <th>Mô tả</th>
                      <th>Nội dung</th>
                      <th>Quản lý</th>
                      <th>Tình trạng</th>
                      <th>Xóa</th>
                      <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $post)
                    <tr class="odd gradeX" align="center">
                      <td>{{$post->id}}</td>
                      <td>{{str_limit($post->title, 30, '...')}}</td>
                      <td>{{$post->thumbnail}}</td>
                      <td>{{str_limit($post->description, 40, '...')}}</td>
                      <td>{{str_limit($post->content, 50, '...')}}</td>
                      <td>{{$post->user_id}}</td>
                      <td>
                        @if ($post->accepted == 0)
                          {{ "Chưa duyệt"}}
                        @else
                          {{ "Đã duyệt"}}
                        @endif
                      </td>
                      <td class="center">
                        <a href="quanly/posts/delete/{{$post->id}}"> Xóa</a>
                      </td>
                      <td class="center"><i class="fa fa-pencil fa-fw"></i>
                        <a href="quanly/posts/edit/{{$post->id}}">Sửa</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
@endsection
