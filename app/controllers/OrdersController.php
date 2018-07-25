<?php

class OrdersController extends BaseController
{
    public $restful = true;

    public $layout = 'layouts.adminnew';

    public function vieworders()
    {
        $view = View::make('orders.vieworders')->with('vieworders', Orders::all())->with('users', User::All());
        $this->layout->with('colors', Settings::All());
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;

    }


    public function logo()
    {
        if (!Auth::check()) {

            return Redirect::to('la-admin');
        }


        $view = View::make('orders.logo')->with('logo', Logo::find(1));
        $this->layout->with('colors', Settings::All())->with('logo', Logo::find(1));

        $this->layout->content = $view;
    }


    public function logosave()
    {
        $img = Input::file('image');


        $img_dir = "uploads/images/" . date("mY");
        $img_thumb_dir = $img_dir . "/thumbs";

        $filename = $img->getClientOriginalName();


        // Create folders if they don't exist
        if (!file_exists($img_dir)) {
            mkdir($img_dir, 0777, true);
            mkdir($img_thumb_dir, 0777, true);
        }

        // Upload the image in the correct destination
        $upload_success = $img->move($img_dir, $img->getClientOriginalName());


        if ($upload_success) {


            $entry = array(

                'path' => $img_dir . '/' . $filename

            );

            Logo::where('id', 1)->update($entry);


            Session::flash('success', "Successfully Updated");
            return Redirect::back();


        }


    }


    public function searchuser()
    {

        $input = Input::all();


        $term = $input['searchuser'];
        $city = $input['searchcity'];
        $searchemail = $input['searchemail'];
        $searchplan = $input['searchplan'];
        $sex = $input['sex'];

        $search = DB::table('users')
            ->where('name', 'LIKE', '%' . $term . '%')
            ->where('city', 'LIKE', '%' . $city . '%')
            ->where('email', 'LIKE', '%' . $searchemail . '%')
            ->where('plan', 'LIKE', '%' . $searchplan . '%')
            ->where('sex', $sex)
            ->get();


        $view = View::make('users.searchuser')->with('users', $search);
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;

    }


    public function searchevent()
    {

        $input = Input::all();


        $term = $input['searchuser'];
        $city = $input['searchcity'];
        $searchemail = $input['searchemail'];
        $searchplan = $input['searchplan'];
        $sex = $input['sex'];

        $search = DB::table('users')
            ->where('name', 'LIKE', '%' . $term . '%')
            ->where('city', 'LIKE', '%' . $city . '%')
            ->where('email', 'LIKE', '%' . $searchemail . '%')
            ->where('plan', 'LIKE', '%' . $searchplan . '%')
            ->where('sex', $sex)
            ->get();


        $view = View::make('orders.searchevent')->with('users', $search);
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;

    }


    public function searchtimeline()
    {

        $input = Input::all();


        $term = $input['searchuser'];
        $city = $input['searchcity'];
        $searchemail = $input['searchemail'];
        $searchplan = $input['searchplan'];
        $sex = $input['sex'];

        $search = DB::table('users')
            ->where('name', 'LIKE', '%' . $term . '%')
            ->where('city', 'LIKE', '%' . $city . '%')
            ->where('email', 'LIKE', '%' . $searchemail . '%')
            ->where('plan', 'LIKE', '%' . $searchplan . '%')
            ->where('sex', $sex)
            ->get();


        $view = View::make('orders.searchtimeline')->with('users', $search);
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;

    }


    public function searchcontact()
    {

        $input = Input::all();


        $term = $input['searchuser'];


        $search = DB::table('contact')
            ->where('name', 'LIKE', '%' . $term . '%')
            ->get();


        $view = View::make('orders.searchcontact')->with('viewcontact', $search);
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;

    }


    public function searchgallery()
    {

        $input = Input::all();


        $term = $input['searchuser'];
        $city = $input['searchcity'];
        $searchemail = $input['searchemail'];
        $searchplan = $input['searchplan'];
        $sex = $input['sex'];

        $search = DB::table('users')
            ->where('name', 'LIKE', '%' . $term . '%')
            ->where('city', 'LIKE', '%' . $city . '%')
            ->where('email', 'LIKE', '%' . $searchemail . '%')
            ->where('plan', 'LIKE', '%' . $searchplan . '%')
            ->where('sex', $sex)
            ->get();


        $view = View::make('orders.searchgallery')->with('users', $search);
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;

    }


    public function timeline()
    {
        if (!Auth::check()) {

            return Redirect::to('/la-admin');
        }


        $rands = DB::table('users')
            ->where('rand', Auth::user()->rand)
            ->first();
        $plan = $rands->plan;

        $plans = DB::table('membershipplan')
            ->where('name', $plan)
            ->first();

        if ($plans->removeadmin == 'on' || $plans->removesuperadmin == 'on' || $plans->users == 'on') {
            $view = View::make('orders.timeline')->with('users', User::All());
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;
        } else {
            //return Redirect::route('notaccess');
            App::abort(404);
        }


    }

    public function galleryadmin()
    {


        if (!Auth::check()) {

            return Redirect::to('/la-admin');
        }


        $rands = DB::table('users')
            ->where('rand', Auth::user()->rand)
            ->first();
        $plan = $rands->plan;

        $plans = DB::table('membershipplan')
            ->where('name', $plan)
            ->first();

        if ($plans->removeadmin == 'on' || $plans->removesuperadmin == 'on' || $plans->users == 'on') {


            $view = View::make('orders.galleryadmin')->with('users', User::All());
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;

        } else {
//return Redirect::route('notaccess');
            App::abort(404);
        }


    }


    public function eventadmin()
    {

        if (!Auth::check()) {

            return Redirect::to('/la-admin');
        }


        $rands = DB::table('users')
            ->where('rand', Auth::user()->rand)
            ->first();
        $plan = $rands->plan;

        $plans = DB::table('membershipplan')
            ->where('name', $plan)
            ->first();

        if ($plans->removeadmin == 'on' || $plans->removesuperadmin == 'on' || $plans->users == 'on') {


            $view = View::make('orders.eventadmin')->with('users', User::All());
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;

        } else {
//return Redirect::route('notaccess');
            App::abort(404);
        }


    }


    public function timelines($id)
    {


        $rand = Auth::user()->rand;
        $idds = Auth::user()->id;

        if ($id == $idds) {


            return Redirect::route('profile');
        }

        $profile = User::where('id', '=', $id)->first();
        $rands = $profile->rand;

        $value = DB::table('profile')
            ->where('user_rand', $rands)
            ->first();


        $add = DB::table('notification')
            ->where('friendrequest', $rands)->where('user', $rand)
            ->get();


        $count = count($add);


        $adds = DB::table('friends')
            ->where('mainuser', $rand)->where('otheruser', $rands)
            ->get();

        $counts = count($adds);


        $addss = DB::table('friends')
            ->where('otheruser', $rand)->where('mainuser', $rands)
            ->get();

        $countss = count($addss);


        $post = DB::table('post')
            ->where('user_rand', $rands)->orderBy('created_at', 'desc')
            ->get();

        $postcomment = DB::table('postcomment')->get();


        $view = View::make('orders.timelines')->with('proinfo', $value)->with('userinfo', $profile)->with('post', $post)->with('add', $count)->with('adds', $counts)->with('addss', $countss)->with('postcomment', $postcomment);
        $this->layout->with('colors', Settings::All());
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;


    }

    public function ordersdelete($id)
    {
        Orders::find($id)->delete();
        return Redirect::route('vieworders');

    }
}
