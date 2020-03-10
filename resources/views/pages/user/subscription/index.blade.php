@extends('layouts.user')

@push('css')
<link href="{{ asset('user/subscription/1.css') }}" rel="stylesheet">
@endpush

@section('page')
<div class="recieve">
    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
        Đăng ký nhận thông báo
    </button>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <form action="" method="post">
                <div class="modal-content background">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <p class="modal-title">Đăng ký ngay để nhận thông tin về bất động sản mới và nhanh nhất</p>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="body-content">
                            <div class="table-top">
                                <p>(Vui lòng nhập các tiêu chí để tìm kiếm)</p>
                                <ul>
                                    <li>Tần suất nhận thông báo</li>
                                    <li><input type="checkbox" name="" id="">&nbsp;Ngay tức thì</li>
                                    <li><input type="checkbox" name="" id="">&nbsp;Hàng ngày</li>
                                    <li><input type="checkbox" name="" id="">&nbsp;Hàng tuần</li>
                                </ul>
                            </div>
                            <div class="table-middle">
                                <table>
                                    <tr>
                                        <th>Loại tin rao</th>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control" id="sel1">
                                                    <option>Nhà đất cho thuê</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tỉnh/Thành Phố</th>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control" id="sel1">
                                                    <option>Nhà đất cho thuê</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Quận/Huyện</th>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control" id="sel1">
                                                    <option>Nhà đất cho thuê</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Diện tích</th>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control" id="sel1">
                                                    <option>Nhà đất cho thuê</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Phường/Xã</th>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control" id="sel1">
                                                    <option>Nhà đất cho thuê</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Đường/Phố</th>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control" id="sel1">
                                                    <option>Nhà đất cho thuê</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Mức giá</th>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control" id="sel1">
                                                    <option>Nhà đất cho thuê</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="table-bottom">
                        <h4>Nhận thư báo</h4>
                        <table>
                            <tr>
                                <th>Nhập Email</th>
                                <td>
                                    <input type="text" class="form-control" id="">
                                </td>
                            </tr>
                            <tr>
                                <th>Họ tên</th>
                                <td>
                                    <input type="text" class="form-control" id="">
                                </td>
                            </tr>
                            <tr>
                                <th>Số điện thoại</th>
                                <td>
                                    <input type="text" class="form-control" id="">
                                </td>
                            </tr>
                        </table>
                        <!-- submit -->
                        <div class="submit">
                            <button type="button" class="btn btn-success">Đăng ký</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
@push('script')
<script src="{{ asset('user/subscription/js/2.js') }}"></script>
<script src="{{ asset('user/subscription/js/jquery.easing.1.3.js') }}"></script>
@endpush