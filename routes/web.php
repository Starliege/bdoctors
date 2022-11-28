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
// rotta x visualizzare dottori backoffice
Route::get('/guesthome', 'GuestController@index')->name('index');

// rotta per tornare la pagina di vue, ho sositutito riga 16
// porta alla rotta HOME di vue (lista dei medici)
Route::get('/', function () {
    return view('guest.home');
})->name('guest.home');


Route::get('/show/{id}', 'GuestController@show')->name('show');

// Route::post('/store', 'ReviewController@store')->name('store');

Route::resource('reviews', 'ReviewController');

Route::resource('messages', 'MessageController');

Route::resource('stars', 'StarController');





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
        }
    );

Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');
