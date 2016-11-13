<?php

class Settings extends Eloquent
{


public $table = 'settings';


public static $rules = array(

    'first_name' => 'required|min:2'
    );



    public static function validate($data)
    {

        return Validator::make($data, static::$rules);
    }



}


?>