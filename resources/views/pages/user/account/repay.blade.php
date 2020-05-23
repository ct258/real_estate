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
                <div class="row content-1">
                    <div class="col-lg-4">
                        <img class="avatar" src="{{ asset($re->real_estate_avatar)}}" alt="">
                    </div>
                    <div class="col-lg-4">
                        <div class="content-2">
                            <p id="title-2">{{$re->translation_name}}</p>
                            <select name="deposit" id="deposit" class="form-control">
                                @foreach ($deposit as $item)

                                <option value="{{$item->d_id}}">{{number_format($item->d_amount)}} đ - {{$item->d_time}}
                                    @lang('Day')
                                </option>
                                @endforeach
                            </select>







                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="content-3">
                            <p id="title-4">Giá: {{number_format($re->real_estate_price)}}</p>
                            <p id="title-3">Giá đặt cọc: {{number_format($re->real_estate_deposit)}}</p>
                            <p>Diện tích: {{$re->real_estate_acreage}} m<sup>2</sup></p>
                        </div>
                    </div>
                </div>
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

                        <div class="price-bottom">
                            <p>Thành tiền: </p>
                            <p>&nbsp;&nbsp;&nbsp; {{number_format($deposit[0]->d_amount)}}đ</p>

                        </div>
                    </div>
                </div>
                <br>
                <div class="container">
                    <form action="{{route('VNPay_again')}}" method="post">
                        @csrf
                        <input type="hidden" name="total" value="{{(int)$deposit[0]->d_amount}}">
                        <input type="hidden" name="deposit" value="{{$deposit[0]->d_id}}">
                        <input type="hidden" name="iden" value="{{$re->real_estate_id}}">
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