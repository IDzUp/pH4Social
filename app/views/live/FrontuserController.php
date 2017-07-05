<?php

class FrontuserController extends BaseController
{

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |    Route::get('/', 'HomeController@showWelcome');
    |
    */

    public $restful = true;
    public $layout = 'layouts.login';

    public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'post']);
    }

    public function signup()
    {

        if (Auth::user()) {

            $rand = Auth::user()->rand;

            $query = DB::table('shopping');

            $query->where('rand', $rand);

            $rows = $query->get();

        } else {

            $rows = 0;
        }


        $curr = Currency::where('id', '=', '1');

        $ms = User::All();


        $view = View::make('live.signup')->with('signup', $ms)->with('shopping', $rows)->with('currency', $curr);

        $this->layout->content = $view;
        //echo View::make('live.rightsidebar')->with('shopping', Shopping::find(10));
    }


    public function specials()
    {


        $query = DB::table('content');
        $query->where('id', 1);
        $rows = $query->get();

        $view = View::make('live.specials')->with('specials', Content::find(2));

        $this->layout->content = $view;
        //echo View::make('live.rightsidebar')->with('shopping', Shopping::find(10));
    }


    public function getregisters()
    {


        $input = Input::all();
        $rules = array('email' => 'required|unique:users|email', 'password' => 'required|confirmed', 'name' => 'required', 'city' => 'required');

        $v = Validator::make($input, $rules);

        if ($v->passes()) {

            $pass = $input['password'];
            $pass = Hash::make($pass);

            $user = new User();
            $user->email = $input['email'];
            $user->password = $pass;

            $user->rand = $input['rand'];

            $user->name = $input['name'];
            $user->city = $input['city'];

            $user->save();

            return Redirect::route('signup');
        } else {

            return Redirect::to('signup')->withInput()->withErrors($v);
        }


    }


    public function logins()
    {

        $view = View::make('live.logins')->with('title', 'sahil');
        /*
        $view->location='india';
        $view['speciality']='PHP';
        return $view;
        */
        $this->layout->content = $view;
    }


    public function getlogins()
    {


        $input = Input::all();
        $rules = array('email' => 'required|email', 'password' => 'required');

        $v = Validator::make($input, $rules);

        if ($v->fails()) {

            return Redirect::to('logins')->withInput()->withErrors($v);
        } else {


            $credentails = array('email' => $input['email'], 'password' => $input['password']);

            if (Auth::attempt($credentails)) {


                //   Auth::login($credentails);


                $input = Input::all();

                $user = new Chat();

                $user->email = $input['email'];

                $user->save();


                return Redirect::to('site')->with('message', 'I am the best');
            } else {

                return Redirect::to('logins');
            }

        }


    }


    public function logouts()
    {


        $email = Auth::user()->email;


        Chat::where('email', '=', $email)->delete();

        Auth::logout();


        return Redirect::route('site');
        //    return Redirect::to('login');
    }


    public function loginfirst()
    {


        $view = View::make('live.loginfirst');

        $this->layout->content = $view;
        //echo View::make('live.rightsidebar')->with('shopping', Shopping::find(10));
    }


    public function checkout()
    {


        if (!Auth::user()) {
            return Redirect::route('signup');

        } else {
            $rand = Auth::user()->rand;

            $query = DB::table('shopping');

            $query->where('rand', $rand);

            $rows = $query->get();


            $view = View::make('live.checkout')->with('checkout', $rows);
            $this->layout->with('shopping', $rows);
            $this->layout->content = $view;

        }


    }


}


?>