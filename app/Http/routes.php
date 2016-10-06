<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/auth/login', ['uses' => 'UserController@postSignIn', 'as' => 'signin']);

Route::get('/logout',[  'uses'=> 'UserController@getLogout',    'as' => 'logout']);

Route::get('/farms','FarmController@getFarms');
//Get Streets
Route::get('/getRoles', ['uses' => 'DataController@getRoles', 'as' => 'check.role']);


Route::get('/farmers' ,[ 'uses' => 'FarmersController@getFarmers' , 'as' => 'farmers']);

Route::get('/status','UserStatusController@getUserStatuses');


Route::get('/loss', 'LossCauseController@getCauses');


Route::get('/loss/calculation','LossCalculationController@getLossCalculations');


Route::get('/loss/type','LossTypeController@getLossTypes')->name('get.loss.types');


Route::get('/seasons','SeasonController@getSeasons');


Route::auth();





Route::get('/home', 'HomeController@index');

