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
      
          <a href="{{route('rank.index')}}" class="tst4 btn btn-warning">Danh sách loại thành viên
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
                    Cập nhật loại thành viên
                </header>
                
                <div class="panel-body">
                    <form action="{{ route('rank.update', ['id'=>$data1->rank_id]) }}" method="post">
                        @csrf
                        <div class="container-fuild">
                            <div class="row">
                                <div class="col-sm-12 ">
                                   
                                    <div class="form-group">
                                        <label>Hạng mức</label>
                                           <select class="form-control" name="rank_level" >
                                           <option value="{{$data1->rank_level}}" selected>{{$data1->rank_level}}</option>
                                               @for($i=1 ;$i<=10 ; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                           </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tên loại thành viên (vi):</label>
                                        <input type="text" class="form-control" value="{{$data1->rank_translation_name}}" name="rank_translation_name" >
                                        <label>Tên loại thành viên (en):</label>
                                        <input type="text" class="form-control" value=" {{$data2->rank_translation_name}}" name="rank_translation_name_en" >
                                    </div>
                                    <div class="form-group">
                                        <label >Mô tả (vi):</label>
                                        <input type="text" class="form-control" value=" {{$data1->rank_translation_description}}" name="rank_translation_des" >
                                        <label >Mô tả (en):</label>
                                        <input type="text" class="form-control" value=" {{$data2->rank_translation_description}}" name="rank_translation_des_en" >
                                    </div>
                                    
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