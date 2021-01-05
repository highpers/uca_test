<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = ['profesor_adjunto_id', 'profesor_suplente_id', 'profesor_id', 'descripcion', 'horario'];

    public function profesor(){

        return $this->belongsto('Profesor::class');

    }

  
}

