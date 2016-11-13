<?php

class Currency extends Eloquent
{


public $table = 'currency';


public static $rules = array(

    'first_name' => 'required|min:2'
    );



    public static function validate($data)
    {

        return Validator::make($data, static::$rules);
    }



}


?>