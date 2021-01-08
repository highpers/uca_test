@extends('layouts/base')

@section('content')

<?php
$header_footer = '<tr>
                    <th>Apellido</th>
                    <th>Nombres</th>
                    <th>Email</th>
                    <th>DNI</th>
                    <th class="th_iconos">Inscripciones</th>
                    <th class="th_iconos">Modificar</th>
                    <th class="th_iconos">Borrar</th>
               </tr>'; 
?>                    
<div class="card shadow mb-4">
            <div class="card-body">
 <div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                     {!! $header_footer !!}
                    </thead>
                    <tfoot>
                    {!! $header_footer !!}
                    </tfoot>
                    <tbody class="tabla_alumnos">
                  @forelse ($lista as $alumno)
                   

                      <tr class="row_list">
                        <td>{{ $alumno->apellido }}</td>
                        <td>{{ $alumno->nombres }}</td>
                        <td>{{ $alumno->email }} </td>
                        <td>{{ $alumno->DNI}} </td>
                         <td class="table-icon"><a href="/adminX/inscripciones/{{$alumno->id}}"><i class="fas fa-fw fa-chalkboard-teacher list-icon" title="Ver inscripciones"></i></a></td> 
                         <td class="table-icon"><a href="/adminX/alumnos/{{$alumno->id}}/edit"><i class="fas fa-fw fa-edit list-icon" title="Modificar datos del alumno"></a></td>
                        <td class="table-icon"><i class="fas fa-fw fa-trash-alt list-icon" title="Eliminar alumno" name="borrar" id="itemDel-{{$alumno->id}}"></i></td>
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
