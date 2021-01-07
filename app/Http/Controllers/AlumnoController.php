<?php

namespace App\Http\Controllers;

use App\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AlumnoController extends Controller
{

    private    $reglas = [
        'DNI' => 'required|numeric|digits: 8|unique:alumnos,DNI',
        'apellido' => 'required',
        'nombres' => 'required',
        'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:alumnos,email',
    ];

    private  $mensajes = [
        'DNI.digits' => 'El DNI debe ser de 8 caracteres',
        'DNI.unique' => 'El DNI ya se encuentra registrado',
        'email.unique' => 'El email ya se encuentra registrado',
        'email.regex' => 'El email debe ser válido',
        'password.min' => 'La password debe contener al menos 8 caracteres',
        'password.regex' => 'La password debe contener al menos una letra mayúscula, al menos una minúscula y al menos un número',
    ];


    
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
        $this->reglas['password'] =  [
            'required',
            'string',
            'min:8',             // must be at least 10 characters in length
            'regex:/[a-z]/',      // must contain at least one lowercase letter
            'regex:/[A-Z]/',      // must contain at least one uppercase letter
            'regex:/[0-9]/',      // must contain at least one digit

        ];
         
        $this->validate($request, $this->reglas, $this->mensajes);
        $datos = $request->all();
        $datos['password'] = bcrypt($datos['password']);
        
        if (Alumno::create($datos)) {
            $mensaje = 'El alumno se cargó correctamente';
            $alert = 'success';
        } else {
            $mensaje = 'Error al cargar el curso';
            $alert = 'danger';
        }
        Session::flash('message', $mensaje);
        Session::flash('alert', $alert);
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
        $title = 'Modificar alumno' ;

        $params = ['title' , 'alumno'] ;

        return view('alumno.edit' , compact($params));

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
      // corrijo la validación de email y DNI, para que permita cargar los mismos email y DNI sin rebotar por la regla unique   
        $this->reglas['DNI'] .= ','.$alumno->id;
        $this->reglas['email'] .= ','.$alumno->id;

        $this->validate($request, $this->reglas, $this->mensajes);
        $datos = $request->all();

        if ($alumno->update($datos)) {
            $mensaje = 'El alumno se modificó correctamente';
            $alert = 'success';
        } else {
            $mensaje = 'Error al modificar el alumno';
            $alert = 'danger';
        }
        Session::flash('message', $mensaje);
        Session::flash('alert', $alert);

        return redirect('/adminX/alumnos/');
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
