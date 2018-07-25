<?php

class MyController extends BaseController
{
    public $restful = true;
    public $layout = 'layouts.default';

    public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'post']);
    }

    public function showWelcome()
    {

        $view = View::make('authors.index')->with('author', Author::all());
        /*
        $view->location='india';
        $view['speciality']='PHP';
        return $view;
        */
        $this->layout->content = $view;
    }


    public function extraWork()
    {

        $view = View::make('authors.new')->with('title', 'sahil');
        /*
        $view->location='india';
        $view['speciality']='PHP';
        return $view;
        */
        $this->layout->content = $view;
    }


    public function form()
    {

        $view = View::make('authors.form')->with('title', 'sahil');
        /*
        $view->location='india';
        $view['speciality']='PHP';
        return $view;
        */
        $this->layout->content = $view;
    }

    public function login()
    {


        if (Auth::user()) {
            return Redirect::to('admin')->with('message', 'I am the best');

        } else {
            $view = View::make('authors.login')->with('logo', Logo::find(1));

            $this->layout->content = $view;

        }


    }

    public function register()
    {

        $view = View::make('authors.register')->with('title', 'sahil');


        /*
        $view->location='india';
        $view['speciality']='PHP';
        return $view;
        */
        $this->layout->content = $view;
    }


    public function getregister()
    {


        $input = Input::all();
        $rules = array('email' => 'required|unique:users|email', 'password' => 'required|confirmed');

        $v = Validator::make($input, $rules);

        if ($v->passes()) {

            $pass = $input['password'];
            $pass = Hash::make($pass);

            $user = new User();
            $user->email = $input['email'];
            $user->password = $pass;

            $user->rand = $input['rand'];
            $user->save();

            return Redirect::route('cancel');
        } else {

            return Redirect::to('register')->withInput()->withErrors($v);
        }


    }

    public function getlogin()
    {


        $input = Input::all();
        $rules = array('email' => 'required', 'password' => 'required');

        $v = Validator::make($input, $rules);


        if ($v->fails()) {

            return Redirect::to('/')->withInput()->withErrors($v);
        } else {


            $pick = DB::table('users')
                ->where('email', $input['email'])->where('plan', 'member')
                ->first();

            if ($pick) {

                return Redirect::to('/')->withInput()->withErrors('Access Restrict');

            } else {


                $credentails = array('email' => $input['email'], 'password' => $input['password']);

                if (Auth::attempt($credentails)) {


                    //   Auth::login($credentails);

                    $request = Request::instance();

                    $rand = Auth::user()->rand;
                    $ip = $request->getClientIp();

                    $entry = array(

                        'ipaddress' => $ip
                    );


                    User::where('rand', '=', $rand)->update($entry);


                    return Redirect::to('admin')->with('message', 'I am the best');
                } else {
                    return Redirect::route('la-admin');

                }

            }


        }

    }


    public function logout()
    {

        Auth::logout();
        return Redirect::route('la-admin');
        //    return Redirect::to('login');
    }


    public function cancel()
    {

        $view = View::make('authors.login')->with('title', 'sahil');
        /*
        $view->location='india';
        $view['speciality']='PHP';
        return $view;
        */
        $this->layout->content = $view;
    }

    public function create()
    {

        echo 'successful';
        /*
                $validation = Author::validate(Input::all());



                if($validation->fails())
                {

                return Redirect::route('authork')->with_errors($validation)->with_input();


                }
                else
                {
                $entry = array(
                    'name' => Input::get('first_name')

                );


                   Author::insert($entry);

                   return Redirect::route('authork');

                }
        */

    }


    public function edit($id)
    {

        $view = View::make('authors.edit')->with('author', Author::find($id));
        /*
        $view->location='india';
        $view['speciality']='PHP';
        return $view;
        */
        $this->layout->content = $view;
    }


    public function update()
    {


        //$id=Input::get($id);


        $id = Input::get('id');
        $n = Input::get('first_name');

        echo $n;
        $entry = array(

            'name' => Input::get('first_name')

        );

        Author::where('id', $id)->update($entry);

        //Author::update


        // return Redirect::route('authork');
    }

    public function delete()
    {


        //$id=Input::get($id);


        $id = Input::get('id');


        Author::where('id', $id)->delete();

        //Author::update


        // return Redirect::route('authork');


    }
}
