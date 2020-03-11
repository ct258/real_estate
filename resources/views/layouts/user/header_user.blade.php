<!-- Header section -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 header-top-left">
                    <div class="top-info">
                        <i class="fa fa-phone"></i>
                        (+84) 123 456 7890
                    </div>
                    <div class="top-info">
                        <i class="fa fa-envelope"></i>
                        batdongsancantho@gmail.com
                    </div>
                </div>
                <div class="col-lg-6 text-lg-right header-top-right">
                    <div class="top-social">
                        {{-- <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-pinterest"></i></a>
                        <a href=""><i class="fab fa-linkedin"></i></a> --}}
                    </div>
                    <div class="user-panel">
                        <a href="{{route('currency',['USD']) }}">USD</a>
                        <a href="{{route('currency',['VND']) }}">VND</a>
                        <a href="{{route('currency',['EUR']) }}">EUR</a>
                        <a href="{{route('currency',['JPY']) }}">JPY</a>
                        <a href="{{route('currency',['GBP']) }}">GBP</a>
                        <a href="{{route('lang',['vi']) }}">Vi</a>
                        <a href="{{ route('lang',['en']) }}">En</a>
                        <a class="dropdown-toggle profile-pic" href="">
                            <i class="far fa-user-circle"></i>
                            @lang('Account')</a>

                        <a href="{{route('cart') }}"><i class="fa fa-shopping-cart"></i> @lang('Cart')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="site-navbar">
                    <a href="#" class="site-logo"><img src="{{asset('leramiz/img/logo.png')}}" alt=""></a>
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