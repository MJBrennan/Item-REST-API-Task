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

$router->get('items',  ['uses' => 'ItemController@showAllItems']);
$router->get('items/{id}', ['uses' => 'ItemController@showIndividualItems']);
$router->post('item', ['uses' => 'ItemController@insertItem']);
$router->put('update/{id}', ['uses' => 'ItemController@updateItem']);
$router->delete('delete/{id}', ['uses' => 'ItemController@deleteItem']);


