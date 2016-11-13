<?php

class Contact extends Eloquent
{


public $table = 'contact';


public static $rules = array(

    'first_name' => 'required|min:2'
    );



    public static function validate($data)
    {

        return Validator::make($data, static::$rules);
    }



}


?>