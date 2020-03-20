@extends('layouts.admin')
@section('content')

<!-- page start-->
<div class="mail-w3agile">
    <div class="row">
        <div class="col-sm-3 com-w3ls">
            <section class="panel">
                <div class="panel-body">
                    <a href="{{route('email_compose')}}" class="btn btn-compose">
                        Soạn Mail
                    </a>
                    <ul class="nav nav-pills nav-stacked mail-nav">
                        <li class="active"><a href="mail.html"> <i class="fa fa-inbox"></i> Hộp Thư Đến <span
                                    class="label label-danger pull-right inbox-notification">9</span></a></li>
                        <li><a href="#"> <i class="fa fa-envelope-o"></i> Đã Gửi</a></li>
                        <li><a href="#"> <i class="fa fa-certificate"></i> Quan Trọng</a></li>
                        <li><a href="#"> <i class="fa fa-file-text-o"></i> Thư Nháp <span
                                    class="label label-info pull-right inbox-notification">123</span></a></a></li>
                        <li><a href="#"> <i class="fa fa-trash-o"></i> Thùng Rác</a></li>
                    </ul>
                </div>
            </section>

            <section class="panel">
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked labels-info ">
                        <li>
                            <h4>Bạn Bè Online</h4>
                        </li>
                        <li> <a href="#"> <i class="fa fa-comments-o text-success"></i> Jonathan Smith <p>I do not think
                                </p></a> </li>
                        <li> <a href="#"> <i class="fa fa-comments-o text-danger"></i> iRon <p>Busy with coding</p></a>
                        </li>
                        <li> <a href="#"> <i class="fa fa-comments-o text-muted "></i> Anjelina Joli <p>I out of control
                                </p></a></li>
                        <li> <a href="#"> <i class="fa fa-comments-o text-muted "></i> Samual Daren <p>I am not here</p>
                                </a></li>
                        <li> <a href="#"> <i class="fa fa-comments-o text-muted "></i> Tis man <p>I do not think</p></a>
                        </li>
                    </ul>
                    <a href="#"> + Thêm Mới</a>

                    <div class="inbox-body text-center inbox-action">
                        <div class="btn-group">
                            <a class="btn mini btn-default" href="javascript:;">
                                <i class="fa fa-power-off"></i>
                            </a>
                        </div>
                        <div class="btn-group">
                            <a class="btn mini btn-default" href="javascript:;">
                                <i class="fa fa-cog"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-sm-9 mail-w3agile">
            <section class="panel">
                <header class="panel-heading wht-bg">
                    <h4 class="gen-case"> Soạn Mail
                        <form action="#" class="pull-right mail-src-position">
                            <div class="input-append">
                                <input type="text" class="form-control " placeholder="Search Mail">
                            </div>
                        </form>
                    </h4>
                </header>
                <div class="panel-body">
                    <div class="compose-btn pull-right">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Gửi</button>
                        <button class="btn btn-sm"><i class="fa fa-times"></i> Xóa</button>
                        <button class="btn btn-sm">Nháp</button>
                    </div>
                    <div class="compose-mail">
                        <form role="form-horizontal" method="post">
                            <div class="form-group">
                                <label for="to" class="">To:</label>
                                <input type="text" tabindex="1" id="to" class="form-control">

                                <div class="compose-options">
                                    <a onclick="$(this).hide(); $('#cc').parent().removeClass('hidden'); $('#cc').focus();"
                                        href="javascript:;">Cc</a>
                                    <a onclick="$(this).hide(); $('#bcc').parent().removeClass('hidden'); $('#bcc').focus();"
                                        href="javascript:;">Bcc</a>
                                </div>
                            </div>

                            <div class="form-group hidden">
                                <label for="cc" class="">Cc:</label>
                                <input type="text" tabindex="2" id="cc" class="form-control">
                            </div>

                            <div class="form-group hidden">
                                <label for="bcc" class="">Bcc:</label>
                                <input type="text" tabindex="2" id="bcc" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="subject" class="">Subject:</label>
                                <input type="text" tabindex="1" id="subject" class="form-control">
                            </div>

                            <div class="compose-editor">
                                <textarea class="wysihtml5 form-control" rows="9"></textarea>
                                <input type="file" class="default">
                            </div>
                            <div class="compose-btn">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Gửi</button>
                                <button class="btn btn-sm"><i class="fa fa-times"></i> Xóa</button>
                                <button class="btn btn-sm">Nháp</button>
                            </div>

                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- page end-->
</div>

@endsection