<?php

namespace App\Http\Controllers;

use App\Curso;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Listado de cursos';

        $lista = Curso::orderBy('descripcion')->get();
        // dd($lista) ;
        $lista = DB::table('cursos')
            ->whereNull('cursos.deleted_at')
            ->join('profesors as titular', 'profesor_id', '=', 'titular.id')
            ->leftjoin('profesors as adjunto', 'profesor_adjunto_id', '=', 'adjunto.id')
            ->leftjoin('profesors as suplente', 'profesor_suplente_id', '=', 'suplente.id')
            ->select('cursos.*', 'titular.apellido as apellido_titular', 'titular.nombres as nombres_titular', 'adjunto.apellido as apellido_adjunto', 'adjunto.nombres as nombres_adjunto', 'suplente.apellido as apellido_suplente', 'suplente.nombres as nombres_suplente')
            ->orderBy('descripcion')
            ->get();
        //   dd($lista);

        $params = ['title', 'lista'];

        return view('curso.listado', compact($params));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $title = 'Nuevo Curso';
        $params = ['title', 'profesors'];

        $profesors = DB::table("profesors")->select("id", DB::raw("CONCAT(apellido, ', ',nombres) as nombre_completo"))->where('deleted_at', NULL)->orderBy('nombre_completo')->pluck("nombre_completo", "id");


        return view('curso.create', compact($params));
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
        // dd($datos);

        if (Curso::create($datos)) {
            $mensaje = 'El curso se creó correctamente';
            $alert = 'success';
        } else {
            $mensaje = 'Error al crear el curso';
            $alert = 'danger';
        }
        Session::flash('message', $mensaje);
        Session::flash('alert', $alert);

        return redirect('/adminX/cursos/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {

        $title = 'Modificar Curso';
        $params = ['title', 'profesors', 'curso'];

        $profesors = DB::table("profesors")->select("id", DB::raw("CONCAT(apellido, ', ',nombres) as nombre_completo"))->where('deleted_at', NULL)->orderBy('nombre_completo')->pluck("nombre_completo", "id");


        return view('curso.edit', compact($params));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {

        $datos = $request->all();

        if ($curso->update($datos)) {
            $mensaje = 'El curso se actualizó correctamente';
            $alert = 'success';
        } else {
            $mensaje = 'Error al actualizar el curso';
            $alert = 'danger';
        }
        Session::flash('message', $mensaje);
        Session::flash('alert', $alert);
        return redirect('/adminX/cursos/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {

        if ($curso->delete()) {
            $mensaje = 'Se ha eliminado el curso';
            $alert = 'success';
        } else {
            $mensaje = 'Error al eliminar el curso';
            $alert = 'danger';
        }
        Session::flash('message', $mensaje);
        Session::flash('alert', $alert);

        //return redirect('adminX/cursos'); // en principio el redirect se hace por javascript porque con este da error de métódo no permitido
    }

    /**
     * Lista los alumnos inscriptos al curso y
     *
     * @param curso $curso
     * 
     */
    public function inscriptos(curso $curso)
    {

        $title  = "Alumnos inscriptos";

        $alumnos = $curso->alumnos;

        $params = ['title', 'curso', 'alumnos'];


        return view('inscripcion.alumnosXcurso', compact($params));
    }

    public function api()
    {
        $resp = Curso::with('profesor')->with('profesor_adjunto')->with('profesor_suplente')->with('alumnos')->orderBy('descripcion')->get();

        $resp->makeHidden(['alumnos.password']);

        return $resp;
    }
}
