<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('admin-theme/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Travelo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin-theme/dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <span>Admin</span>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

              <li class="nav-item">
                <a href="{{route('tour_user.index')}}" class="nav-link">
                    <i class="fas fa-archway"></i>
                  <p>&nbsp; &nbsp; Tour đã đặt</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('tour.index')}}" class="nav-link">
                    <i class="fas fa-globe-africa"></i>
                  <p>&nbsp; &nbsp; Quản lí tour</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('transport.index')}}" class="nav-link">
                    <i class="fas fa-plane-departure"></i>
                  <p>&nbsp; &nbsp; Phương tiện</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('hotel.index')}}" class="nav-link">
                    <i class="fas fa-hotel"></i>
                    <p>&nbsp; &nbsp; Khách sạn</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('countries.index')}}" class="nav-link">
                    <i class="fas fa-map-marked-alt"></i>
                    <p>&nbsp; &nbsp; Địa điểm du lịch</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('news.index')}}" class="nav-link">
                    <i class="fas fa-book-open"></i>
                    <p>&nbsp; &nbsp; Bài viết</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link">
                    <i class="fas fa-user-shield"></i>
                    <p>&nbsp; &nbsp; User</p>
                </a>
              </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
