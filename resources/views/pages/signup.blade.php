@extends('layouts.index')
@section('content')
  <style>
    .box {
      background-color: #e3f2f2;
      margin: 10px auto 10px auto;
      width: 950px;
    }
    .card-left {
      float: left;
    }
    .form-label {
      font-size: 20px;
      text-align: center;
      font-style: italic;
      color: black;
    }
    .card-right {
      float: left;
      margin: 30px 0 0 70px;
    }
    .form-control {
      width: 150%;
    }
    .form-login {
      padding: auto;
    }
    .other-links {
      margin-top: 10px;
      padding-bottom: 5px;
      line-height: 30px;
    }
    .item-link {
      background: #efc2c2;
      border-radius: 15px;
      margin-bottom: 5px;
      text-align: center;
    }
  </style>
  <div class="container box">
    <div class="row">
      <div class="card-left">
        <img src="upload/images/lon1.jpg" alt="" style="height: 500px; width: 500px">
      </div>
      <div class="card-right">
        <div class="form-login">
          <div class="form-label">
            <span>Đăng ký</span>
          </div>
          <form action="signup" method="post">
            <div class="form-group">
              <label>Tên tài khoản</label> *
              <input type="text" class="form-control" placeholder="Tên tài khoản" name="name">
            </div>

            <div class="form-group">
              <label>Email</label> *
              <input type="email" class="form-control email" placeholder="Email" name="email">
            </div>

            <div class="form-group">
              <label>Mật khẩu</label> *
              <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
            </div>
            
            <div class="form-group">
              <label>Xác nhận mật khẩu</label> *
              <input type="password" class="form-control" name="passwordconfirmation" placeholder="Xác nhận mật khẩu">
            </div>

            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <button type="submit" class="btn btn-success">Đăng ký</button>
            <a href="login" class="">Bạn đã có tài khoản! </a>
          </form>
        </div>
        {{-- <hr>
        <div class="other-links">
          <div class="item-link">
            <a href="redirect/facebook" class=""><i class="fa fa-facebook"></i> Login with Facebook</a>
          </div>
          <div class="item-link">
            <a href="redirect/google" class=""><i class="fa fa-google"></i> Login with Google</a>
          </div>
        </div> --}}
      </div>
    </div>
  </div>
@endsection