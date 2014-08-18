<?php

class Meta
{
    public static function getAction()
    {
        return snake_case(explode('@', static::getCurrentRouteDsl())[1]);
    }

    public static function getController()
    {
        return explode('@', static::getCurrentRouteDsl())[0];
    }

    public static function getControllerSlug()
    {
        return snake_case(str_replace('Controller', '', static::getController()));
    }

    public static function getCurrentRouteDsl()
    {
        return  Route::current()->getAction()['controller'];
    }
}
