@layout(layouts.fbhome)

@section('content')


    <section class="reset_sec">
        <div class="container">
            <div class="row">
                <h2><span class="glyphicon glyphicon-lock"></span> Delete Account</h2>
                @if(Session::has('updatepass'))
                    <div class="alert alert-danger">


                        <strong>{{ Session::get('updatepass') }}</strong>

                    </div>

                @endif
                <div class="jumbotron">


                {{ Form:: open(array('url' => 'delaccount' , 'method' => 'get')) }} <!--contact_request is a router from Route class-->
                    @if($errors->any())

                        {{ implode('', $errors->all('<li>:message</li>'))  }}
                    @endif
                    {{ Form::token() }}


                    <div class="form-group">
                        <!--     <label for="">Email address</label> -->

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="" required="required" name="password"
                               placeholder="Password">

                    </div>

                    <button type="submit" class="all_btn">Submit</button>
                    </form>
                    <div>
                    </div>
                </div>
    </section>


@endsection
