@extends('layouts.user')
@push('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin="" />
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
    integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
    crossorigin=""></script>

<style>
    path {
        color: white;
    }

    #form01 {
        padding: 1px 10px;
        margin-right: 25px;
    }

    div#form02 {
        border: 1px solid darkslategrey;
        padding: 2px;
        padding-bottom: 10px;
        padding-left: 45px;
        padding-right: 5px;
    }

    .buy {
        border: none;
        white-space: nowrap;
        cursor: pointer;
        vertical-align: top;
        line-height: 40px;
        letter-spacing: .5px;
        display: inline-block;
        font-size: 22px;
        font-weight: 600;
        text-align: center;
        padding: 9px;
        background: #30caa0;
        color: #fff;
        min-width: 200px;
        border-radius: 3px;
        margin-bottom: 70px;
    }

    a#subscription {
        color: white;
    }

    .single-list-content {
        padding: 40px 30px;
    }

    #phananh {
        color: #69bcff;
        /* color: ; */
    }

    .phananh {
        color: 69bcff;
        cursor: pointer;
    }

    /* rating  */

    .product-customer-col-1>h4 {
        font-size: 25px;
        text-align: center;
        font-weight: bold;
        padding-top: 14px;
    }

    .product-customer-col-1 {
        width: 100%;
        /* border: 1px solid red; */
    }

    .row.customer_rating {
        /* border: 1px solid #13110f; */
        font-family: 'Source Sans Pro', sans-serif;
        margin-top: 0;
        background: #e4e4e459;
    }

    .product-customer-col-1 p.total-review-point {
        font-size: 48px;
        text-align: center;
        color: red;
        font-weight: 600;
    }

    svg.svg-inline--fa.fa-star.fa-w-18 {
        /* color: red; */
        font-size: 18px;
    }


    .start {
        margin-left: 30px;
    }

    .start p {
        overflow: hidden;
        font-size: 16px;
        margin: 5px 15px;
    }

    /* Three column layout */
    .product-customer-col-2 {
        width: 100%;
        height: 81%;
        /* border: 1px solid black; */
        margin-top: 19px;
    }

    .side {
        float: left;
        width: 15%;
        margin-top: 3px;
    }

    .middle {
        margin-top: 4px;
        float: left;
        width: 70%;
    }

    /* Place text to the right */
    .right {
        text-align: right;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* The bar container */
    .bar-container {
        width: 100%;
        background-color: #bfbfbf;
        text-align: center;
        color: white;
        border-radius: 11px;
        height: 11px;
    }

    /* Individual bars */
    .bar-5 {
        width: 60%;
        height: 10px;
        background-color: #30caa0;
        border-radius: 5px;
    }

    .bar-4 {
        width: 30%;
        height: 10px;
        background-color: #2196F3;
        border-radius: 5px;
    }

    .bar-3 {
        width: 10%;
        height: 10px;
        background-color: #00bcd4;
        border-radius: 5px;
    }

    .bar-2 {
        width: 4%;
        height: 10px;
        background-color: #ff9800;
        border-radius: 5px;
    }

    .bar-1 {
        width: 15%;
        height: 10px;
        background-color: #f44336;
        border-radius: 5px;
    }

    .product-customer-col-2 .left {
        font-size: 16px;
        /* border: 1px solid black; */
        /* width: 21px; */
        margin-top: -8px;
        /* text-transform: uppercase; */
        color: #020202;
        font-family: 'Source Sans Pro', sans-serif;
    }

    .product-customer-col-2 .right {
        font-size: 18px;
        margin-top: 2px;
        font-weight: bold;
        font-family: 'Source Sans Pro', sans-serif;
    }

    .share_comment {
        width: 98%;
        height: 70%;
        /* border: 1px solid black; */
        margin: auto;
        margin-top: 44px;

    }

    .share_comment h3 {
        font-size: 20px;
        font-family: 'Source Sans Pro', sans-serif;
        text-align: center;
        margin-top: 5px;
    }

    .share_comment button.btn.btn-default {
        background: #f9f955;
        /* margin: auto; */
        /* width: 72%; */
        margin-left: -6px;
        /* margin-top: 11px; */
    }

    .row.customer_rating path {
        color: #ffc120;
    }

    .row.customer_rating button.btn.btn-default {
        background-color: #ffc120 !important;
    }

    .row.customer_rating .bar-5,
    .bar-4,
    .bar-3,
    .bar-2,
    .bar-1 {
        background-color: #ffc120;
    }

    .star-fake {
        font-size: 0;
        line-height: 1;
        position: relative;
        white-space: nowrap;
        display: inline-block;
        margin: 0 auto;
    }

    .star-fake svg {
        color: #b8b8b8;
    }

    .star-real {
        display: block;
        position: absolute;
        left: 0px;
        bottom: 0px;
        z-index: 1;
        overflow: hidden;
        line-height: 1;
    }

    path {
        color: #30caa8;
    }

    #issMap {
        height: 500px;
    }

    .page-section {
        margin-top: 100px;
    }

    .scrollupp path {
        color: white;
    }



    .filter-form input {
        width: 100% !important;
    }

    .filter-form select {
        width: 100% !important;
    }

    .search-form td {
        padding: 5px 0;
    }

    .filter-form .fs-submit {
        width: 100%;
    }

    #paginationa {
        display: contents;
    }

    #search-form {
        width: 100%;
    }

    .left {
        margin: 10px 0;
    }

    button.btn.btn-primary.mn {
        width: 86px;
        height: 30px;
        padding: 1px;
        font-size: 14px;
        margin-left: 75px;
    }

    button.btn.btn-primary.mn:hover {
        color: aquamarine;
    }

    #rating {
        border: none;
        float: left;
    }

    #rating>input {
        display: none;
    }

    #rating>label:before {
        margin: 5px;
        font-size: 1.25em;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005";
    }

    #rating>.half:before {
        content: "\f089";
        position: absolute;
    }

    #rating>label {
        color: #ddd;
        float: right;
    }

    #rating>input:checked~label,
    #rating:not(:checked)>label:hover,
    #rating:not(:checked)>label:hover~label {
        color: #FFD700;
    }

    #rating>input:checked+label:hover,
    #rating>input:checked~label:hover,
    #rating>label:hover~input:checked~label,
    #rating>input:checked~label:hover~label {
        color: #FFED85;
    }

    a#delete:hover {
        background: red;
    }

    a#delete {
        display: inline-block;
        font-size: 12px;
        text-transform: uppercase;
        border: 1px solid #ebebeb;
        color: #111111;
        padding: 5px 25px;
        border-radius: 2px;
        margin-right: 5px;
        margin-top: 15px;
        text-decoration: none;
    }

    #report:hover {
        background: #FFD700;
    }
</style>
@endpush
@section('page')
@if($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    <p>{{$message}}</p>
    <p class="mb-0"></p>
</div>
@endif
@if (count($errors) > 0)
<div class="alert alert-danger">
    Upload Validation Error
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- Page -->
<section class="page-section single_list">
    <div class="container">
        <div class="row single_list">
            @include('pages.user.single_list.buy')
            <!-- sidebar -->
            <div class="col-lg-4 col-md-7 sidebar">

                @include('pages.user.page.search')
            </div>
            @include('pages.user.single_list.comment')
        </div>
    </div>
</section>
<!-- Page end -->



@endsection
@push('script')

<script>
    $(document).ready(function () {
        $('#wishlist_cookie').click(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
            var real_estate_id = $('#wishlist_cookie').attr("data-real_estate_id");
            var cookie_name = $('#wishlist_cookie').attr("data-cookie_name");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                }
                });
            $.ajax({
                url:"{{ route('wishlist.cookie') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                type: "POST", // phương thức gửi dữ liệu.
                // dataType: "JSON",
                data:{real_estate_id:real_estate_id,cookie_name:cookie_name},
                success:function(data){ //dữ liệu nhận về
                    $('#heart').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
                }
            });

        });
        $('#wishlist_customer').click(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
            var real_estate_id = $('#wishlist_customer').attr("data-real_estate_id");
            var customer_id = $('#wishlist_customer').attr("data-customer_id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                }
                });
            $.ajax({
                url:"{{ route('wishlist.customer') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                type: "POST", // phương thức gửi dữ liệu.
                // dataType: "JSON",
                data:{real_estate_id:real_estate_id,customer_id:customer_id},
                success:function(data){ //dữ liệu nhận về
                    $('#heart').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
                }
            });

        });

    });

//     $('#exampleModal').on('show.bs.modal', function (event) {
//   var button = $(event.relatedTarget) // Button that triggered the modal
//   var recipient = button.data('whatever') // Extract info from data-* attributes
//   // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
//   // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
//   var modal = $(this)
//   modal.find('.modal-title').text('có tin nhắn')
//   modal.find('.modal-body input').val(recipient)
// })
</script>
<script>
    const longitude = $('#field').data("longitude");
    const latitude = $('#field').data("latitude");
    var mymap = L.map('issMap').setView([longitude,latitude], 13);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    // attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoibmdoaWEyMzExIiwiYSI6ImNrN3B0aGpnNjBuaGYzbW1pcnphOHY0ZW4ifQ.DJKI6Ck_xfaja3RDUPmCfQ'
}).addTo(mymap);
//cty
    // var marker = L.marker([10.0310059,105.7513944]).addTo(mymap);
    //vòng tròn
    var circle = L.circle([10.0310059,105.7513944], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 500
    }).addTo(mymap);
    var myIcon = L.icon({
        iconUrl: '../leramiz/img/favicon.jpg',
        iconSize: [30, 30],
        // iconAnchor: [22, 94],
        // popupAnchor: [-3, -76],
        // shadowUrl: '../leramiz/img/favicon.jpg',
        // shadowSize: [30, 30],
        // shadowAnchor: [22, 94]
    });
    L.marker([10.0310059,105.7513944], {icon: myIcon}).addTo(mymap);
    var popup = L.popup()
        .setLatLng([10.0310059,105.7513944])
        .setContent("BatdongsanCanTho!")
        .openOn(mymap);
//end cty

//sp
var marker = L.marker([longitude,latitude]).addTo(mymap);

    //vòng tròn
    var circle = L.circle([longitude,latitude], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 500
    }).addTo(mymap);

    var popup = L.popup()
        .setLatLng([longitude,latitude])
        .setContent("Here!")
        .openOn(mymap);
//end sp
</script>
<script>
    $(document).ready(function () {
    $(".showForm").on("click", function () {
        $(this).next().toggle();
    });

});
</script>
@endpush
