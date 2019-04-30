@extends('layouts.index')
@section('title')
  {{$product->name}}
@endsection
@section('content')
  	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="">Trang chủ</a></li>
				<li class="active">{{$product->name}}</li>
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
				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-6" >
						<div id="product-main-view">
							<div class="">
								<img src="upload/images/{{$product->image}}" alt="" width="500px" height="500px">
							</div>
						</div>
						{{-- <div id="product-view" >
							<div class="product-view">
								<img src="./img/thumb-product01.jpg" alt="">
							</div>
						</div> --}}
					</div>
					<div class="col-md-6">
						<div class="product-body">
							@if (!$product->discount == 0)
								<div class="product-label">
									<span class="sale">-{{$product->discount * 100}}%</span>
								</div>
							@endif
							<h2 class="product-name">{{$product->name}}</h2>
							<h3 class="product-price">{{number_format($product->price* (1-$product->discount))}} VNĐ
								@if (!$product->discount == 0)
									<del class="product-old-price">{{number_format($product->price)}} VNĐ</del>
								@endif
							</h3>
							
							<p>{{$product->description}}</p>
							<div class="product-btns">
								<div class="qty-input">
									<span class="text-uppercase">SL: </span>
									<input class="input quantity" type="number" name="quantity" min="1" value=1>
								</div>
								<button class="primary-btn multiple-add-to-cart" data-id="{{$product->id}}"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
								{{-- <div class="pull-right">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
								</div> --}}
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="product-tab">
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Mô tả</a></li>
								<li><a data-toggle="tab" href="#tab2">Nhận xét ({{count($product->comment)}})</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab1" class="tab-pane fade in active">
									<p>{{$product->description}}</p>
								</div>
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-6">
											<div class="product-reviews">
												@include('products.pagination_comment')
											</div>
										</div>
										<div class="col-md-6">
											<h4 class="text-uppercase">Viết nhận xét của bạn</h4>
											@if(Auth::user())
												<?php $user = Auth::user(); ?>
												<form class="review-form" action="comment/create" method="get">
													<div class="form-group">
														<input readonly class="input" type="text" value="{{$user->name}}" />
													</div>
													<div class="form-group">
														<input readonly class="input" type="email" value="{{$user->email}}" />
													</div>
													<div class="form-group">
														<textarea class="input" name="content" placeholder="Nội dung"></textarea>
													</div>
													<input type="hidden" name="_token" value="{{csrf_token()}}">
													<input type="hidden" name="id_user" value="{{$user->id}}">
													<input type="hidden" name="id_product" value="{{$product->id}}">
													<button type="submit" class="primary-btn">Gửi</button>
												</form>
											@else
                        <p><a href="login" class="btn btn-default">Đăng nhập để nhận xét</a></p>
                      @endif
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	@include('products.pickforyou')
@endsection

@section('script')
	<script>
		$(document).ready(function(){
			$('body').on('click', '.multiple-add-to-cart', function(e){
				
				e.preventDefault();
				var ele = $(this);
				
				$.ajax({
					url: '{{url('multiple-add-to-cart')}}',
					method: 'get',
					data: { id: ele.attr("data-id"), quantity: ele.parents(".product-btns").find(".quantity").val()},
					success: function(response){
						$('.header-cart').html(response.html);
					}
				});
			});

			
			$(document).on('click', '.pagination a',function(e){
				e.preventDefault();
				
				var page = $(this).attr('href').split('page=')[1];
				fetch_data(page);
			});
			
			function fetch_data(page){
				var id = $('.multiple-add-to-cart').attr('data-id');
				$.ajax({
					url: 'fetch_data?page='+page,
					data: {id_product:id},
					success: function(data){
						$('.product-reviews').html(data);
					}
				});
			}
		});
	</script>
@endsection