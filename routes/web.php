<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// basic
$router->get('/key', 'LuluController@getKey');

// naming controller routes
$router->get('/profile/mbasss', 'LuluController@mbasssProfile');

// with middleware in route
$router->get('profile', [
    'middleware' => 'admin',
    'uses' => 'LuluController@profile'
]); //http://localhost:8000/profile?role=admin

// with middleware in controller
$router->get('about', 'LuluController@about');

// Using despedency in controller
$router->get('foo/bar', 'LuluController@getData');