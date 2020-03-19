<!-- Footer section -->
<footer class="footer-section set-bg" data-setbg="{{asset('leramiz/img/footer-bg.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 footer-widget">
                <img src="{{asset('leramiz/img/logo.png')}}" alt="">
                <p>@lang('footer1')</p>
                <p>@lang('footer2')</p>
                <div class="social">
                    {{-- <i href="#"><i class="fa fa-facebook"></i></i>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a> --}}
                </div>
            </div>
            <div class="col-lg-3 col-md-6 footer-widget">
                <div class="contact-widget">
                    <h5 class="fw-title">@lang('CONTACT US')</h5>
                    <p><i class="fa fa-map-marker"></i>Khu II, đường 3/2, P. Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ.</p>
                    <p><i class="fa fa-phone"></i>(+12) 345 678 9999</p>
                    <p><i class="fa fa-envelope"></i>realestatect258@gmail.com</p>
                    <p><i class="fas fa-clock"></i>Mon - Sat, 08 AM - 06 PM</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 footer-widget">
                <div class="double-menu-widget">
                    <h5 class="fw-title">@lang('POPULAR PLACES')</h5>
                    <ul>
                        <li><a href="">Cần Thơ</a></li>
                        <li><a href="">Hậu Giang</a></li>
                        <li><a href="">Tiền Giang</a></li>
                        <li><a href="">Long An</a></li>
                        <li><a href="">Sóc Trăng</a></li>
                    </ul>
                    <ul>
                        <li><a href="">Hà Nội</a></li>
                        <li><a href="">Đà Nặng</a></li>
                        <li><a href="">Nha Trang</a></li>
                        <li><a href="">Đà Lạt</a></li>
                        <li><a href="">Hồ Chí Minh</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6  footer-widget">
                <div class="newslatter-widget">
                    <h5 class="fw-title">@lang('NEWSLETTER')</h5>
                    <p>@lang('Subscribe your email to get the latest news and new offer also discount')</p>
                    <form class="footer-newslatter-form">
                        <input type="text" placeholder="@lang('Email address')">
                        <button><i class="fas fa-paper-plane" style="color:white"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-nav">
                <table style="color:white;">
                    <tr>
                        <td>@lang('Online') </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;: {{ $query_result_person[0]}}</td>
                    </tr>
                    <tr>
                        <td>@lang('Visits today') </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;: {{ $query_result_person[1]}}</td>
                    </tr>
                    <tr>
                        <td>@lang('Access times') </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;: {{ $query_result_person[2]}}</td>
                    </tr>
                </table>
            </div>
            <div class="copyright">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="far fa-heart"></i> by <a
                        href="https://colorlib.com" target="_blank">Colorlib</a>

                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer section end -->
<div class="scrollupp">
    <i id='scrollupp' class="fa fa-angle-up"></i>
</div>