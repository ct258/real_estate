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
                    Cập nhật tỉ giá
                </header>
                <div class="panel-body">
                    <form action="{{ route('currency.update', ['id'=>$data->currency_id]) }}" method="post">
                        @csrf
                       
                        <div class="container-fuild">
                            <div class="row">
                                <div class="col-sm-6">
                                    
                                    <div class="form-group">
                                        <label>Tên tiền tệ</label>
                                        <input type="text" class="form-control" value=" {{$data->currency_name}}" name="customer_name" >
                                    </div>
                                    <div class="form-group">
                                        <label>Tỉ giá</label>
                                        <input type="text" class="form-control" value=" {{$data->currency_rate}}" name="customer_email" >
                                    </div>
                                    <div class="form-group">
                                        <label >Kí hiệu:</label>
                                        <input type="text" value="{{$data->currency_symbol}}"  readonly class="form-control" >
                                    </div>
                                
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success btn-block">Cập nhật</button>
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