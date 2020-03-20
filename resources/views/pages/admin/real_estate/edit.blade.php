@extends('layouts.admin')
@section('content')


<h2 class="page-title">Thêm dự án <br><br></h2>
<form action="{{route('real_estate/update',$real_estate->real_estate_id)}}" method="post">
    @csrf
    <div class="row">

        <div class="col-lg-9">
            <section class="widget">
                <div class="container-fluid">
                    <table class="table">
                        <tr>
                            <td><label>Tên dự án</label><input type="text" name="name" size="100%"
                                    class="form-control input-transparent"
                                    value="{{$real_estate->real_estate_name}}"><br></td>
                        </tr>

                        <tr>
                            <td><label>Địa chỉ</label><input type="text" name="address"
                                    class="form-control input-transparent"
                                    value="{{$real_estate->real_estate_address}}"><br></td>
                        </tr>

                        <tr>
                            <td><label>Mô tả</label><textarea name="description" cols="30" rows="5"
                                    class="form-control input-transparent">{{$real_estate->real_estate_description}}</textarea>
                            </td>
                        </tr>




                    </table>
                    {{-- <button type="submit" class="btn btn-success btn-block">Lưu</button></td> --}}
                </div>
            </section>
        </div>
        <div class="col-lg-3">
            <section class="widget">
                <table class="table">
                    <tr>
                        <td><label>Giá dự án</label><input type="number" name="price" min="0"
                                class="form-control input-transparent" value="{{$real_estate->real_estate_price}}"><br>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Diện tích</label><input type="text" name="acreage"
                                class="form-control input-transparent"
                                value="{{$real_estate->real_estate_acreage}}"><br>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Trạng thái</label><input type="text" name="status"
                                class="form-control input-transparent" value="{{$real_estate->real_estate_status}}"><br>
                        </td>
                    </tr>
                </table>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Cập nhật</button>

            </div>

        </div><a href="{{route('real_estate.index')}}" class="btn btn-default">Trở lại</a>
    </div>
</form>

@endsection