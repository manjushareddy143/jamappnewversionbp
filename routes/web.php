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
//clear chache route
Route::get('/clear-cache', function() {
   $exitCode    = Artisan::call('cache:clear');
   $config      = Artisan::call('config:cache');
   $view        = Artisan::call('view:clear');
   return "Cache is cleared";
});

Route::get('/about', 'HomeController@about');
Route::get('/service-list', 'HomeController@servicesList');
Route::get('/contact-us', 'HomeController@contactUs');
Route::get('/privacy-policy', 'HomeController@privacyPolicy');


Route::get('customer/locale/{locale}',function ($locale){
    Session::put('locale',$locale);
    return redirect()->back();
});

/********************
* FRONTEND ROUTES   *
*********************/ 
Route::namespace('Frontend')->group(function(){
    Route::get('/', 'HomeController@home')->name('customer.home');
    Route::get('about', 'HomeController@about');
    Route::get('prices', 'HomeController@prices');
    Route::get('service', 'HomeController@servicesList');
    Route::get('provider-registration', 'HomeController@providerRegistration');
    Route::get('contact-us', 'HomeController@contactUs');
    Route::get('privacy-policy', 'HomeController@privacyPolicy');
    Route::get('getTheApp', 'HomeController@getTheApp');

    Route::get('services/{id}', 'HomeController@subServices')->name('customer.sub-services');
    Route::get('service/vendors/{service_id}/{category_id}', 'HomeController@serviceVendors');
    Route::post('service-vendor', 'HomeController@serviceVendor');
    Route::post('vendor/booking', 'HomeController@booking');
    Route::get('thank-you/{id}', 'HomeController@thankyou');

    Route::post('customer/register', 'UserController@customerRegister');
    Route::post('customer/login', 'UserController@customerLogin');
    Route::post('customer/forgot-password', 'UserController@customerForgotPassword');
    Route::match(['get','post'],'customer/password-change/{id}', 'UserController@customerPasswordChange');
    Route::get('customer/logout', 'UserController@customerLogOut')->name('customer.logout');
    Route::get('customer/account', 'UserController@customerAccount')->name('customer.account');

    Route::match(['get','post'],'provider/register', 'UserController@providerRegister');

    Route::get('/redirect', 'SocialAuthFacebookController@redirect');
    Route::get('/callback', 'SocialAuthFacebookController@callback');
 
});

Route::prefix('google')->name('google.')->group( function(){
    Route::get('login','GoogleController@loginWithGoogle')->name('login');
    Route::any('callback','GoogleController@callbackFromGoogle')->name('callback');
});
// Route::get('/', function () {
//     return view('profile');
// });



Route::get('/home', 'HomeController@index');


// Set the routes and resource for roles
Route::resource('roles', 'RoleController');
Auth::routes();

Route::post('/login', '\App\Http\Controllers\Auth\LoginController@customLogin');
Route::post('/socialSignin', '\App\Http\Controllers\Auth\LoginController@socialSignin');

// individual provider
Route::post('/register', '\App\Http\Controllers\Auth\RegisterController@customRegister');

// organisation route
Route::post('/org_register', '\App\Http\Controllers\Auth\RegisterController@organisationRegister');

Route::post('/resetPassword','UserController@resetPasswordform');
Route::post('/verify_forget_otp','UserController@verifyForgotPasswordOTP');
Route::post('/changepassword','UserController@changepasswordform');



Route::middleware(['auth'])->group(function () {

    //var_dump(1(Auth::user());
    // Route::get('/', function() {
    //     return view('welcome');
    // });
    Route::group(['middleware' => 'role:manager'], function() {
    });

    // Route::delete('users/{id}', 'UserController@destroy');
    Route::delete('users/{id}', 'UserController@soft_delete');

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
    //Route::get('/user/{id}/edit', 'userController@edit');

    Route::get('locale/{locale}',function ($locale){
        Session::put('locale',$locale);
        return redirect()->back();
    });

    //routes for customer
    Route::get('/customer', function(){
        return view('layouts.Users.customer');
    });

    //routes for vendor
    Route::get('/vendors', function(){
        return view('layouts.Users.vendors');
    });

    Route::get('/detail', function(){
        return view('layouts.Users.detail');
    });

    //Route::get('/customerdetail', function(){
    //  return view('layouts.Users.customerdetail');
    //});

    //verified vendor
    //Route::patch('service_provider/verification/{id}', 'ServiceProviderController@verification');

    //routes for orders
    Route::get('/orders', function(){
        return view('layouts.orders');
    });

    Route::get('/orderdetails', function(){
        return view('layouts.orderdetails');
    });

    //Route::get('/about', 'HomeController@about');
    Route::get('/profile','UserController@profile');
    Route::post('/profile','UserController@profile');
    Route::post('/services', 'ServicesController@store');
    Route::get('/services', 'ServicesController@show_all');
    Route::get('/detailpage', 'ServicesController@category_detail');
    Route::get('/sub_cat', 'SubCategoryController@service_subcat');
    Route::get('/subcategories', 'SubCategoryController@show_all');
    Route::post('/subcategories', 'SubCategoryController@store');
    Route::post('/service_mapping', 'ServiceMappingController@store');

    // invoice
    Route::get('/invoice', 'BookingController@invoice');
    Route::get('generate-pdf', 'BookingController@printPDF')->name('generate-pdf');
});
