@extends('admin.layouts.index')
@section('content')
  <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đơn hàng
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if (session('success'))
              <div class="alert aleart-success">
                {{session('success')}}
              </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Mã đơn</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Giá</th>
                        <th>Thông tin thêm</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $order)
                    <tr class="odd gradeX" align="center">
                      <td>{{$order->id}}</td>
                      <td>{{$order->order_code}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->total_price}}</td>
                        <td>{{$order->description}}</td>
                        <td>
                          @if ($order->order_status == 0)
                            Chờ Lấy hàng
                          @elseif($order->order_status == 1)
                            Đang giao hàng
                          @elseif($order->order_status == 3)
                            Đang giao hàng
                          @else
                            Đã nhận hàng
                          @endif
                          >><a href="admin/order/editorder/{{$order->id}}">Sửa</a>
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
