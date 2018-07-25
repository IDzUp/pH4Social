<?php

class MyaccountController extends BaseController
{
    public $restful = true;
    public $layout = 'layouts.login';

    public function __construct()
    {
        // Closure as callback
        $this->beforeFilter(function () {
            if (!Auth::check()) {
                return Redirect::route('signup');
            }
        });

    }

    public function myaccount()
    {

        $email = Auth::user()->email;
        $query = DB::table('users');
        $query->where('email', $email);
        $rows = $query->get();


        if (Auth::user()) {

            $rand = Auth::user()->rand;

            $querys = DB::table('shopping');

            $querys->where('rand', $rand);

            $rowsk = $querys->get();

        } else {
            $rowsk = 0;
        }

        $curr = Currency::where('id', '=', '1')->first();


        $view = View::make('myaccount.indexs')->with('myaccount', $rows);
        $this->layout->with('shopping', $rowsk)->with('currency', $curr)->with('category', Category::All())->with('subcategory', Subcategory::All());
        $this->layout->content = $view;

    }

    public function myaccountsave()
    {

        $email = Auth::user()->email;


        $entry = array(

            'email' => Input::get('email'),
            'name' => Input::get('name'),
            'city' => Input::get('city'),

        );

        User::where('email', $email)->update($entry);

        //Author::update


        return Redirect::route('myaccount');
    }
}
