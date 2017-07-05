@layout(layouts.default)

@section('content')


    <div class="grid_9">
        <h1 class="newsletter">Editing Menu</h1>
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


        <div class="editing">


        {{ Form:: open(array('url' => 'updatemenu' , 'method' => 'put')) }} <!--contact_request is a router from Route class-->
            @if($errors->any())

                {{ implode('', $errors->all('<li>:message</li>'))  }}
            @endif
            {{ Form::token() }}

            <div id="center">
                <!--<h1><span class="log-in"><span class="sign-up">Editing Contact us</span></h1>-->
                <p class="float">


                    {{ Form::hidden('id',$menuedit->id)}}
                </p>
                <p class="float">

                    {{ Form:: label ('name', 'Name*' )}}
                    {{ Form:: text ('name',    $menuedit->menu  )}}
                </p>

                <p class="float">

                    {{ Form:: label ('link', 'Link*' )}}
                    {{ Form:: text ('link',    $menuedit->link  )}}
                </p>

                {{ Form::submit('Submit') }}


            </div>


            {{ Form:: close() }}<br/>

        </div>


    </div>





@endsection
