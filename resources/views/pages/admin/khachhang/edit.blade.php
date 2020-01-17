@extends('layouts.admin')
@section('content')
<h2 class="page-title">Sửa nhân viên <br><br></h2>
<form action="{{route('khachhang/update',$khachhang->kh_id)}}" method="post">
    @csrf
    <div class="row">

        <div class="col-lg-6">
            <section class="widget">
                <div class="container-fluid">
                    <table class="table">
                        <tr>
                            <td><label>Họ tên khách hàng</label><input type="text" name="kh_hoten" size="100%" autofocus
                            class="form-control input-transparent" value="{{$khachhang->kh_hoten}}"><br></td>
                        </tr>
                        <tr>
                            <td><label>Ngày sinh</label><input type="date" name="kh_ngaysinh" size="100%" autofocus
                                    class="form-control input-transparent" value="{{$khachhang->kh_ngaysinh}}"><br></td>
                        </tr>

                        <tr>
                            <td><label>SĐT</label><input type="text" name="kh_sdt"
                                    class="form-control input-transparent" value="{{$khachhang->kh_sdt}}"><br></td>
                        </tr>
                        <tr>
                            <td><label>Đại chỉ</label><input type="text" name="kh_diachi"
                                    class="form-control input-transparent" value="{{$khachhang->kh_diachi}}"><br></td>
                        </tr>
                        
                    </table>
                </div>
            </section>
        </div>
        <div class="col-lg-3">
            <section class="widget">
                <table class="table">
                    <tr>
                        <td><label>CMND</label><input type="text" name="kh_cmnd" 
                                class="form-control input-transparent" value="{{$khachhang->kh_cmnd}}"><br>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Ngày cấp</label><input type="date" name="kh_ngaycap" 
                                class="form-control input-transparent" value="{{$khachhang->kh_ngaycap}}"><br>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Nơi cấp</label><input type="text" name="kh_noicap"
                                class="form-control input-transparent" value="{{$khachhang->kh_noicap}}"><br>
                        </td>
                    </tr>
                </table>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Lưu</button>

            </div>

        </div><a href="{{route('khachhang.index')}}" class="btn btn-default">Trở lại</a>
    </div>

</form>
@endsection