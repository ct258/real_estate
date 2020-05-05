@extends('layouts.admin')

@section('content')
<style>
    div#tab {
    padding-top: 35px;
    text-align: -webkit-center;
    /* padding-left: -34px; */
    padding-right: 400px;
}
img#image {
    width: 700px;
    height: 350px;
    /* margin-left: -248px; */
    margin: auto;
    to: auto;
    */: ;
    margin: auto;
    margin-left: -150px;
    margin-bottom: -53px;
    padding-bottom: 68px;
}
</style>

<!-- page start-->
<div class="panel-heading">
    QUẢN LÝ ẢNH BÌA
</div>
<div class="form-w3layouts">
    <!-- page start-->
    {{-- slide 1 --}}
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    slide 1
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        {{-- <a href="javascript:;" class="fa fa-cog"></a> --}}
                        <a href="javascript:;" class="fa fa-times"></a>
                    </span>
                </header>
                <div class="panel-body">
                    <form action="{{ route('banner.submit', '43') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div id="tab">
                                            
                            <div style="margin-left:400px;" class="form-group lang  col-md-5 ">
                                            <img id="image" alt="CHỌN TỆP ĐÍNH KÈM" /><br>
                                            <input type="file" class="avatar" name="avatar" id="avatar" 
                                                                onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                                        required>
                            </div>
                            <div class="col-sm-8" >
                               
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" id="a" class="btn btn-success btn-block a">Lưu</button>
                                </div>
                         

                        <ul>
                            <!-- The file uploads will be shown here -->
                        </ul>

                    </form>
                </div>
            </section>
        </div>
    </div>

    {{-- slide 2 --}}
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    slide 2
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        {{-- <a href="javascript:;" class="fa fa-cog"></a> --}}
                        <a href="javascript:;" class="fa fa-times"></a>
                    </span>
                </header>
                <div class="panel-body">
                    <form action="{{ route('banner.submit', '44') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div id="tab">
                                            
                            <div style="margin-left:400px;" class="form-group lang  col-md-5 ">
                                            <img id="image" alt="CHỌN TỆP ĐÍNH KÈM" /><br>
                                            <input type="file" class="avatar" name="avatar" id="avatar" 
                                                                onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                                        required>
                            </div>
                            <div class="col-sm-8" >
                               
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" id="a" class="btn btn-success btn-block a">Lưu</button>
                                </div>
                         

                        <ul>
                            <!-- The file uploads will be shown here -->
                        </ul>

                    </form>
                </div>
            </section>
        </div>
    </div>
    {{-- slide 3 --}}
    <div class="row">

        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    slide 3
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        {{-- <a href="javascript:;" class="fa fa-cog"></a> --}}
                        <a href="javascript:;" class="fa fa-times"></a>
                    </span>
                </header>
                <div class="panel-body anh">
                    <form action="{{ route('banner.submit', ['45']) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div id="tab">
                                            
                            <div style="margin-left:400px;" class="form-group lang  col-md-5 ">
                                            <img id="image" alt="CHỌN TỆP ĐÍNH KÈM" /><br>
                                            <input type="file" class="avatar" name="avatar" id="avatar" 
                                                                onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                                        required>
                            </div>
                            <div class="col-sm-8" >
                               
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" id="a" class="btn btn-success btn-block a">Lưu</button>
                                </div>
                         

                        <ul>
                            <!-- The file uploads will be shown here -->
                        </ul>

                    </form>
                </div>
            </section>
        </div>
    </div>

    <!-- page end-->



    {{-- slide 1 --}}
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    slide 4
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        {{-- <a href="javascript:;" class="fa fa-cog"></a> --}}
                        <a href="javascript:;" class="fa fa-times"></a>
                    </span>
                </header>
                <div class="panel-body">
                    <form action="{{ route('banner.submit', '46') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div id="tab">
                                            
                            <div style="margin-left:400px;" class="form-group lang  col-md-5 ">
                                            <img id="image" alt="CHỌN TỆP ĐÍNH KÈM" /><br>
                                            <input type="file" class="avatar" name="avatar" id="avatar" 
                                                                onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                                        required>
                            </div>
                            <div class="col-sm-8" >
                               
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" id="a" class="btn btn-success btn-block a">Lưu</button>
                                </div>
                         

                        <ul>
                            <!-- The file uploads will be shown here -->
                        </ul>

                    </form>
                </div>
            </section>
        </div>
    </div>







    <style>
        .anh {
            height: 200px !important;

        }
        .avatar {
          padding-left: 84px;
        }
    </style>
    <script>
        $(function(){
            $('.panel-body').slideUp();
            $('.panel-heading').click(function(e){
                $(this).next().slideToggle();
            });
           

        });
             
             $('.a').click(function () {
                 var data = $('.avatar').val();
                 if(data!=''){
                 const Toast = Swal.mixin({
                             toast: true,
                             position: 'top-end',
                             showConfirmButton: false,
                             timer: 3000,
                             timerProgressBar: true,
                             onOpen: (toast) => {
                                 toast.addEventListener('mouseenter', Swal.stopTimer)
                                 toast.addEventListener('mouseleave', Swal.resumeTimer)
                             }
                         })
         
                             Toast.fire({
                             icon: 'success',
                             title: 'Thay đổi logo thành công'
                         })
                 }else{
                     const Toast = Swal.mixin({
                             toast: true,
                             position: 'top-end',
                             showConfirmButton: false,
                             timer: 3000,
                             timerProgressBar: true,
                             onOpen: (toast) => {
                                 toast.addEventListener('mouseenter', Swal.stopTimer)
                                 toast.addEventListener('mouseleave', Swal.resumeTimer)
                             }
                         })
         
                             Toast.fire({
                             icon: 'error',
                             title: 'Chưa thêm tệp'
                         })
                     
                 }
             });
    </script>

    {{-- page end --}}

    @endsection