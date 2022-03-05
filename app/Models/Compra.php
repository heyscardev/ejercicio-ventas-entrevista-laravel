<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class Compra extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','producto_id','estado'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function producto(){
        return $this->belongsTo(Producto::class);
    }
    public function getCompraDifUserAttribute()
    {
         $compras = Compra::where('estado','pendiente')->get();
         $compras2 = [];

         foreach($compras as $compra){
             $state = false;
            foreach($compras2 as $compra2){
                if($compra->user_id == $compra2->user_id){
                    $state = true;
                }
            }
            if(!$state){
                array_push($compras2,$compra);
            }
         }
         return $compras2;

    }
    
}
