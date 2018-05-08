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
Route::get('/account/tenancy/{id}/create', 'AccountController@create')->middleware('auth');
Route::post('/account/tenancy/{id}', 'AccountController@store')->middleware('auth');
Route::post('/account/tenancy/{id}/accept', 'AccountController@accept')->middleware('auth');
Route::post('/account/tenancy/{id}/reject', 'AccountController@reject')->middleware('auth');
Route::post('/account/tenancy/{id}/end', 'AccountController@end')->middleware('auth');

Route::get('/user/search', 'AccountController@searchhome')->middleware('auth');
Route::get('/user/search/results', 'AccountController@searchresults')->middleware('auth');

//Routes for preference form
Route::get('/preferance', 'TenantPreferanceController@index')->middleware('auth');
Route::get('/account/preferance/create', 'TenantPreferanceController@create')->middleware('auth');
Route::post('/account/preferance', 'TenantPreferanceController@store')->middleware('auth');
Route::get('/account/preferance/{id}', 'TenantPreferanceController@show')->middleware('auth');
Route::get('/account/preferance/{id}/edit', 'TenantPreferanceController@edit')->middleware('auth');
Route::put('/account/preferance/{id}', 'TenantPreferanceController@update')->middleware('auth');
Route::get('/account/preferance/{id}/delete', 'TenantPreferanceController@destroy')->middleware('auth');

//Expenses
Route::get('/expenses', 'PropertyExpenseController@index')->middleware('auth');
Route::get('/expenses/{id}/create', 'PropertyExpenseController@create')->middleware('auth');
Route::post('/expenses', 'PropertyExpenseController@store')->middleware('auth');
Route::get('/expenses/property/{id}', 'PropertyExpenseController@show')->middleware('auth');
Route::get('/chart', 'PropertyExpenseController@chart');

//Feedback
Route::get('/feedback', 'FeedbackController@index')->middleware('auth');
Route::get('/feedback/create', 'FeedbackController@create')->middleware('auth');
Route::post('/feedback', 'FeedbackController@store')->middleware('auth');
Route::get('/feedback/results/{id}', 'FeedbackController@show')->middleware('auth');

//Messages
Route::get('/messages', 'MessageController@index')->middleware('auth');
Route::get('/messages/{id}/create', 'MessageController@create')->middleware('auth');
Route::post('/messages', 'MessageController@store')->middleware('auth');
Route::get('/messages/{id}', 'MessageController@show')->middleware('auth');



//Route::get('select2-autocomplete', 'Select2AutocompleteController@layout');
Route::get('/townsearch', 'AdvertisementController@townload');

Auth::routes();
