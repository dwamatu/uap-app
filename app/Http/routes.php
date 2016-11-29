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

Route::get('/dashboard',['uses' => 'DataController@getDashboard'])->name('dashboard');

Route::get('/fetch/loss/causes',['uses' => 'DataController@getLossCauses'])->name('fetch.loss.causes');

Route::get('/fetch/zones',['uses' => 'DataController@getZones'])->name('fetch.zones');

Route::get('/fetch/seasons',['uses' => 'DataController@getSeasons'])->name('fetch.seasons');
Route::get('/fetch/roles',['uses' => 'DataController@getRoles'])->name('fetch.roles');

Route::get('/fetch/users',['uses' => 'DataController@getUsers'])->name('fetch.users');

Route::get('/fetch/locations',['uses' => 'DataController@getLocations'])->name('fetch.locations');

Route::get('/fetch/chart/data',['uses' => 'DataController@getChartDetails'])->name('chart.data');

Route::post('/auth/login', ['uses' => 'UserController@postSignIn', 'as' => 'signin']);

Route::get('/logout',[  'uses'=> 'UserController@getLogout',    'as' => 'logout']);

Route::get('/farms','FarmController@getFarms');

/*Report Data*/
Route::post('/post/report/data',['uses' => 'DataController@postReportData'])->name('report.data');

//Get Streets
Route::get('/getRoles', ['uses' => 'DataController@getRoles', 'as' => 'check.role']);

/* View Crop Inspectors*/
Route::get('/inspectors',['uses'=> 'InspectorController@viewInspectors','as'=>'inspectors']);
Route::get('/fetch/inspectors',['uses'=> 'InspectorController@getCropInspectors','as'=>'fetch.inspectors']);
Route::get('/inspector/details/{id}', ['as' => 'view_inspector_details', 'uses' => 'InspectorController@viewInspectorDetails']);
/* Create Crop Inspectors*/
Route::get('/inspector/create', ['as' => 'inspector.create', 'uses' => 'InspectorController@createInspectors']);
Route::post('/inspector/create', ['as' => 'inspector.add', 'uses' => 'InspectorController@addInspector']);
/* Update Crop Inspectors*/
Route::post('/inspector/individual/details/update', ['as' => 'inspector.update', 'uses' => 'InspectorController@UpdateInspectorDetails']);
/* Session Flags Crop Inspectors*/
Route::get('/inspector/individual/edit/{id}', ['as' => 'employees.individual.details.edit', 'uses' => 'InspectorController@editIndividualInspectorDetails']);
Route::get('/inspector/individual/edit/cancel/{id}', ['as' => 'employees.individual.details.edit.cancel', 'uses' => 'InspectorController@cancelEditIndividualInspectorDetails']);


Route::get('/farmers' ,[ 'uses' => 'FarmersController@viewFarmers' , 'as' => 'farmers']);

Route::get('/fetch/farmers' ,[ 'uses' => 'FarmersController@getFarmers' , 'as' => 'fetch_farmers']);

Route::get('/status','UserStatusController@getUserStatuses');


Route::get('/loss', 'LossCauseController@getCauses');


Route::get('/loss/calculation','LossCalculationController@viewLossCalculations')->name('loss.calculation');

Route::get('/loss/report','LossCalculationController@viewLossReports')->name('loss.report');

Route::get('fetch/loss/calculation','LossCalculationController@getLossCalculations')->name('fetch_loss_calculation');

Route::get('/download/loss/assessment/{assessment_id}','LossCalculationController@downloadLossAssessment')->name('assessnote.download');


Route::get('/loss/type','LossTypeController@getLossTypes')->name('get.loss.types');


Route::get('/seasons','SeasonController@getSeasons');


Route::auth();





Route::get('/home', 'HomeController@index');



