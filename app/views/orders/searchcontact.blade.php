@layout(layouts.admin)

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Contact List </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/admin">Dashboard</a></li>
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/contact">Add Contact</a></li>
                    <li class="active"><span class="glyphicon glyphicon-user"></span> Contact List</li>
                </ol>
                <div class="pull-right">

                {{ Form:: open(array('url' => 'searchcontact' , 'method' => 'get','class' => 'navbar-form navbar-left')) }} <!--contact_request is a router from Route class-->
                    @if($errors->any())

                        {{ implode('', $errors->all('<li>:message</li>'))  }}
                    @endif
                    {{ Form::token() }}

                    <div class="form-group">
                        <input type="text" name="searchuser" class="form-control"/>
                    </div>
                    <button type="submit" class="register_btn">Search</button>
                    {{ Form:: close() }}
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Contact List</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Subject</th>

                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $viewcontact as $hello)
                                <tr>
                                    <td>

                                        {{ $hello->id }}

                                    </td>
                                    <td>

                                        {{ $hello->email }}

                                    </td>

                                    <td>

                                        {{ $hello->name }}

                                    </td>
                                    <td>

                                        {{ $hello->subject }}

                                    </td>

                                    <td>

                                        {{ $hello->message }}

                                    </td>
                                    <td>


                                        {{ HTML::link('/contact/edit/' . $hello->id, '',array('class="glyphicon glyphicon-pencil"')) }}




                                        {{ HTML::link('/contact/delete/' . $hello->id, '',array('class="glyphicon glyphicon-remove"')) }}

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
