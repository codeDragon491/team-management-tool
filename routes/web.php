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

Route::post('/create-project-team', 'SinglePageController@createProjectTeam');

Route::get('/send-project-team/{project_client_id}', 'SinglePageController@sendProjectTeam');

Route::get('/get-project-requests/{client_id}', 'SinglePageController@getProjectRequests');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('{any}', 'SinglePageController@index')->where('any','.*');
