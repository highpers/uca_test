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

Route::get('/adminX', function () {
    if (Auth::check()) {

        return Redirect::to('/adminX/cursos');
    } else {
        Route::get('/adminX', function () {
            if (Auth::check()) {

                return Redirect::to('/adminX/cursos');
            } else {

                return Redirect::to('/login');; // con ventana login
            }
        });
        return Redirect::to('/login');; // con ventana login
    }
});

Route::get('/home', function(){
    
    return Redirect::to('/adminX');
}
);
Route::group(['middleware' => 'auth'], function () {
Route::get('/despedida', function () {

    Session::flash('message', 'Cerraste la sesión correctamente');
    Session::flash('alert', 'success');

    return Redirect::to('/login');; // con ventana login
});


Route::resource('adminX/cursos', 'CursoController');
Route::resource('adminX/alumnos', 'AlumnoController');

Route::get('adminX/inscripciones/create', 'InscripcionController@create');
Route::post('adminX/inscripciones', 'InscripcionController@store');
Route::get('adminX/inscriptos/{curso}', 'CursoController@inscriptos');
Route::get('adminX/inscripciones/{alumno}', 'AlumnoController@inscripciones');
Route::delete('adminX/inscripciones/{id_curso}/{id_alumno}', 'InscripcionController@destroy');

});

Auth::routes();

//////////////////////////////////////////////////////////////////////////////
// Esta ruta es solo para desarrollo, para generar código de los formularios 
Route::get('adminX/generar_form/{lista_tablas}', 'AdminController@generarForm');


