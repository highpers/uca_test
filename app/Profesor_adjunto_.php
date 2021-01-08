<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor_adjunto extends Profesor
{
    protected $table = 'profesors';
    public $tabla_referida = 'profesors';

}
