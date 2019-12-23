<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/departments', 'DepartmentController@index')->name('departments');
Route::get('/clients', 'ClientController@index')->name('clients');

Route::get('/projects', 'projectController@getProjects');
