<!-- Header section -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 header-top-left">
                    <div class="top-info">
                        <i class="fa fa-phone"></i>
                        (+84) 123 456 789
                    </div>
                    <div class="top-info">
                        <i class="fa fa-envelope"></i>
                        realestate@gmail.com
                    </div>
                </div>
                <div class="col-lg-8 text-lg-right header-top-right">
                    <div class="top-social">
                        {{-- <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-twitter"></i></a>
                        <a href=""><i class="fa fa-instagram"></i></a>
                        <a href=""><i class="fa fa-pinterest"></i></a>
                        <a href=""><i class="fa fa-linkedin"></i></a> --}}
                    </div>
                    <div class="user-panel">
                        <div class="curency">
                            <div class="dropdown">
                                <p class="dropdown-toggle" data-toggle="dropdown">
                                    VND
                                </p>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('currency',['USD']) }}">USD</a></li>
                                    <li><a href="{{route('currency',['USD']) }}">USD</a></li>
                                    <li><a href="{{route('currency',['VND']) }}">VND</a></li>
                                    <li><a href="{{route('currency',['EUR']) }}">EUR</a></li>
                                    <li><a href="{{route('currency',['JPY']) }}">JPY</a></li>
                                    <li><a href="{{route('currency',['GBP']) }}">GBP</a></li>
                                </ul>
                            </div>
                        </div>
                        <a href="{{route('lang',['vi']) }}">Vi</a>
                        <a href="{{route('lang',['en']) }}">En</a>
                        <a href="{{route('account',\Auth::guard('account')->user()->account_id) }}"><i
                                class="fas fa-user-circle"></i></i>@lang('Account')</a>
                        <a href="{{route('cart') }}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a>
                        <a href="{{route('logout') }}"><i class="fas fa-sign-out-alt"></i>Logout</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="site-navbar">
                    <a href="{{route('index')}}" class="site-logo"><img src="{{asset('leramiz/img/logo.png')}}"
                            alt=""></a>
                    <div class="nav-switch">
                        <i class="fa fa-bars"></i>
                    </div>
                    <ul class="main-menu">
                        <li><a href="categories.html">FEATURED LISTING</a></li>
                        <li><a href="about.html">ABOUT US</a></li>
                        <li><a href="single-list.html">Pages</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header section end -->