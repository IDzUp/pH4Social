@layout(layouts.fbhome)

@section('content')
    <script type="text/javascript">

        function contactsubmit() {

            var name = $('input#name').val().trim();
            var email = $('input#email').val().trim();
            var subject = $('input#subject').val().trim();
            var mess = $('textarea#mess').val().trim();
            if (name == '') {

                alert('Name field required');
                return false;
            }
            else if (email == '') {

                alert('Email field required');
                return false;
            }
            else if (subject == '') {

                alert('Subject field required');
                return false;
            }
            else if (mess == '') {
                alert('Message field required');
                return false;
            }
            else {
                return true;
            }


        }

    </script>



    <section class="contct-us">
        <div class="container">
            <div class="row">
                <h2><span class="glyphicon glyphicon-phone-alt"></span> Contact Us</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="thumbnail">
                    <html>
                    <head>
                        <style scoped>
                            #map_canvas {
                                width: 100%;
                                height: 255px;
                            }
                        </style>
                        <script src="https://maps.googleapis.com/maps/api/js"></script>
                        <script>
                            function initialize() {
                                var map_canvas = document.getElementById('map_canvas');
                                var map_options = {
                                    center: new google.maps.LatLng(44.5403, -78.5463),
                                    zoom: 8,
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                };
                                var map = new google.maps.Map(map_canvas, map_options)
                            }
                            google.maps.event.addDomListener(window, 'load', initialize);
                        </script>
                    </head>
                    <body>
                    <div id="map_canvas"></div>
                    </body>
                    </html>
                </div>
            </div>
        </div>
        <div class="divided"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-sm-8 col-md-9">
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
                @endif

                <!--       {{ Form:: open(array('url' => 'contact/savecontact' , 'method' => 'get','class' => 'myfirstform')) }} <!--contact_request is a router from Route class-->
                    <form onsubmit="return contactsubmit();" action="contact/savecontact" method="get"
                          class="myfirstform">
                        @if($errors->any())

                            @if ($errors->has('email'))
                                <div class="alert alert-danger"
                                     role="alert"><?php if ($errors->first('email') == 'validation.required') {
                                        echo 'Email Required';
                                    } elseif ($errors->first('email') == 'validation.unique') {
                                        echo 'You Already have an Account';
                                    } else {
                                        echo 'Email Not Valid';
                                    } ?> </div>@endif
                            @if ($errors->has('name'))
                                <div class="alert alert-danger"
                                     role="alert"><?php $name = implode('', $errors->all(':message')); if ($name == 'validation.max.string') {
                                        echo 'Name Maximum length 25';
                                    } else {
                                        echo 'Name Required';
                                    } ?></div>@endif
                            @if ($errors->has('subject'))
                                <div class="alert alert-danger"
                                     role="alert"><?php $subject = implode('', $errors->all(':message')); if ($subject == 'validation.max.string') {
                                        echo 'Subject Maximum length 25';
                                    } else {
                                        echo 'Subject Required';
                                    } ?></div>@endif
                            @if ($errors->has('comment'))
                                <div class="alert alert-danger" role="alert">Message Required</div>@endif

                        @endif
                        {{ Form::token() }}
                        <input name="test" value="1" type="hidden">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <div class="controls">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>

                                    <!--           <input id="name" class="form-control" name="name" placeholder="Name" required pattern=".*\S+.*" type="text">  -->
                                    {{ Form::text('name', '', ['placeholder' => 'Name','class' => 'form-control','id' => 'name','pattern' => '.*\S+.*','required' => 'required']) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <div class="controls">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>

                                <!--  <input id="email" class="form-control" name="email" placeholder="example@domain.com" required pattern=".*\S+.*"  type="text">  -->
                                    {{ Form::email('email', '', ['placeholder' => 'example@domain.com','class' => 'form-control','id' => 'email','pattern' => '.*\S+.*','required' => 'required']) }}

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Subject</label>
                            <div class="controls">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>

                                    <!--      <input id="subject" class="form-control" name="subject" placeholder="Subject" required pattern=".*\S+.*" type="text">  -->

                                    {{ Form::text('subject', '', ['placeholder' => 'Subject','class' => 'form-control','id' => 'subject','pattern' => '.*\S+.*','required' => 'required']) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label">Message</label>
                            <div class="controls">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                    <!--           <textarea required id="mess" name="comment" class="form-control" rows="4" cols="78" placeholder="Enter your message here"></textarea> -->
                                    {{ Form::textarea('comment', '', ['placeholder' => 'Enter your message here','class' => 'form-control','id' => 'mess','rows' => '4','cols' => '78','pattern' => '.*\S+.*','required' => 'required']) }}
                                </div>
                            </div>
                        </div>
                        <div class="controls">
                            <button type="submit" id="mybtn" class="all_btn"><span
                                        class="glyphicon glyphicon-send"></span> Send Message
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-4 col-md-3 col-xs-12">
                    <div class="thumbnail add_box">
                        <h2>Address Here</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>









@endsection
