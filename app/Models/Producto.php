<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'precio', 'impuesto_porcentaje'];

    public function getPrecioBaseAttribute()
    {
        return $this->precio * 100/ (100 +  $this->impuesto_porcentaje);
    }
    public function getImpuestoAttribute()
    {
        return $this->precio * $this->impuesto_porcentaje  / (100 +  $this->impuesto_porcentaje);
    }
    public function compras()
    {
        return  $this->hasMany(Compra::class);
    }
    public function facturas()
    {
      return $this->belongsToMany(Factura::class,'factura_productos')->withPivot(['precio','impuesto'])->withTimestamps();
    }
   
}
