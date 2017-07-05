@layout(layouts.fb)

@section('content')




    <section class="friendreq_sec">
        <div class="container">
            <div class="row">
                <h2><span class="glyphicon glyphicon-send"></span> friends Request</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-sm-8 col-md-9">


                    <?php

                    if($outputs)
                    {
                    ?>

                    @foreach( $outputs as $hello=>$val)

                        <?php
                        if($val['friend'] == 'myids')
                        {

                        ?>

                        <div class="request_box">
                            <div class="request_user">
                                <a href="{{ asset('/index.php') }}/profileopen/<?php  echo $val['uname']; ?>">
                                    <img src="{{ asset('/') }}/<?php  echo $val['profilephoto']; ?>" alt="" width="63"
                                         height="78"/>
                                </a>
                            </div>
                            <div class="address_container">
                                <div class="addses">

                                    <a href="{{ asset('/index.php') }}/profileopen/<?php  echo $val['uname']; ?>">
                                        <button class="pull-right accpet_btn" type="submit">
                                            <span class="glyphicon glyphicon-eye-open"></span>

                                            Friend Request Sent
                                        </button>
                                    </a>


                                    <a href="{{ asset('/index.php') }}/profileopen/<?php  echo $val['uname']; ?>">
                                        <h4><?php  echo $val['name']; ?></h4></a>
                                    <span class="glyphicon glyphicon-map-marker"></span>
                                    <span> <?php  echo $val['city']; ?>, <?php  echo $val['location']; ?></span>
                                </div>
                            </div>
                        </div>

                        <?php

                        }
                        else
                        {

                        ?>




                        <div class="request_box">
                            <div class="request_user">
                                <a href="{{ asset('/index.php') }}/profileopen/<?php  echo $val['uname']; ?>">
                                    <img src="{{ asset('/') }}/<?php  echo $val['profilephoto']; ?>" alt="" width="63"
                                         height="78"/>
                                </a>
                            </div>
                            <div class="address_container">
                                <div class="addses">


                                {{ Form:: open(array('url' => 'acceptfriend' ,'method' =>'get','class' => 'form-2')) }} <!--contact_request is a router from Route class-->
                                    @if($errors->any())

                                        {{ implode('', $errors->all('<div class="alert alert-danger" role="alert">:message</div>'))  }}
                                    @endif
                                    {{ Form::token() }}

                                    <input type="hidden" name="mainuser" class="" id=""
                                           value="<?php  echo $val['rands']; ?>">


                                    <input type="hidden" name="otheruser" class="" id=""
                                           value="<?php  echo Auth::user()->rand; ?>">


                                    <button class="pull-right accpet_btn" type="submit">
                                        <span class="glyphicon glyphicon-eye-open"></span>

                                        Accept
                                    </button>
                                    </form>

                                    <a href="{{ asset('/index.php') }}/profileopen/<?php  echo $val['uname']; ?>">
                                        <h4><?php  echo $val['name']; ?></h4></a>
                                    <span class="glyphicon glyphicon-map-marker"></span>
                                    <span> <?php  echo $val['city']; ?>, <?php  echo $val['location']; ?></span>
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

                    <h1> You have No Friend Request</h1>

                    <?php
                    }
                    ?>


                </div>


                <div class="col-sm-4 col-md-3 col-xs-12">
                    <div class="thumbnail Recomm_box">
                        <div class="caption">
                            <h3>Recommended for You</h3>

                            <?php $i = 0;
                            if($output)
                            {
                            ?>
                            @foreach( $output as $hellos)


                                <?php if($i < 10)
                                { ?>

                                <div class="media"><a href="#" class="pull-left"> <img
                                                src="{{ asset('/') }}/<?php echo $hellos['path']; ?>" alt="" width="60"
                                                height="60" class="media-object"/> </a>
                                    <div class="media-body">
                                        <h4><?php echo $hellos['name']; ?></h4>

                                        <a href="{{ asset('/index.php') }}/profileopen/<?php echo $hellos['uname'];?>"
                                           type="button" class="like_btn1"><span
                                                    class="glyphicon glyphicon-user"></span> Profile</a>
                                    </div>
                                </div>



                                <?php
                                }
                                ?>


                                <?php $i++; ?>
                            @endforeach
                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>


            </div>
        </div>
        </div>
    </section>



@endsection
