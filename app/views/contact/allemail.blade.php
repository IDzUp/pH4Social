@layout(layouts.admin)

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> All Emails </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/admin">Dashboard</a></li>
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/emails">Email</a></li>
                    <li class="active"><span class="glyphicon glyphicon-user"></span> All Emails</li>
                </ol>

                @if(Session::has('msg'))
                    <div class="alert alert-success">


                        <strong>{{ Session::get('msg') }}</strong>

                    </div>

                @endif


            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> All Emails</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>To</th>
                                <th>From</th>
                                <th>Subject</th>

                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $allemail as $hello)
                                <tr>
                                    <td>

                                        {{ $hello->id }}

                                    </td>
                                    <td>

                                        {{ $hello->email }}

                                    </td>
                                    <td>

                                        {{ $hello->from }}

                                    </td>


                                    <td>

                                        {{ $hello->subject }}

                                    </td>

                                    <td>


                                    <!--                         {{ HTML::link('/contact/delete/' . $hello->id, '',array('class="glyphicon glyphicon-remove"')) }} -->
                                        <a href="{{ asset('/index.php') }}/mail/open/<?php echo $hello->id ?>"
                                           class="glyphicon glyphicon-eye-open"></a>
                                        <a href="{{ asset('/index.php') }}/mail/delete/<?php echo $hello->id ?>"
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
    </div>
    <!-- /.container-fluid -->












@endsection
