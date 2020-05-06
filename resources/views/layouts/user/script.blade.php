<!--====== Javascripts & Jquery ======-->
{{-- <script src="{{asset('leramiz/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('leramiz/js/jquery-3.2.1.js')}}"></script>
<script src="{{asset('leramiz/js/bootstrap.min.js')}}"></script> --}}
<script src="{{asset('leramiz/js/jquery-3.2.1.js')}}"></script>
<script src="{{asset('leramiz/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('leramiz/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('leramiz/js/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('leramiz/js/magnific-popup.min.js')}}"></script>
<script src="{{asset('leramiz/js/wow.js')}}"></script>
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
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/5e9d12c169e9320caac555c6/default';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
</script>
<script>
    new WOW().init();
    </script>
<script>
    
    $(document).ready(function () {
      //lấy loại bất động sản
      $("#form").change(function(){
          var form_id = $(this).val();
          $.get("../type/"+form_id, function(data){
              $("#type").html(data);
          });
      });
       //lấy đơn vị
       $("#form").change(function(){
          var form_id = $(this).val();
          $.get("../unit/"+form_id, function(data){
              $("#unit").html(data);
          });
      });
      //lấy quận huyện theo tỉnh thành phố
      $("#province").change(function(){
          var province_id = $(this).val();
          $.get("../district/"+province_id, function(data){
              $("#district").html(data);
          });
      });
      //lấy đường phố theo tỉnh
      $("#province").change(function(){
          var province_id = $(this).val();
          $.get("../street/"+province_id, function(data){
              $("#street").html(data);
          });
      });
      //lấy phường xã theo tỉnh,huyện
      $("#district").change(function(){
          var district_id = "";
          var district_id = $("#district").val();
          $.get("../ward/"+district_id, function(data){
              $("#ward").html(data);
          });
      });
      //lấy đường phố theo tỉnh,huyện
      $("#district").change(function(){
          var district_id = $("#district").val();
          $.get("../street/"+district_id, function(data){
              $("#street").html(data);
          });
      });
      $(window).scroll(function(event){
        var vitri = $('body').scrollTop();
        var muc = $('.row').offset().top;
        // console.log(muc);
        if( vitri >= 650){
            $('.container-fuild.bg_top1, .nav, .col-lg-6.text-lg-right.header-top-right,.path').addClass('xanh');
        }
        else{
            $('.container-fuild.bg_top1, .nav, .col-lg-6.text-lg-right.header-top-right,.path').removeClass('xanh');
        }
      });

  });

  //reset tất cả về ban đầu khi thay đổi tỉnh
  $("#province").change(function(){
      var province_id = $("#province").val();
      if(province_id=='province_id'){
          var data1="<option value='0'>-- Chọn Quận/Huyện --</option>";
          var data2="<option value='0'>-- Chọn Phường/Xã --</option>";
          var data3="<option value='0'>-- Chọn Đường/Phố --</option>";
          $("#district").html(data1);
          $("#ward").html(data2);
          $("#street").html(data3);
      }
  });

  //reset tất cả về ban đầu khi thay đổi tỉnh
  $("#district").change(function(){
      var ward_id = $("#ward").val();
      var province_id = $("#province").val();
          
      if(ward_id=='ward_id' && province_id!='province_id'){
          var data2="<option value='0'>-- Chọn Phường/Xã --</option>";
          $("#ward").html(data2);
          $.get("../street/"+province_id, function(data){
              $("#street").html(data);
          });
      }
      else{
          var data2="<option value='0'>-- Chọn Phường/Xã --</option>";
          var data3="<option value='0'>-- Chọn Đường/Phố --</option>";
          $("#ward").html(data2);
          $("#street").html(data3);
      }
  });

</script>
@yield('script')