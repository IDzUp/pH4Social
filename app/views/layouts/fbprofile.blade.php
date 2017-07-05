<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <!-- <meta content="width=device-width, initial-scale=1" name="viewport"> -->
    <meta name="viewport" content="width=device-width, user-scalable=no"/>
    <meta content="{{$set->title}}" name="description">
    <meta content="" name="author">
    <meta name="keywords" content="{{$set->meta}}">
    <meta name="_token" content="{{ csrf_token() }}"/>

    <title>Member</title>
    <!-- Bootstrap core CSS -->

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/') }}public/imagesfb/fav.png"/>


    {{ HTML::style('public/cssfb/datepicker.css'); }}

    {{ HTML::style('public/cssfb/bootstrap.min.css'); }}


    {{ HTML::script('public/jsfb/response.js') }}
    {{ HTML::script('public/jsfb/response1.js') }}



    <?php


    foreach($colors as $hello)
    {


    if($hello->publish == 'on')
    {

    $value = 'public/' . $hello->other;
    ?>

    {{ HTML::style($value); }}
    <?php
    }

    }

    ?>









    {{ HTML::style('public/fontsfb/stylesheet.css'); }}

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(window).on('hashchange', function () {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                } else {
                    getPosts(page);
                }
            }
        });
        $(document).ready(function () {

            $(document).on('click', '.pagination li > aa', function (e) {

                var url = window.location.href;

                var last = url.substring(url.lastIndexOf("/") + 1, url.length);
                if (last.match("^news")) {
                    //alert(last);
                    var i = 0;
                    getPosts($(this).attr('href').split('page=')[1], i);
                    e.preventDefault();

                }
                else if (last.match("^profile")) {

                    var i = 0;
                    getPostss($(this).attr('href').split('page=')[1], i);
                    e.preventDefault();
                }
                else {

                    var i = 0;
                    getPostsss($(this).attr('href').split('page=')[1], i);
                    e.preventDefault();
                }


            });
        });
        function getPosts(page, i) {


            if (i == 0) {
                $('#help').show();
                $('#help').html('<img src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...');


                $.ajax({
                    url: '?page=' + page,
                    dataType: 'json',
                }).done(function (data) {



//alert(data);
                    $('#pppost').html('');
                    $('.pagenav').html('');
                    $('#pppost').html(data['contents']);

                    $('#help').hide("slow");
//$('body').append(data['contents']);


                    location.hash = page;
                }).fail(function () {
                    alert('Posts could not be loaded.');
                });
                i++;
            }

        }


        function getPostss(page, i) {


            if (i == 0) {
                $('#help').show();
                $('#help').html('<img src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...');


                $.ajax({
                    url: '?page=' + page,
                    dataType: 'json',
                }).done(function (data) {



//alert(data);
                    $('#pppost').html('');
                    $('.pagenav').html('');
                    $('#pppost').html(data['contents']);

                    $('#help').hide("slow");
//$('body').append(data['contents']);


                    location.hash = page;
                }).fail(function () {
                    alert('Posts could not be loaded.');
                });
                i++;
            }

        }

        function getPostsss(page, i) {


            if (i == 0) {
                $('#help').show();
                $('#help').html('<img src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...');


                $.ajax({
                    url: '?page=' + page,
                    dataType: 'json',
                }).done(function (data) {



//alert(data);
                    $('#pppost').html('');
                    $('.pagenav').html('');
                    $('#pppost').html(data['contents']);

                    $('#help').hide("slow");
//$('body').append(data['contents']);


                    location.hash = page;
                }).fail(function () {
                    alert('Posts could not be loaded.');
                });
                i++;
            }

        }


    </script>


</head>
<body onload="_l='t';">

<header class="member_header">
    <div class="container header_wid">
        <div class="row">
            <div id="logos" class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="logo_member"><a href="{{ asset('/index.php/profile') }}"><img width="250" height="50"
                                                                                          src="{{ asset('/') }}public/<?php echo $logo->path; ?>"
                                                                                          alt=""/></a></div>

            </div>


            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                <input type="hidden" name="random" value="<?php echo Auth::user()->rand;?>">


                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

                <script type="text/javascript">

                    $(function () {

                        var ajax_call = function () {

                            var token = $("input[name=random]").val();
                            $.ajax({

                                type: "GET",
                                url: "/notification/" + token,
                                data: '',
                                dataType: 'json',
                                cache: false,
                                success: function (data) {

                                    for (i = 0; i < Object.keys(data).length; i++) {

                                        if (data[i].count != 0) {

                                            var valuerequest = data[i].count;
                                        }
                                        else {
                                            var valuerequest = '';

                                        }

                                        $("p#friendrequest").html(valuerequest);

                                        var id = 'a#a' + data[i].like;


                                        if (data[i].check == 1) {

                                            $('' + id + '').removeClass('likes glyphicon glyphicon-thumbs-down').addClass('likes glyphicon glyphicon-thumbs-up');


                                        }
                                        else {
                                            $('' + id + '').removeClass('likes glyphicon glyphicon-thumbs-up').addClass('likes glyphicon glyphicon-thumbs-down');


                                        }

                                    }


                                }
                            });
                            return false;


                        };

                        var interval = 20 * 60 * 5; // where X is your every X minutes

                        setInterval(ajax_call, interval);


                        var ajax_calls = function () {

                            var token = $("input[name=random]").val();
                            $.ajax({

                                type: "GET",
                                url: "/notificationlikes/" + token,
                                data: '',
                                dataType: 'json',
                                cache: false,
                                success: function (data) {


                                    for (i = 0; i < Object.keys(data).length; i++) {

                                        if (data[i].counts != 0) {

                                            $("p#notilike").html(data[i].counts);

                                        }

                                        if (data[i].countmess != 0) {
                                            $("p.messnotification").html(data[i].counts);
                                        }
                                        else {
                                            $("p.messnotification").html('');


                                        }


                                    }


                                }
                            });
                            return false;


                        };

                        var intervals = 20 * 60 * 5; // where X is your every X minutes

                        setInterval(ajax_calls, intervals);


// var ajax_callss = function() {

// var token =  $("input[name=random]").val();
//  $.ajax({

//     type: "GET",
//     url: "{{ asset('index.php') }}/messnotification/"+token,
//     data: '',
//     dataType: 'json',
//     cache: false,
//     success: function(data)
//     {


//           for(i=0; i< Object.keys(data).length; i++)
//            {


//             if(data[i].counts!=0)
//             {
//                     $("p.messnotification").html(data[i].counts);
//             }
//             else
//             {
//  $("p.messnotification").html('');


//             }


//             }


//     }
//     });
// return false;


// };

// var intervalss = 20 * 60 * 5; // where X is your every X minutes

// setInterval(ajax_callss, intervalss);


                        var str = '';
                        $(".search").keyup(function () {
                            var searchid = $(this).val();
                            var dataString = 'search=' + searchid;
                            str = $("#searchid").val();
                            var formData = {name: str};
                            if (str != '') {
                                $.ajax({
                                    type: "GET",
                                    url: "{{ asset('index.php') }}/searchusers",
                                    data: formData,
                                    cache: false,
                                    success: function (html) {
                                        $("#result").html(html).show();
                                    }
                                });
                            }
                            return false;
                        });


                        jQuery("#result").on("click", function (e) {
                            var $clicked = $(e.target);
                            var $name = $clicked.find('.name').html();


                            var decoded = $("<div/>").html(username).text();
                            $('#searchid').val(decoded);
                        });


                        jQuery(document).on("click", function (e) {
                            var $clicked = $(e.target);
                            if (!$clicked.hasClass("search")) {
                                jQuery("#result").fadeOut();

                                $(".name").click(function () {
                                    var n = $(this).text();
                                    $('#searchid').val(n);
                                });

                            }
                        });
                        $('#searchid').click(function () {
                            jQuery("#result").fadeIn();
                        });
                    });


                </script>
                </head>


                <div class="content" id="searchbar">

                {{ Form:: open(array('url' => 'searching' , 'method' => 'post','id' => 'serachform','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
                    @if($errors->any())

                        {{ implode('', $errors->all('<li>:message</li>'))  }}
                    @endif
                    {{ Form::token() }}
                    <input type="submit" value="search" class="search_btn"/>
                    <input type="text" class="search" id="searchid" name="search" autocomplete="off"
                           placeholder="Search for people"/>
                    </form>
                    <div id="result" class="wrapper"></div>
                </div>
            </div>


            <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
                <div class="top_nav pull-right">
                    <ul>
                        <li><a href="#" class="" data-toggle="modal" data-target=".bs-example-modal-sm"><span
                                        class="glyphicon glyphicon-search"></span>
                                <span class="notifation"><p id=""></p></span><span
                                        class="hidden-sm hidden-xs">Advance</span></a></li>


                        <li><a href="{{ asset('/index.php') }}/allfriendrequest"><span
                                        class="glyphicon glyphicon-user"></span>
                                <span class="notifation"><p id="friendrequest"></p></span><span
                                        class="hidden-sm hidden-xs">{{trans ('greeting.Friend Request')}}</span></a>
                        </li>

                        <li><a href="{{ asset('/index.php') }}/notifications"><span
                                        class="glyphicon glyphicon-globe"></span>
                                <span class="notifation"><p id="notilike"></p></span> <span
                                        class="hidden-sm hidden-xs"> {{trans ('greeting.Notifications')}}</span></a>
                        </li>
                        <li><a href="{{ asset('/index.php') }}/inbox"><span class="glyphicon glyphicon-envelope"></span>
                                <span class="notifation"><p class="messnotification"></p></span><span
                                        class="hidden-sm hidden-xs">{{trans ('greeting.Inbox')}}</span> </a></li>
                        <li class="dropdown">
                            <a style="cursor:pointer;" data-toggle="dropdown" class="account dropdown-toggle active">
                                <span class="glyphicon glyphicon-user"></span>
                                <span class="hidden-xs">{{trans ('greeting.Profile')}}  </span>

                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ asset('/index.php') }}/profiledetails"><span
                                                class="glyphicon glyphicon-user"></span> </i>{{trans ('greeting.Profile')}}
                                    </a></li>
                                <li><a href="{{ asset('/index.php') }}/fbsetting"><span
                                                class="glyphicon glyphicon-cog"></span> {{trans ('greeting.Settings')}}
                                    </a></li>
                                <li><a href="{{ asset('/index.php') }}/inbox"><span
                                                class="glyphicon glyphicon-envelope"></span> {{trans ('greeting.Messages')}}
                                    </a></li>
                                <li><a href="{{ asset('/index.php') }}/logoutsfb"><span
                                                class="glyphicon glyphicon-lock"></span> </i> {{trans ('greeting.Logout')}}
                                    </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="headerdown">
</div>


@yield('content')


<section class="footer_Sec">

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <h3>Lorem ipsum dolor </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris at nibh porttitor,
                    iaculis lacus vitae, varius enim. Praesent fermentum egestas volutpat. Cras tempor finibus magna,
                    non volutpat odio feugiat quis. Nam bibendum mi tortor, in auctor felis laoreet at. Pellentesque
                    aliquet orci ac mollis congue.</p>
                <p class="copy-right">{{$set->copyright}}</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="social-icons">
                    <ul>
                        <li class="twitter"><a href="">Twitter</a></li>
                        <li class="facebook"><a href="">Facebook</a></li>
                        <li class="youtube"><a href="">YouTube</a></li>
                        <li class="googleplus"><a href="">Google +r</a></li>
                    </ul>
                </div>

                <button class="language" data-toggle="modal"
                        data-target=".bs-example-modal-lgs">{{trans ('greeting.Select Your Language')}}</button>
                <div class="modal fade bs-example-modal-lgs" tabindex="-1" role="dialog"
                     aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button data-dismiss="modal" class="close" type="button"><span
                                            aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <h4 id="myLargeModalLabel" class="modal-title">Select Your Language</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <div class="countres">
                                            <ul>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/en">English</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/de">German</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/fr">France</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/bg">Bulgarian</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/zh">Chinese</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/vi">Vietnamese</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/nl">Dutch</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/pt">Portuguese</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <div class="countres">
                                            <ul>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/es">Spanish</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/bs">Bosnian</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/ar">Arabic</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/ca">Catalan</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/cs">Czech</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/da">Danish</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/el">Greek</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/fa">Persian</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <div class="countres">
                                            <ul>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/fi">Finnish</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/he">Hebrew</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/hu">Hungarian</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/id">Indonesian</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/it">Italian</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/ja">Japanese</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/km">Khmer</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/ko">Korean</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <div class="countres">
                                            <ul>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/mk">Macedonian</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/nb">Norwegian</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/hi">Hindi</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/sv">Swedish</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/th">Thai</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/tr">Turkish</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/ru">Russian</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/language/zu">Zulu</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style scoped type="text/css">
        #hello {
            width: 100px;
            height: 100px;
            line-height: 100px;
            text-align: center;
            background: red;
            color: white;
            position: absolute;
            left: 20px;
            top: 20px;
        }

    </style>


    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>

    <!--Here is the main jQuery file included from CDN.You can you any other source-->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

    <!--Here is jQuery UI added from CDN-->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <!-- Custom styles for the interface goes here -->
    <style scoped>
        #draggable {
            background: none repeat scroll 0 0 #33CCFF;
            color: #FFFFFF;
            font-family: verdana;
            height: 150px;
            padding: 0.5em;
            text-align: center;
            width: 150px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }
    </style>


    <script type="text/javascript">

        var jq = $.noConflict();
        jq(function () {


            jq("#chatmessenger").draggable();
        });


    </script>

    <!--
    <div id="chatmessenger" class="ui-widget-content">
      <p>Drag me around</p>
    </div>
      -->

    <style scoped type="text/css">
        #modal-dialog {
            margin: 30px auto;
            width: 80% !important;
        }

        .gender-select, .body-type,
        .hair-color, .length, .name-pop {
            border-right: 1px solid #cccccc;
            float: left;
            margin-bottom: 0;
            margin-right: 1%;
            margin-top: 0;
            padding-bottom: 15px;
            padding-right: 1%;
            padding-top: 15px;
            width: 16%;
        }

        .location-pop {
            float: left;
            margin-bottom: 0;
            margin-right: 0;
            margin-top: 0;
            padding-bottom: 15px;
            padding-right: 0;
            padding-top: 15px;
            width: 15%;
        }

        .gender-select select, .body-type select,
        .hair-color select, .length select {
            border: 1px solid #cccccc;
            border-radius: 0;
            color: #555555;
            font-size: 14px;
            height: auto;
            line-height: inherit;
            padding: 4px 1%;
            width: 100%;
        }

        .search-pop {
            float: left;
            margin-bottom: 0;
            width: 100%;
        }

        .name-pop input, .location-pop input {
            border: 1px solid #cccccc;
            border-radius: 0;
            color: #555555;
            font-size: 14px;
            height: auto;
            line-height: inherit;
            padding: 3px 5px 4px;
        }

        .search-pop {
            float: left;
            width: 100%;
        }

        #modal-content-bor-none {
            border: none;
        }

        .form-advance-search {
            border-bottom: 1px solid #cccccc;
            float: left;
            margin-bottom: 15px;
            width: 100%;
        }

        .modal-title {
            color: #ffffff;
        }

        @media only screen and (max-width: 991px) {
            #modal-dialog #login2 {
                float: left;
            }

            .gender-select, .body-type, .hair-color,
            .length, .name-pop {
                width: 32.9%;
            }

            .location-pop, .hair-color {
                border-right: none;
                margin-right: 0;
                padding-right: 0;
                width: 32.2%;
            }
        }

        @media only screen and (max-width: 767px) {
            #modal-dialog {
                top: 200px !important;
            }
        }

        @media only screen and (max-width: 640px) {
            .gender-select, .body-type, .hair-color,
            .length, .name-pop {
                width: 100%;
                border-right: 100%;
                padding-right: 0px;
                margin-right: 0px;
                padding-top: 10px;
                padding-bottom: 10px;
                border-right: none;
            }

            .location-pop, .hair-color {
                margin-right: none;
                padding-right: none;
                padding-top: 10px;
                padding-bottom: 10px;
                border-right: none;
                width: 100%;
            }
        }
    </style>

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         aria-hidden="true">

        <div class="modal-dialog modal-sm" id="modal-dialog" style="top:50px;">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span><span
                            class="sr-only">Close</span></button>
                <h4 id="mySmallModalLabel" class="modal-title">Advance Search</h4>
            </div>
            <div class="modal-content" id="modal-content-bor-none">
                <div class="login-form"><!--login form-->

                {{ Form:: open(array('url' => 'advsearch' , 'method' => 'get','class' => 'form-2 col-md-12','id' => 'login2')) }} <!--contact_request is a router from Route class-->
                    @if($errors->any())

                        {{ implode('', $errors->all('<li>:message</li>'))  }}
                    @endif
                    {{ Form::token() }}

                    <div class="form-advance-search">
                        <div class="form-group gender-select">
                            <select name="gender">
                                <option value="null">Looking For</option>
                                <option value="female">Women</option>
                                <option value="male">Men</option>
                            </select>
                        </div>

                        <div class="form-group body-type">
                            <select name="silhouette">
                                <option value="null">Body Type</option>
                                <option value="1">Slim</option>
                                <option value="2">Sporty</option>
                                <option value="3">Curvy</option>
                                <option value="4">Round</option>
                                <option value="5">Supermodel</option>
                                <option value="6">Olympic athlete</option>
                                <option value="7">Lots of me to love</option>
                                <option value="8">I'll tell you later</option>
                                <option value="9">I'll let you see for yourself</option>
                            </select>
                        </div>

                        <div class="form-group hair-color">
                            <select name="hairColor">
                                <option value="null">Hair Color</option>
                                <option value="1">Black</option>
                                <option value="2">Blond</option>
                                <option value="3">Brown</option>
                                <option value="4">Red</option>
                                <option value="5">Grey</option>
                                <option value="6">White</option>
                                <option value="7">Bald</option>
                                <option value="8">Dyed</option>
                                <option value="9">Other</option>
                                <option value="10">Flavour of the month</option>
                            </select>
                        </div>

                        <div class="form-group length">
                            <select name="length">
                                <option value="null">Height</option>
                                <option value="120">&lt;130cm</option>
                                <option value="130">130-140cm</option>
                                <option value="140">140-150cm</option>
                                <option value="150">150-160cm</option>
                                <option value="160">160-170cm</option>
                                <option value="170">170-180cm</option>
                                <option value="180">180-190cm</option>
                                <option value="190">190-200cm</option>
                                <option value="200">200-210cm</option>
                                <option value="210">210-220cm</option>
                                <option value="220">220-230cm</option>
                                <option value="230">&gt;230cm</option>
                            </select>
                        </div>

                        <div class="form-group name-pop">
                            <input type="text" class="form-control input-lg" placeholder="Name" name="name"/>
                        </div>

                        <div class="form-group location-pop">
                            <input type="text" class="form-control input-lg" placeholder="Location" name="location"/>
                        </div>
                    </div>

                    <div class="form-group search-pop">
                        <button type="submit" class="movies_btn">Search</button>
                    </div>
                    </form>


                </div><!--/login form-->
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
{{ HTML::script('public/jsfb/bootstrap.min.js') }}
{{ HTML::script('public/jsfb/momet.js') }}
{{ HTML::script('public/jsfb/datepicker.js') }}


<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>


</body>
</html>
