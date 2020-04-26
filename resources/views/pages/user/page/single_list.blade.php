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
        margin-top: 10px;
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
        margin-top: -6px;
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

        #rating{border:none;float:left;}
        #rating>input{display:none;}
        #rating>label:before{margin:5px;font-size:1.25em;font-family:FontAwesome;display:inline-block;content:"\f005";}
        #rating>.half:before{content:"\f089";position:absolute;}
        #rating>label{color:#ddd;float:right;}
        #rating>input:checked~label,
        #rating:not(:checked)>label:hover, 
        #rating:not(:checked)>label:hover~label{color:#FFD700;}
        #rating>input:checked+label:hover,
        #rating>input:checked~label:hover,
        #rating>label:hover~input:checked~label,
        #rating>input:checked~label:hover~label{color:#FFED85;}


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
            <div class="col-lg-8 single-list-page frame">
                <div class="single-list-slider owl-carousel" id="sl-slider">
                    <div class="sl-item set-bg" data-setbg="{{asset($image[0]->real_estate_avatar)}}"></div>
                    @foreach ($image as $item)
                    <div class="sl-item set-bg" data-setbg="{{asset($item->image_path)}}"></div>
                    @endforeach
                </div>

                <div class="owl-carousel sl-thumb-slider" id="sl-slider-thumb">
                    <div class="sl-thumb set-bg" data-setbg="{{asset($image[0]->real_estate_avatar)}}"></div>
                    @foreach ($image as $item)
                    <div class="sl-thumb set-bg" data-setbg="{{asset($item->image_path)}}"></div>
                    @endforeach
                </div>
                <div class="single-list-content">
                    <div class="row">
                        <div class="col-xl-8 sl-title">
                            <h2>{{$real_estate->translation_name}}</h2>
                            <p><i class="fa fa-map-marker"></i> {{$real_estate->translation_address}}</p>
                           
                            
                           
                            

                        </div>
                        <div class="col-xl-4">
                            <a href="{{route('cart.add',$real_estate->real_estate_id)}}" id="buy" target="_blank"
                                class="price-btn">@lang('Buy')</a>

                            <a href="{{ route('appointment.index', ['real_estate_id'=>$real_estate->real_estate_id])}}" class="rent-notic apointment">Đăt lịch hẹn</a>
                            {{-- <a href="{{route('cart.add',$real_estate->real_estate_id)}}" id="buy"
                            class="price-btn">@lang('Buy')</a> --}}

                        </div>
                        <div class="col-xl-12">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div style="font-weight: bold;
                                        display: inline-block;
                                        font-size: 20px;"><i class="fas fa-expand-arrows-alt"></i>
                                            {{$real_estate->real_estate_acreage}}
                                            m<sup>2</sup></div>
                                    </div>
                                    <div class="col-sm-3">

                                        <div style="font-weight: bold;
                                            display: inline-block;
                                            font-size: 20px;"> {{$rate->currency_symbol}}
                                            {{-- <i class="fas fa-dollar-sign"></i> --}}
                                            {{number_format($real_estate->real_estate_price)}}{{$real_estate->unit_translation_name}}
                                        </div>

                                    </div>
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-3"></div>
                                    @if ($convenience)

                                    <div class="col-sm-3">
                                        <?php if ($convenience->convenience_facade!=0)
                                        ?>@lang('facade'): <?php
                                        echo $convenience->convenience_facade;
                                        echo "m";
                                        ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <?php if ($convenience->convenience_way!=0)
                                        ?>@lang('way'): <?php
                                        echo $convenience->convenience_way;
                                        echo "m";
                                        ?>
                                    </div>
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-3">
                                        <?php if ($convenience->convenience_floor!=0)
                                         ?><i class='fas fa-building'></i> <?php
                                        echo $convenience->convenience_floor;
                                        ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <?php if ($convenience->convenience_bedroom!=0)
                                        ?><i class='fa fa-bed'></i> <?php
                                        echo $convenience->convenience_bedroom;
                                        ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <?php if ($convenience->convenience_bathroom!=0)
                                       ?><i class='fa fa-bath'></i> <?php
                                        echo $convenience->convenience_bathroom;
                                        ?>
                                    </div>
                                    @endif
                                    <div class="col-sm-3">
                                        {{-- <a type="button" id="wishlist"
                                            data-real_estate_id="{{$real_estate->real_estate_id}}"><i
                                            class="far fa-heart" id='heart'></i></a> --}}
                                     {{-- <a href="{{route('wishlist',$real_estate->real_estate_id)}}"
                                        id="subscription"><i class="fas fa-heart"></i></a>  --}}
                                        {{-- đăng ký --}}
                                     <?php if(\Auth::guard('account')->check() &&
                                        \Auth::guard('account')->user()->hasRole('Customer')):?>  

                                        <a type='button' id="wishlist_customer"
                                            data-real_estate_id="{{$real_estate->real_estate_id}}"
                                            data-customer_id="{{\Auth::guard('account')->user()->load('customer')->customer->customer_id}}">
                                            <?php  if($heart): ?>
                                            <i class='fas fa-heart' id='heart'></i></a>
                                        <?php else: ?>
                                        <i class='far fa-heart' id='heart'></i></a>
                                        <?php endif;?>
                                        <a href="{{route('subscription.submit',\Auth::guard('account')->user()->load('customer')->customer->customer_id)}}"
                                            class="rent-notic" id="subscription">Đăng ký</a>



                                        <?php else: ?>
                                        <a type='button' id="wishlist_cookie"
                                            data-real_estate_id="{{$real_estate->real_estate_id}}"
                                            data-cookie_name="{{Cookie::get('Name_of_your_cookie')}}">
                                            <?php if($heart):?>

                                            <i class='fas fa-heart' id='heart'></i></a>
                                        <?php else: ?>
                                        <i class='far fa-heart' id='heart'></i></a>

                                        <?php endif;?>
                                        <a href="{{route('subscription')}}" class="rent-notic" id="subscription">Đăng
                                            ký</a>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <span id="phananh"><i class="far fa-comment-alt"></i></span>

                <span id="inputGroupPrepend" class="phananh" data-toggle="modal" data-target="#exampleModal">
                    Phản ánh thông tin sản phẩm không chính xác.
                </span>
                
   <?php if(\Auth::guard('account')->check() &&
   \Auth::guard('account')->user()->hasRole('Customer')):?> 
                <form action="{{ route('customer.report.create.submit',$real_estate->real_estate_id) }}" method="post">
                    @csrf

                    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Phản ánh bài đăng</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                {{-- <div class="col-sm-5 m-b-xs">
                                                    <select name="content" class="input-sm form-control w-sm inline v-middle">
                                                    <option >Bulk action</option>
                                                    <option >Delete selected</option>
                                                    <option value="2">Bulk edit</option>
                                                    <option value="3">Export</option>
                                                    </select>
                                                </div> --}}
                                             
                                <div class="modal-body">
                                    <div class="col-md-7" id="form02">
                                    

                                        <label for="recipient-name" class="col-form-label"
                                            style="font-weight:bold;">Thông tin khách hàng</label>
                                        <br>
                                        <label for="recipient-name" class="col-form-label">Họ tên:</label>
                                        <button id="form01"
                                            disabled="disabled">{{\Auth::guard('account')->user()->load('customer')->customer->customer_name}}</button>
                                       <br>
                                            <label for="recipient-name" class="col-form-label">Số điện thoại</label>
                                        
                                        <button id="form01"
                                            disabled="disabled">{{\Auth::guard('account')->user()->load('customer')->customer->customer_tel}}</button>
                                            
                                    </div>
                                   
                                    <form>
                                        <label for="recipient-name" class="col-form-label">Vui lòng chỉ phản ánh các
                                            thông tin liên quan đến nội dung mô tả và
                                            thông tin địa ốc. Các vấn đề liên quan khác vui
                                            lòng liên hệ tổng đài 1900-6035 để được hỗ trợ.</label>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Vui lòng mô tả vấn đề cần
                                                phản ánh</label>
                                            <textarea class="form-control" id="message-text" name="content"
                                                placeholder="Nhập..."></textarea>
                                        </div>
                                 
                                    </form>
                                </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                            <button type="submit" class="btn btn-primary">Báo cáo</button>
                               
                                </div>
                                <?php else: ?>
                              

                                <form action="" method="post">
                                    @csrf
                
                                    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Phản ánh bài đăng</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                {{-- <div class="col-sm-5 m-b-xs">
                                                                    <select name="content" class="input-sm form-control w-sm inline v-middle">
                                                                    <option >Bulk action</option>
                                                                    <option >Delete selected</option>
                                                                    <option value="2">Bulk edit</option>
                                                                    <option value="3">Export</option>
                                                                    </select>
                                                                </div> --}}
                                                             
                                                <div class="modal-body" style="text-align: center;">
                                  
                                                   
                                                    <form>
                                                        <label for="recipient-name" class="col-form-label">Quên đăng nhập kìa</label>
                                                        <div class="form-group">
                                                        <a href="/real_estate/public/login">Nhấp vào đây để đăng nhập</a>
                                                        </div>
                                                 
                                                    </form>
                                                </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                               
                                                </div>













                                 <?php endif; ?>
                               
                            </div>
                          
                        </div>
                  
                    </div>
                    
                </form>
           
               
                <br>
                <br>

              
                <h3 class="sl-sp-title">Mô tả chi tiết</h3>
                <div class="description" style="font-family: sans-serif;">
                    <p>{!!$real_estate->translation_description!!}</p>
                </div>

                <h3 class="sl-sp-title">Bản đồ</h3>
                <div id="field" data-longitude="{{$real_estate->real_estate_longitude}}"
                    data-latitude="{{$real_estate->real_estate_latitude}}"></div>
                <div id="issMap"></div>
                @if ($convenience)

                <h3 class="sl-sp-title">Tiện nghi</h3>
                <div class="row property-details-list">
                    <?php if ($convenience->convenience_air_conditioning!=0):?>
                    <p class='col-xs-12 col-sm-4'><i class='fas fa-wind'></i>
                        @lang('Air Conditioning')</p><?php endif; ?>

                    <?php  if ($convenience->convenience_BBQ_area!=0) :?>

                    <p class='col-xs-12 col-sm-4'><i class='fas fa-dumpster-fire'></i> @lang('BBQ Area')</p>
                    <?php endif; ?>

                    <?php  if ($convenience->convenience_CCTV!=0):?>

                    <p class='col-xs-12 col-sm-4'><i class='fas fa-video'></i> @lang('CCTV')</p><?php endif; ?>

                    <?php  if ($convenience->convenience_concierge!=0):?>

                    <p class='col-xs-12 col-sm-4'><i class='fas fa-concierge-bell'></i> @lang('Concierge')</p>
                    <?php endif; ?>

                    <?php  if ($convenience->convenience_fitness!=0):?>

                    <p class='col-xs-12 col-sm-4'><i class='fas fa-dumbbell'></i> @lang('Fitness')</p><?php endif; ?>

                    <?php  if ($convenience->convenience_garden!=0):?>

                    <p class='col-xs-12 col-sm-4'><i class='fas fa-seedling'></i> @lang('Garden')</p><?php endif; ?>

                    <?php  if ($convenience->convenience_library!=0):?>

                    <p class='col-xs-12 col-sm-4'><i class='fa fa-book'></i> @lang('Library')</p><?php endif; ?>

                    <?php  if ($convenience->convenience_mountain_view!=0):?>

                    <p class='col-xs-12 col-sm-4'><i class='fas fa-mountain'></i> @lang('Mountain View')</p>
                    <?php endif; ?>

                    <?php  if ($convenience->convenience_parking!=0):?>
                    <p class='col-xs-12 col-sm-4'><i class='fas fa-car'></i> @lang('Parking')</p><?php endif; ?>


                    <?php  if ($convenience->convenience_playground!=0):?>
                    <p class='col-xs-12 col-sm-4'><i class='fas fa-campground'></i> @lang('Playground')</p>
                    <?php endif; ?>


                    <?php  if ($convenience->convenience_ocean_view!=0):?>
                    <p class='col-xs-12 col-sm-4'><i class='fas fa-umbrella-beach'></i> @lang('Sea/Ocean View')</p>
                    <?php endif; ?>


                    <?php  if ($convenience->convenience_security!=0):?>
                    <p class='col-xs-12 col-sm-4'><i class='fas fa-user-shield'></i> @lang('Security')</p>
                    <?php endif; ?>

                    <?php  if ($convenience->convenience_swimming_pool!=0):?>
                    <p class='col-xs-12 col-sm-4'><i class='fas fa-swimming-pool'></i> @lang('Swimming Pool')</p>
                    <?php endif; ?>

                    <?php  if ($convenience->convenience_tennis!=0):?>
                    <p class='col-xs-12 col-sm-4'><i class='fas fa-baseball-ball'></i> @lang('Tennis')</p>
                    <?php endif; ?>


                    <?php  if ($convenience->convenience_wifi!=0):?>
                    <p class='col-xs-12 col-sm-4'><i class="fas fa-wifi"></i> @lang('Wi Fi')</p><?php endif; ?>

                    <?php  if ($convenience->convenience_tivi!=0):?>
                    <p class='col-xs-12 col-sm-4'><i class='fas fa-tv'></i> @lang('Tivi')</p><?php endif; ?>

                </div>
                @endif
                {{-- <h3 class="sl-sp-title">Đánh giá</h3> --}}
                <div class="container-fuild">
                    <div class="row customer_rating" class="rating">
                        <div class="col-lg-3">
                            <div class="product-customer-col-1">
                                <h4>Đánh Giá Trung Bình</h4>

                                <p class="total-review-point">{{$average_rank}}/5</p>
                                <div class="start">
                                    <span class="star-fake">

                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <span class="star-real" style="width: {{$average_rank_per}}%">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </span>
                                    </span>
                                    <p>({{$count_rank}} nhận xét)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-customer-col-2">
                                <div class="side">
                                    <div class="left">5 Star</div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                        <div class="bar-5" style="width: {{$per_rank_5}}"></div>
                                    </div>
                                </div>
                                <div class="side right">

                                    <div class="right">{{$rank_4}}</div>

                                </div>
                                <div class="side">
                                    <div class="left">4 Star</div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                        <div class="bar-4" style="width: {{$per_rank_4}}"></div>
                                    </div>
                                </div>
                                <div class="side right">

                                    <div class="right">{{$rank_4}}</div>

                                </div>
                                <div class="side">
                                    <div class="left">3 Star</div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                        <div class="bar-3" style="width: {{$per_rank_3}}"></div>
                                    </div>
                                </div>
                                <div class="side right">

                                    <div class="right">{{$rank_3}}</div>

                                </div>
                                <div class="side">
                                    <div class="left">2 Star</div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                        <div class="bar-2" style="width: {{$per_rank_2}}"></div>
                                    </div>
                                </div>
                                <div class="side right">

                                    <div class="right">{{$rank_2}}</div>

                                </div>
                                <div class="side">
                                    <div class="left">1 Star</div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                        <div class="bar-1" style="width: {{$per_rank_1}}"></div>
                                    </div>
                                </div>
                                <div class="side right">

                                    <div class="right">{{$rank_1}}</div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="share_comment float-right">
                                <h3>Chia sẻ nhận xét về sản phẩm</h3>
                                <button class="btn btn-default"><a href="#cmt">Viết nhận xét của bạn</a> </button>
                            </div>
                        </div>
                    </div>

                </div>
              <div class="row">
              
              </div>

               
                <div class="comment-warp">
                    <ul class="comment-list">
                        @foreach ($evaluate as $item)
                           
                                @if($item->evaluate_reply==null)
                                    <li>
                                        <div class="comment">
                                            <div class="comment-avator set-bg"
                                                data-setbg="{{asset('leramiz/img/blog/comment/3.jpg')}}">
                                            </div>
                                            <div class="comment-content">
                                                <h5>{{$item->evaluate_title}}</h5>
                                                <h5>{{$item->customer_name}}<span>{{$item->updated_at->format('d-m-Y')}}</span></h5>
                                                <p>{{$item->evaluate_content}}</p>
                                                <a data-toggle="modal" data-target="#exampleModal" class="c-btn" exampleModal>Báo cáo</a>
                                                {{-- <button type="button" class="c-btn showReply">Trả lời</button> --}}
                                                <a data-toggle="modal"  data-target="#reply" class="c-btn showForm">Trả lời bình luận</a>
                                                <div class="formReply" style="display: none; margin-top: 10px;">
                                                    <form class="comment-form" 
                                                    action="{{ route('reply_cmt', ['idsp'=> $real_id,'idrep'=>$item->evaluate_id]) }}" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            {{-- <div class="form-group">
                                                                <input type="text" name="title"  placeholder="Tiêu đề . . .">
                                                            </div> --}}
                                                            <div class="form-group">
                                                                <textarea class="form-control" name="content" rows="3"></textarea>
                                                            </div>
                                                            <button class="site-btn">Gửi</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                        <ul >
                                            @foreach($evaluate as $val)
                                            @if($item->evaluate_id == $val->evaluate_reply)
                                                <li>
                                                    <div class="comment subreply" style="
                                                        margin-left: 105px;
                                                        margin-bottom: 57px;
                                                    ">
                                                        <div class="comment-avator set-bg"
                                                            data-setbg="{{asset('leramiz/img/blog/comment/3.jpg')}}">
                                                        </div>
                                                        <div class="comment-content">
                                                            <h5>{{$val->customer_name}}<span>{{$item->updated_at->format('d-m-Y')}}</span></h5>
                                                            <p>{{$val->evaluate_content}}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                            @endforeach
                                        
                                        </ul>
                                    </li>
                                @endif
                          
                        @endforeach
                    </ul>
                    
                    

                    
                    <div class="comment-form-warp " id="cmt">
                        {{-- Auth::gruad('ten') --}}
                        <h4 class="comment-title" >Bình luận</h4>
                     <form class="comment-form" action="{{ route('write_cmt', ['idsp'=> $real_id]) }}"
                                        method="post">@csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    
                                        
                                        <h3 class="sl-sp-title" style="margin-top: 14px">Đánh giá sản phẩm</h3>
                                        <div id="rating">
                                            <input type="radio" id="star5" name="rating" value="5" />
                                            <label class = "full" for="star5" ></label>
                                        
                                            <input type="radio" id="star4" name="rating" value="4" />
                                            <label class = "full" for="star4" ></label>
                                        
                                            <input type="radio" id="star3" name="rating" value="3" />
                                            <label class = "full" for="star3" ></label>
                                        
                                            <input type="radio" id="star2" name="rating" value="2" />
                                            <label class = "full" for="star2" ></label>
                                        
                                            <input type="radio" id="star1" name="rating" value="1" />
                                            <label class = "full" for="star1" ></label>
                                        </div>
                                   
                                </div>
                                {{-- <div class="col-md-6">
                            <input type="text" name="name_customer" placeholder="Your Name">
                        </div> --}}
                                <div class="col-md-6">
                                    <input type="text" name="title" placeholder="Tiêu đề...">
                                </div>
                                <div class="col-lg-9">
                                    <textarea placeholder="Nội dung bình luận..." name="content"></textarea>
                                    
                                </div>
                
                                <div class="col-sm-12">
                                    <button class="site-btn">Gửi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- sidebar -->
            <div class="col-lg-4 col-md-7 sidebar">

                @include('pages.user.page.search')
            </div>
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
    var marker = L.marker([10.0310059,105.7513944]).addTo(mymap);
    //vòng tròn
    var circle = L.circle([10.0310059,105.7513944], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 500
    }).addTo(mymap);

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
    // showForm
    // formReply


    $(document).ready(function () {
    $(".showForm").on("click", function () {
        $(this).next().toggle();
       
    });
  
    
});
</script>
@endpush