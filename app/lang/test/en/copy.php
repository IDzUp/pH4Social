<?php

return array(
    'signup' => array(
        'success' => 'You have been subscribed',
        'success_restored' => 'You have been resubscribed',
        'submit' => 'Subscribe',
        'validation' => array(
            'newsletter_signup_email.required' => 'Please enter your email address',
            'newsletter_signup_email.max' => 'The email address is too long',
            'newsletter_signup_email.email' => 'Please enter a valid email address',
        ),
    ),
    'unsubscribe' => array(
        'success' => 'You have been unsubscribed',
        'already_unsubscribed' => 'Your email address was already unsubscribed',
        'submit' => 'Unsubscribe',
        'validation' => array(
            'newsletter_unsubscribe_email.required' => 'Please enter your email address',
            'newsletter_unsubscribe_email.max' => 'The email address is too long',
            'newsletter_unsubscribe_email.email' => 'Please enter a valid email address',
            'newsletter_unsubscribe_email.exists' => 'Your email address was not subscribed',
        ),
    ),
    'email' => 'Email address',
);