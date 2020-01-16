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
<h2 class="page-title">Nhân viên <br><br></h2>
<small><a href="{{route('nhanvien.create')}}" class="tst4 btn btn-success">Thêm</a></small><br><br>
<div class="row">
    <div class="col-lg-12">
        <section class="widget">
            <div class="table-responsive-fluid">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã nhân viên</th>
                            <th>Hình đại diện</th>
                            <th>Tên nhân viên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>SDT</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nhanvien as $item)
                        <tr>
                            <td>{{$item->nv_id}}</td>
                            <td>{{$item->nv_ma}}</td>
                            <td></td>
                            <td>{{$item->nv_ten}}</td>
                            <td>{{$item->nv_ngaysinh}}</td>
                            <td>{{$item->nv_gioitinh}}</td>
                            <td>{{$item->nv_sdt}}</td>
                            <td>{{$item->nv_diachi}}</td>
                            <td></td>
                            <td>
                                <form action="{{ route('nhanvien.destroy', $item->nv_id) }}" method="post"
                                    class="delete_form">
                                    @csrf
                                    <a href="{{route('nhanvien.show',$item->nv_id)}}">&nbsp;&nbsp;
                                        <i class="fa fa-info"></i></a>
                                    <a href="{{route('nhanvien.edit',$item->nv_id)}}">
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
@endsection