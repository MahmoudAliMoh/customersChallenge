<?php

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

/**
 * Route group for countries module.
 */
Route::middleware('throttle:60,1')->prefix('countries')->group(function () {
    Route::get('/', 'Api\CountriesController@list');
});

/**
 * Route group for customers module.
 */
Route::middleware('throttle:60,1')->prefix('customers')->group(function () {
    Route::get('/numbers-lookup', 'Api\CustomersController@numbersLookup');
});
