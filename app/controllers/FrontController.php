<?php

class FrontController extends BaseController
{
    public $restful = true;
    public $layout = 'layouts.theme';
    public $layouts = 'layouts.login';
    public $fb = 'layouts.fb';

    public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'post']);
    }

    public function index()
    {


        if (Auth::user()) {

            $rand = Auth::user()->rand;

            $query = DB::table('shopping');

            $query->where('rand', $rand);

            $rows = $query->get();

        } else {

            $rows = 0;
        }

        $querys = DB::table('event');
        $querys->where('brand', 'PUMA');
        $rowss = $querys->get();
        $queryss = DB::table('event');
        $queryss->where('brand', 'DISEL');
        $rowsss = $queryss->get();
        $queryss = DB::table('event');
        $queryss->where('brand', 'LEVIS');
        $rowssss = $queryss->get();

        $curr = Currency::where('id', '=', '1')->first();


        $view = View::make('live.index')->with('viewevent', Events::Paginate(6))->with('viewslider', Slider::find(1))->with('shopping', $rows)->with('currency', $curr)->with('menu', Menu::All())->with('submenu', Submenu::All())->with('chat', Chat::All())->with('chatrecords', Chatrecord::All());
        $this->layout->with('shopping', $rows)->with('currency', $curr)->with('category', Category::All())->with('puma', $rowss)->with('disel', $rowsss)->with('levis', $rowssss)->with('subcategory', Subcategory::All());
        $this->layout->content = $view;
        //echo View::make('live.rightsidebar')->with('shopping', Shopping::find(10));
    }


    public function sites()
    {


        $view = View::make('live.sites')->with('viewevent', Events::Paginate(6))->with('viewslider', Slider::find(1))->with('shopping', $rows)->with('currency', $curr)->with('menu', Menu::All())->with('submenu', Submenu::All())->with('chat', Chat::All())->with('chatrecords', Chatrecord::All());
        $this->fb->with('shopping', $rows)->with('currency', $curr)->with('category', Category::All())->with('puma', $rowss)->with('disel', $rowsss)->with('levis', $rowssss)->with('subcategory', Subcategory::All());
        $this->fb->content = $view;

    }


    public function blog()
    {


        if (Auth::user()) {

            $rand = Auth::user()->rand;

            $query = DB::table('shopping');

            $query->where('rand', $rand);

            $rows = $query->get();

        } else {

            $rows = 0;
        }
        $querys = DB::table('event');
        $querys->where('brand', 'PUMA');
        $rowss = $querys->get();
        $queryss = DB::table('event');
        $queryss->where('brand', 'DISEL');
        $rowsss = $queryss->get();
        $queryss = DB::table('event');
        $queryss->where('brand', 'LEVIS');
        $rowssss = $queryss->get();


        $curr = Currency::where('id', '=', '1')->first();


        $querys = DB::table('event');

        $querys->where('brand', 'PUMA');

        $rowss = $querys->get();


        $view = View::make('live.blog')->with('shopping', $rows)->with('currency', $curr)->with('blog', Blog::Paginate(2));
        $this->layout->with('shopping', $rows)->with('currency', $curr)->with('puma', $rowss)->with('disel', $rowsss)->with('levis', $rowssss)->with('category', Category::All())->with('subcategory', Subcategory::All());
        $this->layout->content = $view;

    }


    public function blogsingle()
    {


        if (Auth::user()) {

            $rand = Auth::user()->rand;

            $query = DB::table('shopping');

            $query->where('rand', $rand);

            $rows = $query->get();

        } else {

            $rows = 0;
        }


        $querys = DB::table('event');
        $querys->where('brand', 'PUMA');
        $rowss = $querys->get();
        $queryss = DB::table('event');
        $queryss->where('brand', 'DISEL');
        $rowsss = $queryss->get();
        $queryss = DB::table('event');
        $queryss->where('brand', 'LEVIS');
        $rowssss = $queryss->get();

        $curr = Currency::where('id', '=', '1')->first();

        $view = View::make('live.blogsingle')->with('shopping', $rows)->with('currency', $curr)->with('comment', Comment::All());
        $this->layout->with('shopping', $rows)->with('currency', $curr)->with('puma', $rowss)->with('disel', $rowsss)->with('levis', $rowssss)->with('category', Category::All())->with('subcategory', Subcategory::All());
        $this->layout->content = $view;

    }


    public function details($id)
    {

        if (Auth::user()) {

            $rand = Auth::user()->rand;

            $query = DB::table('shopping');

            $query->where('rand', $rand);

            $rows = $query->get();

        } else {

            $rows = 0;
        }

        $querys = DB::table('event');
        $querys->where('brand', 'PUMA');
        $rowss = $querys->get();
        $queryss = DB::table('event');
        $queryss->where('brand', 'DISEL');
        $rowsss = $queryss->get();
        $queryss = DB::table('event');
        $queryss->where('brand', 'LEVIS');
        $rowssss = $queryss->get();


        $query = DB::table('comment');
        $query->where('product_id', $id);


        $rows = $query->get();


        $querys = DB::table('rating');
        $querys->where('product_id', $id);


        $rating = $querys->get();


        $curr = Currency::where('id', '=', '1')->first();
        $view = View::make('live.details')->with('viewdetails', Events::find($id))->with('currency', $curr)->with('comment', $rows)->with('rating', $rating);
        /*
        $view->location='india';
        $view['speciality']='PHP';
        return $view;
        */
        $this->layout->with('shopping', $rows)->with('currency', $curr)->with('puma', $rowss)->with('disel', $rowsss)->with('levis', $rowssss)->with('category', Category::All())->with('subcategory', Subcategory::All());
        $this->layout->content = $view;
    }


    public function addtocart($id)
    {


        if (Auth::user()) {

            $input = Input::all();

            $user = new Shopping();


            $user->price = $input['price'];
            $user->product = $input['name'];
            $user->rand = $input['rand'];
            $user->save();

            return Redirect::route('site');

        } else {

            return Redirect::route('loginfirst');

        }


    }


    public function find()
    {


        if (Request::ajax()) {

            $data['input'] = Input::get('dataString');


            if ($data['input'] == 1) {

                $curr = '$';


            } else {

                $curr = '€';


            }


            DB::table('currency')
                ->where('id', 1)
                ->update(array('currency' => $curr));


            return $curr;
        }


    }


    public function search()
    {


        if (Auth::user()) {

            $rand = Auth::user()->rand;

            $query = DB::table('shopping');

            $query->where('rand', $rand);

            $rows = $query->get();

        } else {

            $rows = 0;
        }

        $querys = DB::table('event');
        $querys->where('brand', 'PUMA');
        $rowss = $querys->get();
        $queryss = DB::table('event');
        $queryss->where('brand', 'DISEL');
        $rowsss = $queryss->get();
        $queryss = DB::table('event');
        $queryss->where('brand', 'LEVIS');
        $rowssss = $queryss->get();

        $q = Input::get('search');

        $searchTerms = explode(' ', $q);

        $query = DB::table('event');

        foreach ($searchTerms as $term) {
            $query->where('name', 'LIKE', '%' . $term . '%');
        }

        $results = $query->get();
        $curr = Currency::where('id', '=', '1')->first();
        $view = View::make('live.search')->with('search', $results)->with('currency', $curr);
        $this->layout->with('shopping', $rows)->with('currency', $curr)->with('puma', $rowss)->with('disel', $rowsss)->with('levis', $rowssss)->with('category', Category::All())->with('subcategory', Subcategory::All());
        $this->layout->content = $view;


    }


    public function brand($name)
    {


        if (Auth::user()) {

            $rand = Auth::user()->rand;

            $query = DB::table('shopping');

            $query->where('rand', $rand);

            $rows = $query->get();

        } else {

            $rows = 0;
        }

        $querys = DB::table('event');
        $querys->where('brand', 'PUMA');
        $rowss = $querys->get();
        $queryss = DB::table('event');
        $queryss->where('brand', 'DISEL');
        $rowsss = $queryss->get();
        $queryss = DB::table('event');
        $queryss->where('brand', 'LEVIS');
        $rowssss = $queryss->get();

        //  $q = Input::get('search');

        $searchTerms = explode(' ', $name);

        $query = DB::table('event');

        foreach ($searchTerms as $term) {
            $query->where('brand', 'LIKE', '%' . $term . '%');
        }

        $results = $query->get();
        $curr = Currency::where('id', '=', '1')->first();
        $view = View::make('live.search')->with('search', $results)->with('currency', $curr);
        $this->layout->with('shopping', $rows)->with('currency', $curr)->with('puma', $rowss)->with('disel', $rowsss)->with('levis', $rowssss)->with('category', Category::All())->with('subcategory', Subcategory::All());
        $this->layout->content = $view;


    }


    public function pricerange()
    {


        if (Auth::user()) {

            $rand = Auth::user()->rand;

            $query = DB::table('shopping');

            $query->where('rand', $rand);

            $rows = $query->get();

        } else {

            $rows = 0;
        }

        $querys = DB::table('event');
        $querys->where('brand', 'PUMA');
        $rowss = $querys->get();
        $queryss = DB::table('event');
        $queryss->where('brand', 'DISEL');
        $rowsss = $queryss->get();
        $queryss = DB::table('event');
        $queryss->where('brand', 'LEVIS');
        $rowssss = $queryss->get();


        $q = Input::get('pricerange');

        $searchTerms = explode(' ', $q);

        $query = DB::table('event');

        foreach ($searchTerms as $term) {
            $query->where('price', '<=', $term);
        }

        $results = $query->get();
        $curr = Currency::where('id', '=', '1')->first();
        $view = View::make('live.search')->with('search', $results)->with('currency', $curr);
        $this->layout->with('shopping', $rows)->with('currency', $curr)->with('puma', $rowss)->with('disel', $rowsss)->with('levis', $rowssss)->with('category', Category::All())->with('subcategory', Subcategory::All());
        $this->layout->content = $view;


    }


    public function shoppingdelete($id)
    {

        Shopping::find($id)->delete();
        return Redirect::route('checkout');

    }


    public function paypaldelete($id)
    {


        $query = DB::table('shopping');
        $query->where('rand', $id);
        $rows = $query->get();

        foreach ($rows as $key => $hello) {

            $rand = $hello->rand;
            $user = new Orders();
            $user->rand = $hello->rand;
            $user->price = $hello->price;
            $user->product = $hello->product;
            $user->save();

            Shopping::where('rand', '=', $id)->delete();


        }

//$comment = $post->orders()->save($orders);


        //Shopping::where('rand', '=', $id)->delete();


    }


    public function chatrecord()
    {


        if (Request::ajax()) {

            //   $datas = Input::get('dataString');

            $data = Input::all();

            $user = new Chatrecord();

            $user->emailto = $data['emailto'];

            $user->emailby = $data['emailby'];

            $user->names = $data['names'];


            $user->save();
            return 1;

        }


    }


    public function getallrecords()
    {


//$books = Chatrecord::all();


        //return Response::eloquent($books);

        $query = DB::table('chatrecord');
        $query->where('emailby', Auth::user()->email);


        $rows = $query->get();

        $count = count($rows);


        /*
        foreach ($rows as $user)
        {
           return Response::json($user);
        }
        */


        return Response::json(array('names' => $count));


    }


    public function comment($id)
    {

        $input = Input::all();

        $user = new Comment();


        $user->product_id = $id;
        $user->comment = $input['comment'];

        $user->save();

        return Redirect::action('FrontController@details', array($id));


    }

    public function commentsave()
    {

        $input = Input::all();

        $user = new Comment();


        $user->comment = $input['comment'];
        $user->name = $input['name'];
        $user->email = $input['email'];

        $user->website = $input['website'];

        $user->date = $input['date'];

        $user->time = $input['time'];
        $user->save();


        return Redirect::route('blogsingle');


    }


    public function rating()
    {

        $email = Auth::user()->email;
        $query = DB::table('rating');
        $query->where('product_id', Input::get('ids'))->where('user', $email);
        $rows = $query->get();


        if ($rows) {

            $input = Input::all();


            $entry = array(

                'rating' => Input::get('test'),
                'product_id' => Input::get('ids'),


            );

            Rating::where('product_id', Input::get('ids'))->update($entry);

            return Redirect::route('site');

        } else {

            $input = Input::all();
            $email = Auth::user()->email;
            $user = new Rating();
            $user->user = $email;
            $user->rating = $input['test'];
            $user->product_id = $input['ids'];
            $user->save();


            return Redirect::route('site');

        }

    }
}
