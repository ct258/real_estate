@extends('layouts.user')
@push('css')
<style>
    img.img-lazy {
        width: 100% !important;
        height: auto !important;
        max-height: 140px;
    }

    .intro h4 {
        color: #555;
        margin-top: 5px;
        margin-bottom: 3px;
        font-size: 16px;
        font-weight: 700;
        letter-spacing: -.5px;
    }

    .intro span {
        color: #555;
    }

    .intro p {
        margin: 10px 0;
        color: #666;
        text-align: justify;
    }

    .blog a {
        text-decoration: none !important;
    }

    .blog {
        padding: 20px 0;
    }

    .rent-notic,
    .rent-notic:hover {
        text-decoration: none;
        color: white;

    }

    .sale-notic,
    .sale-notic:hover {
        text-decoration: none;
        color: white;

    }

    .feature-title h5 {
        min-height: 58px;
    }

    section.feature-section.spad {
        margin-top: 100px;
        margin-bottom: 100px;
    }
</style>
@endpush
@section('page')

<!-- feature section -->
<section class="feature-section spad">
    <div class="section-title text-center">
        <h3>Bất động sản yêu thích</h3>
    </div>
    <div class="container frame">
        <div class="row">


            @forelse ($product as $item)


            <div class="col-lg-4 col-md-6">
                <!-- feature -->
                <div class="feature-item">
                    <div class="feature-pic set-bg" id="Avatar" data-setbg="{{asset($item->real_estate_avatar)}}"
                        style="background-image: url(&quot;{{$item->real_estate_avatar}}&quot;);">

                    </div>
                    <div class="feature-text">
                        <div class="text-center feature-title">
                            <h5>{{$item->translation_name}}</h5>
                            <p><i class="fas fa-map-marked"></i> {{$item->district_name}},
                                {{$item->province_name}}</p>
                        </div>
                        <div class="room-info-warp">
                            <div class="room-info">
                                <div class="rf-left">
                                    <p><i class="fas fa-expand-arrows-alt"></i>{{$item->real_estate_acreage}}
                                        m<sup>2</sup></p>
                                    {{-- <p><i class="fas fa-dollar-sign"></i>{{number_format($item->real_estate_price)}}
                                    {{$item->unit_name}}</p> --}}
                                </div>
                                <div class="rf-right">
                                    <p><i class="far fa-clock"></i></i> {{$day_product[$item->real_estate_id]}}</p>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('single_list',$item->real_estate_id)}}"
                            class="room-price">{{$rate->currency_symbol}}
                            {{number_format($price_product[$item->real_estate_id])}}{{ $item->unit_translation_name}}
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-lg-4 col-md-6">
                <!-- feature -->
                <div class="feature-item">
                    <p>Bạn chưa có đơn hàng nào</p>
                </div>
            </div>

            @endforelse

        </div>
    </div>
</section>
<!-- feature section end -->
@endsection