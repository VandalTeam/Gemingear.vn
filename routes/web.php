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
        Route::get('category', 'Category@index');
        Route::get('category/delete/{id}', 'Category@delete');
        Route::post('category/insert', 'Category@insert');
        Route::post('category/edit', 'Category@edit');
        Route::post('category/update/{id}', 'Category@update');
        //
        Route::get('subcategory/{url}', 'Subcategory@index');
        Route::post('subcategory/insert', 'Subcategory@insert');
        Route::post('subcategory/edit', 'Subcategory@edit');
        Route::get('subcategory/delete/{id}', 'Subcategory@delete');
        Route::post('subcategory/update/{id}', 'Subcategory@update');
    });
});
