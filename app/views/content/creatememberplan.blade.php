@layout(layouts.admin)

@section('content')
    <style scoped type="text/css">


        input[type="checkbox"] {
            height: 15px;
            width: 100%;
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {


            $('#admin2').click(function () {


                var value = $('#admin1').attr('checked');

                if (value == "checked") {
                    $('#admin1').attr('checked', false);

                }
                else {

                    $('#admin1').attr('checked', true);
                }

            });


            $('#super2').click(function () {


                var value = $('#super1').attr('checked');

                if (value == "checked") {
                    $('#super1').attr('checked', false);

                }
                else {

                    $('#super1').attr('checked', true);
                }

            });


            $('#member2').click(function () {


                var value = $('#member1').attr('checked');

                if (value == "checked") {
                    $('#member1').attr('checked', false);

                }
                else {

                    $('#member1').attr('checked', true);
                }

            });


            $('#user2').click(function () {


                var value = $('#user1').attr('checked');

                if (value == "checked") {
                    $('#user1').attr('checked', false);

                }
                else {

                    $('#user1').attr('checked', true);
                }

            });


        });


    </script>





    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Create Membership plan </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/admin">Dashboard</a></li>
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/membership">Member List</a>
                    </li>
                    <li class="active"><span class="glyphicon glyphicon-user"></span> Create Membership plan</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Create Membership plan
                        </h3>
                    </div>

                    <div class="editing">

                    {{ Form:: open(array('url' => 'addplan' ,'method' =>'get','class' => 'login')) }} <!--contact_request is a router from Route class-->
                        @if($errors->any())

                            {{ implode('', $errors->all('<div class="valid">:message</div>'))  }}
                        @endif
                        {{ Form::token() }}

                        <div id="center" class="resgister_box">
                            <!--<h1><span class="sign-up">Add Users</span> </h1>-->

                            <form class="form-horizontal" role="form">

                                <div class="form-group">
                                    <label> {{ Form:: label ('name', 'Membership Name*' )}} </label>
                                    <input type="text" name="name" required="" class="form-control"/>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 col-md-3">
                                        <div id="f1_container">
                                            <div id="f1_card" class="shadow">
                                                <div class="front face">
                                                    <div class="member_box">
                                                        <h2> Access admins</h2>

                                                        <input type="checkbox" id="admin1" name="removeadmin"
                                                               class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="back face center">
                                                    <div class="member_box">
                                                        <h2> Access admins</h2>
                                                        <input type="checkbox" id="admin2" name="removeadmin"
                                                               class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div id="f1_container">
                                            <div id="f1_card" class="shadow">
                                                <div class="front face">
                                                    <div class="member_box member_box1">
                                                        <h2> Access Super-admins</h2>
                                                        <input type="checkbox" id="super1" name="removesuperadmin"
                                                               class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="back face center">
                                                    <div class="member_box member_box1">
                                                        <h2> Access Super-admins</h2>
                                                        <input type="checkbox" id="super2" name="removesuperadmin"
                                                               class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div id="f1_container">
                                            <div id="f1_card" class="shadow">
                                                <div class="front face">
                                                    <div class="member_box member_box2">
                                                        <h2>Access Membership plan</h2>
                                                        <input type="checkbox" id="member1" name="removemember"
                                                               class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="back face center">
                                                    <div class="member_box">
                                                        <h2> Access Membership plan</h2>
                                                        <input type="checkbox" id="member2" name="removemember"
                                                               class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div id="f1_container">
                                            <div id="f1_card" class="shadow">
                                                <div class="front face">
                                                    <div class="member_box member_box3">
                                                        <h2> Access Users</h2>
                                                        <input type="checkbox" id="user1" name="users"
                                                               class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="back face center">
                                                    <div class="member_box">
                                                        <h2> Access Users</h2>
                                                        <input type="checkbox" id="user2" name="users"
                                                               class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">


                                    {{ Form::submit('Create Member Plan', array('class' => 'register_btn')) }}
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
