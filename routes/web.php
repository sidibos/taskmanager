<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'TaskController@home');
Route::get('/task/', 'TaskController@all');
Route::get('/task/create/', 'TaskController@add');
Route::get('/task/edit/{id}', 'TaskController@show');
Route::post('/task/store/', 'TaskController@store');
Route::put('/task/update', 'TaskController@update');
Route::delete('/task/destroy', 'TaskController@destroy');
