<?php

class AuthController extends BaseController
{
    public function showLogin()
    {
        return Redirect::route('authork');
    }

    public function searchusers()
    {
        $name = Input::get('name');

        if ($name != '') {
            $users = DB::table('users')
                ->where('name', 'LIKE', $name . '%')
                ->orderBy('id', 'asc')
                ->get();

            foreach ($users as $user) {
                echo '<div class="show" align="left"><div class="fulldetail"><div class="name" style="width:100%;">';
                echo $user->name;
                echo '</div></span></div></div>';
            }
        }
    }

    public function postLogin()
    {
        $credentials = [];
        $credentials['name'] = Input::get('first_name');
        $credentials['bin'] = Input::get('password');

        $remember = false;
        if (Input::get($remember)) {
            $remember = true;
        }

        $validator = Validator::make($credentials, [
            'name' => 'required',
            'bin' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::action('AuthController@showLogin');
        }

        if (Author::attempt($credentials, $remember)) {
            return Redirect::action('AdminPanelController@index');
        }
    }
}
