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
Route::post('/register', '\App\Http\Controllers\Auth\RegisterController@customRegister');

Route::post('/org_register', '\App\Http\Controllers\Auth\RegisterController@organisationRegister');

Route::post('/changepassword','UserController@changepassword');
Route::post('/resetPassword','UserController@resetPassword');

Route::middleware(['auth'])->group(function () {

    Route::get('/', function() {
        return view('welcome');
    });

    Route::group(['middleware' => 'role:manager'], function() {

    });

    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/logout', '\App\Http\Controllers\Auth\LoginController@customLogOut')->name('logout');

    Route::resource('user', 'UserController');
    Route::get('/users', 'UserController@index');
    Route::get('/index', 'UserController@index');
    Route::get('/show/{$id}', 'UserController@show');
    Route::get('/addUser', 'UserController@addUser');
    Route::get('/edit','UserController@edit');
    Route::post('/user/destroy/{$id}','UserController@destroy');


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

    //routes for orders
    Route::get('/orders', function()
    {
        return view('layouts.orders');
    });

    Route::get('/profile','UserController@profile');
    Route::post('/profile','UserController@profile');

    Route::post('/services', 'ServicesController@store');
    Route::get('/services', 'ServicesController@show_all');
    Route::get('/detailpage', 'ServicesController@category_detail');
    Route::get('/subcategories', 'SubCategoryController@show_all');
    Route::post('/subcategories', 'SubCategoryController@store');

    Route::post('/service_mapping', 'ServiceMappingController@store');
});
