<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//specializationController
Route:: post('/specializations/store', 'SpecializationController@store');
Route:: get('/specializations/index', 'SpecializationController@index');

//DoctorAgeController
Route:: get('/doctors/index', 'DoctorAgeController@index');

Route:: post('/doctors/update', 'DoctorAgeController@update_doctor');

Route:: get('/doctors/showspecialization/{specialization_id}', 'DoctorAgeController@show_doctors_by_specialization_id');

Route:: get('/doctors/showprofilebyname/{name}', 'DoctorAgeController@show_doctor_profile_by_name');

Route:: get( '/doctors/showprofilebyid/{id}', 'DoctorAgeController@show_doctor_profile_by_id');

Route:: post( '/doctors/showbypassword', 'DoctorAgeController@show_doctor_by_password');
//StateController
Route:: post('/states/store', 'StateController@store');
Route:: get('/states/index', 'StateController@index');

//ArticleController
Route:: post('/article/store', 'ArticleController@store');
Route:: get('/articles/index', 'ArticleController@index');

//PatientController
Route:: post('/patient/store', 'PatientController@store');
Route:: get('/patients/index', 'PatientController@index');
Route:: get('/patients/showpatientbyuserid/{user_id}', 'PatientController@show_patient_by_user_id');


//LocationController
Route:: post('/location/store', 'LocationController@store');
Route:: get('/locations/index', 'LocationController@index');
Route:: get('/locations/showlocationbyid/{state_id}', 'LocationController@show_location_by_id');

//ClinicController
Route:: post('/clinic/store', 'ClinicController@store');
Route:: get('/clinics/index', 'ClinicController@index');
Route:: get('/clinics/showdoctor/{doctor_id}', 'ClinicController@show_clinics_by_doctor_id');
Route:: get('/clinics/showclinicbylocationid/{location_id}', 'ClinicController@show_clinics_by_location_id');
Route:: get('/clinics/showclinicbyid/{id}', 'ClinicController@show_clinics_by_id');
Route:: post('/clinic/updateclinic', 'ClinicController@update_clinic');

//////////////////////////////////////////////////////////////////////////
//UserController
Route:: get('/users/index', 'UserController@index');

Route:: post('/users/store', 'UserController@store');

Route:: post('/users/update', 'UserController@update_user');

Route:: get('/users/showphone/{phone}', 'UserController@show_user_by_phone');

Route::group(['prefix' => 'user'],function (){
        Route::post('login', 'UserController@login');

        Route::post('logout','UserController@logout') -> middleware(['auth.guard:user-api']);

 });

Route::group(['prefix' => 'user' ,'middleware' => 'auth.guard:user-api'],function (){
	//auth.guard:user-api  handel token to any user or admin it belong
 Route::post('profile',function(){
        return \Auth::user();//return authenticated user data
 	
     }) ;
}) ;
////////////////////////////////////////////////////////////////
//ReservationController
Route:: post('/reservation/store', 'ReservationController@store');
Route:: get('/reservations/show_rese_for_clinic/{clinic_id}', 'ReservationController@show_rese_for_clinic');
Route:: get('/reservations/show_rese_for_user/{user_id}', 'ReservationController@show_rese_for_user');
Route:: get('/reservation/canceled_res/{id}', 'ReservationController@canceled_res');
Route:: get('/reservation/complete_res/{id}', 'ReservationController@complete_res');

//OfferController
Route:: post('/offer/store', 'OfferController@store');
Route:: get('/offers/index', 'OfferController@index');
Route:: get('/offers/show_offers_for_clinic/{clinic_id}', 'OfferController@show_offers_for_clinic');

//PeriodController
Route:: post('/period/store', 'PeriodController@store');
Route:: post('/periods/available_period', 'PeriodController@available_period');

//WorkController
Route:: post('/work/store', 'WorkController@store');
Route:: get('/works/show_workingtime_for_clinic/{clinic_id}', 'WorkController@show_workingtime_for_clinic');

//FavoriteController
Route:: post('/favorite/store', 'FavoriteController@store');
Route:: post('/favorite/remove', 'FavoriteController@remove');
Route:: get('/favorites/favorite_doctor/{user_id}', 'FavoriteController@favorite_doctor');