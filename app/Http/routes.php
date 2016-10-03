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
Route::get('/farms','FarmController@getFarms');


Route::get('/farmers' , 'FarmersController@getFarmers');

Route::get('/status','UserStatusController@getUserStatuses');


Route::get('/loss', 'LossCauseController@getCauses');


Route::get('/loss/calculation','LossCalculationController@getLossCalculations');


Route::get('/loss/type','LossTypeController@getLossTypes');


Route::get('/seasons','SeasonController@getSeasons');


Route::auth();





Route::get('/home', 'HomeController@index');

