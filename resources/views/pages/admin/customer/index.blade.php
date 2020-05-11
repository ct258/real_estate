

@extends('layouts.admin')

@section('content')
<style>
  .v-middle{
    padding-left: 25px;
  }

    .error {
        color: red;
    }
    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
        color:#0000009e;

  }
</style>
<div class="container-fuild">
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
</div>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản lý khách hàng
    </div>
    <div class="row w3-res-tb">
      {{-- <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>
      </div> --}}
    <form  action="{{route('customer.find')}}" method="GET">
      <div class="col-sm-2">

        <style>
            .w-sm{
                width:121px!important;
            }
        </style>

<select name="loc" class="input-md form-control w-sm inline v-middle ">

    <option value="0">Thông tin</option>
    <option value="1">Rank</option>
  </select>

      </div>
      <div class="col-sm-3" style="margin-left:-79px;">

        <div class="input-group">
          <input type="text" class="input-md form-control" name="name" placeholder="Tìm kiếm">
          <span class="input-group-btn">
            <button class="btn btn-md btn-default" type="submit">Tìm kiếm</button>
          </span>
        </div>
      </div>

      </form>
      <div class="col-sm-5">

      </div>
      <div class="col-sm-2">
      <div class="col-sm-5" >
        <small>
          <a href="{{route('customer.create')}}" class="tst4 btn btn-success">Thêm khách hàng
        </a></small>
        </div>


    </div>

    </div>


    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>CMND</th>
            <th>RANK</th>
            <th style="width:100px;">Chức năng</th>
          </tr>
          <?php $dem=count($customer)?>
          @foreach ($customer as $val)
          <tr>
           <td>{{$val->customer_name}}</td>
           <td>{{$val->customer_email}}</td>
           <td>{{date('d-m-Y', strtotime($val->customer_birth)) }}</td>
           {{-- <td>{{$val->customer_gender}}</td> --}}
           @if($val->customer_gender==1)
              <td>Nam</td>
            @else
            <td>Nữ</td>
            @endif
           <td>{{$val->customer_address}}</td>
           <td>{{$val->customer_tel}}</td>
           <td>{{$val->customer_identity_card}}</td>
           <td>{{$val->rank_id}}</td>
            <td>
              <a href="{{ route('customer.edit', ['id'=>$val->customer_id]) }}"> <i class="fa fa-edit"></i></a>&nbsp;  &nbsp;  &nbsp;
             <a href="{{ route('customer.destroy', ['id'=>$val->customer_id]) }}"  style="border: none;background-color: Transparent;color: red;"><i class="fa fa-trash-o"></i></a>
            </td>
          </tr>
          @endforeach

        </thead>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">

        <div class="col-sm-5 ">
          <small class="text-muted inline m-t-sm m-b-sm">Danh sách có <strong>{{($customer->total())}}</strong> khách hàng.</small>
        </div>

        <div class="col-sm-5" style="margin-left:-15px">
        </div>
        <div class="col-sm-5">
        {{$customer->links()}}
      </div>

      </div>
    </footer>
  </div>
@endsection
