@extends('layouts.admin')
@section('content')
<h2 class="page-title">Sửa nhân viên <br><br></h2>
<form action="{{route('nhanvien/update',$nhanvien->nv_id)}}" method="post">
    @csrf
    <div class="row">

        <div class="col-lg-9">
            <section class="widget">
                <div class="container-fluid">
                    <table class="table">
                        <tr>
                            <td><label>Mã nhân viên</label><input type="text" name="nv_ma" size="100%" autofocus
                                    class="form-control input-transparent" value="{{$nhanvien->nv_id}}"><br></td>
                        </tr>
                        <tr>
                            <td><label>Tên nhân viên</label><input type="text" name="nv_ten" size="100%" autofocus
                                    class="form-control input-transparent" value="{{$nhanvien->nv_ten}}"><br></td>
                        </tr>

                        <tr>
                            <td><label>Ngày sinh</label><input type="date" name="nv_ngaysinh"
                                    class="form-control input-transparent" value="{{$nhanvien->nv_ngaysinh}}"><br></td>
                        </tr>

                        <tr>
                            <td><label>Giới tính</label><br>
                                <input type="radio" name="nv_gioitinh" id="" value="1" @if($nhanvien->nv_gioitinh=='1')
                                checked @endif>Nam <br>
                                <input type="radio" name="nv_gioitinh" id="" value="2" @if($nhanvien->nv_gioitinh=='2')
                                checked @endif>Nữ
                            </td>
                        </tr>




                    </table>
                </div>
            </section>
        </div>
        <div class="col-lg-3">
            <section class="widget">
                <table class="table">
                    <tr>
                        <td><label>SDT</label><input type="text" name="nv_sdt" min="0" step="500"
                                class="form-control input-transparent" value="{{$nhanvien->nv_sdt}}"><br>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Địa chỉ</label><input type="text" name="nv_diachi"
                                class="form-control input-transparent" value="{{$nhanvien->nv_diachi}}"><br>
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

        </div><a href="{{route('nhanvien.index')}}" class="btn btn-default">Trở lại</a>
    </div>

</form>
@endsection