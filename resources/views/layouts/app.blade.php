<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PrevCrime - OPVC </title>
@yield('css')
<!-- Bootstrap -->
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.min.css" rel="stylesheet">


</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>PrevCrime</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="/images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>{{Auth::User()->name}}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-bug"></i> @lang('occurrences.events') <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/"> @lang('occurrences.map_title')</a></li>
                                    <li><a href="/events"> @lang('occurrences.occurrence')</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-users"></i> @lang('user.users_title') <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/users"> @lang('user.users_title')</a></li>
                                    <li><a href="/users/create"> @lang('user.createUser_containerTitle')</a></li>
                                    {{--<li><a href="/users/Access Controll"> @lang('user.users_ACL')</a></li>--}}
                                </ul>
                            </li>


                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                {{--<div class="sidebar-footer hidden-small">--}}
                    {{--<a data-toggle="tooltip" data-placement="top" title="Settings">--}}
                        {{--<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>--}}
                    {{--</a>--}}
                    {{--<a data-toggle="tooltip" data-placement="top" title="FullScreen">--}}
                        {{--<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>--}}
                    {{--</a>--}}
                    {{--<a data-toggle="tooltip" data-placement="top" title="Lock">--}}
                        {{--<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>--}}
                    {{--</a>--}}
                    {{--<a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">--}}
                        {{--<span class="glyphicon glyphicon-off" aria-hidden="true"></span>--}}
                    {{--</a>--}}
                {{--</div>--}}
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="/images/img.jpg" alt="">{{Auth::User()->name}}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> @lang('user.user_profile')</a></li>
                                <li><a href="/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
    @yield('content')
    <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                OPVC - Observatório Permanente Violência & Crime
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="/build/js/custom.min.js"></script>
@yield('script')
</body>
</html>