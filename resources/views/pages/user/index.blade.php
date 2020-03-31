@extends('layouts.user')
@section('page')
@include('layouts.user.banner')
@include('layouts.user.filter')

@include('pages.user.page.view_product')
@include('layouts.user.feature')
@include('layouts.user.blog')



@endsection