<!-- light-blue - v4.0.1 - 2018-10-31 -->

<!DOCTYPE html>
<html>
<head>
    <title>Light Blue - Responsive Admin Dashboard Template</title>

        <link href="css/application.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <script>
        /* yeah we need this empty stylesheet here. It's cool chrome & chromium fix
           chrome fix https://code.google.com/p/chromium/issues/detail?id=167083
                      https://code.google.com/p/chromium/issues/detail?id=332189
        */
    </script>
</head>
<body>
    <div class="logo">
        <h4><a href="index.html">Light <strong>Blue</strong></a></h4>
    </div>
        <nav id="sidebar" class="sidebar nav-collapse collapse">
            <ul id="side-nav" class="side-nav">
                <li class="">
                    <a href="index.html"><i class="fa fa-home"></i> <span class="name">Dashboard</span></a>
                </li>
                <li class="active">
                    <a href="typography.html"><i class="fa fa-font"></i> Typography</a></li>
                </li>
                <li class="">
                    <a href="tables.html"><i class="fa fa-table"></i> Tables</a></li>
                </li>
                <li class="">
                    <a href="notifications.html"><i class="fa fa-bell"></i> Notifications</a></li>
                </li>
                <li class="panel ">
                    <a class="accordion-toggle collapsed" data-toggle="collapse"
                       data-parent="#side-nav" href="#elements-collapse"><i class="fa fa-magic"></i> <span class="name">Elements</span></a>
                    <ul id="elements-collapse" class="panel-collapse collapse ">
                        <li class=""><a href="charts.html">Charts</a></li>
                        <li class=""><a href="icons.html">Icons</a></li>
                        <li class=""><a href="maps.html" data-no-pjax>Maps</a></li>
                    </ul>
                </li>
            </ul>
        
            <h5 class="sidebar-nav-title">Labels <a class="action-link" href="#"><i class="glyphicon glyphicon-plus"></i></a></h5>
            <!-- some styled links in sidebar. ready to use as links to email folders, projects, groups, etc -->
            <ul class="sidebar-labels">
                <li>
                    <a href="#">
                        <!-- yep, .circle again -->
                        <i class="fa fa-circle text-warning"></i>
                        <span class="label-name">My Recent</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-circle text-gray"></i>
                        <span class="label-name">Starred</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-circle text-danger"></i>
                        <span class="label-name">Background</span>
                    </a>
                </li>
            </ul>
        
            <h5 class="sidebar-nav-title">Projects</h5>
            <!-- A place for sidebar notifications & alerts -->
            <div class="sidebar-alerts">
                <div class="alert fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
                    <span class="text-white fw-semi-bold">Sales Report</span> <br>
                    <div class="progress progress-xs mt-xs mb-0">
                        <div class="progress-bar progress-bar-gray-light" style="width: 16%"></div>
                    </div>
                    <small>Calculating x-axis bias... 65%</small>
                </div>
                <div class="alert fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
                    <span class="text-white fw-semi-bold">Personal Responsibility</span> <br>
                    <div class="progress progress-xs mt-xs mb-0">
                        <div class="progress-bar progress-bar-danger" style="width: 23%"></div>
                    </div>
                    <small>Provide required notes</small>
                </div>
            </div>
        </nav>    <div class="wrap">
        <header class="page-header">
            <div class="navbar">
                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="visible-phone-landscape">
                        <a href="#" id="search-toggle">
                            <i class="fa fa-search"></i>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" title="Messages" id="messages"
                           class="dropdown-toggle"
                           data-toggle="dropdown">
                            <i class="glyphicon glyphicon-comment"></i>
                        </a>
                        <ul id="messages-menu" class="dropdown-menu messages" role="menu">
                            <li role="presentation">
                                <a href="#" class="message">
                                    <img src="img/1.png" alt="">
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
                                    <img src="img/2.png" alt="">
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
                                    <img src="img/3.png" alt="">
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
                        <a href="#" title="8 support tickets"
                           class="dropdown-toggle"
                           data-toggle="dropdown">
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
                        <a href="#" id="settings"
                           title="Settings"
                           data-toggle="popover"
                           data-placement="bottom">
                            <i class="glyphicon glyphicon-cog"></i>
                        </a>
                    </li>
                    <li class="hidden-xs dropdown">
                        <a href="#" title="Account" id="account"
                           class="dropdown-toggle"
                           data-toggle="dropdown">
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
                        <a href="#"
                           class="btn-navbar"
                           data-toggle="collapse"
                           data-target=".sidebar"
                           title="">
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
                        <i class="fa fa-info-circle mr-xs"></i> Check out Light Blue <a id="notification-link" href="#">settings</a> on the right!
                    </div>
                </div>
            </div>
        </header>        <div class="content container">
        <h1 class="page-title">Typography - <span class="fw-semi-bold">Texts & Display</span></h1>
        <div class="row">
            <div class="col-md-6">
                <section class="widget">
                    <header>
                        <h5>
                            Headings
                            <small>Default and customized</small>
                        </h5>
                        <div class="widget-controls">
                            <a data-widgster="expand" title="Expand" href="#" style="display: none;"><i class="glyphicon glyphicon-chevron-up"></i></a>
                            <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-chevron-down"></i></a>
                            <a data-widgster="close" title="Close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </header>
                    <div class="widget-body">
                        <h4>Default headings</h4>
                        <p>Basic headings for everyday use</p>
                        <div class="widget-padding-md border rounded">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h1>h1. Heading</h1>
                                    <h2>h2. Heading</h2>
                                    <h3>h3. Heading</h3>
                                    <h4>h4. Heading</h4>
                                    <h5>h5. Heading</h5>
                                    <h6>h6. Heading</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h1 class="text-danger">h1. Heading</h1>
                                    <h2 class="text-warning">h2. Heading</h2>
                                    <h3 class="text-success">h3. Heading</h3>
                                    <h4 class="text-primary">h4. Heading</h4>
                                    <h5 class="text-info">h5. Heading</h5>
                                    <h6 class="text-inverse">h6. Heading</h6>
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-5">Customized headings</h4>
                        <p>Enhanced with additional text</p>
                        <div class="widget-padding-md border rounded">
                            <h3>
                                Headings
                                <small>And some clarification text</small>
                            </h3>
                        </div>
                        <h4 class="mt-5">Display</h4>
                        <p>Headings to stand out</p>
                        <div class="widget-padding-md border rounded">
                            <h1 class="display-1">Display 1</h1>
                            <h1 class="display-2">Display 2</h1>
                            <h1 class="display-3">Display 3</h1>
                            <h1 class="display-4">Display 4</h1>
                        </div>
                        <h4 class="mt-5">Lead</h4>
                        <p>Make a paragraph stand out by adding <code class="highlighter-rouge">.lead</code>.</p>
                        <div class="widget-padding-md border rounded">
                            <p class="lead">Sing App is admin dashboard template built with Bootstrap</p>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-6">
                <section class="widget">
                    <header>
                        <h5>
                            Body texts
                            <small>Variations</small>
                        </h5>
                        <div class="widget-controls">
                            <a data-widgster="expand" title="Expand" href="#" style="display: none;"><i class="glyphicon glyphicon-chevron-up"></i></a>
                            <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-chevron-down"></i></a>
                            <a data-widgster="close" title="Close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </header>
                    <div class="widget-body">
                        <h4>Basic texts</h4>
                        <p>Styling for common texts</p>
                        <div class="widget-padding-md border rounded">
                            <p>You can use the mark tag to <mark>highlight</mark> text.</p>
                            <p><del>This line of text is meant to be treated as deleted text.</del></p>
                            <p><ins>This line of text is meant to be treated as an addition to the document.</ins></p>
                            <p><small>This line of text is meant to be treated as fine print.</small></p>
                            <p><em>This line rendered as italicized text.</em></p>
                            <p><strong>This line rendered as bold text.</strong></p>
                        </div>
                        <h4 class="mt-5">Font weights</h4>
                        <p>Various font weights supported</p>
                        <div class="widget-padding-md border rounded">
                            <p>Thin (default) font weight</p>
                            <p class="fw-normal">Normal font weight</p>
                            <p class="fw-semi-bold">Semi bold to empasize important thing</p>
                            <p class="fw-bold">Bold font as a high priority</p>
                        </div>
                        <h4 class="mt-5">Colors</h4>
                        <p>Bootstrap state colors can be applied to texts too</p>
                        <div class="widget-padding-md border rounded">
                            <p class="text-danger">Some danger text</p>
                            <p class="text-warning">Some warning text</p>
                            <p class="text-success">Some succes text</p>
                            <p class="text-primary">Some primary text</p>
                            <p class="text-info">Some info text</p>
                        </div>
                        <h4 class="mt-5">Blockquotes</h4>
                        <p>Citing someone is really easy</p>
                        <div class="widget-padding-md border rounded">
                            <blockquote class="blockquote">
                                <p>Don't get set into one form, adapt it and build your own, and let
                                    it grow, be like water. Empty your mind, be formless, shapeless — like water.
                                    Now you put water in a cup, it becomes the cup; You put water into a bottle it
                                    becomes the bottle; You put it in a teapot it becomes the teapot. Now water can
                                    flow or it can crash. Be water, my friend.</p>
                                <footer class="blockquote-footer">Bruce Lee in <cite title="A Warrior's Journey">A Warrior's Journey</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </section>
            </div>
        </div>
            <footer class="content-footer">
                Light Blue 4.0 Ajax Version - Made by <a href="https://flatlogic.com" rel="nofollow noopener noreferrer" target="_blank">Flatlogic</a>
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

</body>
</html>