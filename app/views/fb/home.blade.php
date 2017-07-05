@layout(layouts.fbhome)

@section('content')


    <section class="banner_outer">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                    <div class="left_box">
                        <div class="error-container activa">
                            @if (Session::has('activte'))
                                <div class="alert alert-success" role="alert">{{ Session::get('activte') }}</div>
                            @endif

                            @if (Session::has('emailaccess'))
                                <div class="alert alert-danger" role="alert">{{ Session::get('emailaccess') }}</div>
                            @endif

                            @if (Session::has('forgetpass'))
                                <div class="alert alert-success" role="alert">{{ Session::get('forgetpass') }}</div>
                            @endif

                            @if (Session::has('updatepass'))
                                <div class="alert alert-success" role="alert">{{ Session::get('updatepass') }}</div>
                            @endif

                        </div>
                        <h1>{{trans ('greeting.Meet new people')}}</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </br>
                            Donec in placerat magna. Maecenas vestibulum id felis</p>
                        <a href="#"><img src="{{ asset('/') }}public/imagesfb/app_storebtn.png" alt=""/></a> <a
                                href="#"><img src="{{ asset('/') }}public/imagesfb/google_playbtn.png" alt=""/></a> <a
                                href="#"><img src="{{ asset('/') }}public/imagesfb/window_storebtn.png" alt=""/></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
                    <div class="form_box">
                    <?php

                    function generateRandomString($length = 10)
                    {
                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $randomString = '';
                        for ($i = 0; $i < $length; $i++) {
                            $randomString .= $characters[rand(0, strlen($characters) - 1)];
                        }
                        return $randomString;
                    }

                    ?>


                    {{ Form:: open(array('url' => 'getregistersfb' ,'method' =>'get','class' => 'form-2','id' => 'signups')) }} <!--contact_request is a router from Route class-->
                        <div class="error-container extraactiva">
                            @if (!Session::has('loginerrors'))
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
                                    @if ($errors->has('password'))
                                        <div class="alert alert-danger" role="alert">Password Required</div>@endif
                                    @if ($errors->has('name'))
                                        <div class="alert alert-danger"
                                             role="alert"><?php $name = implode('', $errors->all(':message')); if ($name == 'validation.max.string') {
                                                echo 'Username Maximum length 25';
                                            } else {
                                                echo 'Username Required or Unique';
                                            } ?></div>@endif
                                    @if ($errors->has('city'))
                                        <div class="alert alert-danger"
                                             role="alert"><?php $city = implode('', $errors->all(':message')); if ($city == 'validation.max.string') {
                                                echo 'City Maximum length 25';
                                            } else {
                                                echo 'City Required';
                                            } ?></div>@endif
                                    @if ($errors->has('location'))
                                        <div class="alert alert-danger" role="alert">Country Required</div>@endif
                                    @if ($errors->has('agree'))
                                        <div class="alert alert-danger" role="alert">Checkbox Required</div>@endif
                                @endif
                            @endif
                        </div>
                        <style scoped>
                            .activa {
                                left: -795px;
                                position: absolute;
                                top: 0;
                            }

                            .checkbox-inline.extracheckbox {
                                width: 100%;
                            }
                        </style>

                        {{ Form::token() }}
                        <h2>{{trans ('greeting.Sign up')}}</h2>
                        <div class="form-group">
                            <input type="email" name="email" required="" class="form-control input_height"
                                   placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="Username" name="name" value="" required="" class="form-control input_height"
                                   id="emm" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" required="" name="city"
                                   class="form-control input_height" id="emms" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="text" name="city" required="" class="form-control input_height" id=""
                                   placeholder="City">
                        </div>

                        <div class="form-group">
                            <select required="" class="countys" name="location">

                                <option selected disabled>Select Country</option>
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Åland Islands">Åland Islands</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antarctica">Antarctica</option>
                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
                                <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba
                                </option>
                                <option value="Bonaire, Sint Eustatius and Saba">Bosnia and Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Bouvet Island">Bouvet Island</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of
                                    the
                                </option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Curaçao">Curaçao</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Territories">French Southern Territories</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guernsey">Guernsey</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands
                                </option>
                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jersey">Jersey</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's
                                    Republic of
                                </option>
                                <option value="Korea, Republic of">Korea, Republic of</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic
                                </option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libya">Libya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macao">Macao</option>
                                <option value="Macedonia, the former Yugoslav Republic of">Macedonia, the former
                                    Yugoslav Republic of
                                </option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montenegro">Montenegro</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau">Palau</option>
                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Pitcairn">Pitcairn</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Réunion">Réunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russian Federation">Russian Federation</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="Saint Barthélemy">Saint Barthélemy</option>
                                <option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and
                                    Tristan da Cunha
                                </option>
                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                <option value="Saint Lucia">Saint Lucia</option>
                                <option value="Saint Martin (French part)">Saint Martin (French part)</option>
                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines
                                </option>
                                <option value="Samoa">Samoa</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Serbia">Serbia</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="South Georgia and the South Sandwich Islands">South Georgia and the South
                                    Sandwich Islands
                                </option>
                                <option value="South Sudan">South Sudan</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Timor-Leste">Timor-Leste</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                                <option value="United States Minor Outlying Islands">United States Minor Outlying
                                    Islands
                                </option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of
                                </option>
                                <option value="Viet Nam">Viet Nam</option>
                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                <option value="Western Sahara">Western Sahara</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>

                        </div>


                        <div class="form-group"> {{trans ('greeting.Gender')}}
                            <label class="checkbox-inline">
                                <input type="radio" name="sex" id="" checked="" value="male">
                                {{trans ('greeting.Male')}} </label>
                            <label class="checkbox-inline">
                                <input type="radio" name="sex" id="" value="female">
                                {{trans ('greeting.Female')}} </label>
                        </div>

                        <div class="form-group">
                            <label class="checkbox-inline extracheckbox">
                                <input type="checkbox" name="agree" value="agree" required="">
                                By continuing, you're confirming that you've read and agree to the <a
                                        href="{{ asset('/index.php') }}/page/Terms & Condition">TOS</a> and <a
                                        href="{{ asset('/index.php') }}/page/Privacy">Privacy Policy</a> </label>

                        </div>


                        <input type="hidden" value="<?php echo $random = generateRandomString(); ?>" name="rand">
                        <p class="sign-button">
                            <button type="submit" class="sign_btn">{{trans ('greeting.Sign up')}}</button>
                        </p>
                        </form>
                    </div>
                    <div class="shadow"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="banner_shadow"></section>
    <section class="share_sec">
        <div class="container">
            <div class="row">
                <h2><span class="glyphicon glyphicon-music"></span> Share & discover similar interests</h2>
            </div>
        </div>
    </section>
    <section class="show_sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="share_box">
                        <div class="img_border"><img src="{{ asset('/') }}public/imagesfb/tv_img.png" alt=""/></div>
                        <p>Share your insights on today's top movies and more.</p>
                        <div class="confirm_box"><a href="#" class="movies_btn">Movies</a></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="share_box">
                        <div class="img_border"><img src="{{ asset('/') }}public/imagesfb/tvshow.png" alt=""/></div>
                        <p>Share your insights on today's top movies and more.</p>
                        <div class="confirm_box"><a href="#" class="movies_btn">TV Shows</a></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="share_box">
                        <div class="img_border"><img src="{{ asset('/') }}public/imagesfb/music.png" alt=""/></div>
                        <p>Share your insights on today's top movies and more.</p>
                        <div class="confirm_box"><a href="#" class="movies_btn">Music</a></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="share_box">
                        <div class="img_border"><img src="{{ asset('/') }}public/imagesfb/book.png" alt=""/></div>
                        <p>Share your insights on today's top movies and more.</p>
                        <div class="confirm_box"><a href="#" class="movies_btn">Books</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pepole_banner">
        <div class="container">
            <div class="row">
                <h1>1,453,203
                    <p>Messages sent between users in the last month </p>
                </h1>
                <p>With hundreds of thousands of users you'll never run out of new people to chat with, new music to
                    discover, or fun things to do</p>
            </div>
        </div>
    </section>
    <section class="conversation_sec">
        <div class="container">
            <div class="row">
                <h2><span class="glyphicon glyphicon-volume-up"></span> </span>Start a new conversation now... it's time
                    to be social</h2>
            </div>
        </div>
        <div class="container">

            <div class="row">

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                    <div class="row">

                        <div class="user_img">

                            <img src="{{ asset('/') }}public/imagesfb/user_img.jpg" alt=""/>

                        </div>

                        <div class="conversation_box2">

                            <div class="logo2">

                                <img src="{{ asset('/') }}public/imagesfb/logo2.png" alt=""/>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                    <div class="row">

                        <div class="user_img">

                            <img src="{{ asset('/') }}public/imagesfb/user_img.jpg" alt=""/>

                        </div>

                        <div class="conversation_box1">

                            <div class="about_box">

                                <p>About <br/>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Sed ultrices a nisl
                                    maximus mattis. Donec </p>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                    <div class="row">

                        <div class="user_img">

                            <img src="{{ asset('/') }}public/imagesfb/user_img.jpg" alt=""/>

                        </div>

                        <div class="conversation_box">

                            <div class="safety">

                                <div class="links">

                                    <ul>
                                        <li><a href="#">Safety Tips</a></li>
                                        <li><a href="#">Terms / Privacy Policy</a></li>
                                        <li><a href="{{ asset('/index.php') }}/contactform">Contact</a></li>
                                        <li><a href="#">Blog </a></li>
                                        <li><a href="#">Help</a></li>
                                    </ul>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                    <div class="row">

                        <div class="user_img">

                            <img src="{{ asset('/') }}public/imagesfb/user_img.jpg" alt=""/>

                        </div>

                        <div class="conversation_box2">

                            <div class="safety">

                                <div class="links">

                                    <ul>

                                        @foreach( $pages as $hello)

                                            <li>
                                                <a href="{{ asset('/index.php/') }}/page/{{$hello->title}}">{{$hello->title}}</a>
                                            </li>

                                        @endforeach

                                    </ul>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        </div>

    </section>


    <script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript">


        $(document).ready(function () {
            $('#emm').val('');
            $('#emms').val('');
//alert('d');


        });
    </script>


    <!--
    <script type="text/javascript">

    //alert(navigator.userAgent);

    var res = navigator.userAgent.match(/Safari/g);
    if (res!=null)
    {

      var form = document.getElementById('signups'); // form has to have ID: <form id="formID">
    form.noValidate = true;
    form.addEventListener('submit', function(event) { // listen for form submitting
            if (!event.target.checkValidity()) {
                event.preventDefault(); // dismiss the default functionality
                alert('Please, fill the all form fields'); // error message
            }
        }, false);

    }




    </script>
    -->
@endsection
