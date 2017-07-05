<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel PHP Framework</title>
    <style>
        @import url(//fonts.googleapis.com/css?family=Lato:700);

        body {
            margin: 0;
            font-family: 'Lato', sans-serif;
            text-align: center;
            color: #999;
        }

        .welcome {
            width: 300px;
            height: 200px;
            position: absolute;
            left: 50%;
            top: 50%;
            margin-left: -150px;
            margin-top: -100px;
        }

        a, a:visited {
            text-decoration: none;
        }

        h1 {
            font-size: 32px;
            margin: 16px 0 0 0;
        }
    </style>


    {{ HTML::style('css/style.css'); }}
</head>
<body>
<div id="test">


    <div id="wel">
        WELCOME TO Social Networking

    </div>


<!--     <ul class="nav nav-list">

            @if(Auth::user())
    <li class="new-hedaer"> {{ ucwords(Auth::user()->username) }} </li>
                <li>{{ HTML::Link('post','Add Post')}} </li>
                    <li> {{ HTML::Link('users', 'View users')}} </li>
                    <li> {{ HTML::Link('logout', 'Logout')}}
@else

    <div id="wel">
 {{ HTML::Link('login', 'WELCOME TO LARAVEL')}}
            <div id="text"> Click "welcome to laravel" to continue... </div>
       </div>
       @endif
        </ul>
 -->

</div>


@yield('content')


</body>
</html>
