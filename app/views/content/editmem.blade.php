@layout(layouts.admin)

@section('content')

    <style scoped type="text/css">


        input[type="checkbox"] {
            height: 15px;
            width: 50%;
            float: left;
            border-top: 0 none !important;
            box-shadow: none;
        }

        .resgister_box label {
            font-weight: normal;
            float: left;
            width: 50%;
        }

        .form-group {
            margin-bottom: 15px;
            clear: both;
            overflow: hidden;
        }
    </style>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Member </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/admin">Dashboard</a></li>
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/membership">Member List</a>
                    </li>
                    <li class="active"><span class="glyphicon glyphicon-user"></span> Edit Member</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Edit Member </h3>
                    </div>

                    <div class="editing">

                    {{ Form:: open(array('url' => 'updatemem' ,'method' =>'get','class' => 'login')) }} <!--contact_request is a router from Route class-->
                        @if($errors->any())

                            {{ implode('', $errors->all('<div class="valid">:message</div>'))  }}
                        @endif
                        {{ Form::token() }}

                        <div id="center" class="resgister_box">
                            <!--<h1><span class="sign-up">Add Users</span> </h1>-->

                            <form class="form-horizontal" role="form">


                                <div class="form-group">
                                    <label> {{ Form:: label ('name', 'Membership Name*' )}} </label>
                                    <input type="text" name="name" required="" value="{{$edit->name}}"
                                           class="form-control"/>
                                    <input type="hidden" name="id" required="" value="{{$edit->id}}"/>
                                </div>

                                <div class="form-group">
                                    <label> {{ Form:: label ('removeadmin', 'Access admins' )}}  </label>
                                    <input type="checkbox" <?php if($edit->removeadmin == 'on'){ ?>checked=""
                                           <?php } ?> name="removeadmin" class="form-control"/>
                                </div>


                                <div class="form-group">
                                    <label> {{ Form:: label ('removesuperadmin', 'Access Super-admins' )}}  </label>
                                    <input type="checkbox" <?php if($edit->removesuperadmin == 'on'){ ?>checked=""
                                           <?php } ?> name="removesuperadmin" class="form-control"/>
                                </div>

                                <div class="form-group">
                                    <label> {{ Form:: label ('removemember', 'Access Membership plan' )}}  </label>
                                    <input type="checkbox" <?php if($edit->removemember == 'on'){ ?>checked=""
                                           <?php } ?> name="removemember" class="form-control"/>
                                </div>


                                <div class="form-group">
                                    <label> {{ Form:: label ('users', 'Access Users' )}}  </label>
                                    <input type="checkbox" <?php if($edit->users == 'on'){ ?>checked=""
                                           <?php } ?> name="users" class="form-control"/>
                                </div>


                                <div class="form-group">


                                    {{ Form::submit('Update', array('class' => 'register_btn')) }}
                                </div>


                            </form>


                        </div>
                        {{ Form:: close() }}<br/>

                    </div>


                </div>

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->


@endsection
