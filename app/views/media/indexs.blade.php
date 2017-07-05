@layout(layouts.admin)

@section('content')


    <div class="grid_9">
        <h1 class="media">Add Media</h1>
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
            <h2 class="image">Image upload</h2>

        {{ Form:: open(array('url' => 'media/save' , 'method' => 'post','id' => 'contactform','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
            @if($errors->any())

                {{ implode('', $errors->all('<li>:message</li>'))  }}
            @endif
            {{ Form::token() }}

            <input id="image" name="image" placeholder="Image" required="" tabindex="1" type="file">


            <input name="submit" id="submit" tabindex="5" value="submit" type="submit">
            {{ Form:: close() }}<br/>
        </div>


    </div>


@endsection
