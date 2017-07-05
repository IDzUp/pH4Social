@layout(layouts.admin)

@section('content')


    <div class="grid_9">
        <h1 class="media">Slider</h1>
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
                        Image-1
                    </td>

                    <td>
                        Image-2
                    </td>


                    <td>
                        Image-3
                    </td>

                    <td>
                        Image-4
                    </td>
                </tr>
                @foreach( $viewslider as $hello)
                    <tr>
                        <td>

                            {{ $hello->id }}

                        </td>
                        <td>
                            <img src="../{{$hello->path}}" width="170" height="100">

                        </td>

                        <td>

                            <img src="../{{$hello->path1}}" width="170" height="100">

                        </td>

                        <td>

                            <img src="../{{$hello->path2}}" width="170" height="100">

                        </td>

                        <td>


                            <img src="../{{$hello->path3}}" width="170" height="100"></td>


                    </tr>



                @endforeach
            </table>
        </div>


    </div>




@endsection
