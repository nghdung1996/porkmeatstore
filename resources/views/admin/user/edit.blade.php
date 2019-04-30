@extends('admin.layouts.index')
@section('content')
  <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Người dùng
                    <small>{{$user->name}}</small>
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
              <form action="admin/user/update/{{$user->id}}" method="POST">
                <div class="form-group">
                    <label>Tên</label>
                    <input class="form-control" name="name" value="{{$user->name}}" />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{$user->email}}" disabled />
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" name="address" value="{{$user->address}}" />
                </div>
                <div class="form-group">
                    <label>SĐT</label>
                    <input type="phone" class="form-control" name="phone" value="{{$user->phone}}" />
                </div>
                <div class="form-group">
                  <input type="checkbox" name="changePassword" id="change-password"> <label>Thay đổi mật khẩu</label>
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control password" name="password" placeholder="Nhập mật khẩu" disabled />
                </div>
                <div class="form-group">
                  <label>Xác nhận mật khẩu</label>
                  <input type="password" class="form-control password" name="repassword" placeholder="Xác nhận mật khẩu" disabled />
                </div>
                <div class="form-group">
                    <label>Vai trò</label>
                    <label class="radio-inline">
                        <input name="role" value="2" type="radio"
                          @if ($user->role == 2)
                            {{"checked"}}
                          @endif
                        >Admin
                      </label>
                    <label class="radio-inline">
                      <input name="role" value="1" type="radio"
                        @if ($user->role == 1)
                          {{"checked"}}
                        @endif
                      >Quản lý
                    </label>
                    <label class="radio-inline">
                      <input name="role" value="0" type="radio"
                        @if ($user->role == 0)
                          {{"checked"}}
                        @endif
                      >Khách Hàng
                    </label>
                </div>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button type="submit" class="btn btn-default">Sửa</button>
                <button type="reset" class="btn btn-default">Xóa hết</button>
              <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
@endsection
@section('script')
  <script>
    $(document).ready(function(){
      $('#change-password').change(function(){
        if ($(this).is(':checked')) {
          $('.password').removeAttr('disabled');
        }else{
          $('.password').attr('disabled','');
        }
      });
    });
  </script>
@endsection