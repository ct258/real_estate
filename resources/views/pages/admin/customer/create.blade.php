@extends('layouts.admin')
@push('css')
<style>
    .error {
        color: red;
    }
    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
        color:#0000009e;
    }
</style>

@endpush

@section('content')


{{-- <h3 class="page-title">Thêm Nhân Viên<br><br></h3>
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
        <div class="col-lg-6">
            <section class="widget">
                <div class="container-fluid">
                    <table class="table">
                    
                        <tr>
                            <td><label>Họ tên nhân viên</label><input type="text" name="name" size="100%" autofocus
                                    class="form-control input-transparent"><br></td>
                        </tr>

                        <tr>
                            <td><label>Ngày sinh</label><input type="text" name="address"
                                    class="form-control input-transparent"><br></td>
                        </tr>

                  
                        <tr>
                        
                            <td>
                                <label>Giới tính</label>
                              <br>
                                <form>
                                    <input name="gioitinh" type="radio" value="Nam" />Nam
                                    <br>
                                    <input name="gioitinh" type="radio" value="Nữ" />Nữ
                                </form>
                            </td>
                            
                        </tr>
                        </table> 
                     </div>
            </section>
        </div>
        <div class="col-lg-6">
            <section class="widget">
                <div class="container-fluid">
                    <table class="table">
                    
                        <tr>
                            <td><label>Email</label><input type="text" name="" size="100%" autofocus
                                    class="form-control input-transparent"><br></td>
                        </tr>

                        <tr>
                            <td><label>Địa chỉ</label><input type="text" name=""
                                    class="form-control input-transparent"><br></td>
                        </tr>

                        <tr>
                            <td><label>Số điện thoại</label><input type="text" name="" 
                                    class="form-control input-transparent">
                                    <br>
                            </td>
                        </tr>
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

        </div><a href="{{route('staff.index')}}" class="btn btn-default">Trở lại</a>
    </div>
</form> --}}
{{-- @endsection --}}
{{-- @section('script') --}}
<div class="col-sm-5" >
      
          <a href="{{route('customer.index')}}" class="tst4 btn btn-warning">Danh sách khách hàng
        </a>
</div>
<div class="row">
    <div class="col-sm-12">
        @if (Session::has('mess'))
        <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>{{Session::get('mess')}}</strong>
        </div>
        {{Session::put('mess',null)}}
      @endif
    </div>
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm khách hàng
                </header>
                
                <div class="panel-body">
                    <form action="{{ route('customer.create.submit') }}" method="post">
                        @csrf
                        <div class="container-fuild">
                            <div class="row">
                                <div class="col-sm-6">
                                   
                                    <div class="form-group">
                                        <label>Tên khách hàng</label>
                                        <input type="text" class="form-control" name="customer_name" >
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="email" class="form-control" name="customer_email" >
                                    </div>
                                    <div class="form-group">
                                        <label >Ngày sinh:</label>
                                        <input type="date" class="form-control" name="customer_birth" >
                                    </div>
                                    <div class="form-group">
                                        <label >Số điện thoại: </label>
                                        <input type="text" name="customer_tel" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label >CMND: </label>
                                        <input type="text" name="customer_identity_card" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                         <label>Giới tính</label>
                                        <select class="form-control" name="customer_gender" name="customer_gender">
                                            <option value="1">Nam</option>
                                            <option value="2">Nữ</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Địa chỉ:</label>
                                        <input type="text" class="form-control" name="customer_address" placeholder="Enter email">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Rank</label>
                                       <select class="form-control" name="rank_id">
                                           <option value="1">1</option>
                                           <option value="2">2</option>
                                           <option value="2">3</option>
                                           <option value="2">4</option>
                                           <option value="2">5</option>
                                       </select>
                                   </div>
                                    <div class="form-group">
                                        <label>Tài khoản:</label>
                                        <input type="text" class="form-control" name="username" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu:</label>
                                        <div class="input-group" id="show_hide_password" >
                                          <input class="form-control" type="password"name="password">
                                          <div class="input-group-addon">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success btn-block">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>

    </div>
   
</div>
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

    //ẩn hiện mk
    $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
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

<!--main content end-->
@endsection