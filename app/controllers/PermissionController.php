<?php

class PermissionController extends BaseController
{
    public $restful = true;

    public $layout = 'layouts.permission';

    public function notaccesspage()
    {
        $view = View::make('users.notaccesspage');

        $this->layout->content = $view;
    }
}
