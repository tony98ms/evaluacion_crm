<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ParesController;
use \App\Http\Middleware\EnsureUserIsValid;

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

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [], function ($api) {
    $api->post('register', 'App\Http\Controllers\AuthController@register');
    $api->post('pares', ['as' => 'pares.store', 'uses' => 'App\Http\Controllers\ParesController@store']);
});

$api->version('v1', ['middleware' => [EnsureUserIsValid::class]], function ($api) {
    $api->post('login', 'App\Http\Controllers\AuthController@login');
});

$api->version('v1', ['middleware' => [EnsureUserIsValid::class, 'auth:sanctum']], function ($api) {
    $api->get('logout', 'App\Http\Controllers\AuthController@logout');
});

$api->version('v1', ['middleware' => ['api.throttle', 'auth:sanctum'], 'limit' => 200, 'expires' => 5], function ($api) {
    $api->get('asesores', 'App\Http\Controllers\UsersController@getAsesores');
});
