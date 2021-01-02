<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor_adjunto extends Profesor
{
    public $tabla_referida = 'profesors';
}
