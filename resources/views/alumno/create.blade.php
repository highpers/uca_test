@extends('layouts/base')
@section('content')
<div class="container col-md-4 col-md-offset-4">
  <div class="panel panel-default">
    <div class="prompt-form">Ingresá los datos del Alumno</div>
@include('includes.errores_form')
     <div class="panel-body">

{!! Form::open(['url'=>'/adminX/alumnos']) !!}

{!! Field::text('nombres',  ['required' , 'maxlength'=>'100']) !!} 

{!! Field::text('apellido' , [ 'required', 'maxlength' => '100',]) !!}    
{!! Field::email('email' ,  [ 'required', 'maxlength' => '100',]) !!}    
{!! Field::number('DNI' ,  [ 'required','maxlength' => '8','min'=>'1' , 'max'=>'99999999' ]) !!}    
{!! Field::password('password' , [ 'required', 'maxlength' => '255',]) !!}    

{!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
{!! Form::close() !!}
    </div>
 </div>
 </div>


 @endsection