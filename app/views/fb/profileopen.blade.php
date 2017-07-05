@layout(layouts.fb)

@section('content')


    <div id="searchings">
        <h1>{{$userinfo->name}}</h1>

        <img src="<?php echo Request::root();?>/../{{$profileopen->path}}" width="50" height="50"/>


        <img src="<?php echo Request::root();?>/../{{$profileopen->cover}}" width="700" height="100"/>
        <div id="posts">
            @foreach( $post as $hello)

                <p>{{$hello->post}}</p>

            @endforeach

        </div>
    </div>
    {{ Form:: open(array('url' => 'friendrequest' , 'method' => 'post','id' => 'contactform','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
    @if($errors->any())

        {{ implode('', $errors->all('<li>:message</li>'))  }}
    @endif
    {{ Form::token() }}

    <input name="user" type="hidden" value="{{Auth::user()->rand;}}"/>
    <input name="friendrequest" type="hidden" value="{{$userinfo->rand}}"/>
    <input type="submit" value="AddFriend"/>


    </form>


@endsection
