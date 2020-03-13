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
        <div class="row">
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
                <div class="comment-warp">
                    {{-- <h4 class="comment-title">3 Comments</h4> --}}
                    <ul class="comment-list">
                        <li>
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
                                        <div class="comment-avator set-bg"
                                            data-setbg="{{asset('leramiz/img/blog/comment/2.jpg')}}"></div>
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
                        </li>
                        <li>
                            <div class="comment">
                                <div class="comment-avator set-bg"
                                    data-setbg="{{asset('leramiz/img/blog/comment/3.jpg')}}"></div>
                                <div class="comment-content">
                                    <h5>Gina Haspel<span>25 Jun 2018</span></h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. finibus eros eget purus vulputate,
                                        sit amet ornare ipsum. Ut enim ad minim veniam. Donec tincidunt sem non odio
                                        congue.</p>
                                    <a href="" class="c-btn">Like</a>
                                    <a href="" class="c-btn">Reply</a>
                                </div>
                            </div>
                        </li>
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