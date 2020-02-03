<div class="logo">
    <h4><a href="{{route('batdongsan.index')}}">Light <strong>Blue</strong></a></h4>
</div>
<nav id="sidebar" class="sidebar nav-collapse collapse">
    <ul id="side-nav" class="side-nav">
        <li class="active">
            <a href="{{route('batdongsan.index')}}"><span class="fa fa-home" style="font-size: 17px;"></span> <span>Bất
                    động sản</span></a>
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
                    <a href="{{route('daxoa.batdongsan')}}">
                        <span class="fa fa-home" style="font-size: 17px;"></span> Bất động sản
                    </a>
                </li>
            </ul>
        </li>

    </ul>

</nav>