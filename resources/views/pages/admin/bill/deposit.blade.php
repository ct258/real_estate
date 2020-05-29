@extends('layouts.admin')

@section('content')
<style>
    .v-middle {
        padding-left: 25px;
    }

    .error {
        color: red;
    }

    .table>thead>tr>th,
    .table>tbody>tr>th,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>tbody>tr>td,
    .table>tfoot>tr>td {
        color: #0000009e;

    }
</style>
<div class="container-fuild">
    <div class="row">
        <div class="col-sm-12">
            @if (Session::has('mess'))
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{Session::get('mess')}}</strong>
            </div>
            {{Session::put('mess',null)}}
            @endif
        </div>
    </div>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Bất động sản chờ xử lý
            </div>
            <br>

            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tên bất động sản</th>
                            {{-- <th style="width:100px;">Chức năng</th> --}}
                        </tr>
                        @foreach ($cart as $val)
                        <tr>
                            <td><a href="{{route('bill.show',$val->cart_id)}}">{{$val->cart_id}}</a> </td>
                            <td>{{$text[$val->cart_id]}}</td>
                            {{-- <td>{{$val->code_type_name}}</td> --}}

                            {{-- <td>
                                <a href="{{route('single_list',$val->real_estate_id)}}"> <i
                                class="fa fa-info"></i></a>&nbsp; &nbsp; &nbsp;
                            <a href="" style="border: none;background-color: Transparent;color: red;"><i
                                    class="fa fa-trash-o"></i></a>
                            </td> --}}
                        </tr>
                        @endforeach
                    </thead>
                </table>
                <footer class="panel-footer">
                    <div class="row">

                        <div class="col-sm-5 ">
                        </div>
                        <div class="col-sm-7 text-right text-center-xs">
                            <ul class="pagination pagination-sm m-t-none m-b-none">
                                <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                                <li><a href="">1</a></li>
                                <li><a href="">2</a></li>
                                <li><a href="">3</a></li>
                                <li><a href="">4</a></li>
                                <li><a href=""><i class="fa fa-chevron-right"></i></a>

                                </li>
                            </ul>
                        </div>
                    </div>
                </footer>
            </div>
            @endsection