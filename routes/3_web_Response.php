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
// HTTP RESPONSE

// basic
$router->get('/', function(){
    return 'Hello World';
});

// Get Input using Request
$router->get('profile', 'LuluController@userProfile');
// localhost:8000/profile?id=1&name=Mbasss Code&username=mbasss&email=mbassscode@gmail.com&password=123


// Responese Object
// $router->get('home', function(){
//     return response($content, $status)
//             ->header('Contetent-Type', $value);
// });

$router->get('data', function(){
    // return response('WOW', 201)
    //     ->header('Content-Type', 'application/json');

    // show data
    // walaupun tanpa header akan menampilkan informasi json karena yang ditampilkan merupakan data json
    // $data = [
    //     'status' => 'success',
    //     'data' => 'Test Data'
    // ];
    // return response($data, 200);

    // cara lain
    return response()->json([
        'message' => 'Failed',
        'status' => false
    ], 404);
});