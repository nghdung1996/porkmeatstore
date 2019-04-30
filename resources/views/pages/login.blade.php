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
            <span>Đăng nhập</span>
          </div>
          <form action="login" method="post">
            <div class="form-group">
              <label>Email</label> *
              <input type="email" class="form-control" placeholder="Email" name="email">
            </div>

            <div class="form-group">
              <label>Mật khẩu</label> *
              <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
            </div>
            
            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <button type="submit" class="btn btn-success">Đăng nhập</button>
            <a href="signup" class="">Tạo tài khoản mới! </a>
            
          </form>
        </div>
        <a class="btn btn-link" href="{{ route('password.request') }}">Quên Mật Khẩu</a>
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