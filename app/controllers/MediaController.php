<?php

class MediaController extends BaseController
{
    public $restful = true;

    public $layout = 'layouts.admin';

    public function media()
    {
        $view = View::make('media.indexs');
        $this->layout->with('colors', Settings::All());
        $this->layout->content = $view;
    }

    public function slider()
    {
        $view = View::make('media.slider');
        $this->layout->with('colors', Settings::All());
        $this->layout->content = $view;
    }

    public function mediasave()
    {
        $rules = array('image' => 'required');

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            exit('Not loaded');
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
                $doc = new Media;
                $doc->path = $img_dir . '/' . $filename;
                $doc->save();
                return Redirect::route('viewmedia');
            }
        }
    }

    public function slidersave()
    {
        $rules = array('image' => 'required');

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            exit('Not loaded');
        } else {
            // Images destination

            $img = Input::file('image');
            $img1 = Input::file('image1');
            $img2 = Input::file('image2');
            $img3 = Input::file('image3');

            $img_dir = 'uploads/images/' . date('mY');
            $img_thumb_dir = $img_dir . "/thumbs";

            $filename = $img->getClientOriginalName();
            $filename1 = $img1->getClientOriginalName();
            $filename2 = $img2->getClientOriginalName();
            $filename3 = $img3->getClientOriginalName();

            // Create folders if they don't exist
            if (!file_exists($img_dir)) {
                mkdir($img_dir, 0777, true);
                mkdir($img_thumb_dir, 0777, true);
            }

            // Upload the image in the correct destination
            $upload_success = $img->move($img_dir, $img->getClientOriginalName());
            $upload_success = $img1->move($img_dir, $img1->getClientOriginalName());
            $upload_success = $img2->move($img_dir, $img2->getClientOriginalName());
            $upload_success = $img3->move($img_dir, $img3->getClientOriginalName());

            if ($upload_success) {
                $entry = array(
                    'path' => $img_dir . '/' . $filename,
                    'path1' => $img_dir . '/' . $filename1,
                    'path2' => $img_dir . '/' . $filename2,
                    'path3' => $img_dir . '/' . $filename3
                );

                Slider::where('id', 1)->update($entry);

                /*
                $doc = new Slider();

                $doc->path = $img_dir .'/'. $filename;
                $doc->path1 = $img_dir .'/'. $filename1;
                $doc->path2 = $img_dir .'/'. $filename2;
                $doc->path3 = $img_dir .'/'. $filename3;

                $doc->save();
                */
                return Redirect::route('viewslider');
            }
        }
    }

    public function viewmedia()
    {
        $view = View::make('media.viewmedia')->with('viewmedia', Media::all());
        $this->layout->with('colors', Settings::All());
        $this->layout->content = $view;
    }

    public function viewslider()
    {
        $view = View::make('media.viewslider')->with('viewslider', Slider::all());
        $this->layout->with('colors', Settings::All());
        $this->layout->content = $view;
    }


    public function deletemedia($id)
    {
        Media::find($id)->delete();
        return Redirect::route('viewmedia');
    }

    public function editmedia($id)
    {
        $view = View::make('media.editmedia')->with('editmedia', Media::find($id));
        $this->layout->with('colors', Settings::All());
        $this->layout->content = $view;
    }

    public function updatemedia()
    {
        $rules = array('image' => 'required');

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            exit('Not loaded');
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
                    'path' => $img_dir . '/' . $filename
                );

                Media::where('id', $id)->update($entry);
                return Redirect::route('viewmedia');
            }
        }
    }
}
