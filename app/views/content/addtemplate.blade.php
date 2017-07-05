@layout(layouts.admin)

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Add Template </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/admin">Dashboard</a></li>
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/template">Template List</a>
                    </li>
                    <li class="active"><span class="glyphicon glyphicon-user"></span> Add Template</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Add Template</h3>
                    </div>
                {{ Form:: open(array('url' => 'savetemplate' , 'method' => 'post','id' => 'contactform','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
                    @if($errors->any())

                        {{ implode('', $errors->all('<li>:message</li>'))  }}
                    @endif
                    {{ Form::token() }}

                    <div class="resgister_box">
                        <div class="form-group">
                            <label for="name">Name*</label>
                            <input id="name" name="name" placeholder="Name of template" required="" tabindex="1"
                                   type="text" class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="comment">Upload Css*</label>
                            <input id="image" name="image" placeholder="Image" required="" tabindex="1" type="file">
                        </div>

                        <div class="form-group">
                            <label for="comment">Upload Screenshot</label>
                            <input id="image1" name="image1" placeholder="Image" tabindex="1" type="file">
                        </div>


                        <input name="submit" id="submit" tabindex="5" value="Save" type="submit" class="register_btn">
                        {{ Form:: close() }}<br/>


                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->









@endsection
