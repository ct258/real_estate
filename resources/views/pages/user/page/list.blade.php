@extends('layouts.user')

@push('css')

<style>
    .page-section {
        margin: 0 50px;
    }

    .filter-form input {
        width: 100% !important;
    }

    .filter-form select {
        width: 100% !important;
    }

    .search-form td {
        padding: 5px 0;
    }

    .filter-form .fs-submit {
        width: 100%;
    }

    #paginationa {
        display: contents;
    }

    #search-form {
        width: 100%;
    }

    .left {
        margin: 10px 0;
    }

    button.btn.btn-primary.mn {
        width: 86px;
        height: 30px;
        padding: 1px;
        font-size: 14px;
        margin-left: 75px;
    }

    button.btn.btn-primary.mn:hover {
        color: aquamarine;
    }
</style>
@endpush

@section('page')

<!-- Page -->
<section class="page-section">
    <div class="container-fruid">
        <div class="row">
            {{-- main page --}}
            <div class="col-lg-9">
                <div class="row">
                    <div id="paginationa" class="paginationa">
                        @include('pages.user.page.list_ajax')
                    </div>
                </div>
                {{ $real_estate->links() }}
            </div>

            {{-- end main page --}}
            {{-- search form --}}
            <div class="col-lg-3">
                <form class="filter-form" action="{{route('list.sort')}}" method="POST">
                    @csrf

                    <div class="left">
                        <td><input type="text" name="search" placeholder="Nhập địa điểm.."><br>
                        </td>
                    </div>
                    <div class="left">
                        <select name="form" id="form">
                            <option value="">-- Chọn loại tin rao --</option>
                            @foreach ($form as $item)
                            <option value="{{$item->form_id}}">{{$item->form_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="left">
                        <select name="type" id="type">
                            <option value="">-- Chọn loại nhà đất --</option>
                        </select>
                    </div>
                    <div class="left">
                        <select name="acreage" id="acreage">
                            <option value="">-- Chọn Diện tích --</option>
                            <option value=""><button type="text" name="" id=""></button></option>
                        </select>
                    </div>
                    <div class="left">
                        <select name="price" id="price">
                            <option value="">-- Chọn Giá --</option>
                        </select>
                    </div>
                    <div id="demo" class="collapse">
                        <div class="left">
                            <select name="province" id="province">
                                <option value="">-- Chọn Tỉnh/Thành phố --</option>
                                @foreach ($province as $item)
                                <option value="{{$item->province_id}}">{{$item->province_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="left">
                            <select name="district" id="district">
                                <option value="">-- Chọn Quận/Huyện --</option>
                            </select>
                        </div>
                        <div class="left">
                            <select name="ward" id="ward">
                                <option value="">-- Chọn Phường/Xã --</option>
                            </select>
                        </div>
                        <div class="left">
                            <select name="street" id="street">
                                <option value="">-- Chọn Đường/Phố --</option>
                            </select>
                        </div>
                        <div class="left">
                            <select name="bedroom" id="bedroom">
                                <option value="">-- Chọn số phòng ngủ --</option>
                            </select>
                        </div>
                        <div class="left">
                            <select name="direction" id="direction">
                                <option value="">-- Chọn hướng nhà --</option>
                                {{-- @foreach ($direction as $item)
                                    <option value="{{$item->direction_id}}">{{$item->direction_name}}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <div class="left">
                        <button type="button" class="btn btn-primary mn" data-toggle="collapse" data-target="#demo">Xem
                            Thêm</button>

                    </div>

                    <div class="left">
                        <button class="btn btn-primary mn">Tìm kiếm</button>
                    </div>

                </form>
            </div>
            {{-- end search form --}}


        </div>


        {{-- <div class="site-pagination">
            </div> --}}

    </div>
</section>

@endsection


@push('script')
<script>
    $(document).ready(function () {
            //lấy đơn vị
            // $("#form").change(function(){
            //     var form_id = $(this).val();
            //     $.get("./unit/"+form_id, function(data){
            //         $("#unit").html(data);
            //     });
            // });
            
            //lấy loại bất động sản
            $("#form").change(function(){
                var form_id = $(this).val();
                $.get("./type/"+form_id, function(data){
                    $("#type").html(data);
                });
            });
            //lấy quận huyện theo tỉnh thành phố
            $("#province").change(function(){
                var province_id = $(this).val();
                $.get("./district/"+province_id, function(data){
                    $("#district").html(data);
                });
            });
            //lấy đường phố theo tỉnh
            $("#province").change(function(){
                var province_id = $(this).val();
                $.get("./street/"+province_id, function(data){
                    $("#street").html(data);
                });
            });
            //lấy phường xã theo tỉnh,huyện
            $("#district").change(function(){
                var province_id = "";
                var district_id = "";
                var province_id = $("#province").val();
                var district_id = $("#district").val();
                $.get("./ward/"+province_id+'/'+district_id, function(data){
                    $("#ward").html(data);
                });
            });
            //lấy đường phố theo tỉnh,huyện
            $("#district").change(function(){
                var province_id = $("#province").val();
                var district_id = $("#district").val();
                $.get("./street/"+province_id+'/'+district_id, function(data){
                    $("#street").html(data);
                });
            });

        
            //reset tất cả về ban đầu khi thay đổi tỉnh
            $("#province").change(function(){
                var province_id = $("#province").val();
                if(province_id=='province_id'){
                    var data1="<option value='0'>-- Chọn Quận/Huyện --</option>";
                    var data2="<option value='0'>-- Chọn Phường/Xã --</option>";
                    var data3="<option value='0'>-- Chọn Đường/Phố --</option>";
                    $("#district").html(data1);
                    $("#ward").html(data2);
                    $("#street").html(data3);
                }
            });
            //reset tất cả về ban đầu khi thay đổi tỉnh
            $("#district").change(function(){
                var ward_id = $("#ward").val();
                var province_id = $("#province").val();
                    
                if(ward_id=='' && province_id!=''){
                    var data2="<option value='0'>-- Chọn Phường/Xã --</option>";
                    $("#ward").html(data2);
                    $.get("./street/"+province_id, function(data){
                        $("#street").html(data);
                    });
                }
                else{
                    var data2="<option value='0'>-- Chọn Phường/Xã --</option>";
                    var data3="<option value='0'>-- Chọn Đường/Phố --</option>";
                    $("#ward").html(data2);
                    $("#street").html(data3);
                }
            });
            //lấy giá
            $("#form").change(function(){
                var form_id = $(this).val();
                $.get("./price/"+form_id, function(data){
                    $("#price").html(data);
                });
            });
            //lấy diện tích
            // $("#form").change(function(){
            //     var form_id = $(this).val();
            //     $.get("./acreage/"+form_id, function(data){
            //         $("#acreage").html(data);
            //     });
            // });
        });
</script>
<script type="text/javascript">
    $('#header-search').on('keyup', function() {
            var search = $(this).serialize();
            if ($(this).find('.m-input').val() == '') {
                $('#search-suggest div').hide();
            } else {
                $.ajax({
                    url: '/search',
                    type: 'POST',
                    data: search,
                })
                .done(function(res) {
                    $('#search-suggest').html('');
                    $('#search-suggest').append(res)
                })
            };
        });
</script>
@endpush