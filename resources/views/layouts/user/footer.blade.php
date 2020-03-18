<!-- Footer section -->
<footer class="footer-section set-bg" data-setbg="{{asset('leramiz/img/footer-bg.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 footer-widget">
                <img src="{{asset('leramiz/img/logo.png')}}" alt="">
                <p>Batdongsancantho là trang web chuyên kinh doanh bất động sản lớn nhất Cần Thơ.</p>
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
                    <h5 class="fw-title">CONTACT US</h5>
                    <p><i class="fa fa-map-marker"></i>Khu II, đường 3/2, P. Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ.</p>
                    <p><i class="fa fa-phone"></i>(+12) 345 678 9999</p>
                    <p><i class="fa fa-envelope"></i>realestatect258@gmail.com</p>
                    <p><i class="fas fa-clock"></i>Mon - Sat, 08 AM - 06 PM</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 footer-widget">
                <div class="double-menu-widget">
                    <h5 class="fw-title">POPULAR PLACES</h5>
                    <ul>
                        <li><a href="">Florida</a></li>
                        <li><a href="">New York</a></li>
                        <li><a href="">Washington</a></li>
                        <li><a href="">Los Angeles</a></li>
                        <li><a href="">Chicago</a></li>
                    </ul>
                    <ul>
                        <li><a href="">St Louis</a></li>
                        <li><a href="">Jacksonville</a></li>
                        <li><a href="">San Jose</a></li>
                        <li><a href="">San Diego</a></li>
                        <li><a href="">Houston</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6  footer-widget">
                <div class="newslatter-widget">
                    <h5 class="fw-title">NEWSLETTER</h5>
                    <p>Subscribe your email to get the latest news and new offer also discount</p>
                    <form class="footer-newslatter-form">
                        <input type="text" placeholder="Email address">
                        <button><i class="fas fa-paper-plane" style="color:white"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-nav">
                <table style="color:white;">
                    <tr>
                        <td>Đang trực tuyến </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;: {{ $query_result_person[0]}}</td>
                    </tr>
                    <tr>
                        <td>Lượt truy cập hôm nay </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;: {{ $query_result_person[1]}}</td>
                    </tr>
                    <tr>
                        <td>Lượt truy cập </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;: {{ $query_result_person[2]}}</td>
                    </tr>
                </table>
            </div>
            <div class="copyright">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                        aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>

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