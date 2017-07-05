@layout(layouts.admin)

@section('content')



    {{ HTML::script('jsfb/modernizr.custom.js'); }}
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Select language </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/admin">Dashboard</a></li>


                    <li class="active"><span class="glyphicon glyphicon-user"></span> Select Your Language</li>


                </ol>


            </div>


        </div>


        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">

                @if(Session::has('success'))
                    <div class="alert alert-success">


                        <strong>{{ Session::get('success') }}</strong>

                    </div>

                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Default
                            Language <?php echo $set; ?></h3>

                    </div>

                    <div class="row">
                        <div class="">

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <div class="countres">
                                            <ul>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/en">English</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/de">German</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/fr">France</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/bg">Bulgarian</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/zh">Chinese</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/vi">Vietnamese</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/nl">Dutch</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/pt">Portuguese</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <div class="countres">
                                            <ul>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/es">Spanish</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/bs">Bosnian</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/ar">Arabic</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/ca">Catalan</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/cs">Czech</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/da">Danish</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/el">Greek</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/fa">Persian</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <div class="countres">
                                            <ul>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/fi">Finnish</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/he">Hebrew</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/hu">Hungarian</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/id">Indonesian</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/it">Italian</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/ja">Japanese</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/km">Khmer</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/ko">Korean</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <div class="countres">
                                            <ul>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/mk">Macedonian</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/nb">Norwegian</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/hi">Hindi</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/sv">Swedish</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/th">Thai</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/tr">Turkish</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/ru">Russian</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('/index.php') }}/addlanguage/zu">Zulu</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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
