<?php

class AuthorsController extends BaseController {


    public $restful = true;

    public $layout='layouts.default';

    public function showWelcome()
    {

$view= View::make('authors.index')->with('author', Author::all());
/*
$view->location='india';
$view['speciality']='PHP';
return $view;
*/
$this->layout->content=$view;
    }



    public function extraWork()
    {

$view= View::make('authors.new')->with('title', 'sahil');
/*
$view->location='india';
$view['speciality']='PHP';
return $view;
*/
$this->layout->content=$view;
    }







}


?>