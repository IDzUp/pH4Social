@foreach( $post as $hello)


    <script type="text/javascript">
        $(function () {


            $('label.imgg{{$hello->id}}').data('default', $('label[class=imgg{{$hello->id}}]').text()).click(function () {
                $('.imgg{{$hello->id}}').click()
            });
            $('.imggs{{$hello->id}}').on('change', function () {
                var files = this.files;
                if (!files.length) {
                    $('label[class=imgg{{$hello->id}}]').text($('.imggs{{$hello->id}}').data('default'));
                    return;
                }

                document.getElementById('imagess{{$hello->id}}').style.backgroundImage = 'url(../imagesfb/camerasred.png)';

            });


            $('label.vdo{{$hello->id}}').data('default', $('label[class=vdo{{$hello->id}}]').text()).click(function () {
                $('.vdo{{$hello->id}}').click()
            });
            $('.vdos{{$hello->id}}').on('change', function () {
                var files = this.files;
                if (!files.length) {
                    $('label[class=vdo{{$hello->id}}]').text($('.vdos{{$hello->id}}').data('default'));
                    return;
                }

                document.getElementById('imagessvideos{{$hello->id}}').style.backgroundImage = 'url(../imagesfb/video1red.png)';

            });


        });


    </script>



    <script type="text/javascript">

        $(document).ready(function (e) {

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
        <div class="popup_bgg">


            <div id="fleft{{$hello->id}}" class="">
                <div class="u-nformation"><img alt="iamge" class="img-circle img_wid myimgs"
                                               src="{{ asset('') }}<?php if ($allimg) {
                                                   foreach ($allimg as $img) {
                                                       if ($img->user_rand == $hello->user_rand) {
                                                           $mm = $img->thumb;
                                                           echo $mm;
                                                           break;
                                                       } else {
                                                           $mm = '';
                                                       }
                                                   }
                                               } if ($mm == '') {
                                                   foreach ($alluser as $all) {
                                                       if ($all->rand == $hello->user_rand) {
                                                           if ($all->sex == 'male') {
                                                               echo 'imagesfb/male.jpg';
                                                           } else {
                                                               echo 'imagesfb/female.jpg';
                                                           }
                                                       }
                                                   }
                                               } ?>"> <a
                            href="{{ asset('index.php') }}/profile"><?php  echo Auth::user()->name;?></a>
                    <button id="{{$hello->id}}" class="postdelete pull-right"><span
                                class="glyphicon glyphicon-remove"></span></button>
                </div>
                <?php if($hello->path)
                {?>


                <div class="message_text">
                    <a class="fancybox" id="{{$hello->id}}" style="cursor:pointer;">
                        <img src="{{ asset('/') }}{{$hello->path}}" style="max-width:100%;">
                    </a>
                </div>

                <?php
                }?>
                <?php if($hello->imagessvideo)
                {?>


                <div class="message_text">
                    <?php

                    if (starts_with($hello->imagessvideo, "http://www.youtube.com") || starts_with($hello->imagessvideo, "https://www.youtube.com") )

                    {



                    ?>

                    <object width="500" height="281">
                        <param name="allowfullscreen" value="true"/>
                        <param name="allowscriptaccess" value="always"/>
                        <param name="movie" value="{{$hello->imagessvideo}}"/>
                        <embed src="{{$hello->imagessvideo}}" type="application/x-shockwave-flash"
                               allowfullscreen="true" allowscriptaccess="always" width="500" height="281">


                        </embed>
                    </object>

                    <?php
                    }

                    elseif (starts_with($hello->imagessvideo, "http://vimeo.com") || starts_with($hello->imagessvideo, "https://vimeo.com") )

                    {


                    ?>

                    <object width="500" height="281">
                        <param name="allowfullscreen" value="true"/>
                        <param name="allowscriptaccess" value="always"/>
                        <param name="movie" value="{{$hello->imagessvideo}}"/>
                        <embed src="{{$hello->imagessvideo}}" type="application/x-shockwave-flash"
                               allowfullscreen="true" allowscriptaccess="always" width="500" height="281">


                        </embed>
                    </object>

                    <?php
                    }


                    else
                    {

                    $test = 0;
                    ?>
                    <video style="width:100%;" controls>
                        <source src="<?php if ($test == 0) {
                            echo asset('/');
                        } ?><?php echo $hello->imagessvideo; ?>" type="video/mp4">
                        <source src="<?php if ($test == 0) {
                            echo asset('/');
                        } ?><?php echo $hello->imagessvideo; ?>" type="video/ogg">
                        <source src="<?php if ($test == 0) {
                            echo asset('/');
                        } ?><?php echo $hello->imagessvideo; ?>">
                    </video>
                    <?php

                    }

                    ?>


                </div>

                <?php
                }?>

                <div class="message_text1">
                    <p id="edit{{$hello->id}}">{{$hello->post}} </p>
                    <button id="{{$hello->id}}" class="postedit ed{{$hello->id}}"><span
                                class="">{{trans ('greeting.edit')}}</span></button>
                </div>


                <div class="comment_box likebox"><span class="date_text">{{$hello->curdate}} </span>
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


            </div>


            <div id="rleft{{$hello->id}}">
                <div class="cl{{$hello->id}}" style="display:none; float:right;"><a style="cursor:pointer;"
                                                                                    name="{{$hello->id}}"
                                                                                    class="clx"><span
                                class="glyphicon glyphicon-remove"></span></a></div>
                <div class="message_text" id="ppcomment{{$hello->id}}">


                    @foreach( $postcomment as $hellos)




                        <?php
                        if($hellos->post_id == $hello->id)
                        {?>
                        <div id="cc{{$hellos->id}}" class="coment_text">
                            <h3>{{$hellos->name}} </h3>
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
                                    <video style="width:100%;" controls>
                                        <source src="<?php if ($test == 0) {
                                            echo asset('/');
                                        } ?><?php echo $hellos->imagessvideo; ?>" type="video/mp4">
                                        <source src="<?php if ($test == 0) {
                                            echo asset('/');
                                        } ?><?php echo $hellos->imagessvideo; ?>" type="video/ogg">
                                        <source src="<?php if ($test == 0) {
                                            echo asset('/');
                                        } ?><?php echo $hellos->imagessvideo; ?>">
                                    </video>
                                    <?php

                                    }

                                    ?>






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
                <div class="comment_box comment_boxs">
                    <form onsubmit="return comm({{$hello->id}},this)" name="comments" id="uni{{$hello->id}}"
                          method="post" enctype="multipart/form-data">
                        {{ Form::token() }}

                        <textarea style="width:98%; max-width:98%;" name="comment"
                                  onkeydown="if (event.keyCode == 13) document.getElementById('submitbtn{{$hello->id}}').click()"
                                  required="" id="comment{{$hello->id}}" value="" placeholder="comment"></textarea>

                        <input type="hidden" name="user" id="user{{$hello->id}}"
                               value="<?php  echo Auth::user()->rand;?>"/>
                        <input type="hidden" id="post_id{{$hello->id}}" name="post_id" value="{{$hello->id}}"/>
                        <input type="hidden" name="name" id="name{{$hello->id}}"
                               value="<?php  echo Auth::user()->name;?>"/>


                        <label id="imagess{{$hello->id}}" style="cursor:pointer;" class="imgg"><input
                                    onchange="image({{$hello->id}});" class="imggs" id="imagesss{{$hello->id}}"
                                    name="imagesss" type="file"></label>


                        <label id="imagessvideos{{$hello->id}}" style="cursor:pointer;" class="vdo"><input
                                    onchange="video({{$hello->id}});" class="vdos" id="imagessvideo{{$hello->id}}"
                                    name="imagessvideo" type="file"></label>


                        <button id="submitbtn{{$hello->id}}" type="submit"
                                class="buttonss{{$hello->id}} btn send_btn pull-right">{{trans ('greeting.Send')}}</button>
                    </form>
                </div>


            </div>
        </div>


    </div>

@endforeach


<div id="postapends">


</div>
<div class="pagenav">
    <?php echo $post->links(); ?>
</div>
