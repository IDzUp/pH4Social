@layout(layouts.admin)

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Add Contact </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/admin">Dashboard</a></li>
                    <li class="active"><span class="glyphicon glyphicon-user"></span> Add Contact</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Add Contact</h3>
                    </div>

                {{ Form:: open(array('url' => 'contact/savecontact' , 'method' => 'get','id' => 'contactform')) }} <!--contact_request is a router from Route class-->
                    @if($errors->any())

                        {{ implode('', $errors->all('<li>:message</li>'))  }}
                    @endif
                    {{ Form::token() }}
                    <div class="resgister_box">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" name="name" placeholder="First and last name" required="" tabindex="1"
                                   type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" name="email" placeholder="example@domain.com" required="" tabindex="2"
                                   type="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input name="test" value="0" type="hidden">
                            <label for="Subject">Subject</label>
                            <input id="subject" name="subject" placeholder="Subject" required="" tabindex="2"
                                   type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="comment">Your Message</label>
                            <textarea name="comment" id="comment" tabindex="4" class="form-control"></textarea>
                        </div>

                        <input name="submit" id="submit" tabindex="5" value="Submit" type="submit" class="register_btn">
                        {{ Form:: close() }}<br/>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->









@endsection
