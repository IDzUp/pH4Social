@layout(layouts.fbhome)

@section('content')
    <script type="text/javascript">

        var onlinechsss = function () {


            var idss = document.getElementById("idss").value;


            $.ajax({

                type: "GET",
                url: "/opnnchat/" + idss,
                cache: false,
                success: function (data) {


                }


            });


            return false;


        };

        var intervalss = 20 * 60 * 5; // where X is your every X minutes

        setInterval(onlinechsss, intervalss);


    </script>



    <script type="text/javascript">
        $(document).ready(function () {


            $("#submitbtn").click(function (e) {
                e.preventDefault();


                var comment = $('#chat').val();

                if (comment == '') {
                    alert('Required comment section');
                }
                else {
                    var comment = $('#chat').val();
                    var user = $('#user').val();
                    var otheruser = $('#otheruser').val();
                    var id = $('#idss').val();
                    var name = $('#name').val();
                    var othername = $('#othername').val();

                    $.ajax({

                        type: "GET",
                        url: "/messagestore/" + id,
                        data: {
                            id: id,
                            user: user,
                            comment: comment,
                            otheruser: otheruser,
                            name: name,
                            othername: othername
                        },
                        dataType: 'json',
                        cache: false,
                        success: function (data) {

                            var timess = data[0].timess;
                            var comment = data[0].comment;
                            var name = data[0].names;
                            var profilephoto = data[0].profilephoto;


                            var datas = '<div class="media border-bottom margin-none bg-gray pull-right" id="messagebox"><a class="pull-right innerAll" href=""><img width="50" class="media-object" src="{{ asset('') }}' + profilephoto + '" style="width: 50px; height: 50px; display: block; margin-left: auto; margin-right: auto;"></a><div class="media-body innerTB pull-right"><a class="strong text-inverse" href="">' + name + '</a>  <small class="text-muted ">wrote on ' + timess + '</small> <a class="text-small" href=""></a><div>' + comment + '</div></div></div><div class="clearfix"></div>';
                            $("#boxchat").append(datas);
                            $('#chat').val('');


                            $("#boxchat").animate({scrollTop: '9634'}, "slow");


                            return false;

//$("#boxchat").animate({ scrollTop: $("#boxchat").attr("scrollHeight") - $('#boxchat').height() }, 3000);

                        }
                    });
                }


            });


            var ajax_callss = function () {

                var token = $("input[name=getid]").val();
                $.ajax({

                    type: "GET",
                    url: "/messtext/" + token,
                    data: '',
                    dataType: 'json',
                    cache: false,
                    success: function (data) {


                        $("#boxchat").html('');
                        for (i = 0; i < Object.keys(data).length; i++) {


                            if (data[i].rand == data[i].randuser) {
                                var datas = '<div class="media border-bottom margin-none bg-gray pull-right" id="messagebox"><a class="pull-right innerAll" href=""><img width="50" class="media-object" src="{{ asset('') }}/' + data[i].mainuserprofile + '" style="width: 50px; height: 50px; display: block; margin-left: auto; margin-right: auto;"></a><div class="media-body innerTB pull-right"><a class="strong text-inverse" href="{{ asset("index.php") }}/profile">' + data[i].user + '</a>  <small class="text-muted ">wrote on ' + data[i].timess + '</small> <a class="text-small" href=""></a><div>' + data[i].chat + '</div></div></div><div class="clearfix"></div>';
                                $("#boxchat").append(datas);
                            }
                            else {

                                var datas = '<div class="media border-bottom margin-none bg-gray pull-left"><a class="pull-left innerAll" href=""><img width="50" class="media-object" src="{{ asset('') }}/' + data[i].otheruserprofile + '" style="width: 50px; height: 50px; display: block; margin-left: auto; margin-right: auto;"></a><div class="media-body innerTB"><a class="strong text-inverse" href="{{ asset("index.php") }}/profileopen/' + data[i].idss + '">' + data[i].user + '</a>  <small class="text-muted ">wrote on ' + data[i].timess + '</small> <a class="text-small" href=""></a><div>' + data[i].chat + '</div></div></div><div class="clearfix"></div> ';
                                $("#boxchat").append(datas);

                            }


                        }


                    }
                });


                return false;


            };

            var intervalss = 20 * 60 * 5; // where X is your every X minutes

            setInterval(ajax_callss, intervalss);


        });
    </script>
    <section class="friendlist_sec">
        <?php
        $getid = $_SERVER['REQUEST_URI'];
        $pieces = explode("/", $getid);
        $value = sizeof($pieces);

        ?>
        <input type="hidden" value="<?php echo $pieces[$value - 1]; ?>" name="getid">
        <div class="container">
            <div class="row">
                <h2><span class="glyphicon glyphicon-envelope"></span> Message</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-sm-8 col-md-9">
                    <h4 class="font-oswal"><?php echo $proinfo['name']; ?></h4>
                    <div class="message-box">
                        <div class="bs-example">

                        {{ Form:: open(array('url' => '' , 'method' => 'post','id' => 'contactform','files' => 'true', 'enctype' => 'multipart/form-data','role' => 'form')) }} <!--contact_request is a router from Route class-->
                            @if($errors->any())

                                {{ implode('', $errors->all('<li>:message</li>'))  }}
                            @endif
                            {{ Form::token() }}

                            <div id="boxchat">

                                @foreach( $userchat as $hello)

                                    <?php if($hello->name == Auth::user()->name)
                                    {?>
                                    <div class="media border-bottom margin-none bg-gray pull-right" id="messagebox">
                                        <a class="pull-right innerAll" href=""><img width="50" class="media-object"
                                                                                    src="{{ asset('/') }}/{{$mainuserprofile}}"
                                                                                    style="width: 50px; height: 50px; display: block; margin-left: auto; margin-right: auto;">
                                        </a>
                                        <div class="media-body innerTB pull-right">
                                            <a class="strong text-inverse"
                                               href="{{ asset('index.php') }}/profile">{{$hello->name}}</a>
                                            <small class="text-muted ">wrote on {{$hello->timess}}</small>
                                            <a class="text-small" href=""></a>
                                            <div>{{$hello->chat}}</div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>


                                    <?php
                                    }


                                    else
                                    {?>
                                    <div class="media border-bottom margin-none bg-gray pull-left">
                                        <a class="pull-left innerAll" href=""><img width="50" class="media-object"
                                                                                   src="{{ asset('/') }}/{{$otheruserprofile}}"
                                                                                   style="width: 50px; height: 50px; display: block; margin-left: auto; margin-right: auto;"></a>
                                        <div class="media-body innerTB">
                                            <a class="strong text-inverse"
                                               href="{{ asset('index.php') }}/profileopen/<?php foreach ($alluser as $all) {
                                                   if ($all->rand == $hello->user) {
                                                       echo $all->uname;
                                                   }
                                               } ?>">{{$hello->name}}</a>
                                            <small class="text-muted ">wrote on {{$hello->timess}}</small>
                                            <a class="text-small" href=""></a>


                                            <div>{{$hello->chat}}</div>

                                        </div>
                                    </div>


                                    <div class="clearfix"></div>

                                    <?php
                                    }?>




                                @endforeach


                            </div>
                            <!--

                             -->

                            <input type="hidden" id="othername" value="{{$proinfo->name;}}" name="othername">
                            <input type="hidden" id="name" value="{{Auth::user()->name; }}" name="name">
                            <input type="hidden" id="user" value="{{Auth::user()->rand;}}" name="user">
                            <input type="hidden" id="idss" value="<?php echo $proinfo['id']; ?>" name="idss">
                            <input type="hidden" id="otheruser" value="<?php echo $proinfo['rand']; ?>"
                                   name="otheruser">

                            <textarea rows="3"
                                      onkeydown="if (event.keyCode == 13) document.getElementById('submitbtn').click()"
                                      required="" class="form-control margin-top" name="chat" id="chat"
                                      placeholder="Write a reply"></textarea>
                            <div class="highlight">
                                <button id="submitbtn" class="like_btn mar_top" type="button"><span
                                            class="glyphicon glyphicon-share"></span> Reply
                                </button>
                            </div>
                            </form>


                            {{ Form:: open(array('url' => 'delete/con' , 'method' => 'post','id' => 'delete','files' => 'true', 'enctype' => 'multipart/form-data','role' => 'form')) }} <!--contact_request is a router from Route class-->
                            @if($errors->any())
                                delete/con
                                {{ implode('', $errors->all('<li>:message</li>'))  }}
                            @endif
                            {{ Form::token() }}
                            <input type="hidden" id="user" value="{{Auth::user()->rand;}}" name="user">
                            <input type="hidden" id="otheruser" value="<?php echo $proinfo['rand']; ?>"
                                   name="otheruser">
                            <!--   <button  class="like_btn mar_top" type="submit"><span class="glyphicon glyphicon-share"></span> Delete Conversion</button> -->


                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-xs-12">

                    <div class="thumbnail add_box">
                        <h2>Advertise Here</h2>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
