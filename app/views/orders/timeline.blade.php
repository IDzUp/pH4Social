@layout(layouts.admin)

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Timeline </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/admin">Dashboard</a></li>
                    <li class="active"><span class="glyphicon glyphicon-user"></span> Timeline</li>

                </ol>

                <div class="pull-right">

                {{ Form:: open(array('url' => 'searchtimeline' , 'method' => 'get','class' => 'navbar-form navbar-left')) }} <!--contact_request is a router from Route class-->
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
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Timeline</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>City</th>
                                <th>Sex</th>
                                <th>Phone</th>
                                <th>Country</th>
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
                                    <td>

                                        {{ $hello->phone }}

                                    </td>
                                    </td>
                                    <td>

                                        {{ $hello->location }}

                                    </td>
                                    <td>


                                        <a target="_blank"
                                           href="{{ asset('/index.php') }}/profileopen/{{$hello->uname}}">SHOW
                                            TIMELINE</a>
                                    <!--
                        {{ HTML::link('delete/' . $hello->id, '',array('class="delete_icon"')) }} -->


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
