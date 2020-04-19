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


Route::get('v1/details', 'UserController@getSingupDetail');
Route::post('v1/login', 'UserController@login');
Route::post('v1/register', 'UserController@register');
Route::post('v1/adduser', 'UserController@store');
Route::post('v1/customer_register', 'UserController@customer_register');
Route::post('v1/profile', 'UserController@profile');




Route::post('v1/service', 'ServicesController@store');
Route::get('v1/service', 'ServicesController@show_all');



Route::post('v1/sub_category', 'SubCategoryController@store');
Route::get('v1/sub_category', 'SubCategoryController@show_all');

Route::post('v1/service_mapping', 'ServiceMappingController@store');
Route::get('v1/all_services', 'ServiceMappingController@get_services');
Route::get('v1/servicesbyuser', 'ServiceMappingController@get_services_by_user');



// User Type Mng
Route::post('v1/usertype', 'UserTypeController@add_type');
Route::get('v1/usertype', 'UserTypeController@show_all');


// Terms & Conditions
Route::post('v1/term', 'TermConditionController@add_term');
Route::get('v1/term', 'TermConditionController@show_all');

// Terms & Conditions Agreement
Route::post('v1/term_agree', 'TermAgreementController@add_term_agreement');
Route::get('v1/term_agree', 'TermAgreementController@show_all');


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



