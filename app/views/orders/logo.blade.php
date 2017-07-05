@layout(layouts.admin)

@section('content')


    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Logo </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/admin">Dashboard</a></li>
                    <li class="active"><span class="glyphicon glyphicon-user"></span> Logo</li>

                </ol>

                <img width="250" height="50" alt="" src="../<?php echo $logo->path; ?>">


            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Logo</h3>
                    </div>

                {{ Form:: open(array('url' => 'logo/save' , 'method' => 'post','id' => '','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
                    @if($errors->any())

                        {{ implode('', $errors->all('<li>:message</li>'))  }}
                    @endif
                    {{ Form::token() }}

                    <input id="image" name="image" placeholder="Image" required="" tabindex="1" type="file">


                    <input name="submit" id="submit" tabindex="5" value="submit" type="submit">
                    {{ Form:: close() }}<br/>


                </div>

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->






@endsection
