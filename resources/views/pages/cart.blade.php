@extends('layouts.index')
@section('content')
  	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="">Trang chủ</a></li>
				<li class="active">Giỏ hàng</li>
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
					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Đơn hàng của bạn</h3>
							</div>
							<table class="shopping-cart-table table table-cart">
                @include('pages.table_cart')
              </table>
              <div class="pull-left">
								<a href="home" class="btn primary-btn"> Tiếp tục mua hàng</a>
							</div>
							<div class="pull-right">
								<a href="checkout" class="btn primary-btn"> Thanh toán</a>                
							</div>
						</div>

					</div>
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
      $('body').on('click', '.update-cart', function(e){
        e.preventDefault();
        var ele = $(this);

        $.ajax({
          url: '{{url('update-cart')}}',
          method: "patch",
          data: {_token: '{{csrf_token()}}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
          success: function(data){
            $('.table-cart').html(data.table_cart);
            $('.header-cart').html(data.header_cart);
          }
        });
      });


      $('body').on('click', '.remove-from-cart-o-duoi', function(e){
        e.preventDefault();
        var ele = $(this);
        $.ajax({
          url: '{{url('remove-from-cart')}}',
          method: "delete",
          data: {_token: '{{csrf_token()}}', id: ele.attr("data-id")},
          success: function(data){
            $('.table-cart').html(data.table_cart);
            $('.header-cart').html(data.header_cart);
          }
        });
      });
    });
  </script>
@endsection
