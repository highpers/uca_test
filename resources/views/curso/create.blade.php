@extends('layouts/base')
@section('content')
<div class="container col-md-4 col-md-offset-4">
  <div class="panel panel-default">
    <div class="prompt-form">Ingresá los datos del Curso</div>
@include('includes.errores_form')
     <div class="panel-body">

{!! Form::open(['url'=>'/adminX/cursos']) !!}

{!! Field::text('descripcion',  ['required' , 'maxlength'=>'100', 'label'=>'Título del Curso - Materia']) !!} 

<br>
{!! Field::text('horario' , [ 'required', 'maxlength' => '255',]) !!}    
<br>{!! Form::label('profesor_id' , 'Profesor Titular') !!} <span class="badge badge-info req">*</span> 
{!! Form::select('profesor_id' , $profesors, null, ['placeholder' => '-- Seleccionar --','class'=>'form-control', 'required'] ) !!} 
<br>
{!! Form::label('profesor_adjunto_id' , 'Profesor adjunto') !!}  
{!! Form::select('profesor_adjunto_id' , $profesors, null, ['placeholder' => '-- Seleccionar --','class'=>'form-control', ] ) !!}
<br>{!! Form::label('profesor_suplente_id' , 'Profesor suplente') !!}
{!! Form::select('profesor_suplente_id' , $profesors, null, ['placeholder' => '-- Seleccionar --','class'=>'form-control'] ) !!}
<br>

{!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
{!! Form::close() !!}
    </div>
 </div>
 </div>


 @endsection