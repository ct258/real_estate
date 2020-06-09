@extends('layouts.user')

@push('css')
<link href="{{ asset('user/cart/1.css') }}" rel="stylesheet">
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


<section>
    <div class="container-fruid cart">
        <div class="row">
            <div class="col-lg-9">
                <div id="title-1">
                    @if ($cart)

                    <h3>Giỏ hàng <span>({{count($cart)}} sản phẩm)</span></h3>
                    @else

                    <h3>Giỏ hàng <span>(0 sản phẩm)</span></h3>
                    @endif
                </div>
                @if($cart)
                @foreach ($cart as $item)
                <div class="row content-1">
                    <div class="col-lg-4">
                        <img class="avatar" src="{{ asset($item->real_estate_avatar)}}" alt="">
                    </div>
                    <div class="col-lg-4">
                        <div class="content-2">
                            <p id="title-2">{{$item->translation_name}}</p>
                            <p>Được đăng tin bởi: <span>Bất Động Sản Cần Thơ</span> </p>
                            <p>Nhân viên tư vấn: Dương Tâm</p>
                            <p>SĐT: 012 345 678</p>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="content-3">
                            <p id="title-4">Giá: {{number_format($item->real_estate_price)}}</p>
                            <p id="title-3">Giá đặt cọc: {{number_format($item->real_estate_deposit)}}</p>
                            <p>Diện tích: {{$item->real_estate_acreage}} m<sup>2</sup></p>
                        </div>
                        <div class="delect">
                            <a href="{{route('cart.remove',$item->real_estate_id)}}">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="col-lg-3">
                @if ($info)
                <div class="card card-left-1">
                    <div class="card-body">
                        <div class="infor-top">
                            <p>Thông tin Khách Hàng Mua</p>
                        </div>
                        <div class="infor-middle">

                            <h4>{{$info->customer_name}}</h4>
                            <p>{{$info->customer_address}}</p>
                            <p>Điện thoại:&nbsp;&nbsp;&nbsp;&nbsp;0123 456 789</p>

                        </div>
                    </div>
                </div>
                @endif

                <br>

                <div class="card card-left-2">
                    <div class="card-body">
                        <div class="price-top">
                            <p>Đơn Hàng</p>
                        </div>
                        <div class="price-content">

                            {{-- <p id="tt">{{$item->translation_name}}</p> --}}
                            <p>Tạm tính: {{number_format($total_money)}}đ</p>
                            <p>Phí thủ tục:
                                @if($total_money==0) 0đ</p>
                            <input type="hidden" name="fee" value=0>
                            @else
                            {{number_format($total_money*0.02)}}đ</p>
                            <input type="hidden" name="fee" value={{$total_money*0.02}}>
                            @endif
                            {{-- <form action="" method="post">
                                <p>Khuyến mãi: 0đ</p>
                                <div class="row">
                                    <div class="col-lg-7">

                                        <input type="text" name="code" id="code" class="form-control"
                                            placeholder="Mã giảm giá">
                                    </div>
                                    <div class="col-lg-3">

                                        <button type="submit" class="btn btn-warning">Đồng ý</button>
                                    </div>
                                </div>
                            </form> --}}
                        </div>
                        <div class="price-bottom">
                            <p>Thành tiền: </p>
                            <p>&nbsp;&nbsp;&nbsp; {{number_format($total_money*1.02)}}đ</p>

                        </div>
                    </div>
                </div>
                <br>
                <div class="container">
                    <form action="{{route('VNPay')}}" method="post">
                        @csrf
                        <input type="hidden" name="total" value="{{$total_money*1.02}}">
                        <input type="hidden" name="fee" value="{{$total_money*0.2}}">
                        {{-- <input type="hidden" name="discount" value=""> --}}
                        <!-- Button to Open the Modal -->
                        <button type="submit" class="btn btn-primary price-3" data-toggle="modal">
                            Thanh Toán
                        </button>


                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
<div class="end_cart">

</div>
@endsection
@push('script')
<script src="{{ asset('user/cart/js/1.js') }}"></script>
<script src="{{ asset('user/cart/js/jquery.easing.1.3.js') }}"></script>
@endpush