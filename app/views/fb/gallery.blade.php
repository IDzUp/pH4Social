@layout(layouts.fbhome)

@section('content')


    <script type="text/javascript">

        function displayPreview() {


            var name = document.getElementById('coverimage').value;
            var fileExtension = name.substr((name.lastIndexOf('.') + 1));

            if (fileExtension == 'jpg' || fileExtension == 'jpeg' || fileExtension == 'png' || fileExtension == 'JPG' || fileExtension == 'JPEG' || fileExtension == 'PNG') {


                document.getElementById('submit').click();

            }
            else {
                alert('Image Not Support');
                return false;
            }


        }


        function displayPreviews() {


            var name = document.getElementById('coverimages').value;
            var fileExtension = name.substr((name.lastIndexOf('.') + 1));

            if (fileExtension == 'mp4') {


                document.getElementById('submit1').click();

            }
            else {
                alert('Video Not Support');
                return false;
            }


        }

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


    <style scoped type="text/css">

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

        input#coverimages {

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


            {{ Form:: open(array('url' => 'gallery/save' , 'method' => 'post','name' => 'my_form','class' => 'my_form','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
                @if($errors->any())

                    {{ implode('', $errors->all('<li>:message</li>'))  }}
                @endif
                {{ Form::token() }}


                <label id="" class="search_btn">
                    Upload Photo
                    <input id="coverimage" name="image" required="" tabindex="1" type="file"
                           onchange="displayPreview();">
                </label>

                <input id="rand" name="rand" type="hidden" value="<?php echo $email = Auth::user()->rand;?>">

                <input name="submit" id="submit" tabindex="5" value="submit" type="submit" style="display:none;">
                {{ Form:: close() }}



                {{ Form:: open(array('url' => 'galleryvideo/save' , 'method' => 'post','name' => 'my_form','class' => 'my_form2','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
                @if($errors->any())

                    {{ implode('', $errors->all('<li>:message</li>'))  }}
                @endif
                {{ Form::token() }}


                <label id="" class="search_btn">
                    Upload Video
                    <input id="coverimages" name="image" required="" tabindex="1" type="file"
                           onchange="displayPreviews();">
                </label>

                <input id="rand" name="rand" type="hidden" value="<?php echo $email = Auth::user()->rand;?>">

                <input name="submit" id="submit1" tabindex="5" value="submit" type="submit" style="display:none;">
                {{ Form:: close() }}

                <div class="clear"><?php echo $gallerys->links(); ?></div>
                <div class="col-sm-9 col-sm-8 col-md-9">
                    <div class="row">

                        <div class="imgclass">
                            <h2>Images </h2>
                            <?php
                            if($gallerys)
                            {
                            ?>
                            @foreach( $gallerys as $hello)
                                <?php
                                if($hello->path != '')
                                {?>
                                <div class="col-sm-6 col-xs-6 col-md-3 small-full" id="gal{{$hello->id}}">

                                    <button id="{{$hello->id}}" class="gallerydelete"><span
                                                class="glyphicon glyphicon-remove"></span></button>
                                    <div class="clfancy{{$hello->id}}"
                                         style="display:none; float:right;  z-index:99999999999;"><a
                                                style="cursor:pointer;" name="fancy{{$hello->id}}" class="clxs"><span
                                                    class="glyphicon glyphicon-remove"></span></a></div>


                                    <div id="fancy{{$hello->id}}" class="fancyboxs">
                                        <div class="autogallery">

                                            <a href="#" class="thumbnail">
                                                <img id="imm{{$hello->id}}" src="{{ asset('/') }}/{{$hello->path}}"/>
                                            </a>
                                        </div>
                                    </div>


                                </div>
                                <?php
                                }
                                ?>


                            @endforeach

                            <?php
                            }
                            else
                            {
                            ?>

                            <h1> No Result Found</h1>

                            <?php
                            }

                            ?>

                        </div>
                        <div class="clearfix"></div>
                        <div class="videoclass">

                            <h2>Video</h2>
                            <?php
                            if($gallery)
                            {
                            ?>
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

                                            <?php
                                            if (starts_with($hello->imagessvideo, "http://www.youtube.com") || starts_with($hello->imagessvideo, "https://www.youtube.com"))

                                            {

                                            ?>

                                            <object width="100%" height="auto">
                                                <param name="allowfullscreen" value="true"/>
                                                <param name="allowscriptaccess" value="always"/>
                                                <param name="movie" value="{{$hello->imagessvideo}}"/>
                                                <embed src="{{$hello->imagessvideo}}"
                                                       type="application/x-shockwave-flash" allowfullscreen="true"
                                                       allowscriptaccess="always" width="100%" height="auto">


                                                </embed>
                                            </object>

                                            <?php
                                            }

                                            elseif (starts_with($hello->imagessvideo, "http://vimeo.com") || starts_with($hello->imagessvideo, "https://vimeo.com") )

                                            {

                                            ?>
                                            <object width="100%" height="auto">
                                                <param name="allowfullscreen" value="true"/>
                                                <param name="allowscriptaccess" value="always"/>
                                                <param name="movie" value="{{$hello->imagessvideo}}"/>
                                                <embed src="{{$hello->imagessvideo}}"
                                                       type="application/x-shockwave-flash" allowfullscreen="true"
                                                       allowscriptaccess="always" width="100%" height="auto">
                                            </object>

                                            <?php
                                            }
                                            else
                                            {



                                            ?>

                                            <video width="100%" height="auto" controls>
                                                <source src="{{ asset('/') }}{{$hello->imagessvideo}}" type="video/mp4">
                                                <source src="{{ asset('/') }}{{$hello->imagessvideo}}"
                                                        type="video/webm">
                                                <source src="{{ asset('/') }}{{$hello->imagessvideo}}" type="video/ogg">

                                            </video>

                                            <?php
                                            }
                                            ?>
                                        </a>

                                    </div>

                                </div>





                                <?php
                                }
                                ?>



                            @endforeach

                            <?php
                            }
                            else
                            {
                            ?>

                            <h1> No Result Found</h1>

                            <?php
                            }

                            ?>

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





    <script type="text/javascript">

        $(document).on("click", ".clxs", function (e) {


            var id = $(this).attr("name");


            var close = '.cl' + id;

            var divs = '#' + id;


            var imgss = '#' + id + '> .autogallery > a > img';

            var rem = '#' + id + ' > a';


            $('' + imgss + '').css({
                "max-height": "181px",
                "max-width": "181px"
            });

            $('.fancyboxs > a').css({
                "line-height": "",

            });
            $('.autogallery').css({
                "display": "",
                "height": "",
                "width": "",


            });

            $('' + divs + ' a').css({


                "background-color": "#fff",
                "border": "1px solid #ddd",

            });


            $('' + divs + ' video').css({


                "vertical-align": "",
                "width": "",

            });


            $('.thumbnail').css({
                "background-color": "#fff",
                "border": "1px solid #ddd",
                "border-radius": "4px",
                "display": "block",
                "padding": "4px",
                "vertical-align": "",

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
                "padding-top": "",
                "z-index": "",
                "height": "",


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


            var imgss = '#' + id + ' > .autogallery > a > img';

            var rem = '#' + id + ' > a';

            $('' + rem + '').removeClass("thumbnail");

            $('' + imgss + '').css({
                "max-height": "480px",
                "max-width": "inherit"
            });


            $('' + close + '').css({
                "display": "block",
                "float": "right",
                "position": "fixed",
                "right": "13px",
                "top": "9px",
                "width": "10px"
            });


            $('.fancyboxs > a').css({
                "line-height": "40.33em",

            });


            $('.thumbnail').css({
                "display": "table-cell",
                "background-color": "transparent",
                "border": "medium none",
                "border-radius": "0",
                "padding": "0",
                "vertical-align": "middle",

            });


            $('.autogallery').css({
                "display": "table",
                "height": "100%",
                "width": "100%",


            });


            $('' + divs + '').css({


                "background": "rgba(0, 0, 0, 0.9)",
                "border": "1px solid #ccc",
                "display": "block",
                "height": "auto",
                "left": "0",
                "max-height": "100%",
                "height": "100%",
                "position": "fixed",
                "text-align": "center",
                "top": "0%",
                "width": "100%",
                "padding-top": "",
                "z-index": "2147483641",

            });

            $('' + divs + ' video').css({


                "vertical-align": "middle",
                "width": "800px",

            });

            $('' + divs + ' a').css({


                "background-color": "transparent",
                "border": "none",

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
                'width': '100%',
                'left': '0%'
            }, 200, "swing", function () {
                $("#post11").animate({
                    'height': '80%',
                    'top': '0%'
                }, 200, "swing", function () {
                });


            });


            $(document).on("keydown", function (event) {
                if (event.keyCode === 27) {
                    // $(".modal-mask").css("display", "");
                    $('' + imgss + '').css({
                        "max-height": "181px",
                        "max-width": "181px"
                    });

                    $('.fancyboxs > a').css({
                        "line-height": "",

                    });
                    $('.autogallery').css({
                        "display": "",
                        "height": "",
                        "width": "",


                    });


                    $('' + divs + ' a').css({


                        "background-color": "#fff",
                        "border": "1px solid #ddd",

                    });


                    $('' + divs + ' video').css({


                        "vertical-align": "",
                        "width": "",

                    });

                    $('.thumbnail').css({
                        "background-color": "#fff",
                        "border": "1px solid #ddd",
                        "border-radius": "4px",
                        "display": "block",
                        "padding": "4px",
                        "vertical-align": "",

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
                        "padding-top": "",
                        "z-index": "",
                        "height": "",


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
