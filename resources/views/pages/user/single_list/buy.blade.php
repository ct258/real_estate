<div class="col-lg-8 single-list-page frame">
    <div class="single-list-slider owl-carousel" id="sl-slider">
        @if($image->isNotEmpty())
        <div class="sl-item set-bg" data-setbg="{{asset($image[0]->real_estate_avatar)}}"></div>
        <br>
        @foreach ($image as $item)
        <div class="sl-item set-bg" data-setbg="{{asset($item->image_path)}}"></div>
        @endforeach
        @endif
    </div>

    <div class="owl-carousel sl-thumb-slider" id="sl-slider-thumb">
        @if($image->isNotEmpty())
        <div class="sl-thumb set-bg" data-setbg="{{asset($image[0]->real_estate_avatar)}}"></div>
        @foreach ($image as $item)
        <div class="sl-thumb set-bg" data-setbg="{{asset($item->image_path)}}"></div>
        @endforeach
        @endif
    </div>
    <div class="single-list-content">
        <div class="row">
            <div class="col-xl-8 sl-title">
                <h2>{{$real_estate->translation_name}}</h2>
                <p><i class="fa fa-map-marker"></i> {{$real_estate->translation_address}}</p>
            </div>
            <div class="col-xl-4">
                <div class="sp1">
                    <a href="{{route('cart.add',$real_estate->real_estate_id)}}" id="buy"
                        class="price-btn room-price">@lang('Buy')

                    </a>
                </div>

                {{-- <a href="{{ route('appointment.index', ['real_estate_id'=>$real_estate->real_estate_id])}}"
                class="rent-notic apointment">@lang('Book meet')</a> --}}
                {{-- <a href="{{route('cart.add',$real_estate->real_estate_id)}}" id="buy"
                class="price-btn">@lang('Buy')</a> --}}

                {{-- <a href="{{ route('appointment.index', ['real_estate_id'=>$real_estate->real_estate_id,'customer_id'=> $customer_id = Auth::guard('account')->user()->load('customer')->customer->customer_id]) }}"
                class="rent-notic apointment">Đăt lịch hẹn</a> --}}
                <?php if(\Auth::guard('account')->check() &&
                \Auth::guard('account')->user()->hasRole('Customer')):?>
                <a href="{{ route('appointment.index', ['real_estate_id'=>$real_estate->real_estate_id])}}"
                    class="rent-notic apointment">Đăt lịch hẹn</a>
                <?php else: ?>

                <!-- Button trigger modal -->
                <a href="#exampleModalCenter" class="rent-notic apointment" data-toggle="modal"
                    data-target="#exampleModalCenter">
                    Đặt lịch hẹn
                </a>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label for="recipient-name" class="col-form-label">Quên đăng
                                    nhập kìa</label>
                                <div class="form-group">
                                    <a href="/real_estate/public/login">Nhấp vào đây để đăng
                                        nhập</a>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endif; ?>
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
                        <div class="col-sm-4">

                            <div style="font-weight: bold;
                                            display: inline-block;
                                            font-size: 20px;"> {{$rate->currency_symbol}}
                                {{-- <i class="fas fa-dollar-sign"></i> --}}
                                {{number_format($real_estate->real_estate_price)}}{{$real_estate->unit_translation_name}}
                            </div>

                        </div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-3"></div>
                        @include('pages.user.single_list.info')

                        <div class="col-sm-3">
                            {{-- <a type="button" id="wishlist"
                                            data-real_estate_id="{{$real_estate->real_estate_id}}"><i
                                class="far fa-heart" id='heart'></i></a> --}}
                            {{-- <a href="{{route('wishlist',$real_estate->real_estate_id)}}"
                            id="subscription"><i class="fas fa-heart"></i></a> --}}
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
                            <a href="{{route('subscription.submit')}}" class="rent-notic" id="subscription">Đăng ký</a>

                            {{-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                                Đăng ký
                            </button>
                            @include('pages.user.single_list.subscription') --}}



                            <?php else: ?>
                            <a type='button' id="wishlist_cookie" data-real_estate_id="{{$real_estate->real_estate_id}}"
                                data-cookie_name="{{Cookie::get('Name_of_your_cookie')}}">
                                <?php if($heart):?>

                                <i class='fas fa-heart' id='heart'></i></a>
                            <?php else: ?>
                            <i class='far fa-heart' id='heart'></i></a>

                            <?php endif;?>
                            <a href="#exampleModalCenter" class="rent-notic" id="subscription" data-toggle="modal"
                                data-target="#exampleModalCenter">Đăng
                                ký</a>
                            <?php endif;?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.user.single_list.report')
    <br>
    <br>


    @include('pages.user.single_list.description')
    @include('pages.user.single_list.map')
    @include('pages.user.single_list.convenient')
    @include('pages.user.single_list.rate')


</div>


{{-- </div>
</div>
</form>
</div> --}}