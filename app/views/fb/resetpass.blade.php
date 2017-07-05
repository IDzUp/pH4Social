@layout(layouts.fbhome)

@section('content')


    <section class="reset_sec">
        <div class="container">
            <div class="row">
                <h2><span class="glyphicon glyphicon-lock"></span> Reset Your Password</h2>
                @if(Session::has('updatepass'))
                    <div class="alert alert-danger">


                        <strong>{{ Session::get('updatepass') }}</strong>

                    </div>

                @endif
                <div class="jumbotron">


                {{ Form:: open(array('url' => 'updateforget' , 'method' => 'get')) }} <!--contact_request is a router from Route class-->
                    @if($errors->any())

                        {{ implode('', $errors->all('<li>:message</li>'))  }}
                    @endif
                    {{ Form::token() }}
                    <?php
                    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    $pieces = explode("/", $actual_link);

                    $len = sizeof($pieces);

                    $number = $pieces[$len - 1];


                    ?>

                    <div class="form-group">
                        <!--     <label for="">Email address</label> -->
                        <input type="hidden" class="form-control" value="<?php echo $email; ?>" id="" name="email"
                               placeholder="Enter email">
                        <input type="hidden" value="<?php echo $id; ?>" name="id">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password" class="form-control" id="" name="password" placeholder="New Password">
                        <input type="hidden" name="forget" value="<?php echo $number; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm New Password</label>
                        <input type="password" class="form-control" id="" name="password_confirmation"
                               placeholder="Confirm New Password">
                    </div>
                    <button type="submit" class="all_btn">Submit</button>
                    </form>
                    <div>
                    </div>
                </div>
    </section>


@endsection
