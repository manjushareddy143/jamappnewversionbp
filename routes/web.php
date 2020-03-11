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
Route::get('/addUser', 'UserController@addUser');
Route::get('/show', function ()
{
     return view('/layouts/Users/show');
});
Route::get('/edit', function ()
{
     return view('/layouts/Users/edit');
});

 Route::get('/serviceslist', function()
 {
    return view('/layouts/serviceshow');
 });

 // Set the routes and resource for roles
 Route::resource('roles', 'RoleController');
 Auth::routes();


// Route::get('/Users', function () {
//      return view('layouts/Users/index');

// Route::get('users/{id}', function ($id) {
//    return view('layouts/Users/create');
// });

//Route::get('/index', 'UserController@index');
Route::post('/loginaa', 'UserController@login');
Route::post('/register', 'UserController@register');
Route::post('/changepassword','UserController@changepassword');
Route::post('/resetPassword','UserController@resetPassword');


Route::get('/home', 'HomeController@index')->name('home');







