@extends('admin.layouts.index')
@section('content')
  <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Trạng thái đơn hàng
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
                <form action="admin/order/posteditorder" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <select name="order_status" class="form-control">
                        <option value="0" 
                          @if ($order->order_status == 0)
                            {{"selected"}}
                          @endif
                        >Chờ lấy hàng</option>
                        <option value="1"
                          @if ($order->order_status == 1)
                            {{"selected"}}
                          @endif
                        >Đang giao hàng</option>
                        <option value="2"
                          @if ($order->order_status == 2)
                            {{"selected"}}
                          @endif
                        >Đã nhận hàng</option>
                        <option value="3"
                          @if ($order->order_status == 3)
                            {{"selected"}}
                          @endif
                        >Hủy đơn hàng</option>
                      </select>
                    </div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="id" value="{{$order->id}}">
                    <button type="submit" class="btn btn-default"> Sửa</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
@endsection