@foreach( $post as $hello)
    <?php
    if($hello['id'] != '')
    {

    ?>




    <style type="text/css">

        label#imagess{{$hello['id']}}  {

            width: 16px;

            height: 14px;

            background: url('../../imagesfb/cameras.png') 0 0 no-repeat;

            border: none;

            margin: 13px 12px;

            font-weight: bold;
            background-size: 16px 14px;

        }

        input#imagesss{{$hello['id']}} {

            position: absolute;
            visibility: hidden;
        }

        label#imagessvideos{{$hello['id']}}  {

            width: 16px;

            height: 14px;

            background: url('../../imagesfb/video1.png') 0 0 no-repeat;

            border: none;

            margin: 13px 10px;

            font-weight: bold;
            background-size: 16px 14px;

        }

        input#imagessvideo{{$hello['id']}} {

            position: absolute;
            visibility: hidden;
        }


    </style>

    <script type="text/javascript">
        $(function () {


            $("label.imgg{{$hello['id']}}").data('default', $("label[class=imgg{{$hello['id']}}]").text()).click(function () {
                $(".imgg{{$hello['id']}}").click()
            });
            $(".imggs{{$hello['id']}}").on('change', function () {
                var files = this.files;
                if (!files.length) {
                    $("label[class=imgg{{$hello['id']}}]").text($(".imggs{{$hello['id']}}").data('default'));
                    return;
                }

                document.getElementById("imagess{{$hello['id']}}").style.backgroundImage = 'url(../../imagesfb/camerasred.png)';

            });


            $("label.vdo{{$hello['id']}}").data('default', $("label[class=vdo{{$hello['id']}}]").text()).click(function () {
                $(".vdo{{$hello['id']}}").click()
            });
            $(".vdos{{$hello['id']}}").on('change', function () {
                var files = this.files;
                if (!files.length) {
                    $("label[class=vdo{{$hello['id']}}]").text($(".vdos{{$hello['id']}}").data('default'));
                    return;
                }

                document.getElementById("imagessvideos{{$hello['id']}}").style.backgroundImage = 'url(../../imagesfb/video1red.png)';

            });


        });


    </script>






    <script type="text/javascript">
        $(document).ready(function () {


            $("#comments{{$hello['id']}}").on('submit', (function (e) {
                e.preventDefault();
                $('#help').show();
                $('#help').html('<img src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...');

                var id = $("#post_id{{$hello['id']}}").val();
                var link_name =<?php echo $hello['id']; ?>;

                $.ajax({
                    url: "../ajaxreq/" + id,     // Url to which the request is send
                    type: "POST",
                    xhr: function () { // custom xhr (is the best)

                        $('#percentage').show("slow");


                        if (document.getElementById('imagesss' + link_name + '').value != '') {


                            var xhr = new XMLHttpRequest();
                            var total = 0;

                            // Get the total size of files
                            $.each(document.getElementById('imagesss' + link_name + '').files, function (i, file) {
                                total += file.size;
                            });

                            // Called when upload progress changes. xhr2
                            xhr.upload.addEventListener("progress", function (evt) {
                                // show progress like example
                                var loaded = Math.round((evt.loaded / total).toFixed(2) * 100); // percent
                                if (loaded > 100) {
                                    loaded = 100;
                                }
                                $('#percentage').text('' + loaded + '%');
                            }, false);

                            return xhr;
                        }
                        else if (document.getElementById('imagessvideo' + link_name + '').value != '') {


                            var xhr = new XMLHttpRequest();
                            var total = 0;

                            // Get the total size of files
                            $.each(document.getElementById('imagessvideo' + link_name + '').files, function (i, file) {
                                total += file.size;
                            });

                            // Called when upload progress changes. xhr2
                            xhr.upload.addEventListener("progress", function (evt) {
                                // show progress like example
                                var loaded = Math.round((evt.loaded / total).toFixed(2) * 100); // percent
                                if (loaded > 100) {
                                    loaded = 100;
                                }
                                $('#percentage').text('' + loaded + '%');
                            }, false);

                            return xhr;

                        }
                        else {

                            var xhr = new XMLHttpRequest();
                            return xhr;
                        }


                    },                      // Type of request to be send, called as method
                    data: new FormData(this),    // Data sent to server, a set of key/value pairs representing form fields and values
                    contentType: false,           // The content type used when sending data to the server. Default is: "application/x-www-form-urlencoded"
                    dataType: 'json',
                    cache: false,         // To unable request pages to be cached
                    processData: false,        // To send DOMDocument or non processed data file it is set to false (i.e. data should not be in the form of string)
                    success: function (data)     // A function to be called if request succeeds
                    {

                        $('#help').hide("slow");
                        $('#percentage').hide("slow");

                        if (data[0].targetPath != null) {

                            var insert_id = data[0].insert_id;

                            var idss = data[0].idss;
                            var comment = data[0].comment;
                            var names = data[0].names;
                            var targetPath = data[0].targetPath;
                            var datas = '<div id="cc' + insert_id + '" class="coment_text"><h3>' + names + '</h3>' + '<p id="ppp' + insert_id + '">' + comment + '</p><br><div class="popupfcc' + insert_id + '"><div style="display:none; float:right;" class="clfcc' + insert_id + '"><a class="clxs" name="' + insert_id + '" style="cursor:pointer;"><span class="glyphicon glyphicon-remove"></span></a></div> <div style="cursor:pointer;" id="fcc' + insert_id + '" class="fancyboxs"><img src="../../' + targetPath + '" style="max-width:100%;"></div></div><button id="' + insert_id + '" class="comedit eds' + insert_id + '"><span class="">edit</span></button><button class="comdel" id="{{$hello["id"]}}" onclick="myFunction(' + insert_id + ')"><span class="glyphicon glyphicon-remove"></span></button></div>';
                            $("#ppcomment{{$hello['id']}}").append(datas);
                            $("#comment{{$hello['id']}}").val('');

                            $("form#comments{{$hello['id']}} input#imagesss{{$hello['id']}}").val('');

                            $("label#imagess{{$hello['id']}}").css('background-image', 'url(../../imagesfb/cameras.png)');
                        }
                        else if (data[0].targetvideo != null) {

                            var insert_id = data[0].insert_id;

                            var idss = data[0].idss;
                            var comment = data[0].comment;
                            var names = data[0].names;
                            var targetvideo = data[0].targetvideo;
                            var datas = '<div id="cc' + insert_id + '" class="coment_text"><h3>' + names + '</h3>' + '<p id="ppp' + insert_id + '">' + comment + '</p><br><video width="320" height="240" controls><source src="../../' + targetvideo + '" type="video/mp4"><source src="../../' + targetvideo + '" type="video/ogg"></video><button id="' + insert_id + '" class="comedit eds' + insert_id + '"><span class="">edit</span></button><button class="comdel" id="{{$hello["id"]}}" onclick="myFunction(' + insert_id + ')"><span class="glyphicon glyphicon-remove"></span></button></div>';
                            $("#ppcomment{{$hello['id']}}").append(datas);
                            $("#comment{{$hello['id']}}").val('');


                            $("form#comments{{$hello['id']}} input#imagessvideo{{$hello['id']}}").val('');


                            $("label#imagessvideos{{$hello['id']}}").css('background-image', 'url(../../imagesfb/video1.png)');
                        }

                        else {
                            var insert_id = data[0].insert_id;

                            var idss = data[0].idss;
                            var comment = data[0].comment;
                            var names = data[0].names;
                            var datas = '<div id="cc' + insert_id + '" class="coment_text"><h3>' + names + '</h3>' + '<p id="ppp' + insert_id + '">' + comment + '</p><button id="' + insert_id + '" class="comedit eds' + insert_id + '"><span class="">edit</span></button><button class="comdel" id="{{$hello["id"]}}" onclick="myFunction(' + insert_id + ')"><span class="glyphicon glyphicon-remove"></span></button></div>';
                            $("#ppcomment{{$hello['id']}}").append(datas);
                            $("#comment{{$hello['id']}}").val('');


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


        });
    </script>








    <div class="back"></div>




    <div class="message_box" id="post{{$hello['id']}}">

        <div id="fleft{{$hello['id']}}">

            <div class="u-nformation"><img alt="iamge" class="img-circle img_wid <?php if ($hello['myid'] == 'myid') {
                    echo 'myimgs';
                } ?>" src="{{ asset('') }}<?php if ($allimg) {
                    foreach ($allimg as $img) {
                        if ($img->user_rand == $hello['user_rand']) {
                            $mm = $img->thumb;
                            echo $mm;
                            break;
                        } else {
                            $mm = '';
                        }
                    }
                } if ($mm == '') {
                    foreach ($alluser as $all) {
                        if ($all->rand == $hello['user_rand']) {
                            if ($all->sex == 'male') {
                                echo 'imagesfb/male.jpg';
                            } else {
                                echo 'imagesfb/female.jpg';
                            }
                        }
                    }
                } ?>">

                <a href="{{ asset('index.php') }}/profileopen/<?php foreach ($alluser as $img) {
                    if ($img->rand == $hello['user_rand']) {
                        echo $img->uname;
                    }
                } ?>"><?php foreach ($alluser as $img) {
                        if ($img->rand == $hello['user_rand']) {
                            echo $img->name;
                        }
                    } ?></a>

                <?php
                if(Auth::user()->username == 'admin')
                {?>
                <button id="{{$hello['id']}}" class="postdelete pull-right"><span
                            class="glyphicon glyphicon-remove"></span></button>

                <?php
                }?>


            </div>


            <?php if($hello['path'])
            {?>
            <div class="message_text leftpop">

                <a class="fancybox" id="{{$hello['id']}}" style="cursor:pointer;">
                    <img src="{{ asset('/') }}{{$hello['path']}}" style="max-width:100%;">

                </a>
            </div>

            <?php
            }?>

            <?php if($hello['imagessvideo'])
            {?>


            <div class="message_text leftpop">


                <?php



                if (starts_with($hello['imagessvideo'], "http://www.youtube.com") || starts_with($hello['imagessvideo'], "https://www.youtube.com"))

                {
                $test = 1;
                $str = $hello['imagessvideo'];

                $newval = str_ireplace('watch?v=', 'v/', $str);
                ?>

                <object width="500" height="281">
                    <param name="allowfullscreen" value="true"/>
                    <param name="allowscriptaccess" value="always"/>
                    <param name="movie" value="<?php if ($test == 0) {
                        echo asset('/');
                    } ?><?php echo $newval; ?>"/>
                    <embed src="<?php if ($test == 0) {
                        echo asset('/');
                    } ?><?php echo $newval; ?>" type="application/x-shockwave-flash" allowfullscreen="true"
                           allowscriptaccess="always" width="500" height="281">


                    </embed>
                </object>
                <?php
                }

                elseif (starts_with($hello['imagessvideo'], "http://vimeo.com") || starts_with($hello['imagessvideo'], "https://vimeo.com") )

                {
                $test = 1;
                $str = $hello['imagessvideo'];

                $newval = str_ireplace('http://vimeo.com/channels/staffpicks/', 'http://vimeo.com/moogaloop.swf?clip_id=', $str);


                ?>

                <object width="500" height="281">
                    <param name="allowfullscreen" value="true"/>
                    <param name="allowscriptaccess" value="always"/>
                    <param name="movie" value="<?php if ($test == 0) {
                        echo asset('/');
                    } ?><?php echo $newval; ?>"/>
                    <embed src="<?php if ($test == 0) {
                        echo asset('/');
                    } ?><?php echo $newval; ?>" type="application/x-shockwave-flash" allowfullscreen="true"
                           allowscriptaccess="always" width="500" height="281">
                </object>

                <?php
                }


                else
                {

                $test = 0;
                ?>
                <video width="320" height="240" controls>
                    <source src="<?php if ($test == 0) {
                        echo asset('/');
                    } ?><?php echo $hello['imagessvideo']; ?>" type="video/mp4">
                    <source src="<?php if ($test == 0) {
                        echo asset('/');
                    } ?><?php echo $hello['imagessvideo']; ?>" type="video/ogg">

                </video>
                <?php

                }

                ?>


            </div>


            <?php
            }?>


            <div class="message_text1">

                <p id="edit{{$hello['id']}}">{{$hello['post']}} </p>
                <?php
                if(Auth::user()->username == 'admin')
                {?>

                <button id="{{$hello['id']}}" class="postedit ed{{$hello['id']}}"><span
                            class="">{{trans ('greeting.edit')}}</span></button>


                <?php
                }?>


            </div>
            <div class="comment_box likebox"><span class="date_text">{{$hello['curdate']}} </span>
                <div class="like">
                    <ul>
                        <li><span class="glyphicon glyphicon-comment"></span></li>
                        <li><span id="countlike{{$hello['id']}}">{{$hello['like']}}</span></li>
                        <li><span>
                   <a style="cursor:pointer;" class="likes glyphicon glyphicon-thumbs-down" id="a{{$hello['id']}}"
                      name="{{$hello['id']}}"></a>

                 </span>


                        </li>

                        <!--  <li><span class="glyphicon glyphicon-share-alt"></span></li> -->
                        <!--        <li><span class="glyphicon glyphicon-flag"></span></li>
                               <li><span class="glyphicon glyphicon-fullscreen"></span></li> -->
                    </ul>
                </div>

            </div>


        </div>

        <div id="rleft{{$hello['id']}}">

            <div class="cl{{$hello['id']}}" style="display:none; float:right;"><a style="cursor:pointer;"
                                                                                  name="{{$hello['id']}}"
                                                                                  class="clx"><span
                            class="glyphicon glyphicon-remove"></span></a></div>
            <div class="message_text" id="ppcomment{{$hello['id']}}">
                @foreach( $postcomment as $hellos)

                    <?php
                    if($hellos->post_id == $hello['id'])
                    {?>
                    <div id="cc{{$hellos->id}}" class="coment_text">
                        <h3>@foreach( $userss as $hh)
                                <?php
                                if($hh->rand == $hellos->user)
                                {?>
                                {{$hh->name}}
                                <?php
                                }
                                ?>
                            @endforeach
                        </h3>
                        <p id="ppp{{$hellos->id}}">{{$hellos->comment}} </p>


                        <?php if($hellos->path != null)
                        {
                        ?>
                        <br>
                        <div class="popupfcc{{$hellos->id}}">
                            <div class="clfcc{{$hellos->id}}" style="display:none; float:right;"><a
                                        style="cursor:pointer;" name="{{$hellos->id}}" class="clxs"><span
                                            class="glyphicon glyphicon-remove"></span></a></div>
                            <div class="fancyboxs" id="fcc{{$hellos->id}}" style="cursor:pointer;">
                                <img src="{{ asset('/') }}{{$hellos->path}} " style="max-width:100%;"/>
                            </div>
                        </div>


                        <?php
                        }


                        ?>

                        <?php if($hellos->imagessvideo != null)
                        {
                        ?>
                        <br>
                        <?php


                        if (starts_with($hellos->imagessvideo, "http://www.youtube.com") || starts_with($hellos->imagessvideo, "https://www.youtube.com"))

                        {

                        $test = 1;
                        $str = $hellos->imagessvideo;

                        $newval = str_ireplace('watch?v=', 'v/', $str);
                        ?>

                        <object width="500" height="281">
                            <param name="allowfullscreen" value="true"/>
                            <param name="allowscriptaccess" value="always"/>
                            <param name="movie" value="<?php if ($test == 0) {
                                echo asset('/');
                            } ?><?php echo $newval; ?>"/>
                            <embed src="<?php if ($test == 0) {
                                echo asset('/');
                            } ?><?php echo $newval; ?>" type="application/x-shockwave-flash" allowfullscreen="true"
                                   allowscriptaccess="always" width="500" height="281">


                            </embed>
                        </object>
                        <?php
                        }

                        elseif (starts_with($hellos->imagessvideo, "http://vimeo.com") || starts_with($hellos->imagessvideo, "https://vimeo.com") )

                        {
                        $test = 1;
                        $str = $hellos->imagessvideo;

                        $newval = str_ireplace('http://vimeo.com/channels/staffpicks/', 'http://vimeo.com/moogaloop.swf?clip_id=', $str);


                        ?>

                        <object width="500" height="281">
                            <param name="allowfullscreen" value="true"/>
                            <param name="allowscriptaccess" value="always"/>
                            <param name="movie" value="<?php if ($test == 0) {
                                echo asset('/');
                            } ?><?php echo $newval; ?>"/>
                            <embed src="<?php if ($test == 0) {
                                echo asset('/');
                            } ?><?php echo $newval; ?>" type="application/x-shockwave-flash" allowfullscreen="true"
                                   allowscriptaccess="always" width="500" height="281">


                                <?php
                                }



                                else
                                {

                                $test = 0;
                                ?>
                                <video width="320" height="240" controls>
                                    <source src="<?php if ($test == 0) {
                                        echo asset('/');
                                    } ?><?php echo $hellos->imagessvideo; ?>" type="video/mp4">
                                    <source src="<?php if ($test == 0) {
                                        echo asset('/');
                                    } ?><?php echo $hellos->imagessvideo; ?>" type="video/ogg">

                                </video>
                                <?php

                                }

                                ?>




                                <?php
                                }
                                ?>




                                <?php
                                if(Auth::user()->rand == $hellos->user || Auth::user()->username == 'admin')
                                {?>

                                <button id="{{$hellos->id}}" class="comedit eds{{$hellos->id}}"><span
                                            class="">{{trans ('greeting.edit')}}</span></button>

                                <button id="{{$hellos->id}}" class="comdel"><span
                                            class="glyphicon glyphicon-remove"></span></button>

                        <?php
                        }?>
                    </div>


                    <?php
                    }?>

                @endforeach
            </div>
            <div class="comment_box comment_boxs">


                <form name="comments" id="comments{{$hello['id']}}" method="post" enctype="multipart/form-data">
                    {{ Form::token() }}

                    <textarea style="width:98%; max-width:98%;" name="comment"
                              onkeydown="if (event.keyCode == 13) document.getElementById('submitbtn{{$hello['id']}}').click()"
                              required="" id="comment{{$hello['id']}}" value="" placeholder="comment"></textarea>

                    <input type="hidden" name="user" id="user{{$hello['id']}}"
                           value="<?php  echo Auth::user()->rand;?>"/>
                    <input type="hidden" id="post_id{{$hello['id']}}" name="post_id" value="{{$hello['id']}}"/>
                    <input type="hidden" name="name" id="name{{$hello['id']}}"
                           value="<?php  echo Auth::user()->name;?>"/>


                    <label style="cursor:pointer;" id="imagess{{$hello['id']}}" class="imgg{{$hello['id']}}"><input
                                class="imggs{{$hello['id']}}" id="imagesss{{$hello['id']}}" name="imagesss" type="file"></label>


                    <label style="cursor:pointer;" id="imagessvideos{{$hello['id']}}" class="vdo{{$hello['id']}}"><input
                                class="vdos{{$hello['id']}}" id="imagessvideo{{$hello['id']}}" name="imagessvideo"
                                type="file"></label>


                    <button id="submitbtn{{$hello['id']}}" type="submit"
                            class="buttonss{{$hello['id']}} btn send_btn pull-right">{{trans ('greeting.Send')}}</button>
                </form>


            </div>


        </div>

    </div>

    <?php

    }
    ?>

@endforeach





<div id="postapends">


</div>
<?php if($visi == 'done')
{
?>

<div class="pagenav">
    <?php
    echo $post->links();
    ?>
</div>
<?php
} ?>












