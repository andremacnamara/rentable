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

Route::get('/', 'PageController@index');

//Advertisement
Route::get('/property', 'AdvertisementController@index');
Route::get('/property/advertise/create', 'AdvertisementController@create')->middleware('auth');
Route::post('/property', 'AdvertisementController@store');
Route::get('/property/{id}', 'AdvertisementController@show');
Route::get('/property/{id}/edit', 'AdvertisementController@edit');
Route::put('/property/{id}', 'AdvertisementController@update');

//SearchController
Route::get('/search', 'SearchController@index');
Route::get('/search/results', 'SearchController@search');

//Accounts
Route::get('/account', 'AccountController@index');

//Watchlist
Route::get('/watchlist', 'WatchlistController@index');
Route::get('/watchlist/create', 'WatchlistController@create');
Route::post('/watchlist', 'WatchlistController@store');
Route::get('/watchlist/{id}', 'WatchlistController@show');
Route::get('/watchlist/{id}/edit', 'WatchlistController@edit');
Route::put('/watchlist/{id}', 'WatchlistController@update');
Route::get('/watchlist/{id}/delete', 'WatchlistController@destroy');


Route::get('/watchlist/{image_info}/add', 'WatchedPropertiesController@create');


//Route::get('select2-autocomplete', 'Select2AutocompleteController@layout');
Route::get('/townsearch', 'AdvertisementController@townload');

Auth::routes();
