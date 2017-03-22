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
Route::post('/master-store', 'ApplyController@masterApplyStore');

Route::get('/home', 'HomeController@index');
Route::get('/master-join', 'MasterController@index');
Route::get('/master-join2', 'MasterController@create');
Route::get('/master-join3', 'MasterController@complete');
Route::get('/lesson-join', 'MasterController@index');
Route::get('/lesson-join2', 'MasterController@create');
Route::get('/lesson-join3', 'MasterController@complete');
Route::get('/play-join', 'MasterController@index');
Route::get('/play-join2', 'MasterController@create');
Route::get('/play-join3', 'MasterController@complete');