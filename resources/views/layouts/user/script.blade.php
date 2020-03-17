<!--====== Javascripts & Jquery ======-->
{{-- <script src="{{asset('leramiz/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('leramiz/js/jquery-3.2.1.js')}}"></script>
<script src="{{asset('leramiz/js/bootstrap.min.js')}}"></script> --}}
<script src="{{asset('leramiz/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('leramiz/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('leramiz/js/masonry.pkgd.min.js')}}"></script>
{{-- <script src="{{asset('leramiz/js/magnific-popup.min.js')}}"></script> --}}
<script src="{{asset('leramiz/js/main.js')}}"></script>
<script src="{{asset('fontawesome/js/all.js')}}"></script>
<script src="{{asset('ckeditor/ckeditor.js') }}"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
  integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
  crossorigin=""></script>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function () {
    console.log("scrollup");

   $('.scrollupp').on('click', function () {
        // console.log("đã vào hàm");
        // $('html,body').animate({scrollTop : $('.chapter2').offset().top}, 1400,"easeOutElastic");
        $('html,body').animate({scrollTop: 0},1400);
   });
});