@extends('layouts.admin')
@push('css')
<style>
    .error {
        color: red;
    }
    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
        color:#0000009e;
    }
</style>

@endpush

@section('content')
<div class="col-sm-5" >
      
          <a href="{{route('promotioncode.index')}}" class="tst4 btn btn-warning">Danh sách khuyến mãi
        </a>
</div>
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
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm khuyến mãi
                </header>
                
                <div class="panel-body">
                    <form action="{{ route('promotioncode.create.submit') }}" method="post">
                        @csrf
                        <div class="container-fuild">
                            <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                        <label >Mã code: </label>
                                    <input type="text"  value="{{str_random(6)}}" class="form-control" name="code_code">
                                    </div>
                                    <div class="form-group">
                                        <label>Ghi chú:</label>
                                        <input type="text" class="form-control" name="code_note" >
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Tên mã code:</label>
                                        <input type="text" class="form-control" name="code_name" >
                                    </div>
                                    
                                
                                    <div class="form-group">
                                        <label>Loại khuyến mãi</label>
                                       <select class="form-control" name="code_type_id">
                                        @foreach ($code_type as $val)
                                            <option value="{{$val->code_type_id}}">{{$val->code_type_name}}</option>
                                        @endforeach
                                       </select>
                                   </div>
                                    <div class="form-group">
                                        <label>Bất động sản</label>
                                       <select class="form-control" name="type_id">
                                        @foreach ($type as $val)
                                            <option value="{{$val->type_id}}">{{$val->type_translation_name}}</option>
                                        @endforeach
                                       </select>
                                   </div>
                                </div>
                                <div class="col-sm-6">
                                  
                                    <div class="form-group">
                                        <label >Số lượng: </label>
                                        <input type="text"  class="form-control" name="code_amount" >
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Phần trăm khuyến mãi</label>
                                         <input type="text"  class="form-control" name="code_amount" name="code_per">
                                   </div>
                                   <div class="form-group">
                                        <label >Ngày bắt đầu:</label>
                                        <input type="date" class="form-control"  name="code_begin">
                                    </div>
                                    <div class="form-group">
                                        <label >Ngày kết thúc:</label>
                                        <input type="date" class="form-control" name="code_end">
                                    </div>
                                      
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success btn-block">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>

    </div>
   
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
 

    //ẩn hiện mk
    $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});

</script>

@endsection
@section('script')
{{-- <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> --}}
<script>
    CKEDITOR.replace( 'editor1', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

    } );
</script>
@include('ckfinder::setup')


@endsection