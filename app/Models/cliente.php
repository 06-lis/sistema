<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombreCl',
        'apellidosCl',
        'telefonoCl'
    ];

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'id_cliente');
    }
}
