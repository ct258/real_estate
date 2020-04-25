

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
      Quản lý Báo cáo chưa xử lý
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
            <th style="width:100px;">Chức năng</th>
          </tr>
         @foreach ($report as $temp)
             <tr>
                 <td>{{$temp->report_id}}</td>
                 <td>{{$temp->customer_name}}</td>
                 <td>{{$t->translation_name }}</td>
                 <td>{{$temp->report_content}}</td>
                 <td>{{$temp->report_status}}</td>
                 <td>{{date('d-m-Y',strtotime($temp->created_at))}}</td>
                 <td>
                                       
                                      <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                      Xử lý
                    </button>
                      
                <form action="{{ route('report.update',$temp->report_id) }}" method="post">
                  @csrf
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Bạn có chắc đã xử lý</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                           Phản ánh của khách hàng {{$temp->customer_name}} <br>
                           Nhà đất có id là {{$temp->real_estate_id}} có nội dung phản ánh là {{$temp->report_content}}
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit"  class="btn btn-primary">Đã được xử lý</button>
                            {{-- <button type="submit" class="btn btn-primary">Báo cáo</button> --}}
                          </div>
                        </div>
                      </div>
                    </div>
               </form>
               
                </td>
             </tr>
         @endforeach
        </thead>
      </table>

    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 ">
          <small class="text-muted inline m-t-sm m-b-sm">Danh sách có <strong> {{count($report)}}</strong> báo cáo chờ xử lý.
          </small>
        </div>
        <div class="col-sm-5" style="margin-left:-15px"> 
        </div>
        <div class="col-sm-5"> 
        {{$report->links()}}
      </div>
        
      </div>
    </footer>
  </div>
@endsection
