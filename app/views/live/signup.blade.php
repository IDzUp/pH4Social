@layout(layouts.default)

@section('content')
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

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                    {{ Form:: open(array('url' => 'getlogins' , 'method' => 'get','class' => 'form-2')) }} <!--contact_request is a router from Route class-->
                        @if($errors->any())

                            {{ implode('', $errors->all('<li>:message</li>'))  }}
                        @endif
                        {{ Form::token() }}

                        <input type="email" placeholder="Email Address" name="email"/>
                        <input type="password" placeholder="Password" name="password"/>
                        <span>
                <input type="checkbox" class="checkbox">
                Keep me signed in
              </span>
                        <button type="submit" class="btn btn-default">Login</button>
                        {{ Form:: close() }}
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                    {{ Form:: open(array('url' => 'getregisters' ,'method' =>'get','class' => 'form-2')) }} <!--contact_request is a router from Route class-->
                        @if($errors->any())

                            {{ implode('', $errors->all('<li>:message</li>'))  }}
                        @endif
                        {{ Form::token() }}


                        <input type="text" placeholder="Name" name="name"/>
                        <input type="email" placeholder="Email Address" name="email"/>
                        <input type="text" placeholder="city" name="city"/>
                        <input type="password" placeholder="Password" name="password"/>
                        <input type="hidden" value="<?php echo $random = generateRandomString(); ?>" name="rand">
                        <input type="password" placeholder="Password Confirm" name="password_confirmation"/>
                        <button type="submit" class="btn btn-default">Signup</button>
                        {{ Form:: close() }}
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->





@endsection
