@layout(layouts.admin)

@section('content')



    <div class="grid_9">
        <h1 class="content">Settings</h1>
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
            <table>

                <tr>

                    <th>

                        Available colors Copy paste that code into input box
                    </th>


                </tr>
                <tr>

                    <th>

                        Green
                    </th>


                </tr>
                <tr>

                    <th>

                        Blue
                    </th>


                </tr>
                <tr>

                    <th>

                        Red
                    </th>


                </tr>


                <table>

                {{ Form:: open(array('url' => 'settings/change' , 'method' => 'get','id' => 'contactform')) }} <!--contact_request is a router from Route class-->

                    <p class="contact"><label for="color">Color</label></p>
                    <input id="color" name="color" required="" type="text">


                    <input name="submit" id="submit" value="Submit" type="submit">
                    {{ Form:: close() }}<br/>
        </div>


    </div>




@endsection
