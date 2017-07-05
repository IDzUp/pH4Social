@layout(layouts.admin)

@section('content')

    <div class="grid_9">
        <h1 class="users">Users</h1>
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


        <div id="box-table-a" class="CSS_Table_Example" style="width:900px;height:150px;">
            <table>
                <tr>
                    <td>
                        Id
                    </td>
                    <td>
                        Email
                    </td>
                    <!-- <td>
                        Password
                    </td> -->
                    <td>
                        Name
                    </td>
                    <td>
                        City
                    </td>
                    <td>
                        Sex
                    </td>
                    <td>
                        Phone
                    </td>
                    <td>
                        Country
                    </td>
                    <td>
                        Action
                    </td>
                </tr>
                @foreach( $users as $hello)
                    <tr>
                        <td>

                            {{ $hello->id }}

                        </td>
                        <td>

                            {{ $hello->email }}

                        </td>

                    <!-- <td >

                        {{ $hello->password }}

                            </td> -->
                        <td>

                            {{ $hello->name }}

                        </td>
                        <td>

                            {{ $hello->city }}

                        </td>
                        </td>
                        <td>

                            {{ $hello->sex }}

                        </td>
                        <td>

                            {{ $hello->phone }}

                        </td>
                        </td>
                        <td>

                            {{ $hello->location }}

                        </td>
                        <td>


                            {{ HTML::link('edit/' . $hello->id, '',array('class="edit_icon"')) }}




                            {{ HTML::link('delete/' . $hello->id, '',array('class="delete_icon"')) }}

                        </td>


                    </tr>



                @endforeach
            </table>
        </div>


    </div>


@endsection
