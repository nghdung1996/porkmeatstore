@extends('layouts.index')
@section('title')
	Thanh toán
@endsection
@section('content')
  	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="">Trang chủ</a></li>
				<li class="active">Thanh toán</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			@if (count($errors) >0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $err)
						{{ $err }}  <br>
					@endforeach
				</div>
			@endif
			@if (session('success'))
				<div class="alert alert-success" id="success">
					{{session('success')}}
				</div>
					
			@endif
			@if (session('danger'))
			<div class="alert alert-danger" id="danger">
					{{session('danger')}}
				</div>
			@endif
			<div class="row">
				<form id="checkout-form" class="clearfix" method="POST" action="checkout">
					<div class="col-md-6">
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Chi tiết đơn hàng</h3>
							</div>
							@if (Auth::user())
								@php
									$user = Auth::user();
								@endphp
								<div class="form-group">
									<label for="">Tên người nhận *</label>
									<input class="input" type="text" name="name" placeholder="Nhập tên Người nhận" value="{{$user->name}}">
								</div>
								<div class="form-group">
									<label for="">Email *</label>
									<input class="input" type="email" name="email" placeholder="Email" value="{{$user->email}}">
								</div>
								<div class="form-group">
									<label for="">Địa chỉ *</label>
									<input class="input" type="text" name="address" placeholder="Địa chỉ" value="{{$user->address}}">
								</div>
								<div class="form-group">
									<label for="">Số điện thoại *</label>
									<input class="input" type="tel" name="phone" placeholder="Số điện thoại" value="0{{$user->phone}}">
								</div>
								<div class="form-group">
									<label for="">Thông tin thêm</label>
									<textarea name="description" cols="74" rows="5" placeholder=" Thêm thông tin cần thiết"></textarea>
								</div>
								<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
							@else
								<div class="form-group">
									<label for="">Tên người nhận *</label>
									<input class="input" type="text" name="name" placeholder="Nhập tên người nhận">
								</div>
								<div class="form-group">
									<label for="">Email</label>
									<input class="input" type="email" name="email" placeholder="Có thể không nhập email">
								</div>
								<div class="form-group">
									<label for="">Địa chỉ *</label>
									<input class="input" type="text" name="address" placeholder="Nhập Địa chỉ">
								</div>
								<div class="form-group">
									<label for="">Số điện thoại *</label>
									<input class="input" type="tel" name="phone" placeholder="Nhập số điện thoại">
								</div>
								<div class="form-group">
									<label for="">Thông tin thêm</label>
									<textarea name="description" cols="74" rows="5" placeholder="Thêm thông tin cần thiết"></textarea>
								</div>
							@endif
						</div>
					</div>

					@if (!Auth::user())
						<div class="col-md-6">
							<div class="section-title">
								<h4 class="title">Chú ý</h4>
							</div>
							
							<h3 style="color: red">Một số lợi ích khi đăng nhập vào hệ thống</h3>
							<ul>
								<li><i>Hưởng tích điểm khi mua hàng</i></li>
								<li><i>Xem danh sách đơn hàng đã mua</i></li>
								<li><i>Hủy đơn hàng khi chờ lấy hàng</i></li>
							</ul>
							<a href="login" class="btn btn-primary">Đăng nhập</a>
						</div>
					@endif
					
					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
                <h3 class="title">Đơn hàng</h3>
							</div>
                <h4>Mã đơn hàng: @php
                    $order_code = str_random(6);
                  echo $order_code;
                @endphp</h4>
								<input type="hidden" name="order_code" value="{{$order_code}}">
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Sản phẩm</th>
										<th></th>
										<th class="text-center">Giá</th>
										<th class="text-center">Số Lượng</th>
										<th class="text-center">Thành tiền</th>
									</tr>
								</thead>
								<tbody>
                  @php
                      $subtotal = 0;
                  @endphp

                  @if (session('cart'))
                    @foreach (session('cart') as $id => $details)
                      @php
                        $subtotal += $details['quantity'] *$details['promotionprice'];
                      @endphp
                      <tr>
                        <td class="thumb"><img src="upload/images/{{$details['image']}}" alt=""></td>
                        <td class="details">
                          <a href="products/{{$id}}/show">{{$details['name']}}</a>
                        </td>
                        <td class="price text-center"><strong>{{number_format($details['promotionprice'])}} VNĐ</strong><br><del class="font-weak"><small>{{number_format($details['price'])}} VNĐ</small></del></td>
                        <td class="qty text-center"><input class="input quantity" type="number" value="{{$details['quantity']}}" readonly></td>
                        <td class="total text-center"><strong class="primary-color">{{number_format($details['promotionprice'] * $details['quantity'])}} VNĐ</strong></td>
                      </tr>      
										@endforeach
									@endif
									
								</tbody>
								<tfoot>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>Tổng tiền</th>
										<th colspan="2" class="total ajaxtotal">{{number_format($subtotal)}} VNĐ</th>
									</tr>
								</tfoot>
							</table>
							@if (Auth::user())
								<div>
									<label class="shopxu">Shop xu hiện có : {{Auth::user()->shopxu}}</label>
									<input type="checkbox" name="usingShopxu" class="checkboxx"> Sử dụng shopxu
								</div>
							@endif
							<div class="pull-right">
								<button class="primary-btn" type="submit">Đặt hàng</button>
              </div>
              <div class="pull-left">
                  <a href="cart" class="primary-btn">Trở về giỏ hàng</a>
                </div>
						</div>

					</div>
					<input type="hidden" name="subtotal" value="{{$subtotal}}" class="subtotal">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
				</form>
				
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
@endsection
@section('script')
	<script>
		$(document).ready(function(){
			$('.checkboxx').change(function(){
				var subtotal = $('.subtotal').val();

				var shopxu = {{Auth::user() ? Auth::user()->shopxu : 0}};
				var total_price = subtotal - shopxu;
				if(total_price < 0){
					total_price = 0;
				}
				$('.ajaxtotal').html(total_price+ ' VNĐ');
        if($(this).is(":checked")){
          $('.ajaxtotal').html(total_price+ ' VNĐ');
        }else{
          $('.ajaxtotal').html(subtotal+ ' VNĐ');
        }
      });
		});
	</script>
@endsection