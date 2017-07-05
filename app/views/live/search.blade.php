@layout(layouts.live)

@section('content')
    <div class="features_items">
        <h2 class="title text-center">Search Results</h2>
        @foreach( $search as $hello)



            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{ URL::asset('') }}/{{ $hello->path }}" alt=""/>
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
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                        </ul>
                    </div>
                </div>
            </div>


        <!--
  <div class="prod_box">
        <div class="top_prod_box"></div>
        <div class="center_prod_box">
          <div class="product_title"><a href="details/{{ $hello->id }}">  {{ $hello->name }} </a></div>
          <div class="product_img"><a href="details/{{ $hello->id }}"><img src="../{{ $hello->path }}" width="120" height="90" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce">350$</span> <span class="price"> {{ $hello->price }}{{ $currency->currency }} </span></div>
        </div>
        <div class="bottom_prod_box"></div>
        <div class="prod_details_tab"> <a href="http://www.free-css.com/" title="header=[Add to cart] body=[&nbsp;] fade=[on]"><img src="../images/cart.gif" alt="" border="0" class="left_bt" /></a> <a href="http://www.free-css.com/" title="header=[Specials] body=[&nbsp;] fade=[on]"><img src="../images/favs.gif" alt="" border="0" class="left_bt" /></a> <a href="http://www.free-css.com/" title="header=[Gifts] body=[&nbsp;] fade=[on]"><img src="../images/favorites.gif" alt="" border="0" class="left_bt" /></a> <a href="details/{{ $hello->id }}" class="prod_details">details</a> </div>
      </div>
-->

        @endforeach


    </div>



@endsection

