<?php

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

// quotes
$router->get('get-all', "QuoteController@getAll");
$router->post('create/quote', "QuoteController@create");
// end quotes

$router->post('register', "UserController@register");
$router->post('login', "LoginController@login");
