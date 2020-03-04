<?php

use App\Http\Controllers\ServiceController;
use App\Services;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', function () {
    return [1, 2, 3];
});
// Route defines to get the services list from database

Route::get('/serviceslist', 'ServiceController@serviceslist');

// It defines to get the view of services list
Route::get('/servicelist', function () {
    return view('layouts/serviceshow');
});
