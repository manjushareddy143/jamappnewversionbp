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

//use Illuminate\Routing\Route;

Route::get('/', function () {
    return view('welcome');
});
// Set the routes and resource for Users




Route::get('/home', 'HomeController@index');





// Route::get('/show', function ($id)
// {
//     return view('/layouts/Users/show');
// });
Route::get('/edit', function ($id)
{
    return view('/layouts/Users/edit');
});

Route::get('/serviceslist', function()
{
    return view('/layouts/serviceshow');
});

Route::get('/store', function () {
    return view('/layouts/Users/storeimage');
});
// Set the routes and resource for roles
Route::resource('roles', 'RoleController');
Auth::routes();

//Route::get('/index', 'UserController@index');

Route::post('/login', '\App\Http\Controllers\Auth\LoginController@customLogin');

Route::post('/register', '\App\Http\Controllers\Auth\RegisterController@customRegister');


//Route::post('/register', 'UserController@register');
//    Route::post('/register', 'UserController@store');
Route::post('/changepassword','UserController@changepassword');
Route::post('/resetPassword','UserController@resetPassword');


Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/logout', '\App\Http\Controllers\Auth\LoginController@customLogOut')->name('logout');

    Route::resource('user', 'UserController');
    Route::get('/users', 'UserController@index');
    Route::get('/index', 'UserController@index');
    Route::get('/show/{$id}', 'UserController@show');
    Route::get('/addUser', 'UserController@addUser');
    Route::get('/edit','UserController@edit');
    

    Route::get('/profile','UserController@profile');
    Route::post('/profile','UserController@profile');

    Route::post('/services', 'ServicesController@store');
    Route::get('/services', 'ServicesController@show_all');
    Route::get('/detailpage', 'ServicesController@get_service_categories');
    Route::get('/subcategories', 'SubCategoryController@show_all');
    Route::post('/subcategories', 'SubCategoryController@store');

    Route::post('/service_mapping', 'ServiceMappingController@store');
});


//Set the routes and resource for master_service
Route::resource('master_services', 'Master_servicesController');
//Route::get('/addUser', 'UserController@addUser');
Route::get('/edit', 'Master_servicesController@edit');
Route::get('Master_services/index', 'Master_servicesController@index');


