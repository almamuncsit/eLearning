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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::middleware([ 'auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/', 'Admin\AdminController@index');

    Route::resource('categories', 'Admin\CategoriesController')->except(['show']);
    Route::get('users', 'Admin\UsersController@index');
    Route::get('users/{id}', 'Admin\UsersController@show')->name('admin.user.show');

});



Route::middleware([ 'auth'])->prefix('users')->group(function () {


    Route::get('/', 'User\UsersController@index');
    Route::get('profile', 'User\ProfileController@index')->name('users.profile');
    Route::put('profile', 'User\ProfileController@update')->name('users.profile.update');

    Route::get('password', 'User\PasswordController@index')->name('users.password');
    Route::put('password', 'User\PasswordController@update')->name('users.password.update');


    Route::middleware(['instructor'])->group(function () {

        Route::resource('courses', 'Instructor\CourseController');
    });

});
