<?php

use Core\Response;
use Core\Session;

function dd() {}

function urlIs($value)
{
    if ($_SERVER['REQUEST_URI'] === $value) {
        echo 'text-white bg-gray-900';
    } else {
        echo 'text-gray-300';
    }
}

function abort($code = 404)
{
    http_response_code($code);
    require base_path("views/$code.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{

    if (!$condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attribute = [])
{
    extract($attribute); // convert key to varaible name and the value is the value for this variable
    require  base_path('views/' . $path);
}
function redirect($path)
{
    header("Location: {$path}");
    exit();
}

function old($key, $default = '')
{
    return Session::get('old')[$key] ?? $default;
}
