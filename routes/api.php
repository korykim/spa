<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Broadcast::routes(['middleware' => ['auth:sanctum']]);

Route::any("uadd", [UserController::class, 'create']);
Route::post("login", [UserController::class, 'index']);

Route::get('p', [ProductController::class, 'index']);

Route::group([
    'prefix'=>'v1',
    'middleware' => ['auth:sanctum']
], function (Router $router) {

    $router->get('/user', function (Request $request) {
        return $request->user();
    });

    //$router->apiResource('products', 'ProductController');


});
