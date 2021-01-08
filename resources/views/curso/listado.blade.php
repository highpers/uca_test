@extends('layouts/base')

@section('content')

<?php
$header_footer = '<tr>
                    <th>Curso</th>
                    <th>Horario</th>
                    <th>Profesor titular</th>
                    <th>Profesor adjunto</th>
                    <th>Profesor suplente</th>
                    <th class="th_iconos">Inscriptos</th>
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
                    <tbody class="tabla_alumno">
                  @forelse ($lista as $curso)
                    @if(is_null($curso->profesor_adjunto_id)) 
                      @php ( $adjunto = 'No designado ' )
                    @else
                      @php ($adjunto = "$curso->apellido_adjunto, $curso->nombres_adjunto"  )
                    @endif  
                    @if(is_null($curso->profesor_suplente_id)) 
                      @php ( $suplente = 'No designado ' )
                    @else
                      @php ($suplente = "$curso->apellido_suplente, $curso->nombres_suplente"  )
                    @endif  

                      <tr class="row_list">
                        <td>{{ $curso->descripcion }}</td>
                        <td>{{ $curso->horario }}</td>
                        <td>{{ $curso->apellido_titular }} , {{ $curso->nombres_titular }}</td>
                        <td>{{ $adjunto }}</td>
                        <td> {{ $suplente }} </td>
                         <td class="table-icon"><a href="/adminX/inscriptos/{{$curso->id}}"><i class="fas fa-fw fa-eye list-icon" title="Ver alumnos inscriptos"></i></a></td> 
                         <td class="table-icon"><a href="/adminX/cursos/{{$curso->id}}/edit"><i class="fas fa-fw fa-edit list-icon" title="Modificar datos del curso"></a></td>
                        <td class="table-icon"><i class="fas fa-fw fa-trash-alt list-icon" title="Eliminar curso" name="borrar" id="itemDel-{{$curso->id}}"></i></td>
                        </tr>  
                   @empty 
                         
                   @endforelse
                    </tbody>
                  </table>
                </div>
                </div>
                </div>
 
 
 @include('includes.modal_confirm' ,
          ['idListeners' => 'dataTable' , 'urlBase' => '/adminX/cursos/' , 'labelPregunta' => ' del Curso' , 
            'urlRedirect' => '/adminX/cursos'        

          ])

          

@endsection
