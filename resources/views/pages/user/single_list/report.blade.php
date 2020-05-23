<span id="phananh"><i class="far fa-comment-alt"></i></span>

<span id="inputGroupPrepend" class="phananh" data-toggle="modal" style="color:red" data-target="#exampleModal">
    @lang('Report')
</span>

<?php if(\Auth::guard('account')->check() &&
\Auth::guard('account')->user()->hasRole('Customer')):?>
<form action="{{ route('customer.report.create.submit',$real_estate->real_estate_id) }}" method="post">
    @csrf

    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('Report')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- <div class="col-sm-5 m-b-xs">
                                                 <select name="content" class="input-sm form-control w-sm inline v-middle">
                                                 <option >Bulk action</option>
                                                 <option >Delete selected</option>
                                                 <option value="2">Bulk edit</option>
                                                 <option value="3">Export</option>
                                                 </select>
                                             </div> --}}

                <div class="modal-body">
                    <div class="col-md-7" id="form02">


                        <label for="recipient-name" class="col-form-label" style="font-weight:bold;"></label>
                        <br>
                        <label for="recipient-name" class="col-form-label">@lang('Name') :</label>
                        <button id="form01"
                            disabled="disabled">{{\Auth::guard('account')->user()->load('customer')->customer->customer_name}}</button>
                        <br>
                        <label for="recipient-name" class="col-form-label">@lang('Phone'):</label>

                        <button id="form01"
                            disabled="disabled">{{\Auth::guard('account')->user()->load('customer')->customer->customer_tel}}</button>

                    </div>

                    <form>
                        <label for="recipient-name" class="col-form-label">@lang('Note rule')</label>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">@lang('Wirte
                                report')</label>
                            <textarea class="form-control" id="message-text" name="content"
                                placeholder="@lang('Content')..."></textarea>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn-primary">@lang('Report')</button>

                </div>
            </div>
        </div>
    </div>
</form>
<?php else: ?>


<form action="" method="post">
    @csrf

    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Phản ánh bài đăng
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- <div class="col-sm-5 m-b-xs">
                                                                 <select name="content" class="input-sm form-control w-sm inline v-middle">
                                                                 <option >Bulk action</option>
                                                                 <option >Delete selected</option>
                                                                 <option value="2">Bulk edit</option>
                                                                 <option value="3">Export</option>
                                                                 </select>
                                                             </div> --}}

                <div class="modal-body" style="text-align: center;">


                    <form>
                        <label for="recipient-name" class="col-form-label">Quên đăng
                            nhập kìa</label>
                        <div class="form-group">
                            <a href="/real_estate/public/login">Nhấp vào đây để đăng
                                nhập</a>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>

                </div>
            </div>
        </div>
    </div>
</form>
<?php endif; ?>