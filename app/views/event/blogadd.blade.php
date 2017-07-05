@layout(layouts.admin)

@section('content')


    <div class="grid_9">
        <h1 class="event">Add Blog</h1>
    </div>
    <!--RIGHT TEXT/CALENDAR-->
    <div class="grid_6" id="eventbox"><a href="viewblog" class="inline_calendar">View Blog</a>
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
            <h2 class="image">Product Image</h2>

        {{ Form:: open(array('url' => '/blogadd/save' , 'method' => 'post','id' => 'contactform','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
            @if($errors->any())

                {{ implode('', $errors->all('<li>:message</li>'))  }}
            @endif
            {{ Form::token() }}

            <table>
                <tr>
                    <input id="image" name="image" placeholder="Image" required="" tabindex="1" type="file">

                </tr>
                <!--<h1><span class="sign-up">Add Users</span> </h1>-->

                <tr>

                    <td>
                        {{ Form:: label ('name', 'Blog Names*' )}}
                    </td>
                    <td>
                        {{ Form:: text ('name')}}
                    </td>
                </tr>

                <tr>
                    <td>
                        {{ Form:: label ('contents', 'Content*' )}}
                    </td>
                    <td>
                        {{ Form:: text ('contents')}}
                    </td>
                </tr>

                <tr>
                    <td>
                        {{ Form:: label ('title', 'Title*' )}}
                    </td>
                    <td>
                        {{ Form:: text ('title')}}
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
