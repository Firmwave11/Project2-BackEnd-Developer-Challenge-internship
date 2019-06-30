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

//Route::get('/', function () {
  //  return view('welcome');
//});
Route::get('/', 'HomeController@index');
//Route::get('/','HomeController@person')->name('person');
Route::get('/customer','HomeController@customer')->name('customer');
Route::get('/person','HomeController@person')->name('person');
Route::get('/customer/search', 'CustomerController@search');
Route::get('query', 'Dashboard\CariController@search');
Route::get('query2', 'Dashboard\CariController@searching');
Route::get('/organization', 'Dashboard\OrganizationController@index')->name('organization');
Route::get('/person/{person}/edit', 'Dashboard\PersonController@edit');
Route::get('/customer/{customer}/edit', 'Dashboard\CustomerController@edit');

Auth::routes();

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function() {
	Route::resource('/customer', 'Dashboard\CustomerController');
	Route::get('/customer/search', 'Dashboard\CustomerController@search');
	Route::resource('/person', 'Dashboard\PersonController');
	Route::resource('/organization', 'Dashboard\OrganizationController');

});