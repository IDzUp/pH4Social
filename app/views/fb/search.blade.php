@layout(layouts.fb)

@section('content')





    <section class="profile_sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-sm-8 col-md-9">
                    <div class="search_fri">
                        <div class="friend_box">


                            @foreach( $outputs as $hellos)
                                <div class="friend_img">


                                    <img src="{{ asset('/') }}<?php  echo $hellos['profilephoto']; ?>" width="63"
                                         height="78"/>


                                </div>
                            @endforeach


                        </div>
                        <div class="address_box">
                            @foreach( $search as $hello)



                                <div class="address_text">
                                    <a href="{{ asset('/index.php') }}/profileopen/{{$hello->uname}}">
                                        <button class="pull-right like_btn" type="button">

                                            <span class="glyphicon glyphicon-eye-open"></span> View Profile
                                        </button>
                                    </a>
                                    <h4>{{$hello->name}}</h4>
                                    <span class="glyphicon glyphicon-map-marker"></span> {{$hello->city}}
                                    , {{$hello->location}}

                                </div>
                            @endforeach

                            <?php if (!$search) {

                                echo '<h1> No Result Found</h1>';
                            }

                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-xs-12">
                    <div class="thumbnail add_box">
                        <h2>Advertise Here</h2>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>


@endsection
