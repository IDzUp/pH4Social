@layout(layouts.live)

@section('content')



    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div><!--/breadcrums-->

            <div class="step-one">
                <h2 class="heading">Step1</h2>
            </div>
            <div class="checkout-options">
                <h3>New User</h3>
                <p>Checkout options</p>
                <ul class="nav">
                    <li>
                        <label><input type="checkbox"> Register Account</label>
                    </li>
                    <li>
                        <label><input type="checkbox"> Guest Checkout</label>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-times"></i>Cancel</a>
                    </li>
                </ul>
            </div><!--/checkout-options-->

            <div class="register-req">
                <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as
                    Guest</p>
            </div><!--/register-req-->

            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="shopper-info">
                            <p>Shopper Information</p>
                            <form>
                                <input type="text" placeholder="Display Name">
                                <input type="text" placeholder="User Name">
                                <input type="password" placeholder="Password">
                                <input type="password" placeholder="Confirm password">
                            </form>
                            <a class="btn btn-primary" href="">Get Quotes</a>
                            <a class="btn btn-primary" href="">Continue</a>
                        </div>
                    </div>
                    <div class="col-sm-5 clearfix">
                        <div class="bill-to">
                            <p>Bill To</p>
                            <div class="form-one">
                                <form>
                                    <input type="text" placeholder="Company Name">
                                    <input type="text" placeholder="Email*">
                                    <input type="text" placeholder="Title">
                                    <input type="text" placeholder="First Name *">
                                    <input type="text" placeholder="Middle Name">
                                    <input type="text" placeholder="Last Name *">
                                    <input type="text" placeholder="Address 1 *">
                                    <input type="text" placeholder="Address 2">
                                </form>
                            </div>
                            <div class="form-two">
                                <form>
                                    <input type="text" placeholder="Zip / Postal Code *">
                                    <select>
                                        <option>-- Country --</option>
                                        <option>United States</option>
                                        <option>Bangladesh</option>
                                        <option>UK</option>
                                        <option>India</option>
                                        <option>Pakistan</option>
                                        <option>Ucrane</option>
                                        <option>Canada</option>
                                        <option>Dubai</option>
                                    </select>
                                    <select>
                                        <option>-- State / Province / Region --</option>
                                        <option>United States</option>
                                        <option>Bangladesh</option>
                                        <option>UK</option>
                                        <option>India</option>
                                        <option>Pakistan</option>
                                        <option>Ucrane</option>
                                        <option>Canada</option>
                                        <option>Dubai</option>
                                    </select>
                                    <input type="password" placeholder="Confirm password">
                                    <input type="text" placeholder="Phone *">
                                    <input type="text" placeholder="Mobile Phone">
                                    <input type="text" placeholder="Fax">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="order-message">
                            <p>Shipping Order</p>
                            <textarea name="message" placeholder="Notes about your order, Special Notes for Delivery"
                                      rows="16"></textarea>
                            <label><input type="checkbox"> Shipping to bill address</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-payment">
                <h2>Review & Payment</h2>
            </div>

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <!-- <td class="image">Item</td>-->
                        <td class="description">Items</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>


                    <?php $sum = 0; $i = 0; $cus = 0; $s = 1;
                    ?>
                    <script>
                        $(function () {
                            $('.add{{$s}}').on('click', function () {
                                var $qty = $(this).closest('p{{$s}}').find('.qty{{$s}}');
                                var currentVal = parseInt($qty.val());

                                if (!isNaN(currentVal)) {

                                    $qty.val(currentVal + 1);

                                }
                                else {


                                    alert('i ma her');
                                }
                            });
                            $('.minus{{$s}}').on('click', function () {
                                var $qty = $(this).closest('p{{$s}}').find('.qty{{$s}}');
                                var currentVal = parseInt($qty.val());
                                if (!isNaN(currentVal) && currentVal > 0) {
                                    $qty.val(currentVal - 1);
                                }
                            });
                        });
                    </script>

                    <?php
                    foreach( $checkout as $key=>$hello)
                    {

                    $sum += $hello->price;
                    $cus = Auth::user()->rand;
                    ?>


                    <tr>
                        <!--<td class="cart_product">
                          <a href=""><img src="images/cart/one.png" alt=""></a>
                        </td>-->
                        <td class="cart_description">
                            <h4><a href="">{{$hello->product}}</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p>${{$hello->price}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">


                                <p{{$s}}>
                                    <img src="http://i.imgur.com/yOadS1c.png" id="minus1{{$s}}" width="20" height="20"
                                         class="minus{{$s}}"/>
                                    <input id="qty1{{$s}}" type="text" value="1" class="qty{{$s}}"/>
                                    <img id="add1{{$s}}" src="http://i.imgur.com/98cvZnj.png" width="20" height="20"
                                         class="add{{$s}}"/>
                                </p>


                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">${{$hello->price}}


                            </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="shopping/delete/{{$hello->id}}"><i
                                        class="fa fa-times"></i></a>
                        </td>
                    </tr>


                    <?php

                    $i++;


                    }


                    ?>


                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Cart Sub Total</td>
                                    <td>{{$sum}}</td>
                                </tr>
                                <tr>
                                    <td>Exo Tax</td>
                                    <td>$0</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span>{{$sum}}</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="payment-options">
          <span>
            <label><input type="checkbox"> Direct Bank Transfer</label>
          </span>
                <span>
            <label><input type="checkbox"> Check Payment</label>
          </span>
                <span>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="business" value="sahil_kaushal-facilitator@esferasoft.com">
<input type="hidden" name="currency_code" value="US">
<input type="hidden"
       value="http://192.168.1.10/esfera/es3/laravel/laravel-master/public/index.php/paypal/delete/{{$cus}}"
       name="return">

<input type="hidden" name="address_override" value="1">

<input type="hidden" name="first_name" value="{{Auth::user()->email}}">
    <!--
    <input type="hidden" name="last_name" value="Doe">
    <input type="hidden" name="address1" value="345 Lark Ave">
    <input type="hidden" name="city" value="San Jose">
    <input type="hidden" name="state" value="CA">
    <input type="hidden" name="zip" value="95121">
    <input type="hidden" name="country" value="US">-->
    <?php

    $i = 1;

    foreach ($checkout as $key => $hello) {

        echo "<input type='hidden' name='item_name_$i' value='$hello->product'>";
        echo "<input type='hidden' name='amount_$i' value='$hello->price'>";
        echo "<input type='hidden' name='item_number_$i' value='MEM32507725'>";
        echo "<input type='hidden' name='quantity_$i' value='1'>";

        $i++;
    }


    ?>

    <input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit"
           alt="Make payments with PayPal - it's fast, free and secure!">
</form>

          </span>
            </div>
        </div>
    </section> <!--/#cart_items-->












@endsection