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

// Route::get('/admin', 'AdminController@login');
Route::match(['get', 'post'],'/admin', 'AdminController@login');

Route::get('/logout', 'AdminController@logout');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/admin/dashboard', 'AdminController@dashboard');
    Route::get('/admin/settings', 'AdminController@settings');
    Route::get('/admin/check_pwd', 'AdminController@chkPassword');
    Route::match(['get','post'], '/admin/update-pwd', 'AdminController@updatePassword');

    Route::match(['get','post'], '/admin/add-category', 'CategoryController@addCategory');
    Route::match(['get','post'], '/admin/edit-categories/{id}', 'CategoryController@editCategory');
    Route::match(['get','post'], '/admin/delete-categories/{id}', 'CategoryController@deleteCategory');
    Route::get('/admin/view-category', 'CategoryController@viewCategories');

    Route::match(['GET', 'POST'], '/admin/add-product', 'ProductsController@addProduct');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
