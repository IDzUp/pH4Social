{{ Form::open(array('action' => 'SignupsController@store', 'class' => 'form-inline newsletter-signup')) }}

{{ Form::hidden('from', Request::path()) }}

@if (Session::has('newsletter_signup_email_message'))
    <div class="alert alert-success">
        {{ Session::get('newsletter_signup_email_message') }}
    </div>
@endif

<div class="form-group{{ $errors->has('newsletter_signup_email') ? ' has-error' : '' }}">

    {{ Form::label('newsletter_signup_email', trans('laravel-newsletter-signup::copy.email'), array('class' => 'control-label sr-only newsletter-signup-email-label')) }}

    {{ Form::text('newsletter_signup_email', Input::old('newsletter_signup_email'), array('class' => 'form-control newsletter-signup-email', 'placeholder' => trans('laravel-newsletter-signup::copy.email'))) }}

    @if ($errors->has('newsletter_signup_email'))
        <span class="help-block">{{ $errors->first('newsletter_signup_email') }}</span>
    @endif

</div>

{{ Form::submit(trans('laravel-newsletter-signup::copy.signup.submit'), array('class' => 'btn btn-default')) }}

{{ Form::close() }}