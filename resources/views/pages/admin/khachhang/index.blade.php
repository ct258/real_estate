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
<h2 class="page-title">Khách hàng <br><br></h2>
<small><a href="{{route('khachhang.create')}}" class="tst4 btn btn-success">Thêm</a></small><br><br>
<div class="row">
    <div class="col-lg-12">
        <section class="widget">
            <div class="table-responsive-fluid">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Họ tên khách hàng</th>
                            <th>Ngày sinh</th>
                            <th>SĐT</th>
                            <th>Địa chỉ</th>
                            <th>CMND</th>
                            <th>Ngày cấp</th>
                            <th>Nơi cấp</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($khachhang as $item)
                        <tr>
                            <td>{{$item->kh_id}}</td>
                            <td>{{$item->kh_hoten}}</td>
                            <td>{{$item->kh_ngaysinh}}</td>
                            <td>{{$item->kh_diachi}}</td>
                            <td>{{$item->kh_cmnd}}</td>
                            <td>{{$item->kh_sdt}}</td>
                            <td>{{$item->kh_ngaycap}}</td>
                            <td>{{$item->kh_noicap}}</td>
                            <td>
                                <form action="{{ route('khachhang.destroy', $item->kh_id) }}" method="post"
                                    class="delete_form">
                                    @csrf
                                    <a href="{{route('khachhang.show',$item->kh_id)}}">
                                        <i class="fa fa-info" style="padding: 0px 7px;"></i>
                                    </a>
                                    <a href="{{route('khachhang.edit',$item->kh_id)}}">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
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
@endsection