@layout(layouts.admin)

@section('content')


    <div class="grid_9">
        <h1 class="media">Change the Image</h1>
    </div>
    <!--RIGHT TEXT/CALENDAR-->
    <div class="grid_6" id="eventbox"><a href="#" class="inline_calendar">You don't have any events for today! Yay!</a>
        <div class="hidden_calendar"></div>
    </div>
    <!--RIGHT TEXT/CALENDAR END-->
    <div class="clear">
    </div>
    <!--  TITLE END  -->
    <!-- #PORTLETS START -->
    <div id="portlets">
        <!-- FIRST SORTABLE COLUMN START -->


        {{ HTML::style('css/contact.css'); }}

        <div class="cover">
            <img src="{{ asset($editmedia->path) }}" width="220" height="100">
            <h2 class="image">Update Image </h2>

        {{ Form:: open(array('url' => 'viewmedia/updatemedia' , 'method' => 'post','id' => 'contactform','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
            @if($errors->any())

                {{ implode('', $errors->all('<li>:message</li>'))  }}
            @endif
            {{ Form::token() }}


            {{ Form::hidden('id',$editmedia->id)}}
            <input id="image" name="image" placeholder="Image" required="" tabindex="1" type="file">


            <input name="submit" id="submit" tabindex="5" value="submit" type="submit">
            {{ Form:: close() }}<br/>
        </div>


    </div>
@endsection
