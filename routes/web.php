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

Route::get('/', 'homeController@index')->name('home');

// Notimplemented route (only in use for development purposes).
Route::get('/404', function () {
    return View('notimplemented');
})->name('notimplemented');

Auth::routes();

// Resource routes:
// Categories
Route::resource('/admin/categories', 'CategoriesController');
