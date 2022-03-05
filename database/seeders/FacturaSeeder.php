<?php

namespace Database\Seeders;

use App\Models\Compra;
use App\Models\Factura;
use App\Models\FacturaProducto;
use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $factura = new Factura();
        $factura->user_id = 1;
        $factura->estado = 'pagado';
        $factura->save();
        $compras = Compra::whereEstado('facturado')->whereUserId($factura->user_id)->get();
        foreach($compras as $compra){
            $producto = Producto::find($compra->producto_id);
            $facturaProducto = new FacturaProducto();
            $facturaProducto->factura_id = $factura->id;
            $facturaProducto->producto_id = $producto->id;
            $facturaProducto->precio = $producto->precio_base;
            $facturaProducto->impuesto = $producto->impuesto;
            $facturaProducto->save();
        }
        
    
    }
}
