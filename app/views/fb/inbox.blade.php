@layout(layouts.fbhome)

@section('content')




    <script type="text/javascript">

        var onlinech = function () {


//var token =  $("input[name=getid]").val();


            var nb = $('.inbox_img').length;


            for (var i = 0; i < nb; i++) {

                var getval = '.inbox_img:eq(' + i + ')';


                var uniid = $('' + getval + '').attr("id");

                $.ajax({

                    type: "GET",
                    url: "{{ asset('') }}/index.php/messtext/" + uniid,
                    data: '',
                    dataType: 'json',
                    cache: false,
                    success: function (data) {

                        var blankids = '#uptextid' + data[0].idss;
                        $('' + blankids + '').html('');
                        for (var i = 0; i < Object.keys(data).length; i++) {


                            if (data[i].rand == data[i].randuser) {
                                var datas = '<div class="media border-bottom margin-none bg-gray pull-right" id="messagebox"><a class="pull-right innerAll" href=""><img width="50" class="media-object" src="{{ asset('') }}/' + data[i].mainuserprofile + '" style="width: 10px; height: 10px; display: block; margin-left: auto; margin-right: auto;"></a><div class="media-body innerTB pull-right"><a class="strong text-inverse" href="">' + data[i].user + '</a>  <small class="text-muted ">wrote on ' + data[i].timess + '</small> <a class="text-small" href=""></a><div>' + data[i].chat + '</div></div></div><div class="clearfix"></div>';
                                var blankid = '#uptextid' + data[i].idss;
                                $('' + blankid + '').append(datas);


                                $('#newvalues' + data[i].idss + '').html('');


                            }
                            else {

                                var datas = '<div class="media border-bottom margin-none bg-gray pull-left"><a class="pull-left innerAll" href=""><img width="50" class="media-object" src="{{ asset('') }}/' + data[i].otheruserprofile + '" style="width: 10px; height: 10px; display: block; margin-left: auto; margin-right: auto;"></a><div class="media-body innerTB"><a class="strong text-inverse" href="">' + data[i].user + '</a>  <small class="text-muted ">wrote on ' + data[i].timess + '</small> <a class="text-small" href=""></a><div>' + data[i].chat + '</div></div></div><div class="clearfix"></div> ';
                                var blankid = '#uptextid' + data[i].idss;
                                $('' + blankid + '').append(datas);

                                if (data[i].counts == 1) {
                                    $('#newvalues' + data[i].idss + '').html('');
                                    $('#newvalues' + data[i].idss + '').append('<span class="notifationsss"><p id="newmess" class="">1</p></span>');
                                }
                                else {

                                    $('#newvalues' + data[i].idss + '').html('');

                                }


                            }


                        }


                    }
                });


            }


            return false;


        };

        var intervalss = 60 * 60 * 1; // where X is your every X minutes

        setInterval(onlinech, intervalss);

    </script>


    <section class="inbox_sec">
        <div class="container">
            <div class="row">
                <h2><span class="glyphicon glyphicon-home"></span> Inbox</h2>
            </div>
        </div>
        <div class="container">


            <div class="row">
                <div class="col-sm-9 col-sm-8 col-md-9">
                    <?php if($message)
                    { ?>

                    @foreach( $message as $hello)

                        <div class="inbox_box inbox_box_bg">
                            <div class="inbox_img" id="<?php echo $hello['userids']; ?>">
                                <div class="inbox">
                                    <img src="{{ asset('') }}<?php echo $hello['image']; ?>" alt="" class="img-circle">
                                </div>
                            </div>
                            <div class="messg_text">
                                <a href="{{ asset('/index.php') }}/messages/<?php echo $hello['uname']; ?>"
                                   class="like_btn btn-lg mar_top pull-right" type="button">Reply</a>
                                <h3><?php echo $hello['name']; ?></h3>
                                <div id="newvalues<?php echo $hello['userids']; ?>"></div>
                            </div>
                        </div>

                    @endforeach


                    <?php
                    }
                    else
                    {
                    ?>

                    <h1> No Message Found</h1>

                    <?php
                    }

                    ?>


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
