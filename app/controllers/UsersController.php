<?php

class UsersController extends BaseController
{
    public $restful = true;

    //public $layout='layouts.admin';

    public $layout = 'layouts.adminnew';

    public function users()
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

        $planss = DB::table('membershipplan')->get();


        if ($plans->removeadmin == 'on' || $plans->removesuperadmin == 'on' || $plans->users == 'on') {

            $value = DB::table('users')->get();

            $pick = DB::table('membershipplan')
                ->where('name', Auth::user()->plan)
                ->first();


            $view = View::make('users.indexs')->with('users', $value)->with('permission', $pick)->with('plans', $plans)->with('planss', $planss);
            //$this->layout->with('colors', Settings::All());
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;
        } else {
            //return Redirect::route('notaccess');
            App::abort(404);
        }
    }

    public function admin()
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

            $user = DB::table('users')->get();

            $total = count($user);

            $tot = DB::table('contact')->get();

            $contact = count($tot);


            $totss = DB::table('post')->get();

            $posts = count($totss);

            $tots = DB::table('pages')->get();

            $pages = count($tots);

            $view = View::make('users.admins')->with('posts', $posts)->with('users', $total)->with('contact', $contact)->with('pages', $pages);

            $this->layout->with('logo', Logo::find(1));

            $this->layout->content = $view;

        } else {

            /*$view= View::make('users.notaccesspage');
            $this->layout->with('logo', Logo::find(1));

            $this->layout->content=$view;
            */

            //App::abort(404);
            return Redirect::route('notaccesspage');

        }

    }


    public function dashboard()
    {


        $view = View::make('users.dashboard');
        $this->layout->with('colors', Settings::All());
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;

    }


    public function category()
    {


        $view = View::make('users.category');
        $this->layout->with('colors', Settings::All());
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;

    }


    public function menu()
    {


        $view = View::make('users.menu');
        $this->layout->with('colors', Settings::All())->with('menu', Menu::All());
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;
    }

    public function subcategory($id)
    {


        $view = View::make('users.subcategory')->with('id', $id);
        $this->layout->with('colors', Settings::All());
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;

    }


    public function submenu($id)
    {


        $view = View::make('users.submenu')->with('id', $id);
        $this->layout->with('colors', Settings::All());
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;

    }

    public function categorysave()
    {


        $input = Input::all();

        $user = new Category();


        $user->title = $input['name'];
        $user->content = $input['comment'];

        $user->save();


        return Redirect::route('viewcategory');


    }

    public function menusave()
    {


        $input = Input::all();

        $user = new Menu();


        $user->menu = $input['name'];
        $user->link = $input['link'];

        $user->save();


        return Redirect::route('viewmenu');


    }


    public function subcategorysave()
    {


        $input = Input::all();

        $user = new Subcategory();


        $user->title = $input['name'];
        $user->content = $input['comment'];

        $user->category_id = $input['id'];

        $user->save();


        return Redirect::route('viewcategory');


    }


    public function submenusave()
    {


        $input = Input::all();

        $user = new Submenu();


        $user->submenu = $input['name'];

        $user->link = $input['link'];

        $user->menu = $input['id'];

        $user->save();


        return Redirect::route('viewmenu');


    }


    public function updatecategory()
    {
        //$id=Input::get($id);


        $id = Input::get('id');


        $entry = array(

            'title' => Input::get('name'),
            'content' => Input::get('message')


        );

        Category::where('id', $id)->update($entry);

        //Author::update


        return Redirect::route('viewcategory');


    }


    public function updatemenu()
    {


        //$id=Input::get($id);


        $id = Input::get('id');


        $entry = array(

            'menu' => Input::get('name'),
            'link' => Input::get('link')


        );

        Menu::where('id', $id)->update($entry);

        //Author::update


        return Redirect::route('viewmenu');


    }

    public function updatesubcategory()
    {


        //$id=Input::get($id);


        $id = Input::get('id');


        $entry = array(

            'title' => Input::get('name'),
            'content' => Input::get('message')


        );

        Subcategory::where('id', $id)->update($entry);

        //Author::update


        return Redirect::route('viewcategory');


    }


    public function updatesubmenu()
    {


        //$id=Input::get($id);


        $id = Input::get('id');


        $entry = array(

            'submenu' => Input::get('name'),
            'link' => Input::get('link')


        );

        Submenu::where('id', $id)->update($entry);

        //Author::update


        return Redirect::route('viewmenu');


    }


    public function categoryedit($id)
    {

        $view = View::make('users.categoryedit')->with('categoryedit', Category::find($id));
        $this->layout->with('colors', Settings::All());
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;

    }

    public function menuedit($id)
    {

        $view = View::make('users.menuedit')->with('menuedit', Menu::find($id));
        $this->layout->with('colors', Settings::All());
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;

    }

    public function subcategoryedit($id)
    {

        $view = View::make('users.subcategoryedit')->with('subcategoryedit', Subcategory::find($id));
        $this->layout->with('colors', Settings::All());
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;

    }

    public function submenuedit($id)
    {

        $view = View::make('users.submenuedit')->with('submenuedit', Submenu::find($id));
        $this->layout->with('colors', Settings::All());
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;

    }


    public function viewcategory()
    {


        $view = View::make('users.viewcategory')->with('viewcategory', Category::All())->with('subcategory', Subcategory::All());
        $this->layout->with('colors', Settings::All());
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;

    }


    public function viewmenu()
    {


        $view = View::make('users.viewmenu')->with('viewmenu', Menu::All())->with('submenu', Submenu::All());
        $this->layout->with('colors', Settings::All());
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;

    }


    public function viewcontact()
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

            $contact = DB::table('contact')->orderBy('id', 'desc')->get();

            $view = View::make('contact.viewcontact')->with('viewcontact', $contact);
            $this->layout->with('colors', Settings::All());
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;
        } else {
//return Redirect::route('notaccess');
            App::abort(404);
        }


    }

    public function settings()
    {

        $view = View::make('settings.settings');
        $this->layout->with('colors', Settings::All());
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;

    }


    public function settingschange()
    {


        $input = Input::all();


        $entry = array(

            'color' => Input::get('color')


        );

        Settings::where('id', 2)->update($entry);


        return Redirect::route('settings');

    }

    public function viewcomment()
    {

        $view = View::make('comment.viewcomment')->with('viewcomment', Comment::all());
        $this->layout->with('colors', Settings::All());
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;

    }

    public function commentdelete($id)
    {

        Comment::find($id)->delete();
        return Redirect::route('viewcomment');

    }


    public function categorydelete($id)
    {

        Category::find($id)->delete();
        return Redirect::route('viewcategory');

    }


    public function menudelete($id)
    {

        Menu::find($id)->delete();
        return Redirect::route('viewmenu');

    }


    public function subcategorydelete($id)
    {

        Subcategory::find($id)->delete();
        return Redirect::route('viewcategory');

    }

    public function submenudelete($id)
    {

        Submenu::find($id)->delete();
        return Redirect::route('viewmenu');

    }

    public function contentdelete($id)
    {

        Content::find($id)->delete();
        return Redirect::route('viewpages');

    }


    public function delete($id)
    {


        $rands = DB::table('users')
            ->where('id', $id)
            ->first();


        $rand = $rands->rand;


        Createevent::where('user', '=', $rand)->delete();

        Friends::where('mainuser', '=', $rand)->orWhere('otheruser', '=', $rand)->delete();

        Gallery::where('user', '=', $rand)->delete();

        Like::where('user_rand', '=', $rand)->orWhere('other_rand', '=', $rand)->delete();

        Message::where('user', '=', $rand)->orWhere('otheruser', '=', $rand)->delete();

        Notification::where('user', '=', $rand)->orWhere('friendrequest', '=', $rand)->delete();

        Notilike::where('user', '=', $rand)->orWhere('otheruser', '=', $rand)->delete();

        Post::where('user_rand', '=', $rand)->delete();

        Postcomment::where('user', '=', $rand)->delete();

        Profile::where('user_rand', '=', $rand)->delete();

        User::find($id)->delete();

        return Redirect::to('users')->with('msg', 'Successfully Deleted');

//    return Redirect::back();
        //return Redirect::route('users');

    }

    public function edit($id)
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

            $pick = DB::table('membershipplan')
                ->where('name', Auth::user()->plan)
                ->first();


            $view = View::make('users.edit')->with('edit', User::find($id))->with('member', Membershipplan::All())->with('pick', $pick);
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;


        } else {
//return Redirect::route('notaccess');
            App::abort(404);
        }


    }

    public function contactedit($id)
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


            $view = View::make('contact.contactedit')->with('contactedit', Contact::find($id));
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;

        } else {
//return Redirect::route('notaccess');
            App::abort(404);
        }


    }

    public function commentedit($id)
    {

        $view = View::make('comment.commentedit')->with('commentedit', Comment::find($id));
        $this->layout->with('colors', Settings::All());
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;

    }


    public function adduser()
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


            $view = View::make('users.addsuser')->with('member', Membershipplan::All());
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;


        } else {
//return Redirect::route('notaccess');
            App::abort(404);
        }


    }


    public function getregisterss()
    {


        $input = Input::all();
        $rules = array('email' => 'required|unique:users|email', 'password' => 'required', 'name' => 'required|unique:users', 'city' => 'required');

        $v = Validator::make($input, $rules);

        if ($v->passes()) {


            $name = strip_tags($input['name']);
            $names = preg_replace("/[^a-zA-Z0-9- ]+/", "", html_entity_decode($name, ENT_QUOTES));

            $city = strip_tags($input['city']);
            $citys = preg_replace("/[^a-zA-Z0-9- ]+/", "", html_entity_decode($city, ENT_QUOTES));


            $pass = $input['password'];
            $pass = Hash::make($pass);

            $user = new User();
            $user->email = $input['email'];
            $user->password = $pass;

            $user->name = $names;
            $user->uname = $names;
            $user->city = $citys;
            $user->sex = $input['sex'];
            $user->rand = $input['rand'];

            $user->plan = $input['member'];
            $user->activate = 1;


            if ($input['member'] != 'Member') {

                $user->username = 'admin';
            }


            $user->save();

            //return Redirect::route('users');

            return Redirect::to('users')->with('msg', 'Successfully Created');


        } else {

            return Redirect::to('adduser')->withInput()->withErrors($v);
        }


    }


    public function getmembers()
    {


        $input = Input::all();
        $rules = array('email' => 'required|unique:users|email', 'password' => 'required', 'name' => 'required', 'city' => 'required');

        $v = Validator::make($input, $rules);

        if ($v->passes()) {

            $pass = $input['password'];
            $pass = Hash::make($pass);

            $user = new User();
            $user->email = $input['email'];
            $user->password = $pass;

            $user->name = $input['name'];
            $user->city = $input['city'];
            $user->sex = $input['sex'];
            $user->rand = $input['rand'];
            $user->activate = 1;

            if ($input['member'] != '') {
                $user->username = $input['member'];

            }


            $user->save();

            return Redirect::route('membership');
        } else {

            return Redirect::to('createmember')->withInput()->withErrors($v);
        }


    }


    public function updatereg()
    {


        $id = Input::get('id');

        $plan = DB::table('membershipplan')
            ->where('name', Input::get('member'))
            ->first();

        if ($plan->removeadmin == 'on' || $plan->removesuperadmin == 'on' || $plan->removemember == 'on' || $plan->users == 'on') {
            $username = 'admin';


        } else {
            $username = null;
        }


        $name = strip_tags(Input::get('name'));
        $names = preg_replace("/[^a-zA-Z0-9- ]+/", "", html_entity_decode($name, ENT_QUOTES));

        $city = strip_tags(Input::get('city'));
        $citys = preg_replace("/[^a-zA-Z0-9- ]+/", "", html_entity_decode($city, ENT_QUOTES));


        $entry = array(


            'city' => $citys,
            'name' => $names,
            'phone' => Input::get('phone'),
            'location' => Input::get('location'),

            'bodytype' => Input::get('silhouette'),
            'eyecolor' => Input::get('eyeColor'),
            'haircolor' => Input::get('hairColor'),
            'height' => Input::get('length'),

            'username' => $username,


            'plan' => Input::get('member'),
            'sex' => Input::get('sex')

        );

        User::where('id', $id)->update($entry);

        //Author::update
        Session::flash('success', "Successfully Updated");
        return Redirect::back();

        //return Redirect::to('users')->with('msg','Successfully Updated');

        //return Redirect::route('users')
    }

    public function updatecomment()
    {
        //$id=Input::get($id);


        $id = Input::get('id');


        $entry = array(

            'product_id' => Input::get('product'),
            'comment' => Input::get('name')


        );

        Comment::where('id', $id)->update($entry);

        //Author::update


        return Redirect::route('viewcomment');
    }
}
