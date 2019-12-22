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
Route::post('/department/store', 'DepartmentController@store')->name('storeDepartment');
// Clients

Route::get('/allclients', 'ClientController@allclients')->name('clients');
Route::post('/client/store', 'ClientController@store')->name('clientStore');
Route::get('/client/create', function(){
    return view('Clients.create');
})->name('clientCreate');

// Projects
Route::get('/allprojects', 'ProjectController@allprojects')->name('projects');
Route::get('/projects', 'ProjectController@index')->name('projects');
Route::post('/project/store', 'ProjectController@store')->name('projectStore');
Route::get('/project/create', 'ProjectController@create')->name('projectCreate');

// Gallery
Route::get('/gallery', 'GallaryController@index')->name('gallery');
Route::post('/gallery/store', 'GallaryController@store')->name('galleryStore');
Route::get('/gallery/create', 'GallaryController@create')->name('galleryCreate');

// Service
Route::get('/service', 'ServiceController@getServices')->name('service');
Route::get('/service/create', 'ServiceController@create')->name('serviceCreate');
Route::post('/service/store', 'ServiceController@store')->name('serviceStore');


// Menu
Route::get('/menus', 'MenuController@index')->name('menus');
Route::post('/menu/store', 'MenuController@store')->name('menuStore');
Route::get('menu/create', 'MenuController@create')->name('menuCreate');

// submenu
Route::post('/submenu/store', 'SubmenuController@store')->name("submenuStore");
Route::get('/submenus', 'SubmenuController@index')->name('submenus');
Route::get('/submenu/create', 'SubmenuController@create')->name('submenuCreate');

// Videos
Route::get('/video', 'VideoController@index')->name('video');
Route::post('video/store', 'VideoController@store')->name('videoStore');
Route::get('/video/create', 'VideoController@create')->name('videoCreate');

// User
Route::get('/users', 'UserController@index')->name('users');
Route::get('/user/{user}/verify', 'UserController@getVerify')->name('verifyUserForm');
Route::post('/user/verify', 'UserController@verify')->name('userVerify');
// Roles 
// Route::get('/role/store', 'RoleController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
