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

//page d'accueil du site
Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();
Auth::routes(['verify' => true]);

//page d'accueil utilisateurs
Route::get('/home', 'HomeController@index')->name('home');

//page de login, d'enregistrement, mot de passe oublié, vérification avec envoie du mail
Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::get('register/verify/{token}', 'Auth\RegisterController@verify'); 
Route::post('password/reset', 'Auth\ResetPasswordController@reset'); 
Route::post('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::get('/signin', 'Auth\RegisterController@index')->name('signin'); 
Route::get('/check', 'Auth\RegisterController@check')->name('check');

//Modification des infos user
Route::get('/user', 'UserController@index')->name('user');
Route::post('/user_update', 'UserController@update')->name('user_update');
Route::get('/users_list', 'UserController@listing')->name('users_list');
Route::post('/user_delete', 'UserController@delete')->name('user_delete');

//Sessions
Route::get('/session', 'SessionController@index')->name('session');
Route::get('/add_session', 'SessionController@newSession')->name('add_session');
Route::post('/create_session', 'SessionController@create')->name('create_session');
Route::post('/session_delete','SessionController@delete')->name('session_delete');

Route::get('/session_user','SessionController@enter_session')->name('session_user');
Route::post('/waiting_session','SessionController@waiting_session')->name('waiting_session');

//Sujets
Route::get('/subject', 'SujetController@index')->name('subject');
Route::get('/cr_subject', 'SujetController@newSubject')->name('cr_subject');
Route::post('/create_subject', 'SujetController@create');
Route::post('/subject_delete','SujetController@delete')->name('subject_delete');

//Questions
Route::get('/question', 'QuestionController@index')->name('question');
Route::post('/create_question', 'QuestionController@create');

//Stats
Route::get('/stats','StatsController@index')->name('stats');
Route::post('/choix','StatsController@checkchoice')->name('choix');
Route::post('/affichage','StatsController@affichage')->name('affichage');

//Questionnaire
Route::post('/quiz','ResultatSousPartieController@index')->name('quiz');
Route::post('/res_quiz','ResultatSousPartieController@result')->name('res_quiz');
Route::post('/result_quiz','ResultatSousPartieController@result_quiz')->name('result_quiz');

