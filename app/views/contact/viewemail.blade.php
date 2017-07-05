@layout(layouts.default)

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> View Email </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/admin">Dashboard</a></li>
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/allemail">All Emails</a></li>
                    <li class="active"><span class="glyphicon glyphicon-user"></span> View Email</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> View Email</h3>
                    </div>


                    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
                    <script type="text/javascript">
                        tinymce.init({
                            selector: "textarea",
                            theme: "modern",
                            plugins: [
                                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                                "searchreplace wordcount visualblocks visualchars code fullscreen",
                                "insertdatetime media nonbreaking save table contextmenu directionality",
                                "emoticons template paste textcolor colorpicker textpattern"
                            ],
                            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                            toolbar2: "print preview media | forecolor backcolor emoticons",
                            image_advtab: true,
                            templates: [
                                {title: 'Test template 1', content: 'Test 1'},
                                {title: 'Test template 2', content: 'Test 2'}
                            ]
                        });
                    </script>


                    <div id="center">
                        <!--<h1><span class="log-in"><span class="sign-up">Editing Contact us</span></h1>-->

                        <div id="center" class="resgister_box">
                            <div class="form-group">
                                {{ Form:: label ('email', 'Email Name*' )}} {{$viewemail->email}}


                            </div>

                            <div class="form-group">

                                {{ Form:: label ('subject', 'Subject Name*' )}}  {{$viewemail->subject}}


                            </div>
                            <div class="form-group">

                                {{ Form:: label ('message', 'Message Box' )}}
                                <textarea name="message" class="form-control"/>{{$viewemail->comment}}</textarea>

                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->







@endsection
