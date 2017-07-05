<?php

class Orders extends Eloquent
{


    public static $rules = array(

        'first_name' => 'required|min:2'
    );
    public $table = 'orders';

    public static function validate($data)
    {

        return Validator::make($data, static::$rules);
    }


}


?>