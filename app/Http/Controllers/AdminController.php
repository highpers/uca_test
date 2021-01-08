<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{



    function generarForm($lista_tablas)
    {
        // print_r($lista_tablas);



        $campos_excluidos = ['id', 'deleted_at', 'created_at', 'updated_at'];
        $campos_pw = ['clave', 'contrasenia', 'pass', 'secret', 'pw', 'password'];

        $lista = explode('-', $lista_tablas);
        // muestraArrayUobjetoDD($lista, __FILE__, __LINE__, 1 , 0) ;
        foreach ($lista as $tabla) {
            $htmlController = $htmlUse = '';
            $html = '<h3>Form ' . $tabla . '</h3>';
            $fillable = '<h4>Fillable para model</h4>protected $fillable = [';
            $html .= "{!! Form::open(['url'=>'/adminX/$tabla']) !!}<br>";


            // para postgres
            // $results = DB::select(DB::raw("SELECT * FROM information_schema.columns WHERE table_name = '$tabla'"));
            $results = DB::select(DB::raw("SELECT column_name, data_type, column_default, is_nullable FROM information_schema.columns WHERE table_name = '$tabla'"));

            // dd($results);
            // muestraArrayUobjetoDD($results, __FILE__, __LINE__, 0 , 0) ;

            foreach ($results as $campo) {
                if (in_array($campo->column_name, $campos_excluidos) or strpos($campo->data_type, 'timestamp') !== false) continue;
                $fillable .= " '$campo->column_name' ,";
                if (empty($campo->column_default)) {
                    $default = '';
                } else {
                    $default = "'$campo->column_default', ";
                }
                if ($campo->is_nullable == 'NO') {
                    $required = " 'required',";
                } else {
                    $required = '';
                }
                $min = '';
                if (strpos($campo->data_type, 'int') !== false) {
                    $tipo = 'number';
                    if (strpos($campo->data_type, 'unsigned') !== false) {
                        $min = " 'min'=>'1',";
                    }

                    // acá evaluamos el caso en que el campo se foreign key

                    if (substr($campo->column_name, -3) == '_id') { // es entero y terminado en _id, asumimos que es un foreign key de un modelo llamado según la parte inicial del nombre del campo

                        $model = ucfirst(substr($campo->column_name, 0, -3));
                        $modelo = 'App\\' . $model;

                        // necesito saber la tabla referenciada
                        $obj = new $modelo;

                        if (empty($obj->tabla_referida)) {
                            $tabla_referida = substr($campo->column_name, 0, -3) . 's';
                        } else {
                            $tabla_referida = $obj->tabla_referida;
                        }
                        $label = str_replace('_', ' ', $model);

                        $default = empty($default) ? 'null, ' : $default;

                        $html .= "{!! Form::label('$campo->column_name' , '$label') !!}<br>

                  {!! Form::select('$campo->column_name' , $$tabla_referida, $default ['placeholder' => '-- Seleccionar --','class'=>'form-control', 'required'] ) !!} <br> &lt;br&gt;";

                        // agregar código para el controlador
                        $htmlController .= '$' . "$tabla_referida = $model::pluck('nombre' , 'id');// verificar que el campo sea -nombre-";

                        $htmlController .= '<br>$params[] = ' . "'$tabla_referida';<br>";

                        $htmlUse .= '<br>use ' . $modelo . ';';

                        continue;
                    }
                } elseif ($campo->data_type == 'date') {
                    $html .= " <br>{!! Form::label('$campo->column_name' , '" . ucfirst($campo->column_name) . "' ) !!}
                 &lt;input type='date' id='$campo->column_name' name='$campo->column_name' class='form-control' value='{{ date('Y-m-d')}}'&gt; <br>";
                    continue;
                } elseif ($campo->data_type == 'time') {

                    $html .= " <br>{!! Form::label('$campo->column_name' , '" . ucfirst($campo->column_name) . "' ) !!}
                  &lt;input type='time' id='$campo->column_name' name='$campo->column_name' class='form-control' value='{{" . '$ahora }} &gt; <br>';
                    continue;
                } elseif (strpos($campo->data_type, 'email') !== false) {
                    $tipo = 'email';
                } elseif (in_array($campo->column_name, $campos_pw)) {
                    $tipo = 'password';
                } elseif ($campo->column_name == 'Text') {
                    $tipo = 'textarea';
                } else {
                    $tipo = 'text';
                }

                if (strpos($campo->data_type, 'char') !== false) { // ver el tamaño del campo para fijar el maxlength
                    $posLength = strpos($campo->data_type, '(') + 1;
                    $strNum = substr($campo->data_type, $posLength, -1);
                    $maxLength = "'maxlength' => '$strNum',";
                    //   if($campo->column_name=='cuit') die($campo->column_name.' - '.$strNum) ;
                } else {
                    $maxLength = '';
                }



                $html .= "{!! Field::$tipo('$campo->column_name' , $default  [$min $required $maxLength]) !!}<br>";
            }
            $fillable = trim($fillable, ',') . '] ;';
            $html .= " {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}<br>";
            $html .= '{!! Form::close() !!}<br><br>';

            echo $html;
            if (!empty($htmlController)) {
                echo '<br><h4>Cargar lo siguiente en el controller - en function create o la que corresponda</h4>' . $htmlController;
                echo '<br><b>Y en la parte superior</b>: ' . $htmlUse;
            }
            echo $fillable;
        }
    }
}
