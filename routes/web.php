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

// Home page.
Route::get('/', 'pagesController@index')->name('home');

// Notimplemented route (only in use for development purposes).
Route::get('/404', function () {
    return View('notimplemented');
})->name('notimplemented');

// User related routes.
Auth::routes();
// User Profiles.
Route::get('/profile/{user_name}', 'usersController@profile')->name('profile');

// Resource routes:
// Categories
Route::resource('/admin/categories', 'CategoriesController');

// Categories for end users (not admins)
Route::get('/category/{name}', 'pagesController@showCategory')->name('category');
