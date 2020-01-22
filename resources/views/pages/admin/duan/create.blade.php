@extends('layouts.admin')
@section('content')
<h2 class="page-title">Thêm dự án <br><br></h2>
<form action="{{route('duan.create.submit')}}" method="post">
    @csrf
    <div class="row">

        <div class="col-lg-9">
            <section class="widget">
                <div class="container-fluid">
                    <table class="table">
                        <tr>
                            <td><label>Tên dự án</label><input type="text" name="name" size="100%" autofocus
                                    class="form-control input-transparent"><br></td>
                        </tr>

                        <tr>
                            <td><label>Địa chỉ</label><input type="text" name="address"
                                    class="form-control input-transparent"><br></td>
                        </tr>

                        <tr>
                            <td><label>Mô tả</label><textarea name="description" cols="30"
                                    style="max-width:100%;height: 235px;"
                                    class="form-control input-transparent"></textarea>
                            </td>
                        </tr>
                        <br>




                    </table>
                </div>
            </section>
        </div>
        <div class="col-lg-3">
            <section class="widget">
                <div class="container-fluid">
                    <table class="table">
                        <tr>
                            <td><label>Giá dự án</label><input type="number" name="price" min="0" step="500"
                                    class="form-control input-transparent"><br>
                            </td>
                        </tr>

                        <tr>
                            <td><label>Diện tích</label><input type="text" name="acreage"
                                    class="form-control input-transparent"><br>
                            </td>
                        </tr>

                        <tr>
                            <td><label>Trạng thái</label><input type="text" name="status"
                                    class="form-control input-transparent"><br></td>
                        </tr>
                        <tr>

                            <td>
                                <select name="tinhthanhpho" id="tinhthanhpho" class="form-control form-control-sm">
                                    <option value="tp_id" selected>-- Chọn Tỉnh/TP --</option>
                                    @foreach ($ttp as $item)
                                    <option value="{{$item->ttp_id}}">{{$item->ttp_ten}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select name="quanhuyen" id="quanhuyen" class="form-control form-control-sm">
                                    <option value="qh_id" selected>-- Chọn Quận/Huyện --</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select name="phuongxa" id="phuongxa" class="form-control form-control-sm">
                                    <option value="px_id" selected>-- Chọn Phường/Xã --</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select name="duongpho" id="duongpho" class="form-control form-control-sm">
                                    <option value="dp_id" selected>-- Chọn Đường/Phố --</option>
                                </select>
                            </td>
                        </tr>
                        <br>




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

        </div><a href="{{route('duan.index')}}" class="btn btn-default">Trở lại</a>
    </div>
</form>
{{-- @endsection --}}
{{-- @section('script') --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        //lấy quận huyện theo tỉnh thành phố
        $("#tinhthanhpho").change(function(){
            var ttp_id = $(this).val();
            $.get("../duan/quanhuyen/"+ttp_id, function(data){
                $("#quanhuyen").html(data);
            });
        });
        //lấy đường phố theo tỉnh
        $("#tinhthanhpho").change(function(){
            var ttp_id = $(this).val();
            $.get("../duan/duongpho/"+ttp_id, function(data){
                $("#duongpho").html(data);
            });
        });
        //lấy phường xã theo tỉnh,huyện
        $("#quanhuyen").change(function(){
            var ttp_id = "";
            var qh_id = "";
            var ttp_id = $("#tinhthanhpho").val();
            var qh_id = $("#quanhuyen").val();
            $.get("../duan/phuongxa/"+ttp_id+'/'+qh_id, function(data){
                $("#phuongxa").html(data);
            });
        });
        //lấy đường phố theo tỉnh,huyện
        $("#quanhuyen").change(function(){
            var ttp_id = $("#tinhthanhpho").val();
            var qh_id = $("#quanhuyen").val();
            $.get("../duan/duongpho/"+ttp_id+'/'+qh_id, function(data){
                $("#duongpho").html(data);
            });
        });

    });
    //reset tất cả về ban đầu khi thay đổi tỉnh
    $("#tinhthanhpho").change(function(){
        var ttp_id = $("#tinhthanhpho").val();
        if(ttp_id=='tp_id'){
            var data1="<option value='0'>-- Chọn Quận/Huyện --</option>";
            var data2="<option value='0'>-- Chọn Phường/Xã --</option>";
            var data3="<option value='0'>-- Chọn Đường/Phố --</option>";
            $("#quanhuyen").html(data1);
            $("#phuongxa").html(data2);
            $("#duongpho").html(data3);
        }
    });
    //reset tất cả về ban đầu khi thay đổi tỉnh
    $("#quanhuyen").change(function(){
        var px_id = $("#phuongxa").val();
        var ttp_id = $("#tinhthanhpho").val();
            
        if(px_id=='px_id' && ttp_id!='tp_id'){
            var data2="<option value='0'>-- Chọn Phường/Xã --</option>";
            $("#phuongxa").html(data2);
            $.get("../duan/duongpho/"+ttp_id, function(data){
                $("#duongpho").html(data);
            });
        }
        else{
            var data2="<option value='0'>-- Chọn Phường/Xã --</option>";
            var data3="<option value='0'>-- Chọn Đường/Phố --</option>";
            $("#phuongxa").html(data2);
            $("#duongpho").html(data3);
        }
    });

</script>
@endsection