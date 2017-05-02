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
    return redirect('/home');
});


Auth::routes();


Route::get('/home', 'HomeController@index');
Route::post('/postRegister/{role}', 'HomeController@postRegister');



/*----- Personal -----*/
Route::get('/personal/dashboard','PersonalController@index');
Route::get('/personal/dashboard/misConvocatorias/{id}','announcement@announcement');

/*---- Corporations -----*/
Route::get('/corporation/dashboard','CorporationController@index');
Route::get('/corporation/team' , 'CorporationController@team');
Route::post('/corporations/areas' , 'CorporationController@areas'); //AJAX
Route::post('/corporation/team/members' , 'CorporationController@members'); //ajax
Route::post('/corporation/team/addMember' , 'CorporationController@addMember'); //ajax
Route::post('/corporation/team/member/{id}' , 'CorporationController@member');



/*----- Anouncements -----*/
Route::get('/announcements', 'announcement@index');
Route::post('/announcements/getAnnouncements' , 'announcement@getAnnouncements'); //AJAX
Route::post('/announcement/new', 'announcement@crearConvocatoria'); //AJAX
Route::post('/announcement/{id}', 'announcement@verAnnouncement'); //AJAX
Route::post('/announcement/{id}/edit', 'announcement@editAnnouncement');
Route::post('/announcement/{id}/update','announcement@updateAnnouncement');
Route::post('/announcement/{id}/newProposal' , 'announcement@newProposal');
Route::post('/announcements/search/{case}' , 'announcement@search'); //AJAX


/*----- Proyects -----*/
Route::get('/proyects' , 'ProyectsController@index');
Route::get('/projects/{id}','ProyectsController@getProjects');
Route::get('/projects/{id}/ver', 'ProyectsController@verProjects');

/*----- Proposals -----*/
Route::get('/proposals' , 'ProposalController@index');
Route::post('/proposals/{id}', 'ProposalController@showProposal'); //AJAX
Route::get('/proposals/new' , 'ProposalController@new');
Route::post('/proposal/new' , 'ProposalController@send');
Route::post('/proposals/search/{case}' , 'ProposalController@search'); //AJAX

//Route::get('/corporation/dashboard/misConvocatorias/{id}','announcement@announcement');
//Route::post('/corporation/dashboard/misConvocatorias/{id}/delete','announcement@deleteAnnouncement');
//Route::post('/corporation/dashboard/crearProyecto/{id}','announcement@addProject');

