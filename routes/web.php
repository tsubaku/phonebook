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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::resource('/', 'PhonebookController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/* Admin panel */
Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=> ['auth']], function () {
    //Dashboard
    Route::get('/', 'DashboardController@dashboard')->name('admin.index');
    //Numbers
    Route::resource('/number', 'NumberController', ['as'=>'admin']);




});