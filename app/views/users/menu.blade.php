@layout(layouts.admin)

@section('content')




    <div class="grid_9">
        <h1 class="content">Menu</h1>
    </div>
    <!--RIGHT TEXT/CALENDAR-->
    <div class="grid_6" id="eventbox"><a href="{{URL::to('viewmenu');}}" class="inline_calendar">View Menu</a>
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


        {{ Form:: open(array('url' => 'menu/menusave' , 'method' => 'get','id' => 'contactform')) }} <!--contact_request is a router from Route class-->

            <p class="contact"><label for="name">Menu</label></p>
            <input id="name" name="name" required="" type="text">

            <p class="contact"><label for="link">Link</label></p>
            <input id="name" name="link" required="" type="text">

            <input name="submit" id="submit" value="Submit" type="submit">
            {{ Form:: close() }}<br/>
        </div>


    </div>





@endsection