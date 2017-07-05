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
            <img src="{{ asset($editevent->path) }}" width="220" height="100">
            <h2 class="image">Update Image </h2>

        {{ Form:: open(array('url' => 'viewevent/updateevent' , 'method' => 'post','id' => 'contactform','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
            @if($errors->any())

                {{ implode('', $errors->all('<li>:message</li>'))  }}
            @endif
            {{ Form::token() }}
            {{ Form::hidden('id',$editevent->id)}}
            <table>
                <tr>
                    <input id="image" name="image" placeholder="Image" required="" tabindex="1" type="file">

                </tr>
                <!--<h1><span class="sign-up">Add Users</span> </h1>-->

                <tr>

                    <td>
                        {{ Form:: label ('name', 'Product Names*' )}}
                    </td>
                    <td>
                        {{ Form:: text ('name',$editevent->name)}}
                    </td>
                </tr>

                <tr>
                    <td>
                        {{ Form:: label ('price', 'Price*' )}}
                    </td>
                    <td>
                        {{ Form:: text ('price',$editevent->price)}}
                    </td>
                </tr>

                <tr>
                    <td>
                        {{ Form:: label ('stock', 'Total Stock*' )}}
                    </td>
                    <td>
                        {{ Form:: text ('stock',$editevent->stock)}}
                    </td>
                </tr>


                <tr>

                    <input name="submit" id="submit" tabindex="5" value="submit" type="submit">
                </tr>
            </table>
            {{ Form:: close() }}<br/>
        </div>


    </div>
@endsection
