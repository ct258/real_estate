@extends('layouts.user')
@push('css')
<style>
    body,
    p {
        font-family: Verdana, Geneva, sans-serif;
        font-size: 14px;
        line-height: 21px;
    }

    p {
        font-family: "Helvetica Neue",
            Helvetica,
            Arial,
            Helmet,
            Freesans,
            sans-serif !important;
    }

    .page-section {
        margin-top: 100px;
    }
</style>
@endpush
@section('page')
<!-- Page -->

<section class="page-section single-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-1 blog-share">
                <div class="share-links">
                    {{-- <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="pin"><i class="fa fa-thumb-tack"></i></a> --}}
                </div>
            </div>
            <div class="col-md-10 singel-blog-content">
                {{-- <img src="{{asset($blog->blog_avatar)}}" alt=""> --}}
                <h1>{{$blog->blog_translation_title}}</h1>

                {{-- <div class="fb-like" data-href="{{url('http://batdongsancantho.ml/real_estate/blog/',$blog->blog_id)}}"
                data-width="" data-layout="button" data-action="like" data-size="small" data-share="true"></div> --}}
            <div class="fb-like" data-href="{{url('http://batdongsancantho.ml/real_estate/')}}" data-width=""
                data-layout="button" data-action="like" data-size="small" data-share="true"></div>

            <p>{{$blog->staff_name}} - {{$day_blog}}</p>

            <h4>{!! $blog->blog_translation_content !!}</h4>
            <h4>{{$blog->staff_name}}</h4>
            <div class="fb-like" data-href="" data-width="" data-layout="button" data-action="like" data-size="small"
                data-share="true"></div>

        </div>
    </div>
    </div>
    </div>
</section>

<!-- Page end -->
@endsection
@push('script')

@endpush