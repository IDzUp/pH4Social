@layout(layouts.admin)

@section('content')



    <div class="contact-form">
        <h2 class="title text-center">My account</h2>
        <div class="status alert alert-success" style="display: none"></div>


        {{ Form:: open(array('url' => 'myaccount/save' , 'method' => 'get','id' => 'main-contact-form','class' => 'contact-form row')) }}

        <div class="form-group col-md-6">

            <input id="name" name="name" class="form-control" required="required" placeholder="Name"
                   value="<?php foreach ($myaccount as $hello) {

                       echo $hello->name;

                   }
                   ?>
                           " required="" tabindex="1" type="text">


        </div>
        <div class="form-group col-md-6">

            <input id="email" name="email" class="form-control" required="required" placeholder="Email"
                   value="<?php foreach ($myaccount as $hello) {
                       echo $hello->email;
                   }
                   ?>" required="" tabindex="2" type="text">


        </div>
        <div class="form-group col-md-12">

            <input id="subject" name="city" class="form-control" required="required" placeholder="City"
                   value="<?php foreach ($myaccount as $hello) {

                       echo $hello->city;

                   }
                   ?>" required="" tabindex="2" type="text">


        </div>

        <div class="form-group col-md-12">
            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
        </div>
        </form>
    </div>






@endsection
