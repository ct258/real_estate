@extends('layouts.admin')
@push('css')
<style>
    .error {
        color: red;
    }
</style>

@endpush

@section('content')


<h2 class="page-title">Thêm Bất động sản<br><br></h2>
<form action="{{route('real_estate.create.submit')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
        <div class="col-lg-9">
            <section class="widget">
                <div class="container-fluid">
                    <table class="table">
                        <tr>
                            <td>{{-- <input type="file" accept="image/*" onchange="loadFile(event)">
                                <img id="output"/> --}}
                                <div class="col-sm-10">
                                    <img id="image" alt="Chọn hình đại diện" width="100" height="100" />
                                    <input type="file" name="avatar" id="avatar"
                                        onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                                    {{-- <div class="img"></div> --}}
                                    {{-- <img id="hinh" alt="your photo" width="100" height="100" /> --}}
                                    <input type="file" name="photos[]" id="photos[]" multiple onchange=show()></td>
                        </tr>
                        <tr>
                            <td><label>Tên Bất động sản</label><input type="text" name="name" size="100%" autofocus
                                    class="form-control input-transparent"><br></td>
                        </tr>

                        <tr>
                            <td><label>Địa chỉ</label><input type="text" name="address"
                                    class="form-control input-transparent"><br></td>
                        </tr>

                        <tr>
                            <td><label>Mô tả</label><textarea name="description" cols="30" id="editor1"
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
                            <td>
                                <label>Hình thức</label>
                                {{-- <select name="form" id="form" class="form-control form-control-sm">
                                    <option value="form_id" selected>-- Chọn --</option>
                                    @foreach ($form as $item)
                                    <option value="{{$item->form_id}}">{{$item->form_name}}</option>
                                @endforeach
                                </select> --}}
                        </tr>
                        <tr>
                            <td>
                                <label>Loại bất động sản</label>
                                <select name="type" id="type" class="form-control form-control-sm">
                                    <option value="form_id" selected>-- Chọn --</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Đơn vị</label>
                                <select name="unit" id="unit" class="form-control form-control-sm">
                                    <option value="unit_id" selected>-- Chọn --</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Diện tích</label><input type="text" name="acreage"
                                    class="form-control input-transparent"><br>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Giá dự án</label><input type="number" name="price" min="0" step="any"
                                    class="form-control input-transparent"><br>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Phương hướng</label>
                                {{-- <select name="direction" id="direction" class="form-control form-control-sm">
                                    <option value="" selected>-- Chọn --</option>
                                    {{-- @foreach ($direction as $item) --}}
                                {{-- <option value="{{$item->direction_id}}">{{$item->direction_name}}</option>
                                @endforeach
                                </select><br> --}}
                            </td>
                        </tr>
                        <tr>

                            <td>
                                <label>Địa chỉ</label>
                                <select name="province" id="province" class="form-control form-control-sm">
                                    <option value="province_id" selected>-- Chọn Tỉnh/TP --</option>
                                    @foreach ($province as $item)
                                    <option value="{{$item->province_id}}">{{$item->province_name}}</option>
                                    @endforeach
                                </select>

                                <br>

                                <select name="district" id="district" class="form-control form-control-sm">
                                    <option value="district_id" selected>-- Chọn Quận/Huyện --</option>
                                </select>

                                <br>

                                <select name="ward" id="ward" class="form-control form-control-sm">
                                    <option value="ward_id" selected>-- Chọn Phường/Xã --</option>
                                </select>

                                <br>

                                <select name="street" id="street" class="form-control form-control-sm">
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
    <label for="captcha">Captcha</label>
    {!! NoCaptcha::renderJs() !!}
    {!! NoCaptcha::display() !!}
    <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Lưu</button>

            </div>

        </div><a href="{{route('real_estate.index')}}" class="btn btn-default">Trở lại</a>
    </div>
</form>
{{-- @endsection --}}
{{-- @section('script') --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        //lấy đơn vị
        $("#form").change(function(){
            var form_id = $(this).val();
            $.get("../unit/"+form_id, function(data){
                $("#unit").html(data);
            });
        });
        
        //lấy loại bất động sản
        $("#form").change(function(){
            var form_id = $(this).val();
            $.get("../type/"+form_id, function(data){
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
@section('script')
{{-- <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> --}}
<script>
    CKEDITOR.replace( 'editor1', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

    } );
</script>
@include('ckfinder::setup')
<script>
    var options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
    
</script>
{{-- <script>
      $url = 'localhost:8000';
  CKEDITOR.replace( 'book_description2', {
        filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
} );
</script> --}}
{{-- <script>
        // var loadFile = function(event) {
        //     alert(123);
        //   var output = document.getElementById('photo');
        //   photo.src = URL.createObjectURL(event.target.files[0]);
        // };
      </script> --}}
<script type="text/javascript">
    function show(){
            var arrLen=file.length;
            for (i=0 ; i < arrLen ; i++){
                // $('.img').append(img);
                // var img='<img id="photo" alt="your photo" width="100" height="100" />';
                // <img id="photo" alt="your photo" width="100" height="100" />
                document.getElementById('hinh').src = window.URL.createObjectURL(this.files[i]);
            }
            
            
          }
          
</script>
</section>
<!-- footer -->
<div class="footer">
    <div class="wthree-copyright">
        <p>© Quản lý sàn giao dịch bất động sản | Made by student group learning E-Commerce Development <a
                href="{{route('real_estate.index')}}">Real-Estate</a></p>
    </div>
</div>
<!-- / footer -->
</section>
<!--main content end-->
@endsection