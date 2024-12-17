<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombreEm',
        'apellidosEm',
        'puestoEm',
        'telefonoEm',
        'direccion',
        'id_tipoE'
    ];

    public function tipoEmpleado()
    {
        return $this->belongsTo(TipoEmpleado::class, 'id_tipoE');
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'id_empleado');
    }

    public function compras()
    {
        return $this->hasMany(Compra::class, 'id_empleado');
    }

    public function login()
    {
        return $this->belongsTo(login::class, 'usuario');
    }
}
