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
                        <img src="{{ asset($item->real_estate_avatar)}}" alt="">
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
                            <p id="title-3">Giá: {{number_format($item->real_estate_price)}}</p>
                            <p>Diện tích: {{$item->real_estate_acreage}} m<sup>2</sup></p>
                        </div>
                        <div class="delect">
                            <i class="fa fa-trash" aria-hidden="true"></i>
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
                            @else
                            {{number_format($total_money*0.02)}}đ</p>

                            @endif
                            <p>Khuyến mãi: 0đ</p>
                            <input type="text" class="" placeholder="Mã giảm giá">
                        </div>
                        <div class="price-bottom">
                            <p>Thành tiền: </p>
                            <p>&nbsp;&nbsp;&nbsp; {{number_format($total_money*1.02)}}đ</p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="container">
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-primary price-3" data-toggle="modal" data-target="#myModal">
                        Thanh Toán
                    </button>

                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content modal-pay" style="    margin-top: 150px;">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title title-4">Chọn Phương thức thanh toán</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="pay-1">

                                        <a href="{{route('VNPay')}}"><img
                                                src="{{ asset('user/cart/images/vnpay.png') }}" alt=""></a>
                                        <p>Ứng dụng VNPay</p>
                                    </div>
                                    <div class="pay-1">

                                        <a href=""><img src="{{ asset('user/cart/images/vnpay.png') }}" alt=""></a>
                                        <p>Thanh toán tiền mặt</p>
                                    </div>
                                    {{-- <div class="pay-1">
                                        <img src="{{ asset('user/cart/images/atm.png') }}" alt="">
                                    <p>Thẻ ATM và tài khoản ngân hàng</p>
                                    <div class="pay-1-1">
                                        <ul>
                                            <li><a href=""><img
                                                        src="https://salt.tikicdn.com/assets/img/zalopaygw/SCB.jpg?v=2"
                                                        alt=""></a></li>
                                            <li><a href=""><img
                                                        src="https://salt.tikicdn.com/assets/img/zalopaygw/VTB.jpg?v=2"
                                                        alt=""></a></li>
                                            <li><a href=""><img
                                                        src="https://salt.tikicdn.com/assets/img/zalopaygw/VCB.jpg?v=2"
                                                        alt=""></a></li>
                                            <li><a href=""><img
                                                        src="https://salt.tikicdn.com/assets/img/zalopaygw/SGCB.jpg?v=2"
                                                        alt=""></a></li>
                                            <li><a href=""><img
                                                        src="https://salt.tikicdn.com/assets/img/zalopaygw/MB.jpg?v=2"
                                                        alt=""></a></li>
                                            <li><a href=""><img
                                                        src="https://salt.tikicdn.com/assets/img/zalopaygw/TCB.jpg?v=2"
                                                        alt=""></a></li>
                                            <li><a href=""><img
                                                        src="https://salt.tikicdn.com/assets/img/zalopaygw/VPB.jpg?v=2"
                                                        alt=""></a></li>
                                            <li><a href=""><img
                                                        src="https://salt.tikicdn.com/assets/img/zalopaygw/VIB.jpg?v=2"
                                                        alt=""></a></li>
                                            <li><a href=""><img
                                                        src="https://salt.tikicdn.com/assets/img/zalopaygw/HDB.jpg?v=2"
                                                        alt=""></a></li>
                                            <li><a href=""><img
                                                        src="https://salt.tikicdn.com/assets/img/zalopaygw/OJB.jpg?v=2"
                                                        alt=""></a></li>
                                            <li><a href=""><img
                                                        src="https://salt.tikicdn.com/assets/img/zalopaygw/SHB.jpg?v=2"
                                                        alt=""></a></li>
                                            <li><a href=""><img
                                                        src="https://salt.tikicdn.com/assets/img/zalopaygw/TPB.jpg?v=2"
                                                        alt=""></a></li>
                                        </ul>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
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