<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>

{{ HTML::style('css/bootstrap.min.css'); }}
{{ HTML::style('css/font-awesome.min.css'); }}
{{ HTML::style('css/prettyPhoto.css'); }}
{{ HTML::style('css/price-range.css'); }}
{{ HTML::style('css/animate.css'); }}
{{ HTML::style('css/main.css'); }}
{{ HTML::style('css/responsive.css'); }}



<!--

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">-->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="../images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
    }

    .fadein {
        position: relative;
        height: 132px;
        width: 500px;
        margin: 0 auto;
        background: url("slideshow-bg.png") repeat-x scroll left top transparent;
        padding: 10px;
    }

    .fadein img {
        height: 142px;
        left: 10px;
        position: absolute;
        top: 0;
        width: 505px;
    }
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>
    $(function () {
        $('.fadein img:gt(0)').hide();
        setInterval(function () {
            $('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');
        }, 2000);
    });
</script>


{{ HTML::script('js/jquery.js') }}
<script language="javascript">
    $(document).ready(function () {
        $("#sel1").change(function () {

            var value = $('#sel1').val();
            $.ajax({
                url: "find",
                type: "get",
                data: {'dataString': value},

                success: function (resp) {
                    // document.getElementById('sel2').innerHTML = resp;
                    window.location.reload();

                },
                error: function (e) {
                    return false;
                }
            });


        });
    });
</script>
<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> <?php if (Auth::user()) {
                                        echo ' ';
                                    } ?><?php if (Auth::user()) {
                                        echo $email = Auth::user()->email;
                                    }?></a></li>


                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{URL::to('site');}}"><img src="../images/home/logo.png" alt=""/></a>
                    </div>
                    <div class="btn-group pull-right">

                        <!--
                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                            USA
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="#">Canada</a></li>
                            <li><a href="#">UK</a></li>
                          </ul>
                        </div>-->

                        <div class="btn-group">


                            <select name="sel1" id="sel1">
                                <option value="1">US Dollar</option>
                                <option value="2">Euro</option>

                            </select>


                        </div>


                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{URL::to('myaccount');}}"><i class="fa fa-user"></i> Account</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                            <li><a href="{{URL::to('checkout');}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="{{URL::to('checkout');}}"><i class="fa fa-shopping-cart"></i> Cart
                                    <?php
                                    $i = 0;
                                    if (Auth::user()) {
                                        $sum = 0;
                                        $i = 0;
                                        foreach ($shopping as $key => $hello) {
                                            $sum += $hello->price;

                                            $i++;


                                        }

                                    }






                                    ?>

                                    <?php  echo $i; ?> items <br/>
                                    <span class="border_cart"></span> Total:
                                    <?php $i = 0; if (Auth::user()) {
                                        echo $sum;
                                    } else {
                                        echo $i;

                                    }


                                    ?><span class="price">



       </span>


                                </a></li>
                            <!--<li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li>-->

                            <li><a href="{{ URL::asset('') }}index.php/<?php if (Auth::user()) {
                                    echo 'logouts';
                                } else {
                                    echo 'signup';
                                }?>"><?php if (Auth::user()) {
                                        echo '<i class="fa fa-lock"></i> ' . 'Logout';
                                    } else {
                                        echo '<i class="fa fa-lock"></i> ' . 'Sign Up';
                                    }?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">


                            <li><a href="{{URL::to('site');}}" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="shop.html">Products</a></li>
                                    <!--  <li><a href="product-details.html">Product Details</a></li> -->
                                    <li><a href="{{URL::to('checkout');}}">Checkout</a></li>
                                    <li><a href="{{URL::to('checkout');}}">Cart</a></li>

                                    <li><a href="{{ URL::asset('') }}index.php/<?php if (Auth::user()) {
                                            echo 'logouts';
                                        } else {
                                            echo 'signup';
                                        }?>"><?php if (Auth::user()) {
                                                echo 'Logout';
                                            } else {
                                                echo 'Sign Up';
                                            }?></a></li>

                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{URL::to('blog');}}">Blog List</a></li>
                                    <li><a href="{{URL::to('blogsingle');}}">Blog Single</a></li>
                                </ul>
                            </li>
                            <!-- <li><a href="404.html">404</a></li>-->
                            <li><a href="contact-us.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        {{ Form:: open(array('url' => 'search' , 'method' => 'get')) }}
                        <input type="text" class="search_input" name="search" placeholder="Search"/>

                    {{ Form:: close() }}
                    <!--<input type="text" placeholder="Search"/>-->
                    </div>

                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->