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
// views
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/services', function(){
    return view('services');
})->name('services');

Route::get('/career', function(){
    return view('career');
})->name('career');

Route::get('/gallary', function(){
    return view('gallary');
})->name('gallary');

Route::get('/blog', function(){
    return view('blog');
})->name('blog');

Route::get('/contact', function(){
    return view('contact');
})->name('contact');


//departments
Route::get('/alldepartments', 'DepartmentController@alldepartments')->name('departments');
Route::get('/department/store', 'DepartmentController@store')->name('storeDepartment');
// Clients

Route::get('/allclients', 'ClientController@allclients')->name('clients');
Route::get('/client/store', 'ClientController@store')->name('clientStore');
Route::get('/client/create', function(){
    return view('Clients.create');
})->name('clientCreate');

// Projects
Route::get('/allprojects', 'ProjectController@allprojects')->name('projects');
Route::get('/projects', 'ProjectController@index')->name('projects');
Route::get('/project/store', 'ProjectController@store')->name('projectStore');

// Gallery
Route::get('/gallery', 'GallaryController@index')->name('gallery');
Route::get('/gallery/store', 'GallaryController@store');

// Service
Route::get('/service', 'ServiceController@getServices')->name('service');


// Menu
Route::get('/menus', 'MenuController@index')->name('menus');
Route::get('/menu/store', 'MenuController@store')->name('menustore');

// submenu
Route::get('/submenu/store', 'SubmenuController@store');
Route::get('/submenus', 'SubmenuController@index')->name('submenus');

// Videos
Route::get('/videos', 'VideoController@index')->name('videos');
Route::get('video/store', 'VideoController@store');

// User
Route::get('/users', 'UserController@index')->name('users');

// Roles 
// Route::get('/role/store', 'RoleController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
