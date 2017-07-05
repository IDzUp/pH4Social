<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Dashboard | Modern Admin</title>
    {{ HTML::style('css/960.css'); }}
    {{ HTML::style('css/reset.css'); }}
    {{ HTML::style('css/text.css'); }}

    <?php
    $i = 1;
    $colors;
    foreach($colors as $hello)
    {


    if($hello->color == 'Green')
    {
    ?>
    {{ HTML::style('css/green.css'); }}
    <?php
    }
    else if($hello->color == 'Blue')
    {
    ?>
    {{ HTML::style('css/blue.css'); }}

    <?php

    }
    else if($hello->color == 'Red')
    {
    ?>


    {{ HTML::style('css/red.css'); }}
    <?php
    }
    else
    {

    ?>

    {{ HTML::style('css/green.css'); }}
    <?php


    }



    }

    ?>





    {{ HTML::style('css/sahil.css'); }}
    {{ HTML::style('css/smoothness/ui.css.css'); }}


    <script type="text/javascript" src="../../ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

    {{ HTML::script('js/blend/jquery.blend.js'); }}
  {{ HTML::script('js/ui.core.js'); }}
   {{ HTML::script('js/ui.sortable.js'); }}
    {{ HTML::script('js/ui.dialog.js'); }}

  {{ HTML::script('js/ui.datepicker.js'); }}
   {{ HTML::script('js/effects.js'); }}
    {{ HTML::script('js/flot/jquery.flot.pack.js'); }}

        {{ HTML::script('js/graphs.js'); }}

    <!--[if IE]>
    <script language="javascript" type="text/javascript" src="js/flot/excanvas.pack.js"></script>
    <![endif]-->
    <!--[if IE 6]>
    <link rel="stylesheet" type="text/css" href="css/iefix.css"/>
    <script src="js/pngfix.js"></script>
    <script>
        DD_belatedPNG.fix('#menu ul li a span span');
    </script>
    <![endif]-->


</head>

<body>
<!-- WRAPPER START -->
<div class="container_16" id="wrapper">
    <!-- HIDDEN COLOR CHANGER -->
    <div style="position:relative;">
        <div id="colorchanger">
            <a href="dashboard_red.html"><span class="redtheme">Red Theme</span></a>
            <a href="dashboard.html"><span class="bluetheme">Blue Theme</span></a>
            <a href="dashboard_green.html"><span class="greentheme">Green Theme</span></a>
        </div>
    </div>
    <!--LOGO-->
    <div class="grid_8" id="logo">Laravel Admin - Website Administration</div>
    <div class="grid_8">
        <!-- USER TOOLS START -->
        <div id="user_tools"><span><a href="#" class="mail">(1)</a> Welcome {{$email = Auth::user()->email;}}<a
                        href="#"> </a>  | <!-- <a class="dropdown" href="#">Change Theme</a>  | --> <a href="logout">Logout</a></span>
        </div>
        <div id="user_tools"><span><a href="#" target="_blank">LIVE SITE</a> </span></div>

    </div>
    <!-- USER TOOLS END -->
    <div class="grid_16" id="header">
        <!-- MENU START -->
        <div id="menu">
            <ul class="group" id="menu_group_main">
                <li class="item first" id="one"><a href="{{ url('/dashboard') }}"
                                                   class="{{ Request::is( 'dashboard') ? 'active' : '' }}"><span
                                class="outer"><span class="inner dashboard">Dashboard</span></span></a></li>
                <li class="item middle" id="two"><a href="{{ url('/viewslider') }}"
                                                    class="{{ Request::is( 'viewslider') ? 'active' : '' }}"><span
                                class="outer"><span class="inner content">View Slider</span></span></a></li>
                <li class="item middle" id="three"><a href="{{ url('/timeline') }}"
                                                      class="{{ Request::is( 'timeline') ? 'active' : '' }}"><span
                                class="outer"><span class="inner reports png">Timeline</span></span></a></li>
                <li class="item middle" id="four"><a href="{{ url('/users') }}"
                                                     class="{{ Request::is( 'users','viewuser') ? 'active' : '' }}"><span
                                class="outer"><span class="inner users">Users</span></span></a></li>
                <li class="item middle" id="five"><a href="{{ url('/galleryadmin') }}"
                                                     class="{{ Request::is( 'galleryadmin') ? 'active' : '' }}"><span
                                class="outer"><span class="inner media_library">Gallery</span></span></a></li>
                <li class="item middle" id="six"><a href="{{ url('/viewevent') }}"
                                                    class="{{ Request::is( 'viewevent') ? 'active' : '' }}"><span
                                class="outer"><span class="inner event_manager">Event Manager</span></span></a></li>
                <li class="item middle" id="seven"><a href="{{ url('/viewcontact') }}"
                                                      class="{{ Request::is( 'contact','viewcontact') ? 'active' : '' }}"><span
                                class="outer"><span class="inner newsletter">Contact Us</span></span></a></li>
                <li class="item last" id="eight"><a href="{{ url('/settings') }}" class="main"><span class="outer"><span
                                    class="inner settings">Settings</span></span></a></li>
            </ul>
        </div>
        <!-- MENU END -->
    </div>
    <div class="grid_16">
        <!-- TABS START -->
        <div id="tabs">
            <div class="container">
                <ul>
                    <li><a href="{{ url('/category') }}" class="{{ Request::is( 'category') ? 'current' : '' }}"><span>Category</span></a>
                    </li>
                    <li><a href="{{ url('/slider') }}" class="{{ Request::is( 'slider') ? 'current' : '' }}"><span>Change Slider</span></a>
                    </li>
                    <li><a href="{{ url('/viewcomment') }}"
                           class="{{ Request::is( 'viewcomment') ? 'current' : '' }}"><span>Comments</span></a></li>
                    <li><a href="{{ url('/contentadd') }}"><span>Content Add</span></a></li>
                    <li><a href="{{ url('/dashboard') }}"><span>Newsletter</span></a></li>
                    <li><a href="{{ url('/adduser') }}" class="{{ Request::is( 'adduser') ? 'current' : '' }}"><span>Add Users</span></a>
                    </li>
                    <li><a href="{{ url('/media') }}" class="{{ Request::is( 'media') ? 'current' : '' }}"><span>Add Media</span></a>
                    </li>
                    <li><a href="{{ url('/eventadd') }}" class="{{ Request::is( 'eventadd') ? 'current' : '' }}"><span>Add Event</span></a>
                    </li>
                    <li><a href="{{ url('/contact') }}" class="{{ Request::is( 'contact') ? 'current' : '' }}"><span>Add Contact</span></a>
                    </li>
                    <li><a href="{{ url('/menu') }}"
                           class="{{ Request::is( 'menu') ? 'current' : '' }}"><span>Submenus</span></a></li>
                    <li><a href="{{ url('/blogadd') }}" class="more"><span>Blog</span></a></li>
                </ul>
            </div>
        </div>
        <!-- TABS END -->
    </div>
    <!-- HIDDEN SUBMENU START -->
    <div class="grid_16" id="hidden_submenu">
        <ul class="more_menu">
            <li><a href="#">More link 1</a></li>
            <li><a href="#">More link 2</a></li>
            <li><a href="#">More link 3</a></li>
            <li><a href="#">More link 4</a></li>
        </ul>
        <ul class="more_menu">
            <li><a href="#">More link 5</a></li>
            <li><a href="#">More link 6</a></li>
            <li><a href="#">More link 7</a></li>
            <li><a href="#">More link 8</a></li>
        </ul>
        <ul class="more_menu">
            <li><a href="#">More link 9</a></li>
            <li><a href="#">More link 10</a></li>
            <li><a href="#">More link 11</a></li>
            <li><a href="#">More link 12</a></li>
        </ul>
    </div>
    <!-- HIDDEN SUBMENU END -->

    <!-- CONTENT START -->
    <div class="grid_16" id="content">
        <!--  TITLE START  -->
        @yield('content')


        <div class="clear"></div>
        <!-- END CONTENT-->
    </div>
    <div class="clear"></div>

    <!-- This contains the hidden content for modal box calls -->
    <div class='hidden'>
        <div id="inline_example1" title="This is a modal box" style='padding:10px; background:#fff;'>
            <p><strong>This content comes from a hidden element on this page.</strong></p>

            <p><strong>Try testing yourself!</strong></p>
            <p>You can call as many dialogs you want with jQuery UI.</p>
        </div>
    </div>
</div>
<!-- WRAPPER END -->
<!-- FOOTER START -->
<div class="container_16" id="footer">
    Website Administration by <a href="#">
        <?php

        $colors;
        foreach ($colors as $hello) {

            echo $hello->color;

        }


        ?>
    </a></div>
<!-- FOOTER END -->
</body>
</html>
