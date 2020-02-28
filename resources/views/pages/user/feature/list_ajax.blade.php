{{-- {{dd($real_estate)}} --}}
@foreach ($real_estate as $item)
<div class="col-lg-4 col-md-6">
    <!-- feature -->
    <div class="feature-item">
        <div class="feature-pic set-bg" id="Avatar" data-setbg="{{asset($item->image_path)}}"
            style="background-image: url(&quot;{{$item->image_path}}&quot;);">
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
                        <p><i class="fa fa-clock-o"></i> {{$day[$item->real_estate_id]}}</p>
                    </div>
                </div>
            </div>
            <a href="#" class="room-price"><i class="fas fa-dollar-sign"></i>{{number_format($item->real_estate_price)}}
                {{$item->unit_name_vi}}</a>
        </div>
    </div>
</div>
@endforeach
{!!$real_estate->onEachSide(5)->links()!!}