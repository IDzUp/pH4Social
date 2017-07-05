<?php

class Submenu extends Eloquent
{


    public static $rules = array(

        'first_name' => 'required|min:2'
    );
    public $table = 'submenu';

    public static function validate($data)
    {

        return Validator::make($data, static::$rules);
    }


}


?>