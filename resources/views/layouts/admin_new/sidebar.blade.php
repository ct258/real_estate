<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{route('dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Bảng Điều Khiển</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Bất Động Sản</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('real_estate.create')}}">Tạo BĐS</a></li>
                    <li><a href="{{route('real_estate.index')}}">Cập nhật BĐS</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>Khách Hàng </span>
                    </a>
                    <ul class="sub">
                        <li><a href="">Cập Nhật Khách Hàng</a></li>
                        <li><a href="">Ý Kiến Khách Hàng</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Thống Kê</span>
                    </a>
                    <ul class="sub">
                        <li><a href="">Thống Kê</a></li>
                        <li><a href="">Thống Kê Doanh Thu</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-cog"></i>
                        <span>Cài Đặt</span>
                    </a>
                    <ul class="sub">
                        <li><a href="">Ảnh Bìa</a></li>
                        <li><a href="">Cập Nhật Trạng Thái</a></li>
                        <li><a href="">Cập Nhật Khuyến Mãi</a></li>
                    </ul>
                </li> 
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-envelope"></i>
                        <span>Mail </span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('email')}}">Hộp thư đến</a></li>

                        <li><a href="{{route('email_compose')}}"> Soạn mail</a></li>
                    </ul>
                </li>
                {{-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-bar-chart-o"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="sub">
                        <li><a href="chartjs.html">Chart js</a></li>
                        <li><a href="flot_chart.html">Flot Charts</a></li>
                    </ul>
                </li> --}}
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-bar-chart-o"></i>
                        <span>Maps</span>
                    </a>
                    <ul class="sub">
                        <li><a href="google_map.html">Google Map</a></li>
                        <li><a href="vector_map.html">Vector Map</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-glass"></i>
                        <span>Extra</span>
                    </a>
                    <ul class="sub">
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="404.html">404 Error</a></li>
                        <li><a href="registration.html">Registration</a></li>
                    </ul>
                </li>
                <li>
                    <a href="login.html">
                        <i class="fa fa-user"></i>
                        <span>Login Page</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->