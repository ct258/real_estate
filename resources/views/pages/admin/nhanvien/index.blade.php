

@extends('layouts.admin')

@section('content')
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
            
            <option value="0">Họ tên</option>
            <option value="1">ID</option>
            <option value="2">Ngày sinh</option>
            <option value="2">Giới tính</option>
            <option value="2">Địa chỉ</option>
            <option value="2">SĐT</option>
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
        <div class="col-sm-5" ><small><a href="" class="tst4 btn btn-success">Thêm nhân viên
        </a></small>
        </div>
        
        
    </div>

      


    </div>
  
    

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
             <th style="width:20px;">ID
              {{-- <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label> --}}
            </th>
            <th>Họ và tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th style="width:100px;">Chức năng</th>
          </tr>
          <tr>
            <!-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> -->
            <td>1</td>
            <td>nhp</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <form action="" method="post" class="delete_form">
                    @csrf
                    <a href="">&nbsp;&nbsp;
                        <i class="fa fa-info-circle"></i></a>
                    <a href="">
                        <i class="fa fa-edit"></i></a>
                    <button type="submit"
                        style="border: none;background-color: Transparent;color: red;">
                        <i class="fa fa-trash-o"></i></a>
                    </button>

                </form>
              <a href="" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
        </thead>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20 items</small>
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