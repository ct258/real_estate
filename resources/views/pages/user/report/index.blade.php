@extends('layouts.user')

@push('css')
<link href="{{ asset('user/account/style.css') }}" rel="stylesheet">
<style>
    .list-group-item a {
        color: black !important;
        text-decoration: none !important;
        display: flex;
    }

    .list-group-item.active {
        background-color: #e9ecef !important;
        border-color: #e9ecef !important;
    }

    .list-group-item:hover {
        background-color: #e9ecef !important;
        border-color: #e9ecef !important;
    }

    .list-group-item .badge-danger {
        color: #fff;
        background-color: #30caa8 !important;
    }

    img.card-img-top {
        /* height: 100px; */
        /* width: 100px; */
        background-size: 32px 32px;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        margin: 0;
        overflow: hidden;
        position: relative;
        height: 100px;
        width: 100px;
        z-index: 0;
    }

    .avatar {
        color: black;
        text-decoration: none;
    }
</style>
@endpush

@section('page')

@if($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    <p>{{$message}}</p>
    <p class="mb-0"></p>
</div>
@endif
@if (count($errors) > 0)
<div class="alert alert-danger">
    Upload Validation Error
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="wrap">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 update-icon">
                <p>Thông Tin Cá Nhân</p>
            </div>
        </div>
    </div>
    <div class="container midd">
        <div class="row">
            <div class="col-sm-4">
                <div class="card content-card">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{route('post.create')}}">
                                <span>Đăng bán bất động sản</span>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="">
                                <span>Thông tin cơ bản</span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="">
                                <span>Đánh giá và nhận xét</span>
                            </a>
                        </li>
                        <li class="list-group-item disabled">
                            <a href="">
                                <span>Bất động sản của bạn</span>
                            </a>
                        </li>
                        <li class="list-group-item disabled">
                            <a href="">
                                <span>Cuộc hẹn</span> <span class="badge badge-danger badge-pill">14</span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('logout') }}"><span>Đăng xuất</span> </a>
                        </li>
                    </ul>
                </div>
            </div>




            <div class="col-sm-8">
                <div class="card content-card">
                    <div class="card-header contnet-header">
                        <p>Thông tin</p>
                        <p>Xóa tài khoản  </p><i class="fa fa-trash" aria-hidden="true"></i>
                    </div>
                    {{-- @foreach ($info as $info) --}}
                    <form action="{{ route('account.update', ['account_id'=>$info->account_id]) }}">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card-body">
                                    {{-- <div class="form-group lang  col-md-12  ">

                                        <img id="image" class="card-img-top" src="{{asset($info->customer_avatar)}}" />
                                        <input type="file" id="upload-image" name='avatar' accept="image/*" value=""
                                        
                                            onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                                    </div> --}}
                                    <div class="form-group col-md-12">
                                        <label for="" class="control-label">Họ và Tên</label>
                                        <input type="text" class="form-control" placeholder="{{$info->customer_name}}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="control-label">Tài Khoản</label>
                                        <input type="text" class="form-control" placeholder="{{$info->username}}"
                                            readonly>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="control-label">Mật Khẩu</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="validationCustomUsername"
                                                aria-describedby="inputGroupPrepend" readonly>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"
                                                    data-toggle="modal" data-target="#exampleModal">Change</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="control-label">CMND</label>
                                        <input type="text" class="form-control"
                                            placeholder="{{$info->customer_identity_card}}" readonly>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="control-label">Email</label>
                                        <input type="text" class="form-control" placeholder="{{$info->customer_email}}">
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card-body">
                                    <div class="form-group col-md-12">
                                        <label for="" class="control-label">Số Điện Thoại</label>
                                        <input type="text" class="form-control" placeholder="{{$info->customer_tel}}">
                                    </div>
                                    <div class="form-group lang  col-md-12  ">
                                        <label class="control-label">Ngày Sinh</label>
                                        <input class="form-control" type="date" value="{{$info->customer_birth}}">
                                    </div>
                                    <div class="form-group lang  col-md-12  ">
                                        <label class="control-label">Tỉnh/Thành Phố</label>
                                        <select class="form-control" aria-hidden="true">
                                            <option>Cần Thơ</option>
                                        </select>
                                    </div>
                                    <div class="form-group lang  col-md-12  ">
                                        <label class="control-label">Quận/Huyện</label>
                                        <select class="form-control" aria-hidden="true">
                                            <option>Ninh Kièu</option>
                                        </select>
                                    </div>
                                    <div class="form-group lang  col-md-12  ">
                                        <label class="control-label">Phường/Xã</label>
                                        <select class="form-control" aria-hidden="true">
                                            <option  value="{{$info->ward_id}}" selected>{{$info->ward_id}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="control-label">Địa chỉ</label>
                                        <input type="text" class="form-control"
                                            placeholder="{{$info->customer_address}}">
                                    </div>
                                    <div class="submit">
                                        <button class="btn btn-success">Lưu</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
    </div>
</div>






@endsection