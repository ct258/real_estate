<header class="page-header">
    <div class="navbar">
        <ul class="nav navbar-nav navbar-right pull-right">
            <li class="visible-phone-landscape">
                <a href="#" id="search-toggle">
                    <i class="fa fa-search"></i>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" title="Messages" id="messages" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-comment"></i>
                </a>

            </li>
            <li class="dropdown">
                <a href="#" title="8 support tickets" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-globe"></i>
                    <span class="count">8</span>
                </a>

            </li>
            <li class="divider"></li>
            <li class="hidden-xs">
                <a href="#" id="settings" title="Settings" data-toggle="popover" data-placement="bottom">
                    <i class="glyphicon glyphicon-cog"></i>
                </a>
            </li>
            <li class="hidden-xs dropdown ">
                <a href="#" title="Account" id="account" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i>
                </a>
                <ul class="dropdown-menu dropdown-user animated flipInY in"><a href="#" title="Account" id="account"
                        class="dropdown-toggle" data-toggle="dropdown">
                    </a>
                    <li class="">
                        <a href="{{route('logout')}}">Đăng xuất</a>
                    </li>
                </ul>



            </li>
            <li class="visible-xs">
                <a href="#" class="btn-navbar" data-toggle="collapse" data-target=".sidebar" title="">
                    <i class="fa fa-bars"></i>
                </a>
            </li>
            <li class="hidden-xs"><a href="{{route('logout')}}"><i class="glyphicon glyphicon-off"></i></a></li>
        </ul>
        <form id="search-form" class="navbar-form pull-right" role="search">
            <input type="search" class="form-control search-query" placeholder="Tìm kiếm...">
        </form>

    </div>
</header>