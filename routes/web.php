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


Route::get('/home', 'HomeController@index');
Route::post('/postRegister/{role}', 'HomeController@postRegister');

Route::get('/corporation/dashboard','CorporationController@index');
Route::get('/personal/dashboard','PersonalController@index');


Route::get('/corporation/myteam/{id}','CorporationController@myteam');


Route::get('/announcements', 'announcement@getAnnouncements');

/*-----Projects-----*/
Route::get('/personal/projects','PersonalController@projects');
Route::get('/corporation/projects','CorporationController@projects');

Route::get('/personal/dashboard/misConvocatorias/{id}','announcement@announcement');
Route::get('/corporation/dashboard/misConvocatorias/{id}','announcement@announcement');
 


