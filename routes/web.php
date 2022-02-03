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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




//DoctorController
Route::get('/doctors/add', 'DoctorController@add')->name('add-doctor');

Route::post('/doctors/store', 'DoctorController@store')->name('store-doctor');

Route::get('/doctors/all', 'DoctorController@all')->name('all-doctors');

Route::get('/doctors/edit/{id}', 'DoctorController@edit')->name('edit-doctors');
Route::post('/doctors/edit/{id}', 'DoctorController@update')->name('edit-doctors');
Route::get('/doctors/delete/{id}', 'DoctorController@delete')->name('delete-doctors');

//ClinicDashController
Route::get('/clinics/all', 'ClinicDashController@all')->name('all-clinics');
Route::get('/clinics/count', 'ClinicDashController@count')->name('all-clinics-count');