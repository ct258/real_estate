

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
      Quản lý Loại thành viên
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
          <a href="{{route('rank.create')}}" class="tst4 btn btn-success">Thêm Loại thành viên
        </a></small>
        </div>
        
        
    </div>

    </div>
  

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Hạng mức</th>
            <th>Tên loại thành viên</th>
            <th>Mô tả</th>
            <th style="width:100px;">Chức năng</th>
          </tr>
         @foreach ($data as $val)
             <tr>
                 <td>{{$val->rank_level}}</td>
                 <td>{{$val->rank_translation_name}}</td>
                 <td>{{$val->rank_translation_description}}</td>
                 <td>
                    <a href="{{ route('rank.edit', ['id'=>$val->rank_id]) }}"> <i class="fa fa-edit"></i></a>&nbsp;  &nbsp;  &nbsp;
                   <a href="{{ route('rank.destroy', ['id'=>$val->rank_id]) }}"  style="border: none;background-color: Transparent;color: red;"><i class="fa fa-trash-o"></i></a>
                  </td>
             </tr>
         @endforeach
        </thead>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 ">
          <small class="text-muted inline m-t-sm m-b-sm">Danh sách có <strong> {{count($data)}}</strong> loại thành viên
          </small>
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
