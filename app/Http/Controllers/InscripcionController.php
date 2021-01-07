<?php

namespace App\Http\Controllers;

use App\Inscripcion;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response $profesors = DB::table("profesors")->select("id", DB::raw("CONCAT(apellido, ', ',nombres) as nombre_completo"))->where('deleted_at', NULL)->orderBy('nombre_completo')->pluck("nombre_completo", "id");
     */
    public function create()
    {
        $title = 'Nueva inscripcion' ;
         
        $alumnos = DB::table("alumnos")->select("id", DB::raw("CONCAT(apellido, ', ',nombres) as nombre_completo"))->where('deleted_at', NULL)->orderBy('nombre_completo')->pluck("nombre_completo", "id");

        $cursos = DB::table("cursos")->select("id", DB::raw("CONCAT(descripcion, ' - ', horario) as curso"))->where('deleted_at', NULL)->orderBy('curso')->pluck("curso", "id");

        $params[] = ['title' , 'alumnos', 'cursos'];

        return view('inscripcion.create' , compact($params));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function show(Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function edit(Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inscripcion $inscripcion)
    {
        //
    }
}
