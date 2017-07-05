@layout(layouts.admin)

@section('content')



    <div class="grid_9">
        <h1 class="newsletter">View Menu</h1>
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

                        Category

                    </td>

                    <td>
                        Id
                    </td>
                    <td>
                        Title
                    </td>
                    <td>
                        Link
                    </td>

                    <td>
                        Action
                    </td>
                </tr>
                @foreach( $viewmenu as $hello)
                    <tr>



                    <tr>
                        <td>

                            Main Menu

                        </td>

                        <td>

                            {{ $hello->id }}

                        </td>
                        <td>

                            {{ $hello->menu }}

                        </td>

                        <td>

                            {{ $hello->link }}

                        </td>


                        <td>


                            {{ HTML::link('/menu/edit/' . $hello->id, '',array('class="edit_icon"')) }}




                            {{ HTML::link('/menu/delete/' . $hello->id, '',array('class="delete_icon"')) }}

                        </td>


                        <td>


                            {{ HTML::link('/menu/submenu/' . $hello->id, 'Add sub menu') }}

                        </td>

                    </tr>

                    @foreach( $submenu as $hellos)
                        <tr>


                            <?php if($hellos->menu == $hello->id)
                            {
                            ?>


                            <td>

                                Sub Menu

                            </td>

                            <td>

                                {{ $hellos->id }}

                            </td>
                            <td>

                                {{ $hellos->submenu }}

                            </td>

                            <td>

                                {{ $hellos->link }}

                            </td>

                            <td>


                                {{ HTML::link('/submenu/edit/' . $hellos->id, '',array('class="edit_icon"')) }}




                                {{ HTML::link('/submenu/delete/' . $hellos->id, '',array('class="delete_icon"')) }}

                            </td>


                            <?php
                            }


                            ?>


                        </tr>
                        @endforeach
                        </tr>



                    @endforeach
            </table>
        </div>


    </div>




@endsection
