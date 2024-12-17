<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalleCompra extends Model
{
    use HasFactory;

    protected $fillable = [
        'cantidadDc',
        'precioDc',
        'id_compra',
        'id_producto',
        'id_almacen'
    ];

    public function compra()
    {
        return $this->belongsTo(Compra::class, 'id_compra');
    }

    public function detalleAlmacen()
    {
        return $this->belongsTo(DetalleAlmacen::class, ['id_producto', 'id_almacen']);
    }
/*
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }*/
}
