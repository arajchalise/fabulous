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
Route::get('/cart', function(){
  return view('cart');
})->name('cart');
Route::get('/products', 'ProductController@index')->name('products');

Route::group(['prefix' => 'admin'], function () {

    Auth::routes();

});

Route::prefix('client')->group(function() {
  Route::get('/login','Auth\BuyerLoginController@showLoginForm')->name('client.login');
  Route::post('/login', 'Auth\BuyerLoginController@login')->name('client.login.submit');
  Route::get('/register', function(){
    return view('auth.buyer_register');
   })->name('client.register');
  Route::post('/register', 'Auth\BuyerRegisterController@create')->name('client.register.submit');
  Route::get('logout/', 'Auth\BuyerLoginController@logout')->name('client.logout');
  Route::get('/dashboard', 'BuyerController@index')->name('client.dashboard');
  Route::get('/profile', 'BuyerController@profile')->name('client.profile');
  Route::get('/orders', 'BuyerController@orders')->name('client.orders');
  Route::get('/approvedOrders', 'BuyerController@approvedOrders')->name('client.approvedOrders');
  Route::get('/pendingOrders', 'BuyerController@pendingOrders')->name('client.pendingOrders');
  Route::get('/declinedOrders', 'BuyerController@declinedOrders')->name('client.declinedOrders');
  Route::get('/dispatchedOrders', 'BuyerController@dispatchedOrders')->name('client.dispatchedOrders');
  Route::get('/orders/{tnx}/view', 'BuyerController@view');
  Route::post('/orders/makePayment', 'BuyerController@payment')->name('makePayment');

  }) ;

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
Route::get('/projects/{project}', 'ProjectController@show');

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
Route::get('/video/{video}/edit', 'VideoController@edit');

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
Route::get('/blog/{blog}/edit', 'BlogController@edit');
Route::post('/blog/store', 'BlogController@store')->name('storeBlog');
Route::post('/blog/update', 'BlogController@update')->name('blogUpdate');
Route::get('/blog/{id}/destroy', 'BlogController@destroy');
Route::get('/blog/{blog}', 'BlogController@show');

// Contact
Route::get('/contacts', 'ContactController@index')->name('getContacts');
Route::post('/contact/store', 'ContactController@store')->name('contactStore');
Route::post('/contact/{contact}/sendEmail', 'ContactController@sendEmail');


// Career
Route::get('/vacancy', 'CareerController@index')->name('careers');
Route::get('/career/create', 'CareerController@create')->name('createCareer');
Route::post('/career/store', 'CareerController@store')->name('storeCareer');
Route::get('/career/{career}', 'CareerController@show');
Route::get('/career/{career}/edit', 'CareerController@edit');
Route::post('/career/update', 'CareerController@update')->name('updateCareer');

// Candidate
Route::post('/candidate/store', 'CandidateController@store')->name('storeCandidate');

// products
Route::get('/product', 'ProductController@getProduct')->name('product');
Route::get('/product/create', 'ProductController@create')->name('createProduct');
Route::get('/product/{product}/edit', 'ProductController@edit');
Route::post('/product/store', 'ProductController@store')->name('storeProduct');
Route::post('/product/update', 'ProductController@update')->name('updateProduct');
Route::post('/product/{id}/destroy', 'ProductController@destroy');
Route::get('/products/{product}', 'ProductController@show');
Route::get('/product/{q}', 'ProductController@getProductCategory');


// categories
Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/category/create', 'CategoryController@create')->name('categoryCreate');
Route::post('/category/store', 'CategoryController@store')->name('categoryStore');
Route::post('/category/update', 'CategoryController@update')->name('categoryUpdate');
Route::get('/category/{category}/edit', 'CategoryController@edit');
Route::get('/category/{id}/destroy', 'CategoryController@destroy');

// Cart
Route::post('/addToCart', 'ProductController@addToCart')->name('addToCart');
Route::get('/removeCart/{id}', 'ProductController@removeCart');
Route::post('/updateCart', 'ProductController@updateCart')->name('updateCart');
Route::get('/checkout', 'BuyerController@checkout')->name('checkout');
Route::post('/makeOrder', 'BuyerController@makeOrder')->name('makeOrder');

// Orders
Route::get('/orders', 'OrderController@index')->name('orders');
Route::get('/orders/approved', 'OrderController@approved')->name('approvedOrders');
Route::get('/orders/suspended', 'OrderController@suspended')->name('suspendedOrders');
Route::get('/orders/paid', 'OrderController@paid')->name('paidOrders');
Route::get('/orders/dispatched', 'OrderController@dispatched')->name('dispatchedOrders');
Route::get('/orders/{tnx}', 'OrderController@showOrder');
Route::get('/orders/{tnx}/verify', 'OrderController@verifyOrder');
Route::post('/orders/hold', 'OrderController@holdOrder')->name('holdOrders');
Route::get('/orders/{txn}/dispatch', 'OrderController@dispatch');

// CKEditor
Route::post('/ckeditor/upload', 'CKController@upload');

Route::get('/home', 'HomeController@index')->name('home');
