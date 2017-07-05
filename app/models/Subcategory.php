<?php

class Subcategory extends Eloquent
{


    public static $rules = array(

        'first_name' => 'required|min:2'
    );
    public $table = 'subcategory';

    public static function validate($data)
    {

        return Validator::make($data, static::$rules);
    }


}


?>