<?php

//use Illuminate\Support\Facades\Route;

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


Route::get('view/{id}','ContactController@viewContact')->name('contact.view');


Route::get('add','ContactController@create')->name('contact.add');

Route::post('store','ContactController@store')->name('contact.store');



Route::get('edit/{id}','ContactController@edit')->name('contact.edit');

Route::post('update/{id}', 'ContactController@update')->name('contact.update');




Route::post('delete/{id}','ContactController@delete')->name('contact.delete');


