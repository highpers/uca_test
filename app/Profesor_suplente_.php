<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor_suplente extends Model
{
    protected $table = 'profesors';
    public $tabla_referida = 'profesors';
}
