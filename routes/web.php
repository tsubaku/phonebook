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

Route::resource('/', 'PhonebookController');

Auth::routes();

// Admin panel
Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=> ['auth']], function () {
    //Dashboard (Edit phone book)
    Route::resource('/number', 'NumberController', ['as'=>'admin']);
});

// AJAX requests
Route::post('/search', 'Ajax\AjaxController@search');
