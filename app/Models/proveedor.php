<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombrePr',
        'telefonoPr',
        'ubicacionPr'
    ];

    public function compras()
    {
        return $this->hasMany(Compra::class, 'id_proveedor');
    }
}
