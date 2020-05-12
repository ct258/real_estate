<div class="comment-warp">
    <ul class="comment-list">
        {{-- {{dd($evaluate)}} --}}

        @foreach ($evaluate as $item)

        @if($item->evaluate_reply==null)
        <li>
            <div class="comment">
                <div class="comment-avator set-bg" data-setbg="{{asset('leramiz/img/blog/comment/3.jpg')}}">
                </div>
                <div class="comment-content">
                    <h5>{{$item->evaluate_title}}</h5>
                    <h5>{{$item->customer_name}}<span>{{$item->updated_at->format('d-m-Y')}}</span>
                    </h5>
                    <p>{{$item->evaluate_content}}</p>
                    <a href="{{ route('delete_cmt', ['idcmt'=>$item->evaluate_id, 'idsp'=>$item->real_estate_id]) }} "
                        id="delete">@lang('Delete')</a>
                    <a data-toggle="modal" data-target="#exampleModal" class="c-btn" id="report"
                        exampleModal>@lang('Report')</a>
                    {{-- <button type="button" class="c-btn showReply">Trả lời</button> --}}
                    <a data-toggle="modal" data-target="#reply" class="c-btn showForm">@lang('Reply')</a>
                    <div class="formReply" style="display: none; margin-top: 10px;">
                        <form class="comment-form"
                            action="{{ route('reply_cmt', ['idsp'=> $real_id,'idrep'=>$item->evaluate_id]) }}"
                            method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="content" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <ul>
                @foreach($evaluate as $val)
                @if($item->evaluate_id == $val->evaluate_reply)
                <li>
                    <div class="comment subreply" style="
                                            margin-left: 105px;
                                            margin-bottom: 57px;
                                        ">
                        <div class="comment-avator set-bg" data-setbg="{{asset('leramiz/img/blog/comment/3.jpg')}}">
                        </div>
                        <div class="comment-content">
                            <h5>{{$val->customer_name}}<span>{{$item->updated_at->format('d-m-Y')}}</span>
                            </h5>
                            <p>{{$val->evaluate_content}}</p>
                        </div>
                    </div>
                </li>
                @endif
                @endforeach

            </ul>
        </li>
        @endif

        @endforeach
    </ul>




    <div class="comment-form-warp " id="cmt">
        {{-- Auth::gruad('ten') --}}
        <h4 class="comment-title">@lang('Comment')</h4>
        <form class="comment-form" action="{{ route('write_cmt', ['idsp'=> $real_id]) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-12">


                    <h3 class="sl-sp-title" style="margin-top: 14px">@lang('Rating
                        product')</h3>
                    <div id="rating">
                        <input type="radio" id="star5" name="rating" value="5" />
                        <label class="full" for="star5"></label>

                        <input type="radio" id="star4" name="rating" value="4" />
                        <label class="full" for="star4"></label>

                        <input type="radio" id="star3" name="rating" value="3" />
                        <label class="full" for="star3"></label>

                        <input type="radio" id="star2" name="rating" value="2" />
                        <label class="full" for="star2"></label>

                        <input type="radio" id="star1" name="rating" value="1" />
                        <label class="full" for="star1"></label>
                    </div>

                </div>
                {{-- <div class="col-md-6">
                    <input type="text" name="name_customer" placeholder="Your Name">
                </div> --}}
                <div class="col-md-6">
                    <input type="text" name="title" placeholder="@lang('Title')....">
                </div>
                <div class="col-lg-9">
                    <textarea placeholder="@lang('Content comment')...." name="content"></textarea>

                </div>

                <div class="col-sm-12">
                    <button class="site-btn">@lang('Send')</button>
                </div>
            </div>
        </form>
    </div>
</div>