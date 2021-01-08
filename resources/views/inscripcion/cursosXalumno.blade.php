@extends('layouts/base')

@section('content')

<?php
$header_footer = '<tr>
                    <th>Curso / Materia</th>
                    <th>Horario</th>
                    <th>Profesor</th>
                    <th class="th_iconos">Borrar</th>
                  </tr>'; 
?>                    
<div class="card shadow mb-4">
            <div class="card-body">
 <div class="table-responsive" style="width: 880px !important">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                     {!! $header_footer !!}
                    </thead>
                   
                    <tbody class="tabla_alumnos">
                  @forelse ($cursos as $curso)

                      <tr class="row_list">
                        <td>{{ $curso->descripcion }} </td>
                        <td>{{ $curso->horario}} </td>
                        <td>{{ strtoupper($curso->profesor->apellido)}} , {{ $curso->profesor->nombres }}</td>
                        <td class="table-icon"><i class="fas fa-fw fa-trash-alt list-icon" title="Eliminar inscripción" name="borrar" id="itemDel-{{$curso->id}}-{{$alumno->id}}"></i></td>
                        </tr>  
                   @empty 
                         
                   @endforelse
                    </tbody>
                  </table>
                </div>
                </div>
                </div>
 
 
 @include('includes.modal_confirm' ,
          ['idListeners' => 'dataTable' , 'urlBase' => '/adminX/alumnos/' , 'labelPregunta' => ' del Alumno' , 
            'urlRedirect' => '/adminX/alumnos'        

          ])

          

@endsection
