@php
  $total = 0;
@endphp
<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
  <div class="header-btns-icon">
    <i class="fa fa-shopping-cart"></i>
    <span class="qty">{{count((array)session('cart'))}}</span>
  </div>
  <strong class="text-uppercase">Giỏ hàng:</strong>
  <br>
  @if(session('cart'))
    @foreach (session('cart') as $id => $details)
      @php
        $total += $details['promotionprice'] * $details['quantity'];
      @endphp
    @endforeach
  @endif
  <span>{{number_format($total)}}</span>
</a>
<div class="custom-menu">
  <div id="shopping-cart">
    @if (session('cart'))                      
      <div class="shopping-cart-list">
          @foreach (session('cart') as $id => $details)
            <div class="product product-widget singleproduct">
              <div class="product-thumb">
                <img src="upload/images/{{$details['image']}}" alt="" height="70px">
              </div>
              <div class="product-body">
                <h3 class="product-price">{{number_format($details['promotionprice'])}} VNĐ
                  <span class="qty">x{{$details['quantity']}}</span>
                </h3>
                <h2 class="product-name"><a href="products/{{$id}}/show">{{$details['name']}}</a></h2>
              </div>
              <button class="cancel-btn remove-from-cart" data-id="{{$id}}"><i class="fa fa-trash"></i></button>
            </div>
            <hr>
          @endforeach
      </div>
      <div class="shopping-cart-btns">
        <a href="cart" class="main-btn">Giỏ hàng</a>
        <a href="checkout" class="primary-btn">Thanh toán <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    @else
    <i class="fas fa-shopping-cart">Giỏ hàng trống!</i>
    @endif                  
  </div>
</div>