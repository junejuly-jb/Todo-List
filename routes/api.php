<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/addTodo', 'App\Http\Controllers\ApiController@addTodo');
Route::get('/myTodo', 'App\Http\Controllers\ApiController@myTodo');
Route::get('/getTodo/{id}', 'App\Http\Controllers\ApiController@getTodo');

Route::put('/toggleTodo/{id}', 'App\Http\Controllers\ApiController@toggleTodo');
Route::put('/updateTodo/{id}', 'App\Http\Controllers\ApiController@updateTodo');
Route::delete('/deleteTodo/{id}', 'App\Http\Controllers\ApiController@deleteTodo');

