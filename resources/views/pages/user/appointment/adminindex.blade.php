

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
     Danh sách lịch hẹn
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
        
        </div>
      </div>
      <div class="col-sm-5">
        
      </div>
      <div class="col-sm-2">
      <div class="col-sm-5" >
       
        </div>
        
        
    </div>

    </div>
  

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Nội dung cuộc hẹn</th>
            <th>Thời gian cuộc hẹn</th>
            <th>Cập nhật trạng thái</th>
            <th style="width:100px;">Chức năng</th>
          </tr>
        </thead>
        <tbody>
     
           
            @foreach ($result as $val)
                <tr>
                    <td>{{$val->appointment_content}}</td>
                    <td>{{$val->appointment_time}}</td>
                    <td>    
                        @if($val->appointment_status==0)
                        <a href="{{ route('appointment.admin.status', ['id'=>$val->appointment_id]) }}"><i style="color:red; font-size: 20px; margin-left: 50px;" class="fa fa-calendar-times-o" aria-hidden="true"></i></a>
                        @elseif($val->appointment_status==1)
                        <a href="{{ route('appointment.admin.status', ['id'=>$val->appointment_id])}}"><i style="color:color: #1b00ff; font-size: 20px; margin-left: 50px;" class="fa fa-calendar-check-o" aria-hidden="true"></i></a>
                        @endif
                       
                    </td>
                    <td>
                        <a href="{{ route('appointment.admin.destroy', ['id'=>$val->appointment_id]) }}"  style="border: none;background-color: Transparent;color: red;"><i class="fa fa-trash-o"></i></a>
                      </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 ">
          <small class="text-muted inline m-t-sm m-b-sm">Danh sách có <strong> </strong> loại thành viên
          </small>
        </div>
       
      </div>
    </footer>
  </div>
@endsection
