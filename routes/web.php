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

$router->get('/ping', function () use ($router) {
    return "pong";
});

$router->get('/pre-orders', 'PreOrderController@index');
$router->post('/pre-orders', 'PreOrderController@store');
$router->get('/pre-orders/{pre-order}', 'PreOrderController@show');
$router->put('/pre-orders/{pre-order}', 'PreOrderController@update');
$router->patch('/pre-orders/{pre-order}', 'PreOrderController@update');
$router->delete('/pre-orders/{pre-order}', 'PreOrderController@destroy');

$router->get('/pre-order-items', 'PreOrderItemController@index');
$router->post('/pre-orders-items', 'PreOrderItemController@store');
$router->get('/pre-orders-items/{pre-order-item}', 'PreOrderItemController@show');
$router->put('/pre-orders-items/{pre-order-item}', 'PreOrderItemController@update');
$router->patch('/pre-orders-items/{pre-order-item}', 'PreOrderItemController@update');
$router->delete('/pre-orders-items/{pre-order-item}', 'PreOrderItemController@destroy');
