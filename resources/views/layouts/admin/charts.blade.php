<body>


    <div class="wrap">
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
                        <ul id="messages-menu" class="dropdown-menu messages" role="menu">
                            <li role="presentation">
                                <a href="#" class="message">
                                    <img src="{{asset('img/1.png')}}" alt="">
                                    <div class="details">
                                        <div class="sender">Jane Hew</div>
                                        <div class="text">
                                            Hey, John! How is it going? ...
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="message">
                                    <img src="{{asset('img/2.png')}}" alt="">
                                    <div class="details">
                                        <div class="sender">Alies Rumiancaŭ</div>
                                        <div class="text">
                                            I'll definitely buy this template
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="message">
                                    <img src="{{asset('img/3.png')}}" alt="">
                                    <div class="details">
                                        <div class="sender">Michał Rumiancaŭ</div>
                                        <div class="text">
                                            Is it really Lore ipsum? Lore ...
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="text-align-center see-all">
                                    See all messages <i class="fa fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" title="8 support tickets" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-globe"></i>
                            <span class="count">8</span>
                        </a>
                        <ul id="support-menu" class="dropdown-menu support" role="menu">
                            <li role="presentation">
                                <a href="#" class="support-ticket">
                                    <div class="picture">
                                        <span class="label label-important"><i class="fa fa-bell-o"></i></span>
                                    </div>
                                    <div class="details">
                                        Check out this awesome ticket
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="support-ticket">
                                    <div class="picture">
                                        <span class="label label-warning"><i class="fa fa-question-circle"></i></span>
                                    </div>
                                    <div class="details">
                                        "What is the best way to get ...
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="support-ticket">
                                    <div class="picture">
                                        <span class="label label-success"><i class="fa fa-tag"></i></span>
                                    </div>
                                    <div class="details">
                                        This is just a simple notification
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="support-ticket">
                                    <div class="picture">
                                        <span class="label label-info"><i class="fa fa-info-circle"></i></span>
                                    </div>
                                    <div class="details">
                                        12 new orders has arrived today
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="support-ticket">
                                    <div class="picture">
                                        <span class="label label-important"><i class="fa fa-plus"></i></span>
                                    </div>
                                    <div class="details">
                                        One more thing that just happened
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="text-align-center see-all">
                                    See all tickets <i class="fa fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li class="hidden-xs">
                        <a href="#" id="settings" title="Settings" data-toggle="popover" data-placement="bottom">
                            <i class="glyphicon glyphicon-cog"></i>
                        </a>
                    </li>
                    <li class="hidden-xs dropdown">
                        <a href="#" title="Account" id="account" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                        </a>
                        <ul id="account-menu" class="dropdown-menu account" role="menu">
                            <li role="presentation" class="account-picture">
                                <img src="img/2.png" alt="">
                                Philip Daineka
                            </li>
                            <li role="presentation">
                                <a href="form_account.html" class="link">
                                    <i class="fa fa-user"></i>
                                    Profile
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="component_calendar.html" class="link">
                                    <i class="fa fa-calendar"></i>
                                    Calendar
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="link">
                                    <i class="fa fa-inbox"></i>
                                    Inbox
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="visible-xs">
                        <a href="#" class="btn-navbar" data-toggle="collapse" data-target=".sidebar" title="">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                    <li class="hidden-xs"><a href="login.html"><i class="glyphicon glyphicon-off"></i></a></li>
                </ul>
                <form id="search-form" class="navbar-form pull-right" role="search">
                    <input type="search" class="form-control search-query" placeholder="Search...">
                </form>
                <div class="notifications pull-right">
                    <div class="alert pull-right">
                        <a href="#" class="close ml-xs" data-dismiss="alert">&times;</a>
                        <i class="fa fa-info-circle mr-xs"></i> Check out Light Blue <a id="notification-link"
                            href="#">settings</a> on the right!
                    </div>
                </div>
            </div>
        </header>
        <div class="content container">
            <h1 class="page-title">Visual - <span class="fw-semi-bold">Charts</span></h1>
            <div class="row">
                <div class="col-lg-6 col-xl-5">
                    <section class="widget">
                        <header>
                            <h5>
                                Flot <span class="fw-semi-bold">Stacked Line Chart</span>
                            </h5>
                            <div class="widget-controls">
                                <a data-widgster="expand" title="Expand" href="#"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                                <a data-widgster="collapse" title="Collapse" href="#"><i
                                        class="glyphicon glyphicon-chevron-down"></i></a>
                                <a href="#" data-widgster="close"><i class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </header>
                        <div class="widget-body">
                            <div class="mt mb" id="flot-main" style="width: 100%; height: 250px;"></div>
                            <div class="chart-tooltip" id="flot-main-tooltip" style="opacity: 0"></div>
                            <p class="fs-mini text-muted">
                                Flot is a <span class="fw-semi-bold">pure</span> JavaScript plotting library for jQuery,
                                with a
                                focus on simple usage, attractive looks and interactive features.
                            </p>
                            <h5 class="mt">Interactive <span class="fw-semi-bold">Sparklines</span></h5>
                            <div class="row mt">
                                <div class="col-md-6">
                                    <div class="stats-row">
                                        <div class="stat-item">
                                            <p class="value5 fw-thin">34 567</p>
                                            <h6 class="name text-muted no-margin fs-mini">Overall Values</h6>
                                        </div>
                                        <div class="stat-item stat-item-mini-chart">
                                            <div class="sparkline" data-type="bar" data-bar-color="#ffc247"
                                                data-height="30" data-bar-width="6" data-bar-spacing="2">
                                                9,12,14,15,10,14,20
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stats-row">
                                        <div class="stat-item">
                                            <p class="value5 fw-thin">34 567</p>
                                            <h6 class="name text-muted no-margin fs-mini">Overall Values</h6>
                                        </div>
                                        <div class="stat-item stat-item-mini-chart">
                                            <div class="sparkline" data-type="bar" data-bar-color="#ffedc7"
                                                data-height="30" data-bar-width="6" data-bar-spacing="2">
                                                9,12,14,15,10,14,20
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p class="fs-mini text-muted">
                                This jQuery plugin generates sparklines (small inline charts) directly in the browser
                                using
                                data supplied either inline in the HTML, or via javascript.
                            </p>
                        </div>
                    </section>
                </div>
                <div class="col-lg-6 col-xl-7">
                    <section class="widget">
                        <header>
                            <h5>
                                Flot <span class="fw-semi-bold">Tracking</span>
                            </h5>
                            <div class="widget-controls">
                                <a data-widgster="expand" title="Expand" href="#"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                                <a data-widgster="collapse" title="Collapse" href="#"><i
                                        class="glyphicon glyphicon-chevron-down"></i></a>
                                <a href="#" data-widgster="close"><i class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </header>
                        <div class="widget-body">
                            <div class="mt mb" id="flot-tracking" style="width: 100%; height: 340px;"></div>
                            <p class="fs-mini text-muted">
                                Flot charts can be customized easily due to its <span class="fw-semi-bold">powerful
                                    API</span>.
                                But if you meet any troubles, you are always welcome to contact us to integrate the
                                business l
                                ogic into <span class="fw-semi-bold">SING Admin Dashboard</span>.
                            </p>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="widget">
                        <header>
                            <h5>
                                Flot <span class="fw-semi-bold">Markers</span>
                            </h5>
                            <div class="widget-controls">
                                <a data-widgster="expand" title="Expand" href="#"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                                <a data-widgster="collapse" title="Collapse" href="#"><i
                                        class="glyphicon glyphicon-chevron-down"></i></a>
                                <a href="#" data-widgster="close"><i class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </header>
                        <div class="widget-body">
                            <div class="mt mb" id="flot-markers" style="width: 100%; height: 200px;"></div>
                            <p class="fs-mini text-muted">
                                Points can be marked in several ways, with circles being the built-in default.
                            </p>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 col-xl-8">
                    <section class="widget">
                        <header>
                            <h5>
                                Flot <span class="fw-semi-bold">Bars</span>
                            </h5>
                            <div class="widget-controls">
                                <a data-widgster="expand" title="Expand" href="#"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                                <a data-widgster="collapse" title="Collapse" href="#"><i
                                        class="glyphicon glyphicon-chevron-down"></i></a>
                                <a href="#" data-widgster="close"><i class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </header>
                        <div class="widget-body">
                            <div class="mt-lg mb-4" id="flot-bar" style="width: 100%; height: 400px;"></div>
                            <p class="fs-mini text-muted">
                                Flot is a <span class="fw-semi-bold">pure</span> JavaScript plotting library for jQuery,
                                with a
                                focus on simple usage, attractive looks and interactive features.
                            </p>
                        </div>
                    </section>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <section class="widget">
                        <header>
                            <h5>
                                Flot <span class="fw-semi-bold">Pie Chart</span>
                            </h5>
                            <div class="widget-controls">
                                <a data-widgster="expand" title="Expand" href="#"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                                <a data-widgster="collapse" title="Collapse" href="#"><i
                                        class="glyphicon glyphicon-chevron-down"></i></a>
                                <a href="#" data-widgster="close"><i class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </header>
                        <div class="widget-body">
                            <div class="mt mb-4" id="flot-pie" style="width: 100%; height: 150px;"></div>
                            <p class="fs-mini text-muted">
                                Labels can be hidden if the slice is less than a given percentage of the pie (19% in
                                this case).
                            </p>
                        </div>
                    </section>
                    <section class="widget">
                        <header>
                            <h5>
                                Flot <span class="fw-semi-bold">Donut Chart</span>
                            </h5>
                            <div class="widget-controls">
                                <a data-widgster="expand" title="Expand" href="#"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                                <a data-widgster="collapse" title="Collapse" href="#"><i
                                        class="glyphicon glyphicon-chevron-down"></i></a>
                                <a href="#" data-widgster="close"><i class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </header>
                        <div class="widget-body">
                            <div class="row">
                                <div class="mt mb col-lg-7 col-md-6 col-xs-12" id="flot-donut" style="height: 120px;">
                                </div>
                                <div class="col-lg-4 col-md-5 mt" id="flot-donut-legend"></div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="widget">
                        <header>
                            <h5>
                                Flot <span class="fw-semi-bold">Bars Stacked</span>
                            </h5>
                            <div class="widget-controls">
                                <a data-widgster="expand" title="Expand" href="#"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                                <a data-widgster="collapse" title="Collapse" href="#"><i
                                        class="glyphicon glyphicon-chevron-down"></i></a>
                                <a href="#" data-widgster="close"><i class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </header>
                        <div class="widget-body">
                            <div class="mt-lg" id="flot-bar-stacked" style="width: 100%; height: 200px;"></div>
                        </div>
                    </section>
                </div>
            </div>
            <footer class="content-footer">
                Light Blue 4.0 Ajax Version - Made by <a href="https://flatlogic.com" rel="nofollow noopener noreferrer"
                    target="_blank">Flatlogic</a>
            </footer>
        </div>
        <div class="loader-wrap hiding hide">
            <i class="fa fa-circle-o-notch fa-spin"></i>
        </div>
    </div>
    <!-- common libraries. required for every page-->
    <script src="lib/jquery/dist/jquery.min.js"></script>
    <script src="lib/jquery-pjax/jquery.pjax.js"></script>
    <script src="lib/bootstrap-sass/assets/javascripts/bootstrap.min.js"></script>
    <script src="lib/widgster/widgster.js"></script>
    <script src="lib/underscore/underscore.js"></script>

    <!-- common application js -->
    <script src="js/app.js"></script>
    <script src="js/settings.js"></script>

    <!-- common templates -->
    <script type="text/template" id="settings-template">
        <div class="setting clearfix">
        <div>Sidebar on the</div>
        <div id="sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% onRight = sidebar == 'right'%>
            <button type="button" data-value="left" class="btn btn-sm btn-default <%= onRight? '' : 'active' %>">Left</button>
            <button type="button" data-value="right" class="btn btn-sm btn-default <%= onRight? 'active' : '' %>">Right</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>Sidebar</div>
        <div id="display-sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% display = displaySidebar%>
            <button type="button" data-value="true" class="btn btn-sm btn-default <%= display? 'active' : '' %>">Show</button>
            <button type="button" data-value="false" class="btn btn-sm btn-default <%= display? '' : 'active' %>">Hide</button>
        </div>
    </div>
</script>

    <script type="text/template" id="sidebar-settings-template">
        <% auto = sidebarState == 'auto'%>
    <% if (auto) {%>
    <button type="button"
            data-value="icons"
            class="btn-icons btn btn-transparent btn-sm">Icons</button>
    <button type="button"
            data-value="auto"
            class="btn-auto btn btn-transparent btn-sm">Auto</button>
    <%} else {%>
    <button type="button"
            data-value="auto"
            class="btn btn-transparent btn-sm">Auto</button>
    <% } %>
</script>

    <!-- page specific scripts -->
    <script src="../bower_components/jquery.sparkline/index.js"></script>
    <script src="../bower_components/flot.animator/jquery.flot.animator.min.js"></script>
    <script src="../bower_components/flot/jquery.flot.js"></script>
    <script src="../bower_components/flot-orderBars/js/jquery.flot.orderBars.js"></script>
    <script src="../bower_components/flot/jquery.flot.selection.js"></script>
    <script src="../bower_components/flot/jquery.flot.time.js"></script>
    <script src="../bower_components/flot/jquery.flot.pie.js"></script>
    <script src="../bower_components/flot/jquery.flot.stack.js"></script>
    <script src="../bower_components/flot/jquery.flot.crosshair.js"></script>
    <script src="../bower_components/flot/jquery.flot.symbol.js"></script>
    <!-- page specific js -->
    <script src="js/charts.js"></script>

</body>

</html>