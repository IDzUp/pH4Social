<?php

class ContactController extends BaseController
{
    public $restful = true;

    public $layout = 'layouts.adminnew';

    public function contact()
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
            $view = View::make('contact.indexs');
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;
        } else {
            //return Redirect::route('notaccess');
            App::abort(404);
        }
    }


    public function emails()
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
            $view = View::make('contact.emails');
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;
        } else {
            //return Redirect::route('notaccess');
            App::abort(404);
        }
    }

    public function confirmmail()
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
            $confirmmail = DB::table('confirmmail')
                ->where('id', 1)
                ->first();

            $view = View::make('contact.confirmmail')->with('confirmmail', $confirmmail);
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;
        } else {
            //return Redirect::route('notaccess');
            App::abort(404);
        }
    }

    public function contemplate()
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
            $contemplate = DB::table('contemplate')
                ->where('id', 1)
                ->first();

            $view = View::make('contact.contemplate')->with('contemplate', $contemplate);
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;
        } else {
            //return Redirect::route('notaccess');
            App::abort(404);
        }
    }

    public function notitemplate()
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
            $notitemplate = DB::table('notitemplate')
                ->where('id', 1)
                ->first();

            $view = View::make('contact.notitemplate')->with('notitemplate', $notitemplate);
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;
        } else {
            //return Redirect::route('notaccess');
            App::abort(404);
        }
    }

    public function savecontact()
    {
        $input = Input::all();
        $rules = array('email' => 'required|email', 'name' => 'required|max:25', 'subject' => 'required|max:25', 'comment' => 'required');

        $validator = Validator::make($input, $rules);

        if ($validator->passes()) {
            $user = new Contact();
            $user->name = strip_tags(Input:: get('name'));
            $user->email = $input['email'];
            $user->subject = strip_tags(Input:: get('subject'));
            $user->message = strip_tags(Input:: get('comment'));

            $user->save();

            $confirmmail = DB::table('contemplate')
                ->where('id', 1)
                ->first();

            $user->froms = $confirmmail->from;
            $user->subject = $confirmmail->subject;

            $data = array('content' => $confirmmail->comment, 'email' => 'sahil_kaushal@esferasoft.com', 'first_name' => $user->name, 'from' => 'sahil_kaushal@esferasoft.com', 'from_name' => 'Meh');

            Mail::send('contact.test', $data, function ($message) use ($user) {
                $message->to($user->email, $user->name)->from($user->froms, $user->froms)
                    ->subject($user->subject);
            });

            $test = $input['test'];
            if ($test == 1) {
                Session::flash('success', "Successfully Sent");
                return Redirect::back();

                // return Redirect::route('contactform');
            } else {
                //return Redirect::route('viewcontact');

                Session::flash('success', 'Successfully Sent');
                return Redirect::back();
                //return Redirect::to('viewcontact')->with('msg','Successfully Created');
            }
        } else {
            return Redirect::to('contactform')->withInput()->withErrors($validator);
        }
    }

    public function emailsend()
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
            $input = Input::all();

            $user = new Emails;
            $user->email = $input['email'];
            $user->from = $input['from'];
            $user->subject = strip_tags(Input:: get('subject'));
            $user->comment = Input:: get('comment');
            $user->save();
            $data = array('subject' => $user->subject, 'comment' => $user->comment, 'from' => '', 'from_name' => 'Meh');

            Mail::send('contact.editemail', $data, function ($comment) use ($user) {
                $comment->to($user->email, $user->subject)->from($user->from, $user->from)->subject($user->subject);
            });

            Session::flash('success', 'Successfully Sent');
            return Redirect::back();
        } else {
            //return Redirect::route('notaccess');
            App::abort(404);
        }
    }

    public function confirmmailsend()
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
            $input = Input::all();

            $entry = array(
                'comment' => Input:: get('comment'),
                'from' => Input:: get('from'),
                'subject' => Input:: get('subject')
            );

            Confirmmail::where('id', '=', 1)->update($entry);

            Session::flash('success', "Update Successfully");
            return Redirect::back();
        } else {
            //return Redirect::route('notaccess');
            App::abort(404);
        }
    }

    public function notitemplatesend()
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
            $input = Input::all();

            $entry = array(
                'comment' => Input:: get('comment'),
                'from' => Input:: get('from'),
                'subject' => Input:: get('subject')
            );

            Notitemplate::where('id', '=', 1)->update($entry);

            Session::flash('success', 'Update Successfully');
            return Redirect::back();
        } else {
            //return Redirect::route('notaccess');
            App::abort(404);
        }
    }

    public function contemplatesend()
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
            $input = Input::all();

            $entry = array(
                'comment' => Input:: get('comment'),
                'subject' => Input:: get('subject'),
                'from' => Input:: get('from')
            );

            Contemplate::where('id', '=', 1)->update($entry);

            Session::flash('success', 'Update Successfully');
            return Redirect::back();
        } else {
            //return Redirect::route('notaccess');
            App::abort(404);
        }
    }

    public function allemail()
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
            $view = View::make('contact.allemail')->with('allemail', Emails::all());
            $this->layout->with('colors', Settings::All());
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;
        } else {
            //return Redirect::route('notaccess');
            App::abort(404);
        }
    }

    public function updatecon()
    {
        $id = Input::get('id');
        $entry = array(
            'email' => Input::get('email'),
            'name' => Input::get('name'),
            'subject' => Input::get('subject'),
            'message' => Input::get('message')
        );

        Contact::where('id', $id)->update($entry);

        return Redirect::to('viewcontact')->with('msg', 'Successfully Updated');
    }

    public function contactdelete($id)
    {
        Contact::find($id)->delete();

        return Redirect::to('viewcontact')->with('msg', 'Successfully Deleted');
    }

    public function maildelete($id)
    {
        Emails::find($id)->delete();

        return Redirect::to('allemail')->with('msg', 'Successfully Deleted');
    }

    public function mailopen($id)
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
            $view = View::make('contact.viewemail')->with('viewemail', Emails::find($id));
            $this->layout->with('logo', Logo::find(1));
            $this->layout->content = $view;
        } else {
            //return Redirect::route('notaccess');
            App::abort(404);
        }
    }
}
