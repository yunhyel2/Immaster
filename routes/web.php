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

Route::get('/master-apply', 'ApplyController@applyIndex');
Route::get('/lesson-apply', 'ApplyController@applyIndex');
Route::get('/play-apply', 'ApplyController@applyIndex');

Route::post('/master-agree', 'ApplyController@masterAgree');
Route::post('/class-create', 'ApplyController@masterCheck');
Route::get('/master-create', 'ApplyController@masterCreate');

Route::post('/master-store', 'ApplyController@masterApplyStore');
Route::post('/lesson-store', 'ApplyController@lessonApplyStore');
Route::post('/play-store', 'ApplyController@playApplyStore');
Route::get('/master-complete', 'ApplyController@complete');
Route::get('/lesson-complete', 'ApplyController@complete');
Route::get('/play-complete', 'ApplyController@complete');

Route::get('/home', 'HomeController@index');
