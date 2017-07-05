<?php

class Pages extends Eloquent
{


    public static $rules = array(

        'first_name' => 'required|min:2'
    );
    public $table = 'pages';

    public static function validate($data)
    {

        return Validator::make($data, static::$rules);
    }


}


?>