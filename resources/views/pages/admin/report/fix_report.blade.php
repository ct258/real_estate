

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
      Quản lý Báo cáo đã xử lý
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
       
        <div class="input-group">
          <input type="text" class="input-md form-control" placeholder="Tìm kiếm">
          <span class="input-group-btn">
            <button class="btn btn-md btn-default" type="button">Tìm kiếm</button>
          </span>
        </div>
      </div>
      <div class="col-sm-5">
        
      </div>
      <div class="col-sm-2">
      <div class="col-sm-5" >
        <small>
          {{-- <a href="" class="tst4 btn btn-success">Thêm Loại thành viên --}}
        </a></small>
        </div>
        
        
    </div>

    </div>
  

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên khách hàng</th>
            <th>Phản ánh nhà đất</th>
            <th>Nội dung</th>
            <th>Trạng thái</th> 
            <th>Thời gian</th>
            {{-- <th style="width:100px;">Chức năng</th> --}}
          </tr>
         @foreach ($report as $tem =>$temp)
             <tr>
                 <td>{{$temp->report_id}}</td>
                 <td>{{$temp->customer_name}}</td>
                 <td>{{$temp->translation_name  }}</td>
                 <td>{{$temp->report_content}}</td>
                 <td>{{$temp->report_status}}</td>
                 <td>{{date('d-m-Y',strtotime($temp->created_at))}}</td>
                 {{-- <td>
                
                   <a href=""  style=" position: relative; top: -8px; right: -19px; font-size:25px ;border: 2px;background-color: Transparent;color: #  0078f4;"><i class="fa fa-wrench" aria-hidden="true"></i></i> </a>
                  </td> --}}
             </tr>
         @endforeach
        </thead>
      </table>
     
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 ">
          <small class="text-muted inline m-t-sm m-b-sm">Danh sách có <strong> {{count($report)}}</strong> báo cáo đã xử lý.
          </small>
         
      </div>
    </footer> 
  
    <div class="col-sm-5" style="margin-left:-15px"> 
    </div>
    <div class="col-sm-5"> 
    {{$report->links()}}
  </div>
  
  </div>
@endsection
