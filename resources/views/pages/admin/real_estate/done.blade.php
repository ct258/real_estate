@extends('layouts.admin')
@push('css')
<style>
    div.b {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 250px;
    }
</style>
@endpush

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
{{-- {{dd($real_estate)}} --}}
<h2 class="page-title">Bất động sản đã bán <br><br></h2>

<div class="row">
    <div class="col-lg-12">
        <section class="widget">
            <div class="table-responsive-fluid">
                <table class="table table-agile-info">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên dự án</th>
                            <th>Địa chỉ</th>
                            <th>Giá trị (đ)</th>
                            <th>Diện tích (m<sup>2</sup>)</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($real_estate as $item)
                        <form>
                            @csrf
                        <tr>
                            <td>{{$item->real_estate_id}}</td>
                            <td>
                                <div class="b">
                                    {{($item->translation_name)}}
                                </div>
                            </td>
                            <td>
                                <div class="b">
                                    {{($item->translation_address)}}
                                </div>
                            </td>
                            <td style="text-align: right">{{number_format($item->real_estate_price)}}</td>
                            <td>{{$item->real_estate_acreage}}</td>
                            <td>
                                <input type="hidden" value="{{$item->real_estate_id}}"  name="getID" id="getID">
                                <div class="btn-group">
                                    <a type="button" href="#" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" id="kiemtra">Kiểm tra</a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title text-danger" id="exampleModalLabel">Kiểm tra lại thông tin lịch hẹn và xác nhận lại trạng thái</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                    <table class="table table-hover">
                                                        <thead>
                                                          <tr>
                                                            <th>Thời gian</th>
                                                            <th>Nội dung</th>
                                                            <th>Trạng thái cuộc hẹn</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody id="table-content-appoitment">
                                                        </tbody>
                                                      </table>
                                                     <a href="{{ route('real_estate.change_status',$item->real_estate_id) }}" class="btn btn-warning">Cập nhật đã bán BĐS</a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </form>
                        @endforeach
                        <tr>
                            <td align="center" colspan="10">

                                {{ $real_estate->links() }}
                            </td>
                        </tr>

                    </tbody>


                </table>
            </div>
        </section>
    </div>
</div>
<section class="widget">
    <table>
        <tr>
            <td>số người đang online: </td>
            <td>{{ $query_result_person[0]}}</td>
        </tr>
        <tr>
            <td>Số người online hôm nay: </td>
            <td>{{ $query_result_person[1]}}</td>
        </tr>
        <tr>
            <td>Lịch sử tổng số lượt truy cập: </td>
            <td>{{ $query_result_person[2]}}</td>
        </tr>
    </table>
</section>






  
@endsection

@push('script')



{{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}
<script type="text/javascript">
    $(document).ready(function () {
        $('#kiemtra').click(function (e) { 
            // e.preventDefault();
            
            // console.log('đã vào');
            var id = $("#getID").val();
            var _token = $("input[name='_token']").val();
            //  console.log(id);

            // $.ajaxSetup({
            //     headers:{
            //         'X-CSRF-Token':'{{csrf_token()}}',
            //     }
            // });

            $.ajax({
                type: "get",
                url: "{{ route('real_estate.getdata') }}",
                data: {_token:_token, id:id},
                dataType: "json",
                success: function (response) {
                $.each(response.success, function () { 
                    //    console.log(this.appointment_time);
                    if(this.appointment_status==1)
                        var strr='<tr><td>'+this.appointment_time+'</td><td>'+this.appointment_content+'</td><td>Đã xử lý</td></tr>';
                    else
                    var strr='<tr><td>'+this.appointment_time+'</td><td>'+this.appointment_content+'</td><td>Đang xử lý</td></tr>';
                    $('#table-content-appoitment').append(strr);
                    });
                }
            });

        });

    });
</script>
@endpush