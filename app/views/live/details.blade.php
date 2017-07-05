@layout(layouts.live)

@section('content')

    <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{asset('')}}/{{$viewdetails->path}}" alt=""/>
                    <h3>ZOOM</h3>
                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <a href=""><img src="{{asset('')}}/images/product-details/similar1.jpg" alt=""></a>
                            <a href=""><img src="{{asset('')}}/images/product-details/similar2.jpg" alt=""></a>
                            <a href=""><img src="{{asset('')}}/images/product-details/similar3.jpg" alt=""></a>
                        </div>
                        <div class="item">
                            <a href=""><img src="{{asset('')}}/images/product-details/similar1.jpg" alt=""></a>
                            <a href=""><img src="{{asset('')}}/images/product-details/similar2.jpg" alt=""></a>
                            <a href=""><img src="{{asset('')}}/images/product-details/similar3.jpg" alt=""></a>
                        </div>
                        <div class="item">
                            <a href=""><img src="{{asset('')}}/images/product-details/similar1.jpg" alt=""></a>
                            <a href=""><img src="{{asset('')}}/images/product-details/similar2.jpg" alt=""></a>
                            <a href=""><img src="{{asset('')}}/images/product-details/similar3.jpg" alt=""></a>
                        </div>

                    </div>

                    <!-- Controls -->
                    <a class="left item-control" href="#similar-product" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right item-control" href="#similar-product" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <img src="{{asset('')}}/images/product-details/new.jpg" class="newarrival" alt=""/>
                    <h2>{{ $viewdetails->name }}</h2>
                    <p>Web ID: 1089772</p>


                    <?php
                    $sum = 0;
                    $i = 0;
                    $j = 0;
                    foreach ($rating as $hello) {

                        $sum += $hello->rating;
                        $i++;
                    }


                    if ($i == 0) {

                        $j = $sum / 1;

                    } else {
                        $j = $sum / $i;
                    }


                    if($j <= 1)
                    {
                    ?>
                    <img src="{{asset('')}}/images/star.png" width="20" height="20" checked="false">
                    <img src="{{asset('')}}/images/starblank.png" width="20" height="20" checked="false">
                    <img src="{{asset('')}}/images/starblank.png" width="20" height="20" checked="false">
                    <img src="{{asset('')}}/images/starblank.png" width="20" height="20" checked="false">
                    <img src="{{asset('')}}/images/starblank.png" width="20" height="20" checked="false">
                    <?php
                    }

                    else if($j > 1 && $j <= 2)
                    {
                    ?>
                    <img src="{{asset('')}}/images/star.png" width="20" height="20" checked="false">
                    <img src="{{asset('')}}/images/star.png" width="20" height="20" checked="false">
                    <img src="{{asset('')}}/images/starblank.png" width="20" height="20" checked="false">
                    <img src="{{asset('')}}/images/starblank.png" width="20" height="20" checked="false">
                    <img src="{{asset('')}}/images/starblank.png" width="20" height="20" checked="false">
                    <?php
                    }
                    else if($j > 2 && $j <= 3)
                    {
                    ?>
                    <img src="{{asset('')}}/images/star.png" width="20" height="20" checked="false">
                    <img src="{{asset('')}}/images/star.png" width="20" height="20" checked="false">
                    <img src="{{asset('')}}/images/star.png" width="20" height="20" checked="false">
                    <img src="{{asset('')}}/images/starblank.png" width="20" height="20" checked="false">
                    <img src="{{asset('')}}/images/starblank.png" width="20" height="20" checked="false">

                    <?php
                    }

                    else if($j > 3 && $j <= 4)
                    {
                    ?>
                    <img src="{{asset('')}}/images/star.png" width="20" height="20" checked="false">
                    <img src="{{asset('')}}/images/star.png" width="20" height="20" checked="false">
                    <img src="{{asset('')}}/images/star.png" width="20" height="20" checked="false">
                    <img src="{{asset('')}}/images/star.png" width="20" height="20" checked="false">
                    <img src="{{asset('')}}/images/starblank.png" width="20" height="20" checked="false">

                    <?php
                    }
                    else
                    {
                    ?>
                    <img src="{{asset('')}}/images/star.png" width="20" height="20" checked="false">
                    <img src="{{asset('')}}/images/star.png" width="20" height="20" checked="false">
                    <img src="{{asset('')}}/images/star.png" width="20" height="20" checked="false">
                    <img src="{{asset('')}}/images/star.png" width="20" height="20" checked="false">
                    <img src="{{asset('')}}/images/star.png" width="20" height="20" checked="false">
                    <?php
                    }

                    ?>


                    <span>
                  <span>US ${{ $viewdetails->price }}</span>
                  <label>Quantity:</label>
                  <input type="text" value="3"/>

                    <i class="fa fa-shopping-cart"></i>
                    <form action="addtocart/{{$viewdetails->id}}" method="get">
<input type="hidden" name="name" value="{{ $viewdetails->name }}">
<input type="hidden" name="price" value="{{ $viewdetails->price }}">
 <input type="hidden" name="rand" value="<?php if (Auth::user()) {
     echo $rand = Auth::user()->rand;
 }?>">
<input type="submit" value="Add to Cart" class="btn btn-fefault cart" width="100">
</form>


                </span>
                    <p><b>Availability:</b> In Stock</p>
                    <p><b>Condition:</b> New</p>
                    <p><b>Brand:</b> E-SHOPPER</p>
                    <a href=""><img src="{{asset('')}}/images/product-details/share.png" class="share img-responsive"
                                    alt=""/></a>
                </div><!--/product-information-->
            </div>
        </div><!--/product-details-->

        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li><a href="#details" data-toggle="tab">Details</a></li>
                    <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                    <li><a href="#tag" data-toggle="tab">Tag</a></li>
                    <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade" id="details">
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('')}}/images/home/gallery1.jpg" alt=""/>
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('')}}/images/home/gallery2.jpg" alt=""/>
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('')}}/images/home/gallery3.jpg" alt=""/>
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('')}}/images/home/gallery4.jpg" alt=""/>
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="companyprofile">
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('')}}/images/home/gallery1.jpg" alt=""/>
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('')}}/images/home/gallery3.jpg" alt=""/>
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('')}}/images/home/gallery2.jpg" alt=""/>
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('')}}/images/home/gallery4.jpg" alt=""/>
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="tag">
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('')}}/images/home/gallery1.jpg" alt=""/>
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('')}}/images/home/gallery2.jpg" alt=""/>
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('')}}/images/home/gallery3.jpg" alt=""/>
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('')}}/images/home/gallery4.jpg" alt=""/>
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade active in" id="reviews">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                            <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                            <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <p><b>Write Your Review</b></p>


                        {{ Form:: open(array('url' => 'rating' , 'method' => 'get')) }}
                        <span>
                      <input type="text" placeholder="Your Name"/>
                      <input type="email" placeholder="Email Address"/>
                    </span>

                        <b>Rating: </b>


                        <script type="text/javascript">


                            $(document).ready(function () {


                                $(function () {
                                    $("#btn").click(function () {


                                        $("img#btn").attr('src',
                                                ($("img#btn").attr('src') == '{{asset('')}}/images/star.png'
                                                                ? '{{asset('')}}/images/starblank.png'
                                                                : '{{asset('')}}/images/star.png'
                                                )
                                        );

                                        $('#btn2').attr('src', '{{asset('')}}/images/starblank.png');
                                        $('#btn1').attr('src', '{{asset('')}}/images/starblank.png');
                                        $('#btn3').attr('src', '{{asset('')}}/images/starblank.png');
                                        $('#btn4').attr('src', '{{asset('')}}/images/starblank.png');
                                        $('input[type="radio"][id="test1"]').not(':checked').prop("checked", true);


                                    });


                                });

                                $(function () {
                                    $("#btn1").click(function () {


                                        $('#btn').attr('src', '{{asset('')}}/images/star.png');
                                        $('#btn1').attr('src', '{{asset('')}}/images/star.png');
                                        $('#btn2').attr('src', '{{asset('')}}/images/starblank.png');

                                        $('#btn3').attr('src', '{{asset('')}}/images/starblank.png');
                                        $('#btn4').attr('src', '{{asset('')}}/images/starblank.png');
                                        $('input[type="radio"][id="test2"]').not(':checked').prop("checked", true);
                                    });


                                });

                                $(function () {
                                    $("#btn2").click(function () {

                                        $('#btn').attr('src', '{{asset('')}}/images/star.png');
                                        $('#btn1').attr('src', '{{asset('')}}/images/star.png');
                                        $('#btn2').attr('src', '{{asset('')}}/images/star.png');

                                        $('#btn3').attr('src', '{{asset('')}}/images/starblank.png');
                                        $('#btn4').attr('src', '{{asset('')}}/images/starblank.png');
                                        $('input[type="radio"][id="test3"]').not(':checked').prop("checked", true);
                                    });


                                });


                                $(function () {
                                    $("#btn3").click(function () {


                                        $('#btn').attr('src', '{{asset('')}}/images/star.png');
                                        $('#btn1').attr('src', '{{asset('')}}/images/star.png');
                                        $('#btn2').attr('src', '{{asset('')}}/images/star.png');
                                        $('input[type="radio"][id="test4"]').not(':checked').prop("checked", true);
                                        $('#btn3').attr('src', '{{asset('')}}/images/star.png');
                                        $('#btn4').attr('src', '{{asset('')}}/images/starblank.png');
                                    });


                                });

                                $(function () {
                                    $("#btn4").click(function () {


                                        $('#btn').attr('src', '{{asset('')}}/images/star.png');
                                        $('#btn1').attr('src', '{{asset('')}}/images/star.png');
                                        $('#btn2').attr('src', '{{asset('')}}/images/star.png');
                                        $('input[type="radio"][id="test5"]').not(':checked').prop("checked", true);
                                        $('#btn3').attr('src', '{{asset('')}}/images/star.png');
                                        $('#btn4').attr('src', '{{asset('')}}/images/star.png');
                                    });


                                });


                            });

                        </script>
                        <img src="{{asset('')}}/images/starblank.png" style="cursor: pointer;" id="btn" width="20"
                             height="20" checked="false">

                        <img src="{{asset('')}}/images/starblank.png" style="cursor: pointer;" id="btn1" width="20"
                             height="20" checked="false">

                        <img src="{{asset('')}}/images/starblank.png" style="cursor: pointer;" id="btn2" width="20"
                             height="20" checked="false">

                        <img src="{{asset('')}}/images/starblank.png" style="cursor: pointer;" id="btn3" width="20"
                             height="20" checked="false">

                        <img src="{{asset('')}}/images/starblank.png" style="cursor: pointer;" id="btn4" width="20"
                             height="20" checked="false">


                        <input name="product" type="hidden" value="{{ $viewdetails->name }}"/>
                        <input name="ids" type="hidden" value="{{ $viewdetails->id }}"/>
                        <input id="test1" name="test" type="radio" value="1" style="display:none"/>
                        <input id="test2" name="test" type="radio" value="2" style="display:none"/>
                        <input id="test3" name="test" type="radio" value="3" style="display:none"/>
                        <input id="test4" name="test" type="radio" value="4" style="display:none"/>
                        <input id="test5" name="test" type="radio" value="5" style="display:none"/>

                        {{ Form::submit('Submit') }}




                        {{ Form:: close() }}


                    </div>
                </div>

            </div>
        </div><!--/category-tab-->

        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">recommended items</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('')}}/images/home/recommend1.jpg" alt=""/>
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('')}}/images/home/recommend2.jpg" alt=""/>
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('')}}/images/home/recommend3.jpg" alt=""/>
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('')}}/images/home/recommend1.jpg" alt=""/>
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="../images/home/recommend2.jpg" alt=""/>
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('')}}/images/home/recommend3.jpg" alt=""/>
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div><!--/recommended_items-->

    </div>







































    </div>




    <!--
    <form action="comment/{{$viewdetails->id}}" method="get">



          <p class="contact"><label for="comment">Your Message</label></p>
          <textarea name="comment" id="comment" tabindex="4"></textarea> <br>
          <input name="submit" id="submit" tabindex="5" value="Send Message" type="submit">
      {{ Form:: close() }}<br/>
 -->

@endsection


