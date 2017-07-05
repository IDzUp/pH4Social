@layout(layouts.admin)

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add Member </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/admin">Dashboard</a></li>
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/membership">Member List</a>
                    </li>
                    <li class="active"><span class="glyphicon glyphicon-user"></span> Add Member</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Add Member </h3>
                    </div>
                    <?php

                    function generateRandomString($length = 10)
                    {
                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $randomString = '';
                        for ($i = 0; $i < $length; $i++) {
                            $randomString .= $characters[rand(0, strlen($characters) - 1)];
                        }
                        return $randomString;
                    }

                    ?>

                    <div class="editing">

                    {{ Form:: open(array('url' => 'getmembers' ,'method' =>'get','class' => 'login')) }} <!--contact_request is a router from Route class-->
                        @if($errors->any())

                            {{ implode('', $errors->all('<div class="valid">:message</div>'))  }}
                        @endif
                        {{ Form::token() }}

                        <div id="center" class="resgister_box">
                            <!--<h1><span class="sign-up">Add Users</span> </h1>-->

                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label>{{ Form:: label ('email', 'Email Names*' )}}</label>
                                    <input type="text" name="email" required="" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label> {{ Form:: label ('name', 'User Name*' )}} </label>
                                    <input type="text" name="name" required="" class="form-control"/>
                                </div>

                                <div class="form-group">
                                    <label> {{ Form:: label ('city', 'City Name*' )}}  </label>
                                    <input type="text" name="city" required="" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>  {{ Form:: label ('password', 'Password*' )}}  </label>
                                    <input type="password" name="password" required="" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label class="checkbox-inline">
                                        <input type="radio" name="sex" value="male" checked="checked"/>
                                        Male </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" name="sex" value="female"/>
                                        Female </label>
                                </div>
                                <div class="form-group">
                                    <label>  {{ Form:: label ('member', 'Membership*' )}}  </label>
                                    <select name="member">
                                        <option value="admins">Admin</option>
                                        <option value="moderator">Moderator</option>


                                    </select>

                                </div>


                                <div class="form-group">
                                    <input type="hidden" value="<?php echo $random = generateRandomString(); ?>"
                                           name="rand">


                                    {{ Form::submit('Register', array('class' => 'register_btn')) }}
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
