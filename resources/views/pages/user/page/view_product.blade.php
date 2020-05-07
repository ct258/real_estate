
@if ($view_product->isNotempty())
<!-- feature section -->
<section class="feature-section spad">
    <div class="container">
        <div class="section-title text-center">
            <h3>Bất động sản bạn đã xem</h3>
        </div>
        <div class="row">
            @foreach ($view_product as $item)


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
                                {{-- <div class="rf-right">
                                                <p><i class="fa fa-car"></i> 2 Garages</p>
                                                <p><i class="fa fa-bath"></i> 6 Bathrooms</p>
                                            </div>	 --}}
                            </div>
                                <div class="room-info">
                                    <div class="rf-left">
                                        <p><i class="fa fa-user"></i> Tony Holland</p>
                                    </div>
                                    <div class="rf-right">
                                        <p><i class="far fa-clock"></i></i> {{$item->created_at}}</p>
                                    </div>
                                </div>
                        </div>
                        <div class="sp1">
                            <a href="{{route('single_list',$item->real_estate_id)}}"
                                class="room-price">{{$rate->currency_symbol}} {{number_format($item->real_estate_price)}}
                                
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- feature section end -->
@endif