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
Route::get('login', 'Signin@Logout');
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
        Route::get('Products','Products@index');
        Route::post('Products/new','Products@new');
        Route::post('Products/insert','Products@insert');
        Route::post('Products/loadsub','Products@loadsub');
        Route::get('Products/delete/{id}','Products@delete');
        Route::post('Products/update/{id}','Products@update');
        Route::post('Products/edit/{id}','Products@edit');

        //Menu
        Route::get('menu/{url}/{uri}', 'Menu@index');
        Route::post('menu/insert', 'Menu@insert');
        Route::post('menu/edit', 'Menu@edit');
        Route::post('menu/getmenu', 'Menu@getmenu');
        Route::get('menu/delete/{id}', 'Menu@delete');
        Route::post('menu/update/{id}', 'Menu@update');

    });
});
