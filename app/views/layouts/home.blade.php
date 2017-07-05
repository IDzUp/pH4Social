@layout(layouts.fbhome)

@section('content')


    <section class="banner_outer">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="left_box">
                        <h1>{{trans ('greeting.Meet new people')}}</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </br>
                            Donec in placerat magna. Maecenas vestibulum id felis</p>
                        <a href="#"><img src="../imagesfb/app_storebtn.png" alt=""/></a> <a href="#"><img
                                    src="../imagesfb/google_playbtn.png" alt=""/></a> <a href="#"><img
                                    src="../imagesfb/window_storebtn.png" alt=""/></a></div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form_box">
                    <?php

                    function generateRandomString($length = 10)
                    {
                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $randomString = '';
                        for ($i = 0; $i < $length; $i++) {
                            $randomString .= $characters[rand(0, strlen($characters) - 1)];
                        }
                        return $randomString;
                    }

                    ?>


                    {{ Form:: open(array('url' => 'getregistersfb' ,'method' =>'get','class' => 'form-2')) }} <!--contact_request is a router from Route class-->
                        <div class="error-container">
                            @if($errors->any())

                                @if ($errors->has('email')) '
                                <div class="alert alert-danger" role="alert">You Already have an Account</div>@endif
                                @if ($errors->has('password')) '
                                <div class="alert alert-danger" role="alert">Password Required</div>@endif
                                @if ($errors->has('name')) '
                                <div class="alert alert-danger" role="alert">Username Required</div>@endif
                                @if ($errors->has('city')) '
                                <div class="alert alert-danger" role="alert">City Required</div>@endif

                            @endif
                        </div>
                        <style>
                            .activa {
                                left: -795px;
                                position: absolute;
                                top: 0;
                            }
                        </style>
                        <div class="error-container activa">
                            @if (Session::has('activte'))
                                <div class="alert alert-danger" role="alert">{{ Session::get('activte') }}</div>
                            @endif
                        </div>
                        {{ Form::token() }}
                        <h2>{{trans ('greeting.Sign up')}}</h2>
                        <div class="form-group">
                            <input type="email" name="email" required="" class="form-control input_height"
                                   placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="Username" name="name" value="" required="" class="form-control input_height"
                                   id="emm" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" required="" name="city"
                                   class="form-control input_height" id="emms" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="City" name="city" required="" class="form-control input_height" id=""
                                   placeholder="City">
                        </div>
                        <div class="form-group"> {{trans ('greeting.Gender')}}
                            <label class="checkbox-inline">
                                <input type="radio" name="sex" id="" checked="" value="male">
                                {{trans ('greeting.Male')}} </label>
                            <label class="checkbox-inline">
                                <input type="radio" name="sex" id="" value="female">
                                {{trans ('greeting.Female')}} </label>
                        </div>
                        <input type="hidden" value="<?php echo $random = generateRandomString(); ?>" name="rand">
                        <p class="sign-button">
                            <button type="submit" class="sign_btn">{{trans ('greeting.Sign up')}}</button>
                        </p>
                        </form>
                    </div>
                    <div class="shadow"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="banner_shadow"></section>
    <section class="share_sec">
        <div class="container">
            <div class="row">
                <h2><span class="glyphicon glyphicon-music"></span> Share & discover similar interests</h2>
            </div>
        </div>
    </section>
    <section class="show_sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="share_box">
                        <div class="img_border"><img src="../imagesfb/tv_img.png" alt=""/></div>
                        <p>Share your insights on today's top movies and more.</p>
                        <div class="confirm_box"><a href="#" class="movies_btn">Movies</a></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="share_box">
                        <div class="img_border"><img src="../imagesfb/tvshow.png" alt=""/></div>
                        <p>Share your insights on today's top movies and more.</p>
                        <div class="confirm_box"><a href="#" class="movies_btn">TV Shows</a></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="share_box">
                        <div class="img_border"><img src="../imagesfb/music.png" alt=""/></div>
                        <p>Share your insights on today's top movies and more.</p>
                        <div class="confirm_box"><a href="#" class="movies_btn">Music</a></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="share_box">
                        <div class="img_border"><img src="../imagesfb/book.png" alt=""/></div>
                        <p>Share your insights on today's top movies and more.</p>
                        <div class="confirm_box"><a href="#" class="movies_btn">Books</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pepole_banner">
        <div class="container">
            <div class="row">
                <h1>1,453,203
                    <p>Messages sent between users in the last month </p>
                </h1>
                <p>With hundreds of thousands of users you'll never run out of new people to chat with, new music to
                    discover, or fun things to do</p>
            </div>
        </div>
    </section>
    <section class="conversation_sec">
        <div class="container">
            <div class="row">
                <h2><span class="glyphicon glyphicon-volume-up"></span> </span>Start a new conversation now... it's time
                    to be social</h2>
            </div>
        </div>
        <div class="container">

            <div class="row">

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                    <div class="row">

                        <div class="user_img">

                            <img src="../imagesfb/user_img.jpg" alt=""/>

                        </div>

                        <div class="conversation_box2">

                            <div class="logo2">

                                <img src="../imagesfb/logo2.png" alt=""/>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                    <div class="row">

                        <div class="user_img">

                            <img src="../imagesfb/user_img.jpg" alt=""/>

                        </div>

                        <div class="conversation_box1">

                            <div class="about_box">

                                <p>About <br/>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Sed ultrices a nisl
                                    maximus mattis. Donec </p>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                    <div class="row">

                        <div class="user_img">

                            <img src="../imagesfb/user_img.jpg" alt=""/>

                        </div>

                        <div class="conversation_box">

                            <div class="safety">

                                <div class="links">

                                    <ul>
                                        <li><a href="#">Safety Tips</a></li>
                                        <li><a href="#">Terms / Privacy Policy</a></li>
                                        <li><a href="{{ asset('/index.php') }}/contactform">Contact</a></li>
                                        <li><a href="#">Blog </a></li>
                                        <li><a href="#">Help</a></li>
                                    </ul>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                    <div class="row">

                        <div class="user_img">

                            <img src="../imagesfb/user_img.jpg" alt=""/>

                        </div>

                        <div class="conversation_box2">

                            <div class="safety">

                                <div class="links">

                                    <ul>

                                        @foreach( $pages as $hello)

                                            <li>
                                                <a href="{{ asset('/index.php/') }}/page/{{$hello->id}}">{{$hello->title}}</a>
                                            </li>

                                        @endforeach

                                    </ul>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        </div>

    </section>


    <script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript">


        $(document).ready(function () {
            $('#emm').val('');
            $('#emms').val('');
//alert('d');


        });
    </script>





@endsection
