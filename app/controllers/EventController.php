<?php

class EventController extends BaseController
{
    public $restful = true;

    public $layout = 'layouts.admin';

    public function eventadd()
    {

        $view = View::make('event.eventadd');
        $this->layout->with('colors', Settings::All());
        $this->layout->content = $view;

    }

    public function blogadd()
    {

        $view = View::make('event.blogadd');
        $this->layout->with('colors', Settings::All());
        $this->layout->content = $view;

    }


    public function eventaddsave()
    {

        $rules = array('image' => 'required');

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            echo "not loaded";
            die;
        } else {
            // Images destination

            $img = Input::file('image');

            $input = Input::all();

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
                $docs = new Events();

                $docs->price = $input['price'];
                $docs->name = $input['name'];
                $docs->stock = $input['stock'];
                $docs->brand = $input['brand'];
                $docs->path = $img_dir . '/' . $filename;

                $docs->save();

                return Redirect::route('viewevent');
            }
        }


    }

    public function blogaddsave()
    {

        $rules = array('image' => 'required');

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            echo "not loaded";
            die;
        } else {
            // Images destination

            $img = Input::file('image');

            $input = Input::all();

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
                $docs = new Blog();

                $docs->title = $input['title'];
                $docs->name = $input['name'];
                $docs->contents = $input['contents'];
                $docs->path = $img_dir . '/' . $filename;

                $docs->save();

                return Redirect::route('viewblog');
            }
        }


    }


    public function viewevent()
    {

        $view = View::make('event.viewevent')->with('viewevent', Events::all());
        $this->layout->with('colors', Settings::All());
        $this->layout->content = $view;

    }

    public function viewblog()
    {

        $view = View::make('event.viewblog')->with('viewblog', Blog::all());
        $this->layout->with('colors', Settings::All());
        $this->layout->content = $view;

    }


    public function deleteevent($id)
    {

        Events::find($id)->delete();
        return Redirect::route('viewevent');

    }

    public function deleteblog($id)
    {

        Blog::find($id)->delete();
        return Redirect::route('viewblog');

    }


    public function editevent($id)
    {

        $view = View::make('event.editevent')->with('editevent', Events::find($id));
        $this->layout->with('colors', Settings::All());
        $this->layout->content = $view;

    }


    public function updatemedia()
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

                $id = Input::get('id');

                $entry = array(

                    'path' => $img_dir . '/' . $filename,
                    'name' => Input::get('name'),
                    'price' => Input::get('price'),
                    'stock' => Input::get('stock')


                );

                Events::where('id', $id)->update($entry);


                return Redirect::route('viewevent');
            }


        }
    }
}
