<?php

namespace Core;


class ValidationException extends \Exception
{
    public readonly array  $errors;
    public readonly array $old;
    // old data and errors 
    public static function throw($errors, $old)
    {
        $instance = new static;
        // assign once and never be updated or changed
        $instance->errors = $errors;
        $instance->old = $old;


        throw $instance;
    }
}
