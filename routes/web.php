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
Route::get('customer', function () {
    return view('customer.home');
});
Route::get('insert', function () {
    DB::table('users')->insert([
        ['name' => 'nhiben','email' => str_random(5).'.com','password' => bcrypt('benbacker')],
    ]);
});
Route::get('logout', 'Signin@logout');
Route::get('login', 'Signin@signin');
Route::post('signin', 'Signin@Login');
Route::group(['middleware' => ['AuthMiddleware']], function () {
    Route::group(['prefix' => 'admin'], function () {
        //Category
        Route::get('category', 'Category@index');
        Route::get('category/delete/{id}', 'Category@delete');
        Route::post('category/insert', 'Category@insert');
        Route::post('category/edit', 'Category@edit');
        Route::post('category/update/{id}', 'Category@update');
        //Subcategory
        Route::get('subcategory/{url}', 'Subcategory@index');
        Route::post('subcategory/insert', 'Subcategory@insert');
        Route::post('subcategory/edit', 'Subcategory@edit');
        Route::get('subcategory/delete/{id}', 'Subcategory@delete');
        Route::post('subcategory/update/{id}', 'Subcategory@update');

        //
        Route::get('Users','Users@index');
        Route::post('Users/insert','Users@insert');
        Route::post('Users/edit','Users@edit');
        Route::get('Users/delete/{id}','Users@delete');
        Route::post('Users/update/{id}','Users@update');
        //
        Route::get('product','Products@index');
        Route::post('product/new','Products@new');
        Route::post('product/insert','Products@insert');
        Route::post('product/loadsub','Products@loadsub');
        Route::get('product/delete/{id}','Products@delete');
        Route::post('product/update/{id}','Products@update');
        Route::post('product/edit/{id}','Products@edit');

        //Khuyến mãi
        Route::get('promotion', 'Promotion@index');
        Route::post('promotion/insert', 'Promotion@insert');
        Route::post('promotion/edit', 'Promotion@edit');
        Route::get('promotion/delete/{id}', 'Promotion@delete');
        Route::post('promotion/update/{id}', 'Promotion@update');

         //Hãng sản xuất
         Route::get('brand', 'Brand@index');
         Route::post('brand/insert', 'Brand@insert');
         Route::post('brand/edit', 'Brand@edit');
         Route::get('brand/delete/{id}', 'Brand@delete');
         Route::post('brand/update/{id}', 'Brand@update');
         //Bannar marketing
         Route::get('banner', 'Banner@index');
         Route::post('brand/insert', 'Brand@insert');
         Route::post('brand/edit', 'Brand@edit');
         Route::get('brand/delete/{id}', 'Brand@delete');
         Route::post('brand/update/{id}', 'Brand@update');
    });
});

Route::get('eloquent', 'Eloquent@test');

Route::post('customer/signup', 'Customer@signup');
Route::get('customer/update/{email}', 'Customer@update');
Route::post('customer/login', 'Customer@login');
Route::get('customer/logout', 'Customer@logout');

