<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="admin/home">Thịt lợn sạch | Trang Admin</a>
  </div>
  <!-- /.navbar-header -->

  <ul class="nav navbar-top-links navbar-right">
      <!-- /.dropdown -->
      <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li><a href="{{route('home')}}"><i class="fa fa-user fa-fw"></i> Trang chủ </a>
            </li>
            <li><a href="admin/home"><i class="fa fa-gear fa-fw"></i> {{Auth::user()->name}}</a>
            </li>
            <li class="divider"></li>
            <li><a href="admin/logout"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
            </li>
          </ul>
          <!-- /.dropdown-user -->
      </li>
      <!-- /.dropdown -->
  </ul>
  <!-- /.navbar-top-links -->

  <div class="navbar-default sidebar" role="navigation">
      <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">
              <li>
                  <a href="admin/home"><i class="fa fa-dashboard fa-fw"></i> Mục lục</a>
              </li>
              
              <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i> Sản phẩm<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li>
                      <a href="admin/product/index">Danh sách sản phẩm</a>
                  </li>
                  <li>
                      <a href="admin/product/new">Thêm Sản Phẩm </a>
                  </li>
                </ul>
                <!-- /.nav-second-level -->
              </li>
              
              <li>
                  <a href="admin/user/index"><i class="fa fa-users fa-fw"></i> Người dùng<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                      <li>
                          <a href="admin/user/index">Danh sách người dùng</a>
                      </li>
                      <li>
                          <a href="admin/user/new">Thêm người dùng</a>
                      </li>
                  </ul>
                  <!-- /.nav-second-level -->
              </li>
              <li>
                <a href="admin/order/index"><i class="fa fa-cube fa-fw"></i> Đơn hàng<span class="fa arrow"></span></a>
              </li>

              <li>
                    <a href="admin/posts/index"><i class="fa fa-list fa-fw"></i> Bài đăng<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/posts/index">Danh sách bài đăng</a>
                        </li>
                        <li>
                            <a href="admin/posts/new">Thêm bài đăng</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
          </ul>
      </div>
      <!-- /.sidebar-collapse -->
  </div>
  <!-- /.navbar-static-side -->
</nav>