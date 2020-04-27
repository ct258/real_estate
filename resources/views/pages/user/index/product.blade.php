@if ($product->isNotempty())
<!-- feature section -->
<section class="feature-section spad">
    <div class="section-title text-center">
        <h3>@lang('New product')</h3>
    </div>
    <div class="container frame">
        <div class="row">
            @foreach ($product as $item)


            <div class="col-lg-4 col-md-6">
                <!-- feature -->
                <div class="feature-item">
                    <div class="feature-pic set-bg" id="Avatar" data-setbg="{{asset($item->real_estate_avatar)}}"
                        style="background-image: url(&quot;{{$item->real_estate_avatar}}&quot;);">
                        <div class="sale-notic">FOR SALE</div>
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
                            {{number_format($price_product[$item->real_estate_id])}}{{$item->unit_translation_name}}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- feature section end -->
@endif