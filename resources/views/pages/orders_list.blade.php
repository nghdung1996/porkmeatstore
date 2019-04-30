@extends('layouts.index')
@section('title')
  Lịch sử mua hàng
@endsection
@section('content')
  	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="">Trang chủ</a></li>
				<li class="active">Lịch Sử Mua Hàng</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->
  <div class="section">
    <div class="container">
      <h3>Quản lý chi tiêu khách hàng</h3>
      Tổng xu hiện có : {{Auth::user()->shopxu}}
    </div>
  </div>

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
      @foreach ($orders as $order)
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
              <div class="order-summary clearfix">
                <div class="section-title">
                  <h3 class="title">Mã đơn hàng : {{$order->order_code}}</h3>
                  <h5>Ngày đặt: {{$order->created_at}}</h5>
                  @if ($order->order_status == 0)
                    <a href="deleteorder/{{$order->id}}" class="btn btn-danger pull-left" 
                      onclick="return confirm('Bạn có chắc chắn muốn xóa')"  
                    >Hủy</a>
                  @endif
                  <div class="pull-right">Trạng thái:
                    @if ($order->order_status == 0)
                      <span class="btn btn-info">
                        Chờ lấy hàng                        
                      </span>  
                    @elseif($order->order_status == 1)
                      <span class="btn btn-primary">
                        Đang giao hàng
                      </span>
                    @else
                      <span class="btn btn-success">
                        Đã nhận
                      </span>
                    @endif

                  </div>
                </div>
                <table class="shopping-cart-table table table-cart">
                  <thead>
                    <tr>
                      <th>Sản Phẩm</th>
                      <th></th>
                      <th class="text-center">Giá</th>
                      <th class="text-center">Số lượng</th>
                      <th class="text-center">Thành tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($order->lineitem as $line_item)
                        @php
                          $product = App\Product::find($line_item->product_id);
                        @endphp
                        <tr>
                          <td class="thumb"><img src="upload/images/{{$product->image}}" alt=""></td>
                          <td class="details">
                            <a href="products/{{$product->id}}/show">{{$product->name}}</a>
                          </td>
                          <td class="price text-center"><strong>{{number_format($product->price-$product->price*$product->discount)}} VNĐ</strong>
                          </td>
                          <td class="qty text-center"><input class="input quantity" type="number"
                            value="{{$line_item->quantity}}" readonly></td>
                          <td class="total text-center"><strong class="primary-color"><span class="subtotal">{{number_format($line_item->price)}} VNĐ</span></strong></td>
                        </tr>
                      @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th class="empty" colspan="3"></th>
                      <th>Tổng tiền</th>
                      <th colspan="2" class="total"><span class="totalprice">{{number_format($order->total_price)}}</span> VNĐ</th>
                    </tr>
                  </tfoot>                
                </table>
              </div>
              
            </div>
          </form>
        </div>
        <!-- /row -->
        <hr>
      @endforeach
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
@endsection