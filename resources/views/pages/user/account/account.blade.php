@extends('layouts.user')

@section('css')
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
@endsection

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
                                <span>@lang('Post sale real estate')</span>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="{{route('account')}}">
                                <span>@lang('Basic infor')</span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('account.order')}}">
                                <span>@lang('Bill')</span>
                            </a>
                        </li>
                        <li class="list-group-item ">

                            <a href="{{route('account.my_re')}}" @if(!$check_re)
                                style="pointer-events: none;cursor: default;" @endif>
                                <span>@lang('My real estate')</span>
                            </a>
                        </li>
                        <li class="list-group-item ">
                            <a href="{{ route('appointment.detail',['id'=>$info->customer_id]) }}">
                                <span>@lang('Appointment')</span>
                        <li class="list-group-item">
                            <a href="{{route('account.my_wish')}}">
                                <span>@lang('Wish list')</span>
                            </a>
                        </li>

                        </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('logout') }}"><span>@lang('Logout')</span> </a>
                        </li>
                    </ul>
                </div>
            </div>




            <div class="col-sm-8">
                <div class="card content-card">
                    <div class="card-header contnet-header">
                        <p>@lang('infor')</p>
                        {{-- <p>@lang('Delete')</p><i class="fa fa-trash" aria-hidden="true"></i> --}}
                    </div>
                    <form action="#">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card-body">
                                    <div class="form-group lang  col-md-12  ">

                                        <img id="image" class="card-img-top" src="{{asset($info->customer_avatar)}}" />
                                        <input type="file" id="upload-image" name='avatar' accept="image/*" value=""
                                            required
                                            onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="control-label">@lang('Name')</label>
                                        <input type="text" class="form-control" placeholder="{{$info->customer_name}}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="control-label">@lang('Account')</label>
                                        <input type="text" class="form-control" placeholder="{{$info->username}}"
                                            readonly>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="control-label">@lang('Password')</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="validationCustomUsername"
                                                aria-describedby="inputGroupPrepend" required>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"
                                                    data-toggle="modal" data-target="#exampleModal">Change</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="control-label">@lang('Id')</label>
                                        <input type="text" class="form-control"
                                            placeholder="{{$info->customer_identity_card}}" readonly>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="control-label">@lang('Email')</label>
                                        <input type="text" class="form-control" placeholder="{{$info->customer_email}}">
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card-body">
                                    <div class="form-group col-md-12">
                                        <label for="" class="control-label">@lang('Phone')</label>
                                        <input type="text" class="form-control" placeholder="{{$info->customer_tel}}">
                                    </div>
                                    <div class="form-group lang  col-md-12  ">
                                        <label class="control-label">@lang('Birth')</label>
                                        <input class="form-control" type="date" value="{{$info->customer_birth}}">
                                    </div>
                                    <div class="form-group lang  col-md-12  ">
                                        <label class="control-label">@lang('City')</label>
                                        <select class="form-control" aria-hidden="true">
                                            <option>Cần Thơ</option>
                                        </select>
                                    </div>
                                    <div class="form-group lang  col-md-12  ">
                                        <label class="control-label">@lang('District')</label>
                                        <select class="form-control" aria-hidden="true">
                                            <option>Ninh Kièu</option>
                                        </select>
                                    </div>
                                    <div class="form-group lang  col-md-12  ">
                                        <label class="control-label">@lang('Ward')</label>
                                        <select class="form-control" aria-hidden="true">
                                            <option>Hưng Lợi</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="control-label">@lang('Address')</label>
                                        <input type="text" class="form-control"
                                            placeholder="{{$info->customer_address}}">
                                    </div>
                                    <div class="submit">
                                        <button class="btn btn-success">@lang('Save')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thay đổi mật khẩu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-group col-md-12">
                        <label for="" class="control-label">Mật khẩu cũ</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="" class="control-label">Mật khẩu mới</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="" class="control-label">Nhập lại MK mới</label>
                        <input type="password" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Lưu</button>
            </div>
        </div>
    </div>
</div>




@endsection