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
Route::get('/profile/{user_name?}', 'usersController@profile')->name('profile');
// The Edit Profile page.
Route::get('/edit-profile', 'usersController@edit_profile')->name('edit-profile');
// Update an edited profile
Route::match(['put', 'patch'], '/profile', 'usersController@update_profile')->name('update-profile');

// Resource routes:
// Categories
Route::resource('/admin/categories', 'CategoriesController');

// Categories for end users (not admins)
Route::get('/category/{name}', 'pagesController@showCategory')->name('category');

// Posts:
Route::resource('/admin/posts', 'postsController');
