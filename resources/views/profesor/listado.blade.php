@extends('layouts/base')

@section('content')


  <div class="card shadow mb-4">
            <div class="card-body">
 <div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th class="cell_invisible""></th>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Celular</th>
                        <th>Obra social</th>
                        <th>Num. Afiliado</th>
                        <th>Discap.</th>
                        <th>Honorario</th>
                        <th class="th_iconos">Det.</th>
                  @if(!$borrados)
                        <th class="th_iconos">Modif.</th>
                        <th class="th_iconos">Borrar</th>
                  @endif
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                      <th class="cell_invisible"></th>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Celular</th>
                        <th>Obra social</th>
                        <th>Num. Afiliado</th>
                        <th>Discap.</th>
                        <th>Honorario</th>
                        <th class="th_iconos">Det.</th>
                  @if(!$borrados)
                        <th class="th_iconos">Modif.</th>
                        <th class="th_iconos">Borrar</th>
                  @endif
                      </tr>
                    </tfoot>
                    <tbody class="tabla_pacientes">
                  @foreach ($pacientes as $pac)
                    

                    @if($pac->obra_social_id > 1)
                      <?php $honorario = 'Según Obra social' ?>
                    @else
                      <?php $honorario = numFormateado($pac->honorario_sesion)  ?>
                    @endif

                      <tr class="row_list"><td style="vertical-align: middle"><a href="{{route('sesiones.create')}}/{{$pac->id}}"<i class="fas fa-user-clock list-icon peq" title="Programar sesión para el paciente"></i></a></td>
                        <td><a href="{{route('pacientes.show',$pac->id)}}">{{ strtoupper($pac->apellido)}}, {{ $pac->nombre}}</a></td>
                        <td align="center">{{ \Carbon\Carbon::parse($pac->fecha_nacimiento)->age}}</td>
                        <td>{{ $pac->celular}}</td>
                        <td>{{ $pac->obraSocial->nombre }}</td>
                        <td>{{ $pac->numero_afiliado}}</td>
                        <td>{{ $pac->tipoDiscapacidad->descripcion}}</td>
                        <td align="center">{{ $honorario }}</td>
                        <td><a href="/adminX/pacientes/{{$pac->id}}"><i class="fas fa-fw fa-eye list-icon" title="Ver detalle del paciente"></i></a></td>
                  @if(!$borrados)
                        <td class="table-icon"><a href="/adminX/pacientes/{{$pac->id}}/edit"><i class="fas fa-fw fa-edit list-icon" title="Modificar datos del paciente"></i></a></td>
                        <td class="table-icon"><i class="fas fa-fw fa-trash-alt list-icon" title="Eliminar paciente" name="borrar" id="itemDel-{{$pac->id}}"></i></td>
                 @endif
                      </tr>
                  @endforeach
                    </tbody>
                  </table>
                </div>
                </div>
                </div>
 
 @include('admin.includes.modalConfirm' ,
          ['idListeners' => 'dataTable' , 'urlBase' => '/adminX/pacientes/' , 'labelPregunta' => ' del Paciente' , 
            'urlRedirect' => '/adminX/pacientes'        

          ])

@endsection
