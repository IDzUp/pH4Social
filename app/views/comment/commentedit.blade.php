@layout(layouts.default)

@section('content')


    <div class="grid_9">
        <h1 class="newsletter">Editing Comment</h1>
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


            {{ Form:: open(array('url' => 'updatecomment' , 'method' => 'put')) }}


            <div id="center">

                <p class="float">


                    {{ Form:: label ('product', 'Product id*' )}}
                    {{ Form:: text ('product',    $commentedit->product_id  )}}


                    {{ Form::hidden('id',$commentedit->id)}}
                </p>
                <p class="float">

                    {{ Form:: label ('name', 'Comment*' )}}
                    {{ Form:: text ('name',    $commentedit->comment  )}}
                </p>


                {{ Form::submit('Submit') }}


            </div>


            {{ Form:: close() }}<br/>

        </div>


    </div>

@endsection
