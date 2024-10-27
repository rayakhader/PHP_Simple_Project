<?php
// core : something that reuse across the project, infrastructure code, it is not neccessarly to be uniqe for this application
namespace Core;


class Validator
{

    public static function string($value, $min = 1, $max = 1000)
    {

        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value)
    {

        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
