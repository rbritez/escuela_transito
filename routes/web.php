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

Route::get('/','CoursesController@index1')->name('courses.index');

Route::group(['prefix'=>'admin'], function(){
    Route::resource('users','UsersController');
    route::resource('instructor', 'InstructorController');
    route::resource('sites', 'SitesController');
});
Route::resource('courses','CoursesController');
route::resource('assistences','AssistencesController');
Route::get('couses/list/{course}', 'CoursesController@list')->name('courses.list');
route::resource('postulantes','PostulanteController');
Route::PUT('admin/users/pass/{user}','UsersController@updatePass')->name('users.updatePass');
route::get('courses/pdf/list/{id}','CoursesController@pdf')->name('courses.pdf');
route::get('courses/pdf/lista_cargada/{id}','CoursesController@lista_cargada')->name('courses.lista_cargada');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
route::get('postulantes/pdf/lista_aspirantes','PostulanteController@pdf')->name('postulantes.pdf');
route::PUT('postulantes/codigo/{postulante}','PostulanteController@codigo')->name('postulantes.codigo');
