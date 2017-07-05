@layout(layouts.fb)

@section('content')

    <!-- <table>

@foreach( $events as $hello)

        <tr>

        <td>
        {{$hello->dates}}

                </td>

                <td>
                {{$hello->timess}}

                </td>

                <td>
                {{$hello->event}}

                </td>


                <td>

                 {{ HTML::link('/events/delete/' . $hello->id, 'delete',array('class="delete_icon"')) }}


                </td>



                </tr>







                @endforeach

            </table> -->
    <section class="friendreq_sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-9 col-lg-9 col-xs-12">
                    <div class="head_event margin-bottom_radius">
                        <h2>Event Detial Here</h2>
                    </div>
                    <div class="event_list_bg">
                        <div class="notif_list">
                            <ul class="event_list">
                                <li>
                                    <span class="event_img"><img src="../imagesfb/event.jpg"></span>
                                    <div class="Event_time_date_detail">
                                        <span class="Event_date">Oct 3, 2014</span><br>
                                        <span class="Event_time">Tuesday 8.30 AM</span>
                                        <span class="detial">
                                         <a href="#">Lorem ipsum sit Club</a>
                                         <address>
                                             Address: Sector 17<br>
                                             Sahibzada Ajit Singh Nagar
                                             Punjab<br>
                                            Phone:0000 000 000
                                         </address>
                                     </span>
                                    </div>
                                    <button type="button" id="29"
                                            name="http://192.169.245.159/~lareval/laravelfb/laravel-master/public/index.php/profileopen/77#post8"
                                            class="like_btn pull-right all">Delete
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="head_event margin-bottom_radius">
                        <h2>Event Detial Here</h2>
                    </div>
                    <div class="event_list_bg">
                        <div class="notif_list">
                            <ul class="event_list">
                                <li>
                                    <span class="event_img"><img src="../imagesfb/event.jpg"></span>
                                    <div class="Event_time_date_detail">
                                        <span class="Event_date">Oct 3, 2014</span><br>
                                        <span class="Event_time">Tuesday 8.30 AM</span>
                                        <span class="detial">
                                         <a href="#">Lorem ipsum sit Club</a>
                                         <address>
                                             Address: Sector 17<br>
                                             Sahibzada Ajit Singh Nagar
                                             Punjab<br>
                                            Phone:0000 000 000
                                         </address>
                                     </span>
                                    </div>
                                    <button type="button" id="29"
                                            name="http://192.169.245.159/~lareval/laravelfb/laravel-master/public/index.php/profileopen/77#post8"
                                            class="like_btn pull-right all">Delete
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="border margin_top">
                        <div class="u-event">Upcoming Events</div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <form enctype="multipart/form-data" id="contactform" accept-charset="UTF-8"
                                  action="http://192.169.245.159/~lareval/laravelfb/laravel-master/public/index.php/createevent"
                                  method="GET"> <!--contact_request is a router from Route class-->
                                <input type="hidden" value="vADeRhYKdAMoC2HWEHeCOcF5PeiHsQpPLbOEmDO5" name="_token">
                                <div class="form-group padding">
                                    <div id="datetimepicker1" class="input-group date">
                                        <input type="text" class="form-control" name="dates" required="">
                                        <span class="input-group-addon"><span
                                                    class="glyphicon-calendar glyphicon"></span> </span>
                                    </div>
                                    <div class="input-group padding">
                                        <input type="text" class="form-control" name="event" required="">
                                        <span class="input-group-addon glyphicon glyphicon-map-marker"></span>
                                    </div>
                                    <div class="padding">
                                        <button type="submit" class="all_btn">Create Event</button>
                                    </div>
                                    <div class="padding"><span><!-- No birthdays coming up. --></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="border margin">
                        <div class="u-event">Upcoming Events</div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding2 border-bottom"><img alt="iamge"
                                                                                                         class="img-circle img-custom img_wid pull-left"
                                                                                                         src="../imagesfb/man.jpg">
                            <div class="pull-left add-frnd"><a>testing</a><br>
                                <span>10/04/2014-10:01AM <!-- - <a href="#">Hide</a></span>  --></span>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding2 border-bottom"><img alt="iamge"
                                                                                                         class="img-circle img-custom img_wid pull-left"
                                                                                                         src="../imagesfb/man.jpg">
                            <div class="pull-left add-frnd"><a>meeting</a><br>
                                <span>10/22/2014-10:04AM <!-- - <a href="#">Hide</a></span>  --></span>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding2">
                            <a type="submit" class="all_btn"
                               href="http://192.169.245.159/~lareval/laravelfb/laravel-master/public/index.php/allevent">View
                                All</a>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
