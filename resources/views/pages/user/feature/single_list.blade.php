@extends('layouts.user')
@push('css')


<style>
    path {
        color: #30caa0;
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
        margin-top: 78px;
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
        margin-top: 10px;
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
        width: 72%;
        margin-left: 30px;
        margin-top: 11px;
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
<section class="page-section">
    <div class="container">
        <div class="row single_list">
            <div class="col-lg-8 single-list-page">
                <div class="single-list-slider owl-carousel" id="sl-slider">
                    @foreach ($image as $item)
                    <div class="sl-item set-bg" data-setbg="{{asset($item->image_path)}}"></div>
                    @endforeach
                </div>
                <div class="owl-carousel sl-thumb-slider" id="sl-slider-thumb">
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
                            {{-- <a href="{{route('cart.add',$real_estate->real_estate_id)}}" id="buy"
                            class="price-btn">@lang('Buy')</a> --}}
                        </div>
                        <div class="col-xl-12">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm" style="padding-left:0px">
                                        <div><i class="fas fa-expand-arrows-alt"></i>
                                            {{$real_estate->real_estate_acreage}}
                                            m<sup>2</sup></div>
                                    </div>
                                    <div class="col-sm">
                                        <div>
                                            <div style="font-weight: bold;
                                            display: inline-block;
                                            color: #30caa0;
                                            font-size: 18px;}"> {{$rate->currency_symbol}}
                                            </div>
                                            {{-- <i class="fas fa-dollar-sign"></i> --}}
                                            {{number_format($real_estate->real_estate_price)}}
                                        </div>

                                    </div>
                                    <div class="col-sm">
                                        {{-- đăng ký --}}

                                        <a href="{{route('subscription',$user=1)}}" class="rent-notic"
                                            id="subscription">Đăng ký</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <h3 class="sl-sp-title">Mô tả chi tiết</h3>
                <div class="description" style="font-family: sans-serif;">
                    <p>{!!$real_estate->translation_description!!}</p>
                </div>
                <h3 class="sl-sp-title">Tiện nghi</h3>
                <div class="row property-details-list">
                    <p class="col-xs-12 col-sm-4"><i class="fa fa-bed"></i> {{ __('Bedroom') }} </p>
                    <p class="col-xs-12 col-sm-4"><i class="fa fa-bath"></i> @lang('Bathroom')</p>
                    <p class="col-xs-12 col-sm-4"><i class="fa fa-trophy"></i> @lang('Year age')</p>
                    <p class="col-xs-12 col-sm-4"><i class="fas fa-wind"></i> @lang('Air Conditioning')</p>
                    <p class="col-xs-12 col-sm-4"><i class="fas fa-dumpster-fire"></i> @lang('BBQ Area')</p>
                    <p class="col-xs-12 col-sm-4"><i class="fas fa-video"></i> @lang('CCTV')</p>
                    <p class="col-xs-12 col-sm-4"><i class="fas fa-concierge-bell"></i> @lang('Concierge')</p>
                    <p class="col-xs-12 col-sm-4"><i class="fas fa-dumbbell"></i> @lang('Fitness')</p>
                    <p class="col-xs-12 col-sm-4"><i class="fas fa-seedling"></i> @lang('Garden')</p>
                    <p class="col-xs-12 col-sm-4"><i class="fa fa-book"></i> @lang('Library')</p>
                    <p class="col-xs-12 col-sm-4"><i class="fas fa-mountain"></i> @lang('Mountain View')</p>
                    <p class="col-xs-12 col-sm-4"><i class="fas fa-car"></i> @lang('Parking')</p>
                    <p class="col-xs-12 col-sm-4"><i class="fas fa-campground"></i> @lang('Playground')</p>
                    <p class="col-xs-12 col-sm-4"><i class="fas fa-umbrella-beach"></i> @lang('Sea/Ocean View')</p>
                    <p class="col-xs-12 col-sm-4"><i class="fas fa-user-shield"></i> @lang('Security')</p>
                    <p class="col-xs-12 col-sm-4"><i class="fas fa-building"></i> @lang('Single Storey')</p>
                    <p class="col-xs-12 col-sm-4"><i class="fas fa-swimming-pool    "></i> @lang('Swimming Pool')</p>
                    <p class="col-xs-12 col-sm-4"><i class="fas fa-baseball-ball"></i> @lang('Tennis')</p>
                    <p class="col-xs-12 col-sm-4"><i class="fas fa-wifi"></i> @lang('Wi Fi')</p>
                    <p class="col-xs-12 col-sm-4"><i class="fas fa-tv"></i> @lang('Tivi')</p>

                </div>
                <h3 class="sl-sp-title">Đánh giá</h3>
                <div class="container">
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
                                        <div class="bar-5"></div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div class="right">{{$rank_5}}</div>
                                </div>
                                <div class="side">
                                    <div class="left">4 Star</div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                        <div class="bar-4"></div>
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
                                        <div class="bar-3"></div>
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
                                        <div class="bar-2"></div>
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
                                        <div class="bar-1"></div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div class="right">{{$rank_1}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="share_comment">
                                <h3>Chia sẻ nhận xét về sản phẩm</h3>
                                <button class="btn btn-default">Viết nhận xét của bạn</button>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="sl-sp-title">Đánh giá</h3>
                <div class="comment-warp">
                    {{-- <h4 class="comment-title">3 Comments</h4> --}}
                    <ul class="comment-list">
                        {{-- <li>
                            <div class="comment">
                                <div class="comment-avator set-bg"
                                    data-setbg="{{asset('leramiz/img/blog/comment/1.jpg')}}"></div>
                <div class="comment-content">
                    <h5>Lucia Mendes <span>24 Mar 2018</span></h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. finibus eros eget purus vulputate,
                        sit amet ornare ipsum. Ut enim ad minim veniam. Donec tincidunt sem non odio
                        congue.</p>
                    <a href="" class="c-btn">Like</a>
                    <a href="" class="c-btn">Reply</a>
                </div>
            </div>
            <ul class="replay-comment-list">
                <li>
                    <div class="comment">
                        <div class="comment-avator set-bg" data-setbg="{{asset('leramiz/img/blog/comment/2.jpg')}}">
                        </div>
                        <div class="comment-content">
                            <h5>Peter Simon<span>25 Jun 2018</span></h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod
                                tempor incididunt ut labore iron man dolore magna aliqua. fpurus
                                vulputate, sit amet ornare ipsum. Ut enim ad minim veniam. Donec
                                tincidunt sem non odio congue.</p>
                            <a href="" class="c-btn">Like</a>
                            <a href="" class="c-btn">Reply</a>
                        </div>
                    </div>
                </li>
            </ul>
            </li> --}}
            @foreach ($evaluate as $item)


            <li>
                <div class="comment">
                    <div class="comment-avator set-bg" data-setbg="{{asset($item->customer_avatar)}}"></div>
                    <div class="comment-content">
                        <h5>{{$item->evaluate_title}}</h5>
                        <h5>{{$item->customer_name}}<span>{{$item->updated_at->format('Y-m-d')}}</span></h5>
                        <p>{{$item->evaluate_content}}</p>
                        <a href="" class="c-btn">Like</a>
                        <a href="" class="c-btn">Reply</a>
                    </div>
                </div>
            </li>
            @endforeach
            </ul>
            <div class="comment-form-warp">
                <h4 class="comment-title">Leave Your Comment</h4>
                <form class="comment-form">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" placeholder="Your Name">
                        </div>
                        <div class="col-md-6">
                            <input type="email" placeholder="Your Email">
                        </div>
                        <div class="col-lg-9">
                            <textarea placeholder="Your Message"></textarea>
                            <button class="site-btn">SEND COMMENT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- sidebar -->
    <div class="col-lg-4 col-md-7 sidebar">
        <div class="author-card">
            <div class="author-img set-bg" data-setbg="{{asset('leramiz/img/author.jpg')}}"></div>
            <div class="author-info">
                <h5>Gina Wesley</h5>
                <p>Real Estate Agent</p>
            </div>
            <div class="author-contact">
                <p><i class="fa fa-phone"></i>(567) 666 121 2233</p>
                <p><i class="fa fa-envelope"></i>ginawesley26@gmail.com</p>
            </div>
        </div>
        <div class="contact-form-card">
            <h5>Do you have any question?</h5>
            <form>
                <input type="text" placeholder="Your name">
                <input type="text" placeholder="Your email">
                <textarea placeholder="Your question"></textarea>
                <button>SEND</button>
            </form>
        </div>

    </div>
    </div>
    </div>

</section>
<!-- Page end -->
@endsection
@push('script')
{{-- <script>
    $(document).ready(function(){

    $("#buy").click(function(event){
        alert(123222);
        if(Auth::guard('account')->check()){

            // var user_id = $("input[name=user_id]").val();
            // var real_estate_id = $("input[name=real_estate_id]").val();
            var real_estate_id = {{$real_estate->real_estate_id}};
// var real_estate_id = {{$real_estate->real_estate_id}};
// $.ajaxSetup({
// headers: {
// 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// }
// });
alert(real_estate_id);
// alert(user_id);
// $.ajax({
// type: "GET",
// cache: false,
// url: "'/cart/"+real_estate_id,
// data: {
// user_id,
// password
// },
// dataType: "json",
// success: function(data){
// alert('đã thêm vào giỏ hàng');
// },
// error: function(error){
// alert('lỗi');
// }
// });
}
else{
alert(123);
var login = "{{route('getLogin')}}";
}
});
});
</script> --}}
@endpush