@layout(layouts.fb)

@section('content')




    <section class="friendlist_section">
        <div class="container">
            <div class="row">
                <h2><span class="glyphicon glyphicon-th-list"></span> friends List</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-sm-8 col-md-9">
                    <div class="row">

                        <?php
                        if($outputs)
                        {?>

                        @foreach( $outputs as $hello)



                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail center_box">
                                    <div class="friend_list_img">
                                        <img class="img-circle" alt="" width="170" height="170"
                                             src="{{ asset('/') }}<?php echo $hello['profilephoto']; ?>">
                                    </div>
                                    <div class="caption">


                                        <h3><?php echo $hello['name']; ?></h3>
                                        <div class="friendlistadd">


                                            <span class="glyphicon glyphicon-map-marker"></span>
                                            <span> <?php echo $hello['city']; ?>
                                                ,<?php echo $hello['location']; ?> </span>
                                        </div>
                                        <a href="{{ asset('/index.php/') }}/profileopen/<?php echo $hello['uname']; ?>">
                                            <button type="button" class="like_btn btn-lg mar_top">
                                                <span class="glyphicon glyphicon-eye-open"></span> View Profile
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>



                        @endforeach



                        <?php
                        }?>


                        <?php
                        if($outputss)
                        {?>

                        @foreach( $outputss as $hello)




                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail center_box">
                                    <div class="friend_list_img">
                                        <img class="img-circle" alt=""
                                             src="{{ asset('/') }}/<?php echo $hello['profilephoto']; ?>" width="170"
                                             height="170">
                                    </div>
                                    <div class="caption">
                                        <h3><?php echo $hello['name']; ?></h3>
                                        <div class="friendlistadd">
                                            <span class="glyphicon glyphicon-map-marker"></span>
                                            <span>  <?php echo $hello['city']; ?>
                                                , <?php echo $hello['location']; ?></span></div>
                                        <a href="{{ asset('/index.php/') }}/profileopen/<?php echo $hello['uname']; ?>">
                                            <button type="button" class="like_btn btn-lg mar_top">
                                                <span class="glyphicon glyphicon-eye-open"></span> View Profile
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        @endforeach



                        <?php
                        }?>

                        <?php if(!$outputss && !$outputs)
                        {
                        ?>

                        <h1> No Friend List Found</h1>

                        <?php
                        }
                        ?>


                        <div class="clear"></div>
                        <!--       <ul class="pager">
                              <li><a href="#">Previous</a></li>
                              <li><a href="#">Next</a></li>
                             </ul> -->
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


@endsection
