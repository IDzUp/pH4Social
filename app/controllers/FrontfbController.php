<?php


class FrontfbController extends BaseController
{
    public $restful = true;
    //public $layout='layouts.fb';
    public $layout = 'layouts.fbhome';

    /**
     * @method sites
     *
     * @param
     *
     * @return void
     *
     * @public function
     */
    public function sites()
    {


        $rand = Auth::user()->rand;
        $userid = Auth::user()->id;
        $value = DB::table('profile')
            ->where('user_rand', $rand)
            ->get();
        $values = DB::table('post')
            ->where('user_rand', $rand)
            ->get();

        $view = View::make('fb.index')->with('profile', $value)->with('post', $values);


        $this->layout->with('colors', Template::All());
        $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
        $this->layout->content = $view;
    }


    public function searchusers()
    {


        $name = Input::get('name');

        if ($name != '') {


            $users = DB::table('users')
                ->where('name', 'LIKE', $name . '%')
                ->orderBy('id', 'asc')
                ->get();

            foreach ($users as $hello) {

                echo '<div class="show" align="left"><div class="fulldetail"><div class="name" style="width:100%;">';
                echo $hello->name;
                echo '</div></span></div></div>';


            }

        }


    }

    /**
     * @method test
     *
     * @param
     *
     * @return void
     *
     * @public function
     */
    public function test()
    {


        $view = View::make('fb.test');


        $this->layout->with('colors', Template::All());
        $this->layout->content = $view;
    }


    /**
     * @method
     *
     * @param
     *
     * @return redirect page
     *
     * @public function
     */
    public function fblogout()
    {

        Auth::logout();
        return Redirect::route('sites');
        //    return Redirect::to('login');
    }


    /**
     * @method activate
     *
     * @param INT $id
     *
     * @return redirect page
     *
     * @public function
     */
    public function activate($id)
    {


        $entry = array(
            'activate' => '1'


        );

        User::where('rand', $id)->update($entry);


        return Redirect::route('/');


    }


    /**
     * @method home
     *
     * @param
     *
     * @return void
     *
     * @public function
     */
    public function home()
    {


        if (Auth::check()) {

            return Redirect::to('profile');
        }


        $langg = DB::table('addlanguage')
            ->first();

        $set = $langg->lang;


        if (!Session::get('locale') || $set == Session::get('locale')) {

            Session::put('locale', $set);

        }


        App::setLocale(Session::get('locale'));

        $pick = DB::table('pages')
            ->where('publish', 'yes')
            ->get();

        $view = View::make('fb.home')->with('pages', $pick);
        $this->layout->with('colors', Template::All());
        $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
        $this->layout->content = $view;


    }

    /**
     * @method page
     *
     * @param INT $id
     *
     * @return void
     *
     * @public function
     */
    public function page($id)
    {


        $langg = DB::table('addlanguage')
            ->first();

        $set = $langg->lang;


        if (!Session::get('locale') || $set == Session::get('locale')) {

            Session::put('locale', $set);

        }


        App::setLocale(Session::get('locale'));


        $pick = DB::table('pages')
            ->where('title', $id)->where('publish', 'yes')
            ->first();

        if ($pick) {

            $view = View::make('fb.pages')->with('pages', $pick);
            $this->layout->with('colors', Template::All());
            $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
            $this->layout->content = $view;


        } else {
            return Redirect::to('/');


        }


    }


    /**
     * @method contactform
     *
     * @param
     *
     * @return void
     *
     * @public function
     */
    public function contactform()
    {


        $langg = DB::table('addlanguage')
            ->first();

        $set = $langg->lang;

        if (!Session::get('locale') || $set == Session::get('locale')) {

            Session::put('locale', $set);

        }


        App::setLocale(Session::get('locale'));


        $view = View::make('fb.contactform');


        $this->layout->with('colors', Template::All());
        $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
        $this->layout->content = $view;
    }


    /**
     * @method resetpass
     *
     * @param INT $id
     *
     * @return void
     *
     * @public function
     */
    public function resetpass($id)
    {


        $langg = DB::table('addlanguage')
            ->first();

        $set = $langg->lang;

        if (!Session::get('locale') || $set == Session::get('locale')) {

            Session::put('locale', $set);

        }


        App::setLocale(Session::get('locale'));

        $userss = DB::table('users')->where('forget', $id)->first();

        if (!$userss) {

            //  return Redirect::route('notaccess');
            App::abort(404);
        }
        $email = $userss->email;


        $view = View::make('fb.resetpass')->with('id', $id)->with('email', $email);


        $this->layout->with('colors', Template::All());
        $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
        $this->layout->content = $view;


    }


    /**
     * @method getregistersfb
     *
     * @param
     *
     * @return rediect back
     *
     * @public function
     */
    public function getregistersfb()
    {


        $input = Input::all();
        $rules = array('email' => 'required|unique:users|email', 'password' => 'required', 'name' => 'required|unique:users|max:25', 'city' => 'required|max:25', 'sex' => 'required', 'location' => 'required|max:25', 'agree' => 'required');

        $v = Validator::make($input, $rules);

        if ($v->passes()) {

            $pass = $input['password'];
            $pass = Hash::make($pass);

            $user = new User();
            $user->email = $input['email'];
            $user->password = $pass;

            $user->rand = $input['rand'];


            $user->name = strip_tags(Input:: get('name'));
            $user->uname = strip_tags(Input:: get('name'));
            $user->city = strip_tags(Input:: get('city'));
            $user->location = strip_tags(Input:: get('location'));
            $user->sex = $input['sex'];
            $user->plan = 'Member';
            $user->save();

            $code = $input['rand'];

            $confirmmail = DB::table('confirmmail')
                ->where('id', 1)
                ->first();

            $user->froms = $confirmmail->from;

            $user->subject = $confirmmail->subject;

            $data = array('content' => $confirmmail->comment, 'email' => 'sahil_kaushal@esferasoft.com', 'first_name' => $user->name, 'from' => 'sahil_kaushal@esferasoft.com', 'activate' => $code);
//$data = array( 'subject' => $user->subject, 'comment' => $user->comment, 'from' => '', 'from_name' => 'Meh','activate' => $code);


            Mail::send('fb.activate', $data, function ($message) use ($user) {
                $message->to($user->email, $user->name)->from($user->froms, $user->froms)
                    ->subject($user->subject);

            });


            Session::flash('activte', "Account Creation Successful, Please activate your account by clicking on the link provided by an email you will receive.");
            return Redirect::back();


        } else {

            return Redirect::to('/')->withInput()->withErrors($v);
        }


    }


    /**
     * @method getloginsfb
     *
     * @param
     *
     * @return redirect page
     *
     * @public function
     */
    public function getloginsfb()
    {


        $input = Input::all();
        $rules = array('email' => 'required|email', 'password' => 'required');

        $v = Validator::make($input, $rules);

        if ($v->fails()) {

            Session::flash('loginerrors', "loginerrors");
            return Redirect::to('/')->withInput()->withErrors($v);
        } else {


            $remember = (Input::has('remember')) ? true : false;


            if (Auth::attempt(array('email' => $input['email'], 'password' => $input['password'], 'activate' => '1'), true)) {


                $rand = Auth::user()->rand;
                $request = Request::instance();
                $ip = $request->getClientIp();

                $entry = array(

                    'account' => '1',
                    'ipaddress' => $ip
                );


                User::where('rand', '=', $rand)->update($entry);


                return Redirect::to('profile')->with('message', 'I am the best');
            } else {
                Session::flash('loginerror', "Not valid id , password or Activation");
                // return Redirect::back();
                return Redirect::to('/');
            }

        }


    }


    /**
     * @method logoutsfb
     *
     * @param
     *
     * @return redirect page
     *
     * @public function
     */
    public function logoutsfb()
    {


        Auth::logout();

        Session::flush();


        return Redirect::route('home');

    }
}
