<?php

class Createevent extends Eloquent
{


    public static $rules = array(

        'first_name' => 'required|min:2'
    );
    public $table = 'createevent';

    public static function validate($data)
    {

        return Validator::make($data, static::$rules);
    }


}


?>