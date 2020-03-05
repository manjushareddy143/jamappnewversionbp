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
Route::resource('user', 'UserController');
Route::get('/index', function ()
{
     return view('/layouts/Users/index');
});
Route::get('/create', function ()
{
     return view('/layouts/Users/create');
});
Route::get('/show', function ()
{
     return view('/layouts/Users/show');
});

<<<<<<< HEAD
 Route::get('/serviceslist', function()
 {
    return view('/layouts/serviceshow');
 });

 Auth::routes();
=======


Route::get('/Users', function () {
     return view('layouts/Users/index');

 });

// Route::get('users/{id}', function ($id) {
//     return view('layouts/Users/create');
// });

>>>>>>> 95e281a7f61ea809b664004cca71fba9594a9c25

Route::get('/index', 'UserController@index');
Route::post('/login', 'UserController@login');

Route::get('/home', 'HomeController@index')->name('home');

<<<<<<< HEAD

=======
>>>>>>> 95e281a7f61ea809b664004cca71fba9594a9c25





