<?php

class SignupsController extends BaseController
{
    public function store()
    {
        $rules = array(
            'newsletter_signup_email' => 'required|max:250|email'
        );

        $validator = \Validator::make(\Input::all(), $rules, \Lang::get('laravel-newsletter-signup::copy.signup.validation'));

        if ($validator->fails()) {
            if (\Request::ajax()) {
                $messages = $validator->messages();
                $message = $messages->first('newsletter_signup_email');
                return \Response::JSON(array('message' => $message), 400);
            }
            return \Redirect::to(\Input::get('from'))->withInput()->withErrors($validator);
        }

        $signup = Signup::onlyTrashed()->where('email', '=', \Input::get('newsletter_signup_email'))->first();
        if ($signup) {
            $signup->restore();
            $message = \Lang::get('laravel-newsletter-signup::copy.signup.success_restored');
        } else {
            $signup = new Signup();
            $signup->email = \Input::get('newsletter_signup_email');
            $signup->save();
            $message = \Lang::get('laravel-newsletter-signup::copy.signup.success');
        }

        if (\Request::ajax()) {
            return \Response::JSON(array('message' => $message));
        }
        return \Redirect::to(\Input::get('from'))->with('newsletter_signup_email_message', $message);
    }

    public function delete()
    {
        $rules = array(
            'newsletter_unsubscribe_email' => 'required|max:250|email|exists:fbf_newsletter_signups,email'
        );

        $validator = \Validator::make(\Input::all(), $rules, \Lang::get('laravel-newsletter-signup::copy.unsubscribe.validation'));

        if ($validator->fails()) {
            if (\Request::ajax()) {
                $messages = $validator->messages();
                $message = $messages->first('newsletter_unsubscribe_email');
                return \Response::JSON(array('message' => $message), 400);
            }
            return \Redirect::to(\Input::get('from'))->withInput()->withErrors($validator);
        }

        $signup = Signup::withTrashed()->where('email', '=', \Input::get('newsletter_unsubscribe_email'))->first();

        if ($signup->trashed()) {
            if (\Request::ajax()) {
                return \Response::JSON(array('message' => \Lang::get('laravel-newsletter-signup::copy.unsubscribe.already_unsubscribed')), 400);
            }
            $message = new MessageBag();
            $message->add('newsletter_unsubscribe_email', \Lang::get('laravel-newsletter-signup::copy.unsubscribe.already_unsubscribed'));
            return \Redirect::to(\Input::get('from'))->withInput()->with('errors', $message);
        }

        $signup->delete();

        $success = \Lang::get('laravel-newsletter-signup::copy.unsubscribe.success');

        if (\Request::ajax()) {
            return \Response::JSON(array('message' => $success));
        }
        return \Redirect::to(\Input::get('from'))->with('newsletter_unsubscribe_email_message', $success);
    }
}
