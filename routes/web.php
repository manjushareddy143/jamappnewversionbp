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
Route::resource('user', 'UserController');
Route::get('/index', 'UserController@index');
Route::get('/show/{$id}', 'UserController@show');
Route::get('/addUser', 'UserController@addUser');
Route::get('/edit','UserController@edit');
Route::post('/store','UserController@store');
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

    Route::post('/loginsd', 'UserController@login');
    Route::post('/register', 'UserController@register');
    Route::post('/changepassword','UserController@changepassword');
    Route::post('/resetPassword','UserController@resetPassword');



Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');







