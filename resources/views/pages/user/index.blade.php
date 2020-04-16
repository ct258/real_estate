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