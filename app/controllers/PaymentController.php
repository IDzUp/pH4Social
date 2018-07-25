<?php

class PaymentController extends BaseController
{
    public $restful = true;
    public $layout = 'layouts.live';

    public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'post']);
    }

    public function index()
    {


        $view = View::make('live.payment');
        $this->layout->content = $view;
        //echo View::make('live.rightsidebar')->with('shopping', Shopping::find(10));
    }
}
