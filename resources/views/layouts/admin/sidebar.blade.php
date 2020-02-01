<div class="logo">
    <h4><a href="{{route('duan.index')}}">Light <strong>Blue</strong></a></h4>
</div>
<nav id="sidebar" class="sidebar nav-collapse collapse">
    <ul id="side-nav" class="side-nav">
        <li class="active">
            <a href="{{route('duan.index')}}"><span class="fa fa-home" style="font-size: 17px;"></span> <span>Dự
                    án</span></a>
        </li>
        <li class="active">
            <a href="{{route('khachhang.index')}}">
                <span class="glyphicon glyphicon-user"></span>
                <span class="name">Khách hàng</span></a>
        </li>
        <li class="panel ">
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#side-nav"
                href="#elements-collapse">
                <span class="glyphicon glyphicon-trash"></span>
                <span class="name">Đã xóa</span>
            </a>
            <ul id="elements-collapse" class="panel-collapse collapse ">
                <li class="">
                    <a href="{{route('daxoa.duan')}}">
                        <span class="fa fa-home" style="font-size: 17px;"></span> Dự án
                    </a>
                </li>
            </ul>
        </li>

    </ul>

</nav>