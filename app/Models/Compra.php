<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class Compra extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'producto_id', 'estado'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
    public static function comprasPendientesUserUnique()
    {
        return self::where('estado', 'pendiente')->get()->unique('user_id');
    }
    public static function comprasPendientesByUserid($id)
    {
        return  self::whereUserId($id)->whereEstado('pendiente')->get();
    }
}
