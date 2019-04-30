@extends('admin.layouts.index')
@section('content')
  <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Người dùng
                    <small>Thêm</small>
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
                <form action="admin/user/create" method="POST">
                    <div class="form-group">
                        <label>Tên người dùng</label>
                        <input class="form-control" name="name" placeholder="Nhập tên người dùng" />
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" name="repassword" placeholder="Nhập lại mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Nhập Email" />
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ" />
                    </div>
                    <div class="form-group">
                        <label>SĐT</label>
                        <input type="tel" class="form-control" name="phone" placeholder="Nhập số điện thoại"
                            pattern="[0-9]{10}" />
                    </div>
                    <div class="form-group">
                        <label>Vai trò</label>
                        <label class="radio-inline">
                            <input name="role" value="2" type="radio">Admin
                        </label>
                        <label class="radio-inline">
                                <input name="role" value="1" type="radio">Quản Lý
                            </label>
                        <label class="radio-inline">
                            <input name="role" value="0" checked="" type="radio">Khách Hàng
                        </label>
                    </div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Xóa hết</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
@endsection