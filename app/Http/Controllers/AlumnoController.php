<?php

namespace App\Http\Controllers;

use App\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Listado de alumnos';

        $lista = Alumno::orderBy('apellido')->orderBy('nombres')->get();

        $params = ['title' , 'lista'];

        return view('alumno.listado', compact($params));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $title = 'Nuevo alumno';

        return view('alumno.create',['title'=>$title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = $request->all();
        $datos['password'] = bcrypt($datos['password']);
        //   dd($datos);

        Alumno::create($datos);
        return redirect('/adminX/alumnos/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        if ($alumno->delete()) {
            $mensaje = 'Se ha eliminado el alumno';
            $alert = 'success';
        } else {
            $mensaje = 'Error al eliminar el alumno';
            $alert = 'danger';
        }
        Session::flash('message', $mensaje);
        Session::flash('alert', $alert);

        // return redirect('adminX/alumnos'); // en principio el redirect se hace por javascript porque con este solo da error de métódo no permitido y si lo dejo con el de javascript no se llega a ver el mensaje de confirmación
    }

    
}
