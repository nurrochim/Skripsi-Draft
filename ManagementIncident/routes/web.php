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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('index');
});

Route::get('/incidentInput', function(){return view('incident_input');});
Route::get('/incidentMonitoring', function(){return view('incident_monitoring');});
Route::get('/incidentAnalyzing', function(){return view('incident_input_analyzing');});