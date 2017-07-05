@layout(layouts.fb)

@section('content')
    <style scoped>
        #profile {

            width: 200px;
            height: 200px;
            border: 2px solid red;

        }

        #covers {

            width: 700px;
            height: 200px;
            border: 2px solid red;
            float: left;
        }

        #post {

            width: 700px;
            height: auto;
            border: 2px solid red;
            float: left;
        }

        #posts {

            width: 700px;
            height: 20px;

            float: left;
        }

        #searchbar {

            width: 350px;

            float: right;
        }

        .fulldetail {
            background: none repeat scroll 0 0 blue;
        }

    </style>
    Welcome {{$email = Auth::user()->rand;}}
    <a href="fblogout">logout</a>



    <a href="notification">Notification=<?php if (Request::ajax()) {
            echo $notification;
        }?> </a>

    <input type="hidden" name="random" value="<?php echo Auth::user()->rand;?>">


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script type="text/javascript">

        $(function () {

            var ajax_call = function () {

                var token = $("input[name=random]").val();
                $.ajax({

                    type: "GET",
                    url: "../index.php/notification/" + token,
                    data: '',
                    cache: false,
                    success: function (html) {


                    }
                });
                return false;


            };

            var interval = 100 * 60 * 1; // where X is your every X minutes

            setInterval(ajax_call, interval);


            var str = '';
            $(".search").keyup(function () {
                var searchid = $(this).val();
                var dataString = 'search=' + searchid;
                str = $("#searchid").val();
                var formData = {name: str};
                if (str != '') {
                    $.ajax({
                        type: "POST",
                        url: "../search.php",
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


    {{ Form:: open(array('url' => 'searching' , 'method' => 'post','id' => 'contactform','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
        @if($errors->any())

            {{ implode('', $errors->all('<li>:message</li>'))  }}
        @endif
        {{ Form::token() }}

        <input type="text" class="search" id="searchid" name="search" placeholder="Search for people"/>
        <input type="submit" value="search"/>
        </form>
        <div id="result" class="wrapper"></div>
    </div>

    <!--
     <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script>
    $(function() {



    var availableTags = [
    "ActionScript",
    "AppleScript",
    "Asp",
    "BASIC",
    "C",
    "C++",
    "Clojure",
    "COBOL",
    "ColdFusion",
    "Erlang",
    "Fortran",
    "Groovy",
    "Haskell",
    "Java",
    "JavaScript",
    "Lisp",
    "Perl",
    "PHP",
    "Python",
    "Ruby",
    "Scala",
    "Scheme"
    ];
    $( "#tags" ).autocomplete({
    source: availableTags
    });
    });
    </script>
    </head>
    <body>
    <div class="ui-widget">
    <label for="tags">Tags: </label>
    <input id="tags">
    </div>


     -->





    <div id="profile">
        @foreach( $profile as $hello)
            <img src="../{{$hello->path}}" width="200" height="200"/>

        @endforeach

    </div>



    <div id="covers">

        @foreach( $profile as $hello)
            <img src="../{{$hello->cover}}" width="700" height="200"/>

        @endforeach

    </div>




    <div class="cover">
        <h2 class="image">Profile Image upload</h2>

    {{ Form:: open(array('url' => 'fbmedia/save' , 'method' => 'post','id' => 'contactform','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
        @if($errors->any())

            {{ implode('', $errors->all('<li>:message</li>'))  }}
        @endif
        {{ Form::token() }}

        <input id="image" name="image" placeholder="Image" required="" tabindex="1" type="file">
        <input id="rand" name="rand" type="hidden" value="<?php echo $email = Auth::user()->rand;?>">

        <input name="submit" id="submit" tabindex="5" value="submit" type="submit">
        {{ Form:: close() }}<br/>
    </div>


    <div class="cover">
        <h2 class="image">Cover Image upload</h2>

    {{ Form:: open(array('url' => 'fbcovermedia/save' , 'method' => 'post','id' => 'contactform','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
        @if($errors->any())

            {{ implode('', $errors->all('<li>:message</li>'))  }}
        @endif
        {{ Form::token() }}

        <input id="image" name="image" placeholder="Image" required="" tabindex="1" type="file">
        <input id="rand" name="rand" type="hidden" value="<?php echo $email = Auth::user()->rand;?>">

        <input name="submit" id="submit" tabindex="5" value="submit" type="submit">
        {{ Form:: close() }}<br/>
    </div>



    <div class="post">
        <h2 class="image">Post</h2>

    {{ Form:: open(array('url' => 'fbpost/save' , 'method' => 'post','id' => 'contactform','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
        @if($errors->any())

            {{ implode('', $errors->all('<li>:message</li>'))  }}
        @endif
        {{ Form::token() }}
        <textarea name="post"></textarea>

        <input id="image" name="image" placeholder="Image" tabindex="1" type="file">
        <input id="rand" name="rand" type="hidden" value="<?php echo $email = Auth::user()->rand;?>">

        <input name="submit" id="submit" tabindex="5" value="submit" type="submit">
        {{ Form:: close() }}<br/>
    </div>


    <div id="posts">
        @foreach( $post as $hello)
            <img src="../{{$hello->path}}" width="20" height="20"/>
            <p>{{$hello->post}}</p>

        @endforeach

    </div>


@endsection
