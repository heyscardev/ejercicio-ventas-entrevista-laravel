<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaProducto extends Model
{
    use HasFactory;
    protected $fillable = ['factura_id','producto_id','precio','impuesto'];

    public function factura(){
        return $this->belongsTo(Factura::class);
    }
    public function productos(){
        return $this->hasOne(Producto::class);
    }
}
