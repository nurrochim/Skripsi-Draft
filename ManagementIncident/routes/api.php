<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/employees/{id?}', 'Employees@index');
Route::post('/v1/employees', 'Employees@store');
Route::post('/v1/employees/{id}', 'Employees@update');
Route::delete('/v1/employees/{id}', 'Employees@destroy');


Route::get('/v1/incidents/{id?}', 'ControllerIncidentList@index');
Route::post('/v1/incidents', 'ControllerIncidentList@createNewIncidentMini');
Route::post('/v1/incidents/{id}', 'ControllerIncidentList@updateByCreator');
Route::post('/v1/incidentsAnalyzing/{id}', 'ControllerIncidentList@updateIncidentAnalyzing');
Route::delete('/v1/incidents/{id}', 'ControllerIncidentList@destroy');
Route::get('/v1/incidentsAnalyzing', 'ControllerIncidentList@findIncidentAnalyzing');