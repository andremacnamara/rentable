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
Route::post('/property', 'AdvertisementController@store')->middleware('auth');;
Route::get('/property/{id}', 'AdvertisementController@show');
Route::get('/property/{id}/edit', 'AdvertisementController@edit')->middleware('auth');;
Route::put('/property/{id}', 'AdvertisementController@update')->middleware('auth');;
Route::get('/property/{id}/archive', 'AdvertisementController@archive')->middleware('auth');;


//SearchController
Route::get('/search', 'SearchController@index');
Route::get('/search/results', 'SearchController@search');

//Watchlist
Route::get('/watchlist', 'WatchlistController@index')->middleware('auth');
Route::get('/watchlist/create', 'WatchlistController@create')->middleware('auth');
Route::post('/watchlist', 'WatchlistController@store')->middleware('auth');
Route::get('/watchlist/{id}', 'WatchlistController@show')->middleware('auth');
Route::get('/watchlist/{id}/edit', 'WatchlistController@edit')->middleware('auth');
Route::put('/watchlist/{id}', 'WatchlistController@update')->middleware('auth');
Route::get('/watchlist/{id}/delete', 'WatchlistController@destroy')->middleware('auth');
Route::get('/watchlist/{image_info}/add', 'WatchedPropertiesController@create')->middleware('auth');;

//Accounts or Tenancies
Route::get('/account/{id}', 'AccountController@index')->middleware('auth');
Route::post('/account/{id}/add', 'AccountController@getAdd')->middleware('auth');
Route::get('/account/{id}/accept', 'AccountController@getAccept')->middleware('auth');

Route::get('account/tenancy/create/{id}', 'AccountController@tenancyIndex')->middleware('auth');
//Route::get('select2-autocomplete', 'Select2AutocompleteController@layout');
Route::get('/townsearch', 'AdvertisementController@townload');

Auth::routes();
