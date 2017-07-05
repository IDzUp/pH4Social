@layout(layouts.fb)

@section('content')
    <style scoped type="text/css">
        .cen {
            text-align: center;
        }


    </style>

    <script type="text/javascript">
        $(document).ready(function () {


            $(".like_btn").click(function (e) {
                var id = $(this).attr("id");
                var name = $(this).attr("name");


                e.preventDefault();


                $.ajax({

                    type: "GET",
                    url: "{{ asset('index.php') }}/notiread/" + id,
                    data: {name: name},
                    dataType: 'json',
                    cache: false,
                    success: function (data) {


                        if (data[0].values == 'all') {

                            $('button.all').html('Unread');

                        }


                        else if (data[0].values == 1) {


                            var id = 'button#' + data[0].idss;


                            $('' + id + '').html('Unread');

//alert(data[0].names);
                            document.location.href = data[0].names;

//window.open(data[0].names);

                        }
                        else {

                            var id = 'button#' + data[0].idss;

                            $('' + id + '').html('Read');

                        }


                    }
                });


            });


        });
    </script>
    <section class="notification_sec">
        <div class="container">
            <div class="row">
                <button class="like_btn pull-right" id="<?php echo 'all'; ?>" type="button">All Unread</button>
                <h2><span class="glyphicon glyphicon-bell"></span> Your Notifications</h2>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-sm-8 col-md-9">
                    <div class="notif_list">
                        <ul>

                            <?php
                            if($notilike)
                            {

                            $i = 1;
                            ?>

                            @foreach( $notilike as $hello)


                                <?php
                                $first[0] = '';
                                $pizza = $hello['created_at'];
                                $pieces = explode(" ", $pizza);
                                $first[$i] = $pieces[0];
                                $value = $i - 1;

                                if($first[$value] != $first[$i])
                                {

                                ?>



                                <li class="cen"><?php echo $newDate = date("Y-M-d", strtotime($first[$i])); ?></li>

                                <?php
                                }
                                ?>
                                <?php if($hello['comment'] == null && $hello['friendaccept'] == null)
                                {?>
                                <li>
                                    <span class="glyphicon glyphicon-hand-up"></span>
                                    <a href="{{ asset('/index.php') }}/profileopen/<?php echo $hello['uname'];?>"><?php echo $hello['name']; ?> </a>
                                    likes your Post
                                <!--   <a href="{{ asset('/index.php') }}/profileopen/<?php echo $hello['randid'];?>#post<?php echo $hello['postlike']; ?>"></a> -->
                                    <a href="#"> <span class="time"><?php echo $hello['timess']; ?></span></a>
                                    <?php if($hello['read'] == 1)
                                    {
                                    ?>
                                    <button class="like_btn pull-right all"
                                            name="../profile#post<?php echo $hello['postlike']; ?>"
                                            id="<?php echo $hello['notiid']; ?>" type="button">Unread
                                    </button>
                                    <?php
                                    }
                                    else
                                    {?>
                                    <button class="like_btn pull-right all"
                                            name="../profile#post<?php echo $hello['postlike']; ?>"
                                            id="<?php echo $hello['notiid']; ?>" type="button">Read
                                    </button>
                                    <?php

                                    }
                                    ?>

                                </li>

                                <?php
                                }

                                elseif($hello['comment'] == null && $hello['friendaccept'] == 'done' )
                                {?>
                                <li>
                                    <span class="glyphicon glyphicon-hand-up"></span>
                                    <a href="{{ asset('/index.php') }}/profileopen/<?php echo $hello['uname'];?>"><?php echo $hello['name']; ?> </a>
                                    accept friend request
                                <!--   <a href="{{ asset('/index.php') }}/profileopen/<?php echo $hello['randid'];?>#post<?php echo $hello['postlike']; ?>"></a> -->
                                    <a href="#"> <span class="time"><?php echo $hello['timess']; ?></span></a>
                                    <?php if($hello['read'] == 1)
                                    {
                                    ?>
                                    <button class="like_btn pull-right all" name="../friendlist"
                                            id="<?php echo $hello['notiid']; ?>" type="button">Unread
                                    </button>
                                    <?php
                                    }
                                    else
                                    {?>
                                    <button class="like_btn pull-right all" name="../friendlist"
                                            id="<?php echo $hello['notiid']; ?>" type="button">Read
                                    </button>
                                    <?php

                                    }
                                    ?>

                                </li>

                                <?php
                                }


                                else
                                { ?>

                                <li>
                                    <span class="glyphicon glyphicon-comment"></span>
                                    <a href="{{ asset('/index.php') }}/profileopen/<?php echo $hello['uname'];?>"><?php echo $hello['name']; ?> </a>
                                    comment your Post
                                <!--            <a href="{{ asset('/index.php') }}/profileopen/<?php echo $hello['randid'];?>#cc<?php echo $hello['commentid']; ?>">Post</a> -->
                                    <a href="#"> <span class="time"><?php echo $hello['timess']; ?></span></a>

                                    <?php if($hello['read'] == 1)
                                    {
                                    ?>
                                    <button class="like_btn pull-right all" id="<?php echo $hello['notiid']; ?>"
                                            name="../profile#cc<?php echo $hello['commentid']; ?>" type="button">Unread
                                    </button>
                                    <?php
                                    }
                                    else
                                    {?>
                                    <button class="like_btn pull-right all" id="<?php echo $hello['notiid']; ?>"
                                            name="../profile#cc<?php echo $hello['commentid']; ?>" type="button">Read
                                    </button>
                                    <?php

                                    }
                                    ?>
                                </li>
                                <?php
                                }



                                $i++;
                                ?>








                            @endforeach



                            <?php
                            }
                            else
                            {
                            ?>

                            <h1> No Notification Found</h1>

                            <?php
                            }

                            ?>


                        </ul>

                    </div>
                    <?php
                    if ($notilike) {
                        echo $notilike->links();
                    }
                    ?>
                </div>


                <div class="col-sm-4 col-md-3 col-xs-12">

                    <div class="thumbnail add_box">
                        <h2>Advertise Here</h2>
                    </div>

                    <div class="thumbnail Recomm_box">
                        <div class="caption">
                            <h3>Recommended for You</h3>

                            <?php $i = 0;
                            if($outputs)
                            {

                            ?>
                            @foreach( $outputs as $hellos)


                                <?php if($i < 10)
                                { ?>

                                <div class="media">
                                    <a href="#" class="pull-left"> <img
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
        </div>
    </section>



@endsection
