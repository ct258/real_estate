@extends('layouts.admin')

@section('content')
<style>
  .v-middle {
    padding-left: 25px;
  }

  .error {
    color: red;
  }

  .table>thead>tr>th,
  .table>tbody>tr>th,
  .table>tfoot>tr>th,
  .table>thead>tr>td,
  .table>tbody>tr>td,
  .table>tfoot>tr>td {
    color: #0000009e;

  }

  input.rateheight {
    /* border: 1px solid; */
    height: 35px;
    border-radius: 5px;
    border: 1px solid;
    padding: 5px 10px;
    font-size: 14px;
    font-weight: bold;
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
        Tiền đặt cọc
      </div>
      <div class="row w3-res-tb">

        <form action="" method="GET">
          <div class="col-sm-2">

            <style>
              .w-sm {
                width: 121px !important;
              }
            </style>



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
          <div class="col-sm-5">
            <small>
              <a href="{{ route('deposit.createform') }}" class="tst4 btn btn-success">Thêm đặc cọc
              </a></small>
          </div>
        </div>

      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Tên nhân viên tạo</th>
              <th>Loại tiền cọc</th>
              <th>Giá/Phần trăm</th>
              <th>Thời gian</th>
              <th style="width:100px;">Chức năng</th>
            </tr>
            @foreach ($data as $val)
            <tr>
              <td>{{$val->staff_name}}</td>
              <td>
                  {{$val->d_amount}}
              </td> 
              @if($val->d_amount !=null)
                <td>Trả theo giá</td>
              @else
                <td>Trả theo phần trăm</td>
              @endif
              <td> {{$val->d_time}} Ngày</td>
              <td>
                <a href="{{ route('deposit.destroy',$val->d_id) }}" style="border: none;background-color: Transparent;color: red;"><i
                    class="fa fa-trash-o"></i></a>
              </td>
            </tr>
            @endforeach



          </thead>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">

          <div class="col-sm-5 ">
            <small class="text-muted inline m-t-sm m-b-sm">Danh sách có <span
            style="color: red; font-weight:bold; font-size:14px; ">{{count($data)}}</span> loại tiền tệ</small>
          </div>

          <div class="col-sm-5" style="margin-left:-15px">
          </div>


        </div>
      </footer>
    </div>
    @endsection