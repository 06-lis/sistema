<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombreEm',
        'apellidosEm',
        'puestoEm',
        'telefonoEm',
        'direccion',
        'id_tipoE',
        'usuario',  // Campo para el usuario relacionado con la tabla login
        'contrasena'  // Campo para la contraseña correspondiente
    ];

    /**
     * Relación con el modelo TipoEmpleado.
     */
    public function tipoEmpleado()
    {
        return $this->belongsTo(TipoEmpleado::class, 'id_tipoE');
    }

    /**
     * Relación con el modelo Login.
     * Aquí aseguramos que cada empleado tenga una única entrada en login
     */
    public function login()
    {
        return $this->hasOne(Login::class, 'usuario'); // Relación uno a uno con la tabla login
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'id_empleado');
    }

    public function compras()
    {
        return $this->hasMany(Compra::class, 'id_empleado');
    }
}

