@php
    $name = Route::currentRouteName();
 $explode = explode('.', $name);
    $prefix = $explode[0];
    $route = $explode[1];
@endphp
        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PrevCrime - OPVC</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/opvc.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/dist/css/skins/skin-blue.css">

    <link rel="stylesheet" href="/vendors/font-ufp/styles.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b class="icon-ufp"></b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b class="icon-ufp"></b>Prevcrime</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset("storage/".Auth::user()->profile->photo)}}" class="user-image"
                                 alt="User Image">
                            <span class="hidden-xs">{{Auth::User()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/user/profile/{{Auth::user()->id}}"> @lang('user.user_profile')</a></li>
                            <li><a href="/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                           aria-expanded="false">{{strtoupper (App::getLocale())}}
                            <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach (config('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <li><a href="{{ route('lang.switch', $lang) }}">{{$language}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset("storage/".Auth::user()->profile->photo)}}" class="img-circle" alt="User Image"
                         style="height: 45px; width: 45px;">
                </div>
                <div class="pull-left info">
                    <p><span>@lang('user.user_welcome'),</span></p>
                    <p>{{Auth::User()->name}}</p>
                </div>
            </div>
            <!-- search form -->

            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="treeview {!! $prefix == 'event'? 'active': '' !!}">
                    <a href="#">
                        <i class="fa fa-bug"></i>
                        <span> @lang('occurrences.events')</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{!! $route == 'map'? 'active': '' !!}"><a
                                    href="/"> @lang('occurrences.map_title')</a></li>
                        <li class="{!! $route == 'list'? 'active': '' !!}"><a
                                    href="/events"> @lang('occurrences.occurrence')</a></li>
                        <li class="{!! $route == 'statistics'? 'active': '' !!}"><a
                                    href="/statistics"> @lang('occurrences.events_statistics')</a></li>
                    </ul>
                </li>


                <li class="treeview {!! $prefix == 'user'? 'active': '' !!}">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span> @lang('user.users_title')</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{!! $route == 'list'? 'active': '' !!}"><a
                                    href="/users"> @lang('user.users_title')</a></li>
                        <li class="{!! $route == 'create'? 'active': '' !!}"><a
                                    href="/users/create"> @lang('user.createUser_containerTitle')</a></li>
                        {{--<li><a href="/users/Access Controll"> @lang('user.users_ACL')</a></li>--}}
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
        <div class="clearfix"></div>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer no-print" style="
    text-align: right;">
        OPVC - Observatório Permanente Violência & Crime
    </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/app.min.js"></script>

@yield('script')
</body>
</html>
