@layout(layouts.admin)

@section('content')


    <div class="grid_9">
        <h1 class="event">Products</h1>
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


        <div id="box-table-a" class="CSS_Table_Example">
            <table>
                <tr>
                    <td>
                        Id
                    </td>
                    <td>
                        Blog Image
                    </td>
                    <td>
                        Blog Title
                    </td>
                    <td>
                        Blog Name
                    </td>
                    <td>
                        Blog Content
                    </td>
                    <td>
                        Action
                    </td>
                </tr>
                @foreach( $viewblog as $hello)
                    <tr>
                        <td>

                            {{ $hello->id }}

                        </td>
                        <td>
                            <img src="../{{$hello->path}}" width="220" height="100">


                        </td>

                        <td>

                            {{ $hello->title  }}

                        </td>
                        <td>

                            {{ $hello->name }}

                        </td>
                        <td>

                            {{ $hello->contents }}

                        </td>

                        <td>


                            {{ HTML::link('/viewblog/delete/' . $hello->id, ' ',array('class="delete_icon"')) }}

                        </td>


                    </tr>



                @endforeach
            </table>
        </div>


    </div>




@endsection
