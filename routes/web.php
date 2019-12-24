<?php

Route::get('/', 'WelcomeController@index')->name('welcome');

Route::get('/services', 'ServiceController@index')->name('services');

Route::get('/career', 'CareerController@getCareer')->name('career');

Route::get('/galleries', 'GallaryController@getGallary')->name('gallary');

Route::get('/blog', 'BlogController@getBlog')->name('blog');

Route::get('/contact', function(){
    return view('contact');
})->name('contact');

Route::get('/allprojects', 'ProjectController@getProjects')->name('allProjects');

Auth::routes();

//departments
Route::get('/alldepartments', 'DepartmentController@alldepartments')->name('departments');
Route::post('/department/store', 'DepartmentController@store')->name('storeDepartment');
Route::get('/department/create', function(){
    return view('Departments.create');
})->name('createDepartment');
Route::get('/department/{department}/edit', 'DepartmentController@edit');
Route::get('/department/{department}/destroy', 'DepartmentController@destroy');
Route::post('department/update', 'DepartmentController@update')->name('departmentUpdate');

// Clients

Route::get('/allclients', 'ClientController@allclients')->name('clients');
Route::post('/client/store', 'ClientController@store')->name('clientStore');
Route::get('/client/create', function(){
    return view('Clients.create');
})->name('clientCreate');
Route::get('client/{client}/edit', 'ClientController@edit');
Route::post('client/update', 'ClientController@update')->name('clientUpdate');
Route::get('/client/{id}/destroy', 'ClientController@destroy');

// Projects
// Route::get('/allprojects', 'ProjectController@allprojects')->name('projects');
Route::get('/projects', 'ProjectController@index')->name('projects');
Route::post('/project/store', 'ProjectController@store')->name('projectStore');
Route::get('/project/create', 'ProjectController@create')->name('projectCreate');
Route::get('/project/{id}/destroy', 'ProjectController@destroy');
Route::get('/project/{project}/edit', 'ProjectController@edit');
Route::post('/project/update', 'ProjectController@update')->name('projectUpdate');

// Gallery
Route::get('/gallery', 'GallaryController@index')->name('gallery');
Route::post('/gallery/store', 'GallaryController@store')->name('galleryStore');
Route::get('/gallery/create', 'GallaryController@create')->name('galleryCreate');
Route::get('/gallery/{gallary}/edit', 'GallaryController@edit');
Route::get('/gallery/{id}/destroy', 'GallaryController@destroy');
Route::post('/gallery/update', 'GallaryController@update')->name('galleryUpdate');

// Service
Route::get('/service', 'ServiceController@getServices')->name('service');
Route::get('/service/create', 'ServiceController@create')->name('serviceCreate');
Route::post('/service/store', 'ServiceController@store')->name('serviceStore');
Route::get('/service/{service}/edit', 'ServiceController@edit');
Route::post('/service/update', 'ServiceController@update')->name('serviceUpdate');
Route::get('/service/{id}/destroy', 'ServiceController@destroy');


// Menu
Route::get('/menus', 'MenuController@index')->name('menus');
Route::post('/menu/store', 'MenuController@store')->name('menuStore');
Route::get('menu/create', 'MenuController@create')->name('menuCreate');
Route::get('/menu/{menu}/edit', 'MenuController@edit');
Route::post('/menu/update', 'MenuController@update')->name('menuUpdate');
Route::get('/menu/{id}/destroy', 'MenuController@destroy');

// submenu
Route::post('/submenu/store', 'SubmenuController@store')->name("submenuStore");
Route::get('/submenus', 'SubmenuController@index')->name('submenus');
Route::get('/submenu/create', 'SubmenuController@create')->name('submenuCreate');
Route::get('/submenu/{id}/destroy', 'SubmenuController@destroy');
Route::get('/submenu/{submenu}/edit', 'SubmenuController@edit');
Route::post('/submenu/update', 'SubmenuController@update')->name('submenuUpdate');

// Videos
Route::get('/video', 'VideoController@index')->name('video');
Route::post('video/store', 'VideoController@store')->name('videoStore');
Route::get('/video/create', 'VideoController@create')->name('videoCreate');
Route::get('/video/{id}/destroy', 'VideoController@destroy');

// User
Route::get('/users', 'UserController@index')->name('users');
Route::get('/user/{user}/verify', 'UserController@getVerify')->name('verifyUserForm');
Route::post('/user/verify', 'UserController@verify')->name('userVerify');
Route::get('/user/edit', 'UserController@edit')->name('userEdit');
Route::post('/user/update', 'UserController@update')->name('userUpdate');
Route::get('/user/{id}/destroy', 'UserController@destroy');
// Roles 
// Route::get('/role/store', 'RoleController@store');

// Blogs
Route::get('/blogs', 'BlogController@index')->name('blogs');
Route::get('/blog/create', 'BlogController@create')->name('createBlog');
Route::get('blog/{blog}/edit', 'BlogController@edit');
Route::post('blog/store', 'BlogController@store')->name('storeBlog');
Route::post('blog/update', 'BlogController@update')->name('blogUpdate');
Route::get('blog/{id}/destroy', 'BlogController@destroy');

// Contact
Route::get('/contacts', 'ContactController@index')->name('getContacts');
Route::post('/contact/store', 'ContactController@store')->name('contactStore');


// Career
Route::get('/vacancy', 'CareerController@index')->name('careers');
Route::get('/career/create', 'CareerController@create')->name('createCareer');
Route::post('/career/store', 'CareerController@store')->name('storeCareer');
Route::get('/career/{career}', 'CareerController@show');

// Candidate
Route::post('/candidate/store', 'CandidateController@store')->name('storeCandidate');


Route::post('/ckeditor/upload', 'CKController@upload');

Route::get('/home', 'HomeController@index')->name('home');


