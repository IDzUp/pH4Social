@layout(layouts.default)

@section('content')
    <style scoped type="text/css">
        table {
            width: 100%;
        }

        table tr td {
            padding: 8px;
            border: solid 1px #ddd;
        }

        table tr:hover {
            background: #f5f5f5;
        }
    </style>

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> View Contact Us </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/admin">Dashboard</a></li>
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/viewcontact">Contact us</a>
                    </li>
                    <li class="active"><span class="glyphicon glyphicon-user"></span> View Contact Us</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> View Contact Us</h3>
                    </div>


                {{ Form:: open(array('url' => 'updatecon' , 'method' => 'put')) }} <!--contact_request is a router from Route class-->
                    @if($errors->any())

                        {{ implode('', $errors->all('<li>:message</li>'))  }}
                    @endif
                    {{ Form::token() }}

                    <div id="center">
                        <!--<h1><span class="log-in"><span class="sign-up">Editing Contact us</span></h1>-->

                        <div id="center" class="resgister_box">
                            <div class="form-group">
                                <table>
                                    <tr>
                                        <td> {{ Form:: label ('email', 'Email Name*' )}} </td>
                                        <td>{{$contactedit->email}}
                                            {{ Form::hidden('id',$contactedit->id)}}</td>

                                    </tr>

                                    <tr>
                                        <td>     {{ Form:: label ('name', 'Name*' )}} </td>
                                        <td>{{$contactedit->name}}</td>

                                    </tr>


                                    <tr>
                                        <td> {{ Form:: label ('subject', 'Subject Name*' )}}  </td>
                                        <td>{{$contactedit->subject}}</td>

                                    </tr>


                                    <tr>
                                        <td>  {{ Form:: label ('message', 'Message Box' )}}   </td>
                                        <td>{{$contactedit->message}}</td>

                                    </tr>


                                </table>


                            </div>

                        </div>
                        {{ Form:: close() }}
                    </div>
                </div>

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->







@endsection
