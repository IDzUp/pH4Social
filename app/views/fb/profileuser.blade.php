@layout(layouts.fbprofile)

@section('content')
    <style>


        form#contactformr.cancelreq {
            float: right;
        }

        label.pending_req {
            font-size: 16px;
            font-weight: normal;
            line-height: normal;
            margin: 12px 14px;
        }

        #modal-dialog {
            margin: 30px auto;
            min-width: 80% !important;
            width: 80% !important;
        }

        #submit.all_btn {
            text-transform: capitalize;
        }


    </style>
    <script type="text/javascript">

        function displayPreview() {


            var name = document.getElementById('coversimages').value;
            var fileExtension = name.substr((name.lastIndexOf('.') + 1));

            if (fileExtension == 'jpg' || fileExtension == 'jpeg' || fileExtension == 'png' || fileExtension == 'JPG' || fileExtension == 'JPEG' || fileExtension == 'PNG') {


                var files = document.getElementById('coversimages').files[0];

                var reader = new FileReader();
                var img = new Image();


                reader.onload = function (e) {
                    img.src = e.target.result;
                    fileSize = Math.round(files.size / 1024);

                    img.onload = function () {

                        var ww = this.width;


                        if (parseInt(ww) < 1100) {
                            alert('Image dimension to small');
                            return false;
                        }
                        else {

                            document.getElementById('submits').click();
                        }
                    };


                };

                reader.readAsDataURL(files);


            }
            else {

                alert('Image Not Support');
                return false;
            }

        }


        $(document).ready(function (e) {


            $("#remos").click(function () {


                var id = $(this).attr('class');

                $('#help').show();
                $('#help').html('<img src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...');

                $.ajax({
                    url: "/changedefaults/" + id,
                    type: "GET",
                    contentType: false,           // The content type used when sending data to the server. Default is: "application/x-www-form-urlencoded"
                    dataType: 'json',
                    cache: false,         // To unable request pages to be cached
                    processData: false,        // To send DOMDocument or non processed data file it is set to false (i.e. data should not be in the form of string)
                    success: function (data)     // A function to be called if request succeeds
                    {


                        var user = data[0].user;
                        $('.userphoto > img').attr('src', '{{ asset('') }}' + user + '');

                        $('img.myimgs').attr('src', '{{ asset('') }}' + user + '');

                        $('#help').hide("slow");


                    }
                });


            });


            $("#my_form").on('submit', (function (e) {
                e.preventDefault();


                var f = document.getElementById('coverimagek').files[0];
                var name = document.getElementById('coverimagek').value;
                var fileExtension = name.substr((name.lastIndexOf('.') + 1));
                var fileExtension = fileExtension.toLowerCase();
                if (fileExtension == 'jpg' || fileExtension == 'jpeg' || fileExtension == 'png') {


                    if (f.size < 2000000 || f.fileSize < 2000000) {
                        $('#help').show();
                        $('#help').html('<img src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...');


                        $.ajax({
                            url: "/fbmedia/save",
                            type: "POST",
                            xhr: function () { // custom xhr (is the best)

                                $('#percentage').show("slow");


                                if (document.getElementById('coverimagek').value != '') {


                                    var xhr = new XMLHttpRequest();
                                    var total = 0;

                                    // Get the total size of files
                                    $.each(document.getElementById('coverimagek').files, function (i, file) {
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
                                else if (document.getElementById('imagessvideo').value != '') {


                                    var xhr = new XMLHttpRequest();
                                    var total = 0;

                                    // Get the total size of files
                                    $.each(document.getElementById('imagessvideo').files, function (i, file) {
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


                            },
                            data: new FormData(this),    // Data sent to server, a set of key/value pairs representing form fields and values
                            contentType: false,           // The content type used when sending data to the server. Default is: "application/x-www-form-urlencoded"
                            dataType: 'json',
                            cache: false,         // To unable request pages to be cached
                            processData: false,        // To send DOMDocument or non processed data file it is set to false (i.e. data should not be in the form of string)
                            success: function (data)     // A function to be called if request succeeds
                            {

                                var user = data[0].path;
                                var thumb = data[0].thumb;
                                $('.userphoto > img').attr('src', '{{ asset('') }}' + user + '');

                                $('img.myimgs').attr('src', '{{ asset('') }}' + thumb + '');

                                $('#help').hide("slow");
                                $('#percentage').hide("slow");
                                $('#percentage').text('');


                            }
                        });

                    }
                    else {
                        alert('Image is Too large');

                    }
                }
                else {

                    alert('Image Not Support');
                }


            }));


            $("#remo").click(function () {


                var id = $(this).attr('class');

                $('#help').show();
                $('#help').html('<img src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...');

                $.ajax({
                    url: "/changedefault/" + id,
                    type: "GET",
                    contentType: false,           // The content type used when sending data to the server. Default is: "application/x-www-form-urlencoded"
                    dataType: 'json',
                    cache: false,         // To unable request pages to be cached
                    processData: false,        // To send DOMDocument or non processed data file it is set to false (i.e. data should not be in the form of string)
                    success: function (data)     // A function to be called if request succeeds
                    {


                        var user = data[0].user;
                        $('.cover > img').attr('src', '{{ asset('') }}public/' + user + '');
                        $('#remo').attr('style', 'color:#333;pointer-events:none');
                        $('#help').hide("slow");
                        //    $('label#coversimagess').attr('style','background:none repeat scroll 0 0 / 100% 100% #00988a; color:#333;');
                        $('label#coversimagess').attr('style', 'background:none repeat scroll 0 0 / 100% 100% #14ac9e; color:#018f81;');
                    }
                });


            });

            $("#contactform").on('submit', (function (e) {
                e.preventDefault();

                var f = document.getElementById('coversimages').files[0];

                var name = document.getElementById('coversimages').value;
                var fileExtension = name.substr((name.lastIndexOf('.') + 1));
                var fileExtension = fileExtension.toLowerCase();

                if (fileExtension == 'jpg' || fileExtension == 'jpeg' || fileExtension == 'png') {


                    if (f.size < 6000000 || f.fileSize < 6000000) {


                        $('#help').show();
                        $('#help').html('<img src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...');


                        $.ajax({
                            url: "/fbcovermedia/save",
                            type: "POST",
                            xhr: function () { // custom xhr (is the best)

                                $('#percentage').show("slow");


                                if (document.getElementById('coversimages').value != '') {


                                    var xhr = new XMLHttpRequest();
                                    var total = 0;

                                    // Get the total size of files
                                    $.each(document.getElementById('coversimages').files, function (i, file) {
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
                                else if (document.getElementById('imagessvideo').value != '') {


                                    var xhr = new XMLHttpRequest();
                                    var total = 0;

                                    // Get the total size of files
                                    $.each(document.getElementById('imagessvideo').files, function (i, file) {
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


                            },
                            data: new FormData(this),    // Data sent to server, a set of key/value pairs representing form fields and values
                            contentType: false,           // The content type used when sending data to the server. Default is: "application/x-www-form-urlencoded"
                            dataType: 'json',
                            cache: false,         // To unable request pages to be cached
                            processData: false,        // To send DOMDocument or non processed data file it is set to false (i.e. data should not be in the form of string)
                            success: function (data)     // A function to be called if request succeeds
                            {

                                var user = data[0].user;
                                $('.cover > img').attr('src', '{{ asset('') }}' + user + '');
                                $('#remo').attr('style', 'color:#333');
                                $('#help').hide("slow");
                                $('#percentage').hide("slow");
                                $('#percentage').text('');
                                $('label#coversimage').attr('style', 'background:none repeat scroll 0 0 / 100% 100% #00988a; color:#333;');
                                $('label#coversimagess').attr('style', 'background:none repeat scroll 0 0 / 100% 100% #00988a;');


                            }
                        });


                    }
                    else {
                        alert('Image is Too large');

                    }

                }
                else {

                    alert('Image Not Support');
                }

            }));


        });


        function image(val) {

            var dd = 'imagesss' + val;
            var vals = document.getElementById('' + dd + '').value;
            var valss = vals.toLowerCase();
            var res = valss.split(".");

            if (res[1] == 'jpg' || res[1] == 'png' || res[1] == 'jpeg') {

                var f = document.getElementById('' + dd + '').files[0];

                if (f.size < 20000000 || f.fileSize < 20000000) {

                    var imgid = 'imagess' + val;
                    document.getElementById('' + imgid + '').style.backgroundImage = 'url(../../public/imagesfb/camerasred.png)';
                    var imgids = 'imagessvideos' + val;
                    document.getElementById('' + imgids + '').style.backgroundImage = 'url(../../public/imagesfb/video1.png)';
                    var imgidss = 'imagessvideo' + val;

                    document.getElementById('' + imgidss + '').value = '';

                }
                else {
                    alert('Image is Too large');

                }


            }

            else {
                var imgid = 'imagess' + val;
                document.getElementById('' + dd + '').value = '';
                alert('Not Valid Extension For Image');
                document.getElementById('' + imgid + '').style.backgroundImage = 'url(../../public/imagesfb/cameras.png)';

            }

            return false;
        }
        function video(val) {

            var dd = 'imagessvideo' + val;
            var vals = document.getElementById('' + dd + '').value;
            var valss = vals.toLowerCase();
            var res = valss.split(".");

            if (res[1] == 'mp4') {
                var f = document.getElementById('' + dd + '').files[0];

                if (f.size < 20000000 || f.fileSize < 20000000) {

                    var imgid = 'imagessvideos' + val;

                    document.getElementById('' + imgid + '').style.backgroundImage = 'url(../../public/imagesfb/video1red.png)';

                    var imgids = 'imagess' + val;
                    document.getElementById('' + imgids + '').style.backgroundImage = 'url(../../public/imagesfb/cameras.png)';

                    var imgidss = 'imagesss' + val;

                    document.getElementById('' + imgidss + '').value = '';

                }
                else {
                    alert('Video is Too large');

                }


            }
            else {

                var imgid = 'imagessvideos' + val;
                document.getElementById('' + dd + '').value = '';
                alert('Not Valid Extension For Video');
                document.getElementById('' + imgid + '').style.backgroundImage = 'url(../../public/imagesfb/video1.png)';


            }
            return false;
        }


    </script>
    <section>
        <div id="help"></div>
        <div id="percentage"></div>
        <style scoped type="text/css">
            #help {

                height: 30px;
                left: 50%;
                position: fixed;
                width: 30px;
                z-index: 999999;
                display: none;
                top: 42%;

            }

            #percentage {

                height: 30px;
                left: 51%;
                position: fixed;
                width: 30px;
                z-index: 2147483647;
                display: none;
                top: 43%;
                font-weight: bold;
                color: red;

            }

            .cancelreq {
                float: right;
            }

            .pending_req {
                color: #4f4e4e;
                float: right;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 16px;
                font-weight: normal;
                line-height: 47px;
                margin-right: 14px;
                cursor: pointer;
            }

            /*****************31-Dec*********************/


        </style>


        <div class="container">
            <div class="row">
                <div class="cover">


                    <img src="{{ asset('/') }}<?php if ($proinfo) {
                        echo $proinfo->cover;
                    } elseif ($userinfo->sex == 'male') {
                        echo 'imagesfb/male_cover.jpg';
                    } else {
                        echo 'imagesfb/female_cover.jpg';
                    } ?>" width="1170" height="334" alt="" class="img-rounded"/>


                </div>
                <div class="addyour">
                    <ul>
                        <li>


                            <?php
                            if(Auth::user()->username == 'admin')
                            {?>

                            <input type="hidden" id="preview">

                            {{ Form:: open(array('url' => 'fbcovermedia/save' , 'method' => 'post','class' => 'covr','id' => 'contactform','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
                            @if($errors->any())

                                {{ implode('', $errors->all('<li>:message</li>'))  }}
                            @endif
                            {{ Form::token() }}
                            <label id="coversimage">
                                Add a Cover Photo
                                <input id="coversimages" name="image" required="" tabindex="1" type="file"
                                       onchange="displayPreview();">

                            </label>
                            <input id="rand" name="rand" type="hidden" value="<?php echo $rands;?>">

                            <input name="submit" id="submits" tabindex="5" value="submit" type="submit"
                                   style="display:none;">
                            {{ Form:: close() }}

                            <a id="remo" class="<?php echo $uname;?>" style="color:#333; <?php if (!$proinfo) {
                                echo 'pointer-events:none';
                            } ?><?php if ($proinfo) {
                                if ($proinfo->cover == 'imagesfb/male_cover.jpg' || $proinfo->cover == 'imagesfb/female_cover.jpg') {
                                    echo 'pointer-events:none';
                                }
                            }?>">
                                <label id="coversimagess">
                                    Remove Cover Photo


                                </label>
                            </a>


                            <?php
                            }
                            ?>


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
                                    <?php
                                    if(Auth::user()->username == 'admin')
                                    {?>
                                    <a id="remos" style="padding:0px; border-bottom:none; <?php if (!$proinfo) {
                                        echo 'pointer-events:none';
                                    } ?><?php if ($proinfo) {
                                        if ($proinfo->path == 'imagesfb/male.jpg' || $proinfo->path == 'imagesfb/female.jpg') {
                                            echo 'pointer-events:none';
                                        }
                                    }?>" class="<?php echo $uname; ?>">
                                        <span title="remove profile photo"
                                              style="cursor:pointer; color:red; float:right;"
                                              class="glyphicon glyphicon-remove"></span>
                                    </a>
                                    <?php
                                    }
                                    ?>

                                    <img src="{{ asset('/') }}<?php if ($proinfo) {
                                        echo $proinfo->path;
                                    } elseif ($userinfo->sex == 'male') {
                                        echo 'imagesfb/male.jpg';
                                    } else {
                                        echo 'imagesfb/female.jpg';
                                    } ?>" alt="" class="img-circle" width="170" height="170"/>


                                </div>

                                <div id="nameuser">{{$userinfo->name}}</div>
                                <ul>
                                    <li>

                                    <?php
                                    if(Auth::user()->username == 'admin')
                                    {?>

                                    {{ Form:: open(array('url' => 'fbmedia/save' , 'method' => 'post','name' => 'my_form','id' => 'my_form','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
                                        @if($errors->any())

                                            {{ implode('', $errors->all('<li>:message</li>'))  }}
                                        @endif
                                        {{ Form::token() }}


                                        <label id="coverimage">
                                            <span class="glyphicon glyphicon-tasks"></span>Set a new photo
                                            <input id="coverimagek" name="image" required="" tabindex="1" type="file"
                                                   onchange="document.getElementById('submitf').click();">
                                            <input type="hidden" name="width" value="">


                                        </label>

                                        <input id="rand" name="rand" type="hidden" value="<?php echo $rands;?>">


                                        <input name="submit" id="submitf" tabindex="5" value="submit" type="submit"
                                               style="display:none;">
                                        {{ Form:: close() }}
                                        <?php
                                        }
                                        ?>


                                    </li>


                                    <li>
                                        <a href="{{ asset('/index.php') }}/messages/<?php echo $userinfo->uname; ?>"><span
                                                    class="glyphicon glyphicon-tasks"></span> {{trans ('greeting.Messages')}}
                                        </a></li>

                                    <?php if($visi == 'done')
                                    {

                                    ?>


                                    <li>
                                        <a href="{{ asset('/index.php/') }}/gallery/<?php echo $userinfo->uname; ?>"><span
                                                    class="glyphicon glyphicon-calendar"></span> {{trans ('greeting.Gallery')}}
                                        </a></li>
                                    <li><a href="{{ asset('/index.php/') }}/about/<?php echo $userinfo->uname; ?>"><span
                                                    class="glyphicon glyphicon-calendar"></span>About</a></li>

                                    <?php
                                    }
                                    ?>

                                    <?php if($blocks == 'yes')
                                    {
                                    ?>

                                    <li>
                                        <a href="{{ asset('/index.php/') }}/unblock/<?php echo $userinfo->uname; ?>"><span
                                                    class="glyphicon glyphicon-calendar"></span> UnBlock</a></li>
                                    <?php


                                    }
                                    else
                                    {
                                    ?>

                                    <li><a href="{{ asset('/index.php/') }}/block/<?php echo $userinfo->uname; ?>"><span
                                                    class="glyphicon glyphicon-calendar"></span> Block</a></li>
                                <?php
                                }
                                ?>

                                <!--  <li><a href="#"><span class="glyphicon glyphicon-music"></span>{{trans ('greeting.Upload a Song')}} </a></li>
              <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>{{trans ('greeting.Create a Listing')}}</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-star"></span> {{trans ('greeting.Create a Page')}}</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-9">

                    <div class="border">


                        <div class="col-lg-12">
                            <div class="pull-right padding2"> <span class="dropdown ">

<?php


                                    if($pending)
                                    {

                                    ?>
                                    <div id="butons">






  {{ Form:: open(array('url' => 'unfriendrequest' , 'method' => 'post','class' => 'cancelreq','id' => 'contactformr','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
      @if($errors->any())

          {{ implode('', $errors->all('<li>:message</li>'))  }}
      @endif
      {{ Form::token() }}

      <input name="user" type="hidden" value="{{Auth::user()->rand;}}"/>
<input name="friendrequest" type="hidden" value="{{$userinfo->rand}}"/>

      <?php $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

      ?>
      <input type="hidden" value="<?php echo $url; ?>" name="urlid"/>



<button name="submit" id="submit" class="all_btn" type="submit">cancel request </button>

      </form>

      <label class="pending_req">
  <span class="glyphicon glyphicon-eye-open"></span>
  Pending request
</label>


  <!--
     <a href="{{ asset('/') }}/index.php/pendingcancel/{{$uniname}}" class="pull-right like_btn" >
            cancel request</a> -->


</div>


                                    <?php

                                    }
                                    else
                                    {


                                    if($accept)
                                    {
                                    ?>



                                    {{ Form:: open(array('url' => 'acceptfriend' ,'method' =>'get','class' => 'form-2')) }} <!--contact_request is a router from Route class-->
                                    @if($errors->any())

                                        {{ implode('', $errors->all('<div class="alert alert-danger" role="alert">:message</div>'))  }}
                                    @endif
                                    {{ Form::token() }}

                                    <input type="hidden" name="mainuser" class="" id="" value="{{ $accept->user; }}">


              <input type="hidden" name="otheruser" class="" id="" value="{{ $accept->friendrequest; }}">


            <button class="pull-right accpet_btn" type="submit">
            <span class="glyphicon glyphicon-eye-open"></span>

            Accept</button>
                                    </form>


                                    <?php


                                    }



                                    elseif($add == 0 && ($adds != 0 || $addss != 0))
                                    {?>



                                    {{ Form:: open(array('url' => 'unfriendrequest' , 'method' => 'post','id' => 'contactformr','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
                                    @if($errors->any())

                                        {{ implode('', $errors->all('<li>:message</li>'))  }}
                                    @endif
                                    {{ Form::token() }}

                                    <input name="user" type="hidden" value="{{Auth::user()->rand;}}"/>
<input name="friendrequest" type="hidden" value="{{$userinfo->rand}}"/>

                                    <?php $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

                                    ?>
                                    <input type="hidden" value="<?php echo $url; ?>" name="urlid"/>



<button name="submit" id="submit" class="all_btn" type="submit">Unfriend </button>


                                    </form>

                                    <?php
                                    }


                                    elseif($add != 0)
                                    {?>



                                    {{ Form:: open(array('url' => 'unfriendrequest' , 'method' => 'post','id' => 'contactformr','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
                                    @if($errors->any())

                                        {{ implode('', $errors->all('<li>:message</li>'))  }}
                                    @endif
                                    {{ Form::token() }}

                                    <input name="user" type="hidden" value="{{Auth::user()->rand;}}"/>
<input name="friendrequest" type="hidden" value="{{$userinfo->rand}}"/>

                                    <?php $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

                                    ?>
                                    <input type="hidden" value="<?php echo $url; ?>" name="urlid"/>



<button name="submit" id="submit" class="all_btn" type="submit">Unfriend </button>


                                    </form>

                                    <?php
                                    }







                                    else
                                    {
                                    ?>
                                    {{ Form:: open(array('url' => 'friendrequest' , 'method' => 'post','id' => 'contactformr','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
                                    @if($errors->any())

                                        {{ implode('', $errors->all('<li>:message</li>'))  }}
                                    @endif
                                    {{ Form::token() }}

                                    <input name="user" type="hidden" value="{{Auth::user()->rand;}}"/>
<input name="friendrequest" type="hidden" value="{{$userinfo->rand}}"/>

                                    <?php $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

                                    ?>
                                    <input type="hidden" value="<?php echo $url; ?>" name="urlid"/>


<button name="submit" id="submit" class="all_btn" type="submit">Add friend </button>


                                    </form>
                                    <?php

                                    }



                                    }

                                    ?>


                                    <br/>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <br/>
                    <span class="hr_bor"></span>


                    <?php if($visi == 'done')
                    {

                    ?>


                    <script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $(".likes").click(function () {
                                var id = $(this).attr("id");
                                var name = $(this).attr("name");
//var dataString = 'id='+ id + '&name='+ name;

//var dataString = 'id='+ id;
                                var classs = $(this).attr("class");
                                if (classs == 'likes glyphicon glyphicon-thumbs-down' || classs == 'glyphicon-thumbs-down likes glyphicon') {


                                    $('' + id + '').removeClass('glyphicon-thumbs-down').addClass('glyphicon-thumbs-up');

                                }
                                else {


                                    $('' + id + '').removeClass('glyphicon-thumbs-up').addClass('glyphicon-thumbs-down');

                                }

                                $.ajax({

                                    type: "GET",
                                    url: "/rating/" + name,
                                    data: '',
                                    dataType: 'json',
                                    cache: false,
                                    success: function (data) {

                                        for (i = 0; i < Object.keys(data).length; i++) {


                                            var id = 'span#countlike' + data[i].idss;


                                            $(id).html(data[i].likes);

                                            if (data[i].likes == '0') {

                                                var ids = 'a#a' + data[i].idss;
                                                $('' + ids + '').removeClass('likes glyphicon glyphicon-thumbs-up').addClass('likes glyphicon glyphicon-thumbs-down');


                                            }
                                            else {
                                                var ids = 'a#a' + data[i].idss;
                                                $('' + ids + '').removeClass('likes glyphicon glyphicon-thumbs-down').addClass('likes glyphicon glyphicon-thumbs-up');


                                            }

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
                                    url: "/postcomdelete/" + id,
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

                            var inputval = 'textarea#pp' + id;
                            var postval = $('' + inputval + '').val().trim();

                            if (postval == '') {
                                alert('Required Input text field');
                            }
                            else {


                                $.ajax({

                                    type: "GET",
                                    url: "/postupdate/" + id,
                                    data: {value: postval},
                                    dataType: 'json',
                                    cache: false,
                                    success: function (data) {


                                        $('textarea#pp' + data[0].idss + '').replaceWith('<p id="edit' + data[0].idss + '">' + data[0].valuess + '</p>');
                                        $('button.ed' + data[0].idss + '').show("slow");
                                        $('button#sav' + data[0].idss + '').hide("slow");
                                    }
                                });
                            }


                        }

                        function savecom(id) {

                            var inputval = 'textarea#cc' + id;
                            var postval = $('' + inputval + '').val().trim();

                            if (postval == '') {
                                alert('Required Input text field');
                            }
                            else {


                                $.ajax({

                                    type: "GET",
                                    url: "/comupdate/" + id,
                                    data: {value: postval},
                                    dataType: 'json',
                                    cache: false,
                                    success: function (data) {


                                        $('textarea#cc' + data[0].idss + '').replaceWith('<p id="ppp' + data[0].idss + '">' + data[0].valuess + '</p>');
                                        $('button.eds' + data[0].idss + '').show("slow");
                                        $('button#savcc' + data[0].idss + '').hide("slow");
                                    }
                                });
                            }


                        }


                    </script>
                    <script type="text/javascript">
                        $(document).ready(function () {


                            $(document).on("click", ".fancybox", function (e) {


                                var id = $(this).attr("id");
                                var divs = '#post' + id;
                                var left = '#fleft' + id;
                                var right = '#rleft' + id;
                                var img = 'a#' + id + ' > img';
                                var comment = '#rleft' + id + ' #ppcomment' + id;
                                var close = '.cl' + id;
                                var btn = 'button#' + id;
                                var imgs = 'a#' + id + ' > img';
                                //   $("#post11").css("display", "block");


                                $('' + imgs + '').css({

                                    "display": "block",
                                    "margin": "110px auto 0",
                                    "max-height": "500px",
                                    "max-width": "100%"


                                });


                                $('.like li').css({

                                    "border-left": "none"


                                });


                                $('.u-nformation').css({

                                    "font-size": "16px",
                                    "padding": "15px",
                                    "position": "absolute",
                                    "right": "186px",
                                    "border-bottom": "none"


                                });

                                $('.message_text1').css({

                                    "height": "105px",
                                    "overflow-x": "hidden",
                                    "position": "absolute",
                                    "right": "0px",
                                    "top": "36px",
                                    "position": "absolute",
                                    "width": "347px"


                                });

                                $('' + comment + '').css({

                                    "min-height": "230px"


                                });


                                $('.likebox').css({

                                    "bottom": "85px",
                                    "position": "fixed",
                                    "width": "804px",
                                    "background": "#000",
                                    "border": "#000"

                                });


                                $('body').css({
                                    "background": "none repeat scroll 0 0 #000000",

                                    "display": "table",
                                    "height": "100% !important",
                                    "table-layout": "fixed",
                                    "width": "100%",
                                    "overflow": "hidden"

                                });

                                $('' + btn + '').css({
                                    "display": "none"
                                });

                                $('' + close + '').css({
                                    "display": "block",
                                    "position": "absolute",
                                    "right": "-16px",
                                    "top": "-14px"
                                });


                                $('.comment_boxs').css({

                                    "position": "fixed",
                                    "width": "27%"


                                });


                                //   $("#post11").css("display", "block");

                                $('' + divs + '').css({

                                    "position": "fixed",
                                    "top": "10%",
                                    "left": "50%",
                                    "width": "5%",
                                    "height": "500px",
                                    "z-index": "101",
                                    "background-color": "#fff",
                                    "display": "block"


                                });

                                $('.back').css({

                                    "background-color": "#000"

                                });

                                $('' + left + '').css({

                                    "float": "left",
                                    "width": "70%",
                                    "height": "498px",
                                    "background": "none repeat scroll 0 0 #000",
                                    "border-right": "1px solid #ccc",
                                    "overflow": "scroll",
                                    "overflow-x": "hidden",


                                });


                                $('' + right + '').css({

                                    "float": "left",
                                    "height": "234px",
                                    "overflow": "scroll",
                                    "overflow-x": "hidden",
                                    "width": "30%",
                                    "margin-top": "140px"


                                });


                                $('' + img + '').css({

                                    "max-height": "300px"

                                });


                                $('' + divs + '').animate({
                                    'width': '90%',
                                    'left': '5%'
                                }, 200, "swing", function () {
                                    $("#post11").animate({
                                        'height': '80%',
                                        'top': '14%'
                                    }, 200, "swing", function () {
                                    });


                                });


                                $(document).on("keydown", function (event) {
                                    if (event.keyCode === 27) {


                                        $('.like li').css({

                                            "border-left": "1px solid #d2d2d2"


                                        });


                                        $('' + imgs + '').css({


                                            "margin": "0px",
                                            "display": ""


                                        });


                                        $('.likebox').css({

                                            "bottom": "",
                                            "position": "",
                                            "width": "",
                                            "background": "",
                                            "border": "",
                                            "max-width": ""

                                        });


                                        $('.u-nformation').css({

                                            "font-size": "",
                                            "padding": "",
                                            "position": "",
                                            "right": "",
                                            "border-bottom": "1px solid #d2d2d2"


                                        });


                                        $('.message_text1').css({

                                            "height": "",
                                            "overflow-x": "",
                                            "position": "",
                                            "right": "",
                                            "top": "",
                                            "position": "",
                                            "width": ""


                                        });


                                        $('' + comment + '').css({

                                            "min-height": "0px"


                                        });


                                        $('' + btn + '').css({
                                            "display": "block"
                                        });

                                        $('' + close + '').css({
                                            "display": "none",
                                            "position": "",
                                            "right": "",
                                            "top": ""
                                        });


                                        $('.comment_boxs').css({

                                            "position": "",
                                            "width": ""


                                        });
                                        // $(".modal-mask").css("display", "");

                                        $('body').css({
                                            "background": "",
                                            "opacity": "",
                                            "display": "",
                                            "height": "",
                                            "table-layout": "",
                                            "width": "",
                                            "overflow": ""

                                        });


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

                                        $('' + left + '').css({

                                            "float": "",
                                            "width": "",
                                            "height": "",
                                            "background": "",
                                            "border-right": "",
                                            "overflow": "",
                                            "overflow-x": "",


                                        });

                                        $('' + right + '').css({

                                            "float": "",
                                            "height": "",
                                            "overflow": "",
                                            "width": "",
                                            "overflow-x": "",
                                            "margin-top": ""


                                        });

                                        $('' + img + '').css({

                                            "max-height": ""

                                        });


                                    }
                                });


                            });


                            $(document).on("click", ".clx", function (e) {
                                var id = $(this).attr("name");

                                var divs = '#post' + id;
                                var left = '#fleft' + id;
                                var right = '#rleft' + id;
                                var img = 'a#' + id + ' > img';
                                var comment = '#rleft' + id + ' #ppcomment' + id;
                                var close = '.cl' + id;
                                var btn = 'button#' + id;

                                var imgs = 'a#' + id + ' > img';

                                $('.like li').css({

                                    "border-left": "1px solid #d2d2d2"


                                });


                                $('' + imgs + '').css({


                                    "margin": "0px",
                                    "display": ""


                                });


                                $('.likebox').css({

                                    "bottom": "",
                                    "position": "",
                                    "width": "",
                                    "background": "",
                                    "border": "",
                                    "max-width": ""

                                });


                                $('.u-nformation').css({

                                    "font-size": "",
                                    "padding": "",
                                    "position": "",
                                    "right": "",
                                    "border-bottom": "1px solid #d2d2d2"


                                });

                                $('.message_text1').css({

                                    "height": "",
                                    "overflow-x": "",
                                    "position": "",
                                    "right": "",
                                    "top": "",
                                    "position": "",
                                    "width": ""


                                });


                                $('' + comment + '').css({

                                    "min-height": "0px"


                                });


                                $('.comment_boxs').css({

                                    "position": "",
                                    "width": ""


                                });

                                $('body').css({
                                    "background": "",
                                    "opacity": "",
                                    "display": "",
                                    "height": "",
                                    "table-layout": "",
                                    "width": "",
                                    "overflow": ""

                                });


                                $('' + close + '').css({
                                    "display": "none",
                                    "position": "",
                                    "right": "",
                                    "top": ""
                                });


                                $('' + btn + '').css({
                                    "display": "block"
                                });

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
                                $('' + left + '').css({

                                    "float": "",
                                    "width": "",
                                    "height": "",
                                    "background": "",
                                    "border-right": "",
                                    "overflow": "",
                                    "overflow-x": "",


                                });

                                $('' + right + '').css({

                                    "float": "",
                                    "height": "",
                                    "overflow": "",
                                    "width": "",
                                    "overflow-x": "",
                                    "margin-top": ""


                                });

                                $('' + img + '').css({

                                    "max-height": ""

                                });


                            });


                            $(document).on("click", ".clxs", function (e) {


                                var id = $(this).attr("name");


                                var close = '.clfcc' + id;

                                var divs = '.popupfcc' + id;

                                var imgss = '#fcc' + id + ' > img';

                                $('' + imgss + '').css({
                                    "max-height": ""
                                });


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

                                var divs = '.popup' + id;


                                var imgss = '#' + id + ' > img';

                                $('' + imgss + '').css({
                                    "max-height": "450px"
                                });


                                $('' + close + '').css({
                                    "display": "block",
                                    "float": "right",
                                    "position": "absolute",
                                    "right": "0",
                                    "top": "-13px",
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
                                    "top": "20%",
                                    "width": "75%",
                                    "z-index": "101"
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
                                    'width': '75%',
                                    'left': '10%'
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


                            $(".comdel").click(function (e) {


                                var id = $(this).attr("id");

                                if (id == '') {
                                    alert('Required comment section');
                                }
                                else {


                                    $.ajax({

                                        type: "GET",
                                        url: "/postcomdelete/" + id,
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
                                        url: "/postdelete/" + id,
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
                    <div id="pppost">
                        @foreach( $post as $hello)
                            <?php
                            if($hello['id'] != '')
                            {

                            ?>




                            <style type="text/css">

                                label#imagess{{$hello['id']}}  {

                                    width: 16px;

                                    height: 14px;

                                    background: url('../../public/imagesfb/cameras.png') 0 0 no-repeat;

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

                                    background: url('../../public/imagesfb/video1.png') 0 0 no-repeat;

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
                                /*$(function () {


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


                                 */
                            </script>






                            <script type="text/javascript">
                                $(document).ready(function () {


                                    $("#comments{{$hello['id']}}").on('submit', (function (e) {
                                        e.preventDefault();

                                        var id = $("#post_id{{$hello['id']}}").val();

                                        var textpost = $('#comment' + id + '').val().trim();

                                        if (textpost == '') {

                                            alert('Comment field required');
                                            return false;
                                        }

                                        $('#help').show();
                                        $('#help').html('<img src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...');


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

                                                    $("label#imagess{{$hello['id']}}").css('background-image', 'url(../../public/imagesfb/cameras.png)');
                                                }
                                                else if (data[0].targetvideo != null) {

                                                    var insert_id = data[0].insert_id;

                                                    var idss = data[0].idss;
                                                    var comment = data[0].comment;
                                                    var names = data[0].names;
                                                    var targetvideo = data[0].targetvideo;
                                                    var datas = '<div id="cc' + insert_id + '" class="coment_text"><h3>' + names + '</h3>' + '<p id="ppp' + insert_id + '">' + comment + '</p><br><video style="width:100%" controls><source src="../../' + targetvideo + '" type="video/mp4"><source src="../../' + targetvideo + '" type="video/ogg"></video><button id="' + insert_id + '" class="comedit eds' + insert_id + '"><span class="">edit</span></button><button class="comdel" id="{{$hello["id"]}}" onclick="myFunction(' + insert_id + ')"><span class="glyphicon glyphicon-remove"></span></button></div>';
                                                    $("#ppcomment{{$hello['id']}}").append(datas);
                                                    $("#comment{{$hello['id']}}").val('');


                                                    $("form#comments{{$hello['id']}} input#imagessvideo{{$hello['id']}}").val('');


                                                    $("label#imagessvideos{{$hello['id']}}").css('background-image', 'url(../../public/imagesfb/video1.png)');
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

                                            $('' + para + '').replaceWith('<textarea style="width:100%" name="cc' + id + '" id="cc' + id + '">' + postval + '</textarea><button id="savcc' + id + '" onclick="savecom(' + id + ');">save</button>');
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

                                            $('' + para + '').replaceWith('<textarea style="width:100%" name="pp' + id + '" id="pp' + id + '">' + postval + '</textarea><button id="sav' + id + '" onclick="savepost(' + id + ');">save</button>');
                                            $('button.ed' + id + '').hide("slow");

                                        }


                                    });


                                });
                            </script>








                            <div class="back"></div>




                            <div class="message_box" id="post{{$hello['id']}}">

                                <div id="fleft{{$hello['id']}}">

                                    <div class="u-nformation"><img alt="iamge"
                                                                   class="img-circle img_wid <?php if ($hello['myid'] == 'myid') {
                                                                       echo 'myimgs';
                                                                   } ?>" src="{{ asset('') }}/<?php if ($allimg) {
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

                                        <a class="fancybox" id="{{$hello['id']}}" style="cursor:pointer;"/>
                                        <img src="{{ asset('/') }}/{{$hello['path']}}" style="max-width:100%;"/></a>
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
                                            } ?><?php echo $newval; ?>" type="application/x-shockwave-flash"
                                                   allowfullscreen="true" allowscriptaccess="always" width="500"
                                                   height="281">


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
                                            } ?><?php echo $newval; ?>" type="application/x-shockwave-flash"
                                                   allowfullscreen="true" allowscriptaccess="always" width="500"
                                                   height="281">
                                        </object>

                                        <?php
                                        }


                                        else
                                        {

                                        $test = 0;
                                        ?>
                                        <video style="width:100%" controls>
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
                                    <div class="comment_box likebox"><span
                                                class="date_text">{{$hello['curdate']}} </span>
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

                                    <div class="cl{{$hello['id']}}" style="display:none; float:right;"><a
                                                style="cursor:pointer;" name="{{$hello['id']}}" class="clx"><span
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
                                                    <div class="clfcc{{$hellos->id}}"
                                                         style="display:none; float:right;"><a style="cursor:pointer;"
                                                                                               name="{{$hellos->id}}"
                                                                                               class="clxs"><span
                                                                    class="glyphicon glyphicon-remove"></span></a></div>
                                                    <div class="fancyboxs" id="fcc{{$hellos->id}}"
                                                         style="cursor:pointer;">
                                                        <img src="{{ asset('/') }}/{{$hellos->path}} "
                                                             style="max-width:100%;"/>
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
                                                    } ?><?php echo $newval; ?>" type="application/x-shockwave-flash"
                                                           allowfullscreen="true" allowscriptaccess="always" width="500"
                                                           height="281">


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
                                                    } ?><?php echo $newval; ?>" type="application/x-shockwave-flash"
                                                           allowfullscreen="true" allowscriptaccess="always" width="500"
                                                           height="281">


                                                        <?php
                                                        }



                                                        else
                                                        {

                                                        $test = 0;
                                                        ?>
                                                        <video style="width:100%" controls>
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

                                                        <button id="{{$hellos->id}}" class="comedit eds{{$hellos->id}}">
                                                            <span class="">{{trans ('greeting.edit')}}</span></button>

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


                                        <form name="comments" id="comments{{$hello['id']}}" method="post"
                                              enctype="multipart/form-data">
                                            {{ Form::token() }}

                                            <textarea style="width:98%; max-width:98%;" name="comment"
                                                      onkeydown="if (event.keyCode == 13) document.getElementById('submitbtn{{$hello['id']}}').click()"
                                                      required="" id="comment{{$hello['id']}}" value=""
                                                      placeholder="comment"></textarea>

                                            <input type="hidden" name="user" id="user{{$hello['id']}}"
                                                   value="<?php  echo Auth::user()->rand;?>"/>
                                            <input type="hidden" id="post_id{{$hello['id']}}" name="post_id"
                                                   value="{{$hello['id']}}"/>
                                            <input type="hidden" name="name" id="name{{$hello['id']}}"
                                                   value="<?php  echo Auth::user()->name;?>"/>


                                            <label style="cursor:pointer;" id="imagess{{$hello['id']}}"
                                                   class="imgg{{$hello['id']}}"><input
                                                        onchange="image({{$hello['id']}});" class="imggs"
                                                        id="imagesss{{$hello['id']}}" name="imagesss"
                                                        type="file"></label>


                                            <label style="cursor:pointer;" id="imagessvideos{{$hello['id']}}"
                                                   class="vdo{{$hello['id']}}"><input
                                                        onchange="video({{$hello['id']}});" class="vdos"
                                                        id="imagessvideo{{$hello['id']}}" name="imagessvideo"
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





                        <?php
                        }

                        ?>

                    </div>
                    <?php if($visi == 'done')
                    {
                    ?>
                    <div class="pagenav">
                        <?php
                        echo $post->links();
                        ?>
                    </div>
                </div>
                <?php
                } ?>


                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="thumbnail add_box">
                        <h2>Advertise Here</h2>
                    </div>
                    <div class="thumbnail add_box">
                        <h2>Advertise Here</h2>
                    </div>
                    <!--  <div class="border">
          <div class="u-event">Upcoming Events </div>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group padding">
              <div class='input-group date' id='datetimepicker1'>
                <input type='text' class="form-control" />
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> </div>
              <div class="input-group padding">
                <input type="text" class="form-control">
                <span class="input-group-addon glyphicon glyphicon-map-marker"></span> </div>
              <div class="padding">
                <button class="all_btn" type="submit">Create Event</button>
              </div>
              <div class="padding"> <span>No birthdays coming up.</span> </div>
            </div>
          </div>
          <div class="clear"></div>
        </div>
        <div class="border margin">
          <div class="u-event">Upcoming Events </div>
          <div class="col-lg-12 col-md-12 col-sm-12 padding2 border-bottom"> <img src="../imagesfb/man.jpg" class="img-circle img-custom img_wid pull-left" alt="iamge">
            <div class="pull-left add-frnd"> <a href="#">eslam</a><br />
              <span>Add to Friend - <a href="#">Hide</a></span> </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 padding2 border-bottom"> <img src="../imagesfb/man.jpg" class="img-circle img-custom  img_wid pull-left" alt="iamge">
            <div class="pull-left add-frnd"> <a href="#">eslam</a><br />
              <span>Add to Friend - <a href="#">Hide</a></span> </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 padding2">
            <button class="all_btn" type="submit">View All</button>
          </div>
          <div class="clear"></div>
        </div> -->
                </div>


            </div>
        </div>
        <style>


            label#imagess {

                width: 16px;

                height: 14px;

                background: url('../public/imagesfb/cameras.png') 0 0 no-repeat;

                border: none;

                margin: 13px 12px;

                font-weight: bold;
                background-size: 16px 14px;

            }

            input#imagesss {

                position: absolute;
                visibility: hidden;
            }

            label#imagessvideok {

                width: 16px;

                height: 14px;

                background: url('../public/imagesfb/video1.png') 0 0 no-repeat;

                border: none;

                margin: 13px 10px;

                font-weight: bold;
                background-size: 16px 14px;

            }

            input#imagessvideo {

                position: absolute;
                visibility: hidden;
            }

            label#coversimagess {
                background: none repeat scroll 0 0 / 100% 100% #00988a;
                border: medium none;
                font-weight: bold;
                padding: 13px 4px 12px 0;
                text-align: center;
                width: 20%;
                cursor: pointer;
            }

            label#coversimagess:hover {

                width: 20%;

                /*background: url('../imagesfb/add_cover_hover.jpg') 0 0 no-repeat;*/
                background: none repeat scroll 0 0 #333333 !important;
                border: none;
                text-align: center;
                padding: 13px 4px 12px 0;
                font-weight: bold;
                color: white;
                cursor: pointer;

            }

            label#coversimage {

                width: 100%;

                height: 35px;

                /*background: url('../imagesfb/add_cover.jpg') 0 0 no-repeat;*/
                background: none repeat scroll 0 0 #00988a;
                border: none;

                padding: 0 4px 8px 0;
                text-align: center;
                font-weight: bold;
                background-size: 100% 100%;

            }

            label#coversimage:hover {

                width: 100%;

                height: 35px;

                /*background: url('../imagesfb/add_cover_hover.jpg') 0 0 no-repeat;*/
                background: none repeat scroll 0 0 #333333;
                border: none;

                padding: 0 4px 8px 0;

                font-weight: bold;
                background-size: 100% 100%;
                color: white;
                cursor: pointer;

            }

            input#coverimagek {

                position: absolute;
                visibility: hidden;
            }

            label#coversimage {

                width: 100%;

                height: 35px;

                /*background: url('../imagesfb/add_cover.jpg') 0 0 no-repeat;*/
                background: none repeat scroll 0 0 #00988a;
                border: none;

                padding: 0 4px 8px 0;
                text-align: center;
                font-weight: bold;
                background-size: 100% 100%;

            }

            label#coversimage:hover {

                width: 100%;

                height: 35px;

                /*background: url('../imagesfb/add_cover_hover.jpg') 0 0 no-repeat;*/
                background: none repeat scroll 0 0 #333333;
                border: none;

                padding: 0 4px 8px 0;

                font-weight: bold;
                background-size: 100% 100%;
                color: white;
                cursor: pointer;

            }

            input#coversimages {

                position: absolute;
                visibility: hidden;
            }

            .covr {
                float: left;
                width: 80%;

            }

        </style>
        <script type="text/javascript">

            var screenWidth = window.screen.width;
            if (screenWidth < 400) {

                $("a").removeClass("fancybox").addClass("fancyboxss");
                $("div").removeClass("fancyboxs").addClass("fancyboxss");
            }


        </script>
    </section>
@endsection
