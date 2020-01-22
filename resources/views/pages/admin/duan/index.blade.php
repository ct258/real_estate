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





<small><a href="{{route('duan.create')}}" class="tst4 btn btn-success">{{ __('Create') }}
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
                        @foreach ($duan as $item)
                        <tr>
                            <td>{{$item->da_id}}</td>
                            <td>{{$item->da_ten}}</td>
                            <td>{{$item->da_gia}}</td>
                            <td>{{$item->da_diachi}}</td>
                            <td>{{$item->da_dientich}}</td>
                            <td>{{$item->da_trangthai}}</td>
                            <td>
                                <form action="{{ route('duan.destroy', $item->da_id) }}" method="post"
                                    class="delete_form">
                                    @csrf
                                    <a href="{{route('duan.show',$item->da_id)}}">&nbsp;&nbsp;
                                        <i class="fa fa-info"></i></a>
                                    <a href="{{route('duan.edit',$item->da_id)}}">
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