@layout(layouts.admin)

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Email</h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/admin">Dashboard</a></li>

                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/allemail">All Emails</a></li>

                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/emails">Emails</a></li>

                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/contemplate">Contact
                            Template</a></li>


                    <li class="active"><span class="glyphicon glyphicon-user"></span>Confirmation Email Template</li>


                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Email</h3>
                    </div>

                {{ Form:: open(array('url' => 'confirmmail/send' , 'method' => 'get','id' => 'contactform')) }} <!--contact_request is a router from Route class-->
                    @if($errors->any())

                        {{ implode('', $errors->all('<li>:message</li>'))  }}
                    @endif
                    {{ Form::token() }}
                    <div class="resgister_box">
                        <div class="form-group">
                            <label for="email">Use name variable like < NAME ></label>

                        </div>

                        <div class="form-group">
                            <label for="email">Use link variable like < LINK ></label>

                        </div>

                        <div class="form-group">

                            <label for="Subject">Subject</label>
                            <input id="subject" name="subject" value="<?php echo $confirmmail->subject; ?>"
                                   placeholder="Subject" required="" tabindex="2" type="text" class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="email">From</label>
                            <input id="email" name="from" value="<?php echo $confirmmail->from; ?>"
                                   placeholder="example@domain.com" required="" tabindex="2" type="email"
                                   class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="comment">Your Template design</label>


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


                            <textarea name="comment" id="comment" tabindex="4"
                                      class="form-control"><?php echo $confirmmail->comment; ?></textarea>
                        </div>

                        <input name="submit" id="submit" tabindex="5" value="Save Template" type="submit"
                               class="register_btn">
                        {{ Form:: close() }}<br/>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->









@endsection
