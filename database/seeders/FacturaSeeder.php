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

        foreach ($compras as $compra) {
            $factura->productos()->attach($compra->producto_id, [
                'precio' => $compra->producto->precioBase,
                'impuesto' => $compra->producto->impuesto
            ]);
        }
    }
}
