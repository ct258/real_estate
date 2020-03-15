@extends('layouts.admin')
@section('content')
<h2 class="page-title">Sửa Hợp Đồng đặt cọc <br><br></h2>
<form action="{{route('hddc/update',$hddc->hddc_id)}}" method="post">
    @csrf
    <div class="row">

        <div class="col-lg-9">
            <section class="widget">
                <div class="container-fluid">
                    <table class="table">
                        <tr>
                            <td><label>Mã HĐ đặt cọc</label><input type="text" name="hddc_ma" size="100%" autofocus
                                    class="form-control input-transparent" value="{{$hddc->hddc_ma}}"><br></td>
                        </tr>
                        <tr>
                            <td><label>Tiền cọc</label><input type="text" name="hddc_tiencoc" size="100%" autofocus
                                    class="form-control input-transparent" value="{{$hddc->hddc_tiencoc}}"><br></td>
                        </tr>

                        <tr>
                            <td><label>Ngày đặt cọc</label><input type="date" name="hddc_ngaydc"
                                    class="form-control input-transparent" value="{{$hddc->hddc_ngaydc}}"><br></td>
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

        </div><a href="{{route('hddc.index')}}" class="btn btn-default">Trở lại</a>
    </div>

</form>
@endsection