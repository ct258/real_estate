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
</style>
@endpush
@section('page')
<!-- Page -->

<section class="page-section single-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-1 blog-share">
                <h5>Share</h5>
                <div class="share-links">
                    {{-- <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="pin"><i class="fa fa-thumb-tack"></i></a> --}}
                </div>
            </div>
            <div class="col-md-10 singel-blog-content">
                <img src="{{asset($blog->blog_avatar)}}" alt="">
                <h1>{{$blog->blog_translation_title}}</h1>
                <h4>{!! $blog->blog_translation_content !!}</h4>
                {{-- <div class="blog-tags">
                    <p>Tag:</p>
                    <a href="#">#news,</a>
                    <a href="#">#realestate,</a>
                    <a href="#">#investment,</a>
                    <a href="#"> #price,</a>
                    <a href="#">#market</a>
                </div> --}}
                <h4>{{$blog->staff_name}}</h4>
            </div>

        </div>
    </div>
    </div>
</section>

<!-- Page end -->
@endsection