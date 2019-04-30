<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Thịt Lợn Sạch | @yield('title')</title>
  <base href="{{asset('')}}" >
	<!-- Google font -->
	{{-- <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet"> --}}

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />
  
  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
	@include('layouts.header')
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	@include('layouts.navigation')
	<!-- /NAVIGATION -->
	@if (count($errors) >0)
    @foreach ($errors->all() as $err)
      <div class="alert alert-danger">
        {{ $err }}   
      </div>
    @endforeach
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
	@yield('content')

	<!-- FOOTER -->
  @include('layouts.footer')
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
  <script src="js/main.js"></script>
	<script src="js/notify.js"></script>
	<script>
		$(document).ready(function(){
		
			$('body').on('click', '.add-to-cart', function(e){
				
				e.preventDefault();
				var ele = $(this);
				
				$.ajax({
					url: '{{url('multiple-add-to-cart')}}',
					method: 'get',
					data: {id: ele.attr("data-id"), quantity: ele.attr("quantity")},
					success: function(response){
						$.notify("Thêm thành công vào giỏ hàng", "success");
						$('.header-cart').html(response.html)
					}
				});
			});
	
			$('body').on('click', '.remove-from-cart', function(e){
				e.preventDefault();
				var ele = $(this);
	
				$.ajax({
					url: '{{url('remove-from-cart')}}',
					method: "delete",
					data: {_token: '{{csrf_token()}}', id: ele.attr("data-id")},
					success: function(response){
						$('.header-cart').html(response.header_cart);
						$('.table-cart').html(response.table_cart);
					}
				});
			});


			$('body').on('click', '.like-create', function(e){
				e.preventDefault();
				var id = $(this).attr('data-id');

				$.ajax({
					url: '{{url('like/create')}}',
					method: 'get',
					data: {id: id},
					success: function(data){
						$('.lastest').html(data.html);
					}
				});
			});

			$('body').on('click', '.like-destroy', function(e){
				e.preventDefault();
				var id = $(this).attr('data-id');

				$.ajax({
					url: '{{url('like/destroy')}}',
					method: 'get',
					data: {id: id},
					success: function(data){
						$('.lastest').html(data.html);
					}
				});
			});

		});
	</script>
	
	@yield('script')

</body>

</html>
