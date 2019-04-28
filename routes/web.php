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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('course/{id}', 'Website\CoursesController@show')->name('course-details');
Route::get('lesson/{id}/{slug}', 'Website\LessonsController@show')->name('lesson-details');

Route::get('contact', 'Website\ContactsController@contact');



Route::middleware([ 'auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/', 'Admin\AdminController@index');

    Route::resource('categories', 'Admin\CategoriesController')->except(['show']);
    Route::get('users', 'Admin\UsersController@index');
    Route::get('users/{id}', 'Admin\UsersController@show')->name('admin.user.show');

    Route::get('courses', 'Admin\CoursesController@index');
    Route::get('courses/{id}/approve', 'Admin\CoursesController@approve');

});



Route::middleware([ 'auth'])->prefix('users')->group(function () {


    Route::get('/', 'User\UsersController@index');
    Route::get('profile', 'User\ProfileController@index')->name('users.profile');
    Route::put('profile', 'User\ProfileController@update')->name('users.profile.update');

    Route::get('password', 'User\PasswordController@index')->name('users.password');
    Route::put('password', 'User\PasswordController@update')->name('users.password.update');


    Route::middleware(['instructor'])->group(function () {

        Route::resource('courses', 'Instructor\CourseController');
        Route::resource('sections', 'Instructor\SectionsController');
        Route::get('lessons/{course_id}/create', 'Instructor\LessonsController@create');
        Route::resource('lessons', 'Instructor\LessonsController')->except(['create']);;
        
    });

});
