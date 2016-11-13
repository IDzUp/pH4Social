@layout(layouts.fbhome)

@section('content')

<section>
  <div class="container">
    <div class="row">
      <div class="cover">


@foreach( $profile as $hello)

<img src="../{{$hello->cover}}" width="1170" height="334" alt=""  class="img-rounded"/>

@endforeach

<?php if($photos==0)
{
$sex = Auth::user()->sex;
  if($sex=='male')

  {

    $males='male_cover.jpg';
  }
  else
  {

    $males='female_cover.jpg';
  }
?>


<img src="{{ asset('/') }}imagesfb/{{$males}}" width="100%" height="334" alt=""  class="img-rounded img-responsive"/>
<?php
}

?>


      </div>
      <div class="addyour">
        <ul>
          <li>


 {{ Form:: open(array('url' => 'fbcovermedia/save' , 'method' => 'post','id' => 'contactform','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
  @if($errors->any())

 {{ implode('', $errors->all('<li>:message</li>'))  }}
@endif
    {{ Form::token() }}
<label id="coversimage">

                <input id="coversimage" name="image"  required="" tabindex="1" type="file" onchange="document.getElementById('submits').click();">

</label>
            <input id="rand" name="rand" type="hidden" value="<?php echo $email = Auth::user()->rand;?>">

                <input name="submit" id="submits" tabindex="5" value="submit" type="submit" style="display:none;">
      {{ Form:: close() }}

      <!--     <a href="#">Add a Cover Photo</a> -->




          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section class="user_sec">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-3 col-sm-3">
        <div class="row">
          <div class="bg_nav">
          <div class="nav">
            <div class="userphoto">

@foreach( $profile as $hello)
<img src="../{{$hello->path}}" alt="" class="img-circle" width="170" height="170"/>

@endforeach

<?php if($photos==0)
{
$sex = Auth::user()->sex;
  if($sex=='male')

  {

    $male='male.jpg';
  }
  else
  {

    $male='female.jpg';
  }
?>


<img src="{{ asset('/') }}imagesfb/{{$male}}" width="170" height="170" alt=""  class="img-rounded"/>
<?php
}

?>



            </div>
                  <style>
label#imagess {

width: 16px;

height: 14px;

background: url('../imagesfb/cameras.jpg') 0 0 no-repeat;

border:none;

margin: 13px 12px;

font-weight:bold;
 background-size: 16px 14px;

}

input#imagesss{

  position: absolute;
  visibility: hidden;
}



label#imagessvideo {

width:16px;

height: 14px;

background: url('../imagesfb/video1.jpg') 0 0 no-repeat;

border:none;

margin: 13px 12px;

font-weight:bold;
 background-size: 16px 14px;

}

input#imagessvideo{

  position: absolute;
  visibility: hidden;
}


label#coverimage {

width: 196px;

height: 35px;

background: url('../imagesfb/photo_text.jpg') 0 0 no-repeat;

border:none;

padding: 0 4px 8px 0;

font-weight:bold;
background-size: 195px 47px;

cursor: pointer;

}

label#coverimage:hover {

width: 196px;

height: 35px;

cursor: pointer;

background: url('../imagesfb/photo_text_hover.jpg') 0 0 no-repeat;

border:none;

padding: 0 4px 8px 0;

font-weight:bold;
 background-size: 195px 47px;

}


input#coverimage{

  position: absolute;
  visibility: hidden;
}

label#coversimage {

width: 100%;

height: 35px;

background: url('../imagesfb/add_cover.jpg') 0 0 no-repeat;

border:none;

padding: 0 4px 8px 0;

font-weight:bold;
 background-size: 100% 100%;

}

label#coversimage:hover {

width: 100%;

height: 35px;

background: url('../imagesfb/add_cover_hover.jpg') 0 0 no-repeat;

border:none;

padding: 0 4px 8px 0;

font-weight:bold;
background-size: 100% 100%;

cursor: pointer;

}

input#coversimage{

  position: absolute;
  visibility: hidden;
}

</style>
            <ul>
              <li>


    {{ Form:: open(array('url' => 'fbmedia/save' , 'method' => 'post','name' => 'my_form','id' => 'my_form','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
  @if($errors->any())

 {{ implode('', $errors->all('<li>:message</li>'))  }}
@endif
    {{ Form::token() }}



                <label id="coverimage">
          <input id="coverimage" name="image" required="" tabindex="1" type="file" onchange="document.getElementById('submit').click();">
                </label>

          <input id="rand" name="rand" type="hidden" value="<?php echo $email = Auth::user()->rand;?>">






                <input name="submit" id="submit" tabindex="5" value="submit" type="submit" style="display:none;">
      {{ Form:: close() }}
              </li>

              <!-- <li><a href="#"><span class="glyphicon glyphicon-facetime-video"></span> Upload Videos</a></li> -->
              <li><a href="{{ asset('/index.php/') }}/friendlist"><span class="glyphicon glyphicon-tasks"></span> Friends List</a> </li>
              <li><a href="{{ asset('/index.php/') }}/gallery"><span class="glyphicon glyphicon-calendar"></span> Gallery</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-music"></span> Upload a Song</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Create a Listing</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-star"></span> Create a Page</a></li>
            </ul>
          </div>
          </div>
        </div>
      </div>
      <div class="col-lg-7 col-md-6 col-sm-9">
        <div class="border">
          <!-- Nav tabs -->
                     {{ Form:: open(array('url' => 'fbpost/save' , 'method' => 'post','id' => 'contactform','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
  @if($errors->any())

 {{ implode('', $errors->all('<li>:message</li>'))  }}
@endif
    {{ Form::token() }}
          <ul class="nav nav-tabs" role="tablist">
            <li class="active">
              <h3 class="share">Share</h3>
            </li>
            <li class="active"> <a href="#home" role="tab" data-toggle="tab"> <span class="glyphicon glyphicon-comment"></span> </a> </li>
            <li> <a href="#profile" role="tab" data-toggle="tab"> <span class="glyphicon glyphicon-map-marker"></span> </a> </li>
            <li> <span class="">

             <label id="imagess"><input id="imagesss" name="image"  type="file"></label>
             </span>


             </li>

                 <li> <span class="">

             <label id="imagessvideo"><input id="imagessvideo" name="imagessvideo"  type="file"></label>
             </span>


             </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">


            <div class="tab-pane active" id="home">
              <textarea required="" name="post" class="form-control" rows="3"></textarea>
            </div>

            <!--     <input id="image" name="image" placeholder="Image" tabindex="1" type="file">  -->
                <input id="rand" name="rand" type="hidden" value="<?php echo $email = Auth::user()->rand;?>">




    <!--         <div class="tab-pane" id="profile">
              <textarea class="form-control" rows="3"></textarea>
            </div>
            <div class="tab-pane" id="messages">
              <textarea class="form-control" rows="3"></textarea>
            </div> -->
          </div>
          <div class="col-lg-12">
            <div class="pull-right padding2"> <span class="dropdown ">
             <!--  <button class="friend_btn  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"><span class="glyphicon glyphicon-globe"></span> Friends <span class="caret"></span></button>
              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
              </ul>
              </span> -->





              <button name="submit" id="submit" class="all_btn" type="submit">Submit</button>
                <br/>
            </div>
          </div>
          <div class="clear"></div>
              {{ Form:: close() }}
        </div>
        <br/>



        <span class="hr_bor"></span>





<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">

var ajax_online = function() {

var token =  $("input[id=userid]").val();
 $.ajax({

    type: "GET",
    url: "{{ asset('') }}/index.php/onlineuser/"+token,
    data: '',
    dataType: 'json',
    cache: false,
    success: function(data)
    {



          var ids='#chatmessenger ul li';
          $(''+ids+'').removeClass("yourClass");

      for(i=0; i< Object.keys(data).length; i++)
           {


            var id='li#online'+data[i].userrand;
            $(''+id+'').addClass("yourClass");


           }




    }
    });


return false;


};

var intervalss = 60 * 60 * 1; // where X is your every X minutes

setInterval(ajax_online, intervalss);




var onlinech = function() {


//var token =  $("input[name=getid]").val();


var nb = $('.openbox').length;


for(var i=0; i<nb; i++)
{

var getval='.openbox:eq('+i+')';


var uniid=$(''+getval+'').attr("id");

 $.ajax({

    type: "GET",
    url: "{{ asset('') }}/index.php/messtext/"+uniid,
    data: '',
    dataType: 'json',
    cache: false,
    success: function(data)
    {

   var blankids='#uptextid'+data[0].idss;
   $(''+blankids+'').html('');
          for(var i=0; i < Object.keys(data).length; i++)
           {


if(data[i].rand==data[i].randuser)
{
var datas='<div class="media border-bottom margin-none bg-gray pull-right" id="messagebox"><a class="pull-right innerAll" href=""><img width="50" class="media-object" src="{{ asset('') }}/'+data[i].mainuserprofile+'" style="width: 10px; height: 10px; display: block; margin-left: auto; margin-right: auto;"></a><div class="media-body innerTB pull-right"><a class="strong text-inverse" href="">'+data[i].user+'</a>  <small class="text-muted ">wrote on '+data[i].timess+'</small> <a class="text-small" href=""></a><div>'+data[i].chat+'</div></div></div><div class="clearfix"></div>';
var blankid='#uptextid'+data[i].idss;
$(''+blankid+'').append(datas);

}
else
{

var datas='<div class="media border-bottom margin-none bg-gray pull-left"><a class="pull-left innerAll" href=""><img width="50" class="media-object" src="{{ asset('') }}/'+data[i].otheruserprofile+'" style="width: 10px; height: 10px; display: block; margin-left: auto; margin-right: auto;"></a><div class="media-body innerTB"><a class="strong text-inverse" href="">'+data[i].user+'</a>  <small class="text-muted ">wrote on '+data[i].timess+'</small> <a class="text-small" href=""></a><div>'+data[i].chat+'</div></div></div><div class="clearfix"></div> ';
var blankid='#uptextid'+data[i].idss;
$(''+blankid+'').append(datas);

}


            }





    }
    });


}






return false;


};

var intervalss = 60 * 60 * 1; // where X is your every X minutes

setInterval(onlinech, intervalss);










$(document).ready(function()
{

$(".onlineclick").click(function(e)
{
      e.preventDefault();

var uniid=$(this).attr("name");

var comment = $('#chat'+uniid+'').val();

if(comment=='')
{
alert('Required comment section');
}
else
{

  var comment = $('#chat'+uniid+'').val();
  var user = $('#user'+uniid+'').val();
  var otheruser = $('#otheruser'+uniid+'').val();
  var name = $('#name'+uniid+'').val();
  var othername = $('#othername'+uniid+'').val();

 $.ajax({

    type: "GET",
    url: "{{ asset('/') }}/index.php/messagesonline",
    data: {user: user, comment: comment, otheruser: otheruser, name: name, othername: othername},
    dataType: 'json',
    cache: false,
    success: function(data)
    {

   $('textarea[name="chat"]').val('');

    }
    });
}



});
















$(".likes").click(function()
{
var id=$(this).attr("id");
var name=$(this).attr("name");
//var dataString = 'id='+ id + '&name='+ name;

//var dataString = 'id='+ id;


 $.ajax({

    type: "GET",
    url: "{{ asset('/') }}/index.php/rating/"+name,
    data: '',
    dataType: 'json',
    cache: false,
    success: function(data)
    {

     for(i=0; i  <Object.keys(data).length; i++)
                {



    var id='span#countlike'+data[i].idss;


    $(id).html(data[i].likes);



                }






    }
    });

});




$(".openbox").click(function()
{



var id=$(this).attr("id");

var len=$('.allchatbox:visible').length;



var tot=len*260;

if(len==0)
{




var divs='#boxs'+id;


      $(''+divs+'').css({




    "background": "none repeat scroll 0 0 white",
    "border": "1px solid grey",
    "border-radius": "5px",
    "bottom": "20px",
    "display": "block",
    "height": "212px",
    "padding": "21px",
    "position": "fixed",
    "right": "260px",
    "width": "230px",
    "z-index": "99"




       });

}
else if(len==1)
{




var divs='#boxs'+id;


      $(''+divs+'').css({




    "background": "none repeat scroll 0 0 white",
    "border": "1px solid grey",
    "border-radius": "5px",
    "bottom": "20px",
    "display": "block",
    "height": "212px",
    "padding": "21px",
    "position": "fixed",
    "right": "500px",
    "width": "230px",
    "z-index": "99"




       });

}

else if(len==2)
{




var divs='#boxs'+id;


      $(''+divs+'').css({




    "background": "none repeat scroll 0 0 white",
    "border": "1px solid grey",
    "border-radius": "5px",
    "bottom": "20px",
    "display": "block",
    "height": "212px",
    "padding": "21px",
    "position": "fixed",
    "right": "740px",
    "width": "230px",
    "z-index": "99"




       });

}

else
{
var tolss=tot+'px';



var divs='#boxs'+id;


      $(''+divs+'').css({




    "background": "none repeat scroll 0 0 white",
    "border": "1px solid grey",
    "border-radius": "5px",
    "bottom": "20px",
    "display": "block",
    "height": "212px",
    "padding": "21px",
    "position": "fixed",
    "right": "978px",
    "width": "230px",
    "z-index": "99"




       });

}







});


$(".closebox").click(function()
{



var id=$(this).attr("id");


var divs='#boxs'+id;


      $(''+divs+'').css({


            "display":"none"


       });





});




});
</script>
<script type="text/javascript">

function myFunction(id) {



if(id=='')
{
alert('Required comment section');
}
else
{


 $.ajax({

    type: "GET",
    url: "{{ asset('/') }}/index.php/postcomdelete/"+id,
  //  data: { id: id, user: user, comment: comment, name: name},
    dataType: 'json',
    cache: false,
    success: function(data)
    {




  var comment='#cc'+data[0].idss;
  $(comment).hide('slow');


    }
    });
}


}

function savepost(id) {

var inputval='input#pp'+id;
var postval=$(''+inputval+'').val();

if(postval=='')
{
alert('Required Input text field');
}
else
{


 $.ajax({

    type: "GET",
    url: "{{ asset('/') }}/index.php/postupdate/"+id,
    data: { value: postval},
    dataType: 'json',
    cache: false,
    success: function(data)
    {



$('input#pp'+data[0].idss+'').replaceWith('<p id="edit'+data[0].idss+'">'+data[0].valuess+'</p>');
$('button.ed'+data[0].idss+'').show("slow");
$('button#sav'+data[0].idss+'').hide("slow");
    }
    });
}


}

function savecom(id) {

var inputval='input#cc'+id;
var postval=$(''+inputval+'').val();

if(postval=='')
{
alert('Required Input text field');
}
else
{


 $.ajax({

    type: "GET",
    url: "{{ asset('/') }}/index.php/comupdate/"+id,
    data: { value: postval},
    dataType: 'json',
    cache: false,
    success: function(data)
    {



$('input#cc'+data[0].idss+'').replaceWith('<p id="ppp'+data[0].idss+'">'+data[0].valuess+'</p>');
$('button.eds'+data[0].idss+'').show("slow");
$('button#savcc'+data[0].idss+'').hide("slow");
    }
    });
}


}




</script>

<style type="text/css">

/*#post11{
  position:fixed;
  top: 50%;
  left: 50%;
  width: 5%;
  height: 5%;
  z-index: 101;
  background-color:#fff;
  display:none;
}
*/

</style>


<script type="text/javascript">



$(document).ready(function()
{

/*$(".fancybox").fancybox({
    'href' : 'div#post2'
});
*/

 $(".fancybox").on("click", function(){

var id=$(this).attr("id");
var divs='#post'+id;

 //   $("#post11").css("display", "block");

      $(''+divs+'').css({

            "position":"fixed",
            "top": "0%",
            "left": "50%",
            "width": "5%",
            "height": "auto",
            "z-index": "101",
            "background-color":"#fff",
            "display":"block"


       });

    $(''+divs+'').animate({
       'width' : '80%',
       'left' : '10%'
       }, 200, "swing" , function(){
       $("#post11").animate({
          'height' : '80%',
          'top' : '10%'
       }, 200, "swing", function(){});


      });


  $(document).on("keydown", function(event){
   if(event.keyCode === 27){
   // $(".modal-mask").css("display", "");
       $(''+divs+'').css({
            "position":"",
            "top": "",
            "left": "",
            "width": "",
            "height": "",
            "z-index": "",
            "background-color":"",
            "display":""
       });
    }
  });




    });



$(".comdel").click(function(e)
{


var id=$(this).attr("id");



if(id=='')
{
alert('Required comment section');
}
else
{


 $.ajax({

    type: "GET",
    url: "{{ asset('/') }}/index.php/postcomdelete/"+id,
  //  data: { id: id, user: user, comment: comment, name: name},
    dataType: 'json',
    cache: false,
    success: function(data)
    {




  var comment='#cc'+data[0].idss;
  $(comment).hide('slow');


    }
    });
}



});


$(".postdelete").click(function(e)
{


var id=$(this).attr("id");

if(id=='')
{
alert('Required comment section');
}
else
{


 $.ajax({

    type: "GET",
    url: "{{ asset('/') }}/index.php/postdelete/"+id,
  //  data: { id: id, user: user, comment: comment, name: name},
    dataType: 'json',
    cache: false,
    success: function(data)
    {




  var comment='#post'+data[0].idss;
  $(comment).hide('slow');


    }
    });
}



});


$(".postedit").click(function(e)
{


var id=$(this).attr("id");





var para = 'p#edit'+id;

var postval=$(para).text();


if(id=='')
{
alert('Required comment section');
}
else
{

$(''+para+'').replaceWith( '<input type="text" name="pp'+id+'" id="pp'+id+'" value="'+postval+'"/><button id="sav'+id+'" onclick="savepost('+id+');">save</button>' );
$('button.ed'+id+'').hide("slow");

}



});





$(".comedit").click(function(e)
{


var id=$(this).attr("id");


var para = 'p#ppp'+id;

var postval=$(para).text();


if(id=='')
{
alert('Required comment section');
}
else
{

$(''+para+'').replaceWith( '<input type="text" name="cc'+id+'" id="cc'+id+'" value="'+postval+'"/><button id="savcc'+id+'" onclick="savecom('+id+');">save</button>' );
$('button.eds'+id+'').hide("slow");

}



});


});
</script>



@foreach( $post as $hello)

<script type="text/javascript">
$(document).ready(function()
{


$(".buttonss{{$hello->id}}").click(function(e)
{
      e.preventDefault();


var comment = $('#comment{{$hello->id}}').val();

if(comment=='')
{
alert('Required comment section');
}
else
{
  var comment = $('#comment{{$hello->id}}').val();
   var id = $('#post_id{{$hello->id}}').val();
  var user = $('#user{{$hello->id}}').val();
    var name = $('#name{{$hello->id}}').val();

 $.ajax({

    type: "GET",
    url: "{{ asset('/') }}/index.php/commentpost/"+id,
    data: { id: id, user: user, comment: comment, name: name},
    dataType: 'json',
    cache: false,
    success: function(data)
    {


var insert_id=data[0].insert_id;

var idss=data[0].idss;
var comment=data[0].comment;
var names=data[0].names;
var datas='<div id="cc'+insert_id+'"><h3>'+names+'</h3>'+'<p id="ppp'+insert_id+'">'+comment+'</p><button id="'+insert_id+'" class="comedit eds'+insert_id+'"><span class="">edit</span></button><button class="comdel" id="{{$hello->id}}" onclick="myFunction('+insert_id+')"><span class="glyphicon glyphicon-remove"></span></button></div>';
$("#ppcomment{{$hello->id}}").append(datas);
$('#comment{{$hello->id}}').val('');

    }
    });
}



});







});
</script>






        <div class="message_box" id="post{{$hello->id}}">






          <div class="u-nformation"><img  alt="iamge" class="img-circle img_wid" src="{{ asset('') }}/<?php if($pick){ echo $pick->path; } ?>"> <a href="#"><?php  echo Auth::user()->name;?></a>
          <button id="{{$hello->id}}" class="postdelete"><span class="glyphicon glyphicon-remove"></span></button></div>
        <?php if($hello->path)
        {?>



        <div class="message_text">
        <a  class="fancybox" id="{{$hello->id}}" style="cursor:pointer;" />
         <img src="{{ asset('/') }}/{{$hello->path}}" width="200" height="200"/>
         </a>
          </div>

<?php
        }?>
        <?php if($hello->imagessvideo)
        {?>



        <div class="message_text">
        <a  class="fancybox" id="{{$hello->id}}" style="cursor:pointer;" />
<!--          <video width="320" height="240" controls>
  <source src="{{ asset('/') }}{{$hello->imagessvideo}}" type="video/flv">


</video>
      -->

<object width="320" height="240">

<param name="movie" value="{{ asset('/') }}{{$hello->imagessvideo}}">

<embed src="{{ asset('/') }}{{$hello->imagessvideo}}" width="320" height="240">

</embed>

</object>


         </a>
          </div>

<?php
        }?>

          <div class="message_text1">
            <p id="edit{{$hello->id}}">{{$hello->post}} </p>
            <button id="{{$hello->id}}" class="postedit ed{{$hello->id}}"><span class="">edit</span></button>
          </div>
          <div class="comment_box"> <span class="date_text">{{$hello->curdate}} </span>
            <div class="like">
              <ul>
                <li><span class="glyphicon glyphicon-comment"></span></li>
                <li><span id="countlike{{$hello->id}}">{{$hello->like}}</span></li>
                 <li><span>
                   <a style="cursor:pointer;" class="likes glyphicon glyphicon-thumbs-down" id="a{{$hello->id}}" name="{{$hello->id}}"></a>

                 </span>


                 </li>

              </ul>
            </div>
          </div>
<div class="message_text" id="ppcomment{{$hello->id}}">


@foreach( $postcomment as $hellos)




<?php
if($hellos->post_id==$hello->id)
{?>
<div id="cc{{$hellos->id}}">
<h3>{{$hellos->name}} </h3>
<p id="ppp{{$hellos->id}}">{{$hellos->comment}} </p>

<button id="{{$hellos->id}}" class="comedit eds{{$hellos->id}}"><span class="">edit</span></button>
<button id="{{$hellos->id}}" class="comdel"><span class="glyphicon glyphicon-remove"></span></button>
</div>



<?php
}?>

@endforeach
        </div>
<div class="comment_box">
<form name="comments" id="comments">

<textarea name="comment"  onkeydown="if (event.keyCode == 13) document.getElementById('submitbtn{{$hello->id}}').click()" required="" id="comment{{$hello->id}}" value="" placeholder="comment"></textarea>

<input type="hidden" name="user" id="user{{$hello->id}}"value="<?php  echo Auth::user()->rand;?>"/>
<input type="hidden" id="post_id{{$hello->id}}" name="post_id" value="{{$hello->id}}"/>
<input type="hidden" name="name" id="name{{$hello->id}}"value="<?php  echo Auth::user()->name;?>"/>
<button  id="submitbtn{{$hello->id}}" class="buttonss{{$hello->id}} btn sign_btn pull-right">send</button>
</form>
</div>




</div>

@endforeach



      </div>
      <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="border">
        <input name="userid" type="hidden" id="userid" value="<?php echo Auth::user()->id;?>"/>
          <div class="u-event">Upcoming Events </div>
          <div class="col-lg-12 col-md-12 col-sm-12">

 {{ Form:: open(array('url' => 'createevent' , 'method' => 'get','id' => 'contactform','files' => 'true', 'enctype' => 'multipart/form-data')) }} <!--contact_request is a router from Route class-->
  @if($errors->any())

 {{ implode('', $errors->all('<li>:message</li>'))  }}
@endif
    {{ Form::token() }}

            <div class="form-group padding">
              <div class='input-group date' id='datetimepicker1'>
                <input type='text' required="" name="dates" class="form-control" />
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span> </div>
              <div class="input-group padding">
                <input type="text" required="" name="event" class="form-control">
                <span class="input-group-addon glyphicon glyphicon-map-marker"></span> </div>
              <div class="padding">
                <button class="all_btn" type="submit">Create Event</button>
              </div>
              <div class="padding"> <span><!-- No birthdays coming up. --></span> </div>
            </div>
</form>

          </div>

          <div class="clear"></div>
        </div>
        <div class="border margin">
          <div class="u-event">Upcoming Events </div>
        <?php $i=0; ?>
        @foreach( $events as $hellos)
        <?php
        if($i<3)
        { ?>

        <div class="col-lg-12 col-md-12 col-sm-12 padding2 border-bottom"> <img src="../imagesfb/man.jpg" class="img-circle img-custom img_wid pull-left" alt="iamge">
            <div class="pull-left add-frnd"> <a>{{$hellos->event}}</a><br />
              <span>{{$hellos->dates}}-{{$hellos->timess}} <!-- - <a href="#">Hide</a></span>  --></div>
          </div>



      <?php
        }

        ?>


        <?php $i++; ?>
       @endforeach




          <div class="col-lg-12 col-md-12 col-sm-12 padding2">
            <a href="{{ asset('/index.php') }}/allevent" class="all_btn" type="submit">View All</a>
          </div>
          <div class="clear"></div>
        </div>
      </div>
    </div>
  </div>
</section>


<div id="chatmessenger">
<div id="chatmessengers">
<h1>CHAT MESSENGER</h1>
</div>
<div id="ulchat">
<ul>
<?php
if($outputs)
{?>


@foreach( $outputs as $hello)

<li id="online<?php echo $hello['idd']; ?>">
<span id=""></span>
<img style="float:left;" class="img-circle" alt="" width="30" height="30" src="{{ asset('/') }}/<?php echo $hello['profilephoto']; ?>">



<p class="openbox" id="<?php echo $hello['idd']; ?>" style="float:left; width:100px; cursor:pointer;"><?php echo $hello['name']; ?></p>


<div id="boxs<?php echo $hello['idd']; ?>" class="allchatbox">
<div class="backchat">
<div id="nname">
<?php echo $hello['name']; ?>
</div>
<div id="<?php echo $hello['idd']; ?>" class="closebox">
close
</div>
</div>
<form>
<div class="uptext" id="uptextid<?php echo $hello['idd']; ?>">


</div>
<div class="downtext">

<textarea rows="1" onkeydown="if (event.keyCode == 13) document.getElementById('submitbtns<?php echo $hello['idd']; ?>').click()" required="" name="chat" id="chat<?php echo $hello['idd']; ?>" placeholder="Write a reply"></textarea>
<input type="hidden" id="user<?php echo $hello['idd']; ?>" value="{{Auth::user()->rand;}}" name="user">
<input type="hidden" id="name<?php echo $hello['idd']; ?>" value="{{Auth::user()->name; }}" name="name">
<input type="hidden" id="otheruser<?php echo $hello['idd']; ?>" value="<?php echo $hello['otherrands']; ?>" name="otheruser">
<input type="hidden" id="othername<?php echo $hello['idd']; ?>" value="<?php echo $hello['name']; ?>" name="othername">

<button id="submitbtns<?php echo $hello['idd']; ?>" class="onlineclick" name="<?php echo $hello['idd']; ?>" type="button">Reply</button>

</div>
</form>


</div>

<style type="text/css">
#boxs<?php echo $hello['idd'];?> {

    display: none;

}


</style>
</li>




@endforeach



<?php
}?>


<?php
if($outputss)
{?>

@foreach( $outputss as $hello)


<li id="online<?php echo $hello['idd']; ?>">
<span id=""></span>
           <img style="float:left;" class="img-circle" alt="" src="{{ asset('/') }}/<?php echo $hello['profilephoto']; ?>" width="30" height="30">


<p class="openbox" id="<?php echo $hello['idd']; ?>" style="float:left; width:100px; cursor:pointer;"><?php echo $hello['name']; ?></p>

<div id="boxs<?php echo $hello['idd']; ?>" class="allchatbox">
<div class="backchat">
<div id="nname">
<?php echo $hello['name']; ?>
</div>
<div id="<?php echo $hello['idd']; ?>" class="closebox">
close
</div>
</div>
<form>
<div class="uptext" id="uptextid<?php echo $hello['idd']; ?>">


</div>
<div class="downtext">

<textarea rows="1" onkeydown="if (event.keyCode == 13) document.getElementById('submitbtns<?php echo $hello['idd']; ?>').click()" required="" name="chat" id="chat<?php echo $hello['idd']; ?>" placeholder="Write a reply"></textarea>
<input type="hidden" id="user<?php echo $hello['idd']; ?>" value="{{Auth::user()->rand;}}" name="user">
<input type="hidden" id="name<?php echo $hello['idd']; ?>" value="{{Auth::user()->name; }}" name="name">
<input type="hidden" id="otheruser<?php echo $hello['idd']; ?>" value="<?php echo $hello['otherrands']; ?>" name="otheruser">
<input type="hidden" id="othername<?php echo $hello['idd']; ?>" value="<?php echo $hello['name']; ?>" name="othername">

<button id="submitbtns<?php echo $hello['idd']; ?>" class="onlineclick" name="<?php echo $hello['idd']; ?>" type="button">Reply</button>

</div>
</form>


</div>

<style type="text/css">
#boxs<?php echo $hello['idd'];?> {

    display: none;

}


</style>

 </li>



@endforeach



<?php
}?>

</ul>



</div>

</div>




@endsection
