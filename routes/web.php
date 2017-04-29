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

/*----MyTeam-----*/
Route::get('/announcements', 'announcement@getAnnouncements');
Route::get('/corporation/myTeam/{id}','CorporationController@myteam');
Route::get('/corporation/newTeam/{id}','CorporationController@newteam');
Route::post('/corporation/newTeam/{id}/cambiarStatus','CorporationController@cambiarStatus');

/*-----Projects-----*/
Route::get('/projects/{id}','announcement@getProjects');

Route::get('/personal/dashboard/misConvocatorias/{id}','announcement@announcement');
Route::get('/corporation/dashboard/misConvocatorias/{id}','announcement@announcement');
 
 Route::post('/corporation/dashboard/crear/{id}',  ['middleware' , 'uses' => 'announcement@crearConvocatoria']);

Route::get('/corporation/dashboard/misConvocatorias/{id}/edit', 'announcement@editAnnouncement');
Route::post('/corporation/dashboard/update/{id}','announcement@updateAnnouncement');



Route::post('/corporation/dashboard/misConvocatorias/{id}/delete','announcement@deleteAnnouncement');
Route::get('/corporation/dashboard/misConvocatorias/{id}/ver', 'announcement@verAnnouncement');

Route::post('/corporation/dashboard/crearProyecto/{id}','announcement@addProject');

Route::get('/projects/{id}/ver', 'announcement@verProjects');
