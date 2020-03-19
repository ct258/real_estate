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


<small><a href="{{route('real_estate.create')}}" class="tst4 btn btn-success">{{ __('Create') }}
        @lang('real_estate')</a></small><br><br>
<div class="row">
    <div class="col-lg-12">
        <section class="widget">
            <div class="table-responsive-fluid">
                <table class="table table-agile-info">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên dự án</th>
                            <th>Địa chỉ</th>
                            <th>Giá trị (đ)</th>
                            <th>Diện tích (m<sup>2</sup>)</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($real_estate as $item)
                        <tr>
                            <td>{{$item->real_estate_id}}</td>
                            <td>{{substr($item->translation_name,0,27)}}...</td>
                            <td>{{substr($item->translation_address,0,27)}}...</td>
                            <td>{{number_format($item->real_estate_price)}}</td>
                            <td>{{$item->real_estate_acreage}}</td>
                            <td>{{$item->status_name}}</td>
                            <td>
                                <form action="{{ route('real_estate.destroy', $item->real_estate_id) }}" method="post"
                                    class="delete_form">
                                    @csrf
                                    <a href="{{route('single_list',$item->real_estate_id)}}">&nbsp;&nbsp;
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
                        <tr>
                            <td align="center" colspan="10">

                                {{ $real_estate->links() }}
                            </td>
                        </tr>

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