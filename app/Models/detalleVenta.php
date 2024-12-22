<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalleVenta extends Model
{
    use HasFactory;
    protected $primaryKey= 'idDv';
    protected $fillable = [
        'id_venta',
        'idDal',
        'precioDv',
        'cantidadDv'
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'id_venta');
    }
    public function detalleAlmacen()
    {
        return $this->belongsTo(DetalleAlmacen::class, 'idDv');
    }
  /*  
    public function detalleAlmacen()
    {
        return $this->belongsTo(DetalleAlmacen::class, ['id_producto', 'id_almacen']);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }*/
}
