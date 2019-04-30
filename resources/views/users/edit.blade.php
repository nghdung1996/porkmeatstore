@extends('layouts.index')
@section('content')
  <style>
    .box {
      background-color: #e3f2f2;
      margin: 10px auto 10px auto;
      width: 950px;
      padding-bottom: 10px;
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
      </div>
      <div class="card-right">
        <div class="form-login">
          <div class="form-label">
            <span>Tài khoản của tôi</span>
          </div>
          <br>
          <form action="users/update/{{$user->id}}" method="post">
            <div class="form-group">
              <label>Tên tài khoản</label>
              <input type="text" class="form-control" value="{{$user->name}}" placeholder="Tên tài khoản" name="name">
            </div>

            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" value="{{$user->email}}" placeholder="Email" name="email" readonly>
            </div>

            <div class="form-group">
              <label>Địa chỉ</label>
              <input type="text" class="form-control" value="{{$user->address}}" placeholder="Địa chỉ" name="address">
            </div>

            <div class="form-group">
              <label>SĐT</label>
              <input type="phone" pattern="[0-9]{10}" class="form-control" value="0{{$user->phone}}" placeholder="Số điện thoại" name="phone">
            </div>

            <div class="form-group">
              <input type="checkbox" name="changepassword" id="changepassword">
              <label>Thay đổi mật khẩu</label>
            </div>
            <div class="form-group">
              <label>Mật khẩu</label>
              <input type="password" class="form-control password" placeholder="Mật khẩu" name="password" disabled>
            </div>
            
            <div class="form-group">
              <label>Xác nhận mật khẩu</label>
              <input type="password" class="form-control password" name="passwordconfirmation" placeholder="Xác nhận mật khẩu" disabled>
            </div>

            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button type="submit" class="btn btn-success">Cật nhật</button>
          </form>
        </div>
        
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script>
    $(document).ready(function(){
      $('#changepassword').change(function(){
        if($(this).is(":checked")){
          $('.password').removeAttr('disabled');
        }else{
          $('.password').attr('disabled','');
        }
      });
    });
  </script>
@endsection