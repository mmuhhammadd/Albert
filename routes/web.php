<?php

use Illuminate\Support\Facades\Route;



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
})->name('welcome')->middleware('guest');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/Courses', 'App\Http\Controllers\courseController')->middleware('auth');

Route::resource('/reviews', 'App\Http\Controllers\reviewController')->middleware('auth');

Route::resource('/user', 'App\Http\Controllers\usersController')->middleware('auth');

Route::get('/enroll/{id}', 'App\Http\Controllers\courseController@enroll')->name('Courses.enroll')->middleware('auth');

Route::get('/mycourses', 'App\Http\Controllers\courseController@mycourses')->name('mycourses')->middleware('auth');

Route::get('/enrolledcourses', 'App\Http\Controllers\courseController@enrolledcourses')->name('Courses.enrolledcourses')->middleware('auth');

Route::resource('/contact', 'App\Http\Controllers\contactController');

Route::get('Categories/{category}', 'App\Http\Controllers\courseController@category')->name('category')->middleware('auth');

Route::post('/updatepassword', 'App\Http\Controllers\usersController@updatepassword')->middleware('auth');
