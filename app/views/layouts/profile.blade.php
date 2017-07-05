@layout(layouts.fbhome)

@section('content')


    <section>
        <div id="help"></div>
        <style type="text/css">
            #help {

                height: 30px;
                left: 50%;
                position: fixed;
                width: 30px;
                z-index: 999999;
                display: none;
                top: 42%;

            }

        </style>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="cover">


                            @foreach( $profile as $hello)

                                <img src="../{{$hello->cover}}" width="1170" height="334" alt="" class="img-rounded"/>

                            @endforeach

                            <?php if($photos == 0)
                            {
                            $sex = Auth::user()->sex;
                            if ($sex == 'male') {

                                $males = 'male_cover.jpg';
                            } else {

                                $males = 'female_cover.jpg';
                            }
                            ?>


                            <img src="{{ asset('/') }}imagesfb/{{$males}}" width="100%" height="334" alt=""
                                 class="img-rounded img-responsive"/>
                            <?php
                            }

                            ?>


                        </div>
                        <div class="addyour">
                            <ul>
                                <li>


                                {{ Form:: open(array('url' => 'fbcovermedia/save' , 'method' => 'post','id' => 'contactform','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
                                    @if($errors->any())

                                        {{ implode('', $errors->all('<li>:message</li>'))  }}
                                    @endif
                                    {{ Form::token() }}
                                    <label id="coversimage">

                                        <input id="coversimage" name="image" required="" tabindex="1" type="file"
                                               onchange="document.getElementById('submits').click();">

                                    </label>
                                    <input id="rand" name="rand" type="hidden"
                                           value="<?php echo $email = Auth::user()->rand;?>">

                                    <input name="submit" id="submits" tabindex="5" value="submit" type="submit"
                                           style="display:none;">
                                {{ Form:: close() }}

                                <!--     <a href="#">Add a Cover Photo</a> -->


                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="user_sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-3">
                    <div class="row">
                        <div class="bg_nav">
                            <div class="nav">
                                <div class="userphoto">

                                    @foreach( $profile as $hello)
                                        <img src="../{{$hello->path}}" alt="" class="img-circle" width="170"
                                             height="170"/>

                                    @endforeach

                                    <?php if($photos == 0)
                                    {
                                    $sex = Auth::user()->sex;
                                    if ($sex == 'male') {

                                        $male = 'male.jpg';
                                    } else {

                                        $male = 'female.jpg';
                                    }
                                    ?>


                                    <img src="{{ asset('/') }}imagesfb/{{$male}}" width="170" height="170" alt=""
                                         class="img-rounded"/>
                                    <?php
                                    }

                                    ?>


                                </div>
                                <div id="nameuser"><?php echo Auth::user()->name;?></div>
                                <style>
                                    label#imagess {

                                        width: 16px;

                                        height: 14px;

                                        background: url('../imagesfb/cameras.png') 0 0 no-repeat;

                                        border: none;

                                        margin: 13px 12px;

                                        font-weight: bold;
                                        background-size: 16px 14px;

                                    }

                                    input#imagesss {

                                        position: absolute;
                                        visibility: hidden;
                                    }

                                    label#imagessvideo {

                                        width: 16px;

                                        height: 14px;

                                        background: url('../imagesfb/video1.png') 0 0 no-repeat;

                                        border: none;

                                        margin: 13px 10px;

                                        font-weight: bold;
                                        background-size: 16px 14px;

                                    }

                                    input#imagessvideo {

                                        position: absolute;
                                        visibility: hidden;
                                    }

                                    label#coverimage {

                                        width: 196px;

                                        height: 35px;

                                        background: url('../imagesfb/photo_text.jpg') 0 0 no-repeat;

                                        border: none;

                                        padding: 0 4px 8px 0;

                                        font-weight: bold;
                                        background-size: 195px 47px;

                                        cursor: pointer;

                                    }

                                    label#coverimage:hover {

                                        width: 196px;

                                        height: 35px;

                                        cursor: pointer;

                                        background: url('../imagesfb/photo_text_hover.jpg') 0 0 no-repeat;

                                        border: none;

                                        padding: 0 4px 8px 0;

                                        font-weight: bold;
                                        background-size: 195px 47px;

                                    }

                                    input#coverimage {

                                        position: absolute;
                                        visibility: hidden;
                                    }

                                    label#coversimage {

                                        width: 100%;

                                        height: 35px;

                                        background: url('../imagesfb/add_cover.jpg') 0 0 no-repeat;

                                        border: none;

                                        padding: 0 4px 8px 0;

                                        font-weight: bold;
                                        background-size: 100% 100%;

                                    }

                                    label#coversimage:hover {

                                        width: 100%;

                                        height: 35px;

                                        background: url('../imagesfb/add_cover_hover.jpg') 0 0 no-repeat;

                                        border: none;

                                        padding: 0 4px 8px 0;

                                        font-weight: bold;
                                        background-size: 100% 100%;

                                        cursor: pointer;

                                    }

                                    input#coversimage {

                                        position: absolute;
                                        visibility: hidden;
                                    }

                                </style>
                                <ul>

                                    <li>


                                    {{ Form:: open(array('url' => 'fbmedia/save' , 'method' => 'post','name' => 'my_form','id' => 'my_form','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
                                        @if($errors->any())

                                            {{ implode('', $errors->all('<li>:message</li>'))  }}
                                        @endif
                                        {{ Form::token() }}


                                        <label id="coverimage">
                                            <input id="coverimage" name="image" required="" tabindex="1" type="file"
                                                   onchange="document.getElementById('submit').click();">
                                        </label>

                                        <input id="rand" name="rand" type="hidden"
                                               value="<?php echo $email = Auth::user()->rand;?>">


                                        <input name="submit" id="submit" tabindex="5" value="submit" type="submit"
                                               style="display:none;">
                                        {{ Form:: close() }}
                                    </li>

                                    <!-- <li><a href="#"><span class="glyphicon glyphicon-facetime-video"></span> Upload Videos</a></li> -->
                                    <li><a href="{{ asset('/index.php/') }}/friendlist"><span
                                                    class="glyphicon glyphicon-tasks"></span> {{trans ('greeting.Friends List')}}
                                        </a></li>
                                    <li><a href="{{ asset('/index.php/') }}/gallery"><span
                                                    class="glyphicon glyphicon-calendar"></span> {{trans ('greeting.Gallery')}}
                                        </a></li>
                                    <li><a href="{{ asset('/index.php/') }}/news"><span
                                                    class="glyphicon glyphicon-calendar"></span> News Feed</a></li>
                                <!--    <li><a href="#"><span class="glyphicon glyphicon-music"></span> {{trans ('greeting.Upload a Song')}}</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>{{trans ('greeting.Create a Listing')}}</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-star"></span> {{trans ('greeting.Create a Page')}}</a></li>
            --> </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-9">
                    <div class="border">
                        <!-- Nav tabs -->
                    {{ Form:: open(array('url' => 'fbpost/save' , 'method' => 'post','id' => 'contactform','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
                        @if($errors->any())

                            {{ implode('', $errors->all('<li>:message</li>'))  }}
                        @endif
                        {{ Form::token() }}
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active">
                                <h3 class="share">{{trans ('greeting.Share')}}</h3>
                            </li>
                            <li class="active"><a href="#home" role="tab" data-toggle="tab"> <span
                                            class="glyphicon glyphicon-comment"></span> </a></li>
                            <li><a href="#profile" role="tab" data-toggle="tab"> <span
                                            class="glyphicon glyphicon-map-marker"></span> </a></li>
                            <li> <span class="">

             <label id="imagess"><input id="imagesss" name="image" type="file"></label>
             </span>


                            </li>

                            <li> <span class="">

             <label id="imagessvideo"><input id="imagessvideo" name="imagessvideo" type="file"></label>
             </span>


                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">


                            <div class="tab-pane active" id="home">
                                <textarea required="" name="post" class="form-control" rows="3"></textarea>
                            </div>

                            <!--     <input id="image" name="image" placeholder="Image" tabindex="1" type="file">  -->
                            <input id="rand" name="rand" type="hidden"
                                   value="<?php echo $email = Auth::user()->rand;?>">


                            <!--         <div class="tab-pane" id="profile">
                                      <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="tab-pane" id="messages">
                                      <textarea class="form-control" rows="3"></textarea>
                                    </div> -->
                        </div>
                        <div class="col-lg-12">
                            <div class="pull-right padding2"> <span class="dropdown ">
             <!--  <button class="friend_btn  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"><span class="glyphicon glyphicon-globe"></span> Friends <span class="caret"></span></button>
              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
              </ul>
              </span> -->





              <button name="submit" id="submit" class="all_btn" type="submit">{{trans ('greeting.Submit')}}</button>
                <br/>
                            </div>
                        </div>
                        <div class="clear"></div>
                        {{ Form:: close() }}
                    </div>
                    <br/>


                    <span class="hr_bor"></span>


                    {{ HTML::script('jsfb/script.js') }}


                    <script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
                    <script type="text/javascript">

                        var ajax_online = function () {

                            var token = $("input[id=userid]").val();
                            $.ajax({

                                type: "GET",
                                url: "{{ asset('') }}/index.php/onlineuser/" + token,
                                data: '',
                                dataType: 'json',
                                cache: false,
                                success: function (data) {


                                    var ids = '#chatmessenger ul li';
                                    $('' + ids + '').removeClass("yourClass");

                                    for (i = 0; i < Object.keys(data).length; i++) {


                                        var id = 'li#online' + data[i].userrand;
                                        $('' + id + '').addClass("yourClass");


                                    }


                                }
                            });


                            return false;


                        };

                        var intervalss = 60 * 60 * 1; // where X is your every X minutes

                        setInterval(ajax_online, intervalss);


                        var onlinech = function () {


//var token =  $("input[name=getid]").val();


                            var nb = $('.openbox').length;


                            for (var i = 0; i < nb; i++) {

                                var getval = '.openbox:eq(' + i + ')';


                                var uniid = $('' + getval + '').attr("id");

                                $.ajax({

                                    type: "GET",
                                    url: "{{ asset('') }}/index.php/messtext/" + uniid,
                                    data: '',
                                    dataType: 'json',
                                    cache: false,
                                    success: function (data) {

                                        var blankids = '#uptextid' + data[0].idss;
                                        $('' + blankids + '').html('');
                                        for (var i = 0; i < Object.keys(data).length; i++) {


                                            if (data[i].rand == data[i].randuser) {
                                                var datas = '<div class="media border-bottom margin-none bg-gray pull-right" id="messagebox"><a class="pull-right innerAll" href=""><img width="50" class="media-object" src="{{ asset('') }}/' + data[i].mainuserprofile + '" style="width: 10px; height: 10px; display: block; margin-left: auto; margin-right: auto;"></a><div class="media-body innerTB pull-right"><a class="strong text-inverse" href="">' + data[i].user + '</a>  <small class="text-muted ">wrote on ' + data[i].timess + '</small> <a class="text-small" href=""></a><div>' + data[i].chat + '</div></div></div><div class="clearfix"></div>';
                                                var blankid = '#uptextid' + data[i].idss;
                                                $('' + blankid + '').append(datas);


                                                $('#newvalues' + data[i].idss + '').html('');


                                            }
                                            else {

                                                var datas = '<div class="media border-bottom margin-none bg-gray pull-left"><a class="pull-left innerAll" href=""><img width="50" class="media-object" src="{{ asset('') }}/' + data[i].otheruserprofile + '" style="width: 10px; height: 10px; display: block; margin-left: auto; margin-right: auto;"></a><div class="media-body innerTB"><a class="strong text-inverse" href="">' + data[i].user + '</a>  <small class="text-muted ">wrote on ' + data[i].timess + '</small> <a class="text-small" href=""></a><div>' + data[i].chat + '</div></div></div><div class="clearfix"></div> ';
                                                var blankid = '#uptextid' + data[i].idss;
                                                $('' + blankid + '').append(datas);

                                                if (data[i].counts == 1) {
                                                    $('#newvalues' + data[i].idss + '').html('');
                                                    $('#newvalues' + data[i].idss + '').append('<span class="notifationsss"><p id="newmess" class="messnotification">1</p></span>');
                                                }
                                                else {

                                                    $('#newvalues' + data[i].idss + '').html('');

                                                }


                                            }


                                        }


                                    }
                                });


                            }


                            return false;


                        };

                        var intervalss = 60 * 60 * 1; // where X is your every X minutes

                        setInterval(onlinech, intervalss);


                        $(document).ready(function () {


                            $("#clickchat").click(function () {
                                $("#ulchat").toggle();


                            });


                            $(".onlineclick").click(function (e) {
                                e.preventDefault();

                                var uniid = $(this).attr("name");

                                var comment = $('#chat' + uniid + '').val();

                                if (comment == '') {
                                    alert('Required comment section');
                                }
                                else {

                                    var comment = $('#chat' + uniid + '').val();
                                    var user = $('#user' + uniid + '').val();
                                    var otheruser = $('#otheruser' + uniid + '').val();
                                    var name = $('#name' + uniid + '').val();
                                    var othername = $('#othername' + uniid + '').val();

                                    $.ajax({

                                        type: "GET",
                                        url: "{{ asset('/') }}/index.php/messagesonline",
                                        data: {
                                            user: user,
                                            comment: comment,
                                            otheruser: otheruser,
                                            name: name,
                                            othername: othername
                                        },
                                        dataType: 'json',
                                        cache: false,
                                        success: function (data) {

                                            $('textarea[name="chat"]').val('');


                                            $(".uptext").animate({scrollTop: $(document).height()}, 3000);
                                        }
                                    });
                                }


                            });


                            $(".likes").click(function () {
                                var id = $(this).attr("id");
                                var name = $(this).attr("name");
//var dataString = 'id='+ id + '&name='+ name;

//var dataString = 'id='+ id;


                                $.ajax({

                                    type: "GET",
                                    url: "{{ asset('/') }}/index.php/rating/" + name,
                                    data: '',
                                    dataType: 'json',
                                    cache: false,
                                    success: function (data) {

                                        for (i = 0; i < Object.keys(data).length; i++) {


                                            var id = 'span#countlike' + data[i].idss;


                                            $(id).html(data[i].likes);


                                        }


                                    }
                                });

                            });


                            $(".openbox").click(function () {


                                var id = $(this).attr("id");

                                var divs = '#boxs' + id;

                                var lenss = $('' + divs + ':visible').length;

                                if (lenss == 1) {

                                    $('' + divs + '').css({


                                        "display": "none"


                                    });


                                }
                                else {


                                    var len = $('.allchatbox:visible').length;


                                    var tot = len * 260;

                                    if (len == 0) {


                                        var divs = '#boxs' + id;


                                        $('' + divs + '').css({


                                            "background": "none repeat scroll 0 0 white",
                                            "border": "1px solid grey",
                                            "border-radius": "5px",
                                            "bottom": "20px",
                                            "display": "block",
                                            "position": "fixed",
                                            "right": "260px",
                                            "width": "230px",
                                            "z-index": "99"


                                        });

                                    }
                                    else if (len == 1) {


                                        var divs = '#boxs' + id;


                                        $('' + divs + '').css({


                                            "background": "none repeat scroll 0 0 white",
                                            "border": "1px solid grey",
                                            "border-radius": "5px",
                                            "bottom": "20px",
                                            "display": "block",
                                            "position": "fixed",
                                            "right": "500px",
                                            "width": "230px",
                                            "z-index": "99"


                                        });

                                    }

                                    else if (len == 2) {


                                        var divs = '#boxs' + id;


                                        $('' + divs + '').css({


                                            "background": "none repeat scroll 0 0 white",
                                            "border": "1px solid grey",
                                            "border-radius": "5px",
                                            "bottom": "20px",
                                            "display": "block",
                                            "position": "fixed",
                                            "right": "740px",
                                            "width": "230px",
                                            "z-index": "99"


                                        });

                                    }

                                    else {
                                        var tolss = tot + 'px';


                                        var divs = '#boxs' + id;


                                        $('' + divs + '').css({


                                            "background": "none repeat scroll 0 0 white",
                                            "border": "1px solid grey",
                                            "border-radius": "5px",
                                            "bottom": "20px",
                                            "display": "block",
                                            "position": "fixed",
                                            "right": "978px",
                                            "width": "230px",
                                            "z-index": "99"


                                        });

                                    }


                                }


                                $.ajax({

                                    type: "GET",
                                    url: "{{ asset('/') }}/index.php/opnnchat/" + id,
                                    //  data: { id: id, user: user, comment: comment, name: name},
                                    // dataType: 'json',
                                    cache: false,
                                    success: function (data) {


                                    }


                                });


                            });


                            $(".minbox").click(function () {


                                var id = $(this).attr("id");


                                var divs = 'form#bo' + id;


                                $('' + divs + '').css({


                                    "display": "none"


                                });


                            });

                            $(".maxbox").click(function () {


                                var id = $(this).attr("id");


                                var divs = 'form#bo' + id;


                                $('' + divs + '').css({


                                    "display": "block"


                                });


                            });


                            $(".closebox").click(function () {


                                var id = $(this).attr("id");


                                var divs = '#boxs' + id;


                                $('' + divs + '').css({


                                    "display": "none"


                                });


                                var len = $('.allchatbox:visible').length;


                                for (var i = 0; i < len; i++) {

                                    if (i == 0) {
                                        var ind = '260px';
                                    }
                                    else if (i == 1) {
                                        var ind = '500px';

                                    }
                                    else if (i == 2) {
                                        var ind = '740px';

                                    }
                                    else {
                                        var ind = '978px';

                                    }

                                    var value = $('.allchatbox:visible')[i];

                                    var divs = $(value).attr("id");

//var divs='#boxs'+id;


                                    $('#' + divs + '').css({


                                        "background": "none repeat scroll 0 0 white",
                                        "border": "1px solid grey",
                                        "border-radius": "5px",
                                        "bottom": "20px",
                                        "display": "block",
                                        "position": "fixed",
                                        "right": '' + ind + '',
                                        "width": "230px",
                                        "z-index": "99"


                                    });

                                }


                            });


                        });
                    </script>
                    <script type="text/javascript">

                        function myFunction(id) {


                            if (id == '') {
                                alert('Required comment section');
                            }
                            else {


                                $.ajax({

                                    type: "GET",
                                    url: "{{ asset('/') }}/index.php/postcomdelete/" + id,
                                    //  data: { id: id, user: user, comment: comment, name: name},
                                    dataType: 'json',
                                    cache: false,
                                    success: function (data) {


                                        var comment = '#cc' + data[0].idss;
                                        $(comment).hide('slow');


                                    }
                                });
                            }


                        }

                        function savepost(id) {

                            var inputval = 'input#pp' + id;
                            var postval = $('' + inputval + '').val();

                            if (postval == '') {
                                alert('Required Input text field');
                            }
                            else {


                                $.ajax({

                                    type: "GET",
                                    url: "{{ asset('/') }}/index.php/postupdate/" + id,
                                    data: {value: postval},
                                    dataType: 'json',
                                    cache: false,
                                    success: function (data) {


                                        $('input#pp' + data[0].idss + '').replaceWith('<p id="edit' + data[0].idss + '">' + data[0].valuess + '</p>');
                                        $('button.ed' + data[0].idss + '').show("slow");
                                        $('button#sav' + data[0].idss + '').hide("slow");
                                    }
                                });
                            }


                        }

                        function savecom(id) {

                            var inputval = 'input#cc' + id;
                            var postval = $('' + inputval + '').val();

                            if (postval == '') {
                                alert('Required Input text field');
                            }
                            else {


                                $.ajax({

                                    type: "GET",
                                    url: "{{ asset('/') }}/index.php/comupdate/" + id,
                                    data: {value: postval},
                                    dataType: 'json',
                                    cache: false,
                                    success: function (data) {


                                        $('input#cc' + data[0].idss + '').replaceWith('<p id="ppp' + data[0].idss + '">' + data[0].valuess + '</p>');
                                        $('button.eds' + data[0].idss + '').show("slow");
                                        $('button#savcc' + data[0].idss + '').hide("slow");
                                    }
                                });
                            }


                        }


                    </script>

                    <style type="text/css">

                        /*#post11{
                          position:fixed;
                          top: 50%;
                          left: 50%;
                          width: 5%;
                          height: 5%;
                          z-index: 101;
                          background-color:#fff;
                          display:none;
                        }
                        */

                    </style>


                    <script type="text/javascript">


                        $(document).ready(function () {


                            $(".fancybox").on("click", function () {

                                var id = $(this).attr("id");
                                var divs = '#post' + id;

                                //   $("#post11").css("display", "block");

                                $('' + divs + '').css({

                                    "position": "fixed",
                                    "top": "0%",
                                    "left": "50%",
                                    "width": "5%",
                                    "height": "auto",
                                    "z-index": "101",
                                    "background-color": "#fff",
                                    "display": "block"


                                });

                                $('' + divs + '').animate({
                                    'width': '80%',
                                    'left': '10%'
                                }, 200, "swing", function () {
                                    $("#post11").animate({
                                        'height': '80%',
                                        'top': '10%'
                                    }, 200, "swing", function () {
                                    });


                                });


                                $(document).on("keydown", function (event) {
                                    if (event.keyCode === 27) {
                                        // $(".modal-mask").css("display", "");
                                        $('' + divs + '').css({
                                            "position": "",
                                            "top": "",
                                            "left": "",
                                            "width": "",
                                            "height": "",
                                            "z-index": "",
                                            "background-color": "",
                                            "display": ""
                                        });
                                    }
                                });


                            });


                            $(".fancyboxs").on("click", function () {

                                var id = $(this).attr("id");
                                var divs = '#' + id;


                                $('' + divs + '').css({

                                    "position": "fixed",
                                    "top": "25%",
                                    "left": "37%",
                                    "width": "25%",
                                    "height": "auto",
                                    "z-index": "101",
                                    "background-color": "#fff",
                                    "display": "block"


                                });

                                $('' + divs + '').animate({
                                    'width': '20%',
                                    'left': '37%'
                                }, 200, "swing", function () {
                                    $("#post11").animate({
                                        'height': '80%',
                                        'top': '25%'
                                    }, 200, "swing", function () {
                                    });


                                });


                                $(document).on("keydown", function (event) {
                                    if (event.keyCode === 27) {
                                        // $(".modal-mask").css("display", "");
                                        $('' + divs + '').css({
                                            "position": "",
                                            "top": "",
                                            "left": "",
                                            "width": "",
                                            "height": "",
                                            "z-index": "",
                                            "background-color": "",
                                            "display": ""
                                        });
                                    }
                                });


                            });


                            $(".comdel").click(function (e) {


                                var id = $(this).attr("id");


                                if (id == '') {
                                    alert('Required comment section');
                                }
                                else {


                                    $.ajax({

                                        type: "GET",
                                        url: "{{ asset('/') }}/index.php/postcomdelete/" + id,
                                        //  data: { id: id, user: user, comment: comment, name: name},
                                        dataType: 'json',
                                        cache: false,
                                        success: function (data) {


                                            var comment = '#cc' + data[0].idss;
                                            $(comment).hide('slow');


                                        }
                                    });
                                }


                            });


                            $(".postdelete").click(function (e) {


                                var id = $(this).attr("id");

                                if (id == '') {
                                    alert('Required comment section');
                                }
                                else {


                                    $.ajax({

                                        type: "GET",
                                        url: "{{ asset('/') }}/index.php/postdelete/" + id,
                                        //  data: { id: id, user: user, comment: comment, name: name},
                                        dataType: 'json',
                                        cache: false,
                                        success: function (data) {


                                            var comment = '#post' + data[0].idss;
                                            $(comment).hide('slow');


                                        }
                                    });
                                }


                            });


                            $(".postedit").click(function (e) {


                                var id = $(this).attr("id");


                                var para = 'p#edit' + id;

                                var postval = $(para).text();


                                if (id == '') {
                                    alert('Required comment section');
                                }
                                else {

                                    $('' + para + '').replaceWith('<input type="text" name="pp' + id + '" id="pp' + id + '" value="' + postval + '"/><button id="sav' + id + '" onclick="savepost(' + id + ');">save</button>');
                                    $('button.ed' + id + '').hide("slow");

                                }


                            });


                            $(".comedit").click(function (e) {


                                var id = $(this).attr("id");


                                var para = 'p#ppp' + id;

                                var postval = $(para).text();


                                if (id == '') {
                                    alert('Required comment section');
                                }
                                else {

                                    $('' + para + '').replaceWith('<input type="text" name="cc' + id + '" id="cc' + id + '" value="' + postval + '"/><button id="savcc' + id + '" onclick="savecom(' + id + ');">save</button>');
                                    $('button.eds' + id + '').hide("slow");

                                }


                            });


                        });
                    </script>


                    @foreach( $post as $hello)

                        <script type="text/javascript">

                            $(document).ready(function (e) {
                                $("#comments{{$hello->id}}").on('submit', (function (e) {
                                    e.preventDefault();
                                    $('#help').show();
                                    $('#help').html('<img src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...');

                                    var id = $('#post_id{{$hello->id}}').val();

                                    $.ajax({
                                        url: "ajaxreq/" + id,     // Url to which the request is send
                                        type: "POST",             // Type of request to be send, called as method
                                        data: new FormData(this),    // Data sent to server, a set of key/value pairs representing form fields and values
                                        contentType: false,           // The content type used when sending data to the server. Default is: "application/x-www-form-urlencoded"
                                        dataType: 'json',
                                        cache: false,         // To unable request pages to be cached
                                        processData: false,        // To send DOMDocument or non processed data file it is set to false (i.e. data should not be in the form of string)
                                        success: function (data)     // A function to be called if request succeeds
                                        {
                                            $('#help').hide("slow");

                                            if (data[0].targetPath != null) {

                                                var insert_id = data[0].insert_id;

                                                var idss = data[0].idss;
                                                var comment = data[0].comment;
                                                var names = data[0].names;
                                                var targetPath = data[0].targetPath;
                                                var datas = '<div id="cc' + insert_id + '"><h3>' + names + '</h3>' + '<p id="ppp' + insert_id + '">' + comment + '</p><br><img src="../' + targetPath + '" width="200" height="200"><button id="' + insert_id + '" class="comedit eds' + insert_id + '"><span class="">edit</span></button><button class="comdel" id="{{$hello->id}}" onclick="myFunction(' + insert_id + ')"><span class="glyphicon glyphicon-remove"></span></button></div>';
                                                $("#ppcomment{{$hello->id}}").append(datas);
                                                $('#comment{{$hello->id}}').val('');

                                                $('form#comments{{$hello->id}} input#imagesss').val('');


                                            }
                                            else if (data[0].targetvideo != null) {

                                                var insert_id = data[0].insert_id;

                                                var idss = data[0].idss;
                                                var comment = data[0].comment;
                                                var names = data[0].names;
                                                var targetvideo = data[0].targetvideo;
                                                var datas = '<div id="cc' + insert_id + '"><h3>' + names + '</h3>' + '<p id="ppp' + insert_id + '">' + comment + '</p><br><object width="200" height="200"><param name="movie" value="../' + targetvideo + '"><embed src="../' + targetvideo + '" width="200" height="200"></embed></object><button id="' + insert_id + '" class="comedit eds' + insert_id + '"><span class="">edit</span></button><button class="comdel" id="{{$hello->id}}" onclick="myFunction(' + insert_id + ')"><span class="glyphicon glyphicon-remove"></span></button></div>';
                                                $("#ppcomment{{$hello->id}}").append(datas);
                                                $('#comment{{$hello->id}}').val('');

                                                $('form#comments{{$hello->id}} input#imagessvideo').val('');

                                            }

                                            else {
                                                var insert_id = data[0].insert_id;

                                                var idss = data[0].idss;
                                                var comment = data[0].comment;
                                                var names = data[0].names;
                                                var datas = '<div id="cc' + insert_id + '"><h3>' + names + '</h3>' + '<p id="ppp' + insert_id + '">' + comment + '</p><button id="' + insert_id + '" class="comedit eds' + insert_id + '"><span class="">edit</span></button><button class="comdel" id="{{$hello->id}}" onclick="myFunction(' + insert_id + ')"><span class="glyphicon glyphicon-remove"></span></button></div>';
                                                $("#ppcomment{{$hello->id}}").append(datas);
                                                $('#comment{{$hello->id}}').val('');


                                            }


                                        }
                                    });
                                }));

// Function to preview image
                                $(function () {
                                    $("#file").change(function () {
                                        $("#message").empty();         // To remove the previous error message
                                        var file = this.files[0];
                                        var imagefile = file.type;
                                        var match = ["image/jpeg", "image/png", "image/jpg"];
                                        if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                                            $('#previewing').attr('src', 'noimage.png');
                                            $("#message").html("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                                            return false;
                                        }
                                        else {
                                            var reader = new FileReader();
                                            reader.onload = imageIsLoaded;
                                            reader.readAsDataURL(this.files[0]);
                                        }
                                    });
                                });
                                function imageIsLoaded(e) {
                                    $("#file").css("color", "green");
                                    $('#image_preview').css("display", "block");
                                    $('#previewing').attr('src', e.target.result);
                                    $('#previewing').attr('width', '250px');
                                    $('#previewing').attr('height', '230px');
                                }
                            });

                        </script>






                        <div class="message_box" id="post{{$hello->id}}">


                            <div class="u-nformation"><img alt="iamge" class="img-circle img_wid"
                                                           src="{{ asset('') }}/<?php if ($pick) {
                                                               echo $pick->path;
                                                           } else {
                                                               if (Auth::user()->sex == 'male') {
                                                                   echo 'imagesfb/male.jpg';
                                                               } else {
                                                                   echo 'imagesfb/female.jpg';
                                                               }
                                                           } ?>"> <a href="#"><?php  echo Auth::user()->name;?></a>
                                <button id="{{$hello->id}}" class="postdelete pull-right"><span
                                            class="glyphicon glyphicon-remove"></span></button>
                            </div>
                            <?php if($hello->path)
                            {?>


                            <div class="message_text">
                                <a class="fancybox" id="{{$hello->id}}" style="cursor:pointer;"/>
                                <img src="{{ asset('/') }}/{{$hello->path}}" width="200" height="200"/>
                                </a>
                            </div>

                            <?php
                            }?>
                            <?php if($hello->imagessvideo)
                            {?>


                            <div class="message_text">
                                <a class="fancybox" id="{{$hello->id}}" style="cursor:pointer;"/>
                            <!--          <video width="320" height="240" controls>
  <source src="{{ asset('/') }}{{$hello->imagessvideo}}" type="video/flv">


</video>
      -->

                                <object width="320" height="240">

                                    <param name="movie" value="{{ asset('/') }}{{$hello->imagessvideo}}">

                                    <embed src="{{ asset('/') }}{{$hello->imagessvideo}}" width="320" height="240">

                                    </embed>

                                </object>


                                </a>
                            </div>

                            <?php
                            }?>

                            <div class="message_text1">
                                <p id="edit{{$hello->id}}">{{$hello->post}} </p>
                                <button id="{{$hello->id}}" class="postedit ed{{$hello->id}}"><span
                                            class="">{{trans ('greeting.edit')}}</span></button>
                            </div>
                            <div class="comment_box"><span class="date_text">{{$hello->curdate}} </span>
                                <div class="like">
                                    <ul>
                                        <li><span class="glyphicon glyphicon-comment"></span></li>
                                        <li><span id="countlike{{$hello->id}}">{{$hello->like}}</span></li>
                                        <li><span>
                   <a style="cursor:pointer;" class="likes glyphicon glyphicon-thumbs-down" id="a{{$hello->id}}"
                      name="{{$hello->id}}"></a>

                 </span>


                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="message_text" id="ppcomment{{$hello->id}}">


                                @foreach( $postcomment as $hellos)




                                    <?php
                                    if($hellos->post_id == $hello->id)
                                    {?>
                                    <div id="cc{{$hellos->id}}">
                                        <h3>{{$hellos->name}} </h3>
                                        <p id="ppp{{$hellos->id}}">{{$hellos->comment}} </p>


                                        <?php if($hellos->path != null)
                                        {
                                        ?>
                                        <br>
                                        <div class="fancyboxs" id="fcc{{$hellos->id}}" style="cursor:pointer;">
                                            <img src="{{ asset('/') }}/{{$hellos->path}} " width="200" height="200"/>
                                        </div>
                                        <?php
                                        }


                                        ?>

                                        <?php if($hellos->imagessvideo != null)
                                        {
                                        ?>
                                        <br>

                                        <object width="200" height="200">

                                            <param name="movie" value="{{ asset('/') }}{{$hellos->imagessvideo}}">

                                            <embed src="{{ asset('/') }}{{$hellos->imagessvideo}}" width="200"
                                                   height="200">

                                            </embed>

                                        </object>


                                        <?php
                                        }
                                        ?>

                                        <button id="{{$hellos->id}}" class="comedit eds{{$hellos->id}}"><span
                                                    class="">{{trans ('greeting.edit')}}</span></button>
                                        <button id="{{$hellos->id}}" class="comdel"><span
                                                    class="glyphicon glyphicon-remove"></span></button>
                                    </div>



                                    <?php
                                    }?>

                                @endforeach
                            </div>
                            <div class="comment_box">
                                <form name="comments" id="comments{{$hello->id}}" method="post"
                                      enctype="multipart/form-data">
                                    {{ Form::token() }}

                                    <textarea name="comment"
                                              onkeydown="if (event.keyCode == 13) document.getElementById('submitbtn{{$hello->id}}').click()"
                                              required="" id="comment{{$hello->id}}" value=""
                                              placeholder="comment"></textarea>

                                    <input type="hidden" name="user" id="user{{$hello->id}}"
                                           value="<?php  echo Auth::user()->rand;?>"/>
                                    <input type="hidden" id="post_id{{$hello->id}}" name="post_id"
                                           value="{{$hello->id}}"/>
                                    <input type="hidden" name="name" id="name{{$hello->id}}"
                                           value="<?php  echo Auth::user()->name;?>"/>


                                    <label id="imagess"><input id="imagesss" name="imagesss" type="file"></label>


                                    <label id="imagessvideo"><input id="imagessvideo" name="imagessvideo"
                                                                    type="file"></label>


                                    <button id="submitbtn{{$hello->id}}" type="submit"
                                            class="buttonss{{$hello->id}} btn send_btn pull-right">{{trans ('greeting.Send')}}</button>
                                </form>
                            </div>


                        </div>

                    @endforeach


                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="border">
                        <input name="userid" type="hidden" id="userid" value="<?php echo Auth::user()->id;?>"/>
                        <div class="u-event">{{trans ('greeting.Upcoming Events')}} </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">

                        {{ Form:: open(array('url' => 'createevent' , 'method' => 'get','id' => 'contactform','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
                            @if($errors->any())

                                {{ implode('', $errors->all('<li>:message</li>'))  }}
                            @endif
                            {{ Form::token() }}

                            <div class="form-group padding">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' required="" name="dates" class="form-control"/>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span>
                                </div>
                                <div class="input-group padding">
                                    <input type="text" required="" name="event" class="form-control">
                                    <span class="input-group-addon glyphicon glyphicon-pencil"></span></div>
                                <div class="input-group padding">
                                    <input type="text" required="" name="address" class="form-control">
                                    <span class="input-group-addon glyphicon glyphicon-map-marker"></span></div>


                                <div class="padding">
                                    <button class="all_btn" type="submit">{{trans ('greeting.Create Event')}}</button>
                                </div>
                                <div class="padding"><span><!-- No birthdays coming up. --></span></div>
                            </div>
                            </form>

                        </div>

                        <div class="clear"></div>
                    </div>
                    <div class="border margin">
                        <div class="u-event">{{trans ('greeting.Upcoming Events')}} </div>
                        <?php $i = 0; ?>
                        @foreach( $events as $hellos)
                            <?php
                            if($i < 3)
                            { ?>

                            <div class="col-lg-12 col-md-12 col-sm-12 padding2 border-bottom"><img
                                        src="../imagesfb/man.jpg" class="img-circle img-custom img_wid pull-left"
                                        alt="iamge">
                                <div class="pull-left add-frnd"><a>{{$hellos->event}}</a><br/>
                                    <span>{{$hellos->dates}}-{{$hellos->timess}} <!-- - <a href="#">Hide</a></span>  -->
                                </div>
                            </div>



                            <?php
                            }

                            ?>


                            <?php $i++; ?>
                        @endforeach


                        <div class="col-lg-12 col-md-12 col-sm-12 padding2">
                            <a href="{{ asset('/index.php') }}/allevent/{{Auth::user()->id;}}" class="all_btn"
                               type="submit">View All</a>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div id="chatmessenger">
        <div id="chatmessengers">
            <span id="" class="notifationss glyphicon glyphicon-screenshot"><p id="newmess"
                                                                               class="messnotification"></p></span>
            <h3 id="clickchat"><span class="glyphicon glyphicon-user"></span> {{trans ('greeting.Chat Messenger')}}</h3>


        </div>
        <div id="ulchat">
            <ul>
                <?php
                if($outputs)
                {?>


                @foreach( $outputs as $hello)








                    <li id="online<?php echo $hello['idd']; ?>">
                        <span id=""></span>
                        <img style="float:left;" class="img-circle" alt="" width="30" height="30"
                             src="{{ asset('/') }}/<?php echo $hello['profilephoto']; ?>">


                        <p class="openbox" id="<?php echo $hello['idd']; ?>"
                           style="float:left; width:100px; cursor:pointer;"><?php echo $hello['name']; ?></p>
                        <div id="newvalues<?php echo $hello['idd']; ?>"></div>

                        <div id="boxs<?php echo $hello['idd']; ?>" class="allchatbox">
                            <div class="backchat">
                                <div id="nname">
                                    <?php echo $hello['name']; ?>
                                </div>
                                <div id="<?php echo $hello['idd']; ?>" class="minbox">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </div>
                                <div id="<?php echo $hello['idd']; ?>" class="maxbox">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </div>
                                <div id="<?php echo $hello['idd']; ?>" class="closebox">

                                    <span class="glyphicon glyphicon-remove"></span>
                                </div>
                            </div>
                            <form id="bo<?php echo $hello['idd']; ?>">
                                <div class="uptext" id="uptextid<?php echo $hello['idd']; ?>">


                                </div>
                                <div class="downtext">

                                    <textarea rows="1"
                                              onkeydown="if (event.keyCode == 13) document.getElementById('submitbtns<?php echo $hello['idd']; ?>').click()"
                                              required="" name="chat" id="chat<?php echo $hello['idd']; ?>"
                                              placeholder="Write a reply" class="form-control"></textarea>
                                    <input type="hidden" id="user<?php echo $hello['idd']; ?>"
                                           value="{{Auth::user()->rand;}}" name="user">
                                    <input type="hidden" id="name<?php echo $hello['idd']; ?>"
                                           value="{{Auth::user()->name; }}" name="name">
                                    <input type="hidden" id="otheruser<?php echo $hello['idd']; ?>"
                                           value="<?php echo $hello['otherrands']; ?>" name="otheruser">
                                    <input type="hidden" id="othername<?php echo $hello['idd']; ?>"
                                           value="<?php echo $hello['name']; ?>" name="othername">

                                    <button id="submitbtns<?php echo $hello['idd']; ?>" class="onlineclick chat_btn"
                                            name="<?php echo $hello['idd']; ?>" type="button"><span
                                                class="glyphicon glyphicon-send"></span>{{trans ('greeting.Reply')}}
                                    </button>

                                </div>
                            </form>


                        </div>

                        <style type="text/css">
                            #boxs<?php echo $hello['idd'];?>  {

                                display: none;

                            }


                        </style>
                    </li>


                @endforeach



                <?php
                }?>


                <?php
                if($outputss)
                {?>

                @foreach( $outputss as $hello)



                    <li id="online<?php echo $hello['idd']; ?>">
                        <span id=""></span>
                        <img style="float:left;" class="img-circle" alt=""
                             src="{{ asset('/') }}/<?php echo $hello['profilephoto']; ?>" width="30" height="30">


                        <p class="openbox" id="<?php echo $hello['idd']; ?>"
                           style="float:left; width:100px; cursor:pointer;"><?php echo $hello['name']; ?></p>
                        <div id="newvalues<?php echo $hello['idd']; ?>"></div>
                        <div id="boxs<?php echo $hello['idd']; ?>" class="allchatbox">
                            <div class="backchat">
                                <div id="nname">
                                    <?php echo $hello['name']; ?>
                                </div>
                                <div id="<?php echo $hello['idd']; ?>" class="minbox">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </div>
                                <div id="<?php echo $hello['idd']; ?>" class="maxbox">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </div>
                                <div id="<?php echo $hello['idd']; ?>" class="closebox">

                                    <span class="glyphicon glyphicon-remove"></span>
                                </div>
                            </div>
                            <form id="bo<?php echo $hello['idd']; ?>">
                                <div class="uptext" id="uptextid<?php echo $hello['idd']; ?>">


                                </div>
                                <div class="downtext">

                                    <textarea rows="1"
                                              onkeydown="if (event.keyCode == 13) document.getElementById('submitbtns<?php echo $hello['idd']; ?>').click()"
                                              required="" name="chat" id="chat<?php echo $hello['idd']; ?>"
                                              placeholder="Write a reply" class="form-control"></textarea>
                                    <input type="hidden" id="user<?php echo $hello['idd']; ?>"
                                           value="{{Auth::user()->rand;}}" name="user">
                                    <input type="hidden" id="name<?php echo $hello['idd']; ?>"
                                           value="{{Auth::user()->name; }}" name="name">
                                    <input type="hidden" id="otheruser<?php echo $hello['idd']; ?>"
                                           value="<?php echo $hello['otherrands']; ?>" name="otheruser">
                                    <input type="hidden" id="othername<?php echo $hello['idd']; ?>"
                                           value="<?php echo $hello['name']; ?>" name="othername">

                                    <button id="submitbtns<?php echo $hello['idd']; ?>" class="onlineclick chat_btn"
                                            name="<?php echo $hello['idd']; ?>" type="button"><span
                                                class="glyphicon glyphicon-send"></span>{{trans ('greeting.Reply')}}
                                    </button>

                                </div>
                            </form>


                        </div>

                        <style type="text/css">
                            #boxs<?php echo $hello['idd'];?>  {

                                display: none;

                            }


                        </style>

                    </li>



                @endforeach



                <?php
                }?>

            </ul>

        </div>

    </div>



@endsection
