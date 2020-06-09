@extends('layouts.user')
@push('css')
<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .page-section {
        margin-top: 100px;
    }

    img {

        max-width: 200px;
        max-height: 200px;
    }

    .check {
        display: inline-block;
        line-height: 1;
        vertical-align: middle;
        margin: 0 .14285714em;
        background-color: #e8e8e8;
        background-image: none;
        padding: 0px 9px;
        color: rgba(0, 0, 0, .6);
        text-transform: none;
        font-weight: 700;
        border: 0 solid transparent;
        border-radius: 5px;
        transition: background .1s ease;
    }

    .check input[type=checkbox] {
        vertical-align: middle;
    }

    .check label {
        vertical-align: middle;
        margin-top: auto;
        margin-bottom: auto;
    }

    body {
        padding: 0;
        margin: 0;
    }

    #map {
        height: 500px;
        /* width: 100vw; */
    }
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin="" />
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
    integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
    crossorigin=""></script>
@endpush
@section('page')
@if($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    <p>{{$message}}</p>
    <p class="mb-0"></p>
</div>
@endif
@if($error = Session::get('error'))
<div class="alert alert-danger" role="alert">
    <p>{{$error}}</p>
    <p class="mb-0"></p>
</div>
@endif
<!-- Page -->
<section class="page-section list">
    <div class="container">
        <div class="section-title text-center">
            <h3>Bất động sản mới</h3>
        </div>
        <form action="{{route('post.create.submit')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row frame">
                <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
                <div class="col-lg-9">
                    <section class="widget">
                        <div class="container-fluid">
                            <table class="">
                                <tr>
                                    <td>
                                        <div class="col-sm-10">
                                            <img id="image" alt="Chọn hình đại diện" /><br>
                                            <input type="file" name="avatar" id="avatar"
                                                onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                                required>
                                            <br>
                                            <input type="file" name="photos[]" id="photos[]" multiple onchange=show()
                                                required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="https://lipis.github.io/flag-icon-css/flags/4x3/vn.svg"
                                            style="width:2%;" ;>
                                        <label>Tên Bất động sản</label>
                                        <input type="text" name="name_vi" size="100%" autofocus
                                            class="form-control input-transparent" required><br></td>
                                </tr>

                                <tr>
                                    <td>
                                        <img src="https://lipis.github.io/flag-icon-css/flags/4x3/vn.svg"
                                            style="width:2%;" ;>
                                        <label>Địa chỉ</label>
                                        <input type="text" name="address_vi" class="form-control input-transparent"
                                            required><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <img src="https://lipis.github.io/flag-icon-css/flags/4x3/vn.svg"
                                            style="width:2%;" ;>
                                        <label>Mô tả</label>
                                        <textarea name="description_vi" cols="30" id="editor1"
                                            style="max-width:100%;height: 235px;" class="form-control input-transparent"
                                            required></textarea>
                                    </td>
                                </tr>
                                <br><br>
                                <tr>
                                    <td>
                                        <img src="https://lipis.github.io/flag-icon-css/flags/4x3/gb.svg"
                                            style="width:2%;" ;>
                                        <label>Tên Bất động sản</label>
                                        <input type="text" name="name_en" size="100%" autofocus
                                            class="form-control input-transparent" required><br></td>
                                </tr>

                                <tr>
                                    <td>
                                        <img src="https://lipis.github.io/flag-icon-css/flags/4x3/gb.svg"
                                            style="width:2%;" ;>
                                        <label>Địa chỉ</label>
                                        <input type="text" name="address_en" class="form-control input-transparent"
                                            required><br>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <img src="https://lipis.github.io/flag-icon-css/flags/4x3/gb.svg"
                                            style="width:2%;" ;>
                                        <label>Mô tả</label>
                                        <textarea name="description_en" cols="30" id="editor2"
                                            style="max-width:100%;height: 235px;" class="form-control input-transparent"
                                            required></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <!-- Default switch -->
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" checked class="custom-control-input"
                                                id="customSwitches">
                                            <label class="custom-control-label" for="customSwitches">Bản đồ</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <div id="bando" style="display:inline;">
                                            <input type="hidden" name="bando" value='true' class="bando">
                                            <label for="value">Tọa độ</label>
                                            <input id="value" name='LatLng' value="" class="form-control">
                                            <div id="map"></div>
                                        </div>
                                    </td>

                                </tr>
                            </table>
                            <div id="house">
                                <input type="hidden" name="house" value='true' class="house">
                                <hr>
                                <h4>Dành cho nhà</h4>

                                {{-- Nhà --}}

                                <table>
                                    <tr>
                                        <td><label>Mặt tiền</label>
                                            <input type="number" name="convenience_facade" min="0" step="any"
                                                placeholder="mét" class="form-control input-transparent"><br></td>
                                        <td><label>Lối vào</label>
                                            <input type="number" name="convenience_way" min="0" step="any"
                                                placeholder="mét" class="form-control input-transparent"><br></td>
                                        <td><label>Số tầng</label>
                                            <input type="number" name="convenience_floor" min="0" step="any"
                                                class="form-control input-transparent"><br></td>
                                    </tr>
                                    <tr>
                                        <td><label>Số phòng ngủ</label>
                                            <input type="number" name="convenience_bedroom" min="0" step="any"
                                                class="form-control input-transparent"><br></td>
                                        <td><label>Số phòng tắm</label>
                                            <input type="number" name="convenience_bathroom" min="0" step="any"
                                                vclass="form-control input-transparent"><br></td>
                                        <td>
                                            <label>Phương hướng</label>
                                            <select name="direction" id="direction"
                                                class="form-control form-control-md">
                                                <option value="E" selected>@lang('E')</option>
                                                <option value="W">@lang('W')</option>
                                                <option value="S">@lang('S')</option>
                                                <option value="N">@lang('N')</option>
                                                <option value="NE">@lang('SE')</option>
                                                <option value="SE">@lang('NE')</option>
                                                <option value="SW">@lang('SW')</option>
                                                <option value="NW">@lang('NW')</option>
                                            </select><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <label>Facilities</label><br>
                                            <div class="check">

                                                <input type="hidden" name="Air_conditioning" value=0>
                                                <input type="checkbox" name="Air_conditioning" value=1>
                                                <label for="a">@lang('Air Conditioning')</label>
                                            </div>
                                            <div class="check">
                                                <input type="hidden" name="BBQ_area" value=0>
                                                <input type="checkbox" name="BBQ_area" value=1>
                                                <label for=""> @lang('BBQ Area')</label>
                                            </div>
                                            <div class="check">
                                                <input type="hidden" name="CCTV" value=0>
                                                <input type="checkbox" name="CCTV" value=1>
                                                <label for=""> @lang('CCTV')</label>
                                            </div>
                                            <div class="check">
                                                <input type="hidden" name="Concierge" value=0>
                                                <input type="checkbox" name="Concierge" value=1>

                                                <label for="">@lang('Concierge')</label>
                                            </div>
                                            <div class="check">
                                                <input type="hidden" name="Fitness" value=0>
                                                <input type="checkbox" name="Fitness" value=1>
                                                <label for="">@lang('Fitness')</label>
                                            </div>
                                            <div class="check">
                                                <input type="hidden" name="Garden" value=0>
                                                <input type="checkbox" name="Garden" value=1>
                                                <label for="">@lang('Garden')</label>
                                            </div>
                                            <div class="check">
                                                <input type="hidden" name="Library" value=0>
                                                <input type="checkbox" name="Library" value=1>
                                                <label for="">@lang('Library')</label>
                                            </div>
                                            <div class="check">
                                                <input type="hidden" name="Mountain_view" value=0>
                                                <input type="checkbox" name="Mountain_view" value=1>
                                                <label for="">@lang('Mountain View')</label>
                                            </div>
                                            <div class="check">
                                                <input type="hidden" name="Packing" value=0>
                                                <input type="checkbox" name="Packing" value=1>
                                                <label for="">@lang('Parking')</label>
                                            </div>
                                            <div class="check">
                                                <input type="hidden" name="Playground" value=0>
                                                <input type="checkbox" name="Playground" value=1>
                                                <label for="">@lang('Playground')</label>
                                            </div>
                                            <div class="check">
                                                <input type="hidden" name="Sea" value=0>
                                                <input type="checkbox" name="Sea" value=1>
                                                <label for="">@lang('Sea/Ocean View')</label>
                                            </div>
                                            <div class="check">
                                                <input type="hidden" name="Security" value=0>
                                                <input type="checkbox" name="Security" value=1>
                                                <label for="">@lang('Security')</label>
                                            </div>
                                            <div class="check">
                                                <input type="hidden" name="Single Storey" value=0>
                                                <input type="checkbox" name="Single Storey" value=1>
                                                <label for="">@lang('Single Storey')</label>
                                            </div>
                                            <div class="check">
                                                <input type="hidden" name="Swimming_pool" value="0">
                                                <input type="checkbox" name="Swimming_pool" value=1>
                                                <label for="">@lang('Swimming Pool')</label>
                                            </div>
                                            <div class="check">
                                                <input type="hidden" name="Tennis" value="0">
                                                <input type="checkbox" name="Tennis" value=1>
                                                <label for="">@lang('Tennis')</label>
                                            </div>
                                            <div class="check">
                                                <input type="hidden" name="wifi" value="0">
                                                <input type="checkbox" name="wifi" value=1>
                                                <label for="">@lang('Wi Fi')</label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-lg-12">
                                <br>
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                                <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                <br>
                            </div>
                            <div class="row">

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-block">Lưu</button>

                                    </div>

                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <button class="btn btn-secondary btn-block"
                                            onclick="window.location.href='{{route('account')}}'">Trở lại</button>
                                    </div>

                                </div>
                                {{-- <a href="{{route('real_estate.index')}}" class="btn btn-default">Trở lại</a> --}}
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-3">
                    <section class="widget">
                        <div class="container-fluid">
                            <table class="">
                                <tr>
                                    <td>
                                        <label>Hình thức</label>
                                        <select name="form" id="form" class="form-control form-control-md" required>
                                            <option value="form_id" selected disabled>-- Chọn --</option>
                                            @foreach ($form as $item)
                                            <option value="{{$item->form_id}}" aria-required="">
                                                {{$item->form_translation_name}}</option>
                                            @endforeach
                                        </select>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Loại bất động sản</label>
                                        <select name="type" id="type" class="form-control form-control-md">
                                            <option value="form_id" selected disabled>-- Chọn --</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Đơn vị</label>
                                        <select name="unit" id="unit" class="form-control form-control-md">
                                            <option value="unit_id" selected disabled>-- Chọn --</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Diện tích</label>
                                        <input type="number" name="acreage" min="0" step="any"
                                            class="form-control input-transparent" required><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Giá đặt cọc</label>
                                        <input type="number" name="deposit" min="0" step="any"
                                            onKeyUp="if(this.value>1000000000){this.value='1000000000';}else if(this.value<0){this.value='0';}"
                                            class="form-control input-transparent"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Giá dự án</label>
                                        <input type="number" name="price" min="0" step="any"
                                            class="form-control input-transparent" required><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Thời gian cung cấp giấy tờ pháp lý sau khi đặt cọc</label>
                                        <input type="number" name="contract" min="0" step="any" placeholder="ngày"
                                            class="form-control input-transparent"><br>
                                    </td>
                                </tr>

                                <tr>

                                    <td>
                                        <label>Địa chỉ</label>
                                        <select name="province" id="province" class="form-control form-control-md">
                                            <option value="" selected disabled>-- Chọn Tỉnh/TP --</option>
                                            @foreach ($province as $item)
                                            <option value="{{$item->province_id}}">{{$item->province_name}}</option>
                                            @endforeach
                                        </select>

                                        <br>

                                        <select name="district" id="district" class="form-control form-control-md">
                                            <option value="" selected disabled>-- Chọn Quận/Huyện --</option>
                                        </select>

                                        <br>

                                        <select name="ward" id="ward" class="form-control form-control-md">
                                            <option value="" selected disabled>-- Chọn Phường/Xã --</option>
                                        </select>

                                        <br>

                                        <select name="street" id="street" class="form-control form-control-md">
                                            <option value="" selected disabled>-- Chọn Đường/Phố --</option>
                                        </select>
                                    </td>
                                </tr>
                                <br>




                            </table>
                        </div>
                    </section>
                </div>

            </div>
        </form>
    </div>
</section>
<!-- Page end -->
@endsection
@section('script')
<script>
    $(document).ready(function () {
        //lấy bản đồ
        $("#customSwitches").click(function(){
            var status = $(this).prop("checked");
            if(status==true){
                document.getElementById("bando").style.display = 'inline';
                $(".bando").val(true);
                // element.style.visibility = 'visible';     // Show
            }else{
                // $("#bando").css("display"," none");
                document.getElementById("bando").style.display = 'none';
                $(".bando").val(false);

            }
        });
        $("#type").change(function(){
            var type = $(this).val();
            if(type==5||type==6||type==9){
                document.getElementById("house").style.display = 'none';
                $('.house').val(false);
            }else{
                document.getElementById("house").style.display = 'inline';
                $('.house').val(true);

            }
        });
    });
</script>
{{-- ???? --}}
<script type="text/javascript">
    $(document).ready(function() {
        $(".btn-submit").click(function(e){
            e.preventDefault();


            var _token = $("input[name='_token']").val();
            var first_name = $("input[name='first_name']").val();
            var last_name = $("input[name='last_name']").val();
            var email = $("input[name='email']").val();
            var address = $("textarea[name='address']").val();


            $.ajax({
                url: "/my-form",
                type:'POST',
                data: {_token:_token, first_name:first_name, last_name:last_name, email:email, address:address},
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        alert(data.success);
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });


        }); 


        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });


</script>
<script>
    CKEDITOR.replace( 'editor1', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

    } );
</script>
<script>
    CKEDITOR.replace( 'editor2', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

    } );
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

    });
    //reset tất cả về ban đầu khi thay đổi tỉnh
    $("#province").change(function(){
        var province_id = $("#province").val();
        if(province_id==''){
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
            
        if(ward_id=='' && province_id!=''){
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
<script>
    document.getElementById("my_captcha_form").addEventListener("submit",function(evt)
  {
  
  var response = grecaptcha.getResponse();
  if(response.length == 0) 
  { 
    //reCaptcha not verified
    alert("please verify you are humann!"); 
    evt.preventDefault();
    return false;
  }
  //captcha verified
  //do the rest of your validations here
  
});
</script>
<script>
    var map = L.map('map').fitWorld();
    // L.map('map').setView(e.latlng, 13).addTo(map);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        // attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoibWluaG5naGlhIiwiYSI6ImNrYXozYTZyYjA0ZmkyeXVlanVyenFwc2cifQ.yvDNyrd0HVnt7i97BFw5Ig'
    }).addTo(map);
    map.locate({setView: true, maxZoom: 16});

    //lấy vị trí cty
    // var marker = L.marker([10.0310059,105.7513944]).addTo(map);
    var myIcon = L.icon({
        iconUrl: '../leramiz/img/favicon.jpg',
        iconSize: [30, 30],
        // iconAnchor: [22, 94],
        // popupAnchor: [-3, -76],
        // shadowUrl: '../leramiz/img/favicon.jpg',
        // shadowSize: [30, 30],
        // shadowAnchor: [22, 94]
    });
    L.marker([10.0310059,105.7513944], {icon: myIcon}).addTo(map);

    //vòng tròn
    var circle = L.circle([10.0310059,105.7513944], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 500
    }).addTo(map);

    var popup = L.popup()
        .setLatLng([10.0310059,105.7513944])
        .setContent("<b>Batdongsancantho</b>")
        .openOn(map);

    //text
    // marker.bindPopup("<b>Batdongsancantho</b>").openPopup();
// alert(121232131);

//gps

    function onLocationFound(e) {
        var radius = e.accuracy;

        L.marker(e.latlng).addTo(map)
            .bindPopup("You are within " + radius + " meters from this point").openPopup();

        L.circle(e.latlng, radius).addTo(map);
        // alert(typeof e.latlng);
        // document.getElementById("value").value = e.latlng.slice(7);
        document.getElementById("value").value =  e.latlng.toString().slice(7,-1);
    }

    map.on('locationfound', onLocationFound);
    function onLocationError(e) {
        alert(e.message);
    }

    map.on('locationerror', onLocationError);

    //click
    function onMapClick(e) {
        // map.clearLayers();
    // clearLayers()
        var circle = L.circle(e.latlng, {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 100
        }).addTo(map);
        var marker = L.marker(e.latlng).addTo(map);
        var popup = L.popup()
            .setLatLng(e.latlng)
            .setContent("Now you chose here.")
            .openOn(map);
        // alert("Now you chose here " + e.latlng);    
        // inherited from LayerGroup
        document.getElementById("value").value =  e.latlng.toString().slice(7,-1);
    }

    map.on('click', onMapClick);

</script>
@endsection