<div class="container-fuild">
    <div class="row customer_rating" class="rating">
        <div class="col-lg-3">
            <div class="product-customer-col-1">
                <h4>@lang('Rating')</h4>

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
                    <p>({{$count_rank}} @lang('Review'))</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="product-customer-col-2">
                <div class="side">
                    <div class="left">5 @lang('Star')</div>
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
                    <div class="left">4 @lang('Star')</div>
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
                    <div class="left">3 @lang('Star')</div>
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
                    <div class="left">2 @lang('Star')</div>
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
                    <div class="left">1 @lang('Star')</div>
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
                <h3>@lang('Share comment')</h3>
                <button class="btn btn-default"><a href="#cmt">@lang('Write
                        comment')</a> </button>
            </div>
        </div>
    </div>

</div>