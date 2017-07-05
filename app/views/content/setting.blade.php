@layout(layouts.admin)

@section('content')

    <style scoped type="text/css">

        .gallerydelete {
            color: #2bac9e;
            cursor: pointer;
            float: right;
            position: absolute;
            right: -6px;
            top: -15px;
            z-index: 2147483647;
        }
    </style>

    <!-- {{ HTML::script('jsfb/modernizr.custom.js'); }} -->

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Template </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/admin">Dashboard</a></li>


                    <li><i class="fa fa-dashboard"></i> <a href="{{ asset('/index.php') }}/addtemplate">Add Template</a>
                    </li>
                    <li class="active"><span class="glyphicon glyphicon-user"></span> Template</li>


                </ol>


            </div>
        </div>


        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Template</h3>
                    </div>

                    @if(Session::has('success'))
                        <div class="alert alert-success">


                            <strong>{{ Session::get('success') }}</strong>

                        </div>

                    @endif


                    <div class="row">
                        <ul class="grid cs-style-2">
                            @foreach( $admins as $hello)

                                <li>
                                    <figure>

                                        <?php if($hello->publish == 'on' || $hello->other == 'cssfb/mystyle.css')
                                        {


                                        }
                                        else
                                        {
                                        ?>


                                        <a href="{{ asset('/') }}index.php/removetemp/{{$hello->id}}"
                                           class="gallerydelete" id="{{$hello->id}}"><span
                                                    class="glyphicon glyphicon-remove"></span></a>
                                        <?php
                                        }
                                        ?>
                                        <img src="{{ asset('/') }}public/{{$hello->screen}}" width="220" height="220"
                                             alt="">

                                    </figure>
                                    <div class="active_bg <?php if ($hello->publish == null) {
                                        echo 'dactive_bg';
                                    } ?>">
                                        <p><?php if($hello->publish == 'on'){
                                                echo 'Default:-' . $hello->name;
                                            }
                                            else
                                            {
                                            ?>
                                            <a role="button" class="language_btn"
                                               href="{{ asset('/index.php') }}/activated/{{$hello->id}}">Set As
                                                Default {{ $hello->name }}</a>
                                            <?php

                                            } ?></p>
                                    </div>
                                </li>


                            @endforeach

                        </ul>
                    </div>

                </div>

            </div>
        </div>
        <!-- /.row -->


    </div>
    <!-- /.container-fluid -->







@endsection
