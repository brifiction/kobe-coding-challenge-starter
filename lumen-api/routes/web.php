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

    $router->post('login', 'LoginController@login');
    $router->post('register', 'UserController@register');
    $router->get('user/{id}', ['middleware' => 'auth', 'uses' => 'UserController@getUser']);
    $router->get('user/api/{api_token}', 'UserController@getUserApi');

    $router->get('/product', 'ProductController@index');
    $router->get('/product/{id}', 'ProductController@getProduct');
    $router->get('/product/delete/{id}', 'ProductController@delete');
    $router->get('/product/update-inventory/{product_id}/{new_inventory}', 'ProductController@updateInventory');
    $router->post('/product/create', 'ProductController@create');
    $router->post('/product/update/{id}', 'ProductController@update');
});
