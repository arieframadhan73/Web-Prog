<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','PagesController@getHome');

Route::get('/tukang/home','PagesController@getHomeTukang');

Route::get('/login','PagesController@getLogin');

Route::post('/login','PagesController@postLogin');

Route::get('/tukang/login','PagesController@getTukangLogin');

Route::post('/tukang/login','PagesController@postTukangLogin');

Route::get('/register','PagesController@getRegister');

Route::post('/register','PagesController@postRegister');

Route::get('/tukang/register','PagesController@getTukangRegister');

Route::post('/tukang/register','PagesController@postTukangRegister');

Route::get('/user/image/{filename}','PagesController@getUserImage');

Route::get('/tukang/image/{filename}','PagesController@getTukangImage');

Route::get('/user/logout','PagesController@getUserLogout')->middleware('web');

Route::get('/tukang/logout','PagesController@getTukangLogout')->middleware('tukang');

Route::get('/tukang/search','PagesController@getSearchTukang');

Route::put('/booking/{id}','PagesController@getBooking');