<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('users','Api\UserController')->only(['index','show']);
Route::resource('specializations','Api\SpecializationController')->only(['index','show']);

Route::get('/messages','Api\MessageController@index');

Route::post('/messages','Api\MessageController@store');

Route::get('/reviews', 'Api\ReviewController@index');

Route::post('/reviews', 'Api\ReviewController@store');
