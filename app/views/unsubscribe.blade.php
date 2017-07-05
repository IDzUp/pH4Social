{{ Form::open(array('action' => 'Fbf\LaravelNewsletterSignup\SignupsController@delete', 'class' => 'form-inline newsletter-unsubscribe', 'method' => 'delete')) }}

{{ Form::hidden('from', Request::path()) }}

@if (Session::has('newsletter_unsubscribe_email_message'))
    <div class="alert alert-success">
        {{ Session::get('newsletter_unsubscribe_email_message') }}
    </div>
@endif

<div class="form-group{{ $errors->has('newsletter_unsubscribe_email') ? ' has-error' : '' }}">

    {{ Form::label('newsletter_unsubscribe_email', trans('laravel-newsletter-signup::copy.email'), array('class' => 'control-label sr-only newsletter-unsubscribe-email-label')) }}

    {{ Form::text('newsletter_unsubscribe_email', Input::old('newsletter_unsubscribe_email'), array('class' => 'form-control newsletter-unsubscribe-email', 'placeholder' => trans('laravel-newsletter-signup::copy.email'))) }}

    @if ($errors->has('newsletter_unsubscribe_email'))
        <span class="help-block">{{ $errors->first('newsletter_unsubscribe_email') }}</span>
    @endif

</div>

{{ Form::submit(trans('laravel-newsletter-signup::copy.unsubscribe.submit'), array('class' => 'btn btn-default')) }}

{{ Form::close() }}