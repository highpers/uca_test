@extends('layouts/base')

@section('content')

<?php
$header_footer = '<tr>
                    <th>Alumno</th>
                    <th>Email</th>
                    <th>DNI</th>
                    <th class="th_iconos">Borrar</th>
               </tr>'; 
?> 
<div>
<h5>Curso: {{ $curso->descripcion}}</h5>
<h5>Horario: {{ $curso->horario}}</h5>              
<h5>Profesor titular: {{ $curso->profesor->apellido }}</h5>               
</div>
<div class="card shadow mb-4">
            <div class="card-body">
 <div class="table-responsive" style="width:882px">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                     {!! $header_footer !!}
                    </thead>
                   
                    <tbody class="tabla_alumnos">
                  @forelse ($alumnos as $alumno)
                   

                      <tr class="row_list">
                        <td>{{ strtoupper($alumno->apellido) }}, {{ $alumno->nombres }}</td>
                        <td>{{ $alumno->email }} </td>
                        <td>{{ $alumno->DNI}} </td>
                        <td class="table-icon"><i class="fas fa-fw fa-trash-alt list-icon" title="Eliminar inscripción" name="borrar" id="itemDel-{{$curso->id}}-{{$alumno->id}}"></i></td>
                        </tr>  
                   @empty 
                         
                   @endforelse
                    </tbody>
                  </table>
                </div>
                </div>
                </div>
 
 
 @include('includes.modal_confirm_inscripciones' ,
          ['idListeners' => 'dataTable' , 'urlBase' => '/adminX/alumnos/' , 'labelPregunta' => ' de la inscripcion' , 
            'urlRedirect' => '/adminX/inscriptos' ,        

          ])

          

@endsection
