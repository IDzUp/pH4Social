@layout(layouts.fbhome)

@section('content')


    <script type="text/javascript">


        $(document).ready(function () {


            $(".gallerydelete").click(function (e) {


                var id = $(this).attr("id");

                if (id == '') {
                    alert('Required comment section');
                }
                else {


                    $.ajax({

                        type: "GET",
                        url: "{{ asset('/') }}/index.php/gallerydelete/" + id,
                        //  data: { id: id, user: user, comment: comment, name: name},
                        dataType: 'json',
                        cache: false,
                        success: function (data) {


                            var comment = '#gal' + data[0].idss;
                            $(comment).hide('slow');


                        }
                    });
                }


            });

        });
    </script>



    <style type="text/css">

        label#coverimage {

            width: 196px;

            height: 35px;

            background: url('../imagesfb/photo_text.jpg') 0 0 no-repeat;

            border: none;

            padding: 0 4px 8px 0;

            font-weight: bold;
            background-size: 195px 47px;

        }

        input#coverimage {

            position: absolute;
            visibility: hidden;
        }


    </style>





    <section class="friendlist_sec">
        <div class="container">
            <div class="row">
                <h2><span class="glyphicon glyphicon-camera"></span> Gallery</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">


            {{ Form:: open(array('url' => 'gallery/save' , 'method' => 'post','name' => 'my_form','id' => 'my_form','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
                @if($errors->any())

                    {{ implode('', $errors->all('<li>:message</li>'))  }}
                @endif
                {{ Form::token() }}


                <label id="coverimage">
                    <input id="coverimage" name="image" required="" tabindex="1" type="file"
                           onchange="document.getElementById('submit').click();">
                </label>

                <input id="rand" name="rand" type="hidden" value="<?php echo $email = Auth::user()->rand;?>">

                <input name="submit" id="submit" tabindex="5" value="submit" type="submit" style="display:none;">
                {{ Form:: close() }}
                <div class="clear"><?php echo $gallerys->links(); ?></div>

                <div class="clear"></div>
                <div class="col-sm-9 col-sm-8 col-md-9">
                    <div class="row">


                        <div class="imgclass">
                            <h2>Images</h2>

                            @foreach( $gallerys as $hello)
                                <?php
                                if($hello->path != '')
                                {?>
                                <div class="col-sm-6 col-md-3" id="gal{{$hello->id}}">
                                    <?php
                                    if(Auth::user()->username == 'admin')
                                    {?>
                                    <button id="{{$hello->id}}" class="gallerydelete"><span
                                                class="glyphicon glyphicon-remove"></span></button>

                                    <?php
                                    }?>

                                    <div class="clfancy{{$hello->id}}"
                                         style="display:none; float:right;  z-index:99999999999;"><a
                                                style="cursor:pointer;" name="fancy{{$hello->id}}" class="clxs"><span
                                                    class="glyphicon glyphicon-remove"></span></a></div>

                                    <div id="fancy{{$hello->id}}" class="fancyboxs">

                                        <a class="thumbnail" href="#">
                                            <img src="{{ asset('/') }}/{{$hello->path}}"/>
                                        </a>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>


                            @endforeach


                        </div>
                        <div class="clearfix"></div>
                        <div class="videoclass">

                            <h2>Video</h2>
                            @foreach( $gallery as $hello)

                                <?php
                                if($hello->imagessvideo != '')
                                {?>

                                <div class="col-sm-6 col-xs-6 col-md-4 small-full" id="gal{{$hello->id}}">

                                    <button id="{{$hello->id}}" class="gallerydelete"><span
                                                class="glyphicon glyphicon-remove"></span></button>

                                    <div class="clfancy{{$hello->id}}"
                                         style="display:none; float:right;z-index:99999999999;"><a
                                                style="cursor:pointer;" name="fancy{{$hello->id}}" class="clxs"><span
                                                    class="glyphicon glyphicon-remove"></span></a></div>

                                    <div id="fancy{{$hello->id}}" class="fancyboxs">
                                        <a href="#" class="thumbnail">


                                            <video width="100%" height="auto" controls>
                                                <source src="{{ asset('/') }}{{$hello->imagessvideo}}" type="video/mp4">
                                                <source src="{{ asset('/') }}{{$hello->imagessvideo}}"
                                                        type="video/webm">
                                                <source src="{{ asset('/') }}{{$hello->imagessvideo}}" type="video/ogg">

                                            </video>

                                        </a>

                                    </div>

                                </div>





                                <?php
                                }
                                ?>



                            @endforeach


                        </div>


                        <div class="clear"></div>

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




    <script type="text/javascript">

        $(document).on("click", ".clxs", function (e) {

            var id = $(this).attr("name");


            var close = '.cl' + id;

            var divs = '#' + id;


            var imgss = '#' + id + ' > a > img';

            var rem = '#' + id + ' > a';


            $('' + imgss + '').css({
                "max-height": ""
            });


            $('' + rem + '').addClass("thumbnail");
            $('' + close + '').css({
                "display": "none",

                "float": "",
                "position": "",
                "right": "",
                "top": "",
                "width": ""
            });


            $('' + divs + '').css({

                "background": "",
                "border": "",
                "display": "",
                "height": "",
                "left": "",
                "min-height": "",
                "position": "",
                "text-align": "",
                "top": "",
                "width": "",
                "z-index": ""


            });

            $('body').css({
                "background": "",

                "display": "",
                "height": "",
                "table-layout": "",
                "width": "",
                "overflow": ""

            });


        });

        $(document).on("click", ".fancyboxs", function (e) {

            var id = $(this).attr("id");


            var close = '.cl' + id;

            var divs = '#' + id;


            var imgss = '#' + id + ' > a > img';

            var rem = '#' + id + ' > a';

            $('' + rem + '').removeClass("thumbnail");

            $('' + imgss + '').css({
                "max-height": "450px"
            });


            $('' + close + '').css({
                "display": "block",
                "float": "right",
                "position": "absolute",
                "left": "888px",
                "top": "-140px",
                "width": "10px"
            });


            $('' + divs + '').css({


                "background": "none repeat scroll 0 0 #000",
                "border": "1px solid #ccc",
                "display": "block",
                "height": "auto",
                "left": "12%",
                "max-height": "500px",
                "position": "fixed",
                "text-align": "center",
                "top": "15%",
                "width": "55%",
                "z-index": "2147483641"
            });


            $('body').css({
                "background": "none repeat scroll 0 0 #000000",

                "display": "table",
                "height": "100% !important",
                "table-layout": "fixed",
                "width": "100%",
                "overflow": "hidden"

            });


            $('' + divs + '').animate({
                'width': '55%',
                'left': '20%'
            }, 200, "swing", function () {
                $("#post11").animate({
                    'height': '80%',
                    'top': '14%'
                }, 200, "swing", function () {
                });


            });


            $(document).on("keydown", function (event) {
                if (event.keyCode === 27) {
                    // $(".modal-mask").css("display", "");
                    $('' + imgss + '').css({
                        "max-height": ""
                    });


                    $('' + rem + '').addClass("thumbnail");
                    $('' + close + '').css({
                        "display": "none",

                        "float": "",
                        "position": "",
                        "right": "",
                        "top": "",
                        "width": ""
                    });


                    $('' + divs + '').css({

                        "background": "",
                        "border": "",
                        "display": "",
                        "height": "",
                        "left": "",
                        "min-height": "",
                        "position": "",
                        "text-align": "",
                        "top": "",
                        "width": "",
                        "z-index": ""


                    });

                    $('body').css({
                        "background": "",

                        "display": "",
                        "height": "",
                        "table-layout": "",
                        "width": "",
                        "overflow": ""

                    });


                }
            });


        });


    </script>












@endsection
