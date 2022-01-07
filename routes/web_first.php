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

$router->get('/key', function(){
    return \Illuminate\Support\Str::random(32);
});


// BASIC ROUTING
$router->get('/foo', function(){
    return "Get Method";
});
$router->post('/foo', function(){
    return "Post Method";
});
$router->put('/foo', function(){
    return "Put Method";
});
$router->patch('/foo', function(){
    return "Patch Method";
});
$router->delete('/foo', function(){
    return "Delete Method";
});


// ROUTE PARAMETER 
$router->get('/foo/{id}', function($id){
    return "User ". $id;
}); // localhost:8000/foo/90
$router->get('/posts/{postId}/comments/{commentId}', function ($postId, $commentId) {
    return 'Post with ID = ' .$postId. ' and comment with ID = ' .$commentId;
}); //localhost:8000/posts/90/comments/80
// optional parameter 
$router->get('/user[/{userID}]', function($userID = null){
    return $userID;
});//localhost:8000/user atau localhost:8000/user/90

// NAMED ROUTES 
$router->get('/profile/mbasss', ['as' => 'profile.detail', function(){
    return "This is Route with name route PROFILE";
}]);

$router->get('/profile', function(){
    return redirect()->route('profile.detail'); 
});

// ROUTES GROUPING
$router->group(['prefix' => 'admin'], function() use ($router){
    $router->get('/admin', function(){
        return "Prefix Admin";
    });
});

// ROUTES WITH MIDDLEWARE
$router->get('/admin/home', ['middleware' => 'admin', function () {
    return 'Admin Home with AdminMiddleware';
}]); //localhost:8000/admin/home?role=admin