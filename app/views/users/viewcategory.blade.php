@layout(layouts.admin)

@section('content')



    <div class="grid_9">
        <h1 class="newsletter">View Category</h1>
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
                        Content
                    </td>

                    <td>
                        Action
                    </td>
                </tr>
                @foreach( $viewcategory as $hello)
                    <tr>



                    <tr>
                        <td>

                            Main category

                        </td>

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


                            {{ HTML::link('/category/edit/' . $hello->id, '',array('class="edit_icon"')) }}




                            {{ HTML::link('/category/delete/' . $hello->id, '',array('class="delete_icon"')) }}

                        </td>


                        <td>


                            {{ HTML::link('/category/subcategory/' . $hello->id, 'Add sub category') }}

                        </td>

                    </tr>

                    @foreach( $subcategory as $hellos)
                        <tr>


                            <?php if($hellos->category_id == $hello->id)
                            {
                            ?>


                            <td>

                                Sub category

                            </td>

                            <td>

                                {{ $hellos->id }}

                            </td>
                            <td>

                                {{ $hellos->title }}

                            </td>

                            <td>

                                {{ $hellos->content }}

                            </td>


                            <td>


                                {{ HTML::link('/subcategory/edit/' . $hellos->id, '',array('class="edit_icon"')) }}




                                {{ HTML::link('/subcategory/delete/' . $hellos->id, '',array('class="delete_icon"')) }}

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
