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
// Event creator
Route::get('omah/daftar', 'EventController@daftarEvent')->name('daftarEvent');
Route::resource('omah', 'EventController');

// Route::get('/omah', 'HomeController@index')->name('home');



// Participant register
Route::get('/', 'ParticipantController@events');
Route::get('/{slug}/{id}', 'ParticipantController@registerEvent');
Route::post('/{slug}/{id}/done', 'ParticipantController@postRegister');

  