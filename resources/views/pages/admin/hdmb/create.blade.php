@extends('layouts.admin')
@section('content')
<h2 class="page-title">Thêm HD Mua Bán <br><br></h2>
<form action="{{route('hdmb.create.submit')}}" method="post">
    @csrf
    <div class="row">

        <div class="col-lg-9">
            <section class="widget">
                <div class="container-fluid">
                    <table class="table">
                        <tr>
                            <td><label>Mã HĐ Mua Bán</label><input type="text" name="hdmb_ma" size="100%" autofocus
                                    class="form-control input-transparent"><br></td>
                        </tr>
                        <tr>
                            <td><label>Ngày ký HĐ</label><input type="date" name="hdmb_ngayki" size="100%" autofocus
                                    class="form-control input-transparent"><br></td>
                        </tr>

                        <tr>
                            <td><label>Nội dung HĐ</label><input type="text" name="hdmb_noidung" size="100%" autofocus
                                    class="form-control input-transparent"><br></td>
                        </tr>
                        <tr>
                            <td><label>Ghi chú</label><input type="text" name="hdmb_ghichu" size="100%" autofocus
                                    class="form-control input-transparent"><br></td>
                        </tr>

            
                    </table>
                </div>
            </section>
        </div>
     
    </div>
    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Lưu</button>

            </div>

        </div><a href="{{route('hdmb.index')}}" class="btn btn-default">Trở lại</a>
    </div>
</form>
@endsection