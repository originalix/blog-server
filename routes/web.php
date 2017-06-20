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

Route::any('/artical', ['uses' => 'ArticalController@create', function() {

}]);

Route::get('/artical/{id}', ['uses' => 'ArticalController@show', function() {

}]);

Route::get('/artical/user/{userId}', ['uses' => 'ArticalController@findUserArtices', function() {

}]);

Route::any('/register', ['uses' => 'UserController@register'], function() {
});

Route::any('/login', ['uses' => 'UserController@login'], function() {
});

Route::any('/parse', ['uses' => 'ArticalController@parse'], function() {
});

Route::any('/testmain', ['uses' => 'TestMainController@test'], function () {
});
Route::any('/belong', ['uses' => 'TestMainController@belong'], function () {
});
Route::any('/delete', ['uses' => 'TestMainController@delete'], function () {
});
Route::any('/ajax', ['uses' => 'TestMainController@ajax'], function () {
});

Route::get('/test', ['uses' => 'HTMLController@test'], function() {
});