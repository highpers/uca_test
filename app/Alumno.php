<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumno extends Model
{
    use SoftDeletes;
    protected $softDelete = true;
    protected $fillable = [
        'nombres', 'apellido', 'password', 'email' , 'DNI', 'deleted_at'
    ];
}
