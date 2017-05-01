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



/*----- Projects -----*/
Route::get('/projects/{id}','announcement@getProjects');
Route::get('/projects/{id}/ver', 'announcement@verProjects');

Route::get('/personal/dashboard','PersonalController@index');
Route::get('/personal/dashboard/misConvocatorias/{id}','announcement@announcement');


/*----- Anouncements -----*/
Route::get('/announcements', 'announcement@getAnnouncements');


/*---- Corporations -----*/
Route::get('/corporation/dashboard','CorporationController@index');
Route::get('/corporation/dashboard/misConvocatorias/{id}','announcement@announcement');
Route::get('/corporation/dashboard/misConvocatorias/{id}/edit', 'announcement@editAnnouncement');
Route::get('/corporation/dashboard/misConvocatorias/{id}/ver', 'announcement@verAnnouncement');
Route::post('/corporation/dashboard/crear/{id}',  ['middleware' , 'uses' => 'announcement@crearConvocatoria']);
Route::post('/corporation/dashboard/misConvocatorias/{id}/delete','announcement@deleteAnnouncement');
Route::post('/corporation/dashboard/update/{id}','announcement@updateAnnouncement');
Route::post('/corporation/dashboard/crearProyecto/{id}','announcement@addProject');

Route::get('/corporation/team' , 'CorporationController@team');
Route::post('/corporation/team/members' , 'CorporationController@members'); //ajax
Route::post('/corporation/team/addMember' , 'CorporationController@addMember'); //ajax
Route::post('/corporation/team/member/{id}' , 'CorporationController@member');

