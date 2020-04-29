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

    .pagina {
        margin-left: auto;
        margin-right: auto;
    }
</style>
@endpush
@section('page')
@if ($blog->isNotempty())
<!-- feature section -->
<section class="feature-section spad">
    <div class="section-title text-center">
        <h3> @lang('Post new') </h3>
    </div>
    <div class="container frame">
        <div class="row">
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
                            <span>{{$item->staff_name}} - {{$day_blog[$item->blog_id]}}</span>
                        </div>
                    </div>

                </a>
            </div>

            @endforeach
            <div class="pagina"> {{$blog->links()}}</div>
        </div>
    </div>
</section>
<!-- feature section end -->
@endif

@endsection