@layout(layouts.admin)

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Pages </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/admin">Dashboard</a></li>
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/createpage">Create Pages</a>
                    </li>
                    <li class="active"><span class="glyphicon glyphicon-user"></span> Pages</li>


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
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Pages</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Unique id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Keyword</th>

                                <th>Published</th>

                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach( $viewpages as $hello)
                                <tr>
                                    <td>

                                        {{ $hello->id }}

                                    </td>

                                    <td>

                                        {{ $hello->title }}

                                    </td>
                                    <td>

                                        {{ $hello->description }}

                                    </td>

                                <!-- <td >

            {{ $hello->password }}

                                        </td> -->
                                    <td>

                                        {{ $hello->keyword }}

                                    </td>
                                    </td>
                                    <td>

                                        {{ $hello->publish }}

                                    </td>

                                    <td>

                                        <a target="_blank"
                                           href="{{ asset('/index.php') }}/page/<?php echo $hello->title ?>"
                                           class="glyphicon glyphicon-eye-open"></a>
                                        {{ HTML::link('pageedit/' . $hello->id, '',array('class="glyphicon glyphicon-pencil"')) }}


                                        <a href="{{ asset('/index.php') }}/pagedelete/<?php echo $hello->id ?>"
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
