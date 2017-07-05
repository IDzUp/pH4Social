@layout(layouts.fbhome)

@section('content')

    <section>
        <div class="container">
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


                    <img src="{{ asset('/') }}imagesfb/{{$males}}" width="1170" height="334" alt=""
                         class="img-rounded"/>
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
                                <style>
                                    label#imagess {

                                        width: 93px;

                                        height: 35px;

                                        background: url('../imagesfb/cameras.jpeg') 0 0 no-repeat;

                                        border: none;

                                        padding: 0 4px 8px 0;

                                        font-weight: bold;
                                        background-size: 40px 36px;

                                    }

                                    input#imagesss {

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

                                    <li><a href="#"><span class="glyphicon glyphicon-facetime-video"></span> Upload
                                            Videos</a></li>
                                    <li><a href="{{ asset('/index.php/') }}/friendlist"><span
                                                    class="glyphicon glyphicon-tasks"></span> Friends List</a></li>
                                    <li><a href="#"><span class="glyphicon glyphicon-calendar"></span> Create New Event</a>
                                    </li>
                                    <li><a href="#"><span class="glyphicon glyphicon-music"></span> Upload a Song</a>
                                    </li>
                                    <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Create a
                                            Listing</a></li>
                                    <li><a href="#"><span class="glyphicon glyphicon-star"></span> Create a Page</a>
                                    </li>
                                </ul>
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
                                <h3 class="share">Share</h3>
                            </li>
                            <li class="active"><a href="#home" role="tab" data-toggle="tab"> <span
                                            class="glyphicon glyphicon-comment"></span> </a></li>
                            <li><a href="#profile" role="tab" data-toggle="tab"> <span
                                            class="glyphicon glyphicon-map-marker"></span> </a></li>
                            <li> <span class="">

    <label id="imagess"><input id="imagesss" name="image" type="file"></label>
             </span>


                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">


                            <div class="tab-pane active" id="home">
                                <textarea required="" name="post" class="form-control" rows="3"></textarea>
                            </div>

                            <!--  <input id="image" name="image" placeholder="Image" tabindex="1" type="file">  -->
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





              <button name="submit" id="submit" class="all_btn" type="submit">Submit</button>
                <br/>
                            </div>
                        </div>
                        <div class="clear"></div>
                        {{ Form:: close() }}
                    </div>
                    <br/>


                    <span class="hr_bor"></span>


                    <script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function () {
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

                            /*$(".fancybox").fancybox({
                             'href' : 'div#post2'
                             });
                             */

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
                                            "display": "",
                                            "width": "",
                                            "height": "",
                                            "top": "",
                                            "left": ""
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

                        });
                    </script>


                    @foreach( $post as $hello)

                        <script type="text/javascript">
                            $(document).ready(function () {


                                $(".buttonss{{$hello->id}}").click(function (e) {
                                    e.preventDefault();


                                    var comment = $('#comment{{$hello->id}}').val();

                                    if (comment == '') {
                                        alert('Required comment section');
                                    }
                                    else {
                                        var comment = $('#comment{{$hello->id}}').val();
                                        var id = $('#post_id{{$hello->id}}').val();
                                        var user = $('#user{{$hello->id}}').val();
                                        var name = $('#name{{$hello->id}}').val();

                                        $.ajax({

                                            type: "GET",
                                            url: "{{ asset('/') }}/index.php/commentpost/" + id,
                                            data: {id: id, user: user, comment: comment, name: name},
                                            dataType: 'json',
                                            cache: false,
                                            success: function (data) {


                                                var insert_id = data[0].insert_id;

                                                var idss = data[0].idss;
                                                var comment = data[0].comment;
                                                var names = data[0].names;
                                                var datas = '<div id="cc' + insert_id + '"><h3>' + names + '</h3>' + '<p>' + comment + '</p><button class="comdel" id="{{$hello->id}}" onclick="myFunction(' + insert_id + ')"><span class="glyphicon glyphicon-remove"></span></button></div>';
                                                $("#ppcomment{{$hello->id}}").append(datas);
                                                $('#comment{{$hello->id}}').val('');

                                            }
                                        });
                                    }


                                });


                            });
                        </script>






                        <div class="message_box" id="post{{$hello->id}}">


                            <div class="u-nformation"><img alt="iamge" class="img-circle img_wid"
                                                           src="{{ asset('') }}/<?php echo $pick->path;?>"> <a
                                        href="#"><?php  echo Auth::user()->name;?></a>
                                <button id="{{$hello->id}}" class="postdelete"><span
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

                            <div class="message_text1">
                                <p>{{$hello->post}} </p>
                            </div>
                            <div class="comment_box"><span class="date_text">{{$hello->created_at}} </span>
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
                                <div class="map_bg"><span class="glyphicon glyphicon-map-marker"></span></div>
                            </div>
                            <div class="message_text" id="ppcomment{{$hello->id}}">


                                @foreach( $postcomment as $hellos)




                                    <?php
                                    if($hellos->post_id == $hello->id)
                                    {?>
                                    <div id="cc{{$hellos->id}}">
                                        <h3>{{$hellos->name}} </h3>
                                        <p>{{$hellos->comment}} </p>
                                        <button id="{{$hellos->id}}" class="comdel"><span
                                                    class="glyphicon glyphicon-remove"></span></button>
                                    </div>



                                    <?php
                                    }?>

                                @endforeach
                            </div>
                            <div class="comment_box">
                                <form name="comments" id="comments">

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
                                    <button id="submitbtn{{$hello->id}}" class="buttonss{{$hello->id}}">send</button>
                                </form>
                            </div>


                        </div>

                    @endforeach


                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="border">
                        <div class="u-event">Upcoming Events</div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group padding">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control"/>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span>
                                </div>
                                <div class="input-group padding">
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon glyphicon glyphicon-map-marker"></span></div>
                                <div class="padding">
                                    <button class="all_btn" type="submit">Create Event</button>
                                </div>
                                <div class="padding"><span>No birthdays coming up.</span></div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="border margin">
                        <div class="u-event">Upcoming Events</div>
                        <div class="col-lg-12 col-md-12 col-sm-12 padding2 border-bottom"><img src="../imagesfb/man.jpg"
                                                                                               class="img-circle img-custom img_wid pull-left"
                                                                                               alt="iamge">
                            <div class="pull-left add-frnd"><a href="#">eslam</a><br/>
                                <span>Add to Friend - <a href="#">Hide</a></span></div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 padding2 border-bottom"><img src="../imagesfb/man.jpg"
                                                                                               class="img-circle img-custom  img_wid pull-left"
                                                                                               alt="iamge">
                            <div class="pull-left add-frnd"><a href="#">eslam</a><br/>
                                <span>Add to Friend - <a href="#">Hide</a></span></div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 padding2">
                            <button class="all_btn" type="submit">View All</button>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
