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

//Route::get('/', 'SinglePageController@index');

//Route::get('/view-project-team/{project_request_id}', 'SinglePageController@viewProjectTeam')->name('view.project.team');

Route::post('/create-project-team', 'SinglePageController@createProjectTeam');

Route::get('/send-project-team/{project_client_id}', 'SinglePageController@sendProjectTeam');

Route::get('/get-project-requests/{client_id}', 'SinglePageController@getProjectRequests');

Route::get('/{any}', 'SinglePageController@index')->where('any','.*');
