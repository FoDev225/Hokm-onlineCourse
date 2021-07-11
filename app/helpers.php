<?php

if (!function_exists('menuOpen')) {
    function menuOpen(...$routes)
    {
        foreach ($routes as $route) {
            if(Route::currentRouteName() === $route) return 'menu-open';
        }
    }
}
if (!function_exists('currentRouteActive')) {
    function currentRouteActive(...$routes)
    {
        foreach ($routes as $route) {
            if(Route::currentRouteName() === $route) return 'active';
        }
    }
}

// La fonction d'affiche du titre dans la barre de navigation

if(!function_exists('page_title'))
{
    function page_title($title)
    {
        $base_title = 'Hokma - Se former holistiquement';

        if($title === '')
        {
            return $base_title;
        }
        else
        {
            return $title . ' | ' . $base_title;
        }
    }
}

// La fonction active des liens de navigation

if(!function_exists('set_active_route'))
{
    function set_active_route($route)
    {
        return Route::is($route) ? 'active' : '';
    }
}

if(!function_exists('format_price'))
{
    function format_price($course)
    {
        if($course->isFree())
        {
            return '<strong>GRATUIT</strong>';
        }
        else
        {
            $course->price . ' Fcfa';
        }
    }
}