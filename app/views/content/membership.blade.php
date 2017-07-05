@layout(layouts.admin)

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Membership </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/admin">Dashboard</a></li>


                    <?php
                    if($pick->removemember == 'on')
                    {

                    ?>

                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/creatememberplan">Create
                            Membership Plan</a></li>
                    <?php
                    }
                    ?>
                    <li class="active"><span class="glyphicon glyphicon-user"></span> Membership</li>


                </ol>
                @if(Session::has('msg'))
                    <div class="alert alert-success">


                        <strong>{{ Session::get('msg') }}</strong>

                    </div>

                @endif

            </div>
        </div>


    <?php
    if($pick->removemember == 'on')
    {

    ?>



    <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Membership</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Membership Name</th>
                                <th>Access Admin</th>
                                <th>Access Super-Admin</th>
                                <th>Access Plans</th>
                                <th>Acess users</th>

                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach( $admins as $hello)
                                <tr>
                                    <td>

                                        {{ $hello->name }}

                                    </td>
                                    <td>

                                        {{ $hello->removeadmin }}

                                    </td>

                                <!-- <td >

            {{ $hello->password }}

                                        </td> -->
                                    <td>

                                        {{ $hello->removesuperadmin }}

                                    </td>
                                    <td>

                                        {{ $hello->removemember }}

                                    </td>
                                    </td>
                                    <td>

                                        {{ $hello->users }}

                                    </td>

                                    <td>


                                        {{ HTML::link('editmem/' . $hello->id, '',array('class="glyphicon glyphicon-pencil"')) }}


                                        <a href="{{ asset('/index.php') }}/deletemem/<?php echo $hello->id ?>"
                                           onclick="return confirm('Are you sure you want to delete?')"
                                           class="glyphicon glyphicon-remove"></a>

                                    </td>


                                </tr>



                            @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
        <!-- /.row -->


        <?php

        }

        else
        {

        ?>


        <h1> Not Permission </h1>


        <?php





        }
        ?>


    </div>
    <!-- /.container-fluid -->












@endsection
