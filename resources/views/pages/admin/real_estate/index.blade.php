@extends('layouts.admin')
@section('content')
@if($message = Session::get('success'))
<div
    class="messenger-message message alert success message-success alert-success messenger-will-hide-after messenger-will-hide-on-navigate">
    <div class="messenger-message-inner">{{$message}}</div>
    <div class="messenger-spinner">
        <span class="messenger-spinner-side messenger-spinner-side-left">
            <span class="messenger-spinner-fill"></span>
        </span>
        <span class="messenger-spinner-side messenger-spinner-side-right">
            <span class="messenger-spinner-fill"></span>
        </span>
    </div>
</div>
@endif
<h2 class="page-title">Dự án <br><br></h2>

{{-- <section class="widget">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31430.62811272662!2d105.75139444973242!3d10.031005900889205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0883d0dac6b15%3A0xf6ae5b1bd18625!2zVHLGsOG7nW5nIMSQ4bqhaSBI4buNYyBD4bqnbiBUaMah!5e0!3m2!1svi!2s!4v1580546072949!5m2!1svi!2s"
        width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</section> --}}
<section class="widget">
    <iframe src="{{URL::to('/')}}/bando" width="100%" height="300"></iframe>
</section>





<small><a href="{{route('real_estate.create')}}" class="tst4 btn btn-success">{{ __('Create') }}
        @lang('real_estate')</a></small><br><br>
<div class="row">
    <div class="col-lg-12">
        <section class="widget">
            <div class="table-responsive-fluid">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên dự án</th>
                            <th>Giá trị</th>
                            <th>Địa chỉ</th>
                            <th>Diện tích</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($real_estate as $item)
                        <tr>
                            <td>{{$item->real_estate_id}}</td>
                            <td>{{$item->real_estate_name}}</td>
                            <td>{{$item->real_estate_price}}</td>
                            <td>{{$item->real_estate_address}}</td>
                            <td>{{$item->real_estate_acreage}}</td>
                            <td>{{$item->real_estate_status}}</td>
                            <td>
                                <form action="{{ route('real_estate.destroy', $item->real_estate_id) }}" method="post"
                                    class="delete_form">
                                    @csrf
                                    <a href="{{route('real_estate.show',$item->real_estate_id)}}">&nbsp;&nbsp;
                                        <i class="fa fa-info"></i></a>
                                    <a href="{{route('real_estate.edit',$item->real_estate_id)}}">
                                        <span class="glyphicon glyphicon-edit"></span></a>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <button type="submit"
                                        style="border: none;background-color: Transparent;color: red;">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>

                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
<section class="widget">
    <table>
        <tr>
            <td>số người đang online: </td>
            <td>{{ $query_result_person[0]}}</td>
        </tr>
        <tr>
            <td>Số người online hôm nay: </td>
            <td>{{ $query_result_person[1]}}</td>
        </tr>
        <tr>
            <td>Lịch sử tổng số lượt truy cập: </td>
            <td>{{ $query_result_person[2]}}</td>
        </tr>
    </table>
</section>
@endsection