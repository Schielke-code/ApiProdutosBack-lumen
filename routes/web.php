<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use \App\Http\Controllers\Api\ProdutosController;
use \Illuminate\Support\Facades\Artisan;
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

$router->get('/linkstorage', function () {
    Artisan::call('storage:link');
});

$router->group(['prefix' => 'produtos'], function () use($router){
//    $router->get('/list', [ProdutosController::class, 'index']);
    $router->get('/list', 'Api\ProdutosController@index');
    $router->get('/list/item', 'ProdutosController@listProdutos');
//    $router->post('/store', [ProdutosController::class, 'store']);
    $router->post('/store', 'Api\ProdutosController@store');
    $router->get('/update', 'ProdutosController@update');
    $router->get('/show/{id}', 'Api\ProdutosController@show');
    $router->delete('/delete/{id}', 'Api\ProdutosController@destroy');

});

