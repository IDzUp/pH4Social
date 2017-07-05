<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <!-- <meta content="width=device-width, initial-scale=1" name="viewport"> -->
    <meta name="viewport" content="width=device-width, user-scalable=no"/>
    <meta content="{{$set->description}}" name="description">
    <meta name="keywords" content="{{$set->meta}}">
    <title>{{$set->title}}</title>
    <!-- Bootstrap core CSS -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/') }}public/imagesfb/fav.png"/>

    {{ HTML::style('public/cssfb/bootstrap.min.css'); }}
    <?php


    foreach($colors as $hello)
    {


    if($hello->publish == 'on')
    {

    $value = $hello->other;
    $values = 'public/' . $value;
    ?>

    {{ HTML::style($values); }}
    <?php
    }

    }

    ?>




    {{ HTML::style('public/fontsfb/stylesheet.css'); }}

    <style type="text/css">

        .logo img {
            height: 50px;
            width: 250px;
        }

    </style>


</head>


<body>
<header class="innner_header">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <div class="logo"><a href="{{ asset('/index.php') }}/home"><img
                                src="{{ asset('/') }}<?php echo $logo->path; ?>" alt=""/></a>


                </div>
            </div>
            <div class="col-sm-8  col-xs-12">
                <?php if(Auth::user()){



                ?>

                <div class="sign_box">


                    <p><?php  echo $rand = Auth::user()->email;?></p>
                    <!--           <a href="profile" class="sign">View Profile</a> -->
                    <a href="{{ asset('/index.php') }}/profile" class="sign"> <span
                                class="glyphicon glyphicon-user"></span> {{trans ('greeting.Profile')}}</a>
                    <a href="{{ asset('/index.php') }}/logoutsfb" class="sign"> <span
                                class="glyphicon glyphicon-off"></span> {{trans ('greeting.Logout')}}</a>

                </div>


                <?php



                }

                else
                {

                ?>

                <div class="sign_box">

                    <p>{{trans ('greeting.Already a member?')}}</p>
                    <a href="#" class="sign" data-toggle="modal"
                       data-target=".bs-example-modal-sm">{{trans ('greeting.Sign In')}}</a>

                </div>

                <?php

                }

                ?>

            </div>
        </div>
    </div>

</header>


@yield('content')
<section class="footer_Sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <h3>{{trans ('greeting.Lorem ipsum dolor')}} </h3>
                <p>{{trans ('greeting.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris at nibh porttitor,
      iaculis lacus vitae, varius enim. Praesent fermentum egestas volutpat. Cras tempor finibus magna, non volutpat odio feugiat quis. Nam bibendum mi tortor, in auctor felis laoreet at. Pellentesque
      aliquet orci ac mollis congue.')}}</p>
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


    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         aria-hidden="true">

        <div class="modal-dialog modal-sm" id="hidlogin">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span><span
                            class="sr-only">Close</span></button>
                <h4 id="mySmallModalLabel" class="modal-title">{{trans ('greeting.Login')}}</h4>
            </div>
            <div class="modal-content">
                <div class="login-form"><!--login form-->

                {{ Form:: open(array('url' => 'index.php/getloginsfb' , 'method' => 'get','class' => 'form-2 col-md-12 loginnew','id' => 'login2')) }} <!--contact_request is a router from Route class-->

                    @if (Session::has('loginerrors'))
                        @if($errors->any())
                            @if ($errors->has('email'))
                                <div class="alert alert-danger"
                                     role="alert"><?php if ($errors->first('email') == 'validation.required') {
                                        echo 'Email Required';
                                    } elseif ($errors->first('email') == 'validation.unique') {
                                        echo 'You Already have an Account';
                                    } else {
                                        echo 'Email Not Valid';
                                    } ?> </div>@endif
                            @if ($errors->has('password'))
                                <div class="alert alert-danger" role="alert">Password Required</div>@endif
                        <!--  {{ implode('', $errors->all('<div class="alert alert-danger" role="alert">:message</div>'))  }} -->

                        @endif
                    @endif
                    @if (Session::has('loginerror'))
                        <div class="alert alert-danger" role="alert">{{ Session::get('loginerror') }}</div>
                    @endif

                    {{ Form::token() }}

                    <div class="form-group">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control input-lg" required="" placeholder="Email Address"
                               name="email"/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control input-lg" required="" placeholder="Password"
                               name="password"/>
                    </div>


                    <div class="form-group">
                        <label id="rem"><input type="checkbox" name="remember" id="remember"/>
                            <span class="keep_text"> Keep me logged in </span>
                        </label>
                        <br>
                        &nbsp;&nbsp;&nbsp; <a href="#" data-toggle="modal" data-target=".bs-example-modal-sms"
                                              id="forgets" class="">{{trans ('greeting.Forget Password')}}</a>

                        <button type="submit" class="movies_btn pull-right ">{{trans ('greeting.Login')}}</button>
                    </div>


                    </form>


                </div><!--/login form-->
            </div>
        </div>
    </div>


    <div class="modal fade bs-example-modal-sms" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         aria-hidden="true">

        <div class="modal-dialog modal-sm">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span><span
                            class="sr-only">Close</span></button>
                <h4 id="mySmallModalLabel" class="modal-title">{{trans ('greeting.Reset Your Password')}}</h4>
            </div>
            <div class="modal-content">
                <div class="login-form"><!--login form-->

                {{ Form:: open(array('url' => 'forgetpass' , 'method' => 'get','class' => 'form-2 col-md-12','id' => 'login2')) }} <!--contact_request is a router from Route class-->

                    {{ Form::token() }}

                    <?php

                    function generateRandomStrings($length = 10)
                    {
                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $randomString = '';
                        for ($i = 0; $i < $length; $i++) {
                            $randomString .= $characters[rand(0, strlen($characters) - 1)];
                        }
                        return $randomString;
                    }

                    ?>
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control input-lg" required="" placeholder="Email Address"
                               name="email"/>
                        <input type="hidden" name="forget" value="<?php echo generateRandomStrings(); ?>"/>
                    </div>


                    <!--                <div class="form-group">
                                   <input type="password" class="form-control input-lg" placeholder="Password" name="password"/>
                                   </div>
                                  <div class="form-group">
                                   <input type="password" class="form-control input-lg" placeholder="Confirm Password" name="password"/>
                                   </div>
                     -->

                    <div class="form-group">
                        <button type="submit" class="movies_btn">{{trans ('greeting.Send')}}</button>
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


        $(".loginnews").on('submit', (function (e) {
            e.preventDefault();


            $.ajax({
                url: "getloginsfb",     // Url to which the request is send
                type: "GET",             // Type of request to be send, called as method
                data: new FormData(this),    // Data sent to server, a set of key/value pairs representing form fields and values
                contentType: false,           // The content type used when sending data to the server. Default is: "application/x-www-form-urlencoded"
                dataType: 'json',
                cache: false,         // To unable request pages to be cached
                processData: false,        // To send DOMDocument or non processed data file it is set to false (i.e. data should not be in the form of string)
                success: function (data)     // A function to be called if request succeeds
                {


                }
            });
        }));


    });

    $("#forgets").click(function () {
        $("#hidlogin").hide();

    });
    $(".sign").click(function () {
        $("#hidlogin").show();

    });


</script>


@if (Session::has('loginerror'))


    <script type="text/javascript">
        $(function () {

            $('.sign').click();


        });
    </script>

@endif


</body>
</html>