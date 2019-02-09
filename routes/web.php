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
Route::prefix('property')->middleware('auth')->group(function () {
    Route::get('/', 'AdvertisementController@index')->name('property.index');
    Route::get('/advertise/create', 'AdvertisementController@create')->name('property.create');
    Route::post('/', 'AdvertisementController@store')->name('property.store');
    Route::get('/{id}', 'AdvertisementController@show')->name('property.show');
    Route::get('/{id}/edit', 'AdvertisementController@edit')->name('property.edit');
    Route::put('/{id}', 'AdvertisementController@update')->name('property.update');
    Route::get('/{id}/archive', 'AdvertisementController@archive')->name('property.archive');
});


//SearchController
Route::prefix('search')->middleware('auth')->group(function () {
    Route::get('/', 'SearchController@index')->name('search');
    Route::get('/results', 'SearchController@search')->name('search.results');
});

//Watchlist
Route::prefix('watchlist')->middleware('auth')->group(function () {
    Route::get('/', 'WatchlistController@index')->name('watchlist.results');
    Route::get('/create', 'WatchlistController@create')->name('watchlist.create');
    Route::post('/', 'WatchlistController@store')->name('watchlist.store');
    Route::get('/{id}', 'WatchlistController@show')->name('watchlist.show');
    Route::get('/{id}/edit', 'WatchlistController@edit')->name('watchlist.edit');
    Route::put('/{id}', 'WatchlistController@update')->name('watchlist.update');
    Route::get('/{id}/delete', 'WatchlistController@destroy')->name('watchlist.delete');
    Route::get('/{image_info}/add', 'WatchedPropertiesController@create')->name('watchlist.add');
});

//Accounts or Tenancies
Route::prefix('account')->middleware('auth')->group(function () {
    Route::get('/{id}', 'AccountController@index')->name('account.index');
    Route::get('/tenancy/{id}/create', 'AccountController@create')->name('tenancy.create');
    Route::post('/tenancy/{id}', 'AccountController@store')->name('tenancy.store');
    Route::post('/tenancy/{id}/accept', 'AccountController@accept')->name('tenancy.accept');
    Route::post('/tenancy/{id}/reject', 'AccountController@reject')->name('tenancy.reject');
    Route::post('/tenancy/{id}/end', 'AccountController@end')->name('tenancy.delete');
});

Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/search', 'AccountController@searchhome')->name('user.search');
    Route::get('/search/results', 'AccountController@searchresults')->name('user.search.results');
});

//Routes for preference form
Route::prefix('preferance')->middleware('auth')->group(function () {
    Route::get('/preferance', 'TenantPreferanceController@index')->name('preferance.index');
    Route::get('/account/preferance/create', 'TenantPreferanceController@create')->name('preferance.create');
    Route::post('/account/preferance', 'TenantPreferanceController@store')->name('preferance.store');
    Route::get('/account/preferance/{id}', 'TenantPreferanceController@show')->name('preferance.show');
    Route::get('/account/preferance/{id}/edit', 'TenantPreferanceController@edit')->name('preferance.edit');
    Route::put('/account/preferance/{id}', 'TenantPreferanceController@update')->name('preferance.update');
    Route::get('/account/preferance/{id}/delete', 'TenantPreferanceController@destroy')->name('preferance.delete');
});

//Expenses
Route::prefix('expenses')->middleware('auth')->group(function () {
    Route::get('/', 'PropertyExpenseController@index')->name('expenses.index');
    Route::get('/{id}/create', 'PropertyExpenseController@create')->name('expenses.create');
    Route::post('/', 'PropertyExpenseController@store')->name('expenses.store');
    Route::get('/property/{id}', 'PropertyExpenseController@show')->name('expenses.show');
    Route::get('/chart', 'PropertyExpenseController@chart')->name('expenses.chart');
});

//Feedback
Route::prefix('feedback')->middleware('auth')->group(function () {
    Route::get('/', 'FeedbackController@index')->name('feedback.index');
    Route::get('/create', 'FeedbackController@create')->name('feedback.index');
    Route::post('/', 'FeedbackController@store')->name('feedback.index');
    Route::get('/results/{id}', 'FeedbackController@show')->name('feedback.index');
});

//Messages
Route::prefix('messages')->middleware('auth')->group(function () {
    Route::get('/index', 'MessageController@index')->name('messages.index');
    Route::get('/{id}/create', 'MessageController@create')->name('messages.create');
    Route::post('/', 'MessageController@store')->name('messages.store');
    Route::get('/show/{id}', 'MessageController@show')->name('messages.show');
    Route::get('/inbox', 'MessageController@inbox')->name('messages.inbox');
    Route::get('/sentbox', 'MessageController@sentbox')->name('messages.sentbox');
});


//ExpenseClaimer
Route::prefix('expenseclaim')->middleware('auth')->group(function () {
    Route::get('/home', 'ExpenseClaimerController@index')->name('expenseclaim.index');
    Route::get('/create', 'ExpenseClaimerController@create')->name('expenseclaim.create');
    Route::post('/', 'ExpenseClaimerController@store')->name('expenseclaim.store');
    Route::get('/show/{id}', 'ExpenseClaimerController@show')->name('expenseclaim.show');
    Route::get('/{id}/edit', 'ExpenseClaimerController@edit')->name('expenseclaim.edit');
    Route::put('/{id}', 'ExpenseClaimerController@update')->name('expenseclaim.update');
    Route::get('/{id}/approve', 'ExpenseClaimerController@approve')->name('expenseclaim.approve');
    Route::put('/show/{id}', 'ExpenseClaimerController@changeStatus')>name('expenseclaim.change.status');
});

//Charts
Route::group(['middleware' => ['auth']], function () {
    Route::get('/aggregatedpropertyoverview', 'ChartsController@AggregatedPropertyOverview');
    Route::get('/uniquepropertyoverview/{id}', 'ChartsController@uniquePropertyOverview');
});

//Route::get('select2-autocomplete', 'Select2AutocompleteController@layout');
// Route::get('/townsearch', 'AdvertisementController@townload');

Auth::routes();
