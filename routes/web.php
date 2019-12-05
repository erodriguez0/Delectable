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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// namespace()->prefix()->name() applies prefixes to routes inside (e.g. admin/users)
// middleware('can:GateName) can be ran on individual routes or namespace to apply to all
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-all-users')->group(function() {
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});

Route::namespace('Restaurant')->prefix('restaurant')->name('restaurant.')->middleware('can:manage-employees')->group(function() {
    Route::resource('/employees', 'EmployeesController');
});