<thead>
  <tr>
    <th>Sản phẩm</th>
    <th></th>
    <th class="text-center">Giá</th>
    <th class="text-center">Số lượng</th>
    <th class="text-center">Thành tiền</th>
    <th class="text-right"></th>
    <th class="text-right"></th>
  </tr>
</thead>
<tbody>
  @php
    $total=0;
  @endphp
  @if (session('cart'))
    @foreach (session('cart') as $id => $details)
      @php
        $total += $details['promotionprice']*$details['quantity'];
      @endphp
      <tr>
        <td class="thumb"><img src="upload/images/{{$details['image']}}" alt=""></td>
        <td class="details">
          <a href="products/{{$id}}/show">{{$details['name']}}</a>
        </td>
        <td class="price text-center"><strong>{{number_format($details['promotionprice'])}} VNĐ</strong>
          <small><del class="product-old-price">{{number_format($details['price'])}} VNĐ</del></small>
        </td>
        <td class="qty text-center"><input class="input quantity" type="number"
          value="{{$details['quantity']}}" min="1" step="0.5"></td>
        <td class="total text-center"><strong class="primary-color"><span class="subtotal">{{number_format($details['quantity']*$details['promotionprice'])}} VNĐ</span></strong></td>
        <td class="text-right"><button class="main-btn icon-btn update-cart" data-id="{{$id}}"><i class="fa fa-refresh"></i></button></td>
        <td class="text-right"><button class="main-btn icon-btn remove-from-cart-o-duoi" data-id="{{$id}}"><i class="fa fa-close"></i></button></td>
      </tr>
    @endforeach    
  @endif
</tbody>
<tfoot>
  <tr>
    <th class="empty" colspan="3"></th>
    <th>Tổng tiền</th>
    <th colspan="2" class="total"><span class="totalprice">{{$total}}</span> VNĐ</th>
  </tr>
</tfoot>


