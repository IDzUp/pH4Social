@layout(layouts.fbhome)

@section('content')


    <section class="profile_sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-3 col-xs-12">
                    <div class="thumbnail">
                        <div class="profile_bg">
                            <div class="profile_img">
                                <img alt=""
                                     src="<?php if($profile) { ?>{{ asset('/') }}/<?php echo $profile->path; ?> <?php } elseif(Auth::user()->sex == 'male'){ ?> {{ asset('/') }}imagesfb/male.jpg <?php } else {  ?> {{ asset('/') }}imagesfb/female.jpg <?php   }     ?>"
                                     width="170" height="170">
                            </div>
                        </div>
                        <div class="caption">
                            <h2>Profile Information</h2>
                            <h3><?php echo $user->name; ?></h3>
                            <p> <?php echo $user->city; ?> </p>
                            <p><span class="glyphicon glyphicon-phone"></span> <?php echo $user->phone; ?></p>
                            <p><span class="glyphicon glyphicon-map-marker"></span> <?php echo $user->location; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 col-sm-8 col-md-9">
                    <div class="edit_box">
                        <h2>General</h2>


                        <div class="clear"></div>

                        <div class="divided"></div>

                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <span class="">Name:</span>
                                    <?php echo $user->name; ?>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <span class="">Email:</span>
                                    <?php echo $user->email;?>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <span class="">Education:</span>
                                    <?php echo $user->education; ?>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <span class="">Work:</span>
                                    <?php echo $user->work; ?>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <span class="">Event:</span>
                                    <?php echo $user->event; ?>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <span class="">Gender:</span>
                                    <?php echo $user->sex; ?>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <span class="">Phone:</span>
                                    <?php echo $user->phone; ?>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <span class="">City:</span>
                                    <?php echo $user->city; ?>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <span class="">Location:</span>
                                    <?php echo $user->location; ?>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <span class="">Height:</span>
                                    <?php echo $user->height . 'cm'; ?>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <span class="">Body Type:</span>
                                    <?php if ($user->bodytype == 1) {
                                        echo 'Slim';
                                    } elseif ($user->bodytype == 2) {
                                        echo 'Sporty';
                                    } elseif ($user->bodytype == 3) {
                                        echo 'Curvy';
                                    } elseif ($user->bodytype == 4) {
                                        echo 'Round';
                                    } elseif ($user->bodytype == 5) {
                                        echo 'Supermodel';
                                    } elseif ($user->bodytype == 6) {
                                        echo 'Olympic athlete';
                                    } elseif ($user->bodytype == 7) {
                                        echo 'Lots of me to love';
                                    } elseif ($user->bodytype == 8) {
                                        echo 'I will tell you later';
                                    } elseif ($user->bodytype == 9) {
                                        echo 'I will let you see for yourself';
                                    } else {

                                    }

                                    ?>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <span class="">Hair Color:</span>
                                    <?php if ($user->haircolor == 1) {
                                        echo 'Black';
                                    } elseif ($user->haircolor == 2) {
                                        echo 'Blond';
                                    } elseif ($user->haircolor == 3) {
                                        echo 'Brown';
                                    } elseif ($user->haircolor == 4) {
                                        echo 'Red';
                                    } elseif ($user->haircolor == 5) {
                                        echo 'Grey';
                                    } elseif ($user->haircolor == 6) {
                                        echo 'White';
                                    } elseif ($user->haircolor == 7) {
                                        echo 'Bald';
                                    } elseif ($user->haircolor == 8) {
                                        echo 'Dyed';
                                    } elseif ($user->haircolor == 9) {
                                        echo 'Other';
                                    } elseif ($user->haircolor == 10) {
                                        echo 'Flavour of the month';
                                    } else {

                                    }

                                    ?>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <span class="">Eye Color:</span>
                                    <?php if ($user->eyecolor == 1) {
                                        echo 'Brown';
                                    } elseif ($user->eyecolor == 2) {
                                        echo 'Grey';
                                    } elseif ($user->eyecolor == 3) {
                                        echo 'Green';
                                    } elseif ($user->eyecolor == 4) {
                                        echo 'Blue';
                                    } elseif ($user->eyecolor == 5) {
                                        echo 'Hazel';
                                    } elseif ($user->eyecolor == 6) {
                                        echo 'Other';
                                    } else {

                                    }

                                    ?>
                                </div>
                            </div>


                        </div>

                    </div>


                </div>
            </div>
        </div>
        </div>
    </section>



@endsection
