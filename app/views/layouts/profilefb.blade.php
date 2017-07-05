@layout(layouts.fbhome)

@section('content')

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <title>Member</title>
    <!-- Bootstrap core CSS -->


    {{ HTML::style('cssfb/datepicker.css'); }}

    {{ HTML::style('cssfb/bootstrap.min.css'); }}

    {{ HTML::style('cssfb/mystyle.css'); }}

    {{ HTML::style('fontsfb/stylesheet.css'); }}
</head>
<body>
<header class="member_header">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-md-8 col-sm-12 col-xs-12">
                <div class="logo_member"><a href="#"><img src="../imagesfb/logo3.png" alt=""/></a></div>
            </div>
            <div class="col-sm-5 col-md-4 col-sm-12 col-xs-12">
                <div class="top_nav">
                    <ul>
                        <li><a href=""><span class="glyphicon glyphicon-bell"></span>
                                <span class="notifation"><p>2</p></span> Notifications</a></li>
                        <li><a href=""><span class="glyphicon glyphicon-envelope"></span>
                                <span class="notifation"><p>5</p></span> Inbox</a></li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="account dropdown-toggle active">
                                <span class="glyphicon glyphicon-user"></span>
                                Profile
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><span class="glyphicon glyphicon-user"></span> </i> Profile</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>
                                <li><a href="logoutsfb"><span class="glyphicon glyphicon-lock"></span> </i> Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<section>
    <div class="container">
        <div class="row">
            <div class="cover">


                @foreach( $profile as $hello)
                    <img src="../{{$hello->cover}}" width="1170" height="334" alt="" class="img-rounded"/>

                @endforeach


            </div>
            <div class="addyour">
                <ul>
                    <li>


                    {{ Form:: open(array('url' => 'fbcovermedia/save' , 'method' => 'post','id' => 'contactform','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
                        @if($errors->any())

                            {{ implode('', $errors->all('<li>:message</li>'))  }}
                        @endif
                        {{ Form::token() }}

                        <input id="image" name="image" placeholder="Image" required="" tabindex="1" type="file"
                               onchange="document.getElementById('submits').click();">
                        <input id="rand" name="rand" type="hidden" value="<?php echo $email = Auth::user()->rand;?>">

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
                                    <img src="../{{$hello->path}}" alt="" class="img-circle" width="170" height="170"/>

                                @endforeach

                            </div>
                            <ul>
                                <li>
                                    <a class="current" href="#"> <span class="glyphicon glyphicon-camera"></span> Upload
                                        Photo(s)</a>

                                {{ Form:: open(array('url' => 'fbmedia/save' , 'method' => 'post','name' => 'my_form','id' => 'my_form','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
                                    @if($errors->any())

                                        {{ implode('', $errors->all('<li>:message</li>'))  }}
                                    @endif
                                    {{ Form::token() }}

                                    <input id="image" name="image" placeholder="Image" required="" tabindex="1"
                                           type="file" onchange="document.getElementById('submit').click();">
                                    <input id="rand" name="rand" type="hidden"
                                           value="<?php echo $email = Auth::user()->rand;?>">

                                    <span class="glyphicon glyphicon-camera">

              </span> Upload Photo(s)


                                    <input name="submit" id="submit" tabindex="5" value="submit" type="submit"
                                           style="display:none;">
                                    {{ Form:: close() }}
                                </li>

                                <li><a href="#"><span class="glyphicon glyphicon-facetime-video"></span> Upload
                                        Videos</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-tasks"></span> Add a New Poll</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-calendar"></span> Create New Event</a>
                                </li>
                                <li><a href="#"><span class="glyphicon glyphicon-music"></span> Upload a Song</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Create a Listing</a>
                                </li>
                                <li><a href="#"><span class="glyphicon glyphicon-star"></span> Create a Page</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-6 col-sm-9">
                <div class="border">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active">
                            <h3 class="share">Share</h3>
                        </li>
                        <li class="active"><a href="#home" role="tab" data-toggle="tab"> <span
                                        class="glyphicon glyphicon-comment"></span> </a></li>
                        <li><a href="#profile" role="tab" data-toggle="tab"> <span
                                        class="glyphicon glyphicon-map-marker"></span> </a></li>
                        <li><a href="#messages" role="tab" data-toggle="tab"> <span
                                        class="glyphicon glyphicon-camera"></span> </a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                    {{ Form:: open(array('url' => 'fbpost/save' , 'method' => 'post','id' => 'contactform','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
                        @if($errors->any())

                            {{ implode('', $errors->all('<li>:message</li>'))  }}
                        @endif
                        {{ Form::token() }}

                        <div class="tab-pane active" id="home">
                            <textarea name="post" class="form-control" rows="3"></textarea>
                        </div>

                        <!--     <input id="image" name="image" placeholder="Image" tabindex="1" type="file">  -->
                        <input id="rand" name="rand" type="hidden" value="<?php echo $email = Auth::user()->rand;?>">


                        <!--         <div class="tab-pane" id="profile">
                                  <textarea class="form-control" rows="3"></textarea>
                                </div>
                                <div class="tab-pane" id="messages">
                                  <textarea class="form-control" rows="3"></textarea>
                                </div> -->
                    </div>
                    <div class="col-lg-12">
                        <div class="pull-right padding2"> <span class="dropdown ">
              <button class="friend_btn  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"><span
                          class="glyphicon glyphicon-globe"></span> Friends <span class="caret"></span></button>
              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
              </ul>
              </span>


                            <button name="submit" id="submit" class="all_btn" type="submit">Submit</button>
                            {{ Form:: close() }}<br/>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <br/>
                <span class="hr_bor"></span>

            @foreach( $post as $hello)
                <!-- <img src="../{{$hello->path}}" width="20" height="20"/>
<p>{{$hello->post}}</p> -->

                    <div class="message_box">
                        <div class="u-nformation"><img alt="iamge" class="img-circle img_wid" src="../imagesfb/man.jpg">
                            <a href="#">Jim Stancroft </a>updated his profile information.
                        </div>
                        <div class="message_text">
                            <p>{{$hello->post}} </p>
                        </div>
                        <div class="comment_box"><span class="date_text">{{$hello->created_at}} </span>
                            <div class="like">
                                <ul>
                                    <li><span class="glyphicon glyphicon-comment"></span></li>
                                    <li><span class="glyphicon glyphicon-thumbs-down"></span></li>
                                    <li><span class="glyphicon glyphicon-share-alt"></span></li>
                                    <li><span class="glyphicon glyphicon-flag"></span></li>
                                    <li><span class="glyphicon glyphicon-fullscreen"></span></li>
                                </ul>
                            </div>
                            <div class="map_bg"><span class="glyphicon glyphicon-map-marker"></span></div>
                        </div>
                    </div>



            @endforeach







            <!--         <div class="message_box">
          <div class="u-nformation"><img  alt="iamge" class="img-circle img_wid" src="../imagesfb/man.jpg"> <a href="#">Jim Stancroft </a>updated his profile information. </div>
          <div class="message_text">
            <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
              veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
          </div>
          <div class="comment_box"> <span class="date_text">May 28, 2014 7:52 pm</span>
            <div class="like">
              <ul>
                <li><span class="glyphicon glyphicon-comment"></span></li>
                <li><span class="glyphicon glyphicon-thumbs-down"></span></li>
                <li><span class="glyphicon glyphicon-share-alt"></span></li>
                <li><span class="glyphicon glyphicon-flag"></span></li>
                <li><span class="glyphicon glyphicon-fullscreen"></span></li>
              </ul>
            </div>
            <div class="map_bg"><span class="glyphicon glyphicon-map-marker"></span></div>
          </div>
        </div>
        <div class="message_box">
          <div class="u-nformation"><img  alt="iamge" class="img-circle img_wid" src="../imagesfb/man.jpg"> <a href="#">Jim Stancroft </a>updated his profile information. </div>
          <div class="message_text">
            <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
              veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
          </div>
          <div class="comment_box"> <span class="date_text">May 28, 2014 7:52 pm</span>
            <div class="like">
              <ul>
                <li><span class="glyphicon glyphicon-comment"></span></li>
                <li><span class="glyphicon glyphicon-thumbs-down"></span></li>
                <li><span class="glyphicon glyphicon-share-alt"></span></li>
                <li><span class="glyphicon glyphicon-flag"></span></li>
                <li><span class="glyphicon glyphicon-fullscreen"></span></li>
              </ul>
            </div>
            <div class="map_bg"><span class="glyphicon glyphicon-map-marker"></span></div>
          </div>
        </div> -->
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="border">
                    <div class="u-event">Upcoming Events</div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group padding">
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control"/>
                                <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-calendar"></span> </span></div>
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
