<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/','ContactController@index')->name('index');



Route::get('/add','ContactController@create')->name('contact.add');

Route::post('/storeContact','ContactController@store')->name('contact.store');





Route::get('/{contact}/edit','ContactController@create')->name('contact.edit');

Route::post('/{contact}/storeEdit', 'ContactController@update')->name('contact.storeEdit');




Route::post('{device}/delete')->name('contact.delete');


