<?php


class FrontprofileController extends BaseController
{


    public $restful = true;
    //public $layout='layouts.fb';
    public $layout = 'layouts.fbprofile';
    public $output = array();
    public $outputs = array();
    public $mess = array();
    public $messs = array();

    public $online = array();
    public $postlist = array();

    /**
     * @method profile
     *
     * @param
     *
     * @return array
     *
     *Public Function
     */
    public function profile()
    {

        if (!Auth::check()) {

            return Redirect::to('home');
        }


        $langg = DB::table('addlanguage')
            ->first();

        $set = $langg->lang;


        if (!Session::get('locale') || $set == Session::get('locale')) {

            Session::put('locale', $set);

        }


        App::setLocale(Session::get('locale'));


        $rand = Auth::user()->rand;

        $userid = Auth::user()->id;
        $value = DB::table('profile')
            ->where('user_rand', $rand)
            ->get();
        $pick = DB::table('profile')
            ->where('user_rand', $rand)
            ->first();
        $allimg = DB::table('profile')->get();

        $photos = count($value);
        $values = DB::table('post')
            ->where('user_rand', $rand)->orderBy('created_at', 'desc')
            ->get();

        $postcomment = DB::table('postcomment')->get();

        $events = DB::table('createevent')
            ->where('user', $rand)->orderBy('dates', 'ASC')
            ->get();


        $rand = Auth::user()->rand;


        $lists = DB::table('friends')
            ->where('otheruser', $rand)
            ->get();


        global $outputs;
        foreach ($lists as $hello) {


            $otheruser = $hello->mainuser;

            $unifriend = DB::table('users')
                ->where('rand', $otheruser)
                ->first();

            if ($unifriend) {

                $unifriends = $unifriend->name;

                $uname = $unifriend->uname;

                $otherrands = $unifriend->rand;

                $idd = $unifriend->id;

                $city = $unifriend->city;
                $location = $unifriend->location;

                $sex = $unifriend->sex;

            } else {

                $unifriends = '';

                $otherrands = '';

                $idd = '';

                $uname = '';

                $city = '';
                $location = '';

                $sex = '';

            }


            $snap = DB::table('profile')
                ->where('user_rand', $otheruser)
                ->first();

            if ($snap != null) {

                $profilephoto = $snap->thumb;

            } else {

                if ($sex == 'male') {
                    $profilephoto = 'imagesfb/male.jpg';

                } else {

                    $profilephoto = 'imagesfb/female.jpg';
                }


            }


            if ($unifriend->account == null || $unifriend->account == '1') {


                $onlineblck = DB::table('block')
                    ->where(['other' => $otherrands, 'user' => $rand])
                    ->orWhere(['user' => $otherrands, 'other' => $rand])
                    ->get();


                if ($onlineblck) {

                    foreach ($onlineblck as $onbck) {

                        if ($onbck->other == $otherrands && $onbck->user == Auth::user()->rand || $onbck->user == $otherrands && $onbck->other == Auth::user()->rand) {


                        } else {

                            $outputs[] = array('name' => $unifriends,
                                'profilephoto' => $profilephoto,
                                'idd' => $idd,
                                'uname' => $uname,
                                'city' => $city,
                                'location' => $location,
                                'otherrands' => $otherrands


                            );
                        }


                    }

                } else {

                    $outputs[] = array('name' => $unifriends,
                        'profilephoto' => $profilephoto,
                        'idd' => $idd,
                        'uname' => $uname,
                        'city' => $city,
                        'location' => $location,
                        'otherrands' => $otherrands


                    );
                }


            }

        }

        $list = DB::table('friends')
            ->where('mainuser', $rand)
            ->get();


        global $outputss;
        foreach ($list as $hello) {


            $otheruser = $hello->otheruser;

            $unifriend = DB::table('users')
                ->where('rand', $otheruser)
                ->first();

            if ($unifriend) {
                $unifriends = $unifriend->name;


                $uname = $unifriend->uname;


                $otherrands = $unifriend->rand;

                $sex = $unifriend->sex;

                $idd = $unifriend->id;

                $city = $unifriend->city;
                $location = $unifriend->location;

            } else {

                $unifriends = '';

                $otherrands = '';

                $uname = '';

                $idd = '';

                $city = '';
                $location = '';

                $sex = '';

            }


            $snap = DB::table('profile')
                ->where('user_rand', $otheruser)
                ->first();


            if ($snap != null) {

                $profilephoto = $snap->thumb;

            } else {

                if ($sex == 'male') {
                    $profilephoto = 'imagesfb/male.jpg';

                } else {

                    $profilephoto = 'imagesfb/female.jpg';
                }


            }


            if ($unifriend->account == null || $unifriend->account == '1') {


                $onlineblck = DB::table('block')
                    ->where(['other' => $otherrands, 'user' => $rand])
                    ->orWhere(['user' => $otherrands, 'other' => $rand])
                    ->get();


                if ($onlineblck) {

                    foreach ($onlineblck as $onbck) {

                        if ($onbck->other == $otherrands && $onbck->user == Auth::user()->rand || $onbck->user == $otherrands && $onbck->other == Auth::user()->rand) {


                        } else {

                            $outputss[] = array('name' => $unifriends,
                                'profilephoto' => $profilephoto,
                                'idd' => $idd,
                                'uname' => $uname,
                                'city' => $city,
                                'location' => $location,
                                'otherrands' => $otherrands

                            );
                        }


                    }

                } else {


                    $outputss[] = array('name' => $unifriends,
                        'profilephoto' => $profilephoto,
                        'idd' => $idd,
                        'city' => $city,
                        'uname' => $uname,
                        'location' => $location,
                        'otherrands' => $otherrands

                    );
                }


            }

        }


        $perPage = 10;

        if (Input::get('page')) {
            $currentPage = Input::get('page') - 1;
        } else {

            $currentPage = 0;
        }

        $pagedData = array_slice($values, $currentPage * $perPage, $perPage);
        $matches = Paginator::make($pagedData, count($values), $perPage);


        $rand = Auth::user()->rand;
        $block = DB::table('block')
            ->where('user', $rand)
            ->get();


        $alluser = DB::table('users')->get();


        if (Request::ajax()) {


            $view = View::make('fb.renpro')->with('alluser', $alluser)->with('allimg', $allimg)->with('block', $block)->with('outputs', $outputs)->with('outputss', $outputss)->with('events', $events)->with('profile', $value)->with('pick', $pick)->with('post', $matches)->with('photos', $photos)->with('postcomment', $postcomment)->render();


            return Response::json(array('contents' => $view));


        } else {


            $view = View::make('fb.profile')->with('alluser', $alluser)->with('allimg', $allimg)->with('block', $block)->with('outputs', $outputs)->with('outputss', $outputss)->with('events', $events)->with('profile', $value)->with('pick', $pick)->with('post', $matches)->with('photos', $photos)->with('postcomment', $postcomment);


            $this->layout->with('colors', Template::All());
            $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
            $this->layout->content = $view;

        }
    }


    /**
     * @method news
     *
     * @param
     *
     * @return array
     *
     *Public Function
     */
    public function news()
    {

        if (!Auth::check()) {

            return Redirect::to('home');
        }


        $langg = DB::table('addlanguage')
            ->first();

        $set = $langg->lang;

        if (!Session::get('locale') || $set == Session::get('locale')) {

            Session::put('locale', $set);

        }


        App::setLocale(Session::get('locale'));


        $rand = Auth::user()->rand;

        $userid = Auth::user()->id;
        $value = DB::table('profile')
            ->where('user_rand', $rand)
            ->get();
        $pick = DB::table('profile')
            ->where('user_rand', $rand)
            ->first();


        $allimg = DB::table('profile')->get();

        $alluser = DB::table('users')->get();


        $photos = count($value);


        $frnd = DB::table('friends')
            ->where(['otheruser' => $rand])
            ->orWhere(['mainuser' => $rand])
            ->get();


        if ($frnd) {


            $i = 0;
            foreach ($frnd as $hello) {


                if ($hello->otheruser == $rand) {

                    $frndpost = $hello->mainuser;


                } else {

                    $frndpost = $hello->otheruser;


                }

                $checkblock = DB::table('block')
                    ->where(['other' => $frndpost, 'user' => $rand])
                    ->orWhere(['user' => $frndpost, 'other' => $rand])
                    ->first();

                if (!$checkblock) {


                    $values = DB::table('post')
                        ->where('user_rand', $frndpost)->orderBy('created_at', 'desc')
                        ->get();


                    foreach ($values as $hello) {


                        global $postlist;

                        $postlist[] = array('post' => $hello->post,
                            'path' => $hello->path,
                            'user_rand' => $hello->user_rand,
                            'like' => $hello->like,
                            'imagessvideo' => $hello->imagessvideo,
                            'curdate' => $hello->curdate,
                            'id' => $hello->id

                        );


                    }

                }

                if ($i == 0) {

                    $unival = DB::table('post')
                        ->where('user_rand', $rand)->orderBy('created_at', 'desc')
                        ->get();

                    foreach ($unival as $hello) {


                        $postlist[] = array('post' => $hello->post,
                            'path' => $hello->path,
                            'user_rand' => $hello->user_rand,
                            'like' => $hello->like,
                            'imagessvideo' => $hello->imagessvideo,
                            'curdate' => $hello->curdate,
                            'id' => $hello->id

                        );

                    }

                }


                $i++;
            }


            $id = array();

            foreach ($postlist as $val => $key) {


                $id[$val] = $key['id'];


            }

            array_multisort($id, SORT_DESC, $postlist);


        } else {

            $unival = DB::table('post')
                ->where('user_rand', $rand)->orderBy('created_at', 'desc')
                ->get();

            if ($unival) {

                foreach ($unival as $hello) {

                    global $postlist;


                    $postlist[] = array('post' => $hello->post,
                        'path' => $hello->path,
                        'user_rand' => $hello->user_rand,
                        'like' => $hello->like,
                        'imagessvideo' => $hello->imagessvideo,
                        'curdate' => $hello->curdate,
                        'id' => $hello->id

                    );

                }

            } else {

                global $postlist;


                $postlist[] = array('post' => '',
                    'path' => '',
                    'user_rand' => '',
                    'like' => '',
                    'imagessvideo' => '',
                    'curdate' => '',
                    'id' => ''

                );


            }

        }


        $postcomment = DB::table('postcomment')->get();

        $events = DB::table('createevent')
            ->where('user', $rand)->orderBy('dates', 'ASC')
            ->get();


        $rand = Auth::user()->rand;


        $lists = DB::table('friends')
            ->where('otheruser', $rand)
            ->get();


        global $outputs;
        foreach ($lists as $hello) {


            $otheruser = $hello->mainuser;

            $unifriend = DB::table('users')
                ->where('rand', $otheruser)
                ->first();

            if ($unifriend) {

                $unifriends = $unifriend->name;

                $uname = $unifriend->uname;

                $otherrands = $unifriend->rand;

                $idd = $unifriend->id;

                $city = $unifriend->city;
                $location = $unifriend->location;

                $sex = $unifriend->sex;

            } else {

                $unifriends = '';

                $otherrands = '';

                $uname = '';

                $idd = '';

                $city = '';
                $location = '';

                $sex = '';

            }


            $snap = DB::table('profile')
                ->where('user_rand', $otheruser)
                ->first();

            if ($snap != null) {

                $profilephoto = $snap->thumb;

            } else {

                if ($sex == 'male') {
                    $profilephoto = 'imagesfb/male.jpg';

                } else {

                    $profilephoto = 'imagesfb/female.jpg';
                }


            }


            if ($unifriend->account == null || $unifriend->account == '1') {


                $onlineblck = DB::table('block')
                    ->where(['other' => $otherrands, 'user' => $rand])
                    ->orWhere(['user' => $otherrands, 'other' => $rand])
                    ->get();


                if ($onlineblck) {

                    foreach ($onlineblck as $onbck) {

                        if ($onbck->other == $otherrands && $onbck->user == Auth::user()->rand || $onbck->user == $otherrands && $onbck->other == Auth::user()->rand) {


                        } else {

                            $outputss[] = array('name' => $unifriends,
                                'profilephoto' => $profilephoto,
                                'idd' => $idd,
                                'city' => $city,
                                'uname' => $uname,
                                'location' => $location,
                                'otherrands' => $otherrands

                            );
                        }

                    }

                } else {

                    $outputs[] = array('name' => $unifriends,
                        'profilephoto' => $profilephoto,
                        'idd' => $idd,
                        'city' => $city,
                        'uname' => $uname,
                        'location' => $location,
                        'otherrands' => $otherrands


                    );
                }


            }

        }

        $list = DB::table('friends')
            ->where('mainuser', $rand)
            ->get();


        global $outputss;
        foreach ($list as $hello) {


            $otheruser = $hello->otheruser;

            $unifriend = DB::table('users')
                ->where('rand', $otheruser)
                ->first();

            if ($unifriend) {
                $unifriends = $unifriend->name;

                $uname = $unifriend->uname;

                $otherrands = $unifriend->rand;

                $sex = $unifriend->sex;

                $idd = $unifriend->id;

                $city = $unifriend->city;
                $location = $unifriend->location;

            } else {

                $unifriends = '';

                $otherrands = '';

                $idd = '';

                $uname = '';

                $city = '';
                $location = '';

                $sex = '';

            }


            $snap = DB::table('profile')
                ->where('user_rand', $otheruser)
                ->first();


            if ($snap != null) {

                $profilephoto = $snap->thumb;

            } else {

                if ($sex == 'male') {
                    $profilephoto = 'imagesfb/male.jpg';

                } else {

                    $profilephoto = 'imagesfb/female.jpg';
                }


            }


            if ($unifriend->account == null || $unifriend->account == '1') {


                $onlineblck = DB::table('block')
                    ->where(['other' => $otherrands, 'user' => $rand])
                    ->orWhere(['user' => $otherrands, 'other' => $rand])
                    ->get();


                if ($onlineblck) {

                    foreach ($onlineblck as $onbck) {

                        if ($onbck->other == $otherrands && $onbck->user == Auth::user()->rand || $onbck->user == $otherrands && $onbck->other == Auth::user()->rand) {


                        } else {

                            $outputss[] = array('name' => $unifriends,
                                'profilephoto' => $profilephoto,
                                'idd' => $idd,
                                'uname' => $uname,
                                'city' => $city,
                                'location' => $location,
                                'otherrands' => $otherrands

                            );
                        }

                    }

                } else {

                    $outputss[] = array('name' => $unifriends,
                        'profilephoto' => $profilephoto,
                        'idd' => $idd,
                        'city' => $city,
                        'uname' => $uname,
                        'location' => $location,
                        'otherrands' => $otherrands

                    );
                }


            }

        }


        $rand = Auth::user()->rand;


        $block = DB::table('block')
            ->where(['other' => $rand])
            ->orWhere(['user' => $rand])
            ->get();


        $perPage = 10;
        if (Input::get('page')) {
            $currentPage = Input::get('page') - 1;
        } else {

            $currentPage = 0;
        }
        $pagedData = array_slice($postlist, $currentPage * $perPage, $perPage);
        $matches = Paginator::make($pagedData, count($postlist), $perPage);


        if (Request::ajax()) {


            $view = View::make('fb.ren')->with('alluser', $alluser)->with('allimg', $allimg)->with('block', $block)->with('outputs', $outputs)->with('outputss', $outputss)->with('events', $events)->with('profile', $value)->with('pick', $pick)->with('post', $matches)->with('photos', $photos)->with('postcomment', $postcomment)->render();


            return Response::json(array('contents' => $view));


        } else {

            $view = View::make('fb.news')->with('alluser', $alluser)->with('allimg', $allimg)->with('block', $block)->with('outputs', $outputs)->with('outputss', $outputss)->with('events', $events)->with('profile', $value)->with('pick', $pick)->with('post', $matches)->with('photos', $photos)->with('postcomment', $postcomment);


            $this->layout->with('colors', Template::All());
            $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
            $this->layout->content = $view;


        }


    }


    /**
     * @method news
     *
     * @param
     *
     * @return redirect back
     *
     *Public Function
     */
    public function chooser()
    {

        Session::put('locale', Input::get('locale'));
        return Redirect::back();


    }

    /**
     * @method block
     *
     * @param INT $id
     *
     * @return redirect page
     *
     *Public Function
     */
    public function block($name)
    {


        $seo = User::where('uname', '=', $name)->first();

        if (!$seo) {
//return Redirect::route('notaccess');
            App::abort(404);
        }


        $id = $seo->id;

        $rand = Auth::user()->rand;

        $other = DB::table('users')->where('id', $id)->first();

        $others = $other->rand;

        $idss = $other->id;

        $name = $other->name;

        $uname = $other->uname;

        $profile = DB::table('profile')->where('user_rand', $others)->first();

        if ($profile) {
            $path = $profile->path;
        } else {


            if ($other->sex == 'male') {

                $path = '../imagesfb/male.jpg';

            } else {

                $path = '../imagesfb/female.jpg';


            }


        }


        $doc = new Block();

        $doc->user = $rand;
        $doc->other = $others;
        $doc->idss = $idss;
        $doc->name = $name;
        $doc->uname = $uname;
        $doc->profile = $path;

        $doc->save();


        // Block::where(['mainuser' => $rand, 'otheruser' =>$others])
        //                   ->orWhere(['mainuser' => $others, 'otheruser' => $rand])
        //                   ->delete();


        return Redirect::to('profile');


    }

    /**
     * @method unblock
     *
     * @param INT $id
     *
     * @return redirect back
     *
     *Public Function
     */
    public function unblock($name)
    {

        $seo = User::where('uname', '=', $name)->first();

        if (!$seo) {
            App::abort(404);
        }

        $id = $seo->id;

        $rand = Auth::user()->rand;

        $other = DB::table('users')->where('id', $id)->first();

        $others = $other->rand;

        Block::where('user', '=', $rand)->where('other', '=', $others)->delete();


        return Redirect::back();


    }


    /**
     * @method choosers
     *
     * @param INT $id
     *
     * @return redirect back
     *
     *Public Function
     */
    public function choosers($id)
    {

//Cookie::forever('locale', $id);


        Session::set('locale', $id);

        return Redirect::back();


    }


    /**
     * @method ajaxreq
     *
     * @param INT $id
     *
     * @return return json
     *
     *Public Function
     */
    public function ajaxreq($id)
    {


        if ($_FILES["imagesss"]["name"] != null) {
            $validextensions = array("jpeg", "jpg", "png");
            $temporary = explode(".", $_FILES["imagesss"]["name"]);
            $file_extension = end($temporary);
            $file_extension = strtolower($file_extension);
            if ((($_FILES["imagesss"]["type"] == "image/png") || ($_FILES["imagesss"]["type"] == "image/jpg") || ($_FILES["imagesss"]["type"] == "image/jpeg")
                ) && in_array($file_extension, $validextensions)
            ) {

                if ($_FILES["imagesss"]["error"] > 0) {
                    echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
                } else {

                    $sourcePath = $_FILES['imagesss']['tmp_name'];   // Storing source path of the file in a variable

                    $random = str_random(5);
                    $targetPath = "uploads/" . $random . $_FILES['imagesss']['name'];  // Target path where file is to be stored
                    move_uploaded_file($sourcePath, $targetPath); //  Moving Uploaded file

                    $user = Input::get('user');
                    //$comment=Input::get('comment');
                    $comment = strip_tags(Input:: get('comment'));
                    $name = Input::get('name');


                    $doc = new Postcomment();

                    $doc->user = $user;
                    $doc->comment = $comment;
                    $doc->post_id = $id;
                    $doc->path = $targetPath;
                    $doc->name = $name;
                    $doc->save();
                    date_default_timezone_set('Asia/Calcutta');
                    $foo = date("h:i:sa");

                    $commentid = $doc->id;

                    $rand = Auth::user()->rand;


                    $postids = DB::table('post')->where('id', $id)->first();

                    $rand_other = $postids->user_rand;

                    $othuser = User::where('rand', '=', $rand_other)->first();
                    $docs = new Notilike();

                    $docs->user = $rand;
                    $docs->postlike = $id;
                    $docs->email = $othuser->email;
                    $docs->otheruser = $rand_other;
                    $docs->timess = $foo;
                    $docs->comment = $comment;
                    $docs->commentid = $commentid;
                    $docs->save();


                    $insert_id = $doc->id;


                    global $output;


                    $output[] = array('user' => $user,
                        'comment' => $comment,
                        'idss' => $id,
                        'names' => $name,
                        'insert_id' => $insert_id,
                        'targetPath' => $targetPath
                    );


                    return json_encode($output, JSON_FORCE_OBJECT);

                }
            } else {
                echo "<span id='invalid'>***Invalid file Size or Type***<span>";
            }
        } elseif ($_FILES["imagessvideo"]["name"] != null) {

            $sourcePath = $_FILES['imagessvideo']['tmp_name'];   // Storing source path of the file in a variable
            $random = str_random(5);
            $targetPath = "uploads/" . $random . $_FILES['imagessvideo']['name'];  // Target path where file is to be stored
            move_uploaded_file($sourcePath, $targetPath); //  Moving Uploaded file

            $user = Input::get('user');
            $comment = strip_tags(Input:: get('comment'));
            $name = Input::get('name');


            $doc = new Postcomment();

            $doc->user = $user;
            $doc->comment = $comment;
            $doc->post_id = $id;
            $doc->imagessvideo = $targetPath;
            $doc->name = $name;
            $doc->save();
            date_default_timezone_set('Asia/Calcutta');
            $foo = date("h:i:sa");

            $commentid = $doc->id;

            $rand = Auth::user()->rand;


            $postids = DB::table('post')->where('id', $id)->first();

            $rand_other = $postids->user_rand;

            $othuser = User::where('rand', '=', $rand_other)->first();

            $docs = new Notilike();

            $docs->user = $rand;
            $docs->postlike = $id;
            $docs->email = $othuser->email;
            $docs->otheruser = $rand_other;
            $docs->timess = $foo;
            $docs->comment = $comment;
            $docs->commentid = $commentid;
            $docs->save();


            $insert_id = $doc->id;


            global $output;


            $output[] = array('user' => $user,
                'comment' => $comment,
                'idss' => $id,
                'names' => $name,
                'insert_id' => $insert_id,
                'targetvideo' => $targetPath
            );


            return json_encode($output, JSON_FORCE_OBJECT);


        } else {


            $user = Input::get('user');
            $comment = strip_tags(Input:: get('comment'));
            $name = Input::get('name');


            $doc = new Postcomment();

            $doc->user = $user;
            $doc->comment = $comment;
            $doc->post_id = $id;
            $doc->name = $name;
            $doc->save();
            date_default_timezone_set('Asia/Calcutta');
            $foo = date("h:i:sa");

            $commentid = $doc->id;

            $rand = Auth::user()->rand;


            $postids = DB::table('post')->where('id', $id)->first();

            $rand_other = $postids->user_rand;

            $othuser = User::where('rand', '=', $rand_other)->first();

            $docs = new Notilike();

            $docs->user = $rand;
            $docs->email = $othuser->email;
            $docs->postlike = $id;
            $docs->otheruser = $rand_other;
            $docs->timess = $foo;
            $docs->comment = $comment;
            $docs->commentid = $commentid;
            $docs->save();
            $insert_id = $doc->id;

            global $output;

            $output[] = array('user' => $user,
                'comment' => $comment,
                'idss' => $id,
                'names' => $name,
                'insert_id' => $insert_id
            );


            return json_encode($output, JSON_FORCE_OBJECT);

        }
    }


    /**
     * @method allevent
     *
     * @param INT $id
     *
     * @return void
     *
     *Public Function
     */
    public function allevent($name)
    {

        $seo = DB::table('users')
            ->where('uname', $name)
            ->first();

        if (!$seo) {
//return Redirect::route('notaccess');
            App::abort(404);
        }

        $id = $seo->id;


        if (!Auth::check()) {

            return Redirect::to('home');
        }


        $langg = DB::table('addlanguage')
            ->first();

        $set = $langg->lang;

        if (!Session::get('locale') || $set == Session::get('locale')) {

            Session::put('locale', $set);

        }


        App::setLocale(Session::get('locale'));

        $rand = DB::table('users')
            ->where('id', $id)
            ->first();

        $rands = $rand->rand;


        $events = DB::table('createevent')
            ->where('user', $rands)->orderBy('dates', 'ASC')
            ->get();


        $view = View::make('fb.allevent')->with('events', $events);


        $this->layout->with('colors', Template::All());
        $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
        $this->layout->content = $view;
    }

    /**
     * @method test
     *
     * @param
     *
     * @return void
     *
     *Public Function
     */
    public function test()
    {


        $view = View::make('fb.test');


        $this->layout->with('colors', Template::All());
        $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
        $this->layout->content = $view;
    }


    /**
     * @method fbsetting
     *
     * @param
     *
     * @return void
     *
     *Public Function
     */
    public function fbsetting()
    {


        if (!Auth::check()) {

            return Redirect::to('home');
        }


        $langg = DB::table('addlanguage')
            ->first();

        $set = $langg->lang;

        if (!Session::get('locale') || $set == Session::get('locale')) {

            Session::put('locale', $set);

        }


        App::setLocale(Session::get('locale'));

        $rand = Auth::user()->rand;
        $block = DB::table('block')
            ->where('user', $rand)
            ->get();

        $id = Auth::user()->id;
        $online = DB::table('onlineuser')
            ->where('user_rand', $id)
            ->first();


        $id = Auth::user()->id;
        $account = DB::table('users')
            ->where('id', $id)
            ->first();


        $view = View::make('fb.fbsetting')->with('block', $block)->with('online', $online)->with('account', $account);


        $this->layout->with('colors', Template::All());
        $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
        $this->layout->content = $view;
    }


    /**
     * @method onlineuser
     *
     * @param INT $id
     *
     * @return return json
     *
     *Public Function
     */
    public function onlineuser($id)
    {


        $doc = new Onlineuser();

        date_default_timezone_set('Asia/Calcutta');
        $foo = date("h-i");

        $value = DB::table('onlineuser')
            ->where('user_rand', $id)
            ->first();

        if ($value) {


            if ($value->chat == 1 || $value->chat == null) {


                $entry = array(

                    'user_rand' => $id,
                    'timess' => $foo

                );

                Onlineuser::where('user_rand', '=', $id)->update($entry);


            }


        } else {

            $doc->user_rand = $id;
            $doc->timess = $foo;

            $doc->save();


        }


        global $online;


        $like = DB::table('onlineuser')
            ->where('timess', $foo)
            ->get();


        foreach ($like as $hello) {


            $online[] = array('userrand' => $hello->user_rand

            );

        }


        return json_encode($online, JSON_FORCE_OBJECT);

    }


    /**
     * @method eventsdelete
     *
     * @param INT $id
     *
     * @return redirect page
     *
     *Public Function
     */
    public function eventsdelete($id)
    {

        $ids = Auth::user()->id;


        Createevent::find($id)->delete();


        return Redirect::back();
        // return Redirect::to('allevent/'.$ids.'');

    }

    /**
     * @method profiledetails
     *
     * @param
     *
     * @return void
     *
     *Public Function
     */
    public function profiledetails()
    {
        if (!Auth::check()) {

            return Redirect::to('home');
        }


        $langg = DB::table('addlanguage')
            ->first();

        $set = $langg->lang;

        if (!Session::get('locale') || $set == Session::get('locale')) {

            Session::put('locale', $set);

        }


        App::setLocale(Session::get('locale'));


        $rand = Auth::user()->rand;

        $value = DB::table('profile')
            ->where('user_rand', $rand)
            ->first();

        $user = DB::table('users')
            ->where('rand', $rand)
            ->first();


        $view = View::make('fb.profiledetails')->with('profile', $value)->with('user', $user);

        $this->layout->with('colors', Template::All());
        $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
        $this->layout->content = $view;
    }

    /**
     * @method about
     *
     * @param INT $id
     *
     * @return void
     *
     *Public Function
     */
    public function about($name)
    {

        if (!Auth::check()) {

            return Redirect::to('home');
        }

        $seo = User::where('uname', '=', $name)->first();

        if (!$seo) {
//return Redirect::route('notaccess');
            App::abort(404);
        }
        $id = $seo->id;


        $langg = DB::table('addlanguage')
            ->first();

        $set = $langg->lang;

        if (!Session::get('locale') || $set == Session::get('locale')) {

            Session::put('locale', $set);

        }


        App::setLocale(Session::get('locale'));


        $pro = DB::table('users')
            ->where('id', $id)
            ->first();

        $other = $pro->rand;


        $value = DB::table('profile')
            ->where('user_rand', $other)
            ->first();

        $user = DB::table('users')
            ->where('rand', $other)
            ->first();


        $view = View::make('fb.about')->with('profile', $value)->with('user', $user);

        $this->layout->with('colors', Template::All());
        $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
        $this->layout->content = $view;
    }


    /**
     * @method contactform
     *
     * @param
     *
     * @return void
     *
     *Public Function
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
     * @method profileupdated
     *
     * @param
     *
     * @return redirect page
     *
     *Public Function
     */
    public function profileupdated()
    {


        $name = strip_tags(Input:: get('name'));
        $names = preg_replace("/[^a-zA-Z0-9- ]+/", "", html_entity_decode($name, ENT_QUOTES));


        $phone = strip_tags(Input:: get('phone'));
        $phones = preg_replace("/[^a-zA-Z0-9- ]+/", "", html_entity_decode($phone, ENT_QUOTES));

        $location = strip_tags(Input:: get('location'));
        $locations = preg_replace("/[^a-zA-Z0-9- ]+/", "", html_entity_decode($location, ENT_QUOTES));

        $city = strip_tags(Input:: get('city'));
        $citys = preg_replace("/[^a-zA-Z0-9- ]+/", "", html_entity_decode($city, ENT_QUOTES));


        $education = strip_tags(Input:: get('education'));
        $educations = preg_replace("/[^a-zA-Z0-9- ]+/", "", html_entity_decode($education, ENT_QUOTES));

        $work = strip_tags(Input:: get('work'));
        $works = preg_replace("/[^a-zA-Z0-9- ]+/", "", html_entity_decode($work, ENT_QUOTES));


        $event = strip_tags(Input:: get('event'));
        $events = preg_replace("/[^a-zA-Z0-9- ]+/", "", html_entity_decode($event, ENT_QUOTES));


        $rand = Auth::user()->rand;

        $pass = Input::get('password');


        if ($pass == '') {


            $entry = array(

                'name' => $names,

                'phone' => $phones,
                'location' => $locations,
                'city' => $citys,
                'education' => $educations,
                'work' => $works,
                'event' => $events,
                'bodytype' => Input:: get('silhouette'),
                'height' => Input:: get('length'),
                'haircolor' => Input:: get('hairColor'),
                'eyecolor' => Input:: get('eyeColor')
            );

            User::where('rand', '=', $rand)->update($entry);


        } else {

            $password = Hash::make($pass);


            $entry = array(

                'name' => strip_tags(Input:: get('name')),
                'password' => $password,
                'phone' => strip_tags(Input:: get('phone')),
                'location' => strip_tags(Input:: get('location')),
                'city' => strip_tags(Input:: get('city')),
                'education' => strip_tags(Input:: get('education')),
                'work' => strip_tags(Input:: get('work')),
                'event' => strip_tags(Input:: get('event')),
                'bodytype' => Input:: get('silhouette'),
                'height' => Input:: get('length'),
                'haircolor' => Input:: get('hairColor'),
                'eyecolor' => Input:: get('eyeColor')
            );

            User::where('rand', '=', $rand)->update($entry);

        }


        return Redirect::route('profiledetails');
    }


    /**
     * @method createevent
     *
     * @param
     *
     * @return redirect page
     *
     *Public Function
     */
    public function createevent()
    {

        $dates = strip_tags(Input:: get('dates'));
        if ($dates == '') {

            return Redirect::to('home');
        }

        $rand = Auth::user()->rand;

        $id = Auth::user()->id;

        $uname = Auth::user()->uname;


        $event = strip_tags(Input:: get('event'));

        $address = strip_tags(Input:: get('address'));

        $pieces = explode(" ", $dates);


        $doc = new Createevent();

        $doc->user = $rand;
        $doc->event = $event;
        $doc->address = $address;
        $doc->dates = $pieces[0];
        $doc->timess = $pieces[1] . $pieces[2];
        $doc->save();


        //return Redirect::route('allevent/'.$id.'');
        return Redirect::to('allevent/' . $uname . '');
    }


    /**
     * @method notification
     *
     * @param INT $id
     *
     * @return json
     *
     *Public Function
     */
    public function notification($id)
    {


        $rand = Auth::user()->rand;

        $notification = DB::table('notification')
            ->where('friendrequest', $id)
            ->get();


        $count = count($notification);

        $like = DB::table('like')->where('user_rand', '=', $rand)->get();

        if ($like) {


            $counts = count($like);
            global $output;


            foreach ($like as $hello) {


                $output[] = array('count' => $count,
                    'like' => $hello->postid,
                    'check' => $hello->count

                );

            }

        } else {

            global $output;


            $output[] = array('count' => $count


            );


        }


        return json_encode($output, JSON_FORCE_OBJECT);


    }


    /**
     * @method notifications
     *
     * @param
     *
     * @return void
     *
     *Public Function
     */
    public function notifications()
    {

        if (!Auth::check()) {

            return Redirect::to('home');
        }


        $rand = Auth::user()->rand;

        $randid = Auth::user()->id;


        $notification = DB::table('notilike')
            ->where('otheruser', $rand)->where('user', '!=', $rand)->orderBy('created_at', 'desc')
            ->get();
        global $output;
        foreach ($notification as $hello) {

            $mainuser = $hello->user;

            $friendaccept = $hello->friendaccept;


            $commentid = $hello->commentid;

            $notificationlike = DB::table('users')
                ->where('rand', $mainuser)
                ->first();

            $name = $notificationlike->name;

            $uname = $notificationlike->uname;

            $timess = $hello->timess;
            $comment = $hello->comment;

            $created_at = $hello->created_at;

            $idss = $notificationlike->id;
            $output[] = array('postlike' => $hello->postlike,
                'main' => $mainuser,
                'name' => $name,
                'uname' => $uname,
                'idss' => $idss,
                'timess' => $timess,
                'comment' => $comment,
                'commentid' => $commentid,
                'notiid' => $hello->id,
                'read' => $hello->read,
                'randid' => $randid,
                'created_at' => $created_at,
                'friendaccept' => $friendaccept


            );

        }

        $recommended = DB::table('friends')->where('mainuser', '!=', $rand)->where('otheruser', '!=', $rand)->distinct()->select('mainuser')->get();

        global $outputs;

        foreach ($recommended as $hello) {


            $userinfo = DB::table('users')
                ->where('rand', $hello->mainuser)
                ->first();


            $snap = DB::table('profile')
                ->where('user_rand', $hello->mainuser)
                ->first();

            if ($snap) {

                $image = $snap->path;
            } else {
                if ($userinfo->sex == 'male') {

                    $image = '../imagesfb/male.jpg';

                } else {

                    $image = '../imagesfb/female.jpg';


                }

            }


            $outputs[] = array('idss' => $userinfo->id,
                'name' => $userinfo->name,
                'uname' => $userinfo->uname,
                'path' => $image


            );


        }


        $langg = DB::table('addlanguage')
            ->first();

        $set = $langg->lang;

        if (!Session::get('locale') || $set == Session::get('locale')) {

            Session::put('locale', $set);

        }


        App::setLocale(Session::get('locale'));


        $perPage = 10;

        if (Input::get('page')) {
            $currentPage = Input::get('page') - 1;
        } else {

            $currentPage = 0;
        }

        if ($output != null) {
            $pagedData = array_slice($output, $currentPage * $perPage, $perPage);
            $matches = Paginator::make($pagedData, count($output), $perPage);

        } else {

            $matches = $output;
        }


        $view = View::make('fb.notifications')->with('notilike', $matches)->with('outputs', $outputs);
        $this->layout->with('colors', Template::All());
        $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
        $this->layout->content = $view;


    }

    /**
     * @method inbox
     *
     * @param
     *
     * @return void
     *
     *Public Function
     */
    public function inbox()
    {
        if (!Auth::check()) {

            return Redirect::to('home');
        }

        $rand = Auth::user()->rand;

        $message = DB::table('message')->where('otheruser', $rand)->distinct()->select('user')->get();


        global $output;
        foreach ($message as $hello) {


            $user = $hello->user;


            $notificationlike = DB::table('profile')
                ->where('user_rand', $user)
                ->first();

            $userid = DB::table('users')
                ->where('rand', $user)
                ->first();


            if ($notificationlike) {

                $image = $notificationlike->path;
            } else {
                if ($userid->sex == 'male') {

                    $image = '/imagesfb/male.jpg';

                } else {

                    $image = '/imagesfb/female.jpg';


                }

            }


            $userids = $userid->id;

            $uname = $userid->uname;

            $name = $userid->name;


            $output[] = array('name' => $name,
                'image' => $image,
                'uname' => $uname,
                'userids' => $userids

            );

        }


        $langg = DB::table('addlanguage')
            ->first();

        $set = $langg->lang;

        if (!Session::get('locale') || $set == Session::get('locale')) {

            Session::put('locale', $set);

        }


        App::setLocale(Session::get('locale'));


        $view = View::make('fb.inbox')->with('message', $output);
        $this->layout->with('colors', Template::All());
        $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
        $this->layout->content = $view;


    }

    /**
     * @method gallery
     *
     * @param
     *
     * @return void
     *
     *Public Function
     */
    public function gallery()
    {
        if (!Auth::check()) {

            return Redirect::to('home');
        }

        $rand = Auth::user()->rand;


        $gallery = DB::table('gallery')
            ->where('user', $rand)
            ->where('path', null)
            ->orderBy('id', 'DESC')
            ->get();

        $gallerys = DB::table('gallery')
            ->where('user', $rand)
            ->where('imagessvideo', null)
            ->orderBy('id', 'DESC')
            ->get();

        $galleryss = DB::table('gallery')
            ->where('user', $rand)
            ->orderBy('id', 'DESC')
            ->get();


        $langg = DB::table('addlanguage')
            ->first();

        $set = $langg->lang;

        if (!Session::get('locale') || $set == Session::get('locale')) {

            Session::put('locale', $set);

        }

        foreach ($gallery as $hello) {


        }

        App::setLocale(Session::get('locale'));


        $perPage = 3;

        if (Input::get('page')) {
            $currentPage = Input::get('page') - 1;
        } else {

            $currentPage = 0;
        }

        $pagedData = array_slice($gallery, $currentPage * $perPage, $perPage);
        $matches = Paginator::make($pagedData, count($gallery), $perPage);


        $perPage = 4;
        if (Input::get('page')) {
            $currentPage = Input::get('page') - 1;
        } else {

            $currentPage = 0;
        }

        $pagedData = array_slice($gallerys, $currentPage * $perPage, $perPage);
        $matchess = Paginator::make($pagedData, count($gallerys), $perPage);


        $view = View::make('fb.gallery')->with('gallery', $matches)->with('gallerys', $matchess)->with('galleryss', $galleryss);
        $this->layout->with('colors', Template::All());
        $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
        $this->layout->content = $view;


    }

    /**
     * @method othergallery
     *
     * @param INT $id
     *
     * @return void
     *
     *Public Function
     */
    public function othergallery($name)
    {

        $seo = User::where('uname', '=', $name)->first();

        if (!$seo) {
//return Redirect::route('notaccess');
            App::abort(404);
        }
        $id = $seo->id;


        $rand = Auth::user()->rand;

        $profile = User::where('id', '=', $id)->first();
        $rands = $profile->rand;

        $block = DB::table('block')
            ->where(['other' => $rand, 'user' => $rands])
            ->orWhere(['user' => $rand, 'other' => $rands])
            ->first();

        if ($block) {

            //return Redirect::route('notaccess');
            App::abort(404);
        }

        if ($profile->account == '0') {

            //return Redirect::route('notaccess');
            App::abort(404);

        }

        $profile = User::where('id', '=', $id)->first();

        $otheruser = $profile->rand;

        /*
    $gallery = DB::table('gallery')
                     ->where('user',$otheruser)
                     ->get();*/

        $gallery = DB::table('gallery')
            ->where('user', $otheruser)
            ->where('path', null)
            ->orderBy('id', 'DESC')
            ->get();

        $gallerys = DB::table('gallery')
            ->where('user', $otheruser)
            ->where('imagessvideo', null)
            ->orderBy('id', 'DESC')
            ->get();

        $galleryss = DB::table('gallery')
            ->where('user', $otheruser)
            ->orderBy('id', 'DESC')
            ->get();


        $langg = DB::table('addlanguage')
            ->first();

        $set = $langg->lang;

        if (!Session::get('locale') || $set == Session::get('locale')) {

            Session::put('locale', $set);

        }


        App::setLocale(Session::get('locale'));


        $perPage = 3;

        if (Input::get('page')) {
            $currentPage = Input::get('page') - 1;
        } else {

            $currentPage = 0;
        }

        $pagedData = array_slice($gallery, $currentPage * $perPage, $perPage);
        $matches = Paginator::make($pagedData, count($gallery), $perPage);


        $perPage = 4;
        if (Input::get('page')) {
            $currentPage = Input::get('page') - 1;
        } else {

            $currentPage = 0;
        }

        $pagedData = array_slice($gallerys, $currentPage * $perPage, $perPage);
        $matchess = Paginator::make($pagedData, count($gallerys), $perPage);


        $view = View::make('fb.othergallery')->with('gallery', $matches)->with('gallerys', $matchess)->with('galleryss', $galleryss);
        $this->layout->with('colors', Template::All());
        $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
        $this->layout->content = $view;


    }


    public function mm()
    {

        App::abort(404);


    }


    /**
     * @method notificationlikes
     *
     * @param INT $id
     *
     * @return json
     *
     *Public Function
     */
    public function notificationlikes($id)
    {


        $rand = Auth::user()->rand;

        $notificationlike = DB::table('notilike')
            ->where('otheruser', $id)->where('user', '!=', $rand)
            ->get();

        if ($notificationlike) {

            $notificationlikes = DB::table('notilike')
                ->where('otheruser', $id)->where('user', '!=', $rand)->where('read', null)
                ->get();

            $count = count($notificationlikes);


            global $output;

            foreach ($notificationlike as $hello) {

                $mainuser = $hello->user;

                $notificationlike = DB::table('users')
                    ->where('rand', $mainuser)
                    ->first();

                $idss = $notificationlike->name;


                $output[] = array('counts' => $count,
                    'rand' => $mainuser,
                    'name' => $idss

                );

            }

        } else {
            global $output;


            $notificationlikes = DB::table('notilike')
                ->where('otheruser', $id)->where('user', '!=', $id)->where('read', null)
                ->get();

            $count = count($notificationlikes);

            $output[] = array('counts' => $count


            );


        }


        return json_encode($output, JSON_FORCE_OBJECT);


    }

    /**
     * @method notiread
     *
     * @param INT $id
     *
     * @return json
     *
     *Public Function
     */
    public function notiread($id)
    {

        if ($id == 'all') {

            $rand = Auth::user()->rand;


            $entry = array(

                'read' => 1);


            Notilike::where('otheruser', '=', $rand)->update($entry);

            global $output;


            $output[] = array('values' => 'all'


            );


        } else {

            $notiread = DB::table('notilike')
                ->where('id', $id)
                ->first();

            $value = $notiread->read;

            if ($value == 1) {
                $entry = array(

                    'read' => Null);

                $idss = 'null';

            } else {
                $entry = array(

                    'read' => 1);

                $idss = 1;

            }


            $name = Input::get('name');

            Notilike::where('id', '=', $id)->update($entry);
            global $output;


            $output[] = array('idss' => $id,
                'values' => $idss,
                'names' => $name

            );


        }


        return json_encode($output, JSON_FORCE_OBJECT);


    }


    /**
     * @method messnotification
     *
     * @param INT $id
     *
     * @return json
     *
     *Public Function
     */
    public function messnotification($id)
    {


        $rand = Auth::user()->rand;

        $messnotification = DB::table('message')->where('read', '=', null)->where('otheruser', $id)->distinct()->select('user')->get();

        /*  $rand = Auth::user()->rand;



        $profile = User::where('id', '=', $id)->first();

        $otheruser=$profile->rand;


        $userchat = Message::where(['user' => $rand, 'otheruser' => $otheruser])
             ->orWhere(['user' => $otheruser, 'otheruser' => $rand])->orderBy('id', 'ASC')->get();*/

        global $mess;


        $count = count($messnotification);

        $mess[] = array('counts' => $count

        );


        return json_encode($mess, JSON_FORCE_OBJECT);


    }

    /**
     * @method messtext
     *
     * @param INT $id
     *
     * @return json
     *
     *Public Function
     */
    public function messtext($id)
    {


        if (is_numeric($id)) {
            $id = $id;

        } else {

            $seo = User::where('uname', '=', $id)->first();

            if (!$seo) {
//return Redirect::route('notaccess');
                App::abort(404);
            }
            $id = $seo->id;

        }


        $rand = Auth::user()->rand;


        $profile = User::where('id', '=', $id)->first();

        $otheruser = $profile->rand;

        $sex = $profile->sex;


        $idss = $profile->id;

        $otheruserprofiles = Profile::where('user_rand', '=', $otheruser)->first();


        if ($otheruserprofiles != null) {

            $otheruserprofile = $otheruserprofiles->thumb;

        } else {

            if ($sex == 'male') {
                $otheruserprofile = 'imagesfb/male.jpg';

            } else {

                $otheruserprofile = 'imagesfb/female.jpg';
            }


        }


        $sexs = Auth::user()->sex;

        $mainuserprofiles = Profile::where('user_rand', '=', $rand)->first();


        if ($mainuserprofiles != null) {
            $mainuserprofile = $mainuserprofiles->thumb;

        } else {

            if ($sexs == 'male') {
                $mainuserprofile = 'imagesfb/male.jpg';

            } else {

                $mainuserprofile = 'imagesfb/female.jpg';
            }


        }


        $userchat = Message::where(['user' => $rand, 'otheruser' => $otheruser])
            ->orWhere(['user' => $otheruser, 'otheruser' => $rand])
            // ->whereNotIn('deletecon', 'both')

            ->orderBy('id', 'ASC')->get();

        global $messs;

        foreach ($userchat as $hello) {


            $messs[] = array('user' => $hello->name,
                'otheruser' => $hello->othername,
                'chat' => $hello->chat,
                'counts' => $hello->count,
                'timess' => $hello->timess,
                'rand' => $rand,
                'randuser' => $hello->user,
                'otheruserprofile' => $otheruserprofile,
                'mainuserprofile' => $mainuserprofile,
                'idss' => $idss


            );

        }


        return json_encode($messs, JSON_FORCE_OBJECT);


    }

    /**
     * @method opnnchat
     *
     * @param INT $id
     *
     * @return void
     *
     *Public Function
     */
    public function opnnchat($id)
    {


        $rand = Auth::user()->rand;


        $profile = User::where('id', '=', $id)->first();

        $otheruser = $profile->rand;


        $entry = array(

            'count' => null,
            'read' => 1);


        Message::where('user', '=', $otheruser)->where('otheruser', '=', $rand)->update($entry);

        echo 'ok';


    }


    /**
     * @method commentpost
     *
     * @param INT $id
     *
     * @return json
     *
     *Public Function
     */
    public function commentpost($id)
    {

        // print_r( (array) $_GET);
        // die();


        $img = Input::file('image');

        $imagessvideo = Input::file('imagevideo');


        if ($img != null) {

            $img_dir = "uploads/images/" . date("mY");
            $img_thumb_dir = $img_dir . "/thumbs";
            $filename = $img->getClientOriginalName();


            if (!file_exists($img_dir)) {
                mkdir($img_dir, 0777, true);
                mkdir($img_thumb_dir, 0777, true);
            }

            $upload_success = $img->move($img_dir, $img->getClientOriginalName());


            $user = Input::get('user');
            $comment = Input::get('comment');
            $name = Input::get('name');


            $doc = new Postcomment();

            $doc->user = $user;
            $doc->comment = $comment;
            $doc->post_id = $id;
            $doc->name = $name;
            $doc->path = $img_dir . '/' . $filename;
            $doc->save();
            date_default_timezone_set('Asia/Calcutta');
            $foo = date("h:i:sa");

            $commentid = $doc->id;

            $rand = Auth::user()->rand;


            $postids = DB::table('post')->where('id', $id)->first();

            $rand_other = $postids->user_rand;

            $docs = new Notilike();

            $docs->user = $rand;
            $docs->postlike = $id;
            $docs->otheruser = $rand_other;
            $docs->timess = $foo;
            $docs->comment = $comment;
            $docs->commentid = $commentid;
            $docs->save();

            $insert_id = $doc->id;


            global $output;


            $output[] = array('user' => $user,
                'comment' => $comment,
                'idss' => $id,
                'names' => $name,
                'insert_id' => $insert_id,
                'imagepath' => $doc->path
            );


        } elseif ($imagessvideo != null) {

            $img_dir = "uploads/images/" . date("mY");
            $img_thumb_dir = $img_dir . "/thumbs";
            $filename = $imagessvideo->getClientOriginalName();


            if (!file_exists($img_dir)) {
                mkdir($img_dir, 0777, true);
                mkdir($img_thumb_dir, 0777, true);
            }

            $upload_success = $imagessvideo->move($img_dir, $imagessvideo->getClientOriginalName());


            $user = Input::get('user');
            $comment = Input::get('comment');
            $name = Input::get('name');


            $doc = new Postcomment();

            $doc->user = $user;
            $doc->comment = $comment;
            $doc->post_id = $id;
            $doc->name = $name;
            $doc->imagessvideo = $img_dir . '/' . $filename;
            $doc->save();
            date_default_timezone_set('Asia/Calcutta');
            $foo = date("h:i:sa");

            $commentid = $doc->id;

            $rand = Auth::user()->rand;


            $postids = DB::table('post')->where('id', $id)->first();

            $rand_other = $postids->user_rand;

            $docs = new Notilike();

            $docs->user = $rand;
            $docs->postlike = $id;
            $docs->otheruser = $rand_other;
            $docs->timess = $foo;
            $docs->comment = $comment;
            $docs->commentid = $commentid;
            $docs->save();

            $insert_id = $doc->id;


            global $output;


            $output[] = array('user' => $user,
                'comment' => $comment,
                'idss' => $id,
                'names' => $name,
                'insert_id' => $insert_id
            );


        } else {

            $user = Input::get('user');
            $comment = Input::get('comment');
            $name = Input::get('name');


            $doc = new Postcomment();

            $doc->user = $user;
            $doc->comment = $comment;
            $doc->post_id = $id;
            $doc->name = $name;
            $doc->save();
            date_default_timezone_set('Asia/Calcutta');
            $foo = date("h:i:sa");

            $commentid = $doc->id;

            $rand = Auth::user()->rand;


            $postids = DB::table('post')->where('id', $id)->first();

            $rand_other = $postids->user_rand;

            $docs = new Notilike();

            $docs->user = $rand;
            $docs->postlike = $id;
            $docs->otheruser = $rand_other;
            $docs->timess = $foo;
            $docs->comment = $comment;
            $docs->commentid = $commentid;
            $docs->save();

            $insert_id = $doc->id;


            global $output;


            $output[] = array('user' => $user,
                'comment' => $comment,
                'idss' => $id,
                'names' => $name,
                'insert_id' => $insert_id
            );


        }


        return json_encode($output, JSON_FORCE_OBJECT);


    }


    /**
     * @method rating
     *
     * @param INT $id
     *
     * @return json
     *
     *Public Function
     */
    public function rating($id)
    {


        $like = DB::table('post')
            ->where('id', $id)
            ->first();

        $other_rand = $like->user_rand;

        $rand = Auth::user()->rand;


        $check = DB::table('like')->where('user_rand', '=', $rand)->where('postid', '=', $id)->first();

        if ($check) {

            if ($check->count == 1) {
                $entry = array(

                    'count' => 0);


                Like::where('user_rand', '=', $rand)->where('postid', '=', $id)->update($entry);

                $colike = $like->like;

                $coolike = $colike - 1;

                $entrys = array(

                    'like' => $coolike
                );
                Post::where('id', '=', $id)->update($entrys);


            } else {
                $entry = array(

                    'count' => 1


                );

                Like::where('user_rand', '=', $rand)->where('postid', '=', $id)->update($entry);

                $colike = $like->like;

                $coolike = $colike + 1;

                $entrys = array(

                    'like' => $coolike
                );
                Post::where('id', '=', $id)->update($entrys);


            }


        } else {

            date_default_timezone_set('Asia/Calcutta');
            $foo = date("h:i:sa");

            $othuser = User::where('rand', '=', $other_rand)->first();

            $doc = new Like();

            $doc->user_rand = $rand;
            $doc->other_rand = $other_rand;
            $doc->email = $othuser->email;
            $doc->count = 1;
            $doc->postid = $id;
            $doc->timess = $foo;
            $doc->save();


            $docs = new Notilike();

            $docs->user = $rand;
            $docs->postlike = $id;
            $docs->otheruser = $other_rand;
            $docs->timess = $foo;
            $docs->save();

            $colike = $like->like;

            $coolike = $colike + 1;

            $entry = array(

                'like' => $coolike
            );
            Post::where('id', '=', $id)->update($entry);

        }


        $likescount = DB::table('post')
            ->where('user_rand', $other_rand)
            ->get();


        global $outputs;


        foreach ($likescount as $hello) {


            $outputs[] = array('idss' => $hello->id,
                'likes' => $hello->like

            );

        }


        return json_encode($outputs, JSON_FORCE_OBJECT);


    }

    /**
     * @method mediasave
     *
     * @param
     *
     * @return redirect back
     *
     *Public Function
     */
    public function mediasave()
    {


        ini_set('memory_limit', '256M');
        $rules = array('image' => 'required');

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            echo "not loaded";
            die;
        } else {
            // Images destination

            $img = Input::file('image');

            $sizes = filesize($_FILES['image']['tmp_name']);


            $image = $_FILES["image"]["name"];
            $uploadedfile = $_FILES['image']['tmp_name'];

            $types = $_FILES['image']['type'];


            if ($image) {

                $filename = stripslashes($_FILES['image']['name']);

                // $extension = getExtension($filename);


                $i = strrpos($filename, ".");
                $l = strlen($filename) - $i;
                $extension = substr($filename, $i + 1, $l);


                $extension = strtolower($extension);


                //if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))

                if (($types != "image/jpeg") && ($extension != "image/png") && ($extension != "image/gif")) {

                    $change = '<div class="msgdiv">Unknown Image extension </div> ';
                    $errors = 1;
                } else {

                    $size = filesize($_FILES['image']['tmp_name']);

                    if ($size >= 2618082) {
                        Session::flash('large', "Image Too large");
                        return Redirect::back();
                    }

                    $width = Input::get('width');

                    if ($width < 1268) {

                        $degrees = -90;
                    } else {

                        $degrees = 0;
                    }


//if($extension=="jpg" || $extension=="jpeg" )
                    if ($types == "image/jpeg") {


                        $uploadedfile = $_FILES['image']['tmp_name'];

                        error_reporting(E_ALL);
                        ini_set('display_errors', 1);


                        $src = imagecreatefromjpeg($uploadedfile);


//$rotate = imagerotate($src, $degrees, 0);


//imagejpeg($rotate,$uploadedfile);


                        list($width, $height) = getimagesize($uploadedfile);


                        $newwidth1 = 25;
                        $newheight1 = ($height / $width) * $newwidth1;
                        $tmp1 = imagecreatetruecolor($newwidth1, $newheight1);


                        imagecopyresampled($tmp1, $src, 0, 0, 0, 0, $newwidth1, $newheight1, $width, $height);


                        $img_dir = "uploads/images/" . date("mY");
                        $img_thumb_dir = $img_dir . "/thumbs";

                        // Create folders if they don't exist
                        if (!file_exists($img_dir)) {
                            mkdir($img_dir, 0777, true);
                            mkdir($img_thumb_dir, 0777, true);
                        }


                        $random = str_random(10);


                        $filename1 = $img_dir . "/small" . $random . $_FILES['image']['name'];


                        imagejpeg($tmp1, $filename1);

                        imagedestroy($src);
                        imagedestroy($tmp1);
//imagedestroy($rotate);


                    } else if ($types == "image/png") {

                        $uploadedfile = $_FILES['image']['tmp_name'];
                        $src = imagecreatefrompng($uploadedfile);
//$rotate = imagerotate($src, $degrees, 0);


//imagepng($rotate,$uploadedfile);

                        list($width, $height) = getimagesize($uploadedfile);


                        $newwidth1 = 25;
                        $newheight1 = ($height / $width) * $newwidth1;
                        $tmp1 = imagecreatetruecolor($newwidth1, $newheight1);


                        imagecopyresampled($tmp1, $src, 0, 0, 0, 0, $newwidth1, $newheight1, $width, $height);


                        $img_dir = "uploads/images/" . date("mY");
                        $img_thumb_dir = $img_dir . "/thumbs";

                        // Create folders if they don't exist
                        if (!file_exists($img_dir)) {
                            mkdir($img_dir, 0777, true);
                            mkdir($img_thumb_dir, 0777, true);
                        }


                        $random = str_random(10);


                        $filename1 = $img_dir . "/small" . $random . $_FILES['image']['name'];


                        imagepng($tmp1, $filename1);

                        imagedestroy($src);
                        imagedestroy($tmp1);
//imagedestroy($rotate);


                    } else if ($types == "image/gif") {
                        $src = imagecreatefromgif($uploadedfile);

//$rotate = imagerotate($src, $degrees, 0);

//imagegif($rotate,$uploadedfile);

                        list($width, $height) = getimagesize($uploadedfile);


                        $newwidth1 = 25;
                        $newheight1 = ($height / $width) * $newwidth1;
                        $tmp1 = imagecreatetruecolor($newwidth1, $newheight1);


                        imagecopyresampled($tmp1, $src, 0, 0, 0, 0, $newwidth1, $newheight1, $width, $height);


                        $img_dir = "uploads/images/" . date("mY");
                        $img_thumb_dir = $img_dir . "/thumbs";

                        // Create folders if they don't exist
                        if (!file_exists($img_dir)) {
                            mkdir($img_dir, 0777, true);
                            mkdir($img_thumb_dir, 0777, true);
                        }


                        $random = str_random(10);


                        $filename1 = $img_dir . "/small" . $random . $_FILES['image']['name'];


                        imagegif($tmp1, $filename1);

                        imagedestroy($src);
                        imagedestroy($tmp1);
//imagedestroy($rotate);


                    } else {

                        echo 'Unknown';
                        die();

                    }


                }
            }


            $img_dir = "uploads/images/" . date("mY");
            $img_thumb_dir = $img_dir . "/thumbs";
            $filename = $random . $img->getClientOriginalName();


            // Create folders if they don't exist
            if (!file_exists($img_dir)) {
                mkdir($img_dir, 0777, true);
                mkdir($img_thumb_dir, 0777, true);
            }

            // Upload the image in the correct destination

            $upload_success = $img->move($img_dir, $filename);

            if ($upload_success) {

                $rand = Input::get('rand');


                $results = Profile::where('user_rand', '=', $rand)->first();


                if ($results) {


                    $path = $img_dir . '/' . $filename;


                    $rand = Input::get('rand');


                    $entry = array(

                        'path' => $path,
                        'thumb' => $filename1,
                        'user_rand' => $rand


                    );

                    Profile::where('user_rand', $rand)->update($entry);

                    $pathnew = $path;
                    $pathnews = $filename1;


                } else {


                    if (Auth::user()->sex == 'male') {
                        $covers = 'imagesfb/male_cover.jpg';
                    } else {

                        $covers = 'imagesfb/female_cover.jpg';
                    }


                    $doc = new Profile();

                    $doc->path = $img_dir . '/' . $filename;
                    $doc->thumb = $filename1;

                    $doc->cover = $covers;


                    $doc->user_rand = $rand;

                    $doc->save();

                    $pathnew = $doc->path;
                    $pathnews = $doc->thumb;

                }


                $output[] = array('path' => $pathnew,
                    'thumb' => $pathnews

                );


                return json_encode($output, JSON_FORCE_OBJECT);


                //  return Redirect::back();
                // return Redirect::route('profile');
            }
        }


    }


    /**
     * @method gallerysave
     *
     * @param
     *
     * @return redirect page
     *
     *Public Function
     */
    public function gallerysave()
    {


        $rules = array('image' => 'required');

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            echo "not loaded";
            die;
        } else {
            // Images destination

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

                $rand = Input::get('rand');


                $doc = new Gallery();

                $doc->path = $img_dir . '/' . $filename;
                $doc->user = $rand;

                $doc->save();

            }


            return Redirect::route('gallery');
        }


    }

    /**
     * @method galleryvideo
     *
     * @param
     *
     * @return redirect page
     *
     *Public Function
     */
    public function galleryvideo()
    {

        $rules = array('image' => 'required');

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            echo "not loaded";
            die;
        } else {
            // Images destination

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

                $rand = Input::get('rand');


                $doc = new Gallery();

                $doc->imagessvideo = $img_dir . '/' . $filename;
                $doc->user = $rand;

                $doc->save();

            }


            return Redirect::route('gallery');
        }


    }

    /**
     * @method covermediasave
     *
     * @param
     *
     * @return redirect page
     *
     *Public Function
     */
    public function covermediasave()
    {

        $rules = array('image' => 'required');

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            echo "not loaded";
            die;
        } else {
            // Images destination

            $img = Input::file('image');


            $img_dir = "uploads/images/" . date("mY");
            $img_thumb_dir = $img_dir . "/thumbs";

            $filename = str_random(10) . $img->getClientOriginalName();

            // Create folders if they don't exist
            if (!file_exists($img_dir)) {
                mkdir($img_dir, 0777, true);
                mkdir($img_thumb_dir, 0777, true);
            }

            // Upload the image in the correct destination
            $upload_success = $img->move($img_dir, $filename);

            if ($upload_success) {

                $rand = Input::get('rand');

                $results = Profile::where('user_rand', '=', $rand)->first();


                if ($results) {


                    $path = $img_dir . '/' . $filename;


                    $rand = Input::get('rand');

                    $covernew = $path;

                    $entry = array(

                        'cover' => $path,
                        'user_rand' => $rand


                    );

                    Profile::where('user_rand', $rand)->update($entry);


                } else {
                    $doc = new Profile();


                    if (Auth::user()->sex == 'male') {
                        $doc->path = 'imagesfb/male.jpg';
                    } else {

                        $doc->path = 'imagesfb/female.jpg';
                    }


                    $doc->cover = $img_dir . '/' . $filename;
                    $doc->user_rand = $rand;

                    $doc->save();

                    $covernew = $doc->cover;


                }


                global $output;


                $output[] = array('user' => $covernew

                );


                return json_encode($output, JSON_FORCE_OBJECT);


                //  return Redirect::back();

                //return Redirect::route('profile');
            }
        }


    }


    public function changedefault($id)
    {

        $randnew = DB::table('users')
            ->where('uname', $id)
            ->first();

        $rand = $randnew->rand;


        //  $rand = Auth::user()->rand;

        $results = Profile::where('user_rand', '=', $rand)->first();


        if ($results) {


            if (Auth::user()->sex == 'male') {


                $entry = array(
                    'cover' => 'imagesfb/male_cover.jpg'

                );


                $covernew = 'imagesfb/male_cover.jpg';
            } else {


                $entry = array(
                    'cover' => 'imagesfb/female_cover.jpg'

                );

                $covernew = 'imagesfb/female_cover.jpg';

            }


            Profile::where('user_rand', $rand)->update($entry);
            //return Redirect::back();

            $output[] = array('user' => $covernew

            );


            return json_encode($output, JSON_FORCE_OBJECT);

        } else {


            return Redirect::back();

        }


    }


    public function changedefaults($id)
    {

        $randnew = DB::table('users')
            ->where('uname', $id)
            ->first();

        $rand = $randnew->rand;


        $results = Profile::where('user_rand', '=', $rand)->first();


        if ($results) {


            if (Auth::user()->sex == 'male') {


                $entry = array(
                    'path' => 'imagesfb/male.jpg',
                    'thumb' => 'imagesfb/male.jpg'

                );

                $path = 'imagesfb/male.jpg';


            } else {


                $entry = array(
                    'path' => 'imagesfb/female.jpg',
                    'thumb' => 'imagesfb/female.jpg'

                );

                $path = 'imagesfb/female.jpg';

            }


            Profile::where('user_rand', $rand)->update($entry);
            // return Redirect::back();

            $output[] = array('user' => $path

            );


            return json_encode($output, JSON_FORCE_OBJECT);


        } else {


            return Redirect::back();

        }


    }


    /**
     * @method fbpost
     *
     * @param
     *
     * @return json
     *
     *Public Function
     */
    public function fbpost()
    {

// ini_set('upload_max_filesize','3M');
// echo ini_get('upload_max_filesize');
// die();

        $img = Input::file('image');
        /*
      $info = getimagesize($img);

      echo $info;
      die();*/

        $imagessvideo = Input::file('imagessvideo');

        $videourl = Input::get('videourl');


        if ($img != null) {


            $random = str_random(10);

            $img_dir = "uploads/images/" . date("mY");
            $img_thumb_dir = $img_dir . "/thumbs";
            $filename = $random . $img->getClientOriginalName();


            if (!file_exists($img_dir)) {
                mkdir($img_dir, 0777, true);
                mkdir($img_thumb_dir, 0777, true);
            }

            $upload_success = $img->move($img_dir, $filename);


            $validextensions = array("jpeg", "jpg", "png");
            $temporary = explode(".", $_FILES["image"]["name"]);
            $file_extension = end($temporary);
            $file_extension = strtolower($file_extension);

            if ((($_FILES["image"]["type"] == "image/png") || ($_FILES["image"]["type"] == "image/jpg") || ($_FILES["image"]["type"] == "image/jpeg")
                ) && in_array($file_extension, $validextensions)
            ) {

                $rand = Input::get('rand');
                $post = strip_tags(Input:: get('post'));
                date_default_timezone_set('Asia/Calcutta');

                $foo = date("Y/m/d h:i:sa");

                $doc = new Post();

                $doc->path = $img_dir . '/' . $filename;
                $doc->user_rand = $rand;
                $doc->post = $post;
                $doc->curdate = $foo;

                $doc->save();


                $docs = new Gallery();
                $docs->user = $rand;
                $docs->path = $img_dir . '/' . $filename;
                $docs->postid = $doc->id;
                $docs->save();


                $snap = DB::table('profile')
                    ->where('user_rand', $rand)
                    ->first();


                if ($snap != null) {

                    $profilephoto = $snap->thumb;

                    if ($profilephoto == null) {

                        $sex = Auth::user()->sex;
                        if ($sex == 'male') {
                            $profilephoto = 'imagesfb/male.jpg';

                        } else {

                            $profilephoto = 'imagesfb/female.jpg';
                        }

                    }


                } else {

                    $sex = Auth::user()->sex;
                    if ($sex == 'male') {
                        $profilephoto = 'imagesfb/male.jpg';

                    } else {

                        $profilephoto = 'imagesfb/female.jpg';
                    }


                }


                global $output;


                $output[] = array('user' => $doc->user_rand,
                    'post' => $doc->post,
                    'curdate' => $doc->curdate,
                    'idss' => $doc->id,
                    'path' => $doc->path,
                    'profiles' => $profilephoto

                );


                return json_encode($output, JSON_FORCE_OBJECT);


            } else {


                $rand = Input::get('rand');

                $post = strip_tags(Input:: get('post'));
                date_default_timezone_set('Asia/Calcutta');

                $foo = date("Y/m/d h:i:sa");

                $doc = new Post();

                $doc->imagessvideo = $img_dir . '/' . $filename;
                $doc->user_rand = $rand;
                $doc->post = $post;
                $doc->curdate = $foo;
                $doc->save();


                $docs = new Gallery();
                $docs->user = $rand;
                $docs->imagessvideo = $img_dir . '/' . $filename;
                $docs->postid = $doc->id;
                $docs->save();

                $snap = DB::table('profile')
                    ->where('user_rand', $rand)
                    ->first();


                if ($snap != null) {

                    $profilephoto = $snap->thumb;
                    if ($profilephoto == null) {

                        $sex = Auth::user()->sex;
                        if ($sex == 'male') {
                            $profilephoto = 'imagesfb/male.jpg';

                        } else {

                            $profilephoto = 'imagesfb/female.jpg';
                        }

                    }


                } else {
                    $sex = Auth::user()->sex;
                    if ($sex == 'male') {
                        $profilephoto = 'imagesfb/male.jpg';

                    } else {

                        $profilephoto = 'imagesfb/female.jpg';
                    }


                }


                global $output;


                $output[] = array('user' => $doc->user_rand,
                    'post' => $doc->post,
                    'curdate' => $doc->curdate,
                    'idss' => $doc->id,
                    'imagessvideo' => $doc->imagessvideo,
                    'profiles' => $profilephoto

                );


                return json_encode($output, JSON_FORCE_OBJECT);


            }


        } elseif ($imagessvideo != null) {

            $random = str_random(10);

            $img_dir = "uploads/images/" . date("mY");
            $img_thumb_dir = $img_dir . "/thumbs";
            // $filename = $random.$imagessvideo->getClientOriginalName();
            $filename = $random . '.mp4';


            if (!file_exists($img_dir)) {
                mkdir($img_dir, 0777, true);
                mkdir($img_thumb_dir, 0777, true);
            }

            $upload_success = $imagessvideo->move($img_dir, $filename);


            $validextensions = array("jpeg", "jpg", "png");
            $temporary = explode(".", $_FILES["imagessvideo"]["name"]);
            $file_extension = end($temporary);
            $file_extension = strtolower($file_extension);
            if ((($_FILES["imagessvideo"]["type"] == "image/png") || ($_FILES["imagessvideo"]["type"] == "image/jpg") || ($_FILES["imagessvideo"]["type"] == "image/jpeg")
                ) && in_array($file_extension, $validextensions)
            ) {


                $rand = Input::get('rand');
                $post = strip_tags(Input:: get('post'));
                date_default_timezone_set('Asia/Calcutta');

                $foo = date("Y/m/d h:i:sa");

                $doc = new Post();

                $doc->path = $img_dir . '/' . $filename;
                $doc->user_rand = $rand;
                $doc->post = $post;
                $doc->curdate = $foo;

                $doc->save();


                $docs = new Gallery();
                $docs->user = $rand;
                $docs->path = $img_dir . '/' . $filename;
                $docs->postid = $doc->id;
                $docs->save();


                $snap = DB::table('profile')
                    ->where('user_rand', $rand)
                    ->first();


                if ($snap != null) {

                    $profilephoto = $snap->thumb;

                    if ($profilephoto == null) {

                        $sex = Auth::user()->sex;
                        if ($sex == 'male') {
                            $profilephoto = 'imagesfb/male.jpg';

                        } else {

                            $profilephoto = 'imagesfb/female.jpg';
                        }

                    }


                } else {
                    $sex = Auth::user()->sex;
                    if ($sex == 'male') {
                        $profilephoto = 'imagesfb/male.jpg';

                    } else {

                        $profilephoto = 'imagesfb/female.jpg';
                    }


                }


                global $output;


                $output[] = array('user' => $doc->user_rand,
                    'post' => $doc->post,
                    'curdate' => $doc->curdate,
                    'idss' => $doc->id,
                    'path' => $doc->path,
                    'profiles' => $profilephoto

                );


                return json_encode($output, JSON_FORCE_OBJECT);

            } else {
                $rand = Input::get('rand');
                $post = strip_tags(Input:: get('post'));
                date_default_timezone_set('Asia/Calcutta');

                $foo = date("Y/m/d h:i:sa");


                $doc = new Post();

                $doc->imagessvideo = $img_dir . '/' . $filename;
                $doc->user_rand = $rand;
                $doc->post = $post;
                $doc->curdate = $foo;
                $doc->save();


                $docs = new Gallery();
                $docs->user = $rand;
                $docs->imagessvideo = $img_dir . '/' . $filename;
                $docs->postid = $doc->id;
                $docs->save();

                $snap = DB::table('profile')
                    ->where('user_rand', $rand)
                    ->first();


                if ($snap != null) {

                    $profilephoto = $snap->thumb;

                    if ($profilephoto == null) {

                        $sex = Auth::user()->sex;
                        if ($sex == 'male') {
                            $profilephoto = 'imagesfb/male.jpg';

                        } else {

                            $profilephoto = 'imagesfb/female.jpg';
                        }

                    }


                } else {
                    $sex = Auth::user()->sex;
                    if ($sex == 'male') {
                        $profilephoto = 'imagesfb/male.jpg';

                    } else {

                        $profilephoto = 'imagesfb/female.jpg';
                    }


                }

                global $output;


                $output[] = array('user' => $doc->user_rand,
                    'post' => $doc->post,
                    'curdate' => $doc->curdate,
                    'idss' => $doc->id,
                    'imagessvideo' => $doc->imagessvideo,
                    'profiles' => $profilephoto

                );


                return json_encode($output, JSON_FORCE_OBJECT);


            }


        } elseif ($videourl != null) {

            $rand = Input::get('rand');
            $post = strip_tags(Input:: get('post'));
            date_default_timezone_set('Asia/Calcutta');

            $foo = date("Y/m/d h:i:sa");


            $snap = DB::table('profile')
                ->where('user_rand', $rand)
                ->first();


            if ($snap != null) {

                $profilephoto = $snap->thumb;

                if ($profilephoto == null) {

                    $sex = Auth::user()->sex;
                    if ($sex == 'male') {
                        $profilephoto = 'imagesfb/male.jpg';

                    } else {

                        $profilephoto = 'imagesfb/female.jpg';
                    }

                }


            } else {
                $sex = Auth::user()->sex;
                if ($sex == 'male') {
                    $profilephoto = 'imagesfb/male.jpg';

                } else {

                    $profilephoto = 'imagesfb/female.jpg';
                }


            }


            if (starts_with($videourl, "http://www.youtube.com") || starts_with($videourl, "https://www.youtube.com")) {
                $str = $videourl;

                $newval = str_ireplace('watch?v=', 'v/', $str);


                $doc = new Post();

                $doc->imagessvideo = $newval;
                $doc->user_rand = $rand;
                $doc->post = $post;
                $doc->curdate = $foo;
                $doc->save();


                $docs = new Gallery();
                $docs->user = $rand;
                $docs->imagessvideo = $newval;
                $docs->postid = $doc->id;
                $docs->save();


                global $output;

                $output[] = array('user' => $doc->user_rand,
                    'post' => $doc->post,
                    'curdate' => $doc->curdate,
                    'idss' => $doc->id,
                    'youtube' => $newval,
                    'profiles' => $profilephoto

                );
            } elseif (starts_with($videourl, "http://vimeo.com") || starts_with($videourl, "https://vimeo.com")) {

                $str = $videourl;

                $here = explode("/", $str);

                $num = (count($here) - 1);


                $newval = 'http://vimeo.com/moogaloop.swf?clip_id=' . $here[$num] . '&amp;server=vimeo.com&amp;color=00adef&amp;fullscreen=1';

                //$newval=str_ireplace('http://vimeo.com/channels/staffpicks/','http://vimeo.com/moogaloop.swf?clip_id=',$str);


                $doc = new Post();

                $doc->imagessvideo = $newval;
                $doc->user_rand = $rand;
                $doc->post = $post;
                $doc->curdate = $foo;
                $doc->save();


                $docs = new Gallery();
                $docs->user = $rand;
                $docs->imagessvideo = $newval;
                $docs->postid = $doc->id;
                $docs->save();


                global $output;

                $output[] = array('user' => $doc->user_rand,
                    'post' => $doc->post,
                    'curdate' => $doc->curdate,
                    'idss' => $doc->id,
                    'vimeo' => $newval,
                    'profiles' => $profilephoto

                );


            } else {


                $doc = new Post();

                $doc->imagessvideo = $videourl;
                $doc->user_rand = $rand;
                $doc->post = $post;
                $doc->curdate = $foo;
                $doc->save();


                $docs = new Gallery();
                $docs->user = $rand;
                $docs->imagessvideo = $videourl;
                $docs->postid = $doc->id;
                $docs->save();


                global $output;

                $output[] = array('user' => $doc->user_rand,
                    'post' => $doc->post,
                    'curdate' => $doc->curdate,
                    'idss' => $doc->id,
                    'videourl' => $videourl,
                    'profiles' => $profilephoto

                );


            }


            return json_encode($output, JSON_FORCE_OBJECT);


        } else {
            date_default_timezone_set('Asia/Calcutta');

            $foo = date("Y/m/d h:i:sa");
            $rand = Input::get('rand');
            //$post = Input::get('post');
            $post = strip_tags(Input:: get('post'));

            $doc = new Post();
            $doc->user_rand = $rand;
            $doc->post = $post;
            $doc->curdate = $foo;
            $doc->save();


            $snap = DB::table('profile')
                ->where('user_rand', $rand)
                ->first();


            if ($snap != null) {

                $profilephoto = $snap->thumb;

                if ($profilephoto == null) {

                    $sex = Auth::user()->sex;
                    if ($sex == 'male') {
                        $profilephoto = 'imagesfb/male.jpg';

                    } else {

                        $profilephoto = 'imagesfb/female.jpg';
                    }

                }

            } else {
                $sex = Auth::user()->sex;
                if ($sex == 'male') {
                    $profilephoto = 'imagesfb/male.jpg';

                } else {

                    $profilephoto = 'imagesfb/female.jpg';
                }


            }


            global $output;


            $output[] = array('user' => $doc->user_rand,
                'post' => $doc->post,
                'curdate' => $doc->curdate,
                'idss' => $doc->id,
                'profiles' => $profilephoto


            );


            return json_encode($output, JSON_FORCE_OBJECT);


        }


        return Redirect::back();


    }


    /**
     * @method fblogout
     *
     * @param
     *
     * @return redirect page
     *
     *Public Function
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
     *Public Function
     */
    public function activate($id)
    {


        $entry = array(
            'activate' => '1'


        );

        User::where('rand', $id)->update($entry);


        return Redirect::route('home');


    }

    /**
     * @method searchingget
     *
     * @param
     *
     * @return void
     *
     *Public Function
     */
    public function searchingget()
    {

        if (!Auth::check()) {

            return Redirect::to('home');
        }


        $q = '';


        $searchTerms = explode(' ', $q);

        $query = DB::table('users');

        foreach ($searchTerms as $term) {
            $query->where('name', 'LIKE', '%' . $term . '%');
        }

        $results = $query->get();

        $outputs = array();


        foreach ($results as $hello) {


            $rands = $hello->rand;


            $sex = $hello->sex;

            $snap = DB::table('profile')
                ->where('user_rand', $rands)
                ->first();

            if ($snap != null) {

                $profilephoto = $snap->path;

            } else {

                if ($sex == 'male') {
                    $profilephoto = 'imagesfb/male.jpg';

                } else {

                    $profilephoto = 'imagesfb/female.jpg';
                }


            }


            $outputs[] = array('profilephoto' => $profilephoto

            );


        }


        $langg = DB::table('addlanguage')
            ->first();

        $set = $langg->lang;

        if (!Session::get('locale') || $set == Session::get('locale')) {

            Session::put('locale', $set);

        }


        App::setLocale(Session::get('locale'));

        $view = View::make('fb.search')->with('search', $results)->with('outputs', $outputs);
        $this->layout->with('colors', Template::All());
        $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
        $this->layout->content = $view;


        /**
         * @method searching
         *
         * @param
         *
         * @return void
         *
         *Public Function
         */
    }

    public function searching()
    {

        if (!Auth::check()) {

            return Redirect::to('home');
        }


        $q = Input::get('search');

        if ($q != '') {

            $pro = DB::table('users')
                ->where('name', $q)
                ->first();

            if ($pro) {

                $proid = $pro->uname;


                return Redirect::route('profileopen', array('id' => $proid));
            }


        }


        $searchTerms = explode(' ', $q);

        $query = DB::table('users');

        foreach ($searchTerms as $term) {
            $query->where('name', 'LIKE', '%' . $term . '%');
        }

        $results = $query->get();

        $outputs = array();


        foreach ($results as $hello) {


            $rands = $hello->rand;


            $sex = $hello->sex;

            $snap = DB::table('profile')
                ->where('user_rand', $rands)
                ->first();

            if ($snap != null) {

                $profilephoto = $snap->path;

            } else {

                if ($sex == 'male') {
                    $profilephoto = 'imagesfb/male.jpg';

                } else {

                    $profilephoto = 'imagesfb/female.jpg';
                }


            }


            $outputs[] = array('profilephoto' => $profilephoto

            );


        }


        $langg = DB::table('addlanguage')
            ->first();

        $set = $langg->lang;

        if (!Session::get('locale') || $set == Session::get('locale')) {

            Session::put('locale', $set);

        }


        App::setLocale(Session::get('locale'));

        $view = View::make('fb.search')->with('search', $results)->with('outputs', $outputs);
        $this->layout->with('colors', Template::All());
        $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
        $this->layout->content = $view;


    }


    public function advsearch()
    {

        if (!Auth::check()) {

            return Redirect::to('home');
        }


        $gender = Input::get('gender');


        $location = Input::get('location');

        $term = Input::get('name');

        $bodytype = Input::get('silhouette');

        $height = Input::get('length');

        $haircolor = Input::get('hairColor');

        if ($gender == 'male' || $gender == 'female') {


            if ($bodytype == 'null' && $height == 'null' && $haircolor == 'null') {


                $results = DB::table('users')
                    ->where('name', 'LIKE', '%' . $term . '%')
                    ->where('city', 'LIKE', '%' . $location . '%')
                    ->where('sex', $gender)
                    ->get();

            } else if ($bodytype != 'null' && $height == 'null' && $haircolor == 'null') {


                $results = DB::table('users')
                    ->where('name', 'LIKE', '%' . $term . '%')
                    ->where('city', 'LIKE', '%' . $location . '%')
                    ->where('sex', $gender)
                    ->where('bodytype', $bodytype)
                    ->get();


            } else if ($bodytype == 'null' && $height != 'null' && $haircolor == 'null') {

                $results = DB::table('users')
                    ->where('name', 'LIKE', '%' . $term . '%')
                    ->where('city', 'LIKE', '%' . $location . '%')
                    ->where('sex', $gender)
                    ->where('height', $height)
                    ->get();


            } else if ($bodytype == 'null' && $height == 'null' && $haircolor != 'null') {

                $results = DB::table('users')
                    ->where('name', 'LIKE', '%' . $term . '%')
                    ->where('city', 'LIKE', '%' . $location . '%')
                    ->where('sex', $gender)
                    ->where('haircolor', $haircolor)
                    ->get();


            } else if ($bodytype != 'null' && $height != 'null' && $haircolor == 'null') {

                $results = DB::table('users')
                    ->where('name', 'LIKE', '%' . $term . '%')
                    ->where('city', 'LIKE', '%' . $location . '%')
                    ->where('sex', $gender)
                    ->where('bodytype', $bodytype)
                    ->where('height', $height)
                    ->get();


            } else if ($bodytype == 'null' && $height != 'null' && $haircolor != 'null') {

                $results = DB::table('users')
                    ->where('name', 'LIKE', '%' . $term . '%')
                    ->where('city', 'LIKE', '%' . $location . '%')
                    ->where('sex', $gender)
                    ->where('haircolor', $haircolor)
                    ->where('height', $height)
                    ->get();


            } else if ($bodytype != 'null' && $height == 'null' && $haircolor != 'null') {

                $results = DB::table('users')
                    ->where('name', 'LIKE', '%' . $term . '%')
                    ->where('city', 'LIKE', '%' . $location . '%')
                    ->where('sex', $gender)
                    ->where('haircolor', $haircolor)
                    ->where('bodytype', $bodytype)
                    ->get();


            } else {
                $results = DB::table('users')
                    ->where('name', 'LIKE', '%' . $term . '%')
                    ->where('city', 'LIKE', '%' . $location . '%')
                    ->where('sex', $gender)
                    ->where('haircolor', $haircolor)
                    ->where('bodytype', $bodytype)
                    ->where('height', $height)
                    ->get();


            }

        } else {


            if ($bodytype == 'null' && $height == 'null' && $haircolor == 'null') {


                $results = DB::table('users')
                    ->where('name', 'LIKE', '%' . $term . '%')
                    ->where('city', 'LIKE', '%' . $location . '%')
                    ->get();

            } else if ($bodytype != 'null' && $height == 'null' && $haircolor == 'null') {


                $results = DB::table('users')
                    ->where('name', 'LIKE', '%' . $term . '%')
                    ->where('city', 'LIKE', '%' . $location . '%')
                    ->where('bodytype', $bodytype)
                    ->get();


            } else if ($bodytype == 'null' && $height != 'null' && $haircolor == 'null') {

                $results = DB::table('users')
                    ->where('name', 'LIKE', '%' . $term . '%')
                    ->where('city', 'LIKE', '%' . $location . '%')
                    ->where('height', $height)
                    ->get();


            } else if ($bodytype == 'null' && $height == 'null' && $haircolor != 'null') {

                $results = DB::table('users')
                    ->where('name', 'LIKE', '%' . $term . '%')
                    ->where('city', 'LIKE', '%' . $location . '%')
                    ->where('haircolor', $haircolor)
                    ->get();


            } else if ($bodytype != 'null' && $height != 'null' && $haircolor == 'null') {

                $results = DB::table('users')
                    ->where('name', 'LIKE', '%' . $term . '%')
                    ->where('city', 'LIKE', '%' . $location . '%')
                    ->where('bodytype', $bodytype)
                    ->where('height', $height)
                    ->get();


            } else if ($bodytype == 'null' && $height != 'null' && $haircolor != 'null') {

                $results = DB::table('users')
                    ->where('name', 'LIKE', '%' . $term . '%')
                    ->where('city', 'LIKE', '%' . $location . '%')
                    ->where('haircolor', $haircolor)
                    ->where('height', $height)
                    ->get();


            } else if ($bodytype != 'null' && $height == 'null' && $haircolor != 'null') {

                $results = DB::table('users')
                    ->where('name', 'LIKE', '%' . $term . '%')
                    ->where('city', 'LIKE', '%' . $location . '%')
                    ->where('haircolor', $haircolor)
                    ->where('bodytype', $bodytype)
                    ->get();


            } else {
                $results = DB::table('users')
                    ->where('name', 'LIKE', '%' . $term . '%')
                    ->where('city', 'LIKE', '%' . $location . '%')
                    ->where('haircolor', $haircolor)
                    ->where('bodytype', $bodytype)
                    ->where('height', $height)
                    ->get();


            }

        }


        $outputs = array();


        foreach ($results as $hello) {


            $rands = $hello->rand;


            $sex = $hello->sex;

            $snap = DB::table('profile')
                ->where('user_rand', $rands)
                ->first();

            if ($snap != null) {

                $profilephoto = $snap->path;

            } else {

                if ($sex == 'male') {
                    $profilephoto = 'imagesfb/male.jpg';

                } else {

                    $profilephoto = 'imagesfb/female.jpg';
                }


            }


            $outputs[] = array('profilephoto' => $profilephoto

            );


        }


        $langg = DB::table('addlanguage')
            ->first();

        $set = $langg->lang;

        if (!Session::get('locale') || $set == Session::get('locale')) {

            Session::put('locale', $set);

        }


        App::setLocale(Session::get('locale'));

        $view = View::make('fb.search')->with('search', $results)->with('outputs', $outputs);
        $this->layout->with('colors', Template::All());
        $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
        $this->layout->content = $view;


    }


    /**
     * @method allfriendrequest
     *
     * @param
     *
     * @return void
     *
     *Public Function
     */
    public function allfriendrequest()
    {

        if (!Auth::check()) {

            return Redirect::to('home');
        }

        $rand = Auth::user()->rand;

        $notification = DB::table('notification')
            ->where('friendrequest', $rand)
            ->get();


        $notifications = DB::table('notification')
            ->where('user', $rand)
            ->get();


        $recommended = DB::table('friends')->where('mainuser', '!=', $rand)->where('otheruser', '!=', $rand)->distinct()->select('mainuser')->get();

        global $output;

        foreach ($recommended as $hello) {


            $userinfo = DB::table('users')
                ->where('rand', $hello->mainuser)
                ->first();

            if ($userinfo) {
                $snap = DB::table('profile')
                    ->where('user_rand', $hello->mainuser)
                    ->first();

                if ($snap) {

                    $image = $snap->path;
                } else {
                    if ($userinfo->sex == 'male') {

                        $image = '../imagesfb/male.jpg';

                    } else {

                        $image = '../imagesfb/female.jpg';


                    }

                }

                $output[] = array('idss' => $userinfo->id,
                    'name' => $userinfo->name,
                    'path' => $image,
                    'uname' => $userinfo->uname


                );

            }


        }


        global $outputs;


        foreach ($notification as $hello) {


            $unifriend = DB::table('users')
                ->where('rand', $hello->user)
                ->first();

            $unifriends = $unifriend->name;

            $uname = $unifriend->uname;

            $sex = $unifriend->sex;

            $city = $unifriend->city;
            $location = $unifriend->location;


            $rands = $unifriend->rand;

            $rnd = DB::table('users')
                ->where('rand', $rands)
                ->first();

            $idss = $rnd->id;


            $snap = DB::table('profile')
                ->where('user_rand', $hello->user)
                ->first();

            if ($snap != null) {

                $profilephoto = $snap->path;

            } else {

                if ($sex == 'male') {
                    $profilephoto = 'imagesfb/male.jpg';

                } else {

                    $profilephoto = 'imagesfb/female.jpg';
                }


            }


            $outputs[] = array('name' => $unifriends,
                'profilephoto' => $profilephoto,
                'rands' => $rands,
                'city' => $city,
                'location' => $location,
                'idss' => $idss,
                'uname' => $uname,
                'friend' => ''

            );


        }


        foreach ($notifications as $hello) {


            $unifriend = DB::table('users')
                ->where('rand', $hello->friendrequest)
                ->first();

            $unifriends = $unifriend->name;

            $uname = $unifriend->uname;

            $sex = $unifriend->sex;

            $city = $unifriend->city;
            $location = $unifriend->location;


            $rands = $unifriend->rand;

            $rnd = DB::table('users')
                ->where('rand', $rands)
                ->first();

            $idss = $rnd->id;


            $snap = DB::table('profile')
                ->where('user_rand', $hello->friendrequest)
                ->first();

            if ($snap != null) {

                $profilephoto = $snap->path;

            } else {

                if ($sex == 'male') {
                    $profilephoto = 'imagesfb/male.jpg';

                } else {

                    $profilephoto = 'imagesfb/female.jpg';
                }


            }


            $outputs[] = array('name' => $unifriends,
                'profilephoto' => $profilephoto,
                'rands' => $rands,
                'city' => $city,
                'location' => $location,
                'idss' => $idss,
                'uname' => $uname,
                'friend' => 'myids'

            );


        }


        $langg = DB::table('addlanguage')
            ->first();

        $set = $langg->lang;

        if (!Session::get('locale') || $set == Session::get('locale')) {

            Session::put('locale', $set);

        }


        App::setLocale(Session::get('locale'));


        $view = View::make('fb.allfriendrequest')->with('outputs', $outputs)->with('output', $output);
        $this->layout->with('colors', Template::All());
        $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
        $this->layout->content = $view;


    }

    /**
     * @method friendlist
     *
     * @param
     *
     * @return void
     *
     *Public Function
     */
    public function friendlist()
    {


        if (!Auth::check()) {

            return Redirect::to('home');
        }


        $rand = Auth::user()->rand;


        $lists = DB::table('friends')
            ->where('otheruser', $rand)
            ->get();


        global $outputs;
        foreach ($lists as $hello) {


            $otheruser = $hello->mainuser;

            $unifriend = DB::table('users')
                ->where('rand', $otheruser)
                ->first();

            if ($unifriend) {
                $unifriends = $unifriend->name;

                $uname = $unifriend->uname;


                $idd = $unifriend->id;

                $city = $unifriend->city;
                $location = $unifriend->location;

                $sex = $unifriend->sex;

            } else {
                $unifriends = '';

                $idd = '';

                $uname = '';

                $city = '';
                $location = '';

                $sex = '';


            }


            $snap = DB::table('profile')
                ->where('user_rand', $otheruser)
                ->first();

            if ($snap != null) {

                $profilephoto = $snap->path;

            } else {

                if ($sex == 'male') {
                    $profilephoto = 'imagesfb/male.jpg';

                } else {

                    $profilephoto = 'imagesfb/female.jpg';
                }


            }


            if ($unifriend->account == null || $unifriend->account == '1') {

                $outputs[] = array('name' => $unifriends,
                    'profilephoto' => $profilephoto,
                    'idd' => $idd,
                    'city' => $city,
                    'location' => $location,
                    'uname' => $uname


                );


            }


        }

        $list = DB::table('friends')
            ->where('mainuser', $rand)
            ->get();


        global $outputss;
        foreach ($list as $hello) {


            $otheruser = $hello->otheruser;

            $unifriend = DB::table('users')
                ->where('rand', $otheruser)
                ->first();

            if ($unifriend) {

                $unifriends = $unifriend->name;

                $uname = $unifriend->uname;

                $sex = $unifriend->sex;

                $idd = $unifriend->id;

                $city = $unifriend->city;
                $location = $unifriend->location;

            } else {
                $unifriends = '';

                $sex = '';

                $idd = '';

                $uname = '';

                $city = '';
                $location = '';


            }


            $snap = DB::table('profile')
                ->where('user_rand', $otheruser)
                ->first();


            if ($snap != null) {

                $profilephoto = $snap->path;

            } else {

                if ($sex == 'male') {
                    $profilephoto = 'imagesfb/male.jpg';

                } else {

                    $profilephoto = 'imagesfb/female.jpg';
                }


            }


            if ($unifriend->account == null || $unifriend->account == '1') {

                $outputss[] = array('name' => $unifriends,
                    'profilephoto' => $profilephoto,
                    'idd' => $idd,
                    'uname' => $uname,
                    'city' => $city,
                    'location' => $location

                );

            }

        }


        $langg = DB::table('addlanguage')
            ->first();

        $set = $langg->lang;

        if (!Session::get('locale') || $set == Session::get('locale')) {

            Session::put('locale', $set);

        }


        App::setLocale(Session::get('locale'));


        $view = View::make('fb.friendlist')->with('outputs', $outputs)->with('outputss', $outputss);
        $this->layout->with('colors', Template::All());
        $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
        $this->layout->content = $view;


    }

    /**
     * @method acceptfriend
     *
     * @param
     *
     * @return redirect page
     *
     *Public Function
     */
    public function acceptfriend()
    {


        $input = Input::all();


        $user = new Friends();
        $user->mainuser = $input['mainuser'];
        $user->otheruser = $input['otheruser'];

        $user->save();


        Notification::where('user', '=', $input['mainuser'])->where('friendrequest', '=', $input['otheruser'])->delete();

        date_default_timezone_set('Asia/Calcutta');
        $foo = date("h:i:sa");

        $docs = new Notilike();

        $docs->user = $input['otheruser'];
        $docs->otheruser = $input['mainuser'];
        $docs->timess = $foo;
        $docs->friendaccept = 'done';
        $docs->save();


        $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        return Redirect::route('profile');

        //return Redirect::to($url);


    }


    /**
     * @method home
     *
     * @param
     *
     * @return void
     *
     *Public Function
     */
    public function home()
    {


        $view = View::make('fb.home');
        $this->layout->with('colors', Template::All());
        $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
        $this->layout->content = $view;


    }

    /**
     * @method getregistersfb
     *
     * @param
     *
     * @return redirect page
     *
     *Public Function
     */
    public function getregistersfb()
    {


        $input = Input::all();
        $rules = array('email' => 'required|unique:users|email', 'password' => 'required', 'name' => 'required', 'city' => 'required', 'sex' => 'required');

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
            $user->sex = $input['sex'];
            $user->save();

            $code = $input['rand'];


            $data = array('email' => 'sahil_kaushal@esferasoft.com', 'first_name' => 'Sahil', 'from' => 'sahil_kaushal@esferasoft.com', 'activate' => $code);


            Mail::send('fb.activate', $data, function ($message) use ($user) {
                $message->to($user->email, $user->name)
                    ->subject('Welcome to LAravel!');
            });


            return Redirect::route('home');
        } else {

            return Redirect::to('home')->withInput()->withErrors($v);
        }


    }


    /**
     * @method friendrequest
     *
     * @param
     *
     * @return redirect page
     *
     *Public Function
     */
    public function friendrequest()
    {
        $input = Input::all();
        $urlid = $input['urlid'];


        $othuser = User::where('rand', '=', $input['friendrequest'])->first();


        $user = new Notification();


        $user->user = $input['user'];

        $user->friendrequest = $input['friendrequest'];

        $user->email = $othuser->email;

        $user->save();


        $confirmmail = DB::table('notitemplate')
            ->where('id', 1)
            ->first();

        $user->froms = $confirmmail->from;

        $user->subject = $confirmmail->subject;


        $data = array('content' => $confirmmail->comment, 'subject' => 'Notification', 'comment' => '', 'from' => '', 'from_name' => 'Meh');


        Mail::send('contact.request', $data, function ($friendrequest) use ($user) {


            $friendrequest->to($user->email, 'Notification')->from($user->froms, $user->froms)
                ->subject($user->subject);
        });


        return Redirect::to($urlid);
        //return Redirect::route('profile');


    }


    public function pendingcancel($name)
    {


        return Redirect::to($urlid);


    }


    /**
     * @method postcomdelete
     *
     * @param INT $id
     *
     * @return json
     *
     *Public Function
     */
    public function postcomdelete($id)
    {


        Postcomment::where('id', '=', $id)->delete();
        global $output;

        $output[] = array('idss' => $id


        );


        return json_encode($output, JSON_FORCE_OBJECT);

        //return Redirect::to($urlid);


    }

    /**
     * @method postdelete
     *
     * @param INT $id
     *
     * @return json
     *
     *Public Function
     */
    public function postdelete($id)
    {

        $post = DB::table('gallery')
            ->where('postid', $id)
            ->first();


        if ($post) {

            $postid = $post->id;


            Gallery::where('id', '=', $postid)->delete();

        }


        Post::where('id', '=', $id)->delete();
        global $output;

        $output[] = array('idss' => $id


        );


        return json_encode($output, JSON_FORCE_OBJECT);

        //return Redirect::to($urlid);


    }


    /**
     * @method deletecon
     *
     * @param
     *
     * @return redirect back
     *
     *Public Function
     */
    public function deletecon()
    {

        $input = Input::all();

        $user = $input['user'];
        $otheruser = $input['otheruser'];


        $entry = array(

            'deletecon' => $user
        );

        Message::where(['user' => $user, 'otheruser' => $otheruser])
            ->where('deletecon', '=', null)
            ->orWhere(['user' => $otheruser, 'otheruser' => $user])
            ->where('deletecon', '=', null)->update($entry);

        $entrys = array(

            'deletecon' => 'both'
        );

        Message::where(['user' => $user, 'otheruser' => $otheruser])
            ->where('deletecon', '=', $otheruser)
            ->orWhere(['user' => $otheruser, 'otheruser' => $user])
            ->where('deletecon', '=', $otheruser)->update($entrys);


        return Redirect::back();


    }


    /**
     * @method gallerydelete
     *
     * @param INT $id
     *
     * @return json
     *
     *Public Function
     */
    public function gallerydelete($id)
    {


        Gallery::where('id', '=', $id)->delete();
        global $output;

        $output[] = array('idss' => $id


        );


        return json_encode($output, JSON_FORCE_OBJECT);

        //return Redirect::to($urlid);


    }


    /**
     * @method unfriendrequest
     *
     * @param
     *
     * @return redirect page
     *
     *Public Function
     */
    public function unfriendrequest()
    {


        $input = Input::all();
        $urlid = $input['urlid'];


        $user = $input['user'];
        $request = $input['friendrequest'];


        Notification::where('user', '=', $user)->where('friendrequest', '=', $request)->delete();

        Friends::where('mainuser', '=', $user)->where('otheruser', '=', $request)->delete();

        Friends::where('otheruser', '=', $user)->where('mainuser', '=', $request)->delete();


        return Redirect::to($urlid);


    }


    /**
     * @method profileopen
     *
     * @param INT $id
     *
     * @return redirect page
     *
     *Public Function
     */
    public function profileopen($name)
    {


        $seo = DB::table('users')
            ->where('uname', $name)
            ->first();

        if (!$seo) {
//return Redirect::route('notaccess');
            App::abort(404);
        }

        $id = $seo->id;


        if (!Auth::check()) {

            return Redirect::to('home');
        }

        $rand = Auth::user()->rand;
        $idds = Auth::user()->id;


        if ($id == $idds) {


            return Redirect::route('profile');
        }


        $visitor = $seo->visitors;

        if ($visitor == 0 || $visitor == '0') {

            $visitorrand = $seo->rand;


            $findfriend = DB::table('friends')
                ->where(['mainuser' => $visitorrand, 'otheruser' => $rand])
                ->orWhere(['otheruser' => $visitorrand, 'mainuser' => $rand])
                ->first();

            if ($findfriend) {

                $visi = 'done';

            } else {

                $visi = 'notdone';

            }

        } else {
            $visi = 'done';

        }


        $profile = User::where('id', '=', $id)->first();


        $rands = $profile->rand;

        $uname = $profile->uname;

        if (Auth::user()->username != 'admin') {
            $block = DB::table('block')
                ->where(['other' => $rand, 'user' => $rands])
                ->orWhere(['user' => $rand, 'other' => $rands])
                ->first();


            if ($block) {

                // return Redirect::route('notaccess');
                App::abort(404);
            }


        }


        if ($profile->account == '0') {

            // return Redirect::route('notaccess');
            App::abort(404);

        }


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


        $frnd = DB::table('friends')
            ->where(['otheruser' => $rands])
            ->orWhere(['mainuser' => $rands])
            ->get();


        if ($frnd) {


            $i = 0;
            foreach ($frnd as $hello) {


                if ($hello->otheruser == $rands) {

                    $frndpost = $hello->mainuser;


                } else {

                    $frndpost = $hello->otheruser;


                }


                $values = DB::table('post')
                    ->where('user_rand', $frndpost)->orderBy('created_at', 'desc')
                    ->get();


                if ($values) {


                    foreach ($values as $hello) {


                        global $postlist;

                        $postlist[] = array('post' => $hello->post,
                            'path' => $hello->path,
                            'user_rand' => $hello->user_rand,
                            'like' => $hello->like,
                            'imagessvideo' => $hello->imagessvideo,
                            'curdate' => $hello->curdate,
                            'id' => $hello->id,
                            'myid' => ''

                        );


                    }


                } else {


                    global $postlist;

                    $postlist[] = array('post' => '',
                        'path' => '',
                        'user_rand' => '',
                        'like' => '',
                        'imagessvideo' => '',
                        'curdate' => '',
                        'id' => '',
                        'myid' => ''

                    );


                }
                if ($i == 0) {

                    $unival = DB::table('post')
                        ->where('user_rand', $rands)->orderBy('created_at', 'desc')
                        ->get();


                    foreach ($unival as $hello) {

                        global $postlist;


                        $postlist[] = array('post' => $hello->post,
                            'path' => $hello->path,
                            'user_rand' => $hello->user_rand,
                            'like' => $hello->like,
                            'imagessvideo' => $hello->imagessvideo,
                            'curdate' => $hello->curdate,
                            'id' => $hello->id,
                            'myid' => 'myid'

                        );

                    }

                }


                $i++;


            }


            $id = array();

            foreach ($postlist as $val => $key) {


                $id[$val] = $key['id'];


            }

            array_multisort($id, SORT_DESC, $postlist);


        } else {

            $unival = DB::table('post')
                ->where('user_rand', $rands)->orderBy('created_at', 'desc')
                ->get();

            if ($unival) {

                foreach ($unival as $hello) {

                    global $postlist;


                    $postlist[] = array('post' => $hello->post,
                        'path' => $hello->path,
                        'user_rand' => $hello->user_rand,
                        'like' => $hello->like,
                        'imagessvideo' => $hello->imagessvideo,
                        'curdate' => $hello->curdate,
                        'id' => $hello->id,
                        'myid' => 'myid'

                    );

                }

            } else {

                global $postlist;


                $postlist[] = array('post' => '',
                    'path' => '',
                    'user_rand' => '',
                    'like' => '',
                    'imagessvideo' => '',
                    'curdate' => '',
                    'id' => '',
                    'myid' => ''

                );


            }


        }


        $postcomment = DB::table('postcomment')->get();
        $userss = DB::table('users')->get();


        $accept = DB::table('notification')
            ->where('friendrequest', $rand)->where('user', $rands)
            ->first();


        $pending = DB::table('notification')
            ->where('friendrequest', $rands)->where('user', $rand)
            ->first();


        $block = DB::table('block')
            ->where('user', $rand)->where('other', $rands)
            ->first();

        if ($block) {

            $blocks = 'yes';
        } else {

            $blocks = 'no';
        }

        $alluser = DB::table('users')->get();
        $allimg = DB::table('profile')->get();


        $langg = DB::table('addlanguage')
            ->first();

        $set = $langg->lang;

        if (!Session::get('locale') || $set == Session::get('locale')) {

            Session::put('locale', $set);

        }


        App::setLocale(Session::get('locale'));


        $perPage = 10;
        if (Input::get('page')) {
            $currentPage = Input::get('page') - 1;
        } else {

            $currentPage = 0;
        }
        $pagedData = array_slice($postlist, $currentPage * $perPage, $perPage);
        $matches = Paginator::make($pagedData, count($postlist), $perPage);


        if (Request::ajax()) {


            $view = View::make('fb.renuser')->with('uname', $uname)->with('rands', $rands)->with('uniname', $name)->with('visi', $visi)->with('alluser', $alluser)->with('allimg', $allimg)->with('blocks', $blocks)->with('userss', $userss)->with('proinfo', $value)->with('userinfo', $profile)->with('post', $matches)->with('add', $count)->with('adds', $counts)->with('addss', $countss)->with('postcomment', $postcomment)->with('accept', $accept)->with('pending', $pending)->render();


            return Response::json(array('contents' => $view));


        } else {


            $view = View::make('fb.profileuser')->with('uname', $uname)->with('rands', $rands)->with('uniname', $name)->with('visi', $visi)->with('alluser', $alluser)->with('allimg', $allimg)->with('blocks', $blocks)->with('userss', $userss)->with('proinfo', $value)->with('userinfo', $profile)->with('post', $matches)->with('add', $count)->with('adds', $counts)->with('addss', $countss)->with('postcomment', $postcomment)->with('accept', $accept)->with('pending', $pending);
            $this->layout->with('colors', Template::All());
            $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
            $this->layout->content = $view;

        }


    }


    /**
     * @method getloginsfb
     *
     * @param
     *
     * @return redirect page
     *
     *Public Function
     */
    public function getloginsfb()
    {


        $input = Input::all();
        $rules = array('email' => 'required|email', 'password' => 'required');

        $v = Validator::make($input, $rules);

        if ($v->fails()) {

            return Redirect::to('home')->withInput()->withErrors($v);
        } else {


            $credentails = array('email' => $input['email'], 'password' => $input['password'], 'activate' => '1');

            if (Auth::attempt($credentails)) {


                return Redirect::to('profile')->with('message', 'I am the best');
            } else {

                return Redirect::to('home')->withErrors('Not valid id , password or Activation');;
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
     *Public Function
     */
    public function logoutsfb()
    {


        //$email = Auth::user()->email;

        Auth::logout();


        return Redirect::route('home');

    }


    /**
     * @method messages
     *
     * @param INT $id
     *
     * @return redirect page
     *
     *Public Function
     */
    public function messages($name)
    {

        $seo = User::where('uname', '=', $name)->first();

        if (!$seo) {
//return Redirect::route('notaccess');
            App::abort(404);
        }

        $id = $seo->id;


        if (!Auth::check()) {

            return Redirect::to('home');
        }


        $rand = Auth::user()->rand;

        $profile = User::where('id', '=', $id)->first();
        $rands = $profile->rand;

        $block = DB::table('block')
            ->where(['other' => $rand, 'user' => $rands])
            ->orWhere(['user' => $rand, 'other' => $rands])
            ->first();

        if ($block) {

            // return Redirect::route('notaccess');
            App::abort(404);
        }

        if ($profile->account == '0') {

//  return Redirect::route('notaccess');
            App::abort(404);

        }

        $sexs = Auth::user()->sex;

        $profiles = Profile::where('user_rand', '=', $rand)->first();

        if ($profiles) {

            $mainuserprofiles = $profiles->path;


            if ($mainuserprofiles != null) {
                $mainuserprofile = $profiles->thumb;

            } else {

                if ($sexs == 'male') {
                    $mainuserprofile = 'imagesfb/male.jpg';

                } else {

                    $mainuserprofile = 'imagesfb/female.jpg';
                }


            }


        } else {

            if ($sexs == 'male') {
                $mainuserprofile = 'imagesfb/male.jpg';

            } else {

                $mainuserprofile = 'imagesfb/female.jpg';
            }


        }


        $profile = User::where('id', '=', $id)->first();
        $sex = $profile->sex;

        $otheruser = $profile->rand;


        $entry = array(

            'count' => null,
            'read' => 1);


        Message::where('user', '=', $otheruser)->where('otheruser', '=', $rand)->update($entry);


        $profiless = Profile::where('user_rand', '=', $otheruser)->first();


        if ($profiless != null) {
            $otheruserprofile = $profiless->path;


        } else {

            if ($sex == 'male') {
                $otheruserprofile = 'imagesfb/male.jpg';

            } else {

                $otheruserprofile = 'imagesfb/female.jpg';
            }


        }


        $langg = DB::table('addlanguage')
            ->first();

        $set = $langg->lang;

        if (!Session::get('locale') || $set == Session::get('locale')) {

            Session::put('locale', $set);

        }


        App::setLocale(Session::get('locale'));


        $alluser = DB::table('users')->get();


        $userchat = Message::where(['user' => $rand, 'otheruser' => $otheruser])
            ->orWhere(['user' => $otheruser, 'otheruser' => $rand])->orderBy('id', 'ASC')->get();


        /*  $userchat = Message::where(['user' => $rand, 'otheruser' => $otheruser])
             ->orWhere(['user' => $otheruser, 'otheruser' => $rand])
             ->whereNotIn('deletecon', [$rand, 'both'])
             ->orderBy('id', 'ASC')->get();
*/


        $view = View::make('fb.messages')->with('alluser', $alluser)->with('proinfo', $profile)->with('userchat', $userchat)->with('mainuserprofile', $mainuserprofile)->with('otheruserprofile', $otheruserprofile);


        $this->layout->with('colors', Template::All());
        $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
        $this->layout->content = $view;
    }


    /**
     * @method messagestore
     *
     * @param INT $id
     *
     * @return json
     *
     *Public Function
     */
    public function messagestore($id)
    {

        date_default_timezone_set('Asia/Calcutta');
        $foo = date("h:i:sa");

        $id = Input::get('id');
        $user = Input::get('user');
        $otheruser = Input::get('otheruser');

        $comment = strip_tags(Input:: get('comment'));
        $name = Input::get('name');
        $othername = Input::get('othername');
        $doc = new Message();

        $doc->user = $user;
        $doc->chat = $comment;
        $doc->otheruser = $otheruser;
        $doc->timess = $foo;
        $doc->othername = $othername;
        $doc->name = $name;
        $doc->save();


        $snap = DB::table('profile')
            ->where('user_rand', $user)
            ->first();

        if ($snap != null) {

            $profilephoto = $snap->thumb;

        } else {

            if ($sex == 'male') {
                $profilephoto = 'imagesfb/male.jpg';

            } else {

                $profilephoto = 'imagesfb/female.jpg';
            }


        }

        global $output;


        $output[] = array('user' => $doc->user,
            'comment' => $doc->chat,
            'otheruser' => $doc->otheruser,
            'names' => $name,
            'timess' => $doc->timess,
            'profilephoto' => $profilephoto

        );


        return json_encode($output, JSON_FORCE_OBJECT);


    }


    /**
     * @method messagesonline
     *
     * @param
     *
     * @return json
     *
     *Public Function
     */
    public function messagesonline()
    {

        date_default_timezone_set('Asia/Calcutta');
        $foo = date("h:i:sa");


        $user = Input::get('user');
        $otheruser = Input::get('otheruser');

        // $comment=Input::get('comment');

        $comment = strip_tags(Input:: get('comment'));

        $name = Input::get('name');
        $othername = Input::get('othername');
        $doc = new Message();

        $doc->user = $user;
        $doc->chat = $comment;
        $doc->otheruser = $otheruser;
        $doc->timess = $foo;
        $doc->othername = $othername;
        $doc->name = $name;
        $doc->count = 1;
        $doc->save();


        global $output;


        $output[] = array('user' => $doc->user,
            'comment' => $doc->chat,
            'otheruser' => $doc->otheruser,
            'names' => $name,
            'timess' => $doc->timess

        );


        return json_encode($output, JSON_FORCE_OBJECT);


    }


    /**
     * @method forgetpass
     *
     * @param
     *
     * @return redirect back
     *
     *Public Function
     */
    public function forgetpass()
    {


        $input = Input::all();
        $rules = array('email' => 'required');
        $user = new User();
        $v = Validator::make($input, $rules);

        if ($v->passes()) {

            $email = $input['email'];

            $emailaccess = DB::table('users')
                ->where('email', $email)
                ->first();

            if (!$emailaccess) {
                Session::flash('emailaccess', "Email doesn't exists");

                return Redirect::to('home');
            }


            $forget = $input['forget'];

            $message = 'Forget';


            $entry = array(

                'forget' => $forget

            );

            User::where('email', '=', $email)->update($entry);


            $input = Input::all();

            $user = new Contact();

            $user->email = $input['email'];

            $data = array('email' => 'sahil_kaushal@esferasoft.com', 'first_name' => 'Sahil', 'from' => 'sahil_kaushal@esferasoft.com', 'from_name' => 'Meh', 'key' => $forget);


            Mail::send('fb.forget', $data, function ($message) use ($user) {
                $message->to($user->email, 'Test')
                    ->subject('Welcome to LAravel!');
            });


            Session::flash('forgetpass', "Please clicking on the link provided by an email you will receive for change the password.");
            return Redirect::back();


            // return Redirect::route('home');


        } else {

            return Redirect::to('home')->withInput()->withErrors($v);
        }


    }


    /**
     * @method postupdate
     *
     * @param INT $id
     *
     * @return json
     *
     *Public Function
     */
    public function postupdate($id)
    {

        // $valuess=Input::get('value');
        $valuess = strip_tags(Input:: get('value'));


        $entry = array(

            'post' => $valuess

        );

        Post::where('id', '=', $id)->update($entry);


        global $output;


        $output[] = array('idss' => $id,
            'valuess' => $valuess


        );


        return json_encode($output, JSON_FORCE_OBJECT);


    }

    /**
     * @method comupdate
     *
     * @param INT $id
     *
     * @return json
     *
     *Public Function
     */
    public function comupdate($id)
    {


        $valuess = strip_tags(Input:: get('value'));
        $entry = array(

            'comment' => $valuess

        );

        Postcomment::where('id', '=', $id)->update($entry);


        global $output;


        $output[] = array('idss' => $id,
            'valuess' => $valuess


        );


        return json_encode($output, JSON_FORCE_OBJECT);


    }


    /**
     * @method updateforget
     *
     * @param
     *
     * @return redirect page
     *
     *Public Function
     */
    public function updateforget()
    {


        $input = Input::all();
        $rules = array('password' => 'required|confirmed');

        $v = Validator::make($input, $rules);

        if ($v->passes()) {


            $pass = $input['password'];
            $pass = Hash::make($pass);

            $email = $input['email'];

            $id = $input['id'];


            $entry = array(

                'password' => $pass


            );

            $acces = DB::table('users')->where('forget', '=', $id)->where('email', '=', $email)->first();

            if ($acces) {

                User::where('forget', '=', $id)->where('email', '=', $email)->update($entry);
                Session::flash('updatepass', "Successfully Updated");

                return Redirect::route('home');

            } else {

                Session::flash('updatepass', "Email address doesn't exist");
                return Redirect::back();

            }

        } else {
            $id = $input['id'];
            return Redirect::to('resetpass/' . $id . '')->withInput()->withErrors($v);
        }


    }

    /**
     * @method chatupdate
     *
     * @param
     *
     * @return redirect back
     *
     *Public Function
     */
    public function chatupdate()
    {

        $id = Input::get('id');

        $entry = array(

            'chat' => Input::get('chat')


        );

        Onlineuser::where('user_rand', '=', $id)->update($entry);

        return Redirect::back();


    }

    /**
     * @method accountupdate
     *
     * @param
     *
     * @return redirect page
     *
     *Public Function
     */
    public function accountupdate()
    {

        $id = Input::get('id');

        $entry = array(

            'account' => Input::get('account')


        );

        User::where('id', '=', $id)->update($entry);


        Auth::logout();


        return Redirect::route('home');


        // return Redirect::back();


    }


    public function provisiter()
    {

        $id = Input::get('id');

        $entry = array(

            'visitors' => Input::get('account')


        );

        User::where('id', '=', $id)->update($entry);


        return Redirect::back();


    }


    public function deleteaccount()
    {


        if (!Auth::check()) {

            return Redirect::to('home');
        }


        $langg = DB::table('addlanguage')
            ->first();

        $set = $langg->lang;

        if (!Session::get('locale') || $set == Session::get('locale')) {

            Session::put('locale', $set);

        }


        App::setLocale(Session::get('locale'));

        $rand = Auth::user()->rand;


        $view = View::make('fb.deleteaccount');


        $this->layout->with('colors', Template::All());
        $this->layout->with('logo', Logo::find(1))->with('set', Set::find(1));
        $this->layout->content = $view;
    }


    public function delaccount()
    {


        $input = Input::all();
        $rules = array('password' => 'required');

        $v = Validator::make($input, $rules);

        if ($v->passes()) {


            if (Auth::attempt(array('email' => Auth::user()->email, 'password' => $input['password']), true)) {


                $rand = Auth::user()->rand;

                $id = Auth::user()->id;


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


                Auth::logout();

                Session::flush();

                Session::flash('updatepass', "Successfully Account Deleted");

                return Redirect::to('home');

            } else {


                Session::flash('updatepass', "Password Not Correct");
                return Redirect::back();


            }

        } else {

            return Redirect::to('deleteaccount')->withInput()->withErrors($v);
        }


    }


    public function nextload()
    {

        if (!Auth::check()) {

            return Redirect::to('home');
        }


        $langg = DB::table('addlanguage')
            ->first();

        $set = $langg->lang;

        if (!Session::get('locale') || $set == Session::get('locale')) {

            Session::put('locale', $set);

        }


        App::setLocale(Session::get('locale'));


        $rand = Auth::user()->rand;

        $userid = Auth::user()->id;
        $value = DB::table('profile')
            ->where('user_rand', $rand)
            ->get();
        $pick = DB::table('profile')
            ->where('user_rand', $rand)
            ->first();


        $allimg = DB::table('profile')->get();

        $alluser = DB::table('users')->get();


        $photos = count($value);


        $frnd = DB::table('friends')
            ->where(['otheruser' => $rand])
            ->orWhere(['mainuser' => $rand])
            ->get();


        if ($frnd) {


            $i = 0;
            foreach ($frnd as $hello) {


                if ($hello->otheruser == $rand) {

                    $frndpost = $hello->mainuser;


                } else {

                    $frndpost = $hello->otheruser;


                }

                $checkblock = DB::table('block')
                    ->where(['other' => $frndpost, 'user' => $rand])
                    ->orWhere(['user' => $frndpost, 'other' => $rand])
                    ->first();

                if (!$checkblock) {


                    $values = DB::table('post')
                        ->where('user_rand', $frndpost)->orderBy('created_at', 'desc')
                        ->get();


                    foreach ($values as $hello) {


                        global $postlist;

                        $postlist[] = array('post' => $hello->post,
                            'path' => $hello->path,
                            'user_rand' => $hello->user_rand,
                            'like' => $hello->like,
                            'imagessvideo' => $hello->imagessvideo,
                            'curdate' => $hello->curdate,
                            'id' => $hello->id

                        );


                    }

                }

                if ($i == 0) {

                    $unival = DB::table('post')
                        ->where('user_rand', $rand)->orderBy('created_at', 'desc')
                        ->get();

                    foreach ($unival as $hello) {


                        $postlist[] = array('post' => $hello->post,
                            'path' => $hello->path,
                            'user_rand' => $hello->user_rand,
                            'like' => $hello->like,
                            'imagessvideo' => $hello->imagessvideo,
                            'curdate' => $hello->curdate,
                            'id' => $hello->id

                        );

                    }

                }


                $i++;
            }


            $id = array();

            foreach ($postlist as $val => $key) {


                $id[$val] = $key['id'];


            }

            array_multisort($id, SORT_DESC, $postlist);


        } else {

            $unival = DB::table('post')
                ->where('user_rand', $rand)->orderBy('created_at', 'desc')
                ->get();

            if ($unival) {

                foreach ($unival as $hello) {

                    global $postlist;


                    $postlist[] = array('post' => $hello->post,
                        'path' => $hello->path,
                        'user_rand' => $hello->user_rand,
                        'like' => $hello->like,
                        'imagessvideo' => $hello->imagessvideo,
                        'curdate' => $hello->curdate,
                        'id' => $hello->id

                    );

                }

            } else {

                global $postlist;


                $postlist[] = array('post' => '',
                    'path' => '',
                    'user_rand' => '',
                    'like' => '',
                    'imagessvideo' => '',
                    'curdate' => '',
                    'id' => ''

                );


            }

        }


        $postcomment = DB::table('postcomment')->get();

        $events = DB::table('createevent')
            ->where('user', $rand)->orderBy('dates', 'ASC')
            ->get();


        $rand = Auth::user()->rand;


        $lists = DB::table('friends')
            ->where('otheruser', $rand)
            ->get();


        global $outputs;
        foreach ($lists as $hello) {


            $otheruser = $hello->mainuser;

            $unifriend = DB::table('users')
                ->where('rand', $otheruser)
                ->first();

            if ($unifriend) {

                $unifriends = $unifriend->name;

                $uname = $unifriend->uname;

                $otherrands = $unifriend->rand;

                $idd = $unifriend->id;

                $city = $unifriend->city;
                $location = $unifriend->location;

                $sex = $unifriend->sex;

            } else {

                $unifriends = '';

                $otherrands = '';

                $uname = '';

                $idd = '';

                $city = '';
                $location = '';

                $sex = '';

            }


            $snap = DB::table('profile')
                ->where('user_rand', $otheruser)
                ->first();

            if ($snap != null) {

                $profilephoto = $snap->thumb;

            } else {

                if ($sex == 'male') {
                    $profilephoto = 'imagesfb/male.jpg';

                } else {

                    $profilephoto = 'imagesfb/female.jpg';
                }


            }


            if ($unifriend->account == null || $unifriend->account == '1') {


                $onlineblck = DB::table('block')
                    ->where(['other' => $otherrands, 'user' => $rand])
                    ->orWhere(['user' => $otherrands, 'other' => $rand])
                    ->get();


                if ($onlineblck) {

                    foreach ($onlineblck as $onbck) {

                        if ($onbck->other == $otherrands && $onbck->user == Auth::user()->rand || $onbck->user == $otherrands && $onbck->other == Auth::user()->rand) {


                        } else {

                            $outputss[] = array('name' => $unifriends,
                                'profilephoto' => $profilephoto,
                                'idd' => $idd,
                                'city' => $city,
                                'uname' => $uname,
                                'location' => $location,
                                'otherrands' => $otherrands

                            );
                        }

                    }

                } else {

                    $outputs[] = array('name' => $unifriends,
                        'profilephoto' => $profilephoto,
                        'idd' => $idd,
                        'city' => $city,
                        'uname' => $uname,
                        'location' => $location,
                        'otherrands' => $otherrands


                    );
                }


            }

        }

        $list = DB::table('friends')
            ->where('mainuser', $rand)
            ->get();


        global $outputss;
        foreach ($list as $hello) {


            $otheruser = $hello->otheruser;

            $unifriend = DB::table('users')
                ->where('rand', $otheruser)
                ->first();

            if ($unifriend) {
                $unifriends = $unifriend->name;

                $uname = $unifriend->uname;

                $otherrands = $unifriend->rand;

                $sex = $unifriend->sex;

                $idd = $unifriend->id;

                $city = $unifriend->city;
                $location = $unifriend->location;

            } else {

                $unifriends = '';

                $otherrands = '';

                $idd = '';

                $uname = '';

                $city = '';
                $location = '';

                $sex = '';

            }


            $snap = DB::table('profile')
                ->where('user_rand', $otheruser)
                ->first();


            if ($snap != null) {

                $profilephoto = $snap->thumb;

            } else {

                if ($sex == 'male') {
                    $profilephoto = 'imagesfb/male.jpg';

                } else {

                    $profilephoto = 'imagesfb/female.jpg';
                }


            }


            if ($unifriend->account == null || $unifriend->account == '1') {


                $onlineblck = DB::table('block')
                    ->where(['other' => $otherrands, 'user' => $rand])
                    ->orWhere(['user' => $otherrands, 'other' => $rand])
                    ->get();


                if ($onlineblck) {

                    foreach ($onlineblck as $onbck) {

                        if ($onbck->other == $otherrands && $onbck->user == Auth::user()->rand || $onbck->user == $otherrands && $onbck->other == Auth::user()->rand) {


                        } else {

                            $outputss[] = array('name' => $unifriends,
                                'profilephoto' => $profilephoto,
                                'idd' => $idd,
                                'uname' => $uname,
                                'city' => $city,
                                'location' => $location,
                                'otherrands' => $otherrands

                            );
                        }

                    }

                } else {

                    $outputss[] = array('name' => $unifriends,
                        'profilephoto' => $profilephoto,
                        'idd' => $idd,
                        'city' => $city,
                        'uname' => $uname,
                        'location' => $location,
                        'otherrands' => $otherrands

                    );
                }


            }

        }


        $rand = Auth::user()->rand;


        $block = DB::table('block')
            ->where(['other' => $rand])
            ->orWhere(['user' => $rand])
            ->get();


// $postlists = Paginator::make($postlist, 6, 2);
// $postlist=$postlists->paginate(2);
        $perPage = 2;
        $currentPage = Input::get('page') - 1;
        $pagedData = array_slice($postlist, $currentPage * $perPage, $perPage);
        $matches = Paginator::make($pagedData, count($postlist), $perPage);


        return $matches;

        //  return View::make('fb.news')->with('alluser', $alluser)->with('allimg', $allimg)->with('block', $block)->with('outputs', $outputs)->with('outputss', $outputss)->with('events', $events)->with('profile', $value)->with('pick', $pick)->with('post', $matches)->with('photos', $photos)->with('postcomment', $postcomment);


    }


}


?>
