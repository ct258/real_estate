@extends('layouts.admin')
@section('content')
@if($message = Session::get('success'))
<div
    class="messenger-message message alert success message-success alert-success messenger-will-hide-after messenger-will-hide-on-navigate">
    <div class="messenger-message-inner">{{$message}}</div>
    <div class="messenger-spinner">
        <span class="messenger-spinner-side messenger-spinner-side-left">
            <span class="messenger-spinner-fill"></span>
        </span>
        <span class="messenger-spinner-side messenger-spinner-side-right">
            <span class="messenger-spinner-fill"></span>
        </span>
    </div>
</div>
@endif
<h2 class="page-title">HĐ Đặt Cọc<br><br></h2>
<small><a href="{{route('hddc.create')}}" class="tst4 btn btn-success">Thêm</a></small><br><br>
<div class="row">
    <div class="col-lg-12">
        <section class="widget">
            <div class="table-responsive-fluid">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Mã HĐ Đặt cọc</th>
                            <th>Số tiền đặt cọc</th>
                            <th>Ngày đặt cọc</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hddc as $item)
                        <tr>
                            <td>{{$item->hddc_ma}}</td>
                            <td>{{$item->hddc_tiencoc}}</td>
                            <td>{{$item->hddc_ngaydc}}</td>
                        <td>
                                <form action="{{ route('hddc.destroy', $item->hddc_id) }}" method="post"
                                    class="delete_form">
                                    @csrf
                                    <a href="{{route('hddc.show',$item->hddc_id)}}">
                                        <i class="fa fa-info" style="padding: 0px 7px;"></i>
                                    </a>
                                    <a href="{{route('hddc.edit',$item->hddc_id)}}">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <button type="submit"
                                        style="border: none;background-color: Transparent;color: red;">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>

                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
@endsection