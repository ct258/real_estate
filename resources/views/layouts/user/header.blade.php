<!-- Page top section -->
{{-- <section class="page-top-section set-bg" data-setbg="{{asset('leramiz/img/page-top-bg.jpg')}}">

</section> --}}
<!--  Page top end -->

<div class="container-fuild bg_top1">
    <div class="container header">
        <div class="row row_1">
            <div class="col-lg-6">
                <div class="nav">
                    <a href="{{route('index')}}" class="logo"><img src="{{asset('leramiz/img/logo_header.png')}}"
                            alt=""></a>


                    <div class="dropdown">
                        <p class="dropbtn">Nhà đất bán</p>
                        <div class="dropdown-content">
                            <a href="#">Bán căn hộ chung cư</a>
                            <a href="#">Bán nhà riêng</a>
                            <a href="#">Bán nhà biệt thự, liền kề</a>
                            <a href="#">Bán nhà mặt phố</a>
                            <a href="#">Bán đất nền dự án</a>
                            <a href="#">Bán đất</a>
                            <a href="#">Bán trang trại, khu
                                nghỉ dưỡng</a>
                            <a href="#">Bán kho, nhà xưởng</a>
                            <a href="#">Bán loại bất động sản
                                khác</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <p class="dropbtn">Nhà đất cho thuê</p>
                        <div class="dropdown-content">
                            <a c href="#">Cho thuê căn hộ chung cư</a>
                            <a c href="#">Cho thuê nhà riêng</a>
                            <a c href="#">Cho thuê nhà trọ, phòng trọ</a>
                            <a c href="#">Cho thuê văn phòng</a>
                            <a c href="#">Cho thuê cửa hàng - ki ốt</a>
                            <a c href="#">Cho thuê kho, nhà xưởng, đất</a>
                            <a c href="#">Cho thuê loại bất động sản khác</a>
                        </div>
                    </div>

                    <a href="" class="news">Tin tức</a>
                </div>
            </div>
            <div class="col-lg-6 text-lg-right header-top-right">
                <div class="user-panel">
                    <div class="curency">
                        <div class="dropdown">
                            <p class="dropdown-toggle" data-toggle="dropdown">
                                @switch(\Session::get('currency'))
                                @case('VND')
                                đ VND
                                @break
                                @case('USD')
                                $ USD
                                @break
                                @case('EUR')
                                € EUR
                                @break
                                @case('GBP')
                                £ GBP
                                @break
                                @case('JPY')
                                ¥ JPY
                                @break
                                @default
                                đ VND
                                @endswitch
                            </p>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('currency',['VND']) }}" title="VND">đ VND</a></li>
                                <li><a href="{{route('currency',['USD']) }}" title="USD">$ USD</a></li>
                                <li><a href="{{route('currency',['EUR']) }}" title="EUR">€ EUR</a></li>
                                <li><a href="{{route('currency',['GBP']) }}" title="GBP">£ GBP</a></li>
                                <li><a href="{{route('currency',['JPY']) }}" title="JPY">¥ JPY</a></li>
                            </ul>
                        </div>
                    </div>
                    <a href="{{route('lang',['vi']) }}">Vi</a>
                    <a href="{{route('lang',['en']) }}">En</a>
                    <a href="{{route('register')}}"><i class="far fa-user-circle"></i> Đăng ký</a>
                    <a href="{{route('login')}}"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
                    <a href="{{route('cart') }}"><i class="fa fa-shopping-cart"></i> @lang('Cart')</a>


                </div>

            </div>
        </div>

    </div>
</div>