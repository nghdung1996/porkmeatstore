@extends('layouts.index')
@section('content')
<br>
  <div class="container">
    <div class="col-md-6">
      @if (count($errors)>0)
        <div class="alert alert-danger">
          @foreach ($errors->all() as $err)
            {{$err}} <br>
          @endforeach
        </div>
      @endif
      <h4>Đóng góp ý kiến của bạn</h4>
      <form action="feedback" method="post">
        <div class="form-group">
          <label>Tên *</label>
          <input type="text" name="name" class="form-control" placeholder="Nhập tên">
        </div>
        <div class="form-group">
          <label>Địa chỉ Email</label>
          <input type="email" name="email" class="form-control" placeholder="Bạn có thể nhập email">
        </div>
        <div class="form-group">
          <label>Số điện thoại</label>
          <input type="phone" name="phone" class="form-control" placeholder="Bạn có thể nhập số điện thoại">
        </div>
        <div class="form-group">
          <label>Địa chỉ</label>
          <input type="text" name="address" class="form-control" placeholder="Bạn có thể nhập dịa chỉ">
        </div>
        <div class="form-group">
          <label>Tiêu đề *</label>
          <input type="text" name="title" class="form-control"placeholder="Nhập tiêu đề đóng góp">
        </div>
        <div class="form-group">
          <label>Nội dung *</label>
          <textarea name="content" id="" cols="72" rows="5"></textarea>
        </div>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <button type="submit" class="btn btn-primary">Gửi</button>
      </form>
    </div>
  </div>
@endsection