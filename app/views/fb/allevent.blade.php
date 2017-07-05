@layout(layouts.fb)

@section('content')

    <script type="text/javascript">

        $(document).ready(function (e) {

            $("#contactform").on('submit', (function (e) {

                var dates = $('input[name="dates"]').val();
                var events = $('#events').val();
                var address = $('input[name="address"]').val();
                if (dates == '') {
                    e.preventDefault();

                    alert('Date and Time field required');
                    return false;
                }
                else if (events == '') {
                    e.preventDefault();

                    alert('Event field required');
                    return false;
                }
                else if (address == '') {
                    e.preventDefault();

                    alert('Address field required');
                    return false;
                }

                else {

                    return true;
                }

            }));


        });
    </script>
    <section class="friendreq_sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-9 col-lg-9 col-xs-12">
                    <?php if($events)
                    { ?>


                    @foreach( $events as $hello)
                        <div class="head_event margin-bottom_radius">
                            <h2>Event Detail Here</h2>
                        </div>
                        <div class="event_list_bg">
                            <div class="notif_list">
                                <ul class="event_list">
                                    <li>
                                        <div class="Event_time_date_detail">
                                            <span class="Event_date">{{$hello->dates}}</span><br>
                                            <span class="Event_time">{{$hello->timess}}</span>
                                            <span class="detial">
                                         <a href="#">{{$hello->event}}</a>
                                         <address>
                                             {{$hello->address}}
                                         </address>
                                     </span>
                                        </div>
                                        <?php if(Auth::user()->rand == $hello->user || Auth::user()->username == 'admin')
                                        {
                                        ?>
                                        <a href="{{ asset('/index.php/') }}/eventsdelete/{{$hello->id}}"
                                           class="pull-right all glyphicon glyphicon-remove"></a>
                                        <?php
                                        }
                                        ?>


                                    </li>
                                </ul>
                            </div>
                        </div>


                    @endforeach
                    <?php
                    }
                    else
                    {
                    ?>

                    <h1> No Event Found</h1>

                    <?php
                    }

                    ?>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="border margin_top">
                        <div class="u-event">Create Events</div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        {{ Form:: open(array('url' => 'createevent' , 'method' => 'get','id' => 'contactform','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
                            @if($errors->any())

                                {{ implode('', $errors->all('<li>:message</li>'))  }}
                            @endif
                            {{ Form::token() }}

                            <div class="form-group padding">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' required="" placeholder="Date and Time" readonly="readonly"
                                           name="dates" class="form-control"/>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span>
                                </div>
                                <div class="input-group padding">
                                    <input type="text" required pattern=".*\S+.*" placeholder="Event Name" id="events"
                                           name="event" class="form-control">
                                    <span class="input-group-addon glyphicon glyphicon-pencil"></span></div>

                                <div class="input-group padding">
                                    <input type="text" required pattern=".*\S+.*" placeholder="Location" name="address"
                                           class="form-control">
                                    <span class="input-group-addon glyphicon glyphicon-map-marker"></span></div>


                                <div class="padding">
                                    <button class="all_btn" type="submit">Create Event</button>
                                </div>
                                <div class="padding"><span><!-- No birthdays coming up. --></span></div>
                            </div>
                            </form>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="border margin">
                        <div class="u-event">Upcoming Events</div>
                        <?php $i = 0; ?>
                        <?php if($events)
                        { ?>

                        @foreach( $events as $hellos)
                            <?php


                            $cur = date("m/d/Y");

                            if($cur < $hellos->dates)
                            {

                            if($i < 3)
                            { ?>




                            <div class="col-lg-12 col-md-12 col-sm-12 padding2 border-bottom">
                                <!-- <img src="../imagesfb/man.jpg" class="img-circle img-custom img_wid pull-left" alt="iamge"> -->
                                <div class="pull-left add-frnd"><a>{{$hellos->event}}</a><br/>
                                    <span>{{$hellos->dates}}-{{$hellos->timess}} <!-- - <a href="#">Hide</a></span>  -->
                                </div>
                            </div>



                            <?php
                            $i++;

                            }

                            }

                            ?>


                        @endforeach
                        <?php
                        }
                        else
                        {
                        ?>

                        <p> No Result Found</p>

                        <?php
                        }

                        ?>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding2">
                            <a type="submit" class="all_btn"
                               href="{{ asset('/index.php') }}/allevent/{{Auth::user()->uname;}}">View All</a>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
