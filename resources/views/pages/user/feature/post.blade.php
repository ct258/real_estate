@extends('layouts.user')
@section('page')
<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
<!-- Page -->
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 single-list-page">
                <form action="{{route('post.create.submit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="single-list-content">
                        <div class="row">
                            <div class="col-xl-6 sl-title">
                                <img src="https://lipis.github.io/flag-icon-css/flags/4x3/vn.svg" style="width:5%;";>
                                <h2><label> Tiêu đề(*):</label><input type="text" name="name" id=""
                                        class="form-control input-transparent" style="max-width:100%" autocomplete="on"></h2>
                                        <img src="https://lipis.github.io/flag-icon-css/flags/4x3/vn.svg" style="width:5%;";>
                                        <p><i class="fa fa-map-marker"></i><label>Địa chỉ (*):</label> <input type="text"
                                            name="address" id="" placeholder="" style="max-width:100%" class="form-control input-transparent"></p>
                            </div>
                            <div class="col-xl-6 sl-title">
                                <img src="https://lipis.github.io/flag-icon-css/flags/4x3/gb.svg" style="width:5%;";>
                                <h2><label> Tiêu đề(*):</label><input type="text" name="name" id=""
                                        class="form-control input-transparent"  style="max-width:100%;" autocomplete="on"></h2>
                                <img src="https://lipis.github.io/flag-icon-css/flags/4x3/gb.svg" style="width:5%;";>
                                <p><i class="fa fa-map-marker"></i><label>Địa chỉ (*):</label> <input type="text"
                                        name="address" id="" placeholder="" style="max-width:100%;" class="form-control input-transparent"></p>
                                  
                            </div>
                        </div>
                        <h3 class="sl-sp-title">Thông tin cơ bản</h3>
                        <div class="row property-details-list">
                            <table class="table">
                                <tr>
                                    <td>Hình thức(*)</td>
                                    <td>
                                        <select name="form" id="form" class="form-control form-control-sm">
                                            <option value="form_id" selected>-- Chọn hình thức --</option>
                                            @foreach ($form as $item)
                                            <option value="{{$item->form_id}}">{{$item->form_name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>Loại(*)</td>
                                    <td>
                                        <select name="type" id="type" class="form-control form-control-sm">
                                            <option value="type_id" selected>-- Chọn Loại --</option>
                                            @foreach ($type as $item)
                                            <option value="{{$item->type_id}}">{{$item->type_name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tỉnh/Thành phố(*)</td>
                                    <td>
                                        <select name="province" id="province" class="form-control form-control-sm">
                                            <option value="province_id" selected>-- Chọn Tỉnh/TP --</option>
                                            @foreach ($province as $item)
                                            <option value="{{$item->province_id}}">{{$item->province_name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>Quận/Huyện(*)</td>
                                    <td>
                                        <select name="district" id="district" class="form-control form-control-sm">
                                            <option value="district_id" selected>-- Chọn Quận/Huyện --</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Phường/Xã</td>
                                    <td>
                                        <select name="ward" id="ward" class="form-control form-control-sm">
                                            <option value="ward_id" selected>-- Chọn Phường/Xã --</option>
                                        </select>
                                    </td>
                                    <td>Đường/Phố</td>
                                    <td>
                                        <select name="street" id="street" class="form-control form-control-sm">
                                            <option value="street_id" selected>-- Chọn Đường/Phố --</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Diện tích</td>
                                    <td>
                                        <input type="number" name="acreage" id="acreage"
                                            class="form-control form-control-sm">
                                    </td>
                                    <td>Đơn vị</td>
                                    <td>
                                        <input type="number" name="unit" id="unit" class="form-control form-control-sm">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Giá</td>
                                    <td>
                                        <input type="number" name="price" id="price"
                                            class="form-control form-control-sm">
                                    </td>
                                    <td>Thành tiền: </td>
                                    <td></td>
                                </tr>
                            </table>

                        </div>
                        <h3 class="sl-sp-title">Thông tin mô tả</h3>
                        <div>
                            <img src="https://lipis.github.io/flag-icon-css/flags/4x3/vn.svg" style="width:5%;";>
                            <textarea name="description" cols="30" id="editor1" style="max-width:100%;height: 235px;"
                                class="form-control input-transparent"></textarea>
                        </div>  
                        <br>
                        <br>
                        <div>
                            <img src="https://lipis.github.io/flag-icon-css/flags/4x3/gb.svg" style="width:5%;";>
                            <textarea name="description" cols="30" id="editor2" style="max-width:100%;height: 235px;"
                                class="form-control input-transparent"></textarea>
                                
                        </div>
                        <br>
                        <h3 class="sl-sp-title">Thông tin khác</h3>
                        <div class="row property-details-list">
                            <div class="col-md-4 col-sm-6">
                                <p><i class="fas fa-building"></i> Mặt tiền <input type="number" name="" id="" min=0
                                        class="form-control input-transparent">
                                </p>
                                <p><i class="fa fa-bed"></i> Phòng ngủ <input type="number" name="" id="" min=0
                                        class="form-control input-transparent"></p>
                                <p><i class="fa fa-th-large"></i> Số tầng <input type="number" name="" id="" min=0
                                        class="form-control input-transparent"></p>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <p><i class="fa fa-car"></i> Lối vào <input type="number" name="" id="" min=0
                                        class="form-control input-transparent"></p>
                                <p><i class="fas fa-compass"></i> Hướng nhà <input type="number" name="" id="" min=0
                                        class="form-control input-transparent">
                                </p>
                                <p><i class="fa fa-clock-o"></i> Độ tuổi <input type="number" name="" id="" min=0
                                        class="form-control input-transparent">
                                </p>
                            </div>
                            <div class="col-md-4">
                                <p><i class="fa fa-restroom"></i> Toilet <input type="number" name="" id="" min=0
                                        class="form-control input-transparent"></p>
                                <p><i class="fas fa-couch"></i> Nội thất <input type="number" name="" id="" min=0
                                        class="form-control input-transparent"></p>
                            </div>
                        </div>
                        {{-- <h3 class="sl-sp-title bd-no">Floorplans</h3>
                    <div id="accordion" class="plan-accordion">
                        <div class="panel">
                            <div class="panel-header" id="headingOne">
                                <button class="panel-link active" data-toggle="collapse" data-target="#collapse1"
                                    aria-expanded="false" aria-controls="collapse1">First Floor: <span>660 sq ft</span>
                                    <i class="fa fa-angle-down"></i></button>
                            </div>
                            <div id="collapse1" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="panel-body">
                                    <img src="img/plan-sketch.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-header" id="headingTwo">
                                <button class="panel-link" data-toggle="collapse" data-target="#collapse2"
                                    aria-expanded="true" aria-controls="collapse2">Second Floor:<span>610 sq ft.</span>
                                    <i class="fa fa-angle-down"></i>
                                </button>
                            </div>
                            <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="panel-body">
                                    <img src="img/plan-sketch.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-header" id="headingThree">
                                <button class="panel-link" data-toggle="collapse" data-target="#collapse3"
                                    aria-expanded="false" aria-controls="collapse3">Third Floor :<span>580 sq ft</span>
                                    <i class="fa fa-angle-down"></i>
                                </button>
                            </div>
                            <div id="collapse3" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordion">
                                <div class="panel-body">
                                    <img src="img/plan-sketch.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div> --}}

                        <h3 class="sl-sp-title bd-no">Hình ảnh</h3>
                        <div class="perview-video">
                            <div class="spanButtonPlaceholder block-upload-item" id="upload-drop-zone"
                                style="position: relative; overflow: hidden; direction: ltr;">
                                <p>(Click để tải ảnh<br> hoặc kéo thả ảnh vào đây)</p>
                                <input multiple="multiple" type="file" name="file"
                                    style="position: absolute; right: 0px; top: 0px; font-family: Arial; font-size: 118px; margin: 0px; padding: 0px; cursor: pointer; opacity: 0;">
                            </div>
                        </div>
                        <h3 class="sl-sp-title bd-no">Vị trí</h3>
                        <div class="pos-map" id="map-canvas"></div>
                    </div>
                    <button type="submit" class="btn btn-success">Đăng</button>
                </form>
            </div>



            {{--  --}}
            <!-- sidebar -->
            <div class="col-lg-4 col-md-7 sidebar">
                <div class="author-card">
                    <div class="author-img set-bg" data-setbg="img/author.jpg"></div>
                    <div class="author-info">
                        <h5>Gina Wesley</h5>
                        <p>Real Estate Agent</p>
                    </div>
                    <div class="author-contact">
                        <p><i class="fa fa-phone"></i>(567) 666 121 2233</p>
                        <p><i class="fa fa-envelope"></i>ginawesley26@gmail.com</p>
                    </div>
                </div>
                <div class="contact-form-card">
                    <h5>Do you have any question?</h5>
                    <form>
                        <input type="text" placeholder="Your name">
                        <input type="text" placeholder="Your email">
                        <textarea placeholder="Your question"></textarea>
                        <button>SEND</button>
                    </form>
                </div>
                <div class="related-properties">
                    <h2>Related Property</h2>
                    <div class="rp-item">
                        <div class="rp-pic set-bg" data-setbg="img/feature/1.jpg">
                            <div class="sale-notic">FOR SALE</div>
                        </div>
                        <div class="rp-info">
                            <h5>1963 S Crescent Heights Blvd</h5>
                            <p><i class="fa fa-map-marker"></i>Los Angeles, CA 90034</p>
                        </div>
                        <a href="#" class="rp-price">$1,200,000</a>
                    </div>
                    <div class="rp-item">
                        <div class="rp-pic set-bg" data-setbg="img/feature/2.jpg">
                            <div class="rent-notic">FOR Rent</div>
                        </div>
                        <div class="rp-info">
                            <h5>17 Sturges Road, Wokingham</h5>
                            <p><i class="fa fa-map-marker"></i> Newtown, CT 06470</p>
                        </div>
                        <a href="#" class="rp-price">$2,500/month</a>
                    </div>
                    <div class="rp-item">
                        <div class="rp-pic set-bg" data-setbg="img/feature/4.jpg">
                            <div class="sale-notic">FOR SALE</div>
                        </div>
                        <div class="rp-info">
                            <h5>28 Quaker Ridge Road, Manhasset</h5>
                            <p><i class="fa fa-map-marker"></i>28 Quaker Ridge Road, Manhasset</p>
                        </div>
                        <a href="#" class="rp-price">$5,600,000</a>
                    </div>
                    <div class="rp-item">
                        <div class="rp-pic set-bg" data-setbg="img/feature/5.jpg">
                            <div class="rent-notic">FOR Rent</div>
                        </div>
                        <div class="rp-info">
                            <h5>Sofi Berryessa 750 N King Road</h5>
                            <p><i class="fa fa-map-marker"></i>Sofi Berryessa 750 N King Road</p>
                        </div>
                        <a href="#" class="rp-price">$1,600/month</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Page end -->
@endsection
@section('script')
<script>
    CKEDITOR.replace( 'editor1', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

    } );
</script>
<script>
    CKEDITOR.replace( 'editor2', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

    } );
</script>
<script>
    $(document).ready(function () {
        //lấy loại bất động sản
        $("#form").change(function(){
            var form_id = $(this).val();
            $.get("../real_estate/get_type/"+form_id, function(data){
                $("#type").html(data);
            });
        });
        //lấy quận huyện theo tỉnh thành phố
        $("#province").change(function(){
            var province_id = $(this).val();
            $.get("../district/"+province_id, function(data){
                $("#district").html(data);
            });
        });
        //lấy đường phố theo tỉnh
        $("#province").change(function(){
            var province_id = $(this).val();
            $.get("../street/"+province_id, function(data){
                $("#street").html(data);
            });
        });
        //lấy phường xã theo tỉnh,huyện
        $("#district").change(function(){
            var province_id = "";
            var district_id = "";
            var province_id = $("#province").val();
            var district_id = $("#district").val();
            $.get("../ward/"+province_id+'/'+district_id, function(data){
                $("#ward").html(data);
            });
        });
        //lấy đường phố theo tỉnh,huyện
        $("#district").change(function(){
            var province_id = $("#province").val();
            var district_id = $("#district").val();
            $.get("../street/"+province_id+'/'+district_id, function(data){
                $("#street").html(data);
            });
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
            
        if(ward_id=='ward_id' && province_id!='province_id'){
            var data2="<option value='0'>-- Chọn Phường/Xã --</option>";
            $("#ward").html(data2);
            $.get("../street/"+province_id, function(data){
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

</script>
@endsection