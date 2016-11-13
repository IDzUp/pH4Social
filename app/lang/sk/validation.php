<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    "accepted"         => ":attribute musí byť akceptovaný.",
    "active_url"       => ":attribute má neplatnú URL adresu.",
    "after"            => ":attribute musí byť dátum po :date.",
    "alpha"            => ":attribute môže obsahovať len písmená.",
    "alpha_dash"       => ":attribute môže obsahovať len písmená, čísla a pomlčky.",
    "alpha_num"        => ":attribute môže obsahovať len písmená, čísla.",
    "array"            => ":attribute musí byť pole.",
    "before"           => ":attribute musí byť dátum pred :date.",
    "between"          => array(
        "numeric" => ":attribute musí mať rozsah :min - :max.",
        "file"    => ":attribute musí mať rozsah :min - :max kilobajtov.",
        "string"  => ":attribute musí mať rozsah :min - :max znakov.",
        "array"   => ":attribute musí mať rozsah :min - :max prvkov.",
    ),
    "boolean"          => "The :attribute field must be true or false",
    "confirmed"        => ":attribute konfirmácia sa nezhoduje.",
    "date"             => ":attribute má neplatný dátum.",
    "date_format"      => ":attribute sa nezhoduje s formátom :format.",
    "different"        => ":attribute a :other musia byť odlišné.",
    "digits"           => ":attribute musí mať :digits číslic.",
    "digits_between"   => ":attribute musí mať rozsah :min až :max číslic.",
    "email"            => ":attribute má neplatný formát.",
    "exists"           => "označený :attribute je neplatný.",
    "image"            => ":attribute musí byť obrázok.",
    "in"               => "označený :attribute je neplatný.",
    "integer"          => ":attribute musí byť celé číslo.",
    "ip"               => ":attribute musí byť platná IP adresa.",
    "max"              => array(
        "numeric" => ":attribute nemôže byť väčší ako :max.",
        "file"    => ":attribute nemôže byť väčší ako :max kilobajtov.",
        "string"  => ":attribute nemôže byť väčší ako :max znakov.",
        "array"   => ":attribute nemôže mať viac ako :max prvkov.",
    ),
    "mimes"            => ":attribute musí byť súbor s koncovkou: :values.",
    "min"              => array(
        "numeric" => ":attribute musí mať aspoň :min.",
        "file"    => ":attribute musí mať aspoň :min kilobajtov.",
        "string"  => ":attribute musí mať aspoň :min znakov.",
        "array"   => ":attribute must have at least :min prvkov.",
    ),
    "not_in"            => "označený:attribute je neplatný.",
    "numeric"           => ":attribute musí byť číslo.",
    "regex"             => ":attribute má neplatný formát.",
    "required"          => ":attribute je požadované.",
    "required_if"       => ":attribute je požadované keď :other je :value.",
    "required_with"     => ":attribute je požadované keď :values je prítomné.",
    "required_with_all" => "The :attribute field is required when :values is present.",
    "required_without"  => ":attribute je požadované keď :values nie je prítomné.",
    "required_without_all" => "The :attribute field is required when none of :values are present.",
    "same"             => ":attribute a :other sa musia zhodovať.",
    "size"             => array(
        "numeric" => ":attribute musí mať :size.",
        "file"    => ":attribute musí mať :size kilobajtov.",
        "string"  => ":attribute musí mať :size znakov.",
        "array"   => ":attribute musí obsahovať :size prvkov.",
    ),
    "timezone"         => "The :attribute must be a valid zone.",
    "unique"           => ":attribute je nedostupný.",
    "url"              => ":attribute neplatný formát.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => array(
        'attribute-name' => array(
            'rule-name' => 'custom-message',
        ),
    ),

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => array(),

);
