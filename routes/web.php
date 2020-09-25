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

$router->get('/locations', 'LocationController@index');
$router->post('/locations', 'LocationController@store');
$router->get('/locations/{locationId}', 'LocationController@show');
$router->put('/locations/{locationId}', 'LocationController@update');
$router->delete('/locations/{locationId}', 'LocationController@destroy');
