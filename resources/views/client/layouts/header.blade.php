<!-- header-start -->
<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="{{asset('client-theme/img/logo.png')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="{{route('home')}}">Trang chủ</a></li>
                                        <li><a class="" href="{{route('tour')}}">Tour</a></li>
                                        <li><a href="{{route('blog')}}">blog</a></li>
                                        <li><a href="{{route('contact')}}">Liên hệ</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                            <div class="social_wrap d-flex align-items-center justify-content-end">
                                <div class="number">
                                    <p><i class="fa fa-phone"></i> 10(256)-928 256</p>
                                    @if(session('msg') != null)
                                        <p style="color: red">{{session('msg')}}</p>
                                    @endif
                                </div>
                                <div class="social_links d-none d-xl-block">
                                    @if(Auth::check() && Auth::user()->role == 0)
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                Xin chào: {{Auth::user()->fullname}}
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('booking_tour_user')}}">Tour của bạn</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a>
                                            </div>
                                        </div>
                                    @elseif(Auth::check() && Auth::user()->role == 1)
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                Admin: {{Auth::user()->fullname}}
                                            </button>
                                            <div class="dropdown-menu">

                                                <a class="dropdown-item" href="{{route('tour_user.index')}}">Admin</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a>
                                            </div>
                                        </div>
                                        @else
                                        <a data-toggle="modal" data-target="#myModal" href="" class="btn btn-primary">Đăng nhập</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="seach_icon">
                            <a data-toggle="modal" data-target="#exampleModalCenter" >
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- header-end -->
<!-- login -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Đăng nhập</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Enter email" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password</label>
                        <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    <a data-toggle="modal" data-target="#myModal1" style="color: #0c84ff">Tạo tài khoản</a>
                </form>



            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- register -->
<div class="modal fade" id="myModal1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Đăng kí</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="{{route('register')}}">
                    @csrf
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Tên đầy đủ </label>
                            <input type="text" name="fullname" class="form-control" placeholder="">
                        </div> <!-- form-group end.// -->
                        <div class="col form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder=" ">
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row end.// -->
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" name="address" class="form-control" placeholder="">
                    </div> <!-- form-group end.// -->
                    <div class="form-group">
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="1">
                            <span class="form-check-label"> Male </span>
                        </label>
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="0">
                            <span class="form-check-label"> Female</span>
                        </label>
                    </div> <!-- form-group end.// -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone_number" class="form-control">
                        </div> <!-- form-group end.// -->
                        <div class="form-group col-md-6">
                            <label>Ngày sinh</label>
                            <input type="date" name="birth_date" class="form-control">
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row.// -->
                    <div class="form-group">
                        <label>Create password</label>
                        <input class="form-control" name="password" type="password">
                    </div> <!-- form-group end.// -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Đăng kí </button>
                    </div> <!-- form-group// -->
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

