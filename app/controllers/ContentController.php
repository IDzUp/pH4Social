<?php

class ContentController extends BaseController
{
    public $restful = true;

    public $layout = 'layouts.adminnew';

    public function contentadd()
    {

        $view = View::make('content.contentadd');
        $this->layout->with('colors', Settings::All());
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;

    }


    public function alllanguage()
    {


        if (Auth::user()) {
            $rands = DB::table('users')
                ->where('rand', Auth::user()->rand)
                ->first();
            $plan = $rands->plan;

            $plans = DB::table('membershipplan')
                ->where('name', $plan)
                ->first();

            if ($plans->removeadmin == 'on' || $plans->removesuperadmin == 'on' || $plans->users == 'on') {

                $langg = DB::table('addlanguage')
                    ->first();

                $set = $langg->name;

                $view = View::make('content.alllanguage')->with('set', $set);
                $this->layout->with('colors', Settings::All());
                $this->layout->with('logo', Logo::find(1));
                $this->layout->content = $view;

            } else {

//return Redirect::to('notaccess');
                App::abort(404);
            }


        } else {

            return Redirect::to('/la-admin');


        }


    }

    public function setting()
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


            $view = View::make('content.setting')->with('admins', Template::All());
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;

        } else {

            return Redirect::to('/la-admin');

        }

    }


    public function newsetting()
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


            $view = View::make('content.newsetting')->with('set', Set::find(1))->with('logo', Logo::find(1));
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;

        } else {

            return Redirect::to('/la-admin');

        }

    }


    public function addtemplate()
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

            $view = View::make('content.addtemplate');
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;
        } else {

            return Redirect::to('/la-admin');
        }

    }

    public function savetemplate()
    {


        if (!Auth::check()) {

            return Redirect::to('la-admin');
        }


        $rules = array('image' => 'required');

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            echo "not loaded";
            die;
        } else {


            $img = Input::file('image');


            $img_dir = "cssfb";
            $filename = $img->getClientOriginalName();

            $otherz = $img_dir . '/' . $filename;

            if (!file_exists($img_dir)) {
                mkdir($img_dir, 0777, true);
            }


            $pick = DB::table('template')
                ->where('other', $otherz)
                ->first();

            if ($pick) {
                return Redirect::to('addtemplate')->withInput()->withErrors('Not allowed overwrite');

            } else {


                $upload_success = $img->move($img_dir, $img->getClientOriginalName());

                $img1 = Input::file('image1');

                if ($img1 != null) {

                    $img_dir1 = "uploads/images/" . date("mY");
                    $img_thumb_dir1 = $img_dir1 . "/thumbs";
                    $filename1 = $img1->getClientOriginalName();

                    if (!file_exists($img_dir1)) {
                        mkdir($img_dir1, 0777, true);
                        mkdir($img_thumb_dir1, 0777, true);
                    }

                    $upload_success1 = $img1->move($img_dir1, $img1->getClientOriginalName());

                }


                if ($upload_success) {


                    $doc = new Template();
                    if ($img1 != null) {
                        $doc->screen = $img_dir1 . '/' . $filename1;
                    } else {
                        $doc->screen = 'uploads/images/default_temp.jpg';
                    }

                    $doc->other = $img_dir . '/' . $filename;
                    $doc->name = Input::get('name');

                    $doc->save();

                    return Redirect::route('setting');
                }

            }


        }


    }


    public function addplan()
    {


        $input = Input::all();
        $rules = array('name' => 'required');

        $v = Validator::make($input, $rules);

        if ($v->passes()) {


            $pick = DB::table('membershipplan')
                ->where('name', $input['name'])
                ->first();

            if ($pick) {
                return Redirect::to('creatememberplan')->withInput()->withErrors('Already exists');

            } else {


                $user = new Membershipplan();
                $user->name = $input['name'];

                if (Input::get('removeadmin') === 'on') {

                    $user->removeadmin = $input['removeadmin'];
                }


                if (Input::get('removesuperadmin') === 'on') {

                    $user->removesuperadmin = $input['removesuperadmin'];
                }

                if (Input::get('removemember') === 'on') {

                    $user->removemember = $input['removemember'];
                }

                if (Input::get('users') === 'on') {

                    $user->users = $input['users'];
                }


                $user->save();

//    return Redirect::route('membership');

                return Redirect::to('membership')->with('msg', 'Successfully Created');

            }


        } else {

            return Redirect::to('creatememberplan')->withInput()->withErrors($v);
        }


    }


    public function removetemp($id)
    {


        Template::where('id', '=', $id)->delete();

        Session::flash('success', "Successfully Remove");

        return Redirect::back();


    }


    public function createpage()
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


            $view = View::make('content.createpage');
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;


        } else {
//return Redirect::route('notaccess');
            App::abort(404);
        }


    }


    public function updatemem()
    {


        $id = Input::get('id');


        $entry = array(

            'name' => Input::get('name'),
            'removeadmin' => Input::get('removeadmin'),
            'removesuperadmin' => Input::get('removesuperadmin'),
            'removemember' => Input::get('removemember'),
            'users' => Input::get('users'),

        );

        Membershipplan::where('id', $id)->update($entry);


        if (Input::get('removeadmin') != 'on' && Input::get('removesuperadmin') != 'on' && Input::get('removemember') != 'on' && Input::get('users') != 'on') {


            $entry = array(

                'username' => null,


            );

            User::where('plan', Input::get('name'))->update($entry);


        } else {


            $entry = array(

                'username' => 'admin',


            );

            User::where('plan', Input::get('name'))->update($entry);


        }


        // return Redirect::route('membership');

        return Redirect::to('membership')->with('msg', 'Successfully Updated');


    }

    public function updatesetting()
    {

        $entry = array(

            'title' => Input::get('title'),
            'meta' => Input::get('meta'),
            'description' => Input::get('description'),
            'copyright' => Input::get('copyright')

        );

        Set::where('id', 1)->update($entry);


        // return Redirect::route('membership');

        //return Redirect::to('newsetting');

        Session::flash('success', "Successfully Updated");
        return Redirect::back();


    }


    public function addlanguage($id)
    {


        if ($id == 'en') {

            $name = 'English';
        } elseif ($id == 'de') {

            $name = 'German';
        } elseif ($id == 'fr') {

            $name = 'France';
        } elseif ($id == 'bg') {

            $name = 'Bulgarian';
        } elseif ($id == 'zh') {

            $name = 'Chinese';
        } elseif ($id == 'vi') {

            $name = 'Vietnamese';
        } elseif ($id == 'nl') {

            $name = 'Dutch';
        } elseif ($id == 'pt') {

            $name = 'Portuguese';
        } elseif ($id == 'es') {

            $name = 'Spanish';
        } elseif ($id == 'bs') {

            $name = 'Bosnian';
        } elseif ($id == 'ar') {

            $name = 'Arabic';
        } elseif ($id == 'ca') {

            $name = 'Catalan';
        } elseif ($id == 'cs') {

            $name = 'Czech';
        } elseif ($id == 'da') {

            $name = 'Danish';
        } elseif ($id == 'el') {

            $name = 'Greek';
        } elseif ($id == 'fa') {

            $name = 'Persian';
        } elseif ($id == 'fi') {

            $name = 'Finnish';
        } elseif ($id == 'he') {

            $name = 'Hebrew';
        } elseif ($id == 'hu') {

            $name = 'Hungarian';
        } elseif ($id == 'id') {

            $name = 'Indonesian';
        } elseif ($id == 'it') {

            $name = 'Italian';
        } elseif ($id == 'ja') {

            $name = 'Japanese';
        } elseif ($id == 'km') {

            $name = 'Khmer';
        } elseif ($id == 'ko') {

            $name = 'Korean';
        } elseif ($id == 'mk') {

            $name = 'Macedonian';
        } elseif ($id == 'nb') {

            $name = 'Norwegian';
        } elseif ($id == 'th') {

            $name = 'Thai';
        } elseif ($id == 'tr') {

            $name = 'Turkish';
        } elseif ($id == 'ru') {

            $name = 'Russian';
        } elseif ($id == 'zu') {

            $name = 'Zulu';
        } elseif ($id == 'hi') {

            $name = 'Hindi';
        } elseif ($id == 'sv') {

            $name = 'Swedish';
        } else {

            $name = 'English';
        }


        $entry = array(

            'lang' => $id,
            'name' => $name

        );

        Addlanguage::where('id', 1)->update($entry);


        Session::flash('success', "Successfully Updated");
        return Redirect::back();


        // return Redirect::route('membership');

        //return Redirect::to('alllanguage')->with('msg','Successfully Updated');


    }

    public function editmem($id)
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

            $view = View::make('content.editmem')->with('edit', Membershipplan::find($id));
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;

        } else {
//return Redirect::route('notaccess');
            App::abort(404);
        }


    }


    public function pagessave()
    {


        $input = Input::all();


        $rules = array('title' => 'required|unique:pages');

        $v = Validator::make($input, $rules);

        if ($v->passes()) {

            $user = new Pages();


            $user->title = $input['title'];
            $user->description = $input['description'];
            $user->keyword = $input['keyword'];


            $user->content = $input['content'];
            $user->publish = $input['publish'];


            $user->save();


            return Redirect::to('pages')->with('msg', 'Successfully Created');


        } else {


            Session::flash('title', "Title already Exists");
            return Redirect::back();


        }


    }


    public function contentsave()
    {


        $input = Input::all();

        $user = new Content();


        $user->title = $input['name'];
        $user->content = $input['comment'];

        $user->save();


        return Redirect::route('viewpages');


    }


    public function updatecon()
    {


        //$id=Input::get($id);


        $id = Input::get('id');


        $entry = array(

            'email' => Input::get('email'),
            'name' => Input::get('name'),

            'subject' => Input::get('subject'),
            'message' => Input::get('message')


        );

        Contact::where('id', $id)->update($entry);

        //Author::update


        return Redirect::route('viewcontact');


    }


    public function activated($id)
    {


        $pick = DB::table('template')->get();
        foreach ($pick as $hello) {

            if ($hello->id == $id) {

                $entry = array(

                    'publish' => 'on'


                );

                Template::where('id', '=', $id)->update($entry);


            } else {

                $entry = array(

                    'publish' => null


                );

                Template::where('id', '=', $hello->id)->update($entry);


            }


        }

        Session::flash('success', "Successfully Updated");
        return Redirect::route('template');

    }


    public function pageupdate()
    {


        $id = Input::get('id');


        $entry = array(

            'title' => Input::get('title'),
            'description' => Input::get('description'),

            'keyword' => Input::get('keyword'),


            'content' => Input::get('content'),
            'publish' => Input::get('publish')

        );

        Pages::where('id', $id)->update($entry);

        //Author::update


        // return Redirect::route('pages');

        return Redirect::to('pages')->with('msg', 'Successfully Updated');


    }


    public function pagedelete($id)
    {

        Pages::find($id)->delete();

        //return Redirect::route('pages');
        return Redirect::to('pages')->with('msg', 'Successfully Deleted');

    }


    public function deletemem($id)
    {


        $plan = DB::table('membershipplan')
            ->where('id', $id)
            ->first();

        $plans = $plan->name;


        $like = DB::table('users')->get();


        foreach ($like as $hello) {

            $entry = array(

                'plan' => 'member'
            );

            User::where('plan', '=', $plans)->update($entry);


        }


        Membershipplan::find($id)->delete();


        //    return Redirect::route('membership');

        return Redirect::to('membership')->with('msg', 'Successfully Deleted');

    }


    public function contentdelete($id)
    {

        Content::find($id)->delete();
        return Redirect::route('viewpages');

    }


    public function viewpages()
    {

        $view = View::make('content.viewpages')->with('viewpages', Content::All());
        $this->layout->with('colors', Settings::All());
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;

    }

    public function pages()
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

            $view = View::make('content.pages')->with('viewpages', Pages::All());
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;

        } else {
//return Redirect::route('notaccess');
            App::abort(404);
        }


    }

    public function membership()
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


            $view = View::make('content.membership')->with('admins', Membershipplan::All())->with('pick', $pick);
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;

        } else {
//return Redirect::to('notaccess');
            App::abort(404);
        }


    }

    public function createmember()
    {

        $pick = DB::table('membershipplan')
            ->where('name', Auth::user()->plan)
            ->first();

        if ($pick->removemember == 'on') {
            $view = View::make('content.createmember');
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;


        } else {

            return Redirect::route('membership');
        }


    }


    public function creatememberplan()
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


            $view = View::make('content.creatememberplan');
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;

        } else {
//return Redirect::route('notaccess');
            App::abort(404);
        }


    }


    public function contentedit($id)
    {

        $view = View::make('content.contentedit')->with('contentedit', Content::find($id));
        $this->layout->with('colors', Settings::All());
        $this->layout->with('logo', Logo::find(1));
        $this->layout->content = $view;

    }


    public function pageedit($id)
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


            $view = View::make('content.pageedit')->with('pageedit', Pages::find($id));
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;
        } else {
            //return Redirect::route('notaccess');
            App::abort(404);
        }


    }

    public function updatecontent()
    {
        //$id=Input::get($id);


        $id = Input::get('id');


        $entry = array(

            'title' => Input::get('name'),
            'content' => Input::get('message')


        );

        Content::where('id', $id)->update($entry);

        //Author::update


        return Redirect::route('viewpages');


    }
}
