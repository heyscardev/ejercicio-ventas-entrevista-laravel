<?php

namespace Database\Seeders;

use App\Models\Compra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Compra::insert([
            [
                'user_id' =>'1',
                'producto_id' => '4',
                'estado' => 'facturado'
            ],
            [
                'user_id' =>'1',
                'producto_id' => '3',
                'estado' => 'pendiente'
            ],
            [
                'user_id' =>'2',
                'producto_id' => '2',
                'estado' => 'pendiente'
            ],
            [
                'user_id' =>'4',
                'producto_id' => '5',
                'estado' => 'pendiente'
            ],
            [
                'user_id' =>'2',
                'producto_id' => '1',
                'estado' => 'pendiente'
            ],
            [
                'user_id' =>'1',
                'producto_id' => '1',
                'estado' => 'pendiente'
            ],
            [
                'user_id' =>'4',
                'producto_id' => '4',
                'estado' => 'pendiente'
            ],
            [
                'user_id' =>'4',
                'producto_id' => '3',
                'estado' => 'pendiente'
            ]
            
            ]);
    }
}
