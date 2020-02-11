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

//$router->get('/', function () use ($router) {
//    return $router->app->version();
//});

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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/', 'LoginController@welcome');

    // user
    $router->post('login', 'LoginController@login');
    $router->post('register', 'UserController@register');
    $router->get('user/{id}', ['middleware' => 'auth', 'uses' => 'UserController@getUser']);
    $router->get('user/api/{api_token}', 'UserController@getUserApi');

    // product
    $router->get('products', 'ProductController@index');
    $router->get('product/{id}', ['middleware' => 'auth', 'uses' => 'ProductController@getProduct']);
    $router->post('product/create', ['middleware' => 'auth', 'uses' => 'ProductController@create']);
    $router->delete('product/delete/{id}', ['middleware' => 'auth', 'uses' => 'ProductController@delete']);
    $router->put('product/update-inventory/{id}/{new_inventory}', ['middleware' => 'auth', 'uses' => 'ProductController@updateInventory']);
    $router->put('product/update/{id}', ['middleware' => 'auth', 'uses' => 'ProductController@update']);

    // order
    $router->get('order', 'OrderController@index');
    $router->get('order/{id}', 'OrderController@detail');
    $router->post('order/checkout', 'OrderController@checkout');
    $router->post('order/validate', 'OrderController@validateOrder');
    $router->post('order/shipment', 'OrderController@shipmentOrder');
    $router->post('order/track', 'OrderController@trackOrder');
    $router->post('order/track-shipment', 'OrderController@trackShipment');
    $router->post('order/payment-confirm', 'OrderController@paymentConfirm');

});
