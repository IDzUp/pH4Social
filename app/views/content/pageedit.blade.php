@layout(layouts.admin)

@section('content')





    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Pages </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/admin">Dashboard</a></li>

                    <li class="active"><span class="glyphicon glyphicon-user"></span> Edit Pages</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Edit Pages </h3>
                    </div>


                    <div class="editing">

                    {{ Form:: open(array('url' => 'pageupdate' ,'method' =>'get','class' => 'login')) }} <!--contact_request is a router from Route class-->
                        @if($errors->any())

                            {{ implode('', $errors->all('<div class="valid">:message</div>'))  }}
                        @endif
                        {{ Form::token() }}

                        <div id="center" class="resgister_box">
                            <!--<h1><span class="sign-up">Add Users</span> </h1>-->

                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label>{{ Form:: label ('title', 'Title Names*' )}}</label>
                                    <input type="text" name="title" required="" value="{{ $pageedit->title }}"
                                           class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label> {{ Form:: label ('description', 'Description*' )}} </label>
                                    <input type="text" name="description" required=""
                                           value="{{ $pageedit->description }}" class="form-control"/>
                                </div>
                                <input type="hidden" name="id" value="{{ $pageedit->id }}">
                                <div class="form-group">
                                    <label> {{ Form:: label ('keyword', 'Keyword Name*' )}}  </label>
                                    <input type="text" name="keyword" required="" value="{{ $pageedit->keyword }}"
                                           class="form-control"/>
                                </div>

                                <div class="form-group">
                                    <label>  {{ Form:: label ('content', 'Content*' )}}  </label>


                                    <html>
                                    <head>
                                        <title>My test editor - with tinyMCE and PHP</title>
                                        <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
                                        <script type="text/javascript">
                                            tinymce.init({
                                                selector: "textarea#uni",
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

                                        <textarea id="uni" name="content" style="width:100%"></textarea>


                                </div>
                                <div class="form-group">
                                    <label class="checkbox-inline">
                                        <input type="radio" name="publish" value="yes"
                                               <?php if($pageedit->publish == 'yes'){ ?>checked="checked" <?php } ?>/>
                                        Publish </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" name="publish" value="no"
                                               <?php if($pageedit->publish == 'no'){ ?>checked="checked" <?php } ?>/>
                                        Unpublish </label>
                                </div>
                                <div class="form-group">


                                    {{ Form::submit('Update', array('class' => 'register_btn')) }}
                                </div>


                            </form>

                            <div id="oldvalue" style="display:none;">
                                {{ $pageedit->content }}
                            </div>


                        </div>
                        {{ Form:: close() }}<br/>

                    </div>


                </div>

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

    <script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript">
        function myFunction() {
            var token = $("#oldvalue").html();


            $('iframe').get()[0].contentWindow.document.write('' + token + '');

        }


    </script>
    <body onload="myFunction()">
@endsection
