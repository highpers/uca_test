@extends('layouts/base')
@section('content')
<div class="container col-md-4 col-md-offset-4">
  <div class="panel panel-default">
    <div class="prompt-form"></div>
@include('includes.errores_form')
     <div class="panel-body">

{!! Form::open(['url'=>'/adminX/inscripciones']) !!}

<br>
<br>{!! Form::label('alumno_id' , 'Alumno') !!} <span class="badge badge-info req">*</span> 

{!! Form::select('alumno_id' , $alumnos, null, ['placeholder' => '-- Seleccionar --','class'=>'form-control',  'required','style'=>'width:'.$ancho_combo] ) !!}

<br>{!! Form::label('curso_id' , 'Curso / Materia') !!} <span class="badge badge-info req">*</span> 

{!! Form::select('curso_id' , $cursos, null, ['placeholder' => '-- Seleccionar --','class'=>'form-control',  'required', 'style'=>'width:'.$ancho_combo] ) !!}
<br>
{!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
{!! Form::close() !!}
    </div>
 </div>
 </div>


 @endsection