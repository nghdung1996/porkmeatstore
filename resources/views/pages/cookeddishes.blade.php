@extends('layouts.index')
@section('content')
  <div class="container">
    <!-- row -->
    <div class="row">
      <!-- section title -->
      <div class="col-md-12">
        <div class="section-title">
          <h2 class="title">Các món được chế biến sẵn</h2>
        </div>
        <span><h4>Giá tiền được tính theo 1Kg</h4></span>
      </div>
      <!-- section title -->
      @foreach ($cookeddishes as $cookeddish)
        <!-- Product Single -->
        
        <!-- Button trigger modal -->
          
          <!-- Modal -->
          <div class="modal fade" id="myModal<?php echo  $cookeddish->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{$cookeddish->name}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <img src="upload/images/{{$cookeddish->image}}" alt="" width="550px">
                  Tên: <a href="products/{{$cookeddish->id}}/show">{{$cookeddish->name}}</a> <br>
                  Giá: {{number_format($cookeddish->price - $cookeddish->price*$cookeddish->discount )}} VNĐ <br>
                  Mô tả: {{$cookeddish->description}} <br>
                </div>
              </div>
            </div>
          </div>
        
        <div class="col-md-3 col-sm-6 col-xs-6">
          <div class="product product-single">
            <div class="">
              <img src="upload/images/{{$cookeddish->image}}" alt="" style="width: 260px; height: 190px;" data-toggle="modal" data-target="#myModal<?php echo  $cookeddish->id ?>">
            </div>
            <div class="product-body">
              <h3 class="product-price">{{number_format($cookeddish->price*(1-$cookeddish->discount))}} VNĐ
                @if ($cookeddish->discount > 0)
                  <del class="product-old-price"><?php echo $cookeddish->price ?></del>
                @endif
              </h3>
              @php
                $rating = round($cookeddish->comment->avg('rating'));
              @endphp
              <h2 class="product-name"><a href="products/{{$cookeddish->id}}/show">{{$cookeddish->name}}</a></h2>
              <div class="product-btns">
                @if (Auth::user())
                  @if ((App\Like::is_like(Auth::user()->id, $cookeddish->id)))
                    <span class="liked icon-btn like-destroy" data-id="{{$cookeddish->id}}">
                      @if (count($cookeddish->like)>0)
                        {{count($cookeddish->like)}} 
                      @endif
                      <i class="fa fa-heart"></i>
                    </span>
                  @else
                    <span class="main-btn icon-btn like-create" data-id="{{$cookeddish->id}}">
                      @if (count($cookeddish->like)>0)
                        {{count($cookeddish->like)}}
                      @endif 
                      <i class="fa fa-heart"></i>
                    </span>
                  @endif
                @else
                  <span class="main-btn icon-btn like-create" data-id="{{$cookeddish->id}}">
                    @if (count($cookeddish->like)>0)
                      {{count($cookeddish->like)}}
                    @endif 
                    <i class="fa fa-heart"></i>
                  </span>
                @endif
                <button class="primary-btn add-to-cart" data-id="{{$cookeddish->id}}" quantity="1" > <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
              </div>
            </div>
          </div>
        </div>
        <!-- /Product Single -->
      @endforeach

    </div>
    <!-- /row -->
  </div>
@endsection