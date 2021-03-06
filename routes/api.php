<?php

use Illuminate\Http\Request;

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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

/* Route::get('tests/{slug}', function (Request $request) {
    return Illuminate\Support\Str::ascii('éééééééééééé');
}); */

Route::post('films', 'FilmController@store');

Route::get('films', 'FilmController@index');

Route::get('films/{slug}', 'FilmController@show')->where('slug', '[A-Za-z-]+');

Route::post('login', 'Auth\UserController@login');

Route::post('register', 'Auth\UserController@register');

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('comments', 'CommentController@store');
});

Route::get('films/{id}/comments', 'CommentController@show')->where('id', '[0-9]+');

Route::post('upload', 'UploadController@store');