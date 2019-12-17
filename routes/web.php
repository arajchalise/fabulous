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
//departments
Route::get('/departments', 'DepartmentController@index')->name('departments');
Route::get('/department/{department}', 'DepartmentController@show');
Route::get('/department/store', 'DepartmentController@store')->name('departmentStore');
Route::get('/department/{id}/destroy', 'DepartmentController@destroy');

// clients
Route::get('/clients', 'ClientController@index')->name('clients');
Route::get('/client/{client}', 'ClientController@show');
Route::get('client/store', 'ClientController@store')->name('store');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
