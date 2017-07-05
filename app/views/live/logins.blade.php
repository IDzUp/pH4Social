@layout(layouts.default)

@section('content')





    {{ Form:: open(array('url' => 'getlogins' , 'method' => 'get','class' => 'form-2')) }} <!--contact_request is a router from Route class-->
    @if($errors->any())

        {{ implode('', $errors->all('<li>:message</li>'))  }}
    @endif
    {{ Form::token() }}

    <div id="center">
        <h1><span class="log-in">Log in</span> or <span
                    class="sign-up"> {{ HTML::Link('getregisters', 'register')}}</span></h1>
        <p class="float">

            {{ Form:: label ('email', 'Email Name*' )}}
            {{ Form:: text ('email')}}
        </p>
        <p class="float">
            {{ Form:: label ('password', 'Password*' )}}
            {{ Form:: password ('password')}}
        </p>
        <p class="clearfix" id="log">

            {{ Form::submit('Login', array('class' => 'lg')) }}
        </p>


    </div>



    {{ Form:: close() }}<br/>

@endsection
