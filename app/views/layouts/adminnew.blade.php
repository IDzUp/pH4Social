<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width, user-scalable=no"/>
    <title>Admin</title>
    <!-- Bootstrap Core CSS -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/') }}public/imagesfb/fav.png"/>
{{ HTML::style('public/cssfb/bootstrap.min.css'); }}

{{ HTML::style('public/cssfb/adminstyle.css'); }}


{{ HTML::style('public/fontsfb/stylesheet.css'); }}
{{ HTML::style('public/font-awesome-4.1.0/css/font-awesome.min.css'); }}



<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><span
                        class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="{{ asset('/index.php') }}/admin"><img width="250" height="50"
                                                                                src="{{ asset('/') }}public/<?php echo $logo->path; ?>"
                                                                                alt=""/></a></div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li>
                <a href="{{ asset('/index.php') }}/home" target="_blank">Live Site</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="fa fa-user"></i> {{Auth::user()->name;}} <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <!--    <li> <a href="#"><i class="fa fa-fw fa-user"></i>Profile</a></li>
                       <li> <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a></li> -->
                    <li><a href="{{ asset('/index.php') }}/template"><i class="fa fa-fw fa-gear"></i>Template</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ asset('/index.php') }}/logout"><i class="fa fa-fw fa-power-off"></i>Log Out</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="{{ Request::is( 'admin') ? 'active' : '' }}"><a href="{{ asset('/index.php') }}/admin"><i
                                class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
            <!--     <li class="{{ Request::is( 'logo') ? 'active' : '' }}"><a href="{{ asset('/index.php') }}/logo"><i class="fa fa-fw fa-dashboard"></i> Logo</a> </li> -->
                <li class="{{ Request::is( 'timeline') ? 'active' : '' }}"><a href="{{ asset('/index.php') }}/timeline"><i
                                class="fa fa-fw fa-bar-chart-o"></i> Timeline</a></li>
                <li class="{{ Request::is( 'users','adduser','searchuser') ? 'active' : '' }}"><a
                            href="{{ asset('/index.php') }}/users"><span class="glyphicon glyphicon-user"></span> Users</a>
                </li>
                <li class="{{ Request::is( 'galleryadmin','searchgallery') ? 'active' : '' }}"><a
                            href="{{ asset('/index.php') }}/galleryadmin"><span
                                class="glyphicon glyphicon-picture"></span> Gallery</a></li>
                <li class="{{ Request::is( 'eventadmin','searchevent') ? 'active' : '' }}"><a
                            href="{{ asset('/index.php') }}/eventadmin"><i class="fa fa-fw fa-desktop"></i> Event
                        Manager</a></li>
                <li class="{{ Request::is( 'emails','allemail','confirmmail','contemplate') ? 'active' : '' }}"><a
                            href="{{ asset('/index.php') }}/emails"><span class="glyphicon glyphicon-send"></span> Email</a>
                </li>
                <li class="{{ Request::is( 'viewcontact','contact','searchcontact') ? 'active' : '' }}"><a
                            href="{{ asset('/index.php') }}/viewcontact"><span class="glyphicon glyphicon-send"></span>
                        Contact Us</a></li>
                <li class="{{ Request::is( 'pages','createpage') ? 'active' : '' }}"><a
                            href="{{ asset('/index.php') }}/pages"><span class="glyphicon glyphicon-send"></span> Pages</a>
                </li>
                <li class="{{ Request::is( 'membership','creatememberplan','editmem') ? 'active' : '' }}"><a
                            href="{{ asset('/index.php') }}/membership"><span class="glyphicon glyphicon-send"></span>
                        Membership</a></li>
                <li class="{{ Request::is( 'template','addtemplate') ? 'active' : '' }}"><a
                            href="{{ asset('/index.php') }}/template"><span class="glyphicon glyphicon-cog"></span>
                        Template</a></li>
                <li class="{{ Request::is( 'alllanguage') ? 'active' : '' }}"><a
                            href="{{ asset('/index.php') }}/alllanguage"><span class="glyphicon glyphicon-cog"></span>
                        Language</a></li>
                <li class="{{ Request::is( 'newsetting') ? 'active' : '' }}"><a
                            href="{{ asset('/index.php') }}/newsetting"><span class="glyphicon glyphicon-cog"></span>
                        Settings</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
    <div id="page-wrapper">
        @yield('content')

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery Version 1.11.0 -->


<!-- Morris Charts JavaScript -->


{{ HTML::script('public/jsfb/jquery-1.11.0.js') }}
{{ HTML::script('public/jsfb/bootstrap.min.js') }}


{{ HTML::script('public/jsfb/plugins/morris/raphael.min.js') }}

{{ HTML::script('public/jsfb/plugins/morris/morris.min.js') }}

{{ HTML::script('public/jsfb/plugins/morris/morris-data.js') }}

</body>
</html>
