

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
      Quản lý nhân viên
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
    <div class="col-sm-2">
        <style>
            .w-sm{
                width:121px!important;
            }
        </style>
        <select class="input-md form-control w-sm inline v-middle ">
            
            <option value="">Họ tên</option>
            <option value="">ID</option>
            <option value="">Ngày sinh</option>
            <option value="">Giới tính</option>
            <option value="">Địa chỉ</option>
            <option value="">SĐT</option>
          </select>
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
          <a href="{{route('staff.create')}}" class="tst4 btn btn-success">Thêm nhân viên
        </a></small>
        </div>
        
        
    </div>

      


    </div>
  
    

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Mã nhân viên</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th style="width:100px;">Chức năng</th>
          </tr>
          @foreach ($staff as $val)
          <tr>
           <td>{{$val->staff_code}}</td>
           <td>{{$val->staff_name}}</td>
           <td>{{$val->staff_email}}</td>
           <td>{{date('d-m-Y', strtotime($val->staff_birth)) }}</td>
           @if($val->staff_gender)
              <td>Nam</td>
            @else
            <td>Nữ</td>
            @endif
           <td>{{$val->staff_address}}</td>
           <td>{{$val->staff_tel}}</td>
            
            <td>
              <a href="{{ route('staff.edit', ['id'=>$val->staff_id]) }}"> <i class="fa fa-edit"></i></a>&nbsp;  &nbsp;  &nbsp;
             <a href="{{ route('staff.destroy', ['id'=>$val->staff_id]) }}"  style="border: none;background-color: Transparent;color: red;"><i class="fa fa-trash-o"></i></a>
            </td>
          </tr>
          @endforeach
         
        </thead>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 ">
          <small class="text-muted inline m-t-sm m-b-sm">Danh sách có <strong>{{count($staff)}}</strong> nhân viên.</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a>
                
            </li>
          </ul>
        </div>
      </div>
    </footer>
  </div>




@endsection