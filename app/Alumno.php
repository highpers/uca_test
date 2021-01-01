<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = [
        'nombres', 'apellido', 'password', 'email' , 'dni', 'deleted_at'
    ];
}
