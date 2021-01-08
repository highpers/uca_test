<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Curso extends Model
{
    use SoftDeletes; 
    protected $softDelete = true;
    protected $fillable = ['profesor_adjunto_id', 'profesor_suplente_id', 'profesor_id', 'descripcion', 'horario', 'deleted_at'];

    public function profesor(){

        return $this->belongsto('App\Profesor');

    }

    public function alumnos(){

        return $this->belongsToMany('App\Alumno') ;

    }
  
}

