@layout(layouts.live)

@section('content')

    <script src="http://static.tumblr.com/hhedat8/OUkmkh864/script.js"></script>
    <script src="http://static.tumblr.com/hhedat8/cfemkh9df/script.js"></script>
    <link rel="stylesheet" href="http://static.tumblr.com/hhedat8/FpYmkhikx/chatbox.css">
    <div id="modal">
        <div id="content1">
            <object data="/chatbox/index.forum?page=front&amp;" id="frame_chatbox" scrolling="yes" width="100%"
                    height="100%" type="text/html"></object>
        </div>
    </div>


    <?php

    if(Auth::user())
    {
    ?>





    <?php
    $i = 1;
    $j = 1;
    foreach($chat as $hello)

    {

    if(Auth::user()->email == $hello->email)
    {


    }
    else
    {


    ?>
    <div id="boxs{{$i}}"
         style="position: fixed; height:168px;right: 250px; bottom: 20px; border: 1px solid grey; border-radius: 5px; padding: 21px; width:230px; height:168px;background: white;">{{$hello->email}}
        <span><a href="#" id="close{{$i}}" style=" margin-left: 12px;" class="delete_icon"></a></span>
        <br>

        <div id="result">

            <ul>

                {{ HTML::script('js/jquery.js') }}
                <script language="javascript">


                    $(document).ready(function () {


                        setInterval(function () {
                            $.ajax({
                                type: "get",
                                url: "getallrecords",
                                cache: false,
                                dataType: "json",
                                data: {name: 'content'},
                                success: function (response) {

                                    $("#result").html(response);

                                    //   $("#homestatusid").prepend("<div id='divider-"+response['streamitem_id']+"'><div class='userinfo'><a href='/profile.php?username="+response['username']+"'><img class='stream_profileimage' style='border:none;padding:0px;display:inline;' border=\"0\" src=\"imgs/cropped"+response['id']+".jpg\" onerror='this.src=\"img/no_profile_img.jpeg\"' width=\"40\" height=\"40\" ></a><div style='cursor:pointer;position:relative;top:0px;float:right;padding-right:5px;' onclick=\"delete_('"+response['streamitem_id']+"');\">X</div><a href='/profile.php?username="+response['username']+"'>"+response['first']+" "+ response['middle']+" "+response['last']+"</a><span class='subtleLink'> said</span><br/><a class='subtleLink' style='font-weight:normal;'>"+response['streamitem_timestamp']+"</a><hr>"+newmsg+"<div style='height:20px;' class='post_contextoptions'><div id='streamcomment'><a style='cursor:pointer;' id='commenttoggle_"+response['streamitem_id']+"' onclick=\"toggle_comments('comment_holder_"+response['streamitem_id']+"');clearTimeout(streamloop);swapcommentlabel(this.id);\">Write a comment...</a></div><div id='streamlike'><a id='likecontext_"+response['streamitem_id']+"' style='cursor:pointer;' onClick=\"likestatus("+response['streamitem_id']+",this.id);\"><div style='width:50px;' id='likesprint"+response['streamitem_id']+"'>Like</div></a><div style='width:50px;' id='likesprint"+response['streamitem_id']+"'></div></div><div id='streamdislike'><a id='dislikecontext_"+response['streamitem_id']+"' style='cursor:pointer;' onClick=\"dislikestatus("+response['streamitem_id']+",this.id);\"><div style='width:70px;' id='dislikesprint"+response['streamitem_id']+"'>Dislike</div></a><div style='width:70px;' id='dislikesprint"+response['streamitem_id']+"'></div></div></div><div class='stream_comment_holder' style='display:none;' id='comment_holder_"+response['streamitem_id']+"'><div id='comment_list_"+response['streamitem_id']+"'><table width=100%><tr><td valign=top width=30px><img class='stream_profileimage' style='border:none;padding:0px;display:inline;' border=\"0\" src=\"imgs/cropped"+response['id']+".jpg\" onerror='this.src=\"img/no_profile_img.jpeg\"' width=\"40\" height=\"40\" ></a><td valign=top align=left><div class='stream_comment_inputarea'><input type='text' name='content' style='width:100%;' class='input_comment' placeholder='Write a comment...'  onkeyup='growcommentinput(this);' autocomplete='off' onkeypress=\"if(event.keyCode==13){addcomment("+response['streamitem_id']+",this.value,'comment_list_"+response['streamitem_id']+"',"+response['id']+",'"+response['first']+" "+ response['middle']+" "+response['last']+"');this.value='';}\"><br/></div></div>");
                                }
                            });
                        }, 10000);
                        return false

                    });
                </script>


                <?php foreach($chatrecord as $hell)
                {


                if($hell->emailto == $hello->email )
                {



                ?>

                <li>{{$hell->name}}</li>
                <?php
                }

                }
                ?>


            </ul>


        </div>


        <br>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js">
        </script>
        <script type="text/javascript">

            var sjq = $.noConflict();
            sjq(function () {
                sjq(".submit").click(function () {


                    var name = sjq("#name").val();

                    var emailto = sjq("#emailto").val();
                    var emailby = sjq("#emailby").val();

                    var dataString = 'name=' + name + '&emailto=' + emailto + '&emailby=' + emailby;

                    if (name == '' || emailto == '' || emailby == '') {


                    }
                    else {
                        sjq.ajax({
                            type: "get",
                            url: "chatrecord",
                            data: dataString,
                            success: function (response) {
                                if (response == 1) {

                                    document.getElementById("name").value = "";
                                }

                            }
                        });
                    }
                    return false;
                });
            });
        </script>


        <form method="get" name="form">
            <input id="name" name="name" type="text"/>

            <input id="emailto" name="emailto" type="hidden" value="{{$hello->email}}"/>

            <input id="emailby" name="emailby" type="hidden" value="{{Auth::user()->email}}"/>

            <input type="submit" value="Submit" class="submit"/>

        </form>

    </div>






    <?php
    $i++;
    $j++;
    }

    }?>


    <a href="#" id="button"
       style="position: fixed; right: 25px; bottom: 20px; border: 1px solid grey; border-radius: 5px; padding: 5px; background: white;">Chatbox</a>
    <div id="box"
         style="position: fixed; height:168px;right: 25px; bottom: 20px; border: 1px solid grey; border-radius: 5px; padding: 21px; width:230px; height:168px;background: white;">
        Online

        <ul>

            <?php

            $j = 1;

            $i = 1;
            foreach($chat as $hello)

            {

            if(Auth::user()->email == $hello->email)
            {


            }
            else
            {


            ?>

            <li><a href="#" id="tar{{$j}}">{{$hello->email}}</a></li>

            <script>
                var jq = $.noConflict();
                jq(function () {

                    jq("#boxs{{$i}}").hide();

                    jq("#tar{{$i}}").click(function () {
                        jq("#boxs{{$i}}").show();
                    });


                    jq("#close{{$i}}").click(function () {
                        jq("#boxs{{$i}}").hide();
                    });


                });
            </script>


            <?php

            $j++;
            $i++;
            }
            ?>



            <?php










            }
            ?>
        </ul>


    </div>

    <?php
    }

    ?>




    {{ HTML::script('js/jquery.js') }}


    <script>
        var jq = $.noConflict();
        jq(function () {

            jq("#box").hide();


            jq("#button").click(function () {
                jq("#box").show();
            });

            jq("#tar").click(function () {
                jq("#boxs").show();
            });


        });
    </script>


    <div class="features_items">
        <h2 class="title text-center">Features Items</h2>
    @foreach( array_chunk( $viewevent->getCollection()->all(),3)  as $hellos)

        @foreach( $hellos as $hello)


            <!--
  <div class="prod_box">
        <div class="top_prod_box"></div>
        <div class="center_prod_box">
          <div class="product_title"><a href="details/{{ $hello->id }}">  {{ $hello->name }} </a></div>
          <div class="product_img"><a href="details/{{ $hello->id }}"><img src="../{{ $hello->path }}" width="120" height="90" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce">350$</span> <span class="price"> {{ $hello->price }}{{ $currency->currency }} </span></div>
        </div>
        <div class="bottom_prod_box"></div>
        <div class="prod_details_tab">

<form action="details/addtocart/{{ $hello->id }}" method="get">
<input type="hidden" name="name" value="{{ $hello->name }}">
<input type="hidden" name="price" value="{{ $hello->price }}">

  <input type="hidden" name="rand" value="<?php if (Auth::user()) {
                echo $rand = Auth::user()->rand;
            }?>">
<input type="image" name="submit" border="0" width="20"
src="../images/cart.gif"
alt="">

</form>

       <a href="{{URL::to('site');}}" title="header=[Specials] body=[&nbsp;] fade=[on]"><img src="../images/favs.gif" alt="" border="0" class="left_bt" /></a> <a href="{{URL::to('site');}}" title="header=[Gifts] body=[&nbsp;] fade=[on]"><img src="../images/favorites.gif" alt="" border="0" class="left_bt" /></a> <a href="details/{{ $hello->id }}" class="prod_details">details</a> </div>
      </div>-->



                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="../{{ $hello->path }}" alt=""/>
                                <h2>{{ $currency->currency }}{{ $hello->price }}</h2>
                                <p>{{ $hello->name }}</p>
                                <form action="details/addtocart/{{ $hello->id }}" method="get">
                                    <input type="hidden" name="name" value="{{ $hello->name }}">
                                    <input type="hidden" name="price" value="{{ $hello->price }}">

                                    <input type="hidden" name="rand" value="<?php if (Auth::user()) {
                                        echo $rand = Auth::user()->rand;
                                    }?>">
                                    <input type="submit" value="Add to cart" name="submit" border="0" width="20"
                                           class="btn btn-default add-to-cart">

                                </form>
                                <!--   <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>-->
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>{{ $currency->currency }}{{ $hello->price }}</h2>
                                    <p>{{ $hello->name }}</p>
                                    <form action="details/addtocart/{{ $hello->id }}" method="get">
                                        <input type="hidden" name="name" value="{{ $hello->name }}">
                                        <input type="hidden" name="price" value="{{ $hello->price }}">

                                        <input type="hidden" name="rand" value="<?php if (Auth::user()) {
                                            echo $rand = Auth::user()->rand;
                                        }?>">
                                        <input type="submit" value="Add to cart" name="submit" border="0" width="20"
                                               class="btn btn-default add-to-cart">

                                    </form>
                                    <!--   <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>-->
                                </div>
                            </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                <li><a href="details/{{ $hello->id }}"><i class="fa fa-plus-square"></i>Product details</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>



            @endforeach



        @endforeach
    </div>
    {{ $viewevent->links() }}
@endsection





@section('slider')



    <div class="container">
        <div class="row">
            <div class="col-sm-12">


                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free E-Commerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="../{{ $viewslider->path2}}" class="girl img-responsive" alt=""/>
                                <img src="../images/home/pricing.png" class="pricing" alt=""/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>100% Responsive Design</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="../{{ $viewslider->path1}}" class="girl img-responsive" alt=""/>
                                <img src="../images/home/pricing.png" class="pricing" alt=""/>
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free Ecommerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="../{{ $viewslider->path}}" class="girl img-responsive" alt=""/>
                                <img src="../images/home/pricing.png" class="pricing" alt=""/>
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!--

 <div class="fadein">

<img src="../{{ $viewslider->path}}" width="900" height="400">

<img src="../{{ $viewslider->path1}}" width="900" height="400">
<img src="../{{ $viewslider->path2}} "  width="900" height="400">
<img src="../{{ $viewslider->path3}} "  width="900" height="400">
</div>



-->




@endsection










@section('sidebar')

    <div class="right_content">
        <div class="shopping_cart">
            <div class="cart_title">Shopping cart</div>
            <div class="cart_details"> <?php
                $i = 0;
                if (Auth::user()) {
                    $sum = 0;
                    $i = 0;
                    foreach ($shopping as $key => $hello) {
                        $sum += $hello->price;

                        $i++;


                    }

                }






                ?>

                <?php  echo $i; ?> items <br/>
                <span class="border_cart"></span> Total:
                <?php $i = 0; if (Auth::user()) {
                    echo $sum;
                } else {
                    echo $i;

                }


                ?><span class="price">



       $</span></div>
            <div class="cart_icon"><a href="checkout" title="header=[Checkout] body=[&nbsp;] fade=[on]"><img
                            src="../images/shoppingcart.png" alt="" width="48" height="48" border="0"/></a></div>
        </div>
        <div class="title_box">What’s new</div>
        <div class="border_box">
            <div class="product_title"><a href="{{URL::to('site');}}">Motorola 156 MX-VL</a></div>
            <div class="product_img"><a href="{{URL::to('site');}}"><img src="../images/p2.gif" alt="" border="0"/></a>
            </div>
            <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
        </div>
        <div class="title_box">Manufacturers</div>
        <ul class="left_menu">
            <li class="odd"><a href="{{URL::to('site');}}">Sony</a></li>
            <li class="even"><a href="{{URL::to('site');}}">Samsung</a></li>
            <li class="odd"><a href="{{URL::to('site');}}">Daewoo</a></li>
            <li class="even"><a href="{{URL::to('site');}}">LG</a></li>
            <li class="odd"><a href="{{URL::to('site');}}">Fujitsu Siemens</a></li>
            <li class="even"><a href="{{URL::to('site');}}">Motorola</a></li>
            <li class="odd"><a href="{{URL::to('site');}}">Phillips</a></li>
            <li class="even"><a href="{{URL::to('site');}}">Beko</a></li>
        </ul>
        <div class="banner_adds"><a href="{{URL::to('site');}}"><img src="../images/bann1.jpg" alt="" border="0"/></a>
        </div>
    </div>





@endsection