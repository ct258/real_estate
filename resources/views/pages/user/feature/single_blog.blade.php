@extends('layouts.user')
@section('page')
<!-- Page -->

<section class="page-section single-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-1 blog-share">
                <h5>Share</h5>
                <div class="share-links">
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="pin"><i class="fa fa-thumb-tack"></i></a>
                </div>
            </div>
            <div class="col-md-10 singel-blog-content">
                <img src="{{asset('leramiz/img/blog/single-blog.jpg')}}" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut maximus, nunc sed elementum volutpat,
                    nibh tortor auctor purus, vitae placerat quam dolor ut tellus. Nulla metus elit, mollis non accumsan
                    eget, aliquaman lobortis dui. Nunc non rutrum lacus. Etiam ut hendrerit orci force air usce mollis,
                    eros at pulvinar egestas, diam antis lacus hendrerit nunc, quis interdum nunc elit vel maris. Ut
                    sagittis sagittis lacus id rutrum. Curabitur eleifend placerat nulla, vitae euismod magna imperdiet
                    id. Ut in tellus dignissim, accum augue et, rhoncus justo. Praesent pellentesque metus nec interdum
                    molestie. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque facilisis mi varius,
                    rutrum nulla ut, porttitor quam. Nunc sed nunc et lorem malesuada aliquam at imperdiet pellentesque
                    sollicitudin. Sed tempor placerat pellentesque.</p>
                <p>Praesent at mattis massa. Quisque mattis fermentum risus. Sed utca fringilla urna, eget feugiat quam.
                    Aenean elementum arcu eget diam laoreet egestas. Etiam iaculis magna ut urna accumsan fermentum.
                    Etiam posuere sed tellus in star sollicitudin. Donec aliquaman gravida risus, sit amet tempor felis
                    ullamcorper vel. Sed sit amet commodo ronan ligula, eu porta libero. Proin auctor lectus nec sapien
                    viverra, eu accusan est feugiat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi
                    ut rutrum lectus. Pellentesque sit amet quam vitae denim elementum sagittis. Mauris tempus nunc
                    orci, porttitor ullamcorper tellus venenatis vitae. Nam dictum lectus massa, rocket dapibus erat
                    dignissim nec. Nullam tincidunt orci gravida vulputate commodo.</p>
                <blockquote>
                    To be successful in real estate, you must always and consistently put your clients' best interests
                    first. When you do, your personal needs will be realized beyond your greatest expectations.
                </blockquote>
                <p>Vestibulum condimentum purus eu nisl egestas, ut vulputate nisl mattis. Praesent vulputate id ligula
                    ut tristique. Quisque eu eleifend ex, nectora condimentum massa. Integer in ultrices ligula, non
                    faucibus ipsum. Phasellus quam odio, faucibus at erat vel, fermentum tristique ex. Praesent
                    sollicitudin at turpis vitae molestie. Integer ut dapibus mauris. Donec tincidunt sem non odio
                    congue, in pharetra magna eleifend. Sed ultricies ipsum nec sodales condimentum. Cras at urna
                    interdum mi aliquet feugiat quis eget purus. Curabitur feugiat laoreet ornare. Etiam tincidunt
                    semper ex. Sed luctus tellus feugiat ligula luctus, eget imperdiet elit malesuada. </p>
                <p>Suspendisse vehicula neque non mi consequat laoreet. Aenean at mauris hendrerit ante commodo
                    dignissim et eu dolor. Proin non ipsum starlord scelerisque, maximus erat eget, rutrum ex. Vivamus
                    pulvinar ornare egestas. Suspendisse finibus eros eget purus vulputate, sit amet ornare ipsum
                    sollicitudin. Praesent ornare lacinia elementum. Morbi vitae orci quis orci aliquam porta. Proin
                    eget gamora viverra lacus, in tincidunt leo. In id urna pharetra tellus consectetur condimentum.
                    Mauris pulvinar orci et dolor tristique mollis. Praesent auctor ut est congue dictum.</p>
                <div class="blog-tags">
                    <p>Tag:</p>
                    <a href="#">#news,</a>
                    <a href="#">#realestate,</a>
                    <a href="#">#investment,</a>
                    <a href="#"> #price,</a>
                    <a href="#">#market</a>
                </div>
                <div class="post-author">
                    <div class="pa-thumb set-bg" data-setbg="{{asset('leramiz/img/blog/author.jpg')}}"></div>
                    <div class="pa-content">
                        <h4>AMANDA SEYFIRED</h4>
                        <p>Mauris lectus justo, tempor ac auctor at, congue id erat. Pellentesque et massa odio. Fusce
                            vel fermentum tortor, nec gravida ligula. Vivamus at malesuada tortor, in posuere ex.</p>
                    </div>
                </div>
                <div class="comment-warp">
                    <h4 class="comment-title">3 Comments</h4>
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
        </div>
    </div>
</section>

<!-- Page end -->
@endsection