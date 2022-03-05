<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Producto::insert([
            [
                'nombre' => 'producto1',
                'precio' => 123.45,
                'impuesto_porcentaje' => 5.00,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nombre' => 'producto2',
                'precio' => 45.65,
                'impuesto_porcentaje' => 15,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nombre' => 'producto3',
                'precio' => 39.73,
                'impuesto_porcentaje' => 12,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nombre' => 'producto4',
                'precio' => 250.00,
                'impuesto_porcentaje' => 8,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'nombre' => 'producto5',
                'precio' => 59.35,
                'impuesto_porcentaje' => 10,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ]);
    }
}
