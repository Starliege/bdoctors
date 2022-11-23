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

Route::get('/','GuestController@index')->name('index');

Route::get('/show/{id}', 'GuestController@show')->name('show');

// Route::post('/store', 'ReviewController@store')->name('store');

Route::resource('reviews', 'ReviewController');

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(
        function () {
            // rotta dashboard
            Route::get('/home', 'HomeController@index')->name('home');
            Route::resource('users', 'UserController');
            Route::resource('sponsorships', 'SponsorshipController');
        });