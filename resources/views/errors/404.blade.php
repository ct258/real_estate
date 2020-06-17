@extends('layouts.user')
@push('css')
<style>
    .agileits-timer {
        margin-top: 130px
    }

    h1 {
        text-align: center;
        color: #30caa0;
        font-size: 17em !important;
        margin-bottom: 0em;
        text-transform: uppercase;
        letter-spacing: 4px;
        font-family: 'Josefin Sans', sans-serif;
    }

    /* .newsletter input[type="submit"]:hover {
        background: none;
        border: solid 1px #FFFFFF;
        color: #FFFFFF;
    } */

    .home {
        color: #000;
        text-transform: uppercase;
        font-size: .9em;
        font-weight: 500;
        border: none;
        background: #30caa0;
        border: solid 1px #30caa0;
        padding: .5em 1em;
        outline: none;
        display: inline-block;
        vertical-align: middle;
        cursor: pointer;
        transition: 0.5s all;
        -webkit-transition: 0.5s all;
        -moz-transition: 0.5s all;
        -o-transition: 0.5s all;
        -ms-transition: 0.5s all;
        -webkit-appearance: none;
    }

    .home:hover {
        text-decoration: none;
    }
</style>
@endpush
@section('page')
<!--main content start-->
<!--timer-->
<div class="agileits-timer">
    <h1>404</h1>
    <center>

        <a href="javascript: history.go(-1)" class="home">go home</a>
    </center>
</div>
<!--//timer-->
@endsection