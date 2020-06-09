<style>
    .sub {
        background-color: #776464;
    }
</style>
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                {{-- nhân viên --}}
                @if( \Auth::guard('account')->user()->hasRole('Staff'))
                {{-- Bất động sản --}}
                <li>

                    <a href="{{route('real_estate.index')}}">
                        <i class='fa fa-shopping-cart'></i>
                        <span>Đơn đặt cọc</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('bill.deposit')}}">Chờ duyệt</a></li>
                        <li><a href="">Đã duyệt</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('real_estate.index')}}">
                        <i class="fa fa-home"></i>
                        <span>Bất động sản</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('real_estate.index')}}">Đang bán</a></li>
                        <li><a href="{{route('bill.deposit')}}">Đang đặt cọc</a></li>
                        <li><a href="{{route('real_estate.done')}}">Đã bán</a></li>
                    </ul>
                </li>
                {{-- bình luận --}}
                {{-- <li>
                    <a href="">
                        <i class="fa fa-comment"></i>
                        <span>Bình luận</span>
                    </a>
                </li> --}}
                {{-- cuộc hẹn --}}
                <li>
                    <a href="{{ route('appointment.admin.index') }}">
                        <i class="fa fa-calendar"></i>
                        <span>Lịch hẹn</span>
                    </a>
                </li>
                {{-- Tiền đặc cọc --}}
                <li>
                    <a href="{{ route('deposit.index') }}">
                        <i class="fa fa-calendar"></i>
                        <span>Cập nhật tiền cọc</span>
                    </a>
                </li>
                {{-- bài viết --}}
                <li class="sub-menu">
                    <a href="{{route('blog.index')}}">
                        <i class="fa fa-pencil"></i>
                        <span>Bài viết</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('blog.index')}}">Danh sách bài viết</a></li>

                        <li><a href="{{route('blog.create')}}"> Thêm bài viết</a></li>
                        <li><a href=""> Sửa bài viết</a></li>
                    </ul>
                </li>
                {{-- báo cáo --}}
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-exclamation"></i>
                        <span>Báo cáo</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('report.index')}}">Chờ xử lý</a></li>
                        <li><a href="{{route('report.fix.index')}}">Đã xử lý</a></li>
                    </ul>
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
                {{-- hợp đồng --}}
                {{-- <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-file-text-o"></i>
                        <span>Hợp đồng </span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('email')}}">Hợp đồng Đặt cọc</a></li>

                <li><a href="{{route('email_compose')}}">Hợp đồng Thanh toán</a></li>
            </ul>
            </li> --}}
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
            @endif

            {{-- admin --}}
            @if( \Auth::guard('account')->user()->hasRole('Admin'))
            {{-- khuyến mãi --}}
            {{-- <li>
                    <a href="#">
                        <i class="fa fa-gift" aria-hidden="true"></i>
                        <span>Khuyến mãi </span>
                    </a>
                    <ul class="sub">
                        <li>
                            <a href="{{ route('promotion.index') }}">Loại khuyến mãi</a>
            </li>
            <li><a href="{{ route('promotioncode.index') }}">Danh sách khuyến mãi</a></li>
            </ul>
            </li> --}}
            <?php if(\Auth::guard('account')->check()):?>
            @if(\Auth::guard('account')->user()->hasRole('Admin'))
            {{-- thành viên --}}
            <li class="sub-menu">
                <a href="{{route('customer.index')}}">
                    <i class="fa fa-user"></i>
                    <span>Thành viên</span>
                </a>
            </li>
            {{-- Loại khách hàng--}}
            <li class="sub-menu">
                <a href="{{route('rank.index')}}">
                    <i class="fa fa-diamond" aria-hidden="true"></i>
                    <span>Loại thành viên</span>
                </a>
            </li>

            {{-- nhân viên --}}
            <li class="sub-menu">
                <a href="{{route('staff.index')}}">
                    <i class="fa fa-users"></i>
                    <span>Nhân viên</span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('staff.index')}}">Danh sách nhân viên</a></li>
                    <li><a href="{{route('staff.create')}}">Thêm nhân viên</a></li>
                </ul>
            </li>
            {{-- thống kê --}}
            <li class="sub-menu">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Thống Kê</span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('statistic.cart')}}">Khu vực bán chạy</a></li>
                    <li><a href="{{route('statistic.transaction')}}">Giao dịch</a></li>
                    {{--   <li><a href="">Doanh Thu</a></li> --}}
                    <li><a href="{{route('statistic.profit')}}">Lợi nhuận</a></li>
                    <li><a href="{{route('statistic.customer')}}">Thành viên</a></li>
                    {{-- <li><a href="">Nhân viên</a></li>--}}
                    <li><a href="{{route('statistic.real_estate.index')}}">Nhà đất</a></li>
                </ul>
            </li>
            {{-- cập nhật tỉ giá --}}
            <li>
                <a href="{{ route('currency.index') }}">
                    <i class="fa fa-dollar"></i>
                    <span>Cập nhật tỉ giá</span>
                </a>
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
                    <li><a href="{{route('logo')}}">Cập Nhật Logo</a></li>
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
            @endif
            <?php endif;?>
            {{-- đã xóa --}}
            {{-- <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-trash-o"></i>
                        <span>Đã xóa</span>
                    </a>
                    <ul class="sub">
                        <li><a href="">Thành viên</a></li>
                        <li><a href="">Nhân viên</a></li>
                    </ul>
                </li> --}}
            @endif
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->