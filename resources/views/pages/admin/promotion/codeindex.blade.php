

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
      Loại khuyến mãi
    </div>
    <div class="row w3-res-tb">

    <div class="col-sm-2">
        <style>
            .w-sm{
                width:121px!important;
            }
        </style>
      </div>
      <div class="col-sm-3" style="margin-left:-79px;">
       
       
      </div>
      <div class="col-sm-5">
        
      </div>
      <div class="col-sm-2">
      <div class="col-sm-5" >
        <small>
          <a href="{{ route('promotioncode.create')}}" class="tst4 btn btn-success">Thêm khuyến mãi
        </a></small>
        </div>
        
        
    </div>

    </div>
  

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên mã code</th>
            <th>Mã code</th>
            <th>Số lượng</th>
            <th>Phần trăm khuyến mãi</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th style="width:100px;">Chức năng</th>
          </tr>
         @foreach ($code as $val)
             <tr>
                 <td>{{$val->code_name}}</td>
                 <td>{{$val->code_code}}</td>
                 <td>{{$val->code_amount}}</td>
                 <td>{{$val->code_per}}</td>
                 <td>{{$val->code_begin}}</td>
                 <td>{{$val->code_end}}</td>
                
                 <td>
                    <a href="{{ route('promotioncode.edit', ['id'=>$val->code_id]) }}"> <i class="fa fa-edit"></i></a>&nbsp;  &nbsp;  &nbsp;
                   <a href="{{ route('promotioncode.destroy', ['id'=>$val->code_id]) }}"  style="border: none;background-color: Transparent;color: red;"><i class="fa fa-trash-o"></i></a>
                  </td>
             </tr>
         @endforeach
        </thead>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 ">
          <small class="text-muted inline m-t-sm m-b-sm">Danh sách có <strong> </strong> khuyến mãi
          </small>
        </div>
       
      </div>
    </footer>
  </div>
@endsection
