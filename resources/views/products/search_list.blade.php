@extends('layouts.index')
@section('title')
  Tìm kiếm sản phẩm
@endsection
@section('content')
    
<!-- BREADCRUMB -->
<div id="breadcrumb">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="">Trang chủ</a></li>
      <li class="active">Danh sách</li>
    </ul>
  </div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <!-- MAIN -->
      <div id="main" class="col-md-9">
        <!-- STORE -->
        <div id="store">
          <!-- row -->
          <div class="row">
            @if (count($products) > 0)
              @foreach ($products as $product)
              <!-- Product Single -->
              <div class="col-md-4 col-sm-6 col-xs-6">
                <div class="product product-single">
                  <div class="product-thumb">
                    <div class="product-label">
                      <span class="sale">-{{$product->discount*100}}%</span>
                    </div>
                    <img src="upload/images/{{$product->image}}" alt="" style="width: 260px; height: 190px;">
                  </div>
                  <div class="product-body">
                    <h3 class="product-price">{{number_format(($product->price-$product->price*$product->discount))}} VNĐ <del class="product-old-price">${{$product->price}}</del></h3>
                    <div class="product-rating">
                      @for ($i=0; $i< round($product->comment->avg('rating')); $i++)
                        <i class="fa fa-star"></i>
                      @endfor
                      @for ($i=0; $i< 5-round($product->comment->avg('rating')); $i++)
                        <i class="fa fa-star-o empty"></i>
                      @endfor
                    </div>
                    <h2 class="product-name"><a href="products/{{$product->id}}/show">{{$product->name}}</a></h2>
                    <div class="product-btns">
                        @if (Auth::user())
                        @if ((App\Like::is_like(Auth::user()->id, $product->id)))
                          <span class="liked icon-btn like-destroy" data-id="{{$product->id}}" style="color: rgb(248, 105, 74)">
                            @if (count($product->like)>0)
                              {{count($product->like)}} 
                            @endif
                            <i class="fa fa-heart"></i>
                          </span>
                        @else
                          <span class="main-btn icon-btn like-create" data-id="{{$product->id}}">
                            @if (count($product->like)>0)
                              {{count($product->like)}}
                            @endif 
                            <i class="fa fa-heart"></i>
                          </span>
                        @endif
                      @else
                        <span class="main-btn icon-btn like-create" data-id="{{$product->id}}">
                          @if (count($product->like)>0)
                            {{count($product->like)}}
                          @endif 
                          <i class="fa fa-heart"></i>
                        </span>
                      @endif
                      <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /Product Single -->
              @endforeach
            @else
              <div class="alert alert-danger">
                Không tìm thấy sản phẩm
              </div>
            @endif
          </div>
          <!-- /row -->
        </div>
        <!-- /STORE -->
      </div>
      <!-- /MAIN -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /section -->
@endsection