@extends('layouts.user')

@push('css')
<link href="{{ asset('user/card/1.css') }}" rel="stylesheet">
@endpush

@section('page')

<section>
    <div class="container-fruid">
        <div class="row">
            <div class="col-lg-9">
                <div id="title-1">
                    <h3>Giỏ hàng <span>(3 sản phẩm)</span></h3>
                </div>
                <div class="row content-1">
                    <div class="col-lg-4">
                        <img src="{{ asset('user/card/images/nhadep.png') }}" alt="">
                    </div>
                    <div class="col-lg-4">
                        <div class="content-2">
                            <p id="title-2">Nhà quận 11 - Gần mặt tiền đường</p>
                            <p>Được đăng tin bởi: <span>Bất Động Sản Cần Thơ</span> </p>
                            <p>Nhân viên tư vấn: Dương Tâm</p>
                            <p>SĐT: 012 345 678</p>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="content-3">
                            <p id="title-3">Giá: 3.9 Tỷ</p>
                            <p>Diện tích: 35,3 m2</p>
                        </div>
                        <div class="delect">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="row content-1">
                    <div class="col-lg-4">
                        <img src="{{ asset('user/card/images/nhadep.png') }}" alt="">
                    </div>
                    <div class="col-lg-4">
                        <div class="content-2">
                            <p id="title-2">Nhà quận 11 - Gần mặt tiền đường</p>
                            <p>Được đăng tin bởi: <span>Bất Động Sản Cần Thơ</span> </p>
                            <p>Nhân viên tư vấn: Dương Tâm</p>
                            <p>SĐT: 012 345 678</p>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="content-3">
                            <p id="title-3">Giá: 3.9 Tỷ</p>
                            <p>Diện tích: 35,3 m2</p>
                        </div>
                        <div class="delect">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="row content-1">
                    <div class="col-lg-4">
                        <img src="{{ asset('user/card/images/nhadep.png') }}" alt="">
                    </div>
                    <div class="col-lg-4">
                        <div class="content-2">
                            <p id="title-2">Nhà quận 11 - Gần mặt tiền đường</p>
                            <p>Được đăng tin bởi: <span>Bất Động Sản Cần Thơ</span> </p>
                            <p>Nhân viên tư vấn: Dương Tâm</p>
                            <p>SĐT: 012 345 678</p>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="content-3">
                            <p id="title-3">Giá: 3.9 Tỷ</p>
                            <p>Diện tích: 35,3 m2</p>
                        </div>
                        <div class="delect">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-left-1">
                    <div class="card-body">
                        <div class="infor-top">
                            <p>Thông tin Khách Hàng Mua</p>
                        </div>
                        <div class="infor-middle">
                            <h4>Nguyễn Phúc</h4>
                            <p>KTX, Đường 30-4, Ninh Kiều, Cần Thơ, VN</p>
                            <p>Điện thoại:&nbsp;&nbsp;&nbsp;&nbsp;0123 456 789</p>

                        </div>
                    </div>
                </div>
                <br>
                <div class="card card-left-2">
                    <div class="card-body">
                        <div class="price-top">
                            <p>Đơn Hàng</p>
                        </div>
                        <div class="price-content">
                            <p id="tt">Nhà quận 11 - Gần mặt tiền đường</p>
                            <p>Tạm tính: 3 900 000 000đ</p>
                            <p>Phí thủ tục: 5 000 000đ</p>
                            <p>Khuyến mãi: 0đ</p>
                        </div>
                        <div class="price-bottom">
                            <p>Thành tiền: </p>
                            <p>&nbsp;&nbsp;&nbsp; 3 900 000 000đ</p>
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
                            <div class="modal-content modal-pay">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title title-4">Chọn Phương thức thanh toán</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="pay-1">
                                        <img src="{{ asset('user/card/images/vnpay.png') }}" alt="">
                                        <p>Ứng dụng VNPay</p>
                                    </div>
                                    <div class="pay-1">
                                        <img src="{{ asset('user/card/images/atm.png') }}" alt="">
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
                                    </div>
                                </div>


                                <!-- Modal footer
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div> -->

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

@endsection
@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{ asset('user/card/js/1.js') }}"></script>
<script src="{{ asset('user/card/js/jquery.easing.1.3.js') }}"></script>
@endpush