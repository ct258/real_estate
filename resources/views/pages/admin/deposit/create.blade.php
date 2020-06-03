@extends('layouts.admin')
@push('css')
<style>
    .error {
        color: red;
    }
    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
        color:#0000009e;
    }
    .deposit {
    width: 300px;
    margin: 10px auto;
}
</style>

@endpush

@section('content')

{{-- <div class="col-sm-5" >
      
          <a href="{{route('promotion.index')}}" class="tst4 btn btn-warning">Loại khuyến mãi
        </a>
</div> --}}
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
                    Thêm đặt cọc
                </header>
                
                <div class="panel-body">
                    <form action="{{ route('deposit.create') }}" method="post">
                        @csrf
                        <div class="container-fuild">
                            <div class="row">
                                <div class="col-sm-12 ">
                                   
                                  <div class="deposit">
                                        <div class="form-group">
                                            <label>Giá</label>
                                            <input type="text" class="form-control" name="d_amount" >
                                        </div>
                                        <div class="form-group">
                                            <label>Phần trăm:</label>
                                            <input type="text" class="form-control" name="d_per" >
                                        </div>
                                        <div class="form-group">
                                            <label>Số ngày:</label>
                                            <input type="text" class="form-control" name="d_day" >
                                        </div>
                                        <button type="submit" class="btn btn-success btn-block">Lưu</button>
                                  </div>    
                                </div>
                                    
                            </div>
                        </div>
                    </form>
                </div>
            </section>

    </div>
   
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


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