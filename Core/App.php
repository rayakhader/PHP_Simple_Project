<?php

namespace Core;

// <!--  place to build up the container and access to it from anywhere in the application -->

class App
{
    // singleton 
    protected static $container;

    public static function setContainer($container)
    {

        static::$container = $container;
    }
    public static function container()
    {

        return static::$container;
    }

    // delegate to container to do the bind operation

    public static function bind($key, $resolver)
    {

        static::container()->bind($key, $resolver);
    }

    // delegate to container to do the resolve operation
    public static function resolve($key)
    {

        return static::container()->resolve($key);
    }
}
