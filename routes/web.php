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

//Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', 'Auth\LoginController@index')->name('login');

Route::get('register/verify/{token}', 'Auth\RegisterController@verify'); 
Route::get('/check', 'Auth\RegisterController@check')->name('check');

Route::get('/subject', 'SujetController@index')->name('subject');
Route::post('/create_subject', 'SujetController@create');

Route::get('/question', 'QuestionController@index')->name('question');
Route::post('/create_question', 'QuestionController@create');

