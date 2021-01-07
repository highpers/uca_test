<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inscripcion extends Model
{
    use SoftDeletes;
    protected $softDelete = true;
    protected $table = 'alumno_curso';
    protected $fillable = ['alumno_id', 'curso_id', 'deleted_at'];
}
