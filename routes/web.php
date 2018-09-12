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
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


// Participant register
Route::group(['prefix' => 'event'], function(){
    Route::get('/', 'ParticipantController@events');
    Route::get('/{slug}/{id}', 'ParticipantController@registerEvent');
    Route::post('/{slug}/{id}', 'ParticipantController@postRegister');
});

// Event creator
Route::group(['prefix' => 'admin'], function(){
    Route::get('data/daftar', 'EventController@daftarEvent')->name('daftarEvent');
    Route::resource('data', 'EventController');
});
  