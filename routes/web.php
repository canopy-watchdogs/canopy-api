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

$router->get('/incident-types', 'IncidentTypeController@index');
$router->post('/incident-types', 'IncidentTypeController@store');
$router->get('/incident-types/{incidentTypeId}', 'IncidentTypeController@show');
$router->put('/incident-types/{incidentTypeId}', 'IncidentTypeController@update');
$router->delete('/incident-types/{incidentTypeId}', 'IncidentTypeController@destroy');

$router->get('/incidents', 'IncidentController@index');
$router->post('/incidents', 'IncidentController@store');
$router->get('/incidents/{incidentId}', 'IncidentController@show');
$router->put('/incidents/{incidentId}', 'IncidentController@update');
$router->delete('/incidents/{incidentId}', 'IncidentController@destroy');