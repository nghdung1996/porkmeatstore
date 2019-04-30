<header>
  <!-- header -->
  <div id="header">
    <div class="container">
      <div class="pull-left">
        <!-- Logo -->
        <div class="header-logo">
          <a class="logo" href="home">
            <img src="./img/logo.png" alt="">
          </a>
        </div>
        <!-- /Logo -->
        <style>
          .header-search>form .search-input {
            padding-left: 200px;
            padding-right: 45px;
          }

          .header-search>form .search-categories {
            position: absolute;
            left: 0px;
            top: 0px;
            width: 180px;
          }
        </style>
        <!-- Search -->
        <div class="header-search">
          <form action="searchproduct" method="post">
            <select class="input search-categories" name="category">
              <option value="1">Sản phẩm</option>
              <option value="2">Món ngon mỗi ngày</option>
            </select>
            <input class="input search-input" type="text" placeholder="Tìm kiếm sản phẩm" name="name">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
        <!-- /Search -->
        {{-- <!-- Search -->
					<div class="header-search">
            <form>
              <input class="input search-input" type="text" placeholder="Enter your keyword">
              <select class="input search-categories">
                <option value="0">All Categories</option>
                <option value="1">Category 01</option>
                <option value="1">Category 02</option>
              </select>
              <button class="search-btn"><i class="fa fa-search"></i></button>
            </form>
          </div>
        <!-- /Search -->   --}}
      </div>
      <div class="pull-right">
        <ul class="header-btns">
          <!-- Account -->
          <li class="header-account dropdown default-dropdown">
            <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
              <div class="header-btns-icon">
                <i class="fa fa-user-o"></i>
              </div>
              <strong class="text-uppercase"> Xen Tài khoản của tôi<i class="fa fa-caret-down"></i></strong>
            </div>
            @if (!Auth::check())
              <a href="login" class="text-uppercase">Đăng nhập</a> / <a href="signup" class="text-uppercase">Đăng ký</a>
            @else
            {{-- <a href="logout" class="text-uppercase">Đăng xuất</a> --}}
            <a href="users/edit/{{Auth::user()->id}}"> <i style="color:seagreen"> {{Auth::user()->name}}</i></a>
            @endif
            <ul class="custom-menu">
              @if (Auth::check())
                <li><a href="users/edit/{{Auth::user()->id}}"><i class="fa fa-user-o"></i> Tài khoản của tôi</a></li>
                <li><a href="likedproducts"><i class="fa fa-heart-o"></i>Yêu thích</a></li>
                <li><a href="orderslist"><i class="fa fa-list"></i> Lịch Sử Mua Hàng</a></li>
              @endif
              @if (Auth::check())
                <li><a href="logout"><i class="fas fa-lock"></i>Đăng xuất</a></li>
              @else
                <li><a href="login"><i class="fa fa-unlock-alt"></i> Đăng nhập</a></li>
                <li><a href="signup"><i class="fa fa-user-plus"></i> Tạo tài khoản</a></li>
              @endif
            </ul>
          </li>
        
          <!-- /Account -->

          <!-- Cart -->
          <li class="header-cart dropdown default-dropdown">
            @include('pages.header_cart')
          </li>
          <!-- /Cart -->

          <!-- Mobile nav toggle-->
          <li class="nav-toggle">
            <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
          </li>
          <!-- / Mobile nav toggle -->
        </ul>
      </div>
    </div>
    <!-- header -->
  </div>
  <!-- container -->
</header>
