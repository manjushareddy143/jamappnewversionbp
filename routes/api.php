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



Route::post('v1/addAddress', 'UserController@addNewAddress');
Route::post('v1/editAddress', 'UserController@editAddress');
Route::post('v1/deleteAddress', 'UserController@deleteAddress');

Route::post('v1/user/update/{id}', 'UserController@updateUserContent');
Route::get('v1/invoice_download', 'BookingController@printPDF');
Route::get('v1/invoiceDetail', 'BookingController@getInvoice');

Route::get('v1/display', 'BookingController@showInvoice');
Route::post('v1/invoice', 'BookingController@invoice');

Route::get('v1/details', 'UserController@getSingupDetail');
Route::post('v1/login', 'UserController@login');
Route::post('v1/logout', 'UserController@logout');
Route::post('v1/sendPush', 'FCMPushNotification@sendPush');
Route::post('v1/booking_status', 'FCMPushNotification@orderAccept');
Route::post('v1/requestVendor', 'FCMPushNotification@requestVendor');
Route::post('v1/register', 'UserController@register');
Route::post('v1/register_provider', 'UserController@register_provider');
Route::post('v1/adduser', 'UserController@store');
Route::post('v1/customer_register', 'UserController@customer_register');
Route::post('v1/profile', 'UserController@profile');
Route::post('v1/org_profile', 'UserController@org_profile');
Route::post('v1/init_profile', 'UserController@init_profile');
Route::post('v1/booking', 'BookingController@booking');
Route::get('v1/booking', 'BookingController@getorderbyuser');
Route::get('v1/booking/provider', 'BookingController@getOrderByProvider');
Route::get('v1/booking/getallbooking', 'BookingController@getallbooking');
Route::get('v1/booking/get_org_bookings', 'BookingController@getOrganisationOrders');
Route::get('v1/booking/get_bookings_filter', 'BookingController@getOrderByFilter');
Route::get('v1/booking/{id}', 'BookingController@getorder');

Route::get('v1/organisation/vendors/{orgId}', 'ServiceProviderController@GetOrganisationVendors');
Route::get('v1/getuser/{id}', 'UserController@getuser');

// get services
Route::get('v1/get_services/{id}', 'ServicesController@display_services');

Route::get('v1/getuserbyid/{id}', 'UserController@getuserbyid');
Route::get('v1/organisation', 'OrganisationController@getAll');


Route::post('v1/add_customer', 'UserController@add_customer');
Route::post('v1/add_organisation', 'UserController@add_organisation');
Route::post('v1/add_vendors', 'UserController@add_vendors');

Route::post('v1/experience', 'ExperienceController@add_experience');

// Route::get('test', '\App\Http\Controllers\Auth\RegisterController@getPermissions');
Route::get('test', 'ServiceProviderController@getDistance');

Route::post('v1/service', 'ServicesController@store');
Route::post('v1/service/status', 'ServicesController@service_status');
Route::post('v1/service/delete/{id}', 'ServicesController@deleteService');
Route::get('v1/service', 'ServicesController@show_all');

// display subcategory
Route::get('v1/all_category', 'SubCategoryController@get_category');

Route::post('v1/sub_category', 'SubCategoryController@store');
Route::post('v1/subcategory/delete', 'SubCategoryController@deleteSubcategory');
Route::get('v1/sub_category', 'SubCategoryController@show_all');

Route::post('v1/service_mapping', 'ServiceMappingController@store');
Route::get('v1/all_services', 'ServiceMappingController@get_services');
Route::get('v1/servicesbyuser', 'ServiceMappingController@get_services_by_user');
Route::get('v1/providers/service', 'ServiceMappingController@get_providers_by_service');
Route::get('v1/providers/category', 'ServiceMappingController@get_providers_by_category');
Route::get('v1/providers/service_category', 'ServiceMappingController@get_providers_by_service_category');

Route::get('v1/services/category', 'ServicesController@get_service_categories');
//Vendor Update
Route::post('v1/vendorupdate', 'UserController@updatevendor');


//Customer Update
Route::post('v1/customerupdate', 'UserController@updatecustomer');
//Organisation Update
Route::post('v1/org_update/{id}', 'UserController@organisationupdate');
//Verification
Route::post('v1/verification/{id}', 'ServiceProviderController@verification');
// User Type Mng
Route::post('v1/usertype', 'UserTypeController@add_type');
Route::get('v1/usertype', 'UserTypeController@show_all');

//Update Profile of Vendor & Customer
Route::get('v1/user/{id}/edit', 'UserController@getuser');

// Update Invoice Detail
Route::post('v1/inv_update', 'BookingController@updateinvoicedetail');

Route::post('v1/acceptandpay', 'BookingController@acceptandpay');
Route::post('v1/cancelByUser', 'BookingController@cancelByUser');


Route::delete('v1/users/{id}','UserController@soft_delete');

// services update
Route::post('v1/serviceupdate', 'ServicesController@updateservices');

//category update
Route::post('v1/categoryupdate', 'SubCategoryController@updatecategory');


// Terms & Conditions
Route::post('v1/term', 'TermConditionController@add_term');
Route::get('v1/term', 'TermConditionController@show_all');

// Terms & Conditions Agreement
Route::post('v1/term_agree', 'TermAgreementController@add_term_agreement');
Route::get('v1/term_agree', 'TermAgreementController@show_all');


Route::get('/', function () {
    return [1, 2, 3];
});


// Invoice
// Route::post('v1/invoice', 'BookingController@invoice');


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



