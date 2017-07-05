@layout(layouts.admin)

@section('content')

    <style scoped type="text/css">

        .brk {
            max-width: 100px;
            word-wrap: break-word;
        }

    </style>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Users </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/admin">Dashboard</a></li>
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/adduser">Add User</a></li>
                    <li class="active"><span class="glyphicon glyphicon-user"></span> Users</li>


                </ol>


                @if(Session::has('success'))
                    <div class="alert alert-success">


                        <strong>{{ Session::get('success') }}</strong>

                    </div>

                @endif


                <div class="pull-right">

                {{ Form:: open(array('url' => 'searchuser' , 'method' => 'get','class' => 'navbar-form navbar-left')) }} <!--contact_request is a router from Route class-->
                    @if($errors->any())

                        {{ implode('', $errors->all('<li>:message</li>'))  }}
                    @endif
                    {{ Form::token() }}


                    <div class="form-group">
                        <input type="text" name="searchuser" placeholder="Name Search" class="form-control"/>
                    </div>


                    <div class="form-group">
                        <input type="text" name="searchemail" placeholder="Email Search" class="form-control"/>
                    </div>


                    <div class="form-group">
                        <input type="text" name="searchcity" placeholder="City Search" class="form-control"/>
                    </div>


                    <div class="form-group">
                        <input type="text" name="searchplan" placeholder="Plan Search" class="form-control"/>
                    </div>

                    <div class="form-group">

                        <label class="checkbox-inline">
                            <input type="radio" name="sex" id="" checked="" value="male">Male
                        </label>
                        <label class="checkbox-inline">
                            <input type="radio" name="sex" id="" value="female">Female
                        </label>
                    </div>


                    <button type="submit" style="float:right" class="register_btn">Search</button>


                    {{ Form:: close() }}


                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Users</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>City</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <!--         <th>Country</th> -->
                                <th>IP Address</th>
                                <th>Member Plan</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
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
                                    <td class="brk">

                                        {{ $hello->phone }}

                                    </td>
                                    </td>
                                <!--     <td >

                        {{ $hello->location }}

                                        </td> -->
                                    <td>

                                        {{ $hello->ipaddress }}

                                    </td>

                                    <td>
                                        {{ $hello->plan }}

                                    </td>

                                    <td>


                                        <?php
                                        if(Auth::user()->email == $hello->email)
                                        {
                                        ?>

                                        {{ HTML::link('edit/' . $hello->id, '',array('class="glyphicon glyphicon-pencil"')) }}


                                        <a href="{{ asset('/index.php') }}/delete/<?php echo $hello->id ?>"
                                           onclick="return confirm('Are you sure you want to delete?')"
                                           class="glyphicon glyphicon-remove"></a>

                                        <?php
                                        }
                                        // elseif($permission->removeadmin==null && $hello->plan=='admin')
                                        // {



                                        // }
                                        // elseif($permission->removesuperadmin==null && $hello->plan=='superadmin')
                                        // {


                                        // }

                                        // elseif($permission->users==null && $hello->plan=='member')
                                        // {


                                        // }

                                        else
                                        {

                                        if($plans->removeadmin == 'on' || $plans->removesuperadmin == 'on' || $plans->users == 'on')
                                        {



                                        foreach( $planss as $helloss)
                                        {

                                        if($helloss->name == $hello->plan)
                                        {



                                        if($plans->users == 'on' && $plans->removeadmin == null && $plans->removesuperadmin == null )
                                        {

                                        if($helloss->users == 'on' && $helloss->removeadmin == null && $helloss->removesuperadmin == null )
                                        {


                                        }
                                        elseif($helloss->removeadmin == null && $helloss->removesuperadmin == null )
                                        {

                                        ?>

                                        {{ HTML::link('edit/' . $hello->id, '',array('class="glyphicon glyphicon-pencil"')) }}


                                        <a href="{{ asset('/index.php') }}/delete/<?php echo $hello->id ?>"
                                           onclick="return confirm('Are you sure you want to delete?')"
                                           class="glyphicon glyphicon-remove"></a>

                                        <?php
                                        }
                                        else {


                                        }

                                        }

                                        elseif($plans->removesuperadmin == 'on' && $plans->removeadmin == null && $plans->users == null )
                                        {



                                        if($helloss->removesuperadmin == 'on' && $helloss->removeadmin == null && $helloss->users == null)
                                        {


                                        }
                                        elseif($helloss->removesuperadmin == 'on')
                                        {

                                        ?>

                                        {{ HTML::link('edit/' . $hello->id, '',array('class="glyphicon glyphicon-pencil"')) }}


                                        <a href="{{ asset('/index.php') }}/delete/<?php echo $hello->id ?>"
                                           onclick="return confirm('Are you sure you want to delete?')"
                                           class="glyphicon glyphicon-remove"></a>

                                        <?php
                                        }
                                        else {

                                        }


                                        }

                                        elseif($plans->removesuperadmin == null && $plans->removeadmin == 'on' && $plans->users == null )
                                        {


                                        if($helloss->removesuperadmin == null && $helloss->removeadmin == 'on' && $helloss->users == null)
                                        {


                                        }
                                        elseif($helloss->removeadmin == 'on' && $helloss->removesuperadmin == null)
                                        {

                                        ?>

                                        {{ HTML::link('edit/' . $hello->id, '',array('class="glyphicon glyphicon-pencil"')) }}


                                        <a href="{{ asset('/index.php') }}/delete/<?php echo $hello->id ?>"
                                           onclick="return confirm('Are you sure you want to delete?')"
                                           class="glyphicon glyphicon-remove"></a>

                                        <?php
                                        }
                                        else {


                                        }



                                        }


                                        elseif($plans->removesuperadmin == 'on' && $plans->removeadmin == 'on' && $plans->users == 'on' )
                                        {




                                        ?>

                                        {{ HTML::link('edit/' . $hello->id, '',array('class="glyphicon glyphicon-pencil"')) }}


                                        <a href="{{ asset('/index.php') }}/delete/<?php echo $hello->id ?>"
                                           onclick="return confirm('Are you sure you want to delete?')"
                                           class="glyphicon glyphicon-remove"></a>

                                        <?php




                                        }

                                        elseif($plans->removesuperadmin == 'on' && $plans->removeadmin == 'on' && $plans->users == null )
                                        {


                                        if($helloss->removesuperadmin == 'on' && $helloss->removeadmin == 'on' && $helloss->users == null)
                                        {

                                        }
                                        elseif($helloss->removeadmin == 'on' || $helloss->removesuperadmin == 'on' && $helloss->users == null )
                                        {

                                        ?>

                                        {{ HTML::link('edit/' . $hello->id, '',array('class="glyphicon glyphicon-pencil"')) }}


                                        <a href="{{ asset('/index.php') }}/delete/<?php echo $hello->id ?>"
                                           onclick="return confirm('Are you sure you want to delete?')"
                                           class="glyphicon glyphicon-remove"></a>

                                        <?php
                                        }
                                        else {

                                        }



                                        }



                                        elseif($plans->removesuperadmin == 'on' && $plans->removeadmin == null && $plans->users == 'on' )
                                        {

                                        if($helloss->removesuperadmin == 'on' && $helloss->removeadmin == null && $helloss->users == 'on')

                                        {


                                        }
                                        elseif(($helloss->removesuperadmin == 'on') || ($helloss->removeadmin == null && $helloss->removesuperadmin == null && ($helloss->users == null || $helloss->users == 'on')))

                                        {

                                        ?>

                                        {{ HTML::link('edit/' . $hello->id, '',array('class="glyphicon glyphicon-pencil"')) }}


                                        <a href="{{ asset('/index.php') }}/delete/<?php echo $hello->id ?>"
                                           onclick="return confirm('Are you sure you want to delete?')"
                                           class="glyphicon glyphicon-remove"></a>

                                        <?php
                                        }
                                        else {

                                        }


                                        }
                                        elseif($plans->removesuperadmin == null && $plans->removeadmin == 'on' && $plans->users == 'on' )
                                        {


                                        if($helloss->removesuperadmin == null && $helloss->removeadmin == 'on' && $helloss->users == 'on')
                                        {


                                        }

                                        elseif(($helloss->removeadmin == 'on' && $helloss->removesuperadmin == null) || ($helloss->removesuperadmin == null && $helloss->removeadmin == null && ($helloss->users == null || $helloss->users == 'on')))
                                        {

                                        ?>

                                        {{ HTML::link('edit/' . $hello->id, '',array('class="glyphicon glyphicon-pencil"')) }}


                                        <a href="{{ asset('/index.php') }}/delete/<?php echo $hello->id ?>"
                                           onclick="return confirm('Are you sure you want to delete?')"
                                           class="glyphicon glyphicon-remove"></a>

                                        <?php
                                        }
                                        else {

                                        }


                                        }





                                        else {
                                            echo 'no';

                                        }















                                        }



                                        }
                                        }


















                                        }


                                        ?>


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
    </div>
    <!-- /.container-fluid -->












@endsection
