@layout(layouts.fbhome)

@section('content')

    <section class="title_page">
        <div class="container">
            <div class="row">
                <h2><span class="glyphicon glyphicon-leaf"></span> {{$pages->title}}</h2>
            </div>
        </div>
    </section>
    {{$pages->content}}



    <!-- <section class="about_sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-sm-12 col-md-12">
       <div class="row">
        <div class="col-sm-6 col-md-3">
         <div class="about_box2 center_box1">
          <div class="friend_list_img">
           <img class="img-circle" alt="" src="{{ asset('/') }}/imagesfb/1.jpg">
            </div>
            <div class="caption">
            <h3>Alexander Samokhin</h3>
             <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit.  </p>
            <div class="social_icon">
              <ul>
                <li><a href="#"><img src="{{ asset('/') }}/imagesfb/facebook1.png" alt="" /></a></li>
                <li><a href="#"><img src="{{ asset('/') }}/imagesfb/twitter1.png" alt="" /></a></li>
                <li><a href="#"><img src="{{ asset('/') }}/imagesfb/youtube1.png" alt="" /></a></li>
              </ul>
          </div>
          </div>
        </div>
      </div>
     <div class="col-sm-6 col-md-3">
         <div class="about_box2 center_box1">
          <div class="friend_list_img">
           <img class="img-circle" alt="" src="{{ asset('/') }}/imagesfb/about_img1.jpg">
            </div>
             <div class="caption">
             <h3>Petra Novakova</h3>
            <p> Phasellus vulputate facilisis lectus, non tempus metus efficitur </p>
         <div class="social_icon">
              <ul>
                <li><a href="#"><img src="{{ asset('/') }}/imagesfb/facebook1.png" alt="" /></a></li>
                <li><a href="#"><img src="{{ asset('/') }}/imagesfb/twitter1.png" alt="" /></a></li>
                <li><a href="#"><img src="{{ asset('/') }}/imagesfb/youtube1.png" alt="" /></a></li>
              </ul>
          </div>
          </div>
        </div>
      </div>
        <div class="col-sm-6 col-md-3">
         <div class="about_box2 center_box1">
          <div class="friend_list_img">
           <img class="img-circle" alt="" src="{{ asset('/') }}/imagesfb/4.jpg">
            </div>
            <div class="caption">
            <h3>Emilia Clarke</h3>
              <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit.  </p>
              <div class="social_icon">
              <ul>
                <li><a href="#"><img src="{{ asset('/') }}/imagesfb/facebook1.png" alt="" /></a></li>
                <li><a href="#"><img src="{{ asset('/') }}/imagesfb/twitter1.png" alt="" /></a></li>
                <li><a href="#"><img src="{{ asset('/') }}/imagesfb/youtube1.png" alt="" /></a></li>
              </ul>
          </div>
          </div>
        </div>
      </div>
       <div class="col-sm-6 col-md-3">
         <div class="about_box2 center_box1">
          <div class="friend_list_img">
           <img class="img-circle" alt="" src="{{ asset('/') }}/imagesfb/about_img2.jpg">
            </div>
            <div class="caption">
            <h3>Emilia Clarke</h3>
              <p> Phasellus vulputate facilisis lectus, non tempus metus efficitur </p>
             <div class="social_icon">
              <ul>
                <li><a href="#"><img src="{{ asset('/') }}/imagesfb/facebook1.png" alt="" /></a></li>
                <li><a href="#"><img src="{{ asset('/') }}/imagesfb/twitter1.png" alt="" /></a></li>
                <li><a href="#"><img src="{{ asset('/') }}/imagesfb/youtube1.png" alt="" /></a></li>
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
</section>
<div class="container">
<div class="row">
 <p class="abouttext">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris
     vehicula quam sed rhoncus viverra. Fusce blandit dictum ornare. Maecenas et
     erat eget odio eleifend tristique vel ut dui. Proin congue sem quis ligula scelerisque
     tincidunt. Proin viverra aliquet sem sit amet elementum. Pellentesque et ex mauris. Nam eu
     facilisis risus, at ornare mauris.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
     Aliquam neque urna, venenatis convallis quam et, facilisis vestibulum nunc.  </p>

</div>

</div>

 -->


@endsection
