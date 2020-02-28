@extends('layouts.user')
@section('page')
<style>


</style>
<!-- Page -->
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 single-list-page">
                {{-- <div class="single-list-slider owl-carousel" id="sl-slider">
                    @foreach ($image as $item)


                    <div class="sl-item set-bg" data-setbg="{{asset($item->image_path)}}">
                <div class="sale-notic">FOR SALE</div>
            </div>
            <div class="sl-item set-bg" data-setbg="{{asset($item->image_path)}}">
                <div class="rent-notic">FOR Rent</div>
            </div>
            <div class="sl-item set-bg" data-setbg="{{asset($item->image_path)}}">
                <div class="sale-notic">FOR SALE</div>
            </div>
            <div class="sl-item set-bg" data-setbg="{{asset($item->image_path)}}">
                <div class="rent-notic">FOR Rent</div>
            </div>
            <div class="sl-item set-bg" data-setbg="{{asset($item->image_path)}}">
                <div class="sale-notic">FOR SALE</div>
            </div>
            @endforeach
        </div> --}}
        <div class="owl-carousel sl-thumb-slider" id="sl-slider-thumb">
            {{-- @foreach ($image as $item)


                    <div class="sl-thumb set-bg" data-setbg="{{asset($item->image_path)}}"></div>
        <div class="sl-thumb set-bg" data-setbg="{{asset($item->image_path)}}"></div>
        <div class="sl-thumb set-bg" data-setbg="{{asset($item->image_path)}}"></div>
        <div class="sl-thumb set-bg" data-setbg="{{asset($item->image_path)}}"></div>
        <div class="sl-thumb set-bg" data-setbg="{{asset($item->image_path)}}"></div>
        @endforeach --}}
    </div>
    <div class="single-list-content">
        <div class="row">
            {{-- <div class="col-xl-8 sl-title">
                            <h2>{{$real_estate->real_estate_name_vi}}</h2>
            <p><i class="fa fa-map-marker"></i>{{$real_estate->real_estate_address}}</p>
        </div>
        <div class="col-xl-4">
            <a href="#" class="price-btn">{{$real_estate->real_estate_price}}</a>
        </div> --}}
    </div>
    <h3 class="sl-sp-title">Thông tin chính</h3>
    <div class="row property-details-list">
        <div class="col-md-4 col-sm-6">
            <p><i class="fa fa-th-large"></i> 1500 Square foot</p>
            <p><i class="fa fa-bed"></i> 16 Bedrooms</p>
            <p><i class="fa fa-user"></i> Gina Wesley</p>
        </div>
        <div class="col-md-4 col-sm-6">
            <p><i class="fa fa-car"></i> 2 Garages</p>
            <p><i class="fa fa-building-o"></i> Family Villa</p>
            <p><i class="fa fa-clock-o"></i> 1 days ago</p>
        </div>
        <div class="col-md-4">
            <p><i class="fa fa-bath"></i> 8 Bathrooms</p>
            <p><i class="fa fa-trophy"></i> 5 years age</p>
        </div>
    </div>
    <h3 class="sl-sp-title">Mô tả chi tiết</h3>
    {{-- <div class="description">
                        <p>{!!$real_estate->real_estate_description_vi!!}</p>
                    </div> --}}
    <h3 class="sl-sp-title">Tiện nghi</h3>
    <div class="row property-details-list">
        <p class="col-xs-12 col-sm-4"><i class="fas fa-air-conditioner"></i>Air Conditioning
        </p>
        <p class="col-xs-12 col-sm-4"><i class="fas fa-dumpster-fire"></i>BBQ Area
        </p>
        <p class="col-xs-12 col-sm-4"><i class="fas fa-cctv"></i> CCTV
        </p>
        <p class="col-xs-12 col-sm-4"><i class="fas fa-concierge-bell"></i> Concierge
        </p>
        <p class="col-xs-12 col-sm-4"><i class="fas fa-dumbbell"></i>Fitness
        </p>
        <p class="col-xs-12 col-sm-4"><i class="fas fa-seedling"></i> Garden
        </p>
        <p class="col-xs-12 col-sm-4"><i class="fa fa-book"></i> Library
        </p>
        <p class="col-xs-12 col-sm-4"><i class="fas fa-mountain"></i> Mountain View
        </p>
        <p class="col-xs-12 col-sm-4"><i class="fas fa-car"></i>Parking
        </p>
        <p class="col-xs-12 col-sm-4">Playground
        </p>
        <p class="col-xs-12 col-sm-4"><i class="fas fa-umbrella-beach"></i> Sea/Ocean View
        </p>
        <p class="col-xs-12 col-sm-4"><i class="fas fa-user-shield"></i> Security
        </p>
        <p class="col-xs-12 col-sm-4">Single Storey
        </p>
        <p class="col-xs-12 col-sm-4"><i class="fas fa-swimmer"></i>Swimming Pool
        </p>
        <p class="col-xs-12 col-sm-4"><i class="fas fa-tennis-ball"></i> Tennis
        </p>
        <p class="col-xs-12 col-sm-4"><i class="fas fa-wifi"></i>Wi Fi
        </p>

    </div>
    <h3 class="sl-sp-title bd-no">Floorplans</h3>
    <div id="accordion" class="plan-accordion">
        <div class="panel">
            <div class="panel-header" id="headingOne">
                <button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="false"
                    aria-controls="collapse1">First Floor: <span>660 sq ft</span>
                    <i class="fa fa-angle-down"></i></button>
            </div>
            <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="panel-body">
                    <img src="img/plan-sketch.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-header" id="headingTwo">
                <button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="true"
                    aria-controls="collapse2">Second Floor:<span>610 sq ft.</span>
                    <i class="fa fa-angle-down"></i>
                </button>
            </div>
            <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="panel-body">
                    <img src="img/plan-sketch.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-header" id="headingThree">
                <button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false"
                    aria-controls="collapse3">Third Floor :<span>580 sq ft</span>
                    <i class="fa fa-angle-down"></i>
                </button>
            </div>
            <div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="panel-body">
                    <img src="img/plan-sketch.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    <h3 class="sl-sp-title bd-no">Video</h3>
    <div class="perview-video">
        <img src="img/video.jpg" alt="">
        <a href="https://www.youtube.com/watch?v=v13nSVp6m5I" class="video-link"><img src="img/video-btn.png"
                alt=""></a>
    </div>
    <h3 class="sl-sp-title bd-no">Location</h3>
    <div class="pos-map" id="map-canvas"></div>
    </div>
    </div>
    <!-- sidebar -->
    <div class="col-lg-4 col-md-7 sidebar">
        <div class="author-card">
            <div class="author-img set-bg" data-setbg="img/author.jpg"></div>
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
        <div class="related-properties">
            <h2>Related Property</h2>
            <div class="rp-item">
                <div class="rp-pic set-bg" data-setbg="img/feature/1.jpg">
                    <div class="sale-notic">FOR SALE</div>
                </div>
                <div class="rp-info">
                    <h5>1963 S Crescent Heights Blvd</h5>
                    <p><i class="fa fa-map-marker"></i>Los Angeles, CA 90034</p>
                </div>
                <a href="#" class="rp-price">$1,200,000</a>
            </div>
            <div class="rp-item">
                <div class="rp-pic set-bg" data-setbg="img/feature/2.jpg">
                    <div class="rent-notic">FOR Rent</div>
                </div>
                <div class="rp-info">
                    <h5>17 Sturges Road, Wokingham</h5>
                    <p><i class="fa fa-map-marker"></i> Newtown, CT 06470</p>
                </div>
                <a href="#" class="rp-price">$2,500/month</a>
            </div>
            <div class="rp-item">
                <div class="rp-pic set-bg" data-setbg="img/feature/4.jpg">
                    <div class="sale-notic">FOR SALE</div>
                </div>
                <div class="rp-info">
                    <h5>28 Quaker Ridge Road, Manhasset</h5>
                    <p><i class="fa fa-map-marker"></i>28 Quaker Ridge Road, Manhasset</p>
                </div>
                <a href="#" class="rp-price">$5,600,000</a>
            </div>
            <div class="rp-item">
                <div class="rp-pic set-bg" data-setbg="img/feature/5.jpg">
                    <div class="rent-notic">FOR Rent</div>
                </div>
                <div class="rp-info">
                    <h5>Sofi Berryessa 750 N King Road</h5>
                    <p><i class="fa fa-map-marker"></i>Sofi Berryessa 750 N King Road</p>
                </div>
                <a href="#" class="rp-price">$1,600/month</a>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<!-- Page end -->
@endsection