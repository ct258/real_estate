@if ($blog->isNotempty())
<!-- feature section -->
<section class="feature-section spad">
    <div class="section-title text-center">
        <h3>@lang('Post new')</h3>
    </div>
    <div class="container frame">
        <div class="row ">
            @foreach ($blog as $item)

            <div class="col-lg-12 blog">
                <a href="{{route('single_blog',$item->blog_id)}}">
                    <div class="row">
                        <div class="col-lg-3 image"><img class="img-lazy" src="{{asset($item->blog_avatar)}}"
                                data-src="{{asset($item->blog_avatar)}}">
                        </div>
                        <div class="col-lg-8 intro">
                            <h4>{{$item->blog_translation_title}}</h4>
                            <p>{{$item->blog_translation_intro}}...</p>
                            <span>{{$day_blog[$item->blog_id]}}</span>
                        </div>
                    </div>

                </a>
            </div>

            @endforeach

        </div>
    </div>
</section>
<!-- feature section end -->
@endif