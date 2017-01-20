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

    Route::get('/auth/reset/old', function () {
        return view('auth.reset.old');
    });
    Route::post('/password/reset/old', 'UserController@storeNewPassword');
    Route::get('/auth/login', function () {
        return view('auth.login');
    })->name('auth.login');
    Route::auth();

    Route::group(['middleware' => ['auth']], function () {


        Route::group(['middleware' => ['oldpassword']], function () {


            Route::get('/', ['uses' => 'DataController@getDashboard'])->name('dashboard');
            Route::get('/fetch/loss/causes', ['uses' => 'DataController@getLossCauses'])->name('fetch.loss.causes');
            Route::get('/fetch/zones', ['uses' => 'DataController@getZones'])->name('fetch.zones');
            Route::get('/fetch/seasons', ['uses' => 'DataController@getSeasons'])->name('fetch.seasons');
            Route::get('/fetch/roles', ['uses' => 'DataController@getRoles'])->name('fetch.roles');
            Route::get('/fetch/users', ['uses' => 'DataController@getUsers'])->name('fetch.users');
            Route::get('/fetch/locations', ['uses' => 'DataController@getLocations'])->name('fetch.locations');
            Route::get('/fetch/chart/data', ['uses' => 'DataController@getChartDetails'])->name('chart.data');
            Route::get('/fetch/image/{id}/{url}', ['uses' => 'ImageController@getImage'])->name('fetch.image');

            /*Report Data*/
            Route::post('/post/report/data', ['uses' => 'DataController@postReportData'])->name('report.data');

//Get Role
            Route::get('/getRoles', ['uses' => 'DataController@getRoles', 'as' => 'check.role']);

            /* View Crop Inspectors*/
            Route::get('/inspectors', ['uses' => 'InspectorController@viewInspectors', 'as' => 'inspectors']);
            Route::get('/fetch/inspectors', ['uses' => 'InspectorController@getCropInspectors', 'as' => 'fetch.inspectors']);
            Route::get('/inspector/details/{id}', ['as' => 'view_inspector_details', 'uses' => 'InspectorController@viewInspectorDetails']);
            /* Create Crop Inspectors*/
            Route::get('/inspector/create', ['as' => 'inspector.create', 'uses' => 'InspectorController@createInspectors']);
            Route::post('/inspector/create', ['as' => 'inspector.add', 'uses' => 'InspectorController@addInspector']);
            /* Update Crop Inspectors*/
            Route::post('/inspector/individual/details/update', ['as' => 'inspector.update', 'uses' => 'InspectorController@UpdateInspectorDetails']);
            /* Session Flags Crop Inspectors*/
            Route::get('/inspector/individual/edit/{id}', ['as' => 'employees.individual.details.edit', 'uses' => 'InspectorController@editIndividualInspectorDetails']);
            Route::get('/inspector/individual/edit/cancel/{id}', ['as' => 'employees.individual.details.edit.cancel', 'uses' => 'InspectorController@cancelEditIndividualInspectorDetails']);


            Route::get('/farmers', ['uses' => 'FarmersController@viewFarmers', 'as' => 'farmers']);

            Route::get('/fetch/farmers', ['uses' => 'FarmersController@getFarmers', 'as' => 'fetch_farmers']);

            Route::get('/reported/claims', 'LossCalculationController@viewReportedClaims')->name('claims.reported');
            Route::get('/confirmed/claims', 'LossCalculationController@viewConfirmedClaims')->name('claims.confirmed');

            Route::get('/loss/report', 'LossCalculationController@viewLossReports')->name('loss.report');

            Route::get('fetch/confirmed/claims', 'LossCalculationController@getConfirmedLossCalculations')->name('fetch.confirmed.claims');
            Route::get('fetch/reported/claims', 'LossCalculationController@getReportedLossCalculations')->name('fetch.reported.claims');

            Route::get('/download/loss/assessment/{assessment_id}', 'LossCalculationController@downloadLossAssessment')->name('assessnote.download');
            Route::get('/confirm/loss/assessment/{uuid}', 'LossCalculationController@confirmLossAssessment')->name('confirmloss.assessment');

        });

    });

