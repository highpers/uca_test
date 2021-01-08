<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    
    protected $table = 'alumno_curso';
    protected $fillable = ['alumno_id', 'curso_id', 'deleted_at'];
}
