<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table='empleados';
    protected $primaryKey='idEmpleado';
    public $timestamps=false;
    protected  $fillable=['dni','nombre','apellidos','edad','genero','estado_civil','direccion','telefono','email','nivel_educativo','experiencia','idcargo','control'];
}
