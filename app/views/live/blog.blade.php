@layout(layouts.live)

@section('content')



    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-9">
                    <div class="blog-post-area">
                        <h2 class="title text-center">Latest From our Blog</h2>
                        @foreach( array_chunk( $blog->getCollection()->all(),3)  as $hellos)
                            <div class="row">
                                <?php foreach ($hellos as $hello)
                                {
                                ?>


                                <div class="single-blog-post">
                                    <h3>{{$hello->title}}</h3>
                                    <div class="post-meta">
                                        <ul>
                                            <li><i class="fa fa-user"></i>{{$hello->name}}</li>

                                            <li><i class="fa fa-calendar"></i>{{$hello->created_at}}</li>
                                        </ul>
                                        <span>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </span>
                                    </div>
                                    <a href="">
                                        <img src="../{{$hello->path}}" alt="">
                                    </a>
                                    <p>{{$hello->contents}}</p>
                                    <a class="btn btn-primary" href="">Read More</a>
                                </div>
                                <?php

                                }

                                ?>
                            </div>

                    @endforeach

                    {{ $blog->links() }}


                    <!--
            <div class="pagination-area">
              <ul class="pagination">
                <li><a href="" class="active">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
              </ul>
            </div>
-->


                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection


