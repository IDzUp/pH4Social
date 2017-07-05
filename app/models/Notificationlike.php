<?php

class Notificationlike extends Eloquent
{


    public static $rules = array(

        'first_name' => 'required|min:2'
    );
    public $table = 'notificationlike';

    public static function validate($data)
    {

        return Validator::make($data, static::$rules);
    }


}


?>