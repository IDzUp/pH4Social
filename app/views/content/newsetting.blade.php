@layout(layouts.admin)

@section('content')



    {{ HTML::script('jsfb/modernizr.custom.js'); }}
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Settings </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/admin">Dashboard</a></li>


                    <li class="active"><span class="glyphicon glyphicon-user"></span> Settings</li>


                </ol>


            </div>
        </div>


        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Settings</h3>
                    </div>
                    @if(Session::has('success'))
                        <div class="alert alert-success">


                            <strong>{{ Session::get('success') }}</strong>

                        </div>

                    @endif


                </div>


                <img width="250" height="50" alt="" src="{{ asset('/') }}public/<?php echo $logo->path; ?>">

            {{ Form:: open(array('url' => 'logo/save' , 'method' => 'post','id' => '','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
                @if($errors->any())

                    {{ implode('', $errors->all('<li>:message</li>'))  }}
                @endif
                {{ Form::token() }}

                <input id="image" name="image" placeholder="Image" required="" tabindex="1" type="file">


                <input name="submit" id="submit" tabindex="5" value="submit" type="submit">
                {{ Form:: close() }}<br/>


                {{ Form:: open(array('url' => 'updatesetting' ,'method' =>'get','class' => 'login')) }} <!--contact_request is a router from Route class-->
                @if($errors->any())

                    {{ implode('', $errors->all('<div class="valid">:message</div>'))  }}
                @endif
                {{ Form::token() }}

                <div id="center" class="resgister_box">
                    <!--<h1><span class="sign-up">Add Users</span> </h1>-->

                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label>{{ Form:: label ('title', 'Title*' )}}</label>
                            <input type="text" required="" name="title" value="{{$set->title}}" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label> {{ Form:: label ('meta', 'Meta Tag' )}} </label>
                            <input type="text" name="meta" value="{{$set->meta}}" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label> {{ Form:: label ('description', 'Description' )}} </label>
                            <input type="text" name="description" value="{{$set->description}}" class="form-control"/>
                        </div>


                        <div class="form-group">
                            <label> {{ Form:: label ('copyright', 'Copyright*' )}}  </label>
                            <input type="text" required="" value="{{$set->copyright}}" name="copyright" value=""
                                   class="form-control"/>
                        </div>


                        <div class="form-group">


                            {{ Form::submit('Update', array('class' => 'register_btn')) }}
                        </div>


                    </form>


                </div>
                {{ Form:: close() }}<br/>


            </div>
        </div>
        <!-- /.row -->


    </div>
    <!-- /.container-fluid -->







@endsection
