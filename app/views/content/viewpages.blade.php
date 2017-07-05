@layout(layouts.admin)

@section('content')



    <div class="grid_9">
        <h1 class="newsletter">Pages</h1>
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
                        Title
                    </td>
                    <td>
                        Content
                    </td>

                    <td>
                        Action
                    </td>
                </tr>
                @foreach( $viewpages as $hello)
                    <tr>
                        <td>

                            {{ $hello->id }}

                        </td>
                        <td>

                            {{ $hello->title }}

                        </td>

                        <td>

                            {{ $hello->content }}

                        </td>


                        <td>


                            {{ HTML::link('/content/edit/' . $hello->id, '',array('class="edit_icon"')) }}




                            {{ HTML::link('/content/delete/' . $hello->id, '',array('class="delete_icon"')) }}

                        </td>


                    </tr>



                @endforeach
            </table>
        </div>


    </div>




@endsection
