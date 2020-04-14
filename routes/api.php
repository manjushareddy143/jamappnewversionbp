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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::post('adduser', 'UserController@store');
Route::post('customer_register', 'UserController@customer_register');

Route::post('service', 'ServicesController@store');
Route::get('service', 'ServicesController@show_all');


Route::post('sub_category', 'SubCategoryController@store');
Route::get('sub_category', 'SubCategoryController@show_all');

Route::post('service_mapping', 'ServiceMappingController@store');
Route::get('all_services', 'ServiceMappingController@get_services');


Route::get('/', function () {
    return [1, 2, 3];
});

// Route defines to get the services list from database

/*Route::get('/serviceslist', 'ServiceController@serviceslist');


// // It defines to get the view of service list
// Route::get('/serviceslist', function(){
//     return view('layouts/serviceshow');
// });

Route::get('service', 'Services@service');*/
// It defines to get the view of service list
Route::get('/serviceslist', function(){
    return view('layouts/serviceshow');
});



