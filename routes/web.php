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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/master-apply', 'ApplyController@masterAgree');
Route::post('/master-store', 'ApplyController@masterStore');

Route::get('/home', 'HomeController@index');
Route::get('/join', 'MasterController@index');
Route::get('/join2', 'MasterController@create');
