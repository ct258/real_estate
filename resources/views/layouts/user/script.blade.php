<!--====== Javascripts & Jquery ======-->
<script src="{{asset('leramiz/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('leramiz/js/jquery-3.2.1.js')}}"></script>
<script src="{{asset('leramiz/js/bootstrap.min.js')}}"></script>
<script src="{{asset('leramiz/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('leramiz/js/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('leramiz/js/magnific-popup.min.js')}}"></script>
<script src="{{asset('leramiz/js/main.js')}}"></script>
<script src="{{asset('fontawesome/js/all.js')}}"></script>
<script src="{{asset('ckeditor/ckeditor.js') }}"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
  integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
  crossorigin=""></script>
@include('ckfinder::setup')
@stack('script')