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


Route::get('/', function () {
    return view('profile');
});



Route::get('/home', 'HomeController@index');

// Set the routes and resource for roles
Route::resource('roles', 'RoleController');
Auth::routes();

Route::post('/login', '\App\Http\Controllers\Auth\LoginController@customLogin');
Route::post('/socialSignin', '\App\Http\Controllers\Auth\LoginController@socialSignin');
Route::post('/register', '\App\Http\Controllers\Auth\RegisterController@customRegister');

Route::post('/org_register', '\App\Http\Controllers\Auth\RegisterController@organisationRegister');

Route::post('/resetPassword','UserController@resetPasswordform');
Route::post('/changepassword','UserController@changepasswordform');



Route::middleware(['auth'])->group(function () {



    Route::get('/', function() {
        return view('welcome');
    });

    Route::group(['middleware' => 'role:manager'], function() {

    });



    // Route::delete('users/{id}', 'UserController@destroy');
    Route::post('users/{id}', 'UserController@soft_delete');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/logout', '\App\Http\Controllers\Auth\LoginController@customLogOut')->name('logout');

    Route::resource('user', 'UserController');
    Route::get('/users', 'UserController@index');
    Route::get('/index', 'UserController@index');
    Route::get('/show/{$id}', 'UserController@show');
    Route::get('/addUser', 'UserController@addUser');
    // Route::get('/edit','UserController@edit');

    Route::get('/user/edit/{id}', 'UserController@edit');
    Route::post('/user/{id}/update', 'UserController@update');
    Route::get('/service/edit/{id}', 'ServicesController@edit_services');

    Route::get('/subcategory/edit/{id}', 'SubCategoryController@edit_category');


   //customer edit & update
//    Route::get('/user/{id}/edit', 'userController@edit');



    Route::get('locale/{locale}',function ($locale){
        Session::put('locale',$locale);
        return redirect()->back();
    });


    //routes for customer
    Route::get('/customer', function()
    {
        return view('layouts.Users.customer');
    });

    //routes for vendor

    Route::get('/vendors', function()
    {
        return view('layouts.Users.vendors');
    });


    Route::get('/detail', function()
    {
        return view('layouts.Users.detail');
    });

    //     Route::get('/customerdetail', function()
    // {
    //     return view('layouts.Users.customerdetail');
    // });



    //verified vendor
    //Route::patch('service_provider/verification/{id}', 'ServiceProviderController@verification');

    //routes for orders
    Route::get('/orders', function()
    {
        return view('layouts.orders');
    });

    Route::get('/orderdetails', function()
    {
        return view('layouts.orderdetails');
    });

    Route::get('/profile','UserController@profile');
    Route::post('/profile','UserController@profile');

    Route::post('/services', 'ServicesController@store');
    Route::get('/services', 'ServicesController@show_all');
    Route::get('/detailpage', 'ServicesController@category_detail');
    Route::get('/subcategories', 'SubCategoryController@show_all');
    Route::post('/subcategories', 'SubCategoryController@store');

    Route::post('/service_mapping', 'ServiceMappingController@store');

    // invoice
    Route::get('/invoice', 'BookingController@invoice');

    Route::get('generate-pdf', 'BookingController@printPDF')->name('generate-pdf');
});
