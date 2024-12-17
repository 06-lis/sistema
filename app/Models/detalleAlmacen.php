<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalleAlmacen extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock',
        'id_producto',
        'id_almacen'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function almacen()
    {
        return $this->belongsTo(Almacen::class, 'id_almacen');
    }

    public function detalleCompra()
    {
        return $this->hasMayny(detalleCompra::Class, ['id_producto', 'id_almacen']);
    }

    public function detalleVenta()
    {
        return $this->hasMany(detalleVenta::class, ['id_producto', 'id_almacen']);
    }
}
