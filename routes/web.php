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


// Authentication Routes...
$this->get('Dont_T3llMe', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('Dont_T3llMe', 'Auth\LoginController@login');
$this->post('Dont_T3llMe/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('Dont_T3llMe/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('Dont_T3llMe/register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('Dont_T3llMe/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
 $this->post('Dont_T3llMe/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('Dont_T3llMe/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('Dont_T3llMe/password/reset', 'Auth\ResetPasswordController@reset');

// Event creator
Route::get('omah/daftar', 'EventController@adminevent')->name('AdminEvent');
Route::resource('omah', 'EventController');
Route::post('/omah/store','EventController@store')->name('NewEvent');

// Event editor
Route::get('omah/edit/{id}', 'EventController@edit')->name('edit');
Route::get('omah/delete/{id}', 'EventController@destroy')->name('hapus');
Route::post('omah/update/{id}', 'EventController@update')->name('update');

// Participant register
Route::get('/', 'ParticipantController@events')->name('Homepage');

Route::get('/konfirmasi', 'ParticipantController@konfirmasi')->name('konfirmasi');
// Route::get('/adminpass', 'ParticipantController@events')->name('ByPassMaintenance');
Route::get('/oprec-fosti', 'ParticipantController@oprec')->name('Oprec');
// Route::get('/', 'ParticipantController@maintenance')->name('Maintenance');
Route::get('/{slug}', 'ParticipantController@registerEvent')->name('Daftar');
Route::post('/{slug}/done', 'ParticipantController@kirimEmail');
Route::get('/verifydone', 'ParticipantController@done')->name('verifydone');

// Route::get('/home', 'EventController@index')->name('home');
Route::get('Dont_T3llMe/new', 'EventController@new')->name('NewUser');

// Participant List
Route::get('omah/data/{slug}', 'EventController@data')->name('data');
Route::get('omah/data/delete/{id}', 'EventController@hapus')->name('hapuspeserta');
Route::get('/{slug}/download', 'ParticipantController@download')->name('downloaddata');


Auth::routes(['verify' => true]);