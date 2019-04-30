<!-- section -->
<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Chọn cho bạn</h2>
					</div>
				</div>
				<!-- section title -->

        @foreach ($products as $product)
          <!-- Product Single -->
          <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="product product-single">
              <div class="product-thumb">
                <img src="upload/images/{{$product->image}}" alt="" width="262.5px" height="350px">
              </div>
              <div class="product-body">
                <h3 class="product-price">{{number_format($product->price - $product->price*$product->discount)}} VNĐ
                  @if ($product->discount > 0)
                    <del class="product-old-price"><?php echo $product->price ?></del>
                  @endif
                </h3>
                
                <h2 class="product-name"><a href="products/{{$product->id}}/show">{{$product->name}}</a></h2>
                <div class="product-btns">
                  <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                  <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                </div>
              </div>
            </div>
          </div>
          <!-- /Product Single -->
        @endforeach
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->