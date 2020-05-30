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
    .done-notic,
    .sale-notic,
    .rent-notic:hover,
    .done-notic:hover,
    .sale-notic:hover {
        text-decoration: none;
        color: white;

    }


    .feature-title h5 {
        min-height: 58px;
    }

    section.feature-section.spad {
        margin-top: 100px !important;
    }

    .sold {
        position: absolute;
        top: 0;
        right: 0;
    }

    .feature-item {
        position: relative;
    }
</style>
@endpush
@section('page')

@if ($product->isNotempty())
<!-- feature section -->
<section class="feature-section spad">
    <div class="section-title text-center">
        <h3>Bất động sản mới</h3>
    </div>
    <div class="container frame">
        <div class="row">
            @foreach ($product as $item)


            <div class="col-lg-4 col-md-6">
                <!-- feature -->
                <div class="feature-item">
                    <div class="feature-pic set-bg" id="Avatar" data-setbg="{{asset($item->real_estate_avatar)}}"
                        style="background-image: url(&quot;{{$item->real_estate_avatar}}&quot;);">
                        {{-- {{dd($item->hasDeposit())}} --}}
                        @if($item->hasDeposit())
                        <a class="sale-notic" href="{{route('repay',$item->real_estate_id)}}">Thanh toán</a>
                        @elseif($item->load('deposit') && 'Chờ hoàn tất'!=$item->real_estate_status)
                        <a class="rent-notic" href="{{route('post.edit',$item->real_estate_id)}}">Chỉnh sửa</a>
                        {{-- @elseif($item->real_estate_status=='Chờ duyệt') --}}
                        @endif

                        <div class="sold">
                            @if('Chờ hoàn tất'==$item->real_estate_status)
                            <a class="rent-notic" href="#">Đang xử lý</a>
                            @else
                            <form action="{{route('post.sold',$item->real_estate_id)}}" method="post" class="sold_form">
                                @csrf
                                <button type="submit" class="done-notic float-md-right" style="border: none;"> Đã
                                    bán</button>
                            </form>
                            @endif
                        </div>
                        {{-- <a class="done-notic float-md-right" href="{{route('post.sold',$item->real_estate_id)}}">Đã
                        bán</a> --}}
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
            @endforeach

        </div>
    </div>
</section>
<!-- feature section end -->
@endif
@endsection
@push('script')
<script>
    $(document).ready(function () {
        $('.sold_form').on('submit',function(){
            if(confirm('Bạn đã bán bất động sản này?'))
            {
                return true;
            }
            else
            {
                return false;
            }
        });
    });
    
</script>
@endpush