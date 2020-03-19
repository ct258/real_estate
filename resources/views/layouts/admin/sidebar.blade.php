<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">

                {{-- Bất động sản --}}
                <li>
                    <a href="{{route('real_estate.index')}}">
                        <i class="fa fa-home"></i>
                        <span>Bất động sản</span>
                    </a>
                    <ul class="sub">
                        <li><a href="">Đang bán</a></li>
                        <li><a href="">Đang hẹn</a></li>
                        <li><a href="">Đang đặt cọc</a></li>
                        <li><a href="">Đang chứng nhận</a></li>
                        <li><a href="">Đã bán</a></li>
                    </ul>
                </li>
                {{-- bình luận --}}
                <li>
                    <a href="{{route('real_estate.index')}}">
                        <i class="fa fa-comment"></i>
                        <span>Bình luận</span>
                    </a>
                </li>
                {{-- khuyến mãi --}}
                <li>
                    <a href="#">
                        <i class="fa fa-gift" aria-hidden="true"></i>
                        <span>Khuyến Mãi </span>
                    </a>
                    <ul class="sub">
                        <li><a href="">Danh sách khuyến mãi</a></li>
                        <li><a href="">Cập Nhật Khuyến Mãi</a></li>
                    </ul>
                </li>
                {{-- bài viết --}}
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-pencil"></i>
                        <span>Bài viết</span>
                    </a>
                </li>
                {{-- báo cáo --}}
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-exclamation"></i>
                        <span>Báo cáo</span>
                    </a>
                    <ul class="sub">
                        <li><a href="">Chờ xử lý</a></li>
                        <li><a href="">Đã xử lý</a></li>
                    </ul>
                </li>
                {{-- thành viên --}}
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>Thành viên</span>
                    </a>
                </li>
                {{-- nhân viên --}}
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Nhân viên</span>
                    </a>
                </li>

                {{-- mail --}}
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-envelope"></i>
                        <span>Mail </span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('email')}}">Hộp thư đến</a></li>

                        <li><a href="{{route('email_compose')}}"> Soạn mail</a></li>
                    </ul>
                </li>
                {{-- thống kê --}}
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>Thống Kê</span>
                    </a>
                    <ul class="sub">
                        <li><a href="">Khu vực bán chạy</a></li>
                        <li><a href="">Giao dịch</a></li>
                        <li><a href="">Doanh Thu</a></li>
                        <li><a href="">Lợi nhuận</a></li>
                        <li><a href="">Thành viên</a></li>
                        <li><a href="">Nhân viên</a></li>
                    </ul>
                </li>
                {{-- giao diện --}}
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-italic"></i>
                        <span>Giao Diện</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('banner')}}">Cập Nhật Ảnh Bìa</a></li>
                        <li><a href="">Cập Nhật Trang Giới Thiệu</a></li>
                        <li><a href="">Cập Nhật Logo</a></li>
                        <li><a href="">Cập Nhật Slogan</a></li>
                    </ul>
                </li>
                {{-- hệ thống --}}
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-cogs"></i>
                        <span>Hệ thống</span>
                    </a>
                    <ul class="sub">
                        <li><a href="#">Mức phí</a></li>
                        <li><a href="#">Hạng khách hàng</a></li>
                        <li><a href="#">Loại bất động sản</a></li>
                        <li><a href="#">Backup dữ liệu</a></li>
                        <li><a href="#">Đóng trang web</a></li>
                        <li><a href="#">Mở trang web</a></li>
                    </ul>
                </li>
                {{-- đã xóa --}}
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-trash-o"></i>
                        <span>Đã xóa</span>
                    </a>
                    <ul class="sub">
                        <li><a href="">Bất động sản</a></li>
                        <li><a href="">Bình luận</a></li>
                        <li><a href="">Thành viên</a></li>
                        <li><a href="">Nhân viên</a></li>
                        <li><a href="">Bài viết</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->