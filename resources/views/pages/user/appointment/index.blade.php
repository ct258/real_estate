@extends('layouts.user')
@push('css')

@endpush
@section('page')
<div class="container frame mgtop">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="appointment">
                <form action="{{ route('appointment.create',['r_id'=>$real_estate->real_estate_id]) }}" method="post">
                    @csrf
                    <h4>Đặt lịch hẹn</h4>
                    <div class="form-group ">
                        <label for="customer">Tên khách hàng</label>
                    <input type="text" name="customer_name" value="{{$customer->customer_name}}" readonly class="form-control" id="customer">
                      </div>
                    <div class="form-group ">
                        <label for="real">Tên bất động sản </label>
                    <input type="text" name="translation_name" value="{{$real_estate->translation_name}}" readonly class="form-control" id="real">
                    </div>
                    <div class="form-group ">
                        <label for="time">Thời gian </label>
                        <input type="datetime-local" name="time" class="form-control"  id="time">
                    </div>
                    <div class="form-group ">
                        <label for="contnet">Nội dung</label>
                        <textarea class="form-control" id="content" rows="3" name="content"></textarea>
                    </div>
                    <div class="form-group ">
                        <button class="btn-outline-success form-control" type="submit">Đặt lịch</button>
                    </div>
                     
                   
                </form>
            </div>
          
        </div>
        
    </div>
</div>

@endsection
