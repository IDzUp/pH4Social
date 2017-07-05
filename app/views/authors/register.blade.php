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



    {{ Form:: open(array('url' => 'getregister' ,'method' =>'get','class' => 'form-2')) }} <!--contact_request is a router from Route class-->
    @if($errors->any())

        {{ implode('', $errors->all('<li>:message</li>'))  }}
    @endif
    {{ Form::token() }}

    <div id="center">
        <h1><span class="sign-up">{{ HTML::Link('login', 'Login')}}</span> or <span class="log-in">Register </span></h1>
        <p class="float">

            {{ Form:: label ('email', 'Email Name*' )}}
            {{ Form:: text ('email')}}
        </p>
        <p class="float">
            {{ Form:: label ('password', 'Password*' )}}
            {{ Form:: password ('password')}}
            <br>

            {{ Form:: label ('password', 'Password Confirmation*' )}}
            {{ Form:: password ('password_confirmation')}}

        </p>
        <input type="hidden" value="<?php echo $random = generateRandomString(); ?>" name="rand">
        <p class="clearfix" id="regg">
        {{ Form::submit('Register', array('class' => 'subb')) }}

        <!--     {{ HTML::Link('cancel', 'cancel',array('class' => 'cann'))}}-->


        </p>


    </div>





    {{ Form:: close() }}<br/>

@endsection
