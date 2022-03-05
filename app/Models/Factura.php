<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','estado'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function productos(){
       // return $this->hasMany(FacturaProducto::class);
        return $this->belongsToMany(Producto::class,'factura_productos')->withPivot(['precio','impuesto'])->withTimestamps();
    }
    public function getTotalAttribute(){
       return  $this->productos()->sum('factura_productos.precio') + $this->productos()->sum('factura_productos.impuesto');
        
    }
    public function getTotalSinImpuestoAttribute(){
        return  $this->productos()->sum('factura_productos.precio');
    }
    public function getImpuestoTotalAttribute(){
        return  $this->productos()->sum('factura_productos.impuesto');
    }
}
