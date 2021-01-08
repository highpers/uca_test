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



Route::resource('adminX/cursos', 'CursoController');
Route::resource('adminX/alumnos', 'AlumnoController');

Route::get('adminX/inscripciones/create' , 'InscripcionController@create');
Route::get('adminX/inscriptos/{curso}' , 'CursoController@inscriptos');
Route::get('adminX/inscripciones/{alumno}' , 'AlumnoController@inscripciones');



//////////////////////////////////////////////////////////////////////////////
// Esta ruta es solo para desarrollo, para generar código de los formularios 
Route::get('adminX/generar_form/{lista_tablas}', 'AdminController@generarForm');