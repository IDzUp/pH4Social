<?php

class PaymentController extends BaseController  {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |    Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'post']);
    }



    public $restful = true;

    public $layout='layouts.live';

    public function index()
    {


$view= View::make('live.payment');
$this->layout->content=$view;
 //echo View::make('live.rightsidebar')->with('shopping', Shopping::find(10));
    }




}




?>