<?php

class AccessController extends BaseController
{
    public $restful = true;

    public $layout = 'layouts.access';

    public function notaccess()
    {
        App::abort(404);
    }
}
