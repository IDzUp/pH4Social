@layout(layouts.admin)

@section('content')


    <div class="grid_9">
        <h1 class="media">Media</h1>
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
                        Image
                    </td>
                    <td>
                        Created By
                    </td>
                    <td>
                        Updated By
                    </td>

                    <td>
                        Action
                    </td>
                </tr>
                @foreach( $viewmedia as $hello)
                    <tr>
                        <td>

                            {{ $hello->id }}

                        </td>
                        <td>
                            <img src="../{{$hello->path}}" width="220" height="100">


                        </td>

                        <td>

                            {{ $hello->created_at  }}

                        </td>
                        <td>

                            {{ $hello->updated_at }}

                        </td>

                        <td>


                            {{ HTML::link('/viewmedia/editmedia/' . $hello->id, ' ',array('class="edit_icon"')) }}




                            {{ HTML::link('/viewmedia/delete/' . $hello->id, ' ',array('class="delete_icon"')) }}

                        </td>


                    </tr>



                @endforeach
            </table>
        </div>


    </div>




@endsection
