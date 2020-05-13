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

    /* div#Avatar:hover {
    transition: 0.5s!important;
    transform: scale(0.5)!important;
    /* transform: rotate3d(1, 1, 1, 60deg)!important; */
    /* cursor: pointer; */
    }

    */ #avatar:hover {
        transform: scale(1.15);
        transition: 1s;
    }

    .feature-title h5 {
        min-height: 58px;
    }
</style>
@endpush
@section('page')
@include('layouts.user.banner')
@include('layouts.user.filter')

@include('pages.user.index.view_product')
@include('pages.user.index.product')
@include('pages.user.index.blog')
{{-- @include('layouts.user.feature')
@include('layouts.user.blog') --}}



@endsection