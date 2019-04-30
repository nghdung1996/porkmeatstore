<!-- row -->
<div class="row">
  <!-- section title -->
  <div class="col-md-12">
    <div class="section-title">
      <h2 class="title">Danh sách sản phẩm</h2>
    </div>
    <span><h4>Giá tiền được tính theo 1Kg</h4></span>
  </div>
  <!-- section title -->
  @foreach ($lastest_products as $lastest_product)
    <!-- Product Single -->
    <!-- Modal -->
    <div class="modal fade" id="myModal<?php echo  $lastest_product->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">{{$lastest_product->name}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <img src="upload/images/{{$lastest_product->image}}" alt="" width="550px">
              Tên: <a href="products/{{$lastest_product->id}}/show">{{$lastest_product->name}}</a> <br>
              Giá: {{number_format($lastest_product->price - $lastest_product->price*$lastest_product->discount )}} VNĐ <br>
              Mô tả: {{$lastest_product->description}} <br>
            </div>
          </div>
        </div>
      </div>
    <div class="col-md-3 col-sm-6 col-xs-6">
      <div class="product product-single">
        <div class="">
          <img src="upload/images/{{$lastest_product->image}}" alt="" style="width: 260px; height: 190px;" data-toggle="modal" data-target="#myModal<?php echo  $lastest_product->id ?>">
        </div>
        <div class="product-body">
          <h3 class="product-price">{{number_format($lastest_product->price*(1-$lastest_product->discount))}} VNĐ
            @if ($lastest_product->discount > 0)
              <del class="product-old-price"><?php echo $lastest_product->price ?></del>
            @endif
          </h3>
          @php
            $rating = round($lastest_product->comment->avg('rating'));
          @endphp
          <h2 class="product-name"><a href="products/{{$lastest_product->id}}/show">{{$lastest_product->name}}</a></h2>
          <div class="product-btns">
            @if (Auth::user())
              @if ((App\Like::is_like(Auth::user()->id, $lastest_product->id)))
                <span class="liked icon-btn like-destroy" data-id="{{$lastest_product->id}}">
                  @if (count($lastest_product->like)>0)
                    {{count($lastest_product->like)}} 
                  @endif
                  <i class="fa fa-heart"></i>
                </span>
              @else
                <span class="main-btn icon-btn like-create" data-id="{{$lastest_product->id}}">
                  @if (count($lastest_product->like)>0)
                    {{count($lastest_product->like)}}
                  @endif 
                  <i class="fa fa-heart"></i>
                </span>
              @endif
            @else
              <span class="main-btn icon-btn like-create" data-id="{{$lastest_product->id}}">
                @if (count($lastest_product->like)>0)
                  {{count($lastest_product->like)}}
                @endif 
                <i class="fa fa-heart"></i>
              </span>
            @endif
            <button class="primary-btn add-to-cart" data-id="{{$lastest_product->id}}" quantity="1" > <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /Product Single -->
  @endforeach

</div>
<!-- /row -->