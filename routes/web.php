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

Route::get('/', function () {
    //echo "Test";
   return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/JobOffers', 'JobOfferController@index')->name('JobOffers');

Route::get('/create', 'JobOfferController@create')->name('create');
Route::get('/store', 'JobOfferController@store')->name('store');

Route::get('/edit/{id}', 'JobOfferController@edit')->name('edit');
Route::get('/update/{id}', 'JobOfferController@update')->name('update');

Route::get('/destroy/{id}', 'JobOfferController@destroy')->name('destroy');


Route::get('/companies', 'CompanyController@index')->name('companies');

Route::get('/ajouter_favoris/{joboffer_id}', 'JobOfferController@ajouter_favoris')->name('ajouter_favoris');
Route::get('/retirer_favoris/{joboffer_id}', 'JobOfferController@retirer_favoris')->name('retirer_favoris');